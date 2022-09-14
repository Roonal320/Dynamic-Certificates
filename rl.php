<?php
$eid=$_POST["eid"];
$sdate=$_POST["sdate"];
$edate=$_POST["edate"];
$certyname=$_POST["certyname"];
$content=$_POST["content"]; 

require("fpdf/fpdf.php");
class mypdf extends FPDF{
    function Header(){
        $this->AddFont('DS','','DS-Bold.php');
        $this->AddFont('pfd','','pfd-Bold.php');
        $this->SetFont("Times",'B',30);
        $this->SetLineWidth(0.5);

        $this->Image("certy/logo2.png",35,35,150,200);

        $this->Image("certy/hwtbg.png",-1,-1,170,45);

        $this->Image("certy/jslogo2.png",140,25,60,15);


        $this->setTextColor(255,51,51);
        $this->SetFont('Helvetica','B',18);
        $text = "RELIEVING CERTIFICATE";
        $this->Text(105 - ($this->GetStringWidth($text) / 2), 70, $text);

    
        $this->SetFont('Helvetica','B',9);
        $text = "JAIN SOFTWARE PVT. LTD.";
        $this->Text(200 - $this->GetStringWidth($text), 15, $text);

        $this->SetFont('Helvetica','B',9);
        $text = "CIN : U72400CT2012PTC000557";
        $this->Text(200 - $this->GetStringWidth($text), 20, $text);
        $this->setTextColor(0,0,0);
        
        $this->SetFont('Helvetica','B',11);
        $text = "This is to certify that";
        $this->Text(105 - ($this->GetStringWidth($text) / 2), 115, $text); 

        $this->SetFont('Arial','B',11);
        $text = "Total Effective working days: 60 days";
        $this->Text(15, 170, $text);

        $this->SetFont('Arial','B',11);
        $text = "Total Present Days: 60 Days, Total Absent Days: 0 Days";
        $this->Text(15, 175, $text);

        $this->SetFont('Arial','B',11);
        $text = "Grades: ";
        $this->Text(15, 180, $text);

        $this->SetFont('Arial','U',15);
        $text = "                        ";
        $this->Text(20, 263, $text);
        
        $this->SetFont('Arial','',10);
        $text = "HR Department";
        $this->Text(21, 270, $text);

        $this->setTextColor(128,128,128);
        $this->SetFont('Arial','',9);
        $text = "To verify this please click on this link https://jainsoftware/rl";
        $this->Text(208 - $this->GetStringWidth($text), 289, $text);
        $this->setTextColor(0,0,0);

    }
    function Footer(){
        $this->SetXY(0,-6);
        $this->setTextColor(255,255,255);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(174,36,105);
        $this->Cell(210,6,"Jain Software Foundation",0,0,'C',1);
    }
    function choco($name,$date,$content,){

        $this->setTextColor(255,51,51);
        $this->SetFont('DS','',25);
        $text = "$name";
        $this->Text(105 - ($this->GetStringWidth($text) / 2), 135, $text);
        $this->setTextColor(0,0,0); 

        $this->SetFont('Helvetica','B',10);
        $text = "Date: $date";
        $this->SetXY(197-($this->GetStringWidth($text)),90);
        $this->Cell(0,6,$text,0,'L');

        $this->SetXY(15,145);
        $this->SetFont('Helvetica','B',11);
        $text = $content;
        $this->MultiCell(0, 6, $text,'J'); 

        // $this->SetFont('Arial','',11);
        // $text = "Code: $code";
        // $this->Text(195 - $this->GetStringWidth($text), 270, $text);

    }

}
require_once('config.php');

$name="";
    $select = "SELECT empname FROM employees WHERE id='$eid'";
    $query = mysqli_query($conn, $select);
    if($result = mysqli_fetch_array($query)) {
        $name=$result['empname'];
    }

$pdf=new mypdf();
$pdf->AddPage();
date_default_timezone_set('Asia/Kolkata');
$date=date("Y-m-d");
// $datetime=date("Y-m-d H:i:s");

// $bytes = openssl_random_pseudo_bytes(4);
// $pass = bin2hex($bytes);

if($certyname=="All"){
    $content="was Level with Jain Software Pvt. Ltd. as a <Designation> From $sdate to $edate, subsequent his resignation letter dated $edate, $name has been relieved of his duties.";
 }

 
// $code=rand(100000000,999999999);
$pdf->choco($name,$date,$content);
// $pdf->Image('certy/certy.png',0,0);
$filename="upload/Relieving Letter/".rand(100000000000,999999999999)."rl.pdf";
echo $filename;
$sql = "UPDATE empcertificate SET link='$filename' WHERE empid='$eid'and startdate='$sdate' and enddate='$edate' and certyid=3";
$querys=mysqli_query($conn,$sql);
if($querys){
    // $pdf->SetProtection(array('print'),$pass,'abc');
    $pdf->Output('F',$filename);
}
?>
?>