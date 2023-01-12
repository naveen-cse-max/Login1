<?php
$email1=$_POST['email1'];
$password1=$_POST['password1'];


if(!empty($email)||!empty($password1))
{
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="login_det";

    //Establish a connection
    $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
    if (mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_errno() .') '
          . mysqli_connect_error());
      }
    else{
    $SELECT = "SELECT email1 From webapp Where email1 = ? Limit 1";
    $INSERT = "INSERT Into webapp (email1 ,password1 )values(?,?)";

    //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email1);
     $stmt->execute();
     $stmt->bind_result($email1);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
//       if ($rnum==0) 
//       {
//       $stmt->close();
//       $stmt = $conn->prepare($INSERT);
//       $stmt->bind_param("ss",$email,$password1);
//       $stmt->execute();
//       echo "New record inserted sucessfully";
//       } 
//       else 
//         {
//         echo "Someone already register using this email";
//         }
//     $stmt->close();
//     $conn->close();
//    }    
}
else 
{
echo "All field are required";
die();
}
?>