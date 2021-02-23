<?php

    if (isset($_POST['name']) && isset($_POST['email'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $body = $_POST['body'];

        require_once "./PHPMailer/PHPMailer.php";
        require_once "./PHPMailer/SMTP.php";
        require_once "./PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'naanman10@gmail.com';
        $mail->Password = 'july10th1990';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';

        //Email Settings
        $mail->setFrom($email, $name);
        $mail->addAddress(address: 'theafricanchild19@gmail.com');
        $mail->Subject = $subject;
        $mail->Body = $body;

        if($mail->send()){
            $response = "Email is Sent!";
        }else{
            $response = "Something when wrong: <br><br>" . $mail->ErrorInfo;

            exit(json_encode(array('response' = $response)));
        }

    }

?>