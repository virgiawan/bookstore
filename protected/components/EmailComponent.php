<?php
    Yii::import('application.extensions.phpmailer.PHPMailer');
    class EmailComponent extends CApplicationComponent{
        
        public function emailActivation($to, $code){
            $mail = new PHPMailer();  
            
            $mail->IsSMTP();  // telling the class to use SMTP
            $mail->Mailer = "smtp";
            $mail->Host = "ssl://smtp.gmail.com";
            $mail->Port = 465;
            $mail->SMTPAuth = true; // turn on SMTP authentication
            $mail->Username = "prenjak.cilek@gmail.com"; // SMTP username
            $mail->Password = "as3ntr4l"; // SMTP password 

            $mail->From     = "crazy_cow@4sum1.net";
            $mail->FromName = "ObralBuku.com";
            $mail->Sender = "crazy_cow@4sum1.net";
            $mail->AddReplyTo("crazy_cow@4sum1.net", "ObralBuku.com");

            $mail->AddAddress($to);  

            $mail->IsHtml(true);
            $mail->Subject  = "Aktivasi account  di ObralBuku.com";
            $mail->Body     = "Untuk aktivasi account silakan klik di <a href=\"".Yii::app()->createAbsoluteUrl('/member/default/activation',array('code'=>$code))."\">sini</a><br><b>Selamat berbelanja di ObralBuku.com</b>";
            if(!$mail->Send()) {
                echo 'Mailer error: ' . $mail->ErrorInfo;
                return false;
            } 
            else {
                return true;
            }
        }
        
    }

?>
