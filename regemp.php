<?php
require_once "config.php";
// $countfiles = count($_FILES['file']['name']);
// for($i=0;$i < $countfiles;$i++){

// }
$eid=$_POST["eid"];
$rdate=$_POST["rdate"];
$sdate=$_POST["sdate"];
$edate=$_POST["edate"];
$certy=$_POST["certy"];
$content=$_POST["content"];
// $empname=$certyname=$link=$content=';
$certyid=$date=0;
// $date=0000-00-00;
$err = "";

// extract($_POST);
echo $eid;
echo $sdate;
echo $edate;
echo $certy;
echo $content;
// echo 'fagasdgas';
// if (isset($_POST['submit'])){

    if(empty($eid) || empty($rdate) || empty($sdate) || empty($edate) || empty($certy)){
       $err = "Credentials cannot be blank";
       echo $err;
      }
    else{
        switch($certy){
            case "NOC":$certyid=1;
                    break;
            case "Experience Certificate":$certyid=2;
            break;
            case "Relieving Letter":$certyid=3;
            break;
            default: $certyid=0;           

        }
        // $select = "SELECT id FROM employees WHERE empname='$name'";
		// 							$query = mysqli_query($conn, $select);
		// 							while ($result = mysqli_fetch_array($query)) {
        //                                 $eid=$result['id'];
        //                             }
        $date=date('Y-m-d');
        if($certy=="All"){
             for( $i=0;$i<3;$i++){
                $certyid=$i+1;
                $sql = "INSERT INTO empcertificate(empid, certyid, curdate, startdate, enddate, certyname, content) VALUES ('$eid','$certyid','$rdate','$sdate','$edate','$certy','$content')";
                $stmt = mysqli_prepare($conn, $sql);
                if($stmt)
                {
                    if(mysqli_stmt_execute($stmt)){
                        mysqli_stmt_store_result($stmt);
                        if(mysqli_stmt_num_rows($stmt) == 1)
                        {
                            $err = "This Topic already exists"; 
                        }
                    }
                    else{
                        echo "Something went wrong";
                    }
                }
                mysqli_stmt_close($stmt);
                if($err){
                    echo $err;
                }
             }
        }
        else{
        $sql = "INSERT INTO empcertificate(empid, certyid, curdate, startdate, enddate, certyname, content) VALUES ('$eid','$certyid','$rdate','$sdate','$edate','$certy','$content')";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $err = "This Topic already exists"; 
                }
            }
            else{
                echo "Something went wrong";
            }
        }
        mysqli_stmt_close($stmt);
        if($err){
            echo $err;
        }
    } 
    }
?>