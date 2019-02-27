<?php

class Main_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function afficherProduits()
	{
		//On prépare une connexion
		$this->load->database();

		//On prépare notre requête SQL
		$sql = $this->db->conn_id->prepare("SELECT * FROM LOT");

		//On exécute notre requête SQL
		$sql->execute();
		$donnees = $sql;
		$this->db = null;
		return $donnees;
	}

	function produitsAValider()
	{
		$this->load->database();
		$sql = $this->db->conn_id->prepare("SELECT idLot,immatBateau,datePeche,poidsBrutLot,prixPlancher,prixDepart,prixEnchereMax,dateEnchere,codeEtat,idPresentation,idAcheteur,intituleQualite,idTaille,idTailleIntermediaire FROM LOT, BATEAU, QUALITE WHERE LOT.idBateau= BATEAU.idBateau AND LOT.idQualite=QUALITE.idQualite AND codeEtat='NC'");
		$sql->execute();
		$donnees = $sql;
		return $donnees;
	}

	function lotsConfirmes()
	{
		$this->load->database();
		$sql = $this->db->conn_id->prepare("SELECT idLot,immatBateau,datePeche,poidsBrutLot,prixPlancher,prixDepart,prixEnchereMax,dateEnchere,codeEtat,idPresentation,idAcheteur,intituleQualite,idTaille,idTailleIntermediaire FROM LOT, BATEAU, QUALITE WHERE LOT.idBateau= BATEAU.idBateau AND LOT.idQualite=QUALITE.idQualite AND codeEtat='C'");
		$sql->execute();
		$donnees = $sql;
		return $donnees;
	}

	function inscription($data)
	{
		$this->load->database();
		$this->db->insert('ACHETEUR', $data);
		$this->db = null;
	}


	function verifInscription($login)
	{
		$this->load->database();		
		$sql = $this->db->conn_id->prepare ("SELECT login FROM ACHETEUR WHERE login = '$login'");
		$sql->execute();
        $resultat=$sql;
		return $resultat;
		$this->db=null;
	}


	function verifConnexion($identifiant, $mdp)
	{
		$this->load->database();
		$sql = $this->db->conn_id->prepare ("SELECT login, password FROM ACHETEUR WHERE login = '$identifiant' AND password = '$mdp'");
		$sql->execute();
        $resultat=$sql;
        /*foreach ($sql as $row) {		//Ce code retourne les bons éléments de la requête !
        	echo $row['login'].$row['password'];
        }*/
        $this->db=null;
		return $resultat;
	}

	function verifPecheOrganiseeAujourdhui()
	{
		$this->load->database();
		$dateDuJour = strftime('%d %m %Y');
		$sql = $this->db->conn_id->prepare("SELECT COUNT(datePeche) FROM PECHE WHERE datePeche='$dateDuJour'");
		$sql->execute();
		$resultat = $sql;		
		return $resultat;
	}

	function nouveauLot($lot)
	{
		$this->load->database();
		$this->db->insert('LOT', $lot);
		$this->db = null;
	}

	/*function bateauParticipant($bateauParticipant)
	{
		while ($donnees=$bateauParticipant->fetch())
		{
			$this->load->database();
			$this->db->insert('PECHE', $donnees);
		}
		$this->db = null;
	}*/

	function listeTaille()
	{
		$this->load->database();
		$sql = $this->db->conn_id->prepare ("SELECT idTaille FROM TAILLE");
		$sql->execute();
        $taille=$sql;//->fetchAll();
		return $taille;
	}

	function listeTailleIntermediaire()
	{
		$this->load->database();
		$sql = $this->db->conn_id->prepare ("SELECT tailleIntermediaire FROM TAILLEINTERMEDIAIRE");
		$sql->execute();
        $tailleIntermediaire=$sql;//->fetchAll();
		return $tailleIntermediaire;
	}

	function listeQualite()
	{
		$this->load->database();
		$sql = $this->db->conn_id->prepare ("SELECT intituleQualite FROM QUALITE");
		$sql->execute();
        $qualite=$sql;//->fetchAll();
		return $qualite;
	}

	function idLotNC()
	{
		$this->load->database();
		$sql = $this->db->conn_id->prepare ("SELECT idLot FROM LOT WHERE codeEtat='NC'");
		$sql->execute();
        $idLotNC=$sql;//->fetchAll();
		return $idLotNC;
	}

	function aValider($aValider)
	{
		$this->load->database();
		$this->db->set('LOT.codeEtat', 'C');
		$this->db->where('LOT.idLot', $aValider);
		$this->db->update('LOT');
	}

	function aRefuser($aRefuser)
	{
		$this->load->database();
		$this->db->set('LOT.codeEtat', 'R');
		$this->db->where('LOT.idLot', $aRefuser);
		$this->db->update('LOT');
	}

	function bateauxParticipants($idBateau, $datePeche)
	{
		$this->load->database();
		echo "</br>".$idBateau." ".$datePeche;
		$sql=$this->db->conn_id->prepare("INSERT INTO PECHE(idBateau, datePeche) VALUES ('$idBateau', '$datePeche')");
		$sql->execute();
	}

	function bateauAssocie()
	{
		$this->load->database();
		$sql = $this->db->conn_id->prepare("SELECT idBateau, immatBateau FROM BATEAU");
		$sql->execute();
        $bateau=$sql;//->fetchAll();
		return $bateau;
	}

	function recupBateauxParticipants()
	{
		$this->load->database();
		$dateDuJour = strftime('%d %m %Y');
		$sql = $this->db->conn_id->prepare("SELECT immatBateau FROM BATEAU, PECHE WHERE BATEAU.idBateau = PECHE.idBateau AND PECHE.datePeche = '$dateDuJour' ");
		$sql->execute();
		$bateauxParticipants = $sql;
		return $bateauxParticipants;
	}


	/*function findIdBateau($immatBateau)
	{
		$this->load->database();
		$sql = $this->db->conn_id->prepare ("SELECT idBateau FROM BATEAU WHERE BATEAU.immatBateau = '$immatBateau'");
		$sql->execute();
        $idBateau=$sql;
        $this->db = null;
		return $idBateau;

	}*/
}