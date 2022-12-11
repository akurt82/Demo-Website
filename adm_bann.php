<?php

	if ( ( $_SESSION['logged'] == 1 ) && ( $_SESSION['modus'] == 1 ) ) {
?>

<?php

	$pagerKey = "bann";
	$pagerHdl = "Standard-Banner ganz oben auf der Seite";

	$mode = trim($_POST['mode']);
	if ( $mode == "" ) { $mode = trim($_GET['mode']); }

	if ( $mode == 1 ) {
	  $ww = trim(stripslashes($_POST['editor1']));
	  if ( $ww != "" ) {
	  $ww = ereg_replace( "'", "%@1", $ww );
	  $query=mysql_query("UPDATE aj_text SET inhalt = '".$ww."' WHERE kennung = '$pagerKey'");
	  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
	  }
	}

?>

<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%"><tr>
<td valign = "top">

	<div class = "titleOfDoc">
		<?php echo $pagerHdl; ?>
	</div>

			<?php

				  $query=mysql_query("SELECT * FROM aj_text WHERE kennung = '$pagerKey' LIMIT 1");
				  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

				  while ( $datensatz = mysql_fetch_array($query) ) {

						$wert = $datensatz['inhalt'];

				  }

			?>

			<i>
			Bitte nicht mehr als drei Zeilen tippen und jede Zeile so kurz wie m&ouml;glich formulieren. 
			Der hier angegebene Text erscheint auf der Seite ganz oben, im rechten gr&uuml;nen Bereich des 
			Standard-Banners.
			</i>
			
<?php
	$tinymceWidth = 500;
	$tinymceHeight = 100;
	$tinymceItems = "mini";
	$tinymceEditorLabel = "editor1";
	$tinymceEditorURL = "index.php?lang=de&page=$pagerKey&mode=1";
	$tinymceDocumentTitle = "";
	$tinymceDocumentSubTitle = "";
	$tinymceContent = $wert;
	$tinymceContent = ereg_replace( "%@1", "'", $tinymceContent );
	$tinymceObject = '';
	// *** //
	include "tinymce5mext.php";
?>

</td><td valign = "top" width = "60%" style = "padding-left:20px;">

	<script type = "text/javascript">
		var curPic = "";
		function prev_that_im( bi ) {
			curPic = bi;
			$_id("prevIm").innerHTML = '<img border = "0" src = "' + bi + '" style = "max-width:480px;max-height:260px;" />';
		}
		function conPic( no ) {
			$_id("bild" + no).innerHTML = '<img border = "0" src = "' + curPic + '" style = "max-width:100px;max-height:100px;" />';
			svr.Return( "take_that_banner_pic", no, curPic );
		}
		function remPic( no ) {
			$_id("bild" + no).innerHTML = '';
			svr.Return( "clear_that_banner_pic", no );
		}
	</script>

	<div class = "titleOfDoc">
		Banner auf der Home-Seite
	</div>
	<i>
	Die Bilder f&uuml;r diesen Banner m&uuml;ssen exakt 1180 Pixel breit und 400 Pixel 
	hoch sein. Andernfalls wird der Banner nicht vern&uuml;nftig dargestellt.
	</i><br /><br />
	<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%">
		<tr>
			<th valign = "top" colspan = "2" align = "center">
				Bilder
			</th><th valign = "top" colspan = "4" align = "center">
				Vorschau
			</th>
		</tr>
		<tr>
			<td valign = "top" colspan = "2" align = "center">
				<div style = "width:200px; height: 300px; overflow: auto; background-color:#ffffff;border:1px solid rgb(110,110,180);padding:1px;margin:1px;">
	<?php 
	  $query=mysql_query("SELECT * FROM aj_images ORDER BY id");
	  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
	  while ( $datensatz = mysql_fetch_array($query) ) {
			$bild = $datensatz['mintr'];
			if ( file_exists( $bild ) ) {
			echo '
				<div>
					<img border = "0" src = "'.$bild.'" style = "max-width:170px; margin: 1px;
					                                             cursor: pointer; padding: 1px; border:1px solid #ffffff;" 
						 onclick = "javascript:prev_that_im(\''.$datensatz['datei'].'\')" />
				</div>
			';
			$foundit=12321;
			}
	  }
	  $query=mysql_query("SELECT * FROM aj_daten WHERE kennung = 'anibanner' ORDER BY id");
	  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
	  $bilf = array();
	  while ( $datensatz = mysql_fetch_array($query) ) {
			$bild = $datensatz['wert'];
			if ( file_exists( $bild ) ) { $bilf[$datensatz['eintrag']] = '<img border = "0" src = "'.$bild.'" style = "max-width:100px;max-height:100px;" />'; }
	  }
	?>
				</div>
			</td><td valign = "top" colspan = "4" align = "center">
				<div style = "width:430px; height: 300px; overflow: hidden; background-color:#ffffff;border:1px solid rgb(110,110,180);padding:1px;margin:1px;" id = "prevIm">
				
				</div>
			</td>
		</tr><tr>
			<td valign = "top" align = "center"><input type = "button" value = "Verbinden" onclick = "javascript:conPic(1);" /></td>
			<td valign = "top" align = "center"><input type = "button" value = "Verbinden" onclick = "javascript:conPic(2);" /></td>
			<td valign = "top" align = "center"><input type = "button" value = "Verbinden" onclick = "javascript:conPic(3);" /></td>
			<td valign = "top" align = "center"><input type = "button" value = "Verbinden" onclick = "javascript:conPic(4);" /></td>
			<td valign = "top" align = "center"><input type = "button" value = "Verbinden" onclick = "javascript:conPic(5);" /></td>
			<td valign = "top" align = "center"><input type = "button" value = "Verbinden" onclick = "javascript:conPic(6);" /></td>
		</td><tr>
			<td valign = "top"><div style = "width:100px;height:100px;background-color:#ffffff;border:1px solid rgb(110,110,180);padding:1px;margin:1px;" id = "bild1"><?php echo $bilf["1"]; ?></div></td>
			<td valign = "top"><div style = "width:100px;height:100px;background-color:#ffffff;border:1px solid rgb(110,110,180);padding:1px;margin:1px;" id = "bild2"><?php echo $bilf["2"]; ?></div></td>
			<td valign = "top"><div style = "width:100px;height:100px;background-color:#ffffff;border:1px solid rgb(110,110,180);padding:1px;margin:1px;" id = "bild3"><?php echo $bilf["3"]; ?></div></td>
			<td valign = "top"><div style = "width:100px;height:100px;background-color:#ffffff;border:1px solid rgb(110,110,180);padding:1px;margin:1px;" id = "bild4"><?php echo $bilf["4"]; ?></div></td>
			<td valign = "top"><div style = "width:100px;height:100px;background-color:#ffffff;border:1px solid rgb(110,110,180);padding:1px;margin:1px;" id = "bild5"><?php echo $bilf["5"]; ?></div></td>
			<td valign = "top"><div style = "width:100px;height:100px;background-color:#ffffff;border:1px solid rgb(110,110,180);padding:1px;margin:1px;" id = "bild6"><?php echo $bilf["6"]; ?></div></td>
		</tr><tr>
			<td valign = "top" align = "center"><input type = "button" value = "Entfernen" onclick = "javascript:remPic(1);" /></td>
			<td valign = "top" align = "center"><input type = "button" value = "Entfernen" onclick = "javascript:remPic(2);" /></td>
			<td valign = "top" align = "center"><input type = "button" value = "Entfernen" onclick = "javascript:remPic(3);" /></td>
			<td valign = "top" align = "center"><input type = "button" value = "Entfernen" onclick = "javascript:remPic(4);" /></td>
			<td valign = "top" align = "center"><input type = "button" value = "Entfernen" onclick = "javascript:remPic(5);" /></td>
			<td valign = "top" align = "center"><input type = "button" value = "Entfernen" onclick = "javascript:remPic(6);" /></td>
		</td>
	</table>

</td>
</tr></table>

<?php

	} else {
	
		echo "Sie m&uuml;ssen sich anmelden, um diese Seite aufrufen zu k&ouml;nnen.";
	
	}

?>
