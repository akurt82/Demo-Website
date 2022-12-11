<?php
	if ( $lang == "tr" ) {
		$pathbar_admin = "Y&ouml;netim";
		$pathbar_setup = "Ayarlar";
		$pathbar_pass  = "&#350;ifre";
	} else {
		$pathbar_admin = "Administration";
		$pathbar_setup = "Einstellungen";
		$pathbar_pass  = "Kennwort";
	}
?>

<div class="pathbar">
<a href="index.php?page=home&lang=<?php echo $lang; ?>"><?php echo $pathbar_admin; ?></a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;&nbsp;<?php echo $pathbar_setup; ?>&nbsp;&rarr;&nbsp;&nbsp;<?php echo $pathbar_pass; ?>
</div>

<?php

	if ( ( $_SESSION['logged'] == 1 ) && ( $_SESSION['modus'] == 1 ) ) {

	$errmes = 0;

	$md = trim($_POST['mode']);
	if ( $md == "" ) { $md = trim($_GET['mode']); }

	if ( $md == "chp" ) {

		$op = trim($_POST['opas']);
		$p1 = trim($_POST['pas1']);
		$p2 = trim($_POST['pas2']);

		if ( ( $op == "" ) && ( $p1 == "" ) && ( $p2 == "" ) ) {

			$errmes = 1;

		} elseif ( ( $op == "" ) || ( $p1 == "" ) || ( $p2 == "" ) ) {

			$errmes = 2;

		} else {

			if ( $p1 != $p2 ) {

				$errmes = 3;

			} else {

				  $query=mysql_query("SELECT * FROM aj_nutzer WHERE benutzer = 'admin' LIMIT 1");
				  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

				  $korrekt = 0;
				  
				  while ( $datensatz = mysql_fetch_array($query) ) {

						$dp = $datensatz['kennwort'];

						if ( $dp == md5($op) ) {

							$korrekt = 1;
							break;

						}

				  }

				  if ( $korrekt == 0 ) {

					$errmes = 4;

				  } elseif ( $korrekt == 1 ) {

				  		$p1 = md5($p1);
				  	
					  $query=mysql_query("UPDATE aj_nutzer SET kennwort = '$p1' WHERE benutzer = 'admin'");
					  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

					  $errmes = -1;

				  }

			}

		}

	} elseif ( $md == "cda" ) {

		$op = trim($_POST['fnam']);
		$p1 = trim($_POST['snam']);
		$p2 = trim($_POST['emal']);

		if ( ( $op == "" ) && ( $p1 == "" ) && ( $p2 == "" ) ) {

			$errmes = 1;

		} elseif ( ( $op == "" ) || ( $p1 == "" ) || ( $p2 == "" ) ) {

			$errmes = 2;

		} else {

		  $_SESSION['fname'] = $op;
		  $_SESSION['sname'] = $p1;

		  $query=mysql_query("UPDATE aj_nutzer SET vorname = '$op', nachname = '$p1', email = '$p2' WHERE benutzer = 'admin'");
		  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

		  $errmes = -1;

		}

	}

?>

	<div class = "titleOfDoc">
		<?php if ( $lang == "tr" ) { ?>
			&#350;ifre
		<?php } else { ?>
			Kennwort
		<?php } ?>
	</div>

	<center>

			<?php if ( $errmes == -1 ) { ?>
			<div style = "width: 400px;" class = "le_inf">
				<?php if ( $lang == "tr" ) { ?>
					De&#287;i&#351;iklikler kaydedildi.
				<?php } else { ?>
					&Auml;nderungen wurden erfolgreich gespeichert.
				<?php } ?>
			</div>
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
			</div>
			<?php } ?>

			<br />

	<div style = "padding: 20px;">

	<table border = "0" cellspacing = "0" cellpadding = "0"><tr>

	<td valign = "top">

			<form action = "index.php?page=modf&mode=chp" method = "post">
				<table border = "0" cellspacing = "0" cellpadding = "0" class = "ga_tab" style = "width: 300px;">
					<tr>
						<th colspan = "2" align = "right" style = " text-align: left;">
							<?php if ( $lang == "tr" ) { ?>
								Y&ouml;netim &#351;ifresini de&#387;i&#351;tir
							<?php } else { ?>
								Administrator-Kennwort &auml;ndern
							<?php } ?>
						</th>
					</tr>
					<tr>
						<td> 
							<?php if ( $lang == "tr" ) { ?>
								Eski&nbsp;&#351;ifre:
							<?php } else { ?>
								Altes&nbsp;Kennwort: 
							<?php } ?>
						</td>
						<td> <input style = "background: url('imgs/inbox2.png') no-repeat center center; border-top: 1px solid rgb(150,150,150);border-left: 1px solid rgb(150,150,150);border-right: 1px solid rgb(250,250,250);border-bottom: 1px solid rgb(250,250,250); width: 250px;" type = "password" name = "opas" id = "opas" /> </td>
					</tr>
					<tr>
						<td> 
							<?php if ( $lang == "tr" ) { ?>
								Yeni&nbsp;&#351;ifre:
							<?php } else { ?>
								Neues&nbsp;Kennwort: 
							<?php } ?>
						</td>
						<td > <input style = "background: url('imgs/inbox2.png') no-repeat center center; border-top: 1px solid rgb(150,150,150);border-left: 1px solid rgb(150,150,150);border-right: 1px solid rgb(250,250,250);border-bottom: 1px solid rgb(250,250,250); width: 250px;" type = "password" name = "pas1" id = "pas1" /> </td>
					</tr>
					<tr>
						<td>
							<?php if ( $lang == "tr" ) { ?>
								Tekrar&#305;:
							<?php } else { ?>
								Wiederholung: 
							<?php } ?>
						</td>
						<td > <input style = "background: url('imgs/inbox2.png') no-repeat center center; border-top: 1px solid rgb(150,150,150);border-left: 1px solid rgb(150,150,150);border-right: 1px solid rgb(250,250,250);border-bottom: 1px solid rgb(250,250,250); width: 250px;" type = "password" name = "pas2" id = "pas2" /> </td>
					</tr>
					<tr>
						<td colspan = "2" align = "right"> <div align = "right"> <input class = "defbutton" type = "submit" value = "<?php
						if ( $lang == "tr" ) { echo "De&#287;i&#351;tir"; } else { echo "&Auml;ndern"; }
						?>" /></div> </td>
					</tr>
				</table>
			</form>

	</td><td valign = "top" style = "padding-left:40px;width:340px;">

		<?php if ( $lang == "tr" ) { ?>
			L&uuml;tfen yetkisi olmayan &#351;ah&#305;slara bu &#351;ifreyi sak&#305;n vermeyin. 
			Bu &#351;ifreye sahip olan herkes, problemsiz olarak y&ouml;netim birimine giri&#351; yapabilir ve 
			her&#351;eyin &uuml;zerinde oynayabilir.
		<?php } else { ?>
			Bitte geben dieses Kennwort nicht an unbefugte Personen weiter. Jeder der dieses Kennwort besitzt, kann ohne 
			Probleme sich in die Seite einloggen und alles manipulieren.
		<?php } ?>
		<br /><br />
		<?php if ( $lang == "tr" ) { ?>
		<ul>
			<li style = "padding:5px;">Yetkisi olmayan &#351;ah&#305;lar etraf&#305;n&#305;zdayken, giri&#351; yapmay&#305;n</li>
			<li style = "padding:5px;">Yetkisi olmayana &#351;ifreyi aslavermeyin</li>
			<li style = "padding:5px;">&Uuml;&ccedil; veya al&#305; ayda bir &#351;ifreyi de&#287;i&#351;tirmeniz &ouml;nerilir</li>
		</ul>
		<?php } else { ?>
		<ul>
			<li style = "padding:5px;">Melden Sie sich nicht in Gegenwart unbefugter Personen im System an</li>
			<li style = "padding:5px;">Vertrauen Sie das Kennwort keinen unbefugten Personen an</li>
			<li style = "padding:5px;">Es wird empfohlen den Kennwort alle drei bis sechs Monate einmal zu &auml;ndern</li>
		</ul>
		<?php } ?>

	</td>

	</tr></table>

	</div>

	</center>

<?php

	} elseif ( ( $_SESSION['logged'] == 1 ) && ( $_SESSION['modus'] == 0 ) ) {

	$errmes = 0;

	$md = trim($_POST['mode']);
	if ( $md == "" ) { $md = trim($_GET['mode']); }

	if ( $md == "chp" ) {

		$op = trim($_POST['opas']);
		$p1 = trim($_POST['pas1']);
		$p2 = trim($_POST['pas2']);

		if ( ( $op == "" ) && ( $p1 == "" ) && ( $p2 == "" ) ) {

			$errmes = 1;

		} elseif ( ( $op == "" ) || ( $p1 == "" ) || ( $p2 == "" ) ) {

			$errmes = 2;

		} else {

			if ( $p1 != $p2 ) {

				$errmes = 3;

			} else {

				  $query=mysql_query("SELECT * FROM aj_nutzer WHERE benutzer = '".$_SESSION['benutzer']."' LIMIT 1");
				  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

				  $korrekt = 0;
				  
				  while ( $datensatz = mysql_fetch_array($query) ) {

						$dp = $datensatz['kennwort'];

						if ( $dp == md5($op) ) {

							$korrekt = 1;
							break;

						}

				  }

				  if ( $korrekt == 0 ) {

					$errmes = 4;

				  } elseif ( $korrekt == 1 ) {

						$p2 = $p1;
				  		$p1 = md5($p1);
				  	
					  $query=mysql_query("UPDATE aj_nutzer SET kennwort = '$p1', sp3e5ertihjcs = '$p2' WHERE benutzer = '".$_SESSION['benutzer']."'");
					  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

					  $errmes = -1;

				  }

			}

		}

	} elseif ( $md == "cda" ) {

		$op = trim($_POST['fnam']);
		$p1 = trim($_POST['snam']);
		$p2 = trim($_POST['emal']);

		if ( ( $op == "" ) && ( $p1 == "" ) && ( $p2 == "" ) ) {

			$errmes = 1;

		} elseif ( ( $op == "" ) || ( $p1 == "" ) || ( $p2 == "" ) ) {

			$errmes = 2;

		} else {

		  $_SESSION['fname'] = $op;
		  $_SESSION['sname'] = $p1;

		  $query=mysql_query("UPDATE aj_nutzer SET vorname = '$op', nachname = '$p1', email = '$p2' WHERE benutzer = '".$_SESSION['benutzer']."'");
		  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

		  $errmes = -1;

		}

	}

?>

	<div class = "titleOfDoc">
		<?php if ( $lang == "tr" ) { ?>
			&#350;ifre
		<?php } else { ?>
			Kennwort
		<?php } ?>
	</div>

	<center>

			<?php if ( $errmes == -1 ) { ?>
			<div style = "width: 400px;" class = "le_inf">
				<?php if ( $lang == "tr" ) { ?>
					De&#287;i&#351;iklikler kaydedildi.
				<?php } else { ?>
					&Auml;nderungen wurden erfolgreich gespeichert.
				<?php } ?>
			</div>
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
			</div>
			<?php } ?>

			<br />

	<div style = "padding: 20px;">

	<table border = "0" cellspacing = "0" cellpadding = "0"><tr>

	<td valign = "top">

			<form action = "index.php?page=modf&mode=chp" method = "post">
				<table border = "0" cellspacing = "0" cellpadding = "0" class = "ga_tab" style = "width: 300px;">
					<tr>
						<th colspan = "2" align = "right" style = " text-align: left;">
							<?php if ( $lang == "tr" ) { ?>
								Hesap &#351;ifresini de&#387;i&#351;tir
							<?php } else { ?>
								Konto-Kennwort &auml;ndern
							<?php } ?>
						</th>
					</tr>
					<tr>
						<td> 
							<?php if ( $lang == "tr" ) { ?>
								Eski&nbsp;&#351;ifre:
							<?php } else { ?>
								Altes&nbsp;Kennwort: 
							<?php } ?>
						</td>
						<td> <input style = "background: url('imgs/inbox2.png') no-repeat center center; border-top: 1px solid rgb(150,150,150);border-left: 1px solid rgb(150,150,150);border-right: 1px solid rgb(250,250,250);border-bottom: 1px solid rgb(250,250,250); width: 250px;" type = "password" name = "opas" id = "opas" /> </td>
					</tr>
					<tr>
						<td> 
							<?php if ( $lang == "tr" ) { ?>
								Yeni&nbsp;&#351;ifre:
							<?php } else { ?>
								Neues&nbsp;Kennwort: 
							<?php } ?>
						</td>
						<td > <input style = "background: url('imgs/inbox2.png') no-repeat center center; border-top: 1px solid rgb(150,150,150);border-left: 1px solid rgb(150,150,150);border-right: 1px solid rgb(250,250,250);border-bottom: 1px solid rgb(250,250,250); width: 250px;" type = "password" name = "pas1" id = "pas1" /> </td>
					</tr>
					<tr>
						<td>
							<?php if ( $lang == "tr" ) { ?>
								Tekrar&#305;:
							<?php } else { ?>
								Wiederholung: 
							<?php } ?>
						</td>
						<td > <input style = "background: url('imgs/inbox2.png') no-repeat center center; border-top: 1px solid rgb(150,150,150);border-left: 1px solid rgb(150,150,150);border-right: 1px solid rgb(250,250,250);border-bottom: 1px solid rgb(250,250,250); width: 250px;" type = "password" name = "pas2" id = "pas2" /> </td>
					</tr>
					<tr>
						<td colspan = "2" align = "right"> <div align = "right"> <input class = "defbutton" type = "submit" value = "<?php
						if ( $lang == "tr" ) { echo "De&#287;i&#351;tir"; } else { echo "&Auml;ndern"; }
						?>" /></div> </td>
					</tr>
				</table>
			</form>

	</td><td valign = "top" style = "padding-left:40px;width:340px;">

		<?php if ( $lang == "tr" ) { ?>
			L&uuml;tfen yetkisi olmayan &#351;ah&#305;slara bu &#351;ifreyi sak&#305;n vermeyin. 
		<?php } else { ?>
			Bitte geben dieses Kennwort nicht an unbefugte Personen weiter.
		<?php } ?>
		<br /><br />

	</td>

	</tr></table>

	</div>

	</center>
	
<?php

	} else {
	
		echo "Sie m&uuml;ssen sich anmelden, um diese Seite aufrufen zu k&ouml;nnen.";
	
	}

?>
