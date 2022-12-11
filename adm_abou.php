
<?php

	if ( ( $_SESSION['logged'] == 1 ) && ( $_SESSION['modus'] == 1 ) ) {
?>

<?php

	$pagerKey = "abou";
	if ( $lang == "tr" ) {
	$pagerHdl = "Hakk&#305;m&#305;da";
	} else {
	$pagerHdl = "&Uuml;ber&nbsp;uns";
	}

	$mode = trim($_POST['mode']);
	if ( $mode == "" ) { $mode = trim($_GET['mode']); }

	if ( $mode == 1 ) {
	  $ww = trim(stripslashes($_POST['editor1']));
	  if ( $ww != "" ) {
	  $ww = str_replace( "'", "%@1", $ww );
	  $query=mysql_query("UPDATE aj_text SET inhalt = '".$ww."' WHERE kennung = '$pagerKey' AND subkenn = '$lang'");
	  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
	  }
	}

?>

	<div class = "titleOfDoc">
		<?php echo $pagerHdl; ?>
	</div>

	<center>

			<?php

				  $query=mysql_query("SELECT * FROM aj_text WHERE kennung = '$pagerKey' AND subkenn = '$lang' LIMIT 1");
				  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

				  while ( $datensatz = mysql_fetch_array($query) ) {

						$wert = $datensatz['inhalt'];

				  }

			?>

<?php
	$tinymceWidth = "'98%'";
	$tinymceHeight = 600;
	$tinymceEditorLabel = "editor1";
	$tinymceEditorURL = "index.php?lang=$lang&page=$pagerKey&mode=1";
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

<?php

	} else {
	
		echo "Sie m&uuml;ssen sich anmelden, um diese Seite aufrufen zu k&ouml;nnen.";
	
	}

?>
