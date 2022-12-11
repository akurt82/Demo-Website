
<?php
	if ( ( $_SESSION['logged'] == 1 ) && ( $_SESSION['modus'] == 1 ) ) {
?>

<?php

	$theKey = trim($_POST['edit']);
	if ( $theKey == "" ) { $theKey = trim($_GET['edit']); }

	$tab = trim($_POST['tab']);
	if ( $tab == "" ) { $tab = trim($_GET['tab']); }

	if ( $theKey == "hpag" )
	{
		$pagerKey = "hpag";
		$pagerHdl = "Startseite";
	} else
	if ( $theKey == "cont" )
	{
		$pagerKey = "cont";
		$pagerHdl = "Kontakt";
	} else
	if ( $theKey == "disc" )
	{
		$pagerKey = "disc";
		$pagerHdl = "Haftungsasuschluss";
	} else
	if ( $theKey == "dschutz" )
	{
		$pagerKey = "dschutz";
		$pagerHdl = "Datenschutz";
	} else
	if ( $theKey == "agb" )
	{
		$pagerKey = "agb";
		$pagerHdl = "AGB";
	} else
	if ( $theKey == "impr" )
	{
		$pagerKey = "impr";
		$pagerHdl = "Impressum";
	} else
	if ( $theKey == "reff" )
	{
		$pagerKey = "reff";
		$pagerHdl = "Referenz";
	} else
	if ( $theKey == "abou" )
	{
		$pagerKey = "abou";
		$pagerHdl = "&Uuml;ber&nbsp;uns";
	} else
	if ( $theKey == "page_2" )
	{
		$pagerKey = "page_2";
		$pagerHdl = "Urbanes Verkehrsmanagement";
	} else
	if ( $theKey == "page_3" )
	{
		$pagerKey = "page_3";
		$pagerHdl = "Interurbanes Verkehrsmanagement";
	} else
	if ( $theKey == "page_4" )
	{
		$pagerKey = "page_4";
		$pagerHdl = "Parken";
	} else
	if ( $theKey == "page_5" )
	{
		$pagerKey = "page_5";
		$pagerHdl = "&Ouml;ffentlicher Nahverkehr";
	} else
	if ( $theKey == "page_6" )
	{
		$pagerKey = "page_6";
		$pagerHdl = "Glasperlen";
	} else
	if ( $theKey == "page_7" )
	{
		$pagerKey = "page_7";
		$pagerHdl = "Fl&uuml;ssige & Mehrkomponentige Farben";
	} else
	if ( $theKey == "page_8" )
	{
		$pagerKey = "page_8";
		$pagerHdl = "Vorgeformte Markierungen";
	} else
	if ( $theKey == "page_9" )
	{
		$pagerKey = "page_9";
		$pagerHdl = "Thermoplastik";
	} else
	if ( $theKey == "page_10" )
	{
		$pagerKey = "page_10";
		$pagerHdl = "Beschilderung";
	} else
	if ( $theKey == "page_14" )
	{
		$pagerKey = "page_14";
		$pagerHdl = "Detektion & Verkehrs&uuml;berwachung";
	}
	} else
	if ( $theKey == "page_15" )
	{
		$pagerKey = "page_15";
		$pagerHdl = "Stromnetz";
	}

	$mode = trim($_POST['mode']);
	if ( $mode == "" ) { $mode = trim($_GET['mode']); }

	if ( $mode == 1 ) {
	  $ww = trim(stripslashes($_POST['editor1']));
	  if ( $ww != "" ) {
	  // *** //
	  $isitex=0;
	  $query2=mysql_query("SELECT * FROM aj_text WHERE kennung = '$pagerKey' AND subkenn = 'de' LIMIT 1");
	  if(!$query2) die("Fehler bei der Abfrage: ".mysql_error());
	  while ( $datensatz2 = mysql_fetch_array($query2) ) {$isitex=1;break;}
	  if ( $isitex == 0 ) {
	  	$query3=mysql_query(
	  	"INSERT INTO aj_text ( kennung, subkenn ) VALUES ( '$pagerKey', 'de' )");
	  	if(!$query3) die("Fehler bei der Abfrage: ".mysql_error());
	  }; $isitex = 0;
	  // *** //
	  $ww = str_replace( "'", "%@1", $ww );
	  $query=mysql_query(
	  "UPDATE aj_text SET inhalt = '".$ww."' WHERE kennung = '$pagerKey' AND subkenn = 'de'");
	  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
	  }
	}

	if ( $mode == 2 ) {
	  $ww = trim(stripslashes($_POST['editor2']));
	  if ( $ww != "" ) {
	  // *** //
	  $isitex=0;
	  $query2=mysql_query("SELECT * FROM aj_text WHERE kennung = '$pagerKey' AND subkenn = 'en' LIMIT 1");
	  if(!$query2) die("Fehler bei der Abfrage: ".mysql_error());
	  while ( $datensatz2 = mysql_fetch_array($query2) ) {$isitex=1;break;}
	  if ( $isitex == 0 ) {
	  	$query3=mysql_query(
	  	"INSERT INTO aj_text ( kennung, subkenn ) VALUES ( '$pagerKey', 'en' )");
	  	if(!$query3) die("Fehler bei der Abfrage: ".mysql_error());
	  }; $isitex = 0;
	  // *** //
	  $ww = str_replace( "'", "%@1", $ww );
	  $query=mysql_query(
	  "UPDATE aj_text SET inhalt = '".$ww."' WHERE kennung = '$pagerKey' AND subkenn = 'en'");
	  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
	  }
	}

?>

	<script type = "text/javascript">
		function clicked ( value ) {
			$("#inde").css("background-color",       "rgb(240,240,240)");
			$("#inde").css("color",                        "rgb(0,0,0)");
			// *** //
			$("#inen").css("background-color",       "rgb(240,240,240)");
			$("#inen").css("color",                        "rgb(0,0,0)");
			// *** //
			$("#inde").css("padding",                            "10px");
			$("#inen").css("padding",                            "10px");
			// *** //
			$("#inde").css("cursor",                          "pointer");
			$("#inen").css("cursor",                          "pointer");
			// *** //
			$("#inde").css("border",                             "none");
			$("#inen").css("border",                             "none");
			// *** //
			if ( value == "de" )
			{
				$("#inde").css("background-color",       "rgb(200,220,230)");
				$("#inde").css("border-top",   "1px solid rgb(240,240,240)");
				$("#inde").css("border-left",  "1px solid rgb(240,240,240)");
				$("#inde").css("border-right", "1px solid rgb(140,140,140)");
				$("#inde").css("border-bottom","1px solid rgb(140,140,140)");
				$("#inde").css("color",                        "rgb(0,0,0)");
				// *** //
				$('#fassungen').fadeOut('fast');
			    $('#fassungde').fadeIn('fast');
			}
			else if ( value == "en" )
			{
				$("#inen").css("background-color",       "rgb(200,220,230)");
				$("#inen").css("border-top",   "1px solid rgb(240,240,240)");
				$("#inen").css("border-left",  "1px solid rgb(240,240,240)");
				$("#inen").css("border-right", "1px solid rgb(140,140,140)");
				$("#inen").css("border-bottom","1px solid rgb(140,140,140)");
				$("#inen").css("color",                        "rgb(0,0,0)");
				// *** //
				$('#fassungde').fadeOut('fast');
			    $('#fassungen').fadeIn('fast');
			}
		}
	</script>

	<div class = "titleOfDoc">
		<?php echo $pagerHdl; ?>
	<hr />
	</div>

	<div style = "background-color:$FFFFFF; border: 1px solid rgb(240,240,240); padding: 1px;">
	<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%">
		<tr>
			<td id = "inde" onclick = "javascript: clicked('de');">
				Deutsch
			</td>
			<td id = "inen" onclick = "javascript: clicked('en');"> 
				Englisch
			</td>
			<td width = "100%" style = "background-color:rgb(240,240,240);">
				&nbsp;
			</td>
		</tr>
	</table>
	</div>
	<br />

	<div id = "fassungde" style = "display:none;">
	<center>

	<br />
			<?php

				  $query=mysql_query("SELECT * FROM aj_text WHERE kennung = '$pagerKey' AND subkenn = 'de' LIMIT 1");
				  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

				  while ( $datensatz = mysql_fetch_array($query) ) {

						$wert = $datensatz['inhalt'];

				  }

			?>

<?php
	$tinymceWidth = "'98%'";
	$tinymceHeight = 600;
	$tinymceEditorLabel = "editor1";
	$tinymceEditorURL = "index.php?lang=de&edit=$pagerKey&mode=1&page=sedi&tab=1";
	$tinymceDocumentTitle = "";
	$tinymceDocumentSubTitle = "";
	$tinymceContent = $wert;
	$tinymceContent = str_replace( "%@1", "'", $tinymceContent );
	$tinymceScriptingPath = "js/tinymce5mplugins.js";
	$tinymceObject = '';
	// *** //
	include "tinymce5mext.php";
?>

	</center>
	</div>

	<div id = "fassungen" style = "display:none;">
	<center>

	<br />
			<?php

				  $query=mysql_query("SELECT * FROM aj_text WHERE kennung = '$pagerKey' AND subkenn = 'en' LIMIT 1");
				  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

				  while ( $datensatz = mysql_fetch_array($query) ) {

						$wert = $datensatz['inhalt'];

				  }

			?>

<?php
	$tinymceWidth = "'98%'";
	$tinymceHeight = 600;
	$tinymceEditorLabel = "editor2";
	$tinymceEditorURL = "index.php?lang=en&edit=$pagerKey&mode=2&page=sedi&tab=2";
	$tinymceDocumentTitle = "";
	$tinymceDocumentSubTitle = "";
	$tinymceContent = $wert;
	$tinymceContent = str_replace( "%@1", "'", $tinymceContent );
	$tinymceScriptingPath = "js/tinymce5mplugins.js";
	$tinymceObject = '';
	// *** //
	include "tinymce5mext.php";
?>

	</center>
	</div>

	<script type = "text/javascript">
		<?php if ( $tab == "2" ) { ?>
		clicked("en");
		<?php } else { ?>
		clicked("de");
		<?php } ?>
	</script>

<?php

	} else {
	
		echo "Sie m&uuml;ssen sich anmelden, um diese Seite aufrufen zu k&ouml;nnen.";
	
	}

?>
