<?php

class Form extends CI_Controller 
{
        public function index()
        {
        	    $this->load->helper(array('form', 'url'));
        	    $this->load->library('form_validation');

        	    $this->form_validation->set_rules('login', 				'login', 				'required');
				$this->form_validation->set_rules('password', 			'password', 			'required');
				$this->form_validation->set_rules('RSEntreprise', 		'RSEntreprise', 		'required');
				$this->form_validation->set_rules('numRueAcheteur', 	'numRueAcheteur', 		'required');
				$this->form_validation->set_rules('rueAcheteur', 		'rueAcheteur', 			'required');
				$this->form_validation->set_rules('villeAcheteur', 		'villeAcheteur', 		'required');
				$this->form_validation->set_rules('cpAcheteur', 		'cpAcheteur', 			'required');
			    $this->form_validation->set_rules('numHabilitation', 	'numHabilitation', 		'required');

		        if ($this->form_validation->run() == FALSE)
		        {
					$this->load->helper('url_helper');
					$this->load->view('v_header');
					$this->load->view('v_menu');
					$this->load->view('v_home');
			        $this->load->view('v_footer');
			        echo "ça serait con d'avoir cette erreur";
		        }

				else
				{	
					$data = array(
						'login'=> $this->input->post('login'),
						'password'=> $this->input->post('password'),
						'RSEntreprise'=> $this->input->post('RSEntreprise'),
						'numRueAcheteur'=> $this->input->post('numRueAcheteur'),
						'rueAcheteur'=> $this->input->post('rueAcheteur'),
						'villeAcheteur'=> $this->input->post('villeAcheteur'),
						'cpAcheteur'=> $this->input->post('cpAcheteur'),
						'numHabilitation'=> $this->input->post('numHabilitation'),
					);	

				//Le processus ci-dessous permet de vérifier si le login saisi par l'utilisateur n'existe pas déjà dans la base de données. 
				//- Si il existe déjà, alors la variable "$increment" prendra une valeur supérieure ou égale à 1, ce qui aura pour conséquence le signalement de ce problème à l'utilisateur.
				//- Si le pseudonyme est inédit dans la base de données, alors les informations de l'acheteur seront inscrites dans la base de données.

					$increment = 0;
					$this->load->model('Main_model');
					$test = $this->Main_model->verifInscription($data['login']);

					while ($donnees = $test->fetch())
					{
						$increment++;
					}

					if ($increment==0)
					{
						$this->Main_model->inscription($data);
						$this->load->helper('url_helper');
						$this->load->view('v_header');
						$this->load->view('v_menu');
						$this->load->view('v_formSuccess', $data);
					}
		 				
		 			else
		 			{
						$this->load->view('v_formFail');
		 			}
	 			}         
        }

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        
        public function connexion()
        {
        	$this->load->library('session');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $this->form_validation->set_rules('login', 'login', 'required');		//On <<oblige>> les champs "login" et "mdp" à contenir des valeurs
			$this->form_validation->set_rules('mdp', 'mdp', 'required');

			$identifiant = $this->input->post('login');		//$identifiant et $mdp contiendront les valeurs des champs "login" et "mdp" saisis précédemment
			$mdp = 	$this->input->post('mdp');

			$this->load->model('Main_model');
			$data=$this->Main_model->verifConnexion($identifiant,$mdp);		//Avec les valeurs saisis dans ces mêmes champs on effectue un test pour voir si l'utilisateur existe dans le base de données

			$login="";
			$password="";

			foreach ($data as $row) 
			{	
        		$login = $row['login'];
        		$password = $row['password'];
        	}
			
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('v_connexion');
				echo("Veillez à ce que tous les champs soient remplis correctement.");
			}
			
			
			elseif($this->form_validation->run() == true && $login==$identifiant && $password==$mdp)	//On teste si les valeurs saisies par l'utilisateur dans les champs "login" et "mdp" correspondent à un utilisateur de la base de donnéées
			{

            	$newdata = array(
            		'login' => $login,
		            'password' => $password,
		            'logged_in' => TRUE
	          	);


				$this->session->set_userdata($newdata);
				$this->load->view('v_connecte');

			}

			else
			{
				$this->load->view('v_connexion');
				echo("Aucun compte ne correspond à ces identifiants");
			}
        } 

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        public function ajouterProduits()
        {
        	$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');
        	$this->load->model('Main_model');
        	/*$immatBateau=$this->input->post('immatBateau');
        	$this->Main_model->findIdBateau($immatBateau);*/

        	$this->form_validation->set_rules('datePeche', 				'datePeche', 			'required');
			$this->form_validation->set_rules('poidsBrutLot', 			'poidsBrutLot', 		'required');
			$this->form_validation->set_rules('prixPlancher', 			'prixPlancher', 		'required');
			$this->form_validation->set_rules('prixDepart', 			'prixDepart', 			'required');
			$this->form_validation->set_rules('immatBateau', 			'immatBateau', 			'required');
			$this->form_validation->set_rules('idTaille', 				'idTaille', 			'required');
			$this->form_validation->set_rules('tailleIntermediaire', 	'tailleIntermediaire', 	'required');
			$this->form_validation->set_rules('intituleQualite', 		'intituleQualite', 		'required');
			$this->form_validation->set_rules('codeEtat', 				'codeEtat');


		    if ($this->form_validation->run() == FALSE)
		    {
				$this->load->helper('url_helper');
				$this->load->view('v_header');
				$this->load->view('v_menu');
				$this->load->view('v_home');
			    $this->load->view('v_footer');
			    echo "ça serait con d'avoir cette erreur";
		    }

			else
			{	
				$lot = array(
					'datePeche'=> 			$this->input->post('datePeche'),
					'poidsBrutLot'=> 		$this->input->post('poidsBrutLot'),
					'prixPlancher'=> 		$this->input->post('prixPlancher'),
					'prixDepart'=> 			$this->input->post('prixDepart'),
					'codeEtat'=>			$this->input->post('codeEtat'),
					'idBateau'=> 			intval($this->input->post('immatBateau')),
					'idTaille'=> 			intval($this->input->post('idTaille')),
					'idTailleIntermediaire'=> intval($this->input->post('tailleIntermediaire')),
					'idQualite'=> 			intval($this->input->post('intituleQualite')),

				);	
        	}

        	$this->Main_model->nouveauLot($lot);
        	$this->load->view('confirmationAjout');
        
		}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

public function validerProduits()
		{
			$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');
        	$this->load->model('Main_model');

        	$idLotNC = $this->Main_model->idLotNC();			//Appelle la fonction idLotNC qui renvoie l'identifiant de tous les lots dont le codeEtat est "NC", donc, les lots qu'il reste à confirmer
        	$data=array('idLotNC' => $idLotNC);


     		while ($req=$data['idLotNC']->fetch())
     		{
				$this->form_validation->set_rules($req["idLot"], 				$req["idLot"], 			'required');
				$verif = $this->input->post($req['idLot']);


				if ($verif==1)									//Correspond à l'option "aucune modifications"
				{
					echo "Aucune modifications apportées au lot n°".$req["idLot"].".";
				}

				elseif ($verif==2) 								//Correspond à l'option "Validée"
				{
					echo "Lot n°".$req["idLot"]." validé.";
					$aValider=$req['idLot'];
					echo "A valider : ".$req['idLot'];
					$this->Main_model->aValider($aValider);
				}

				elseif ($verif==3)								//Correspond à l'option "Refusée"
				{
					echo "Lot n°".$req["idLot"]." refusé.";		
					$aRefuser=$req['idLot'];
					echo "A refuser : ".$req['idLot'];
					$this->Main_model->aRefuser($aRefuser);
				}

				else
				{
					echo 'Erreur survenue lors du traitement du lot n°'.$req["idLot"];
				}

				echo "</br></br>";
			}


		    if ($this->form_validation->run() == FALSE)
		    {
				$this->load->helper('url_helper');
				$this->load->view('v_header');
				$this->load->view('v_menu');
				$this->load->view('v_home');
			    $this->load->view('v_footer');
			    echo "ça serait con d'avoir cette erreur";
		    }
?>
		   	<a href="<?php echo site_url();?>"> Retour à l'accueil</a>
		   	<a href="<?php echo site_url('Welcome/redirect/produits');?>"> Gérer d'autres produits</a>

<?php
		}

private $bateauNonParticipant=array();
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

		public function organiserPeche()
        {
        	date_default_timezone_set('Europe/Paris');	//ajuster le format de date en français
			setlocale(LC_TIME, 'fr_FR.utf8','fra');

        	$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');
        	$this->load->model('Main_model');

        	$index=$this->input->post('index');

        	$bateauxParticipants=$this->input->post('bateauxParticipants');
        	$datePeche=$this->input->post('datePeche');

        	$participantsEtDate = array(
        		'idBateau'=>$this->input->post('bateauxParticipants'),
        		'datePeche'=>$this->input->post('datePeche'),
        	);

        	$i=0;
        	while ($i<=count($participantsEtDate['idBateau'])-1)
        	{
        		echo "oui";
        		echo $participantsEtDate['idBateau'][$i];
        		echo $participantsEtDate['datePeche'][$i];
        		$this->Main_model->bateauxParticipants($participantsEtDate['idBateau'][$i], $participantsEtDate['datePeche'][$i]);
        		$i++;
        	}

        	redirect('/Welcome/redirect/pecheConfirmee');

/*        	echo $participantsEtDate['idBateau'];
        	echo $participantsEtDate['datePeche'];

        	for ($i=1;$i<$index;$i++)
        	{
        		$idBateau = $bateauxParticipants[$i];
        		$datePeche = $datePeche[$i];
        		echo $bateauxParticipants[$i];
        		echo $datePeche[$i];
        	}*/


			//$this->Main_model->bateauxParticipants($participantsEtDate);

        	/*$bateauParticipant = $this->Main_model->bateauParticipant();			//Appelle la fonction bateauParticipant qui renvoie l'id des bateaux participant déjà à la pêche du jour, on les exclura par la suite du traitement suivant
        	$data=array('bateauParticipant' => $bateauParticipant);
			
        	$this->load->model('Main_model');
			$idBateau = $this->Main_model->bateauAssocie();

			$i=1;

			while ($req = $idBateau->fetch())
			{
				if ($i == $req['idBateau'])
				{
					echo "Le bateau n° ".$i."participe déjà à la pêche du jour";
				}

				else if ($i != $req['idBateau'])
				{
					echo "Le bateau n° ".$i." ne participe pas déjà à la pêche du jour";
				}
/*				echo $req['idBateau'];
				echo "data de ".$i."= ".$data['bateauParticipant'];

				if ($req['idBateau']==$req2['idBateau'])
				{
					echo "Le bateau n° ".$req['idBateau']."participe déjà à la pêche du jour";
				}

				else if ($req['idBateau']!=$req2['idBateau'])
				{
					echo "Le bateau n° ".$req['idBateau']."ne participe pas encore à la pêche du jour, il sera ajouté";
					$this->bateauNonParticipant=array('idBateau'=>$i);
				}*/


			}
}

        	/*if 

        	$data = $this->input->post('idBateau');
        	var_dump($data);

			$this->form_validation->set_rules('idBateau', 					'idBateau');//, 				'required');
			//$this->form_validation->set_rules('datePeche', 					'datePeche', 				'required');

			$bateauParticipant=$this->input->post('idBateau');

		    if ($this->form_validation->run() == FALSE)
		    {
				$this->load->helper('url_helper');
				$this->load->view('v_header');
				$this->load->view('v_menu');
				$this->load->view('v_home');
			    $this->load->view('v_footer');
			    echo "ça serait con d'avoir cette erreur";
		    }

			else
			{	
				$bateauParticipant = array(
					'idBateau'=> $bateauParticipant,
					//'datePeche'=> "now()",

				);
        	}

        
		}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



        /*public function commander()
        {
        	$this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');
				
				$this->form_validation->set_rules('pdt_Designation', 'NomProduit', 'required');
				$this->form_validation->set_rules('quantité', 'Quantité', 'required');
				
				
                if ($this->form_validation->run() == FALSE)
                {
						$this->load->helper('url_helper');
						$this->load->view('v_entete');
						$this->load->view('v_bandeau');
						$this->load->view('v_admin');
                        $this->load->view('v_inscription');
                }
                else
                {
						$data = array(
						'pdt_Designation' 	=> $this->input->post('pdt_Designation'),
						'quantité' 	=> $this->input->post('quantité'),
						

						);
						$this->load->model('main_model');
						$this->main_model->passerCommande($data);
						$this->load->helper('url_helper');
						$this->load->view('v_entete');
						$this->load->view('v_bandeau');
						$this->load->view('v_admin');
						
						$this->load->model('main_model');
						$this->load->view('v_formSuccess', $data);
                }
        }

        public function commenter()
        {
        	$this->load->helper(array('form', 'url'));
        		$this->load->library('session');
                $this->load->library('form_validation');
				
				$this->form_validation->set_rules('contenuCommentaire', 'contenuCommentaire', 'required');
				$this->form_validation->set_rules('dateCommentaire', 'dateCommentaire');

				
				
                if ($this->form_validation->run() == FALSE)
                {
						$this->load->helper('url_helper');
						$this->load->view('v_entete');
						$this->load->view('v_bandeau');
						$this->load->view('v_admin');
                        $this->load->view('v_inscription');
                }

                else
                {
						$data = array
						(
							'contenuCommentaire' => $this->input->post('contenuCommentaire'),
							'dateCommentaire' => 'now()',
							'loginClient' => $this->session->userdata('loginClient'),
						);

						$this->load->model('main_model');
						$this->main_model->commenter($data);
						$this->load->helper('url_helper');
						$this->load->view('v_entete');
						$this->load->view('v_bandeau');
						$this->load->view('v_admin');
						
						$this->load->view('commentaireSuccess');
                }
        }
}*/