<?php

	if ( ( $_SESSION['logged'] == 1 ) && ( $_SESSION['modus'] == 1 ) ) {
?>

<?php

	$pagerKey = "ban1";
	$pagerHdl = "Banner im Home-Seite";

?>

<div style = "padding-left:20px;">

	<script type = "text/javascript">
		var curPic = "";
		function prev_that_im( bi ) {
			curPic = bi;
			$_id("prevIm").innerHTML = '<img border = "0" src = "' + bi + '" style = "max-width:100%;" />';
		}
		function conPic( no ) {
			$_id("bild" + no).innerHTML = '<img border = "0" src = "' + curPic + '" style = "max-width:100px;max-height:100px;" />';
			svr.Return( "take_that_banner_pic", "<?php echo $pagerKey; ?>", no, curPic );
		}
		function remPic( no ) {
			$_id("bild" + no).innerHTML = '';
			svr.Return( "clear_that_banner_pic", "<?php echo $pagerKey; ?>", no );
		}
	</script>

	<div class = "titleOfDoc">
		<?php echo $pagerHdl; ?>
	</div>
	<table border = "0" cellspacing = "0" cellpadding = "0"><tr>
	<td valgin = "top">
	<ul style = "font-weight: normal;">
	<li style = "padding:4px;">Die Bilder m&uuml;ssen mindestens 2000px breit und relational Hoch sein.</li>
	<li style = "padding:4px;">Alle Bilder, die im Banner verwendet werden, m&uuml;ssen dieselben Abma&szlig;e haben</li>
	<li style = "padding:4px;">F&uuml;r einen optimalen und schnellen Banner-Effekt wird ausschlie&szlig;lich Standard-JPEG Bildformat empfohlen</li>
	</ul>
	</td><td valign = "top" style = "padding-left: 50px; padding-right: 30%;">
		Banner sind Bilderl&auml;ufe die zur Werbe-Einblendung, Aktionseinblendung und &auml;hnliches verwendet werden.
		Bitte lassen Sie sich die Bilder von einer Werbeagentur oder Grafiker erstellen integrieren Sie Ihre Botschaften als 
		Banner auf Ihre Seiten.
		<br /><br />
		Die hier zu verwendenden Bilder m&uuml;ssen zuvor unter <b>Hochladen f&uuml;r Banner</b> hochgeladen werden. Dieser
		Punkt ist unter Einstellungen im Administrationsseite zu erreichen.
		<br /><br />
		Anschlie&szlig;end k&ouml;nnen Sie die Bilder hier zum Banner verbinden.
	</td></tr></table><br />
	<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%">
		<tr>
			<th valign = "top" align = "left">
				Bilder
			</th><th valign = "top" align = "left">
				Vorschau
			</th>
		</tr>
		<tr>
			<td valign = "top" align = "left">
				<div style = "width:300px; height: 500px; overflow: auto; background-color:#ffffff;border:1px solid rgb(110,110,180);padding:1px;margin:1px;">
	<?php 
	  $query=mysql_query("SELECT * FROM aj_banner_images ORDER BY id");
	  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
	  while ( $datensatz = mysql_fetch_array($query) ) {
			$bild = $datensatz['mintr'];
			if ( file_exists( $bild ) ) {
			echo '
				<div>
					<img border = "0" src = "'.$bild.'" style = "max-width:300px; max-height: 300px; margin: 1px;
					                                             cursor: pointer; padding: 1px; border:1px solid #ffffff;" 
						 onclick = "javascript:prev_that_im(\''.$datensatz['datei'].'\')" />
				</div>
			';
			$foundit=12321;
			}
	  }
	  $query=mysql_query("SELECT * FROM aj_daten WHERE kennung = 'ani_".$pagerKey."' ORDER BY id");
	  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
	  $bilf = array();
	  while ( $datensatz = mysql_fetch_array($query) ) {
			$bild = $datensatz['wert'];
			if ( file_exists( $bild ) ) { 
				$bilf[$datensatz['eintrag']] = 
				'<img border = "0" src = "'.$bild.'" style = "max-width:100px;max-height:100px;" />'; 
			}
	  }
	?>
				</div>
			</td><td valign = "top" align = "left" width = "100%">
				<div style = "height: 500px; overflow: hidden; 
				              background-color: #ffffff; width: 96%;
				              border:1px solid rgb(110,110,180);
				              padding:1px;margin:1px;" id = "prevIm">
				</div>
			</td>
		</tr>
	</table>
	<br><br>

	<div style = "clear: both;" class = "rd-bock-set">
	<ul>
		<?php for ( $x = 1; $x < 7; $x++ ) { ?>
		<li>
			<table border = "0" cellspacing = "0" cellspacing = "0"><tr>
				<td valign = "top" align = "left"><span class = "red_marked"><?php echo $x; ?>.</span><br /><br /></td>
			</td><tr>
				<td valign = "top" align = "left">
					<input type = "button" value = "Verbinden" onclick = "javascript:conPic(<?php echo $x; ?>);" />
				</td>
			</td><tr>
				<td valign = "top">
				<div style = "width:196px;height:196px;background-color:#ffffff;border:1px solid rgb(110,110,180);padding:1px;margin:1px;" 
					 id = "bild<?php echo $x; ?>"><?php echo $bilf[$x]; ?></div>
				</td>
			</tr><tr>
				<td valign = "top" align = "right">
					<input type = "button" value = "Entfernen" onclick = "javascript:remPic(<?php echo $x; ?>);" />
				</td>
			</tr></table>
		</li>
		<?php } ?>
	</ul>
	</div>

</div>

<?php

	} else {
	
		echo "Sie m&uuml;ssen sich anmelden, um diese Seite aufrufen zu k&ouml;nnen.";
	
	}

?>
