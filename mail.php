<?php require 'PHPMailer/PHPMailerAutoload.php';?>
<?php
function Redirect_to($New_Location)
{header("Location:" . $New_Location);
    exit;
}

// call the contact() function if contact_btn is clicked
if (isset($_POST['contact_btn'])) {
    contact();
}

function contact()
{
    if (isset($_POST["contact_btn"])) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $message = $_POST["message"];
        // Email Functionality

        date_default_timezone_set('Etc/UTC');

        $mail1 = new PHPMailer();
        $mail2 = new PHPMailer();

        $mail1->setFrom($_POST['email']);
        $mail2->setFrom($_POST['email']);
        
        $mail1->addAddress('ammastud.mit@gmail.com');
        $mail2->addAddress($email);

        // The subject of the message.
        $mail1->Subject = 'Received Message From Client ' . $name;
        $mail2->Subject = 'Hey '.$name.', your message is submitted, Thanks for contacting me, I will right back to you..!';

        $message = '<html><body>';

        $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';

        $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['name']) . "</td></tr>";

        $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";

        $message .= "<tr><td><strong>Subject:</strong> </td><td>" . strip_tags($_POST['phone']) . "</td></tr>";

        $message .= "<tr><td><strong>Message</strong> </td><td>" . strip_tags($_POST['message']) . "</td></tr>";

        $message .= "</table>";
        $message .= "</body></html>";

        $mail1->Body = $message;
        $mail2->Body = $message;

        $mail1->isHTML(true);
        $mail2->isHTML(true);

        if ($mail1->send()&&$mail2->send()) {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Hey, Check your mailbox your message is submitted sucessfully , Thanks for contacting me, I will right back to you...❣️');
            window.location.href='index.html';
            </script>");
            Redirect_to("index.html");
        } else {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Please Enter correct E-mail ID');
            window.location.href='index.html';
            </script>");
            Redirect_to("index.html");
        }

    } //Ending of Submit Button If-Condition

}

?>
