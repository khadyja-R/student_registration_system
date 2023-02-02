<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require('fpdf185/fpdf.php');
require('phpqrcode-2010100721_1.1.4/phpqrcode/qrlib.php');

session_start();
require_once 'connexion.php';
if(isset($_SESSION['id']) && isset($_GET['id']) && $_SESSION['id']==$_GET['id']) {

    $query = "SELECT  s.id as sid ,  s.first_name , s.last_name , s.cne , s.cin , s.email , s.phone ,s.birthday, s.adress, s.personal_picture , r.bac_year , r.student_id,r.bac_type_id, b.id  as bid, b.name as bname , sc1.id , sc1.name as sc1name , sc2.id , sc2.name as sc2name
	FROM student as s inner join registration as r on  s.id=:id and r.student_id = :id  inner join bac_type as b on b.id= r.bac_type_id  inner join  sector as sc1 on sc1.id = r.sector_id1
	inner join sector as sc2 on sc2.id = r.sector_id2
	 LIMIT 1";
    $statement = $database->prepare($query);
    $data = [':id' => $_GET['id']];
    $statement->execute($data);
    $row = $statement->fetch(PDO::FETCH_OBJ);
   
} else {
    echo 'wrong id';
    exit;
}

class PDF extends FPDF {
    private $row = [];
	private $QRimg = "";
    function __construct($row) {
        $this->row = $row;
		$this->generateQrcode($row);
        parent::__construct();
    }

	public function generateQrcode($data) {
		$dataFormatted = "First Name : ". $data->first_name."$data->cne";
		QRcode::png($dataFormatted,$data->id.".png");

	}

	
function Header() {

// Logo
$this->Image('../accueil/assets/img/ests.jpeg', 180, 10, -300);
// Arial bold 15
$this->SetFont('Arial','B',15);
// Move to the right
$this->Cell(80);
// Title
$this->Cell(40,20,'Recu de pre-inscription  ',3,1,'C');
// Line break
$this->Ln(7);
$this->Cell(80);
$this->Image($this->row->personal_picture,10,8,33);
// Line break
		// Line break
		$this->Ln(40);
		$this->SetFont('Arial', 'B',8);
		$this->cell(5);
		$this->Cell(20, 10, 'Nom:',  'C');
		$this->Cell(20, 10, $this->row->first_name, 'C');
		$this->Ln(10);
		$this->cell(5);
		$this->Cell(20, 10, 'Prenom:','C');
		$this->Cell(20, 10, $this->row->last_name,'C');
		$this->Ln(10);
		$this->cell(5);
		$this->Cell(20, 10, 'Email:','C');
		$this->Cell(20, 10, $this->row->email,'C');
		$this->Ln(10);
		$this->cell(5);
		$this->Cell(20, 10, 'Telephone:','C');
		$this->Cell(20, 10, $this->row->phone,'C');
		$this->Ln(10);
		$this->cell(5);
		$this->Cell(20, 10, 'Cin:','C');
		$this->Cell(20, 10, $this->row->cin,'C');
		$this->Ln(10);
		$this->cell(5);
		$this->Cell(20, 10, 'Cne:','C');
		$this->Cell(20, 10, $this->row->cne,'C');
		$this->Ln(10);
		$this->cell(5);
		$this->Cell(20, 10, 'Adresse:','C');
		$this->Cell(20, 10, $this->row->adress,'C');
		$this->Ln(10);
		$this->cell(5);
		$this->Cell(30, 10,'Date de naissance:','C');
		$this->Cell(20, 10, $this->row->birthday,'C');
		$this->Ln(10);
		$this->cell(5);
		$this->Cell(30, 10,'Type de Bac:','C');
		$this->Cell(20, 10, $this->row->bname,'C');
		$this->Ln(10);
		$this->cell(5);
		$this->Cell(30, 10,'Annee de Bac:','C');
		$this->Cell(20, 10, $this->row->bac_year,'C');
		$this->Ln(10);
		$this->cell(5);
		$this->Cell(30, 10,'Filiere choix1:','C');
		$this->Cell(20, 10, $this->row->sc1name,'C');
		$this->Ln(10);
		$this->cell(5);
		$this->Cell(30, 10,'Filiere choix2:','C');
		$this->Cell(20, 10, $this->row->sc2name,'C');

	}
	// Page footer
	function Footer() {

		$this->Image($this->row->id.".png", 180, 270, 20, 20, "png");


		$this->SetY(-15);
		
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,"ce document n'est pas un fichier d'inscription " .
			$this->PageNo() . '/{nb} @ESTS',0,0,'C');
	}
}

// Instantiation of FPDF class
$pdf = new PDF($row);
// Define alias for number of pages
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',14);
        $query = "UPDATE student SET can_update = 0  WHERE id=:id LIMIT 1";
        $statement = $database->prepare($query);
        $statement->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $query_execute = $statement->execute();
     
$pdf->Output();


?>
