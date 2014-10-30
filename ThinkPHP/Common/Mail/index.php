<?php
 include'PHPMailerAutoload.php';

    function smtp_mail( $sendto_email, $subject, $body, $extra_hdrs, $user_name){    
        $mail = new PHPMailer();    
        $mail->IsSMTP();                  // send via SMTP    
        $mail->Host = "smtp.163.com";   // SMTP servers    
        $mail->SMTPAuth = true;           // turn on SMTP authentication    
        $mail->Username = "solanzn";     // SMTP username  注意：普通邮件认证不需要加 @域名    
        $mail->Password = "slzn82038400"; // SMTP password    
        $mail->From = "solanzn@163.com";      // 发件人邮箱    
        $mail->FromName =  "管理员";  // 发件人    

        $mail->CharSet = "utf8";   // 这里指定字符集！    
        $mail->Encoding = "base64";    
        $mail->AddAddress($sendto_email,"username");  // 收件人邮箱和姓名    
        $mail->AddReplyTo("solanzn@163.com","solanzn@163.com");    
        //$mail->WordWrap = 50; // set word wrap 换行字数    
        //$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment 附件    
        //$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    
        $mail->IsHTML(true);  // send as HTML    
        // 邮件主题    
        $mail->Subject = $subject;    
        // 邮件内容    
        $mail->Body = "<p>dd</p>";                                                                          
        $mail->AltBody ="text/html";    
        if(!$mail->Send())    
        {    
            echo "no ok! <p>";    
            echo ":" . $mail->ErrorInfo;    
            exit;    
        }    
        else {    
            echo "send ok!<br />";    
        }    
    }    
    // 参数说明(发送到, 邮件主题, 邮件内容, 附加信息, 用户名)    
    smtp_mail("451436241@qq.com", "欢迎使用phpmailer！", "欢迎使用phpmailer！欢迎使用phpmailer！", "solanzn@163.com", "username");   


?>