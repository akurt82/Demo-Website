<?php
	if ( ( $_SESSION['logged'] == 1 ) && ( $_SESSION['modus'] == 1 ) ) {
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
		Mehr Inhalte
	</div>

	<div style = "padding:20px;padding-bottom: 0px;">

	<?php

		function which_is_it( $nmbr ) {
			switch( $nmbr ) {
				case  1: return "Nicht zugeordnete Dokumente";
				case  2: return "Urbanes&nbsp;Verkehrsmanagement";
				case  3: return "Interurbanes&nbsp;Verkehrsmanagement";
				case  4: return "Parken";
				case  5: return "&Ouml;ffentlicher&nbsp;Nahverkehr";
				case  6: return "Glasperlen";
				case  7: return "Fl&uuml;ssige & Mehrkomponentige Farben";
				case  8: return "Vorgeformte&nbsp;Markierungen";
				case  9: return "Thermoplastik";
				case 10: return "Beschilderung";
				case 15: return "Stromnetz";
				case 11: return "Referenzen";
				case 12: return "News & Events";
				case 13: return "Unternehmen";
				case 14: return "Detektion & Verkehrs&uuml;berwachung";
			};
		}

		$tab = trim($_POST['tab']);
		if ( $tab == "" ) { $tab = trim($_GET['tab']); }

		$filt = trim($_POST['filt']);
		if ( $filt == "" ) { $filt = trim($_GET['filt']); }

		$topic = trim($_POST['topic']);
		if ( $topic == "" ) { $topic = trim($_GET['topic']); }

		$pointed = trim($_POST['pointed']);
		if ( $pointed == "" ) { $pointed = trim($_GET['pointed']); }

		if ( $mode == 1 ) {
			$hl = trim($_POST['topic']);
			$ti1 = trim($_POST['titel_de']);
			$ti2 = trim($_POST['titel_en']);
			if ( $ti1 != "" ) {
			  $ti1 = str_replace( "'", "´", $ti1 );
			  $ti2 = str_replace( "'", "´", $ti2 );
			  $query=mysql_query(
"INSERT INTO aj_content ( contype, projekt, title_de, title_en ) VALUES ( '$hl', '$ti1', '$ti1', '$ti2' )"
				);
			  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
			}
		}
	?>
	<?php
		if ( $mode == 3 ) {
			if ( $edit != "" ) {
			  $vl = trim($_POST['editor1']);
			  $dc = trim($_POST['doctitel']);
			  $thatcon = $dc;
			  if ( $vl != "" ) {
				  $vl = str_replace( "'", "%@1", $vl );
				  $query=mysql_query("UPDATE aj_content SET titel = '$dc', inhalt = '$vl' WHERE id = '$edit'");
				  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
			  }
			}
		}
		if ( $mode == 33 ) {
			if ( $edit != "" ) {
			  $hl = trim($_POST['topic']);
			  $vl = trim($_POST['editor1']);
			  $dc = trim($_POST['doctitel_de']);
			  $thatcon = $dc;
			  if ( $vl != "" ) {
				  $vl = str_replace( "'", "%@1", $vl );
				  $query=mysql_query("UPDATE aj_content SET title_de = '$dc', inhalt_de = '$vl' WHERE id = '$edit'");
				  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
			  }
			}
		}
		if ( $mode == 34 ) {
			if ( $edit != "" ) {
			  $hl = trim($_POST['topic']);
			  $vl = trim($_POST['editor2']);
			  $dc = trim($_POST['doctitel_en']);
			  $thatcon = $dc;
			  if ( $vl != "" ) {
				  $vl = str_replace( "'", "%@1", $vl );
				  $query=mysql_query("UPDATE aj_content SET title_en = '$dc', inhalt_en = '$vl' WHERE id = '$edit'");
				  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
			  }
			}
		}
		if ( $mode == 4 ) {
			if ( $edit != "" ) {
				  $query=mysql_query("DELETE FROM aj_content WHERE id = '$edit'");
				  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
				  ?>
				  <script type = "text/javascript">
					location.href = "index.php?page=docs&lang=<?php echo $lang; ?>";
				  </script>
				  <?php
			}
		}
	?>
	<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%">
	<tr>
	<td valign = "top" style = "padding-right:10px;">
	<form action = "index.php?page=docs&mode=1" method = "post">
	<table border = "0" cellspacing = "0" cellpadding = "0" class = "ga_tab" width = "100%">
		<tr><th>
		Neuen Inhalt hnizuf&uuml;gen
		</th></tr>
		<tr>
		<td>
		Thema:
		</td>
		</tr><tr>
		<td>
			<select size = "1" name = "topic" id = "topic">
				<option value = "1">Keine Zuordnung</option>
				<option value = "2">Urbanes&nbsp;Verkehrsmanagement</option>
				<option value = "3">Interurbanes&nbsp;Verkehrsmanagement</option>
				<option value = "4">Parken</option>
				<option value = "5">&Ouml;ffentlicher&nbsp;Nahverkehr</option>
				<option value ="14">Detektion & Verkehrs&uuml;berwachung</option>
				<option value = "6">Glasperlen</option>
				<option value = "7">Fl&uuml;ssige & Mehrkomponentige Farben</option>
				<option value = "8">Vorgeformte&nbsp;Markierungen</option>
				<option value = "9">Thermoplastik</option>
				<option value ="10">Beschilderung</option>
				<option value ="15">Stromnetz</option>
				<option value ="11">Referenzen</option>
				<option value ="12">News & Events</option>
				<option value ="13">Unternehmen</option>
			</select>
		</td>
		</tr>
		<tr>
		<td>
		Titel (DE):
		</td></tr><tr><td>
			<input type = "text" name = "titel_de" style = "width:98%;" />
		</td>
		</tr>
		<tr>
		<td>
		Titel (EN):
		</td></tr><tr><td>
			<input type = "text" name = "titel_en" style = "width:98%;" />
		</td>
		</tr>
		<tr>
		<td>
			<div align = "right">
				<input type = "submit" value = "Erstellen" class = "defbutton" />
			</div>
		</td>
	</tr></table>
	</form>
	</td><td valign = "top" width = "100%">

	<table border = "0" cellspacing = "0" cellpadding = "0" class = "ga_tab" width = "100%">
	<tr><th>
		Verf&uuml;gbare Inhalte
		<select size = "1" id = "thats">
			<option value = "100" 
			<?php if ( $pointed == "" ) {echo"selected";} ?>>Alle</option>
			<option value = "1" 
			<?php if ( $pointed == "1" ) {echo"selected";} ?>>Nicht zugeordnete Dokumente</option>
			<option value = "2" 
			<?php if ( $pointed == "2" ) {echo"selected";} ?>>Urbanes&nbsp;Verkehrsmanagement</option>
			<option value = "3" 
			<?php if ( $pointed == "3" ) {echo"selected";} ?>>Interurbanes&nbsp;Verkehrsmanagement</option>
			<option value = "4" 
			<?php if ( $pointed == "4" ) {echo"selected";} ?>>Parken</option>
			<option value = "5" 
			<?php if ( $pointed == "5" ) {echo"selected";} ?>>&Ouml;ffentlicher&nbsp;Nahverkehr</option>
			<option value ="14" 
			<?php if ( $pointed == "14" ) {echo"selected";} ?>>Detektion & Verkehrs&uuml;berwachung</option>
			<option value = "6" 
			<?php if ( $pointed == "6" ) {echo"selected";} ?>>Glasperlen</option>
			<option value = "7" 
			<?php if ( $pointed == "7" ) {echo"selected";} ?>>Fl&uuml;ssige & Mehrkomponentige Farben</option>
			<option value = "8" 
			<?php if ( $pointed == "8" ) {echo"selected";} ?>>Vorgeformte&nbsp;Markierungen</option>
			<option value = "9" 
			<?php if ( $pointed == "9" ) {echo"selected";} ?>>Thermoplastik</option>
			<option value ="10" 
			<?php if ( $pointed == "10" ) {echo"selected";} ?>>Beschilderung</option>
			<option value ="15" 
			<?php if ( $pointed == "15" ) {echo"selected";} ?>>Stromnetz</option>
			<option value ="11" 
			<?php if ( $pointed == "11" ) {echo"selected";} ?>>Referenzen</option>
			<option value ="12" 
			<?php if ( $pointed == "12" ) {echo"selected";} ?>>News & Events</option>
			<option value ="13" 
			<?php if ( $pointed == "13" ) {echo"selected";} ?>>Unternehmen</option>
		</select>
<script>
    $(function(){
      // bind change event to select
      $('#thats').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
          	if ( url == 100 ) {
          	  url = "index.php?page=docs&lang=de&pointed="+url;
          	} else {
          	  url = "index.php?page=docs&lang=de&filt=" + url + "&pointed=" + url;
          	}
            window.location = url; // redirect
          }
          return false;
      });
    });
</script>
	</th></tr>
	<tr><td valign = "top">
	<div style = "width:100%;height:200px;overflow:auto;">
	<div style = "padding:8px;">
	<?php
	  if ( $filt == "" ) {
	  $query=mysql_query("SELECT * FROM aj_content ORDER BY id");
	  } else {
	  $query=mysql_query("SELECT * FROM aj_content WHERE contype = '$filt' ORDER BY id");
	  }
	  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
	  while ( $datensatz = mysql_fetch_array($query) ) {
	  ?>
	<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%" class = "markerin"><tr>
		<td width = "100%">
			<small><small><small><small><b>
			<?php echo which_is_it($datensatz['contype']); ?>
			</b></small></small></small></small>
			<br />
			<small><?php echo $datensatz['title_de']; ?><br />
			<small><i><?php echo $datensatz['title_en']; ?></i><br /></small></small>
			<small><small><small><i>
		Dokument
			&nbsp;<?php echo $datensatz['id']; ?></i></small></small></small>
		</td>
		<td><input class = "defbutton" type = "button" value = "Bearbeiten" title = "Bearbeiten" onclick = "javascript:location.href='index.php?page=docs&mode=2&edit=<?php echo $datensatz['id']; ?>&lang=<?php echo $lang; ?>';" /></td>
		<td><input class = "defbutton" type = "button" value = "L&ouml;schen" title = "L&ouml;schen" onclick = "javascript:if(confirm('Soll dieser Inhalt wirklich gelöscht werden?')){location.href='index.php?page=docs&mode=4&edit=<?php echo $datensatz['id']; ?>&lang=<?php echo $lang; ?>'};" /></td>
	</tr></table>
	<?php
	  }
	?>
	</div>
	</div>
	</td></tr>
	</table>
	</td>
	</tr>
	</table>
	<br />


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

	<table border = "0" cellspacing = "0" cellpadding = "0" class = "ga_tab" width = "100%">
	<tr><th>
		<?php
			if ( $lang == "tr" ) {
			$thatcon = "--- &#304;&ccedil;erik Yok ---";
			} else {
			$thatcon = "--- Kein Inhalt ---";
			}
			$editnow = false; $thatval = "";
			// *** //
			if ( ( $mode == 2 ) || ( $mode == 3 ) || ( $mode == 33 ) || ( $mode == 34 ) ) {
			  $query=mysql_query("SELECT * FROM aj_content WHERE id = '$edit' ORDER BY id");
			  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
			  while ( $datensatz = mysql_fetch_array($query) ) {
				$thatcon_de = $datensatz['title_de'];
				$thatcon_en = $datensatz['title_en'];
				$thatval_de = str_replace( "%@1", "'", $datensatz['inhalt_de'] );
				$thatval_en = str_replace( "%@1", "'", $datensatz['inhalt_en'] );
				$editnow = true;
			  }
			}
		?>
		Aktueller Inhalt
: <?php echo $thatcon; ?> <span style = "font-weight:normal;"><small><small><i>(<?php  echo "Dokument"; echo " $edit"; ?>)</i></small></small></span>
		<?php if ( $editnow == true ) { ?>
	</th></tr><tr><td valign = "top">
<div id = "fassungde" style = "display:none;">
<?php
	$tinymceWidth = "'98%'";
	$tinymceHeight = 400;
	$tinymceEditorLabel = "editor1";
	$tinymceEditorURL = "index.php?lang=de&page=docs&mode=33&edit=$edit&filt=$filt&pointed=$pointed&tab=1";
	$tinymceDocumentTitle = "";
	$tinymceDocumentSubTitle = "";
	$tinymceContent = $thatval_de;
	$tinymceContent = str_replace( "%@1", "'", $tinymceContent );
	$tinymceScriptingPath = "js/tinymce5mplugins.js";
	$tinymceObject = 'Titel (DE): <input type = "text" style = "width:96%;" name = "doctitel_de" value = "'.$thatcon_de.'" />';
	// *** //
	include "tinymce5mext.php";
?>
</div>
<div id = "fassungen" style = "display:none;">
<?php
	$tinymceWidth = "'98%'";
	$tinymceHeight = 400;
	$tinymceEditorLabel = "editor2";
	$tinymceEditorURL = "index.php?lang=en&page=docs&mode=34&edit=$edit&filt=$filt&pointed=$pointed&tab=2";
	$tinymceDocumentTitle = "";
	$tinymceDocumentSubTitle = "";
	$tinymceContent = $thatval_en;
	$tinymceContent = str_replace( "%@1", "'", $tinymceContent );
	$tinymceScriptingPath = "js/tinymce5mplugins.js";
	$tinymceObject = 'Titel (EN): <input type = "text" style = "width:96%;" name = "doctitel_en" value = "'.$thatcon_en.'" />';
	// *** //
	include "tinymce5mext.php";
?>

		<?php } ?>
</div>
	</td></tr></table>

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
