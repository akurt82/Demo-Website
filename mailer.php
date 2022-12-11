<?php 

  //Klasse einbinden
  require('mailer/class.phpmailer.php');

  function sende_die_mail(
  	$host, $auth, $secu, $port, $user, $pass, $from, $fromName, $subject, $body, $isHTML, $recieverMail	
  ) {

	  //Instanz von PHPMailer bilden
	  $mail = new PHPMailer();

	  $mail->SMTPDebug = 2;
	  $mail->Port = $port;
	  $mail->SMTPSecure = $secu;
	  
	  //Sprache
	  $mail->SetLanguage( "de", "phpmailer" );

	  //SMTP
	  $mail->IsSMTP();

	  //Der SMTP-Server
	  $mail->Host = $host;

	  //Meistens wird eine Authentifizierung
	  $mail->SMTPAuth = $auth;
	  $mail->CharSet = "utf-8";

	  //Der Benutzername
	  $mail->Username = $user;

	  //Und nun das Passwort
	  $mail->Password = $pass;

	  //Absenderadresse der Email setzen
	  $mail->From = $from;

	  //Name des Abenders setzen
	  $mail->FromName = $fromName;

	  //Betreff der Email setzen
	  $mail->Subject = $subject;

	  if ( $isHTML == true ) {
	  	$mail->isHTML(true);
	  }
	  
	  //Text der EMail setzen
	  $mail->Body = $body;

	  //Empfängeradresse setzen
	  $mail->AddAddress($recieverMail);
	  //EMail senden und überprüfen ob sie versandt wurde
	  if(!$mail->Send()) { $ret = 1; /*Fehler*/ } else { $ret = 0; /*Unterwegs*/ }

	  return $ret;

  }

?>
