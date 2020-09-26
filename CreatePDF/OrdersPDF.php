<?php
    include_once "../lib/Database.php" ; 
    include_once "../lib/formatData.php" ; 
    include_once "../pdf/fpdf.php" ; 
    $db  = new Database();
    $fm  = new Formate();

    $od_type_id = -1;
    if(isset($_POST['odtype'])){
        $od_type_id = $_POST['od_type_id'];
          
    }
 

    class PDF extends FPDF{
       
        public $title;
        public $id;
        function Datacollect($data)
        {
            $this->id = $data;
            if($this->id == 0){
                $this->title = "All Orders List";
            }
            elseif($this->id == 1){
            $this->title = "Pending Orders List";
            }
            elseif($this->id == 2){
            $this->title = "Active Orders List";
            }
            elseif($this->id == 3){
            $this->title = "Reject Orders List";
            }
            elseif($this->id == 4){
            $this->title = "Delevery Orders List";
            }
            
        }

        function Mycell($w,$h,$x,$txt){
                $height = $h/3;
                $first_h = $height + 2;
                $second_h = $height +$height +$height+ 3;
                $len = strlen($txt);
               if($len>15){
                   $txt = str_split($txt,15);
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
            $this->Cell(50,8,$this->title,0,0,'C');
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
        function tableheaderAll(){
            $this->SetFont('Times','B',8);
            $this->Cell(13,10,'No',1,0,'C');
            $x = $this->GetX();
            $this->Mycell(22,10,$x,'Order/Tranjection ID');
            $x = $this->GetX();
            $this->Mycell(20,10,$x,'Order Dy');
            $x = $this->GetX();
            $this->Mycell(20,10,$x,'Delevery By');
            $x = $this->GetX();
            $this->Mycell(18,10,$x,'Oder Type');
            $x = $this->GetX();
            $this->Mycell(22,10,$x,'Payment Status');
            $x = $this->GetX();
            $this->Mycell(15,10,$x,'Total Items');
            $x = $this->GetX();
            $this->Mycell(15,10,$x,'Total Price');
            $x = $this->GetX();
            $this->Mycell(22,10,$x,'Delevery/Recjec Date');
            $x = $this->GetX();
            $this->Mycell(22,10,$x,'Order date');
            $this->Ln();
        }
        function tableViewAll($db,$fm){
            
            $this->SetFont('Times','',7);
            $query = "SELECT *
            FROM `tbl_orders`
            INNER JOIN tbl_delevery_boy ON tbl_orders.delvery_boy_id = tbl_delevery_boy.dlb_id
            INNER JOIN tbl_user ON tbl_orders.customer_id = tbl_user.id";
            $result = $db->SelectData($query);
            $i=1;
            while($data = $result->fetch_assoc()){
                $this->Cell(13,10,$i++,1,0,'C');
                $x = $this->GetX();
                $this->Mycell(22,10,$x,$data['orderCustomId']);
                $x = $this->GetX();
                $this->Mycell(20,10,$x,$data['name']);
                $x = $this->GetX();
                $this->Mycell(20,10,$x,$data['dlb_name']);
                $x = $this->GetX();
                $this->Mycell(18,10,$x,$fm->TrakOrder($data['od_type']));
                $x = $this->GetX();
                $this->Mycell(22,10,$x,$fm->PaymentMethod($data['od_paymentStatus']));
                $x = $this->GetX();
                $this->Mycell(15,10,$x,count(explode(',',$data['od_items'])));
                $x = $this->GetX();
                $this->Mycell(15,10,$x,$data['od_price']);
                $x = $this->GetX();
                $this->Mycell(22,10,$x,$data['delever_date']);
                $x = $this->GetX();
                $this->Mycell(22,10,$x,$data['od_date']);
                $this->Ln();
               
    
            }
           
        }
    /*******========All orders Pending Start================= */
        function tableheaderPending(){
            $this->SetFont('Times','B',8);
            $this->Cell(25,10,'No',1,0,'C');
            $x = $this->GetX();
            $this->Mycell(25,10,$x,'Order/Tranjection ID');
            $x = $this->GetX();
            $this->Mycell(30,10,$x,'Order Dy');
            $x = $this->GetX();
            $this->Mycell(25,10,$x,'Payment Status');
            $x = $this->GetX();
            $this->Mycell(30,10,$x,'Total Items');
            $x = $this->GetX();
            $this->Mycell(25,10,$x,'Total Price');
            $x = $this->GetX();
            $this->Mycell(30,10,$x,'Order date');
            $this->Ln();
        }
        function tableViewPending($db,$fm){
            
            $this->SetFont('Times','',7);
            $query = "SELECT * FROM `tbl_orders` INNER JOIN tbl_user ON tbl_orders.customer_id = tbl_user.id where `od_type` = 1";
            $result = $db->SelectData($query);
            $i=1;
            while($data = $result->fetch_assoc()){
                $this->Cell(25,10,$i++,1,0,'C');
                $x = $this->GetX();
                $this->Mycell(25,10,$x,$data['orderCustomId']);
                $x = $this->GetX();
                $this->Mycell(30,10,$x,$data['name']);
                $x = $this->GetX();
                $this->Mycell(25,10,$x,$fm->PaymentMethod($data['od_paymentStatus']));
                $x = $this->GetX();
                $this->Mycell(30,10,$x,count(explode(',',$data['od_items'])));
                $x = $this->GetX();
                $this->Mycell(25,10,$x,$data['od_price']);
                $x = $this->GetX();
                $this->Mycell(30,10,$x,$data['od_date']);
                $this->Ln();
            }
        
        }
    /*******========All orders Active Start================= */
        function tableheaderActive(){
            $this->SetFont('Times','B',8);
            $this->Cell(25,10,'No',1,0,'C');
            $x = $this->GetX();
            $this->Mycell(25,10,$x,'Order/Tranjection ID');
            $x = $this->GetX();
            $this->Mycell(30,10,$x,'Order Dy');
            $x = $this->GetX();
            $this->Mycell(25,10,$x,'Payment Status');
            $x = $this->GetX();
            $this->Mycell(25,10,$x,'Total Items');
            $x = $this->GetX();
            $this->Mycell(25,10,$x,'Total Price');
            $x = $this->GetX();
            $this->Mycell(35,10,$x,'Order date');
            $this->Ln();
        }
        function tableViewActive($db,$fm){
            
            $this->SetFont('Times','',7);
            $query = "SELECT * FROM `tbl_orders` INNER JOIN tbl_user ON tbl_orders.customer_id = tbl_user.id where `od_type` = 2";
            $result = $db->SelectData($query);
            $i=1;
            while($data = $result->fetch_assoc()){
                $this->Cell(25,10,$i++,1,0,'C');
                $x = $this->GetX();
                $this->Mycell(25,10,$x,$data['orderCustomId']);
                $x = $this->GetX();
                $this->Mycell(30,10,$x,$data['name']);
                $x = $this->GetX();
                $this->Mycell(25,10,$x,$fm->PaymentMethod($data['od_paymentStatus']));
                $x = $this->GetX();
                $this->Mycell(25,10,$x,count(explode(',',$data['od_items'])));
                $x = $this->GetX();
                $this->Mycell(25,10,$x,$data['od_price']);
                $x = $this->GetX();
                $this->Mycell(35,10,$x,$data['od_date']);
                $this->Ln();
            }
        
        }
    /*******========All orders Reject Start================= */
        function tableheaderReject(){
            $this->SetFont('Times','B',8);
            $this->Cell(25,10,'No',1,0,'C');
            $x = $this->GetX();
            $this->Mycell(25,10,$x,'Order/Tranjection ID');
            $x = $this->GetX();
            $this->Mycell(35,10,$x,'Order Dy');
            $x = $this->GetX();
            $this->Mycell(25,10,$x,'Total Items');
            $x = $this->GetX();
            $this->Mycell(25,10,$x,'Total Price');
            $x = $this->GetX();
            $this->Mycell(30,10,$x,'Delevery/Recjec Date');
            $x = $this->GetX();
            $this->Mycell(25,10,$x,'Order date');
            $this->Ln();
        }
        function tableViewReject($db,$fm){
            
            $this->SetFont('Times','',7);
            $query = "SELECT * FROM `tbl_orders` INNER JOIN tbl_user ON tbl_orders.customer_id = tbl_user.idWHERE `od_type` = 4 ";
            $result = $db->SelectData($query);
            $i=1;
            while($data = $result->fetch_assoc()){
                $this->Cell(25,10,$i++,1,0,'C');
                $x = $this->GetX();
                $this->Mycell(25,10,$x,$data['orderCustomId']);
                $x = $this->GetX();
                $this->Mycell(35,10,$x,$data['name']);
                $x = $this->GetX();
                $this->Mycell(25,10,$x,count(explode(',',$data['od_items'])));
                $x = $this->GetX();
                $this->Mycell(25,10,$x,$data['od_price']);
                $x = $this->GetX();
                $this->Mycell(30,10,$x,$data['delever_date']);
                $x = $this->GetX();
                $this->Mycell(25,10,$x,$data['od_date']);
                $this->Ln();
            }
        
        }
    /*******========All orders Delever Start================= */
        function tableheaderDelever(){
            $this->SetFont('Times','B',8);
            $this->Cell(15,10,'No',1,0,'C');
            $x = $this->GetX();
            $this->Mycell(20,10,$x,'Order/Tranjection ID');
            $x = $this->GetX();
            $this->Mycell(30,10,$x,'Order Dy');
            $x = $this->GetX();
            $this->Mycell(30,10,$x,'Delvered Dy');
            $x = $this->GetX();
            $this->Mycell(25,10,$x,'Payment Status');
            $x = $this->GetX();
            $this->Mycell(15,10,$x,'Total Items');
            $x = $this->GetX();
            $this->Mycell(15,10,$x,'Total Price');
            $x = $this->GetX();
            $this->Mycell(20,10,$x,'Delevery/Recjec date');
            $x = $this->GetX();
            $this->Mycell(20,10,$x,'Order date');
            $this->Ln();
        }
        function tableViewDelever($db,$fm){
            
            $this->SetFont('Times','',7);
            $query = "SELECT *
            FROM `tbl_orders`
            INNER JOIN tbl_delevery_boy ON tbl_orders.delvery_boy_id = tbl_delevery_boy.dlb_id
            INNER JOIN tbl_user ON tbl_orders.customer_id = tbl_user.id where od_type = 3";
            $result = $db->SelectData($query);
            $i=1;
            while($data = $result->fetch_assoc()){
                $this->Cell(15,10,$i++,1,0,'C');
                $x = $this->GetX();
                $this->Mycell(20,10,$x,$data['orderCustomId']);
                $x = $this->GetX();
                $this->Mycell(30,10,$x,$data['name']);
                $x = $this->GetX();
                $this->Mycell(30,10,$x,$data['dlb_name']);
                $x = $this->GetX();
                $this->Mycell(25,10,$x,$fm->PaymentMethod($data['od_paymentStatus']));
                $x = $this->GetX();
                $this->Mycell(15,10,$x,count(explode(',',$data['od_items'])));
                $x = $this->GetX();
                $this->Mycell(15,10,$x,$data['od_price']);
                $x = $this->GetX();
                $this->Mycell(20,10,$x,'Delevery/Recjec Date');
                $x = $this->GetX();
                $this->Mycell(20,10,$x,$data['od_date']);
                $this->Ln();
            }
        
        }
}
    $pdf = new PDF('P','mm','A4');
    $pdf->Datacollect($od_type_id);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    if($od_type_id == 0){
        $pdf->tableheaderAll();
        $pdf->tableViewAll($db,$fm);
    }
    elseif($od_type_id == 1){
        $pdf->tableheaderPending();
        $pdf->tableViewPending($db,$fm);
    }
    elseif($od_type_id == 2){
        $pdf->tableheaderActive();
        $pdf->tableViewActive($db,$fm);
    }
    elseif($od_type_id == 3){
        $pdf->tableheaderReject();
        $pdf->tableViewReject($db,$fm);
    }
    elseif($od_type_id == 4){
        $pdf->tableheaderDelever();
        $pdf->tableViewDelever($db,$fm);
    }
   
    $pdf->Output();
?>

