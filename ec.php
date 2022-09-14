<?php
$eid=$_POST["eid"];
$sdate=$_POST["sdate"];
$edate=$_POST["edate"];
$certyname=$_POST["certyname"];
$content=$_POST["content"]; 

require("fpdf/fpdf.php");
class mypdf extends FPDF{
    function Header(){
        // $this->SetDrawColor(189,183,107);
        $this->SetRightMargin(15); 
        $this->AddFont('DS','','DS-Bold.php');
        $this->AddFont('pfd','','pfd-Bold.php');
        $this->SetFont("Times",'B',30);

        $this->Image("certy/logo2.png",35,35,150,200);

     
        $this->Image("certy/hwtbg.png",-1,-1,170,45);

        $this->Image("certy/jslogo2.png",140,25,60,15);


        $this->setTextColor(255,51,51);
        $this->SetFont('Helvetica','B',18);
        $text = "EXPERIENCE CERTIFICATE";
        $this->Text(105 - ($this->GetStringWidth($text) / 2), 70, $text);

        $this->SetFont('Helvetica','B',9);
        $text = "JAIN SOFTWARE PVT. LTD.";
        $this->Text(200 - $this->GetStringWidth($text), 15, $text);

        $this->SetFont('Helvetica','B',9);
        $text = "CIN : U72400CT2012PTC000557";
        $this->Text(200 - $this->GetStringWidth($text), 20, $text);
        $this->setTextColor(0,0,0);

        $this->SetFont('Arial','B',11);
        $text = "This certificate is presented to";
        $this->Text(105 - ($this->GetStringWidth($text) / 2), 115, $text);  
  
        $this->SetRightMargin(15); 

        $this->SetXY(10,170);
        $this->SetFont('Arial','B',11);
        $text = "We wish him/her a good life and better opportunities of employment." ;
        $this->MultiCell(190, 6, $text,0,'C');

        $this->SetFont('Arial','BU',15);
        $text = "                                   ";
        $this->Text(15, 270, $text);  

        $this->SetFont('Arial','B',10);
        $text = "Rahul Rajak";
        $this->Text(15, 275, $text);  

        $this->SetFont('Arial','',10);
        $text = "Manager";
        $this->Text(15, 280, $text);  

    }
    function Footer(){
        $this->SetXY(0,-6);
        $this->setTextColor(255,255,255);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(174,36,105);
        $this->Cell(210,6,"Jain Software Foundation",0,0,'C',1);
    }
    function choco($date,$name,$content){

        $this->SetFont('Helvetica','B',10);
        $text = "Date: $date";
        $this->SetXY(197-($this->GetStringWidth($text)),90);
        $this->Cell(0,6,$text,0,'L');

        $this->setTextColor(255,51,51);
        $this->SetFont('DS','',25);
        $text = "$name";
        $this->Text(105 - ($this->GetStringWidth($text) / 2), 135, $text);
        $this->setTextColor(0,0,0);

        $this->SetXY(10,145);
        $this->SetFont('Arial','B',11);
        $text = $content ;
        $this->MultiCell(190, 6, $text,0,'C');

        // $this->SetFont('Arial','',11);
        // $text = "Code: $code";
        // $this->Text(195 - $this->GetStringWidth($text), 243, $text);

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
$date=date("Y-m-d ");
// $datetime=date("Y-m-d H:i:s");
// $bytes = openssl_random_pseudo_bytes(4);
// $pass = bin2hex($bytes);

if($certyname=="All"){
    $content="for the experience gained in our organization. As the head of out HR department, I hereby testify that this employee has worked in our company from $sdate  to $edate and has gained experience as a Developer of the Software Department";
 }

// $code=rand(100000000,999999999);
$pdf->choco($date,$name,$content);
$filename="upload/Experience Certificate/".rand(100000000000,999999999999)."ec.pdf";
echo $filename;
$sql = "UPDATE empcertificate SET link='$filename' WHERE empid='$eid'and startdate='$sdate' and enddate='$edate' and certyid=2";
$querys=mysqli_query($conn,$sql);
if($querys){
    $pdf->Output('F',$filename);
}

?>