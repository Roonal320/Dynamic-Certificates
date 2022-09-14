<?php
$eid=$_POST["eid"];
$sdate=$_POST["sdate"];
$edate=$_POST["edate"];
$certyname=$_POST["certyname"];
$content=$_POST["content"]; 

require("fpdf/fpdf.php");

class mypdf extends FPDF{
    function Header(){
        $this->AddFont('pfd','','pfd-Bold.php');
        $this->SetFont("Times",'B',30);
        $this->Image("certy/logo2.png",35,35,150,200);

        $this->Image("certy/hwtbg.png",-1,-1,170,45);

        $this->Image("certy/jslogo2.png",140,25,60,15);

        $this->setTextColor(255,51,51);
        $this->SetFont('Helvetica','B',18);
        $text = "NO OBJECTION CERTIFICATE";
        $this->Text(105 - ($this->GetStringWidth($text) / 2), 70, $text);

    
        $this->SetFont('Helvetica','B',9);
        $text = "JAIN SOFTWARE PVT. LTD.";
        $this->Text(200 - $this->GetStringWidth($text), 15, $text);

        $this->SetFont('Helvetica','B',9);
        $text = "CIN : U72400CT2012PTC000557";
        $this->Text(200 - $this->GetStringWidth($text), 20, $text);
        $this->setTextColor(0,0,0);
        
        $this->SetXY(15,115);
        $this->SetFont('Helvetica','B',10);
        $text = "Besides having a pleasing personality, he/she also bears a good moral character and conduct and  also possess active habit and manners." ;
        $this->MultiCell(0, 5, $text,'J');
       
        $this->SetXY(15,130);
        $this->SetFont('Helvetica','B',10);
        $text = "He handled his assignments with utmost care and has shown self initiative in discharging his routine responsibilities quite efficiently. He has proved to be a consentious and reliable employee whose conduct has been excellent during the tenure of his services." ;
        $this->MultiCell(0, 5, $text,'J');

        $this->SetXY(15,150);
        $this->SetFont('Helvetica','B',10);
        $text = "We have no objection on his applting or get job in any other organisation/company." ;
        $this->MultiCell(0, 5, $text,'J');

        $this->SetXY(15,160);
        $this->SetFont('Helvetica','B',10);
        $text = "His performance during this period is up to the required standard> We wish him luck in his future endeveor.";
        $this->MultiCell(0, 5, $text,'J');

        $this->SetFont('Helvetica','',11);
        $text = "Regards";
        $this->SetXY(15,240);
        $this->Cell(0,5,$text,0,'L');

        $this->SetFont('Arial','BU',15);
        $text = "                                   ";
        $this->Text(15, 263, $text);  

        $this->SetFont('Helvetica','',10);
        $text = "[HR MANAGER]";
        $this->SetXY(15,265);
        $this->Cell(0,6,$text,0,'L');

        $this->SetFont('Helvetica','',10);
        $text = "Rahul Rajak";
        $this->SetXY(15,270);
        $this->Cell(0,6,$text,0,'L');

    }
    function Footer(){
        $this->SetXY(0,-6);
        $this->setTextColor(255,255,255);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(174,36,105);
        $this->Cell(210,6,"Jain Software Foundation",0,0,'C',1);
    }
    function choco($content,$date){
        
        $this->SetXY(15,101);
        $this->SetFont('Helvetica','B',10);
        $text = $content ;
        $this->MultiCell(0, 5, $text,'J');

        $this->SetFont('Helvetica','B',10);
        $text = "Date: $date";
        $this->SetXY(197-($this->GetStringWidth($text)),82);
        $this->Cell(0,6,$text,0,'L');

        // $this->SetFont('Arial','',11);
        // $text = "Code: $code";
        // $this->Text(195 - $this->GetStringWidth($text), 270, $text);

    }

}
require_once('config.php');

// $select = "SELECT id FROM employees WHERE empname='$name' ";
// $query = mysqli_query($conn, $select);
// while ($result = mysqli_fetch_array($query)) {
//     $eid=$result['id'];
// }

$pdf=new mypdf();
$pdf->AddPage();

$name="";
    $select = "SELECT empname FROM employees WHERE id='$eid'";
                                $query = mysqli_query($conn, $select);
                                if($result = mysqli_fetch_array($query)) {
                                    $name=$result['empname'];
                                }

date_default_timezone_set('Asia/Kolkata');
$date=date("Y-m-d");
// $datetime=date("Y-m-d H:i:s");

// $bytes = openssl_random_pseudo_bytes(4);
// $pass = bin2hex($bytes);

if($certyname=="All"){
   $content="This is to certify that Mr./Mrs. $name has worked with this company from $sdate to $edate as Software Developer";
}

$code=rand(100000000,999999999);
$pdf->choco($content,$date,$code);
// $pdf->Image('certy/certy.png',0,0);
$filename="upload/NOC/".rand(100000000000,999999999999)."noc.pdf";
echo $filename;

$sql = "UPDATE empcertificate SET link='$filename' WHERE empid='$eid' and startdate='$sdate' and enddate='$edate' and certyid=1";
$querys=mysqli_query($conn,$sql);
if($querys){
    // $pdf->SetProtection(array('print'),$pass,'abc');
    $pdf->Output('F',$filename);
}


?>