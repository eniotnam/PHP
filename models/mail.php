<?php

class email{

    // COTE CLIENT
    public function inscriNews($mail){
        $to      = $mail;
        $subject = 'Inscription Newletter ';
       
        $headers = 'From:NEWSLETTER [Votre site]<[adresse mail de votre site]>'. "\r\n";
         $headers .= 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         $message = '<html >
    <head>
        <meta charset="UTF-8">
        <title>[NOM DE VOTRE SITE]</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    </head>
    <body >
           

    </body>
</html>';
        mail($to, $subject, $message,$headers);
    }
    // COTE ADMIN
    public function NEWinscriNews($mail){
        $to      = [adresse de votre site];
        $subject = 'Inscription Newletter [nom de votre site]';
        $message = $mail.' s\'est inscrit à votre newsletter';
        $headers = 'From:UN NOUVEL INSCRIT<'.$to.'>';
        mail($to, $subject, $message,$headers);
    }  
    // PAGE CONTACT 
    public function contact($name,$phone,$subject,$mail,$message){
        $to = [adresse de votre site];
        $messages = $message."\n".$name."\n".$mail."\n".$phone;
         $headers = 'From:'.$name.'<'.$mail.'>';
        mail($to, $subject, $messages,$headers);
        
    }
   
}
?>

