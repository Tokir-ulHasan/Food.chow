<?php
    include_once "../lib/Database.php" ; 
    include_once "../lib/formatData.php" ; 
    include_once "../pdf/fpdf.php" ; 
    $db  = new Database();
    $fm  = new Formate();

    class PDF extends FPDF{
       
        public $title;
        public $id;
    
        function Mycell($w,$h,$x,$txt){
                $height = $h/3;
                $first_h = $height + 2;
                $second_h = $height +$height +$height+ 3;
                $len = strlen($txt);
               if($len>32){
                   $txt = str_split($txt,32);
                   $this->SetX($x);
                   $this->Cell($w,$first_h,$txt[0],'','','');
                   $this->SetX($x);
                   $this->Cell($w,$second_h,$txt[1],'','','');
                   $this->SetX($x);
                   $this->Cell($w,$h,'','LTRB',0,'C',0);
               }else{
                $this->SetX($x);
                $this->Cell($w,$h,$txt,'LTRB',0,'C',0);
               }
        }
        // Page header
        function Header()
        {
            
            // Logo
            $this->Image('../asset/UploadFile/logo/logo2.png',10,8,20);
            $this->SetFont('Arial','B',18);
            // Move to the right
            $this->Cell(70);
            // Title
            $this->Cell(50,8,'Delevery Boy List',0,0,'C');
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
    /*******========All orders Start================= */
        function tableheader(){
            $this->SetFont('Times','B',8);

            $this->Cell(13,10,'No',1,0,'C');
            $this->Cell(35,10,'Name',1,0,'C');
            $this->Cell(17,10,'Phone',1,0,'C');
            $this->Cell(40,10,'Eamil',1,0,'C');
            $this->Cell(43,10,'Address',1,0,'C');
            $this->Cell(18,10,'ID',1,0,'C');
            $this->Cell(24,10,'Join Date',1,0,'C');
            $this->Ln();
        }
        function tableView($db,$fm){
            
            $this->SetFont('Times','',7);
            $query = "SELECT * FROM `tbl_delevery_boy` where dlb_id != 0 ";
            $result = $db->SelectData($query);
            $i=1;
            while($data = $result->fetch_assoc()){
                $this->Cell(13,10,$i++,1,0,'C');
                $this->Cell(35,10,$data['dlb_name'],1,0,'C');
                $this->Cell(17,10,$data['dlb_phone'],1,0,'C');
                $this->Cell(40,10,$data['dlb_mail'],1,0,'C');
                $x = $this->GetX();
                $this-> Mycell(43,10,$x,$data['dlb_address']);
                $this->Cell(18,10,$data['dlb_curd_id'],1,0,'C');
                $this->Cell(24,10,$data['dlb_joinDate'],1,0,'C');
                $this->Ln();
            }
           
        }
  
        
}
    $pdf = new PDF('P','mm','A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->tableheader();
    $pdf->tableView($db,$fm);
 
    $pdf->Output();
?>

