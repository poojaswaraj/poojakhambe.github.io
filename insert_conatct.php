<?php



$name=$_POST["name"];
// $Telephone=$_POST["Telephone"];

$Email=$_POST["email"];
$Subject=$_POST["subject"];
$Message=$_POST["message"];


// $sql = "INSERT INTO Contact (name, phone_no, email,subject,message)
// VALUES ('$name', '$Telephone','$Email','$Subject','$Message')"; 
 
// if ($con->query($sql) === TRUE) {
  require_once('PHPMailer_5.2.4/class.phpmailer.php');
                $mail= new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPDebug=1;
                $mail->SMTPAuth=true;
                $mail->SMTPSecure='';
                $mail->Host = "mail.samarthitsolution.net";
                //  $mail->Host = "smtp.gmail.com";
                $mail->Port = 587;
                $mail->IsHTML (true);
                $mail->Username = 'poojakhambe@samarthitsolution.net';
                $mail->Password = 'pooja@2018';
                $mail->SetFrom($Email);
            
                $mail->AddAddress('poojakhambe@samarthitsolution.net');
                    $mail->Subject = "Received Enquiry through client";

                $mail->Body = "Client Name:".$name. "<BR><BR>".
                 "Email:". $Email."<br><BR>"
                 ."Mobile No:".$Subject."<br><BR>"."Description:".$Message;
                
             

              
                if(!$mail->Send()) {
                    // echo "Mailer Error" . $mail->ErrorInfo;
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }
                else
                {
				$mail->ClearAllRecipients();
				$mail->SetFrom('poojakhambe@samarthitsolution.net');

				$mail->AddAddress($Email);
				$mail->Subject = "Received Enquiry through Online Shopping";
				$mail->Body = "Thank You For Contact us We Will get Back Soon..";
				 if(!$mail->Send()) {
                    // echo "Mailer Error" . $mail->ErrorInfo;
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }
                else
                {
                  	echo '1';
                }
                }
                
                



// } else {
//   echo "Error: " . $sql . "<br>" . $con->error;
// }

// $con->close();