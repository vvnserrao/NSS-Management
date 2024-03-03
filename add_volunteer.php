<?php
include("connection.php");
 require './vendor/autoload.php';
 use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;
$rollno = $_POST['rollno'];
$sname = $_POST['name'];
$fname = $_POST['fname'];
$class= $_POST['class'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$bloodgroup = $_POST['bloodgroup'];
$Category = $_POST['Category'];
$phoneno = $_POST['phoneno'];
$email = $_POST['email'];
$vtype = "volunteer";
$y = explode(" ", $class);
$year = $y[0];
$batch = $_POST['batch'];
$address = $_POST['address'];
$pass = rand(1000, 9999);
$img_name = "img/" . $rollno . ".jpg";
move_uploaded_file($_FILES["img"]["tmp_name"],"img/" . $rollno . ".jpg");
$sql = "SELECT * FROM volunteer_profile WHERE rollno = '$rollno'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Record already exists!')</script>";
        echo "<script>window.history.back();</script>";
    } 
    else {
$sql = "INSERT INTO volunteer_profile(rollno,volunteer_name,fname,class,dob,gender,bloodgroup,phoneno,email,vtype,batch,team,addres,Category,year,img) VALUES('$rollno','$sname','$fname','$class','$dob','$gender','$bloodgroup','$phoneno','$email','$vtype','$batch','-','$address','$Category','$year','$img_name')";

if (mysqli_query($conn, $sql)) {
  $sql="INSERT INTO pass (username,password,type)Values('$rollno','$pass','$vtype')";
  mysqli_query($conn, $sql);
 
    function send_mail($pass,$sname,$email,$rollno)
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
            $mail->addAddress($email, $sname);     
            $mail->isHTML(true);                     
            $mail->Subject = "You are Successfully registered as NSS Volunteer";
            $mail->Body = "Your Username is :" .$rollno. "<br> Password is :".$pass;
            $mail->send();
        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
        }
        }
        send_mail($pass,$sname,$email,$rollno);
  echo "<script>alert('Volunteer added successfully')</script>";
  echo "<script>location.href = './add_volunteer.html'</script>";
  // echo "<script> window.history.back();</script>";

} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$conn->close();
    }
