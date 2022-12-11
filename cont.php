
	<script type = "text/javascript">
		function emailSender () {

			var svr = new wepiServ();
			var t = "";
			var err = 0;
			if ( $_id("titel").value == "" ) {
					alert('<?php if ( $lang == "en" ) {
						echo "Enter a title!";
					} elseif ( $lang == "de" ) {
						echo "Bitte Titel angeben!";
					} ?>');
					err = 1;
			} else if ( $_id("nachricht_box").value == "" ) {
					alert('<?php if ( $lang == "en" ) {
						echo "Type your message!";
					} elseif ( $lang == "de" ) {
						echo "Bitte Nachricht verfassen!";
					} ?>');
					err = 1;
			} else if ( ( $_id("email").value == "" ) && ( $_id("tel").value == "" ) ) {
					alert('<?php if ( $lang == "en" ) {
						echo "Enter your phone-number or your e-mail-address or both!";
					} elseif ( $lang == "de" ) {
						echo "Bitte E-Mail oder Telefon oder beides angeben!";
					} ?>');
					err = 1;
			}
			if ( err == 0 ) {
					t = svr.Return( "Sende_Kontakt_Daten", 
						$_id("titel").value,
						$_id("email").value,
						$_id("tel").value,
						$_id("nachricht_box").value
					);
					alert('<?php if ( $lang == "en" ) {
						echo "Thank you\\n\\nWe have received your message and will contact you as soon as possible.";
					} elseif ( $lang == "de" ) {
						echo "Vielen Dank\\n\\nWir haben Ihre Nachricht erhalten und werden uns sobald wie möglich bei Ihnen melden.";
					} ?>');
					$_id("titel").value = "";
					$_id("email").value = "";
					$_id("tel").value = "";
					$_id("nachricht_box").value = "";
					$_id("msender").submit();
			}

		}
	</script>

  <style type = "text/css">
	.traf td {
		padding: 3px;
		font-family: Arial;
		font-size: 12px;
		font-weight: normal;
	}
	.traf td input {
		line-height: 24px;
		font-family: Arial;
		font-size: 16px;
		vertical-align: middle;
		padding: 2px;
		border: 1px solid rgb( 140, 140, 190 );
		/* ... */
		-khtml-border-radius:4px;
		-webkit-border-radius:4px;
		-moz-border-radius:4px;
		border-radius:4px;
		/* ... */
		box-shadow: 1px 1px 2px rgba(0,0,0,.25);
		-moz-box-shadow: 1px 1px 2px rgba(0,0,0,.25);
		-webkit-box-shadow: 1px 1px 2px rgba(0,0,0,.25);
		-khtml-box-shadow: 1px 1px 2px rgba(0,0,0,.25);
	}
	.traf td textarea {
		background-color: rgb( 255, 255, 255 );
		line-height: 24px;
		font-family: Arial;
		font-size: 16px;
		vertical-align: middle;
		padding: 2px;
		border: 1px solid rgb( 140, 140, 190 );
		/* ... */
		-khtml-border-radius:4px;
		-webkit-border-radius:4px;
		-moz-border-radius:4px;
		border-radius:4px;
		/* ... */
		box-shadow: 1px 1px 2px rgba(0,0,0,.25);
		-moz-box-shadow: 1px 1px 2px rgba(0,0,0,.25);
		-webkit-box-shadow: 1px 1px 2px rgba(0,0,0,.25);
		-khtml-box-shadow: 1px 1px 2px rgba(0,0,0,.25);
	}
  </style>

<?php

	if ( $mode == "send" ) {
		include "mailer.php";
		// *** //
		$titel = $_POST['titel'];
		$email = $_POST['email'];
		$tel = $_POST['tel'];
		$nach = $_POST['thema'];
		sende_die_mail( "info@allingmbh.de", "Titel: $titel\n\nE-Mail: $email\n\nTel: $tel\n\nNachricht:\n\n$nach" );
	}

              $query=mysql_query("SELECT * FROM aj_text WHERE kennung = 'cont' AND subkenn = '$lang' LIMIT 1");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

			  $inhl = "";

              while ( $datensatz = mysql_fetch_array($query) ) {

			  $inhl = ereg_replace("%@1","'",$datensatz['inhalt']);
			  
			  }

	if ( $inhl != "" ) {

	echo '<table border = "0" cellspacing = "0" cellpadding = "0" align = "center" width = "100%"><tr><td valign = "top" style = "padding-right: 20px;"><div style = "line-height:20px;">'.$inhl.'</div></td></tr><tr><td valign = "top">';

	}

?>

    <center>

        <h3>
		<?php if ( $lang == "en" ) { ?>
		Contact Form
		<?php } elseif ( $lang == "de" ) { ?>
        Kontaktformular
		<?php } ?>
		</h3>

		<form action = "index.php?page=cont&lang=de&mode=send" id = "msender" method = "post">
        <table border = "0" cellpadding = "0" cellspacing = "0" class = "traf" width = "70%" align = "center">

            <tr><td valign = "top"> <?php if ( $lang == "en" ) { ?>
		Title
		<?php } elseif ( $lang == "de" ) { ?>
        Titel
		<?php } ?>: <br /><input type = "text" value = "" id = "titel" name = "titel" style = "width:100%;" />   </td></tr>
            <tr><td valign = "top"> E-Mail : <br /><input type = "text" value = "" id = "email" name = "email" style = "width:100%;" />   </td></tr>
            <tr><td valign = "top"> <?php if ( $lang == "en" ) { ?>
		Phone
		<?php } elseif ( $lang == "de" ) { ?>
        Telefon
		<?php } ?>: <br /><input type = "text" value = "" id = "tel" name = "tel" style = "width:100%;" />   </td></tr>
            <tr><td valign = "top"> <?php if ( $lang == "en" ) { ?>
		Topic
		<?php } elseif ( $lang == "de" ) { ?>
        Thema
		<?php } ?>: <br /><textarea id = "nachricht_box" name = "thema" style = "width:100%;height:200px;"></textarea>   </td></tr>
            <tr><th valign = "top">   <br /><div align = "right">
					<input type = "button" value = "<?php if ( $lang == "en" ) { echo "Send"; } else { echo "Senden";} ?>" class = "default_button"
						   onclick = "javascript:emailSender();" />
						</div>  </th></tr>

        </table>
		</form>

</center>

<?php

	if ( $inhl != "" ) {

	echo '</td></tr></table>';

	}

?>
