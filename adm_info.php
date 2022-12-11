
<?php
	if ( ( $_SESSION['logged'] == 1 ) && ( $_SESSION['modus'] == 1 ) ) {
?>

<?php

	$pagerKey = "info";
	if ( $lang == "tr" ) {
	$pagerHdl = "Bilgi-&Ccedil;ubu&#287;u";
	} else {
	$pagerHdl = "Infoleiste";
	}

	$mode = trim($_POST['mode']);
	if ( $mode == "" ) { $mode = trim($_GET['mode']); }

	$md = trim($_POST['mode']);
	if ( $md == "" ) { $md = trim($_GET['mode']); }

	if ( $md == "chp" ) {

		$op = trim($_POST['istr']);
		$p1 = trim($_POST['iplz']);
		$p2 = trim($_POST['iort']);

		$tn = trim($_POST['telef']);
		$tx = trim($_POST['tefax']);
		$em = trim($_POST['email']);

		if ( ( $op == "" ) && ( $p1 == "" ) && ( $p2 == "" ) ) {

			$errmes = 1;

		} elseif ( ( $op == "" ) || ( $p1 == "" ) || ( $p2 == "" ) ) {

			$errmes = 2;

		} else {

		  $query=mysql_query("UPDATE aj_daten SET wert = '$op' WHERE kennung = 'mapdata' AND eintrag = 'strasse'");
		  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

		  $query=mysql_query("UPDATE aj_daten SET wert = '$p1' WHERE kennung = 'mapdata' AND eintrag = 'plz'");
		  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

		  $query=mysql_query("UPDATE aj_daten SET wert = '$p2' WHERE kennung = 'mapdata' AND eintrag = 'ort'");
		  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

		  $query=mysql_query("UPDATE aj_daten SET wert = '$tn' WHERE kennung = 'mapdata' AND eintrag = 'telefon'");
		  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
		  
		  $query=mysql_query("UPDATE aj_daten SET wert = '$tx' WHERE kennung = 'mapdata' AND eintrag = 'telefax'");
		  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
		  
		  $query=mysql_query("UPDATE aj_daten SET wert = '$em' WHERE kennung = 'mapdata' AND eintrag = 'email'");
		  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

		  $errmes = -1;

		}

	} elseif ( $md == "ch2" ) {

		$inh = trim($_POST['inh']);
		$iban = trim($_POST['iban']);
		$bic = trim($_POST['bic']);

		if ( ( $inh == "" ) && ( $iban == "" ) && ( $bic == "" ) ) {

			$errmes = 1;

		} elseif ( ( $inh == "" ) || ( $iban == "" ) || ( $bic == "" ) ) {

			$errmes = 2;

		} else {

		  $query=mysql_query("UPDATE aj_daten SET wert = '$inh' WHERE kennung = 'konto' AND eintrag = 'inhaber'");
		  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

		  $query=mysql_query("UPDATE aj_daten SET wert = '$iban' WHERE kennung = 'konto' AND eintrag = 'iban'");
		  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

		  $query=mysql_query("UPDATE aj_daten SET wert = '$bic' WHERE kennung = 'konto' AND eintrag = 'bic'");
		  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

		  $errmes = -1;

		}

	}

?>

	<div class = "titleOfDoc">
		<?php echo $pagerHdl; ?>
	</div>

	<center>
			<?php if ( $errmes == -1 ) { ?>
			<div style = "width: 400px;" class = "le_inf">
				<?php if ( $lang == "tr" ) { ?>
					De&#287;i&#351;iklikler kaydedildi.
				<?php } else { ?>
					&Auml;nderungen wurden erfolgreich gespeichert.
				<?php } ?>
			</div><br />
			<?php } ?>

			<?php if ( $errmes > 0 ) { ?>
			<div style = "width: 400px;" class = "lo_inf">
				<?php if ( $lang == "tr" ) { ?>
					<?php if ( $errmes == 1 ) { ?>
					T&uuml;m bilgiler girilmelidir.
					<?php } elseif ( $errmes == 2 ) { ?>
					En az bir kutu bo&#351; b&#305;rak&#305;lm&#305;&#351;!
					<?php } elseif ( $errmes == 3 ) { ?>
					Eski &#351;ifre ve tekrar&#305; uyu&#351;muyor!
					<?php } elseif ( $errmes == 4 ) { ?>
					Eski &#351;ifre do&287;ru girilmedi!
					<?php } ?>
				<?php } else { ?>
					<?php if ( $errmes == 1 ) { ?>
					Alle Felder m&uuml;ssen vollst&auml;ndig und korrekt eingegeben werden!
					<?php } elseif ( $errmes == 2 ) { ?>
					Mindestens ein Feld ist leer! Jedoch m&uuml;ssen alle Felder vollst&auml;ndig und korrekt eingegeben werden!
					<?php } elseif ( $errmes == 3 ) { ?>
					Neuer Kennwort und die Wiederholung stimmen nicht &uuml;berein! Bitte versuchen Sie es erneut!
					<?php } elseif ( $errmes == 4 ) { ?>
					Das alte Kennwort ist nicht korrekt! Bitte versuchen Sie es erneut!
					<?php } ?>
				<?php } ?>
			</div><br />
			<?php } ?>
	</center>
<?php

				  $query=mysql_query("SELECT * FROM aj_daten WHERE kennung = 'mapdata' ORDER BY id");
				  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

				  while ( $datensatz = mysql_fetch_array($query) ) {

						if ( $datensatz['eintrag'] == "strasse" ) { $op = $datensatz['wert']; } else
						if ( $datensatz['eintrag'] == "plz" ) { $p1 = $datensatz['wert']; } else
						if ( $datensatz['eintrag'] == "ort" ) { $p2 = $datensatz['wert']; } else
						if ( $datensatz['eintrag'] == "telefon" ) { $tn = $datensatz['wert']; } else
						if ( $datensatz['eintrag'] == "telefax" ) { $tx = $datensatz['wert']; } else
						if ( $datensatz['eintrag'] == "email" ) { $em = $datensatz['wert']; }

				  }

?>
	<table border = "0" cellspacing = "0" cellpadding = "0" style = "padding: 10px;" align = "center"><tr>

	<td valign = "top">

			<form action = "index.php?page=info&mode=chp" method = "post">
				<table border = "0" cellspacing = "0" cellpadding = "0" class = "ga_tab" style = "width: 400px;">
					<tr>
						<th colspan = "2" align = "right" style = " text-align: left;">
							<?php if ( $lang == "tr" ) { ?>
								Bilgileriniz
							<?php } else { ?>
								Ihre Daten
							<?php } ?>
						</th>
					</tr>
					<tr>
						<td><?php if ( $lang == "tr" ) { ?>
								Cadde
							<?php } else { ?>
								Strasse
							<?php } ?>
: </td>
						<td> <input style = "background: url('imgs/inbox2.png') no-repeat center center; border-top: 1px solid rgb(150,150,150);border-left: 1px solid rgb(150,150,150);border-right: 1px solid rgb(250,250,250);border-bottom: 1px solid rgb(250,250,250); width: 250px;" type = "text" name = "istr" id = "istr" value = "<?php echo $op; ?>" /> </td>
					</tr>
					<tr>
						<td > <?php if ( $lang == "tr" ) { ?>
								Posta-kodu
							<?php } else { ?>
								PLZ
							<?php } ?>: </td>
						<td > <input style = "background: url('imgs/inbox2.png') no-repeat center center; border-top: 1px solid rgb(150,150,150);border-left: 1px solid rgb(150,150,150);border-right: 1px solid rgb(250,250,250);border-bottom: 1px solid rgb(250,250,250); width: 250px;" type = "text" name = "iplz" id = "iplz" value = "<?php echo $p1; ?>" /> </td>
					</tr>
					<tr>
						<td > <?php if ( $lang == "tr" ) { ?>
								Yer
							<?php } else { ?>
								Ort
							<?php } ?>: </td>
						<td > <input style = "background: url('imgs/inbox2.png') no-repeat center center; border-top: 1px solid rgb(150,150,150);border-left: 1px solid rgb(150,150,150);border-right: 1px solid rgb(250,250,250);border-bottom: 1px solid rgb(250,250,250); width: 250px;" type = "text" name = "iort" id = "iort" value = "<?php echo $p2; ?>" /> </td>
					</tr>
					<tr>
						<td > <?php if ( $lang == "tr" ) { ?>
								Telefon
							<?php } else { ?>
								Telefon
							<?php } ?>: </td>
						<td > <input style = "background: url('imgs/inbox2.png') no-repeat center center; border-top: 1px solid rgb(150,150,150);border-left: 1px solid rgb(150,150,150);border-right: 1px solid rgb(250,250,250);border-bottom: 1px solid rgb(250,250,250); width: 250px;" type = "text" name = "telef" id = "telef" value = "<?php echo $tn; ?>" /> </td>
					</tr>
					<tr>
						<td > <?php if ( $lang == "tr" ) { ?>
								Faks
							<?php } else { ?>
								Fax
							<?php } ?>: </td>
						<td > <input style = "background: url('imgs/inbox2.png') no-repeat center center; border-top: 1px solid rgb(150,150,150);border-left: 1px solid rgb(150,150,150);border-right: 1px solid rgb(250,250,250);border-bottom: 1px solid rgb(250,250,250); width: 250px;" type = "text" name = "tefax" id = "tefax" value = "<?php echo $tx; ?>" /> </td>
					</tr>
					<tr>
						<td > <?php if ( $lang == "tr" ) { ?>
								E-Posta
							<?php } else { ?>
								E-Mail
							<?php } ?>: </td>
						<td > <input style = "background: url('imgs/inbox2.png') no-repeat center center; border-top: 1px solid rgb(150,150,150);border-left: 1px solid rgb(150,150,150);border-right: 1px solid rgb(250,250,250);border-bottom: 1px solid rgb(250,250,250); width: 250px;" type = "text" name = "email" id = "email" value = "<?php echo $em; ?>" /> </td>
					</tr>
					<tr>
						<td colspan = "2" align = "right"> <div align = "right"> <input type = "submit" value = "<?php
	if ( $lang == "tr" ) { echo "De&#287;i&#351;tir"; } else { echo "&Auml;ndern"; }
						?>" class = "defbutton" /></div> </td>
					</tr>
				</table>
			</form>

	</td><td valign = "top" style = "padding-left:40px;width:340px;">

		<?php if ( $lang == "tr" ) { ?>
		Burda girilen bilgiler sayfan&#305;z&#305;n en alt&#305;nda bulunan bilgi-&ccedil;ubu&#287;una yans&#305;t&#305;l&#305;r.
		<?php } else { ?>
		Die hier angegebene Informationen werden auf der Infoleiste ganz unten auf der Webseite dargestellt.
		<?php } ?>

	</td>

	</tr><tr>

	<td valign = "top" style = "padding-top: 30px;">
<?php

				  $query=mysql_query("SELECT * FROM aj_daten WHERE kennung = 'konto' ORDER BY id");
				  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

				  while ( $datensatz = mysql_fetch_array($query) ) {

						if ( $datensatz['eintrag'] == "inhaber" ) { $inh = $datensatz['wert']; } else
						if ( $datensatz['eintrag'] == "iban" ) { $iban = $datensatz['wert']; } else
						if ( $datensatz['eintrag'] == "bic" ) { $bic = $datensatz['wert']; }

				  }

?>
			<form action = "index.php?page=info&mode=ch2" method = "post">
				<table border = "0" cellspacing = "0" cellpadding = "0" class = "ga_tab" style = "width: 400px;">
					<tr>
						<th colspan = "2" align = "right" style = " text-align: left;">
							<?php if ( $lang == "tr" ) { ?>
								Hesap bilgileriniz
							<?php } else { ?>
								Ihre Bankdaten
							<?php } ?>
						</th>
					</tr>
					<tr>
						<td><?php if ( $lang == "tr" ) { ?>
								Hesap&nbsp;Sahibi
							<?php } else { ?>
								Inhaber
							<?php } ?>
: </td>
						<td> <input style = "background: url('imgs/inbox2.png') no-repeat center center; border-top: 1px solid rgb(150,150,150);border-left: 1px solid rgb(150,150,150);border-right: 1px solid rgb(250,250,250);border-bottom: 1px solid rgb(250,250,250); width: 250px;" type = "text" name = "inh" id = "inh" value = "<?php echo $inh; ?>" /> </td>
					</tr>
					<tr>
						<td > <?php if ( $lang == "tr" ) { ?>
								IBAN
							<?php } else { ?>
								IBAN
							<?php } ?>: </td>
						<td > <input style = "background: url('imgs/inbox2.png') no-repeat center center; border-top: 1px solid rgb(150,150,150);border-left: 1px solid rgb(150,150,150);border-right: 1px solid rgb(250,250,250);border-bottom: 1px solid rgb(250,250,250); width: 250px;" type = "text" name = "iban" id = "iban" value = "<?php echo $iban; ?>" /> </td>
					</tr>
					<tr>
						<td > <?php if ( $lang == "tr" ) { ?>
								BIC
							<?php } else { ?>
								BIC
							<?php } ?>: </td>
						<td > <input style = "background: url('imgs/inbox2.png') no-repeat center center; border-top: 1px solid rgb(150,150,150);border-left: 1px solid rgb(150,150,150);border-right: 1px solid rgb(250,250,250);border-bottom: 1px solid rgb(250,250,250); width: 250px;" type = "text" name = "bic" id = "bic" value = "<?php echo $bic; ?>" /> </td>
					</tr>
					<tr>
						<td colspan = "2" align = "right"> <div align = "right"> <input type = "submit" value = "<?php
	if ( $lang == "tr" ) { echo "De&#287;i&#351;tir"; } else { echo "&Auml;ndern"; }
						?>" class = "defbutton" /></div> </td>
					</tr>
				</table>
			</form>

	</td><td valign = "top" style = "padding-left:40px;width:340px;padding-top:30px;">

		<?php if ( $lang == "tr" ) { ?>
		Burda girilen bilgiler sipari&#351; yap&#305;ld&#305;ktan sonra, m&uuml;&#351;teriye &ouml;deme yapabilmesi i&ccedil;in 
		g&ouml;sterilecektir.
		<?php } else { ?>
		Das hier angegebene Konto wird nach der Bestellung dem Kunden angezeigt, sodass er die &Uuml;berweisung auf das Konto 
		vornehmen kann.
		<?php } ?>

	</td>

	</tr></table>

<?php

	} else {
	
		echo "Sie m&uuml;ssen sich anmelden, um diese Seite aufrufen zu k&ouml;nnen.";
	
	}

?>
