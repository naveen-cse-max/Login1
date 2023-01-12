<?php
$uname1=$_POST['uname1'];
$email2=$_POST['email2'];
$password2=$_POST['password2'];
$password3=$_POST['password3'];

if(!empty($uname1)||!empty($email2)||!empty($password2)||!empty($password3))
{
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="loginreg";

    //Establish a connection
    $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
    if (mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_errno() .') '
          . mysqli_connect_error());
      }
    else{
    $SELECT = "SELECT email2 From regdet Where email2 = ? Limit 1";
    $INSERT = "INSERT Into regdet (uname1 , email2 ,password2, password3)values(?,?,?,?)";

    //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email2);
     $stmt->execute();
     $stmt->bind_result($email2);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) 
      {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $uname1,$email2,$password2,$password3);
      $stmt->execute();
      echo "New record inserted sucessfully"; 
      else 
        {
        echo "Someone already register using this email";
        }
    $stmt->close();
    $conn->close();
   }    
}
else 
{
echo "All field are required";
die();
}
?>