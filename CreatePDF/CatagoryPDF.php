
<?php
/**==============Inlcude PDF And Database File======================***/
  include_once "../lib/Database.php" ; 
  include_once "../pdf/fpdf.php" ; 
  $db  = new Database();
class PDF extends FPDF{

    
    // Page header
    function Header()
    {
        
        // Logo
        $this->Image('../asset/UploadFile/logo/logo2.png',10,8,20);
        $this->SetFont('Arial','B',18);
        // Move to the right
        $this->Cell(70);
        // Title
        $this->Cell(50,8,'Catagory List',0,0,'C');
        // Line break
        $this->Ln(30);
    }
    
    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function tableheader(){
        $this->SetX(25);
        $this->SetFont('Times','B',12);
        $this->Cell(20,10,'No',1,0,'C');
        $this->Cell(60,10,'Catagoer Name',1,0,'C');
        $this->Cell(80,10,'Create Date',1,0,'C');
        $this->Ln();
    }
    function tableView($db){
        
        $this->SetFont('Times','',10);
        $query = "SELECT  `cat_name`, `cat_add_date` FROM `tbl_cat` ";
        $result = $db->SelectData($query);
        $i=1;
        while($data = $result->fetch_assoc()){
            $this->SetX(25);
            $this->Cell(20,10,$i++,1,0,'C');
            $this->Cell(60,10,$data['cat_name'],1,0,'C');
            $this->Cell(80,10,$data['cat_add_date'],1,0,'C');
            $this->Ln();
        }
       
    }
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('p','A4',0);
$pdf->tableheader();
$pdf->tableView($db);
$pdf->Output();
?>
