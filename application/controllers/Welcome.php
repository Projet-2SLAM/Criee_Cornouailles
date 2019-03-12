<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 	//Contrôleur par défaut qui sera utilisé quand un utilisateur se connectera au site
{		

	public function index()
	{
		date_default_timezone_set('Europe/Paris');	//ajuster le format de date en français
		setlocale(LC_TIME, 'fr_FR.utf8','fra');


		$this->load->library('session');
		$this->load->helper('url_helper');
		$this->load->view('v_header');
		if ($this->session->userdata('login')=="admin")
		{
			$this->load->view('v_menuAdmin');
		}

		else if ($this->session->userdata('login')!=null && $this->session->userdata('login')!="admin")				//Pour les utilisateurs connectés (qui ne sont pas "admin")
		{
			$this->load->view('v_menuUserConnected');
		}

		else
		{
			$this->load->view('v_menu');
		}

			$testUserConnected = $this->session->userdata('login');
	        if(is_null($testUserConnected))
	        {
	        	echo "Vous n'êtes pas connecté.";
	        }

	        else
	        {
				echo "Vous êtes connecté en tant que ".'<b>'.$testUserConnected.'</b>';
	        }

		$this->load->view('v_home');
		$this->load->view('v_footer');
	}

	public function redirect($id)
	{
		date_default_timezone_set('Europe/Paris');	//ajuster le format de date en français
		setlocale(LC_TIME, 'fr_FR.utf8','fra');


		$this->load->library('session');
		$this->load->model('Main_model');
		$this->load->helper('url_helper');
		$this->load->library('form_validation');			//à remettre si jamais l'inscription ne fonctionne plus

		$this->load->view('v_header');
		if ($this->session->userdata('login')=="admin")
		{
			$this->load->view('v_menuAdmin');
		}

		else if ($this->session->userdata('login')!=null && $this->session->userdata('login')!="admin")				//Pour les utilisateurs connectés (qui ne sont pas "admin")
		{
			$this->load->view('v_menuUserConnected');
		}

		else
		{
			$this->load->view('v_menu');
		}	

		$testUserConnected = $this->session->userdata('login');
	    if(is_null($testUserConnected))
	    {
	    	echo "Vous n'êtes pas connecté.";
	    }
	    else
	    {	
	    	echo "Vous êtes connecté en tant que ".'<b>'.$testUserConnected.'</b>';
	    }

	    $this->load->model('Main_model');
			$verifPecheOrganiseeAujourdhui = $this->Main_model->verifPecheOrganiseeAujourdhui();	//On vérifie si une pêche est organisée pour aujourd'hui
			$verification;
			if($donnees=$verifPecheOrganiseeAujourdhui->fetch())		//On récupère le nombre de bateaux associés à la pêche du jour
			{
				$count = intval($donnees[0]);	//On convertit en entier la valeur du count qui est en string

				if (is_int($count) && $count == 0)		//0 = aucun bateau associé à la pêche du jour, donc il n'y a pas de pêche d'organisée, donc inutile de permettre à l'utilisateur d'ajouter un produit;
				{
					//var_dump($count);
					//echo $count;
					//echo "donnees est un entier mais il est vide";
					$verification = false;
				}
				else if (is_int($count) && $count>0)	//Si count est supérieur à 0, c'est qu'il y a des bateaux associés à la pêche du jour, donc elle est organisée, donc on rend l'accès à la page possible
				{
					//var_dump($count);
					//echo $count;
					//echo "donnees est un entier et est supérieur à 0";
					$verification = true;
				}
				//var_dump($donnees);
			}
	        
		switch ($id)
		{
			case 'produits':

			if ($verification == true)	//Si une pêche est organisée, on permet à l'utilisateur de saisir un produit
			{
				if ($this->session->userdata('login')!=null && $this->session->userdata('login')!="admin")			//Pour les utilisateurs connectés (qui ne sont pas "admin")
				{

					//---------------------------------------------------------------------------------
					//Pour remplir les listes déroulantes

					$this->load->model('Main_model');
					$bateau = $this->Main_model->bateauAssocie();

					$immatBateau=array
					(
						'immatBateau' => $bateau
					);


					$listeTaille = $this->Main_model->listeTaille();

					$taille=array
					(
						'taille' => $listeTaille
					);


					$listeTailleIntermediaire = $this->Main_model->listeTailleIntermediaire();

					$tailleIntermediaire=array
					(
						'tailleIntermediaire' => $listeTailleIntermediaire
					);


					$listeQualite = $this->Main_model->listeQualite();

					$qualite=array
					(
						'qualite' => $listeQualite
					);


					$listeEspece = $this->Main_model->listeEspece();

					$espece=array
					(
						'espece' => $listeEspece
					);


					$listePresentation = $this->Main_model->listePresentation();

					$presentation=array
					(
						'presentation' => $listePresentation
					);


					$elements['immatBateau']=$immatBateau;
					$elements['taille']=$taille;
					$elements['tailleIntermediaire']=$tailleIntermediaire;
					$elements['qualite']=$qualite;
					$elements['espece']=$espece;
					$elements['presentation']=$presentation;

					//---------------------------------------------------------------------------------

					$this->load->view('v_ajouterLot', $elements);
				}


				elseif ($this->session->userdata('login')=='admin') 	//Pour l'administrateur
				{
					$this->load->model('Main_model');
					$produitsAValider = $this->Main_model->produitsAValider();
					$verification=false;
					$rows = $produitsAValider->fetchAll();

					foreach ($rows as $r)		//Si la requête retourne quelque chose, c'est qu'il y a des lots non confirmés dans la base de données
					{
						$verification = true;
					}

					if ($verification == true)
					{
						$data=array('produitsAValider'=>$rows);
						$this->load->view('v_validerLots', $data);
					}

					else
					{
						$message = array(
							'message' => "Il n'y a aucun lot en attente d'approbation pour le moment."
						);
						$this->load->view('v_validerLots', $message);
					}
				}


				else 													//Pour les visiteurs (utilisateurs non connectés)
				{
					$this->load->model('Main_model');
					$produits = $this->Main_model->afficherProduits();
					$data=array('produits' => $produits);
					$this->load->view('v_produits', $data);
				}
			}

			elseif ($verification == false)	//Si aucune pêche n'est organisée pour aujourd'hui, on le signale à l'utilisateur et il n'aura pas accès à la saisie d'un produit
			{
				$message = array(
					'message' => "Désolé, aucune pêche n'est encore prévue pour aujourd'hui !"
				);
				$this->load->view('v_produits', $message);
			}
			break;

			case 'encherirProduits':
				$this->load->model('Main_model');
				$requete = $this->Main_model->lotsConfirmes();
				$lotsConfirmes = array
				(
					'lotsConfirmes' => $requete
				);
				$this->load->view('v_encherirProduits', $lotsConfirmes);
			break;
			case 'contacts':
				$this->load->view('v_contacts');
			break;

			case 'monCompte':
				$this->load->view('v_monCompte');
			break;

			case 'inscription':
				$this->load->view('v_inscription');
			break;

			case 'connexion':
				$this->load->view('v_connexion');
			break;

			case 'deconnexion':
				$this->load->library('session');
				$this->session->sess_destroy();
				redirect('');
			break;

			case 'organiserPeche':
				$this->load->model('Main_model');
				$verifPecheDejaOrganisee = $this->Main_model->recupInfosPecheDuJour();

				$data = $verifPecheDejaOrganisee -> fetchAll();		//On affecte toutes les valeurs de la requête à la variable $data;

				$validation=false;
				$dateDuJour = strftime('%d %m %Y');

				foreach ($data as $donnees)
				{
					if ($donnees['datePeche'] == $dateDuJour)
					{
						$validation = true;
					}
				}

				if ($validation == false)
				{
					$bateau = $this->Main_model->bateauAssocie();

					$immatBateau=array
					(
						'immatBateau' => $bateau
					);

					$this->load->view('v_organiserPeche', $immatBateau);
				}

				else
				{
					$pourOrganiserPeche=array
					(
						'data' => $data
					);
					$this->load->view('v_organiserPeche', $pourOrganiserPeche);
				}
			break;

			case 'pecheConfirmee':
				$this->load->model('Main_model');
				$bateauxParticipants = $this->Main_model->recupInfosPecheDuJour();

				$listeBateauxParticipants=array
				(
					'bateauxParticipants' => $bateauxParticipants 		//Attention, pour le fetch dans la vue, il faut utiliser le nom choisi entre guillements et pas le nom de l'array ! Dans ce cas -> while($donnees=$bateauxParticipants->fetch())
				);

				$this->load->view('confirmationOrganisationPeche', $listeBateauxParticipants);
			break;

			case 'ajouterProduits':

			break;				

			//Rajouter d'autres onglets au projet à l'avenir
			default:
			$this->load->view('v_home');
		}
			$this->load->view('v_footer');
	}
}
