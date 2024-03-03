<?php
include("connection.php");
require './vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
$name = $_POST['name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$bloodgroup = $_POST['bloodgroup'];
$phoneno = $_POST['phoneno'];
$email = $_POST['email'];
$dept = $_POST['dept'];
$vtype = "Officer";
$term = $_POST['term'];
$address = $_POST['address'];
$pass = rand(1000, 9999);
$img_name = "img/" . $name . ".jpg";
move_uploaded_file($_FILES["img"]["tmp_name"],"img/" . $name . ".jpg");
$sql = "INSERT INTO officer_profile(officer_name,dob,gender,bloodgroup,phoneno,email,dept,term,otype,addres,img) VALUES('$name','$dob','$gender','$bloodgroup','$phoneno','$email','$dept','$term','$vtype','$address','$img_name')";

if (mysqli_query($conn, $sql)) {
  $sql="INSERT INTO pass (username,password,type)Values('$email','$pass','officer')";
  mysqli_query($conn, $sql);
  function send_mail($pass,$name,$email)
        {
            $mail = new PHPMailer(true);

        try {          
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'logincode22@gmail.com';                     
            $mail->Password   = 'qrvdbksguyxlldhb';                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465;                                    

            
            $mail->setFrom('logincode22@gmail.com', 'Confirmation Message'); 
            $mail->addAddress($email, $name);     
            $mail->isHTML(true);                     
            $mail->Subject = "You are registered Succussfully as Officer";
            $mail->Body = "Your Username is :" .$email. "<br> Password is :".$pass."<br>";

            $mail->send();
        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
        }
        }
        // send_mail($pass,$name,$email);
 

  echo "<script>alert('Officer added successfully')</script>";
  echo "<script>location.href = './nav_admin.php'</script>";

} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$conn->close();
?>