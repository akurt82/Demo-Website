<?php
	session_start();
	if ( $_SESSION['logged'] == 1 ) {
?>
<!-- ZUM TESTEN, WIRD wepi VERBUNDEN -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN">
<html>
  <head>
<script type = "text/javascript" src = "api/wepi_core.js"></script>
<script type = "text/javascript" src = "api/wepi_serv.js"></script>
<script type = "text/javascript"> var svr = new wepiServ(); </script>
<style = "text/css">
	body {
		text-shadow: none;
		-moz-text-shadow: none;
		-khtml-text-shadow: none;
		-webkit-text-shadow: none;
	}
	table td, table th {
		text-shadow: none;
		-moz-text-shadow: none;
		-khtml-text-shadow: none;
		-webkit-text-shadow: none;
		color: #000000;
		border:none;
	}
	table {
		border: none;
	}
</style>
</head><body>
<?php

// Dateiendung ermitteln
function neuername( $f ) {
	$t = ""; $n = ""; $ni = 0;
	// *** //
	for ( $i = 0; $i < strlen( $f ); $i++ ) {
		if ( $f[$i] == '.' ) {
			$t = ""; $ni = 1;
		} else {
			if ( $ni == 0 ) {
				/*if ( ( $f[$i] != ' ' ) && ( $f[$i] != '\t' ) ) {
					if ( strlen( $n ) < 200 ) {
						if ( ( $f[$i] != "(" ) && ( $f[$i] != ")" ) && ( $f[$i] != "[" ) && ( $f[$i] != "]" ) &&  
						     ( $f[$i] != "{" ) && ( $f[$i] != "}" ) && ( $f[$i] != "!" ) && ( $f[$i] != " " ) && 
							 ( $f[$i] != "\t" )&& ( $f[$i] != "+" ) && ( $f[$i] != "*" ) && ( $f[$i] != "/" ) && 
							 ( $f[$i] != "\\" )&& ( $f[$i] != "§" ) && ( $f[$i] != "%" ) && ( $f[$i] != "&" ) && 
							 ( $f[$i] != "^" ) && ( $f[$i] != "°" ) && ( $f[$i] != "|" ) && ( $f[$i] != "<" ) && 
							 ( $f[$i] != ">" ) && ( $f[$i] != "#" ) && ( $f[$i] != "?" ) ) {
							$c = $f[$i];
							// *** //
							if     ( $c == 'ü' ) { $c = 'ue'; }
							elseif ( $c == 'Ü' ) { $c = 'Ue'; }
							elseif ( $c == 'ö' ) { $c = 'oe'; }
							elseif ( $c == 'Ö' ) { $c = 'Oe'; }
							elseif ( $c == 'ä' ) { $c = 'ae'; }
							elseif ( $c == 'Ä' ) { $c = 'Ae'; }
							elseif ( $c == 'ß' ) { $c = 'sz'; }
							// *** //
							$n .= $c;
						}
					}
				}*/
			} else {
				if ( ( $f[$i] != ' ' ) && ( $f[$i] != '\t' ) ) {
					$t .= $f[$i];
				}
			}
		}
	}
	// *** //
	$a = rand( 11, 15 ); switch ($a) { case 11 : $z = "A" ; break; case 12 : $z = "B" ; break; case 13 : $z = "C" ; break; case 14 : $z = "D" ; break; case 15 : $z = "E" ; break; }
	$k1 = $z;
	// *** //
	$a = rand( 11, 15 ); switch ($a) { case 11 : $z = "A" ; break; case 12 : $z = "B" ; break; case 13 : $z = "C" ; break; case 14 : $z = "D" ; break; case 15 : $z = "E" ; break; }
	$k2 = $z;
	// *** //
	$a = rand( 11, 15 ); switch ($a) { case 11 : $z = "A" ; break; case 12 : $z = "B" ; break; case 13 : $z = "C" ; break; case 14 : $z = "D" ; break; case 15 : $z = "E" ; break; }
	$k3 = $z;
	// *** //
	$a = rand( 11, 15 ); switch ($a) { case 11 : $z = "A" ; break; case 12 : $z = "B" ; break; case 13 : $z = "C" ; break; case 14 : $z = "D" ; break; case 15 : $z = "E" ; break; }
	$k4 = $z;
	// *** //
	$a = rand( 11, 15 ); switch ($a) { case 11 : $z = "A" ; break; case 12 : $z = "B" ; break; case 13 : $z = "C" ; break; case 14 : $z = "D" ; break; case 15 : $z = "E" ; break; }
	$k5 = $z;
	// *** //
	$a = rand( 11, 15 ); switch ($a) { case 11 : $z = "A" ; break; case 12 : $z = "B" ; break; case 13 : $z = "C" ; break; case 14 : $z = "D" ; break; case 15 : $z = "E" ; break; }
	$k6 = $z;
	// *** //
	$a = rand( 11, 15 ); switch ($a) { case 11 : $z = "A" ; break; case 12 : $z = "B" ; break; case 13 : $z = "C" ; break; case 14 : $z = "D" ; break; case 15 : $z = "E" ; break; }
	$k7 = $z;
	// *** //
	$a = rand( 11, 15 ); switch ($a) { case 11 : $z = "A" ; break; case 12 : $z = "B" ; break; case 13 : $z = "C" ; break; case 14 : $z = "D" ; break; case 15 : $z = "E" ; break; }
	$k8 = $z;
	// *** //
	$a = rand( 11, 15 ); switch ($a) { case 11 : $z = "A" ; break; case 12 : $z = "B" ; break; case 13 : $z = "C" ; break; case 14 : $z = "D" ; break; case 15 : $z = "E" ; break; }
	$k9 = $z;
	// *** //
	$a = rand( 11, 15 ); switch ($a) { case 11 : $z = "A" ; break; case 12 : $z = "B" ; break; case 13 : $z = "C" ; break; case 14 : $z = "D" ; break; case 15 : $z = "E" ; break; }
	$ka = $z;
	// *** //
	$a = rand( 11, 15 ); switch ($a) { case 11 : $z = "A" ; break; case 12 : $z = "B" ; break; case 13 : $z = "C" ; break; case 14 : $z = "D" ; break; case 15 : $z = "E" ; break; }
	$kb = $z;
	// *** //
	$a = rand( 11, 15 ); switch ($a) { case 11 : $z = "A" ; break; case 12 : $z = "B" ; break; case 13 : $z = "C" ; break; case 14 : $z = "D" ; break; case 15 : $z = "E" ; break; }
	$kc = $z;
	// *** //
	$a = rand( 11, 15 ); switch ($a) { case 11 : $z = "A" ; break; case 12 : $z = "B" ; break; case 13 : $z = "C" ; break; case 14 : $z = "D" ; break; case 15 : $z = "E" ; break; }
	$kd = $z;
	// *** //
	$a = rand( 11, 15 ); switch ($a) { case 11 : $z = "A" ; break; case 12 : $z = "B" ; break; case 13 : $z = "C" ; break; case 14 : $z = "D" ; break; case 15 : $z = "E" ; break; }
	$ke = $z;
	// *** //
	$timestamp = time();
	// *** //
	$n = $k1 . $k2 . $k3 . rand( 10, 99 ) . $k4 . $k5 . rand( 10, 99 ) . $k6 . $k7 . rand( 10, 99 ) . $k8 . $k9 . rand( 10, 99 ) . $ka . $kb . $kc;
	$n .= strlen( $f ) . rand( 10, 99 ) . $kd . $ke;
	$n .= date("d",$timestamp) . date("m",$timestamp) . date("y",$timestamp) . date("H",$timestamp) . date("i",$timestamp) . date("s",$timestamp) . ".$t";
	// *** //
	return $n;
}
// Um einige Daten vom Client überprüfen zu können
include_once ("wepi_server_side.php");
$server = new wepi_server_side();
// Datenbankanbindung
include_once( "wepi_dyn_public.php" );
// Thumbnail-Funktion
include_once( "uplresize.php" );
// Die Größe einer Bilddatei darf 1 MB nicht übersteigen
$maxSize = ( 1024 * 1024 ); // 1 MB
// Fehlermeldung
$maxErrr = "Die Datei % ist gr&ouml;&szlig;er als ein <b>1&nbsp;MB</b>";
// Button-Click, weitere Bilder hochladen
$uplMore = "uploadmplf2.php";
// Der Aufruf zur Datei
$uplPass = "uploadmplf2.php";
// Button-Click, zurück zur vorherigen Inhalt
$uplBack = "";
// Pfad der tatsächlichen Bilder
$uplImageDir = "bilder/";
// Pfad der Thumbnail-Bilder
$uplImageTmb = "bilder2/";
// Hinweis-Information hinsichtlich Mineaturbilder
$uplReMark = "Hinweis: Mineaturansicht kann vom Originalansicht abweichen. Das ist normal.";
// Vorschau
$uplPreview = "Vorschau der hochgeladenen Bilder...";
// Bild hochladen
$uplIUpload = "Bild hochladen";
// Verfügbare Bilder
$uplAvaiImg = "Verf&uuml;gbare Bilder";
// Meldung: Keine Bilder auf dem Server
$uplServerEmpty = "Auf dem Server gibt es derzeit keine Bilder.";
// Button: Weitere...
$uplButtonMore = "Weitere...";
$uplReportMore = "Weitere Bilder hochladen";
// Button: Alle Bilder
$uplAPicBtn = "Alle Bilder...";
$uplAPicRep = "Alle Bilder auf dem Server bearbeiten";
// Button: Hochladen
$uplButtonUpld = "Hochladen";
// Button: Verwerfen
$uplButtonRemv = "Verwerfen";
// Button: Zurück
$uplButtonBack = "Zur&uuml;ck";
// Tooltip: Zurück
$uplToolTipBack = "Zur&uuml;ck zur vorherigen Inhalt";
// Dieses Bild wird anstatt von gelöschten Bildern angezeigt
$uplRemoved = "imgs/none.png";
// Diese Meldung wird anstatt von gelöschten Bildern angezeigt
$uplDelInfo = "Das Bild wurde vom Server entfernt";
// Diese Meldung wird anstatt dem Link angezeigt
$uplDelInf2 = "Datei gel&ouml;scht";
// Aufforderung zum Laden einer Bilddatei
$uplLoadAFile = '<div style = "width:270px;text-align:left;">Bild hochladen oder vom Server w&auml;hlen.</div>';
// Sprache
$uplLang = "de";
// Titel: Zum Bilder hochladen
$uplLoadImgs = "Laden Sie Ihre Bilder hoch...";
// Pfad zur Alle Bilder
$uplAllImages = "uploadmplf2.php?allimages=1";
// Titel, alle Bilder auf dem Server
$uplAPServ = "Alle Bilder auf dem Server...";
// Hinweis über die Bilder die auf dem Server geladen sind
$uplAPInfo = 'Das Laden aller Bilder auf dem Server kann je nach Menge und Gr&ouml;&szlig;e der Bilder 
und basierend auf die Leistung Ihres Servers sowie des verwendeten Client-Rechners 
mehrere Minuten in Anspruch nehmen.';
// Warnung: Inkompatibler Browser
$uplOthBro = '<b>Warnung</b><br /><br /> Der von Ihnen verwendeter Browser kann m&ouml;glicherweise die Bildervorschau und Bild-Hochlade-Funktion nicht 
ordnungsgem&auml;&szlig; darstellen. Es wird empfohlen, einen kompatiblen Browser zu verwenden: <a href = "http://www.getfirefox.com/">Mozilla FireFox</a>, 
<a href = "http://www.google.com/chrome">Google Chrome</a>, <a href = "http://www.srware.net/software_srware_iron_download.php">SWRIron</a> bzw. 
<a href = "http://www.apple.com/de/safari/">Apple Safari</a> w&auml;hren eine gute Wahl.';
// Fehlermeldung: Datei zu groß
$uplToLarge = 'Die Datei <br /><b>%</b><br /> ist zu gro&szlig;. Ihre Bilder <br />
d&uuml;rfen h&ouml;hstens <b>1&nbsp;MB</b> gro&szlig; sein. <br /><br />
Sie k&ouml;nnen Ihre Bilder vollautomatisch <br />
mit der Software <a class = "uplSpecLink" href = "http://www.5m-ware.eu/index.php?page=photosz&lang='.$uplLang.'" 
title = "PhotoSz ist eine professionale Software-L&ouml;sung aus Hause 5M-Ware und dient dazu x-beliebige Bilder mit einem Klick in der Gr&ouml;&szlig;e und Darstellung zu manipulieren. F&uuml;r die kostenpflichtige Software wird eine 14 t&auml;gige Testversion zum kostenlosen Download angeboten." 
>&nbsp;PhotoSz&nbsp;</a> in die <br />
erw&uuml;nschte Gr&ouml;&szlig;e formatieren. <br />';
// Fehlermeldung: Keine gültige Bilddatei
$uplNonSupp = 'Die Datei <br /><b>%</b><br /> ist keine g&uuml;ltige Bilddatei. <br /><br />
G&uuml;ltige Bildformate im Internet sind: <br /><br />
<b>PNG</b>, <b>JPG</b>, <b>GIF</b> <br /><br />
Die Bilder d&uuml;rfen maximal <b>1&nbsp;MB</b> gro&szlig; sein. <br /><br />
<b>Empfohlen</b>: Gr&ouml;&szlig;ere Bilder sollten in <b>JPG</b>, <br />
kleinere Bilder in <b>PNG</b> Format vorliegen.';

?>

<script type = "text/javascript">
	function verwerfe_datei( ident, datei, mintr ) {
		if ( ( document.getElementById("uplsifiImage"+ident) ) && ( document.getElementById("uplsifiLink"+ident) ) ) {
			var img = document.getElementById("uplsifiImage"+ident);
			var lnk = document.getElementById("uplsifiLink"+ident);
			// *** //
			img.innerHTML = '<center><img border = "0" src = "<?php echo $uplRemoved; ?>" title = "<?php echo $uplDelInfo; ?>" /></center>';
			// *** //
			lnk.innerHTML = '<center><?php echo $uplDelInf2; ?></center>';
			// *** //
			svr.Return( "verwerfe_datei", ident, datei, mintr );
		}
	}
</script>

<style type = "text/css">
	.c5m_upload {
		border-top:   1px solid rgb( 170, 170, 170 );
		border-left:  1px solid rgb( 170, 170, 170 );
		border-right: 1px solid rgb( 170, 170, 170 );
		max-width:    720px;
	}
	.c5m_upload .row1 {
		text-align:       center;
		padding-top:      8px;
		padding-left:     4px;
		padding-right:    4px;
		padding-bottom:   8px;
		border-bottom:    1px solid rgb( 140, 150, 160 );
		background-color: #FFFFFF;
	}
	.c5m_upload .row2 {
		text-align:       center;
		padding-top:      8px;
		padding-left:     4px;
		padding-right:    4px;
		padding-bottom:   8px;
		border-bottom:    1px solid rgb( 140, 150, 160 );
		background-color: rgb( 249, 249, 249 );
	}
	.c5m_upload .row1 .error, .c5m_upload .row2 .error {
		color:            rgb( 120, 0, 0 );
		font-weight:      normal;
		text-align:       center;
		padding:          5px;
		border:           2px solid rgb( 120, 0, 0 );
		max-height:       200px;
		overflow:         auto;
	}
	.c5m_upload .row1 .pict, .c5m_upload .row2 .pict {
		border:           1px solid rgb( 170, 170, 170 );
		background-color: #FFFFFF;
		margin-bottom:    5px;
		padding:          5px;
	}
	.c5m_upload .row1 img, .c5m_upload .row2 img {
		max-width:        200px;
		max-height:       200px;
		padding:          3px;
		background-color: #FFFFFF;
	}
	.c5m_upload .row1 img:hover, .c5m_upload .row2 img:hover {
		padding:          1px;
		background-color: rgb( 210, 185, 190 );
		border:           2px dashed rgb( 120, 80, 80 );
	}
	.c5m_upload .row1 a:link, .c5m_upload .row2 a:link,
	.c5m_upload .row1 a:visited, .c5m_upload .row2 a:visited {
		color:            rgb( 80, 80, 170 );
		font-family:      Arial, Helvetica;
		font-size:        12px;
		font-weight:      normal;
		text-decoration:  none;
	}
	.c5m_upload .row1 a:hover, .c5m_upload .row2 a:hover,
	.c5m_upload .row1 a:active, .c5m_upload .row2 a:active {
		color:            rgb( 80, 80, 170 );
		font-family:      Arial, Helvetica;
		font-size:        12px;
		font-weight:      normal;
		text-decoration:  underline;
	}
	.c5m_upload th {
		text-align: center;
		border-bottom: 1px solid rgb( 140, 150, 160 );
	}
	.c5m_upload th .foot input {
		padding: 7px;
		margin: 5px;
		font-weight: bold;
	}
	.c5m_upload th .head {
		padding: 7px;
		background-color: rgb( 200, 200, 200 );
		text-align: left;
		font-size: 20px;
		font-weight: bold;
		color: #000000;
	}
	.c5m_upload th .head small {
		font-weight: normal;
		font-size:   10px;
		color:       rgb( 120, 0, 0 );
	}
	.c5m_upload .row1 .error .uplSpecLink:link, .c5m_upload .row2 .error .uplSpecLink:link,
	.c5m_upload .row1 .error .uplSpecLink:visited, .c5m_upload .row2 .error .uplSpecLink:visited, 
	.c5m_upload .uplSpecLink:link, .c5m_upload .uplSpecLink:visited {
		font-weight:           bold;
		text-decoration:       none;
		background-color:      rgb( 120, 0, 0 );
		border:                1px solid rgb( 120, 0, 0 );
		color:                 #FFFFFF;
        -moz-border-radius:    4px;
        -webkit-border-radius: 4px;
        border-radius:         4px;
	}
	.c5m_upload .row1 .error .uplSpecLink:hover, .c5m_upload .row2 .error .uplSpecLink:hover, 
	.c5m_upload .row1 .error .uplSpecLink:active, .c5m_upload .row2 .error .uplSpecLink:active, 
	.c5m_upload .uplSpecLink:hover, .c5m_upload .uplSpecLink:active {
		background-color:      rgb( 150, 0, 0 );
		border:                1px solid rgb( 60, 0, 0 );
	}
</style>

<?php

if ( ( $_POST['allimages'] ) || ( $_GET['allimages'] ) ) {

	?>
	<table border = "0" cellspacing = "0" cellpadding = "0" align = "center" class = "c5m_upload">
	<tr>
		<th valign = "top" colspan = "3">
			<div class = "head">
				<?php echo $uplAPServ; ?> <br />
				<small>
					<?php echo $uplAPInfo; ?>
				</small>
			</div>
		</th>
	</tr>
	<?php

	$bool = 0; $bols = "row2";

	$query=mysql_query("SELECT * FROM aj_banner_images ORDER BY id");
	if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
	while ( $datensatz = mysql_fetch_array($query) ) {
		$bild = $datensatz['datei'];
		$mintr= $datensatz['mintr'];
		$idnr = $datensatz['id'];
	// *** //
	{
		{
			$name     = $bild;
			$datei    = $bild;
			// *** //
			$geladen = 1;
			// *** //
			if ( $bool == 0 ) {
				if ( $bols == "row1" ) {
					$bols = "row2";
				} elseif ( $bols == "row2" ) {
					$bols = "row1";
				}
				// *** //
				echo '
					<tr>
						<td class = "'.$bols.'" valign = "top">
							<div class = "pict" id = "uplsifiImage'.$idnr.'">
								<center>
									<img border = "0" src = "'.$mintr.'" />
								</center>
							</div>
							<div align = "right" id = "uplsifiLink'.$idnr.'">
								<input type = "text" style = "display:none;" value = "'.$datei.'" />
								<a href = "javascript:verwerfe_datei('.$idnr.',\''.$datei.'\',\''.$mintr.'\');">Verwerfen</a>
							</div>
						</td>
				';
				// *** //
				$bool = 1;
			} elseif ( $bool == 1 ) {
				echo '
						<td class = "'.$bols.'" valign = "top">
							<div class = "pict" id = "uplsifiImage'.$idnr.'">
								<center>
									<img border = "0" src = "'.$mintr.'" />
								</center>
							</div>
							<div align = "right" id = "uplsifiLink'.$idnr.'">
								<input type = "text" style = "display:none;" value = "'.$datei.'" />
								<a href = "javascript:verwerfe_datei('.$idnr.',\''.$datei.'\',\''.$mintr.'\');">Verwerfen</a>
							</div>
						</td>
				';
				// *** //
				$bool = 2;
			} elseif ( $bool == 2 ) {
				echo '
						<td class = "'.$bols.'" valign = "top">
							<div class = "pict" id = "uplsifiImage'.$idnr.'">
								<center>
									<img border = "0" src = "'.$mintr.'" />
								</center>
							</div>
							<div align = "right" id = "uplsifiLink'.$idnr.'">
								<input type = "text" style = "display:none;" value = "'.$datei.'" />
								<a href = "javascript:verwerfe_datei('.$idnr.',\''.$datei.'\',\''.$mintr.'\');">Verwerfen</a>
							</div>
						</td>
					</tr>
				';
				// *** //
				$bool = 0;
			}
		}
	}
?>
	<?php
	}
	// *** //
	if     ( $bool == 1 ) { echo '<td class = "'.$bols.'">&nbsp;</td><td class = "'.$bols.'">&nbsp;</td></tr>'; }
	elseif ( $bool == 2 ) { echo '<td class = "'.$bols.'">&nbsp;</td></tr>'; }
	?>

	<tr>
	<th valign = "top" colspan = "3" align = "right">
		<div align = "right" class = "foot">
			<input type = "button"
				   value = "<?php echo $uplButtonBack; ?>"
				   style = "font-weight: normal;"
				   title = "<?php echo $uplToolTipBack; ?>"
				   onclick = "javascript:history.back();"
			/>
			<input type = "button"
			       value = "<?php echo $uplButtonMore; ?>"
			       title = "<?php echo $uplReportMore; ?>"
				   onclick = "javascript:location.href = '<?php echo $uplMore; ?>';"
			/>
		</div>
	</th>
	</tr>
	</table>

	<?php

} elseif ( ( $_POST['uploaded'] ) || ( $_GET['uploaded'] ) ) {

?>

	<form enctype="multipart/form-data" action="<?php echo $uplPass; ?>" method="POST">
	<input type = "text" name = "allimages" style = "display:none;" value = "ok" />
	<table border = "0" cellspacing = "0" cellpadding = "0" align = "center" class = "c5m_upload">
	<tr>
		<th valign = "top" colspan = "3">
			<div class = "head">
				<?php echo $uplPreview; ?>
			</div>
		</th>
	</tr>
<?php
	$boid = 0; $bool = 0; $bols = "row2";
	// *** //
	foreach ($_FILES["datei"]["error"] as $key => $error) {
		if ( $error == 0 ) {
			$boid++;
			// *** //
			$tmp_name = $_FILES["datei"]["tmp_name"][$key];
			$name     = $_FILES["datei"]["name"][$key];
			$size     = $_FILES["datei"]["size"][$key];
			$datei    = "./$uplImageDir".neuername($name);
			$mintr    = "./$uplImageTmb".neuername($name);
			// *** //
			$idnr = $boid;
			// *** //
			if (strstr(strtolower($datei), "png")) {
				$geladen = 1;
			} elseif (strstr(strtolower($datei), "jpg")) {
				$geladen = 1;
			} elseif (strstr(strtolower($datei), "jpeg")) {
				$geladen = 1;
			} elseif (strstr(strtolower($datei), "gif")) {
				$geladen = 1;
			} else {
				$geladen = 0;
			}
			// *** //
			if ( $geladen == 1 ) {
				if ( $maxSize < $size ) {
					$geladen = 2;
				}
			}
			// *** //
			if ( $geladen == 1 ) {
				$mintr = thumbnail( $tmp_name, $datei, $mintr, "./$uplImageTmb" );
				// *** //
				if ( $mintr ) {
					move_uploaded_file( $tmp_name, $datei );
					// *** //
					$query=mysql_query("INSERT INTO aj_banner_images ( datei, mintr ) VALUES ( '$datei', '$mintr' )");
					if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
				}
			}
			// *** //
			if ( $bool == 0 ) {
				if ( $bols == "row1" ) {
					$bols = "row2";
				} elseif ( $bols == "row2" ) {
					$bols = "row1";
				}
				// *** //
				if ( $geladen == 1 ) {
					echo '
						<tr>
							<td class = "'.$bols.'" valign = "top" height = "100%">
								<div class = "pict" id = "uplsifiImage'.$idnr.'">
									<center>
										<img border = "0" src = "'.$mintr.'" id = "tebiSing" title = "'.$uplReMark.'" />
									</center>
								</div>
								<div align = "right" id = "uplsifiLink'.$idnr.'">
									<input type = "text" style = "display:none;" value = "'.$datei.'" />
									<a href = "javascript:verwerfe_datei('.$idnr.',\''.$datei.'\',\''.$mintr.'\');">'.$uplButtonRemv.'</a>
								</div>
							</td>
					';
				} elseif ( $geladen == 2 ) {
					echo '
						<tr>
							<td class = "'.$bols.'" valign = "top" align = "left" height = "100%" id = "uplsifiCont">
								<div class = "error">
									'.ereg_replace( "%", $name, $uplToLarge ).'
								</div>
							</td>
					';
				} else {
					echo '
						<tr>
							<td class = "'.$bols.'" valign = "top" align = "left" height = "100%" id = "uplsifiCont">
								<div class = "error">
									'.ereg_replace( "%", $name, $uplNonSupp ).'
								</div>
							</td>
					';
				}
				// *** //
				$bool = 1;
			} elseif ( $bool == 1 ) {
				if ( $geladen == 1 ) {
					echo '
							<td class = "'.$bols.'" valign = "top" height = "100%">
								<div class = "pict" id = "uplsifiImage'.$idnr.'">
									<center>
										<img border = "0" src = "'.$mintr.'" id = "tebiSing" title = "'.$uplReMark.'" />
									</center>
								</div>
								<div align = "right" id = "uplsifiLink'.$idnr.'">
									<input type = "text" style = "display:none;" value = "'.$datei.'" />
									<a href = "javascript:verwerfe_datei('.$idnr.',\''.$datei.'\',\''.$mintr.'\');">'.$uplButtonRemv.'</a>
								</div>
							</td>
					';
				} elseif ( $geladen == 2 ) {
					echo '
							<td class = "'.$bols.'" valign = "top" align = "left" height = "100%" id = "uplsifiCont">
								<div class = "error">
									'.ereg_replace( "%", $name, $uplToLarge ).'
								</div>
							</td>
					';
				} else {
					echo '
							<td class = "'.$bols.'" valign = "top" align = "left" height = "100%" id = "uplsifiCont">
								<div class = "error">
									'.ereg_replace( "%", $name, $uplNonSupp ).'
								</div>
							</td>
					';
				}
				// *** //
				$bool = 2;
			} elseif ( $bool == 2 ) {
				if ( $geladen == 1 ) {
					echo '
							<td class = "'.$bols.'" valign = "top" height = "100%">
								<div class = "pict" id = "uplsifiImage'.$idnr.'">
									<center>
										<img border = "0" src = "'.$mintr.'" id = "tebiSing" title = "'.$uplReMark.'" />
									</center>
								</div>
								<div align = "right" id = "uplsifiLink'.$idnr.'">
									<input type = "text" style = "display:none;" value = "'.$datei.'" />
									<a href = "javascript:verwerfe_datei('.$idnr.',\''.$datei.'\',\''.$mintr.'\');">'.$uplButtonRemv.'</a>
								</div>
							</td>
						</tr>
					';
				} elseif ( $geladen == 2 ) {
					echo '
							<td class = "'.$bols.'" valign = "top" align = "left" height = "100%" id = "uplsifiCont">
								<div class = "error">
									'.ereg_replace( "%", $name, $uplToLarge ).'
								</div>
							</td>
						</tr>
					';
				} else {
					echo '
							<td class = "'.$bols.'" valign = "top" align = "left" height = "100%" id = "uplsifiCont">
								<div class = "error">
									'.ereg_replace( "%", $name, $uplNonSupp ).'
								</div>
							</td>
						</tr>
					';
				}
				// *** //
				$bool = 0;
			}
		}
	}
	// *** //
	if     ( $bool == 1 ) { echo '<td class = "'.$bols.'">&nbsp;</td><td class = "'.$bols.'">&nbsp;</td></tr>'; }
	elseif ( $bool == 2 ) { echo '<td class = "'.$bols.'">&nbsp;</td></tr>'; }
?>
	<tr>
	<th valign = "top" colspan = "3" align = "right">
		<div align = "right" class = "foot">
			<input type = "button"
				   value = "<?php echo $uplButtonBack; ?>"
				   style = "font-weight: normal;"
				   title = "<?php echo $uplToolTipBack; ?>"
				   onclick = "javascript:history.back();"
			/>
			<input type = "button"
			       value = "<?php echo $uplButtonMore; ?>"
			       title = "<?php echo $uplReportMore; ?>"
				   onclick = "javascript:location.href = '<?php echo $uplMore; ?>';"
			/>
			<input type = "submit" 
				   value = "<?php echo $uplAPicBtn; ?>" 
				   title = "<?php echo $uplAPicRep; ?>"
			/>
		</div>
	</th>
	</tr>
	</table>
	</form>

<?php

} else {

?>

<form enctype="multipart/form-data" action="<?php echo $uplPass; ?>" method="POST">
	<input type = "text" name = "uploaded" style = "display:none;" value = "ok" />
	<table border = "0" cellspacing = "0" cellpadding = "0" align = "center" class = "c5m_upload">
	<tr>
		<th valign = "top" colspan = "2">
			<div class = "head">
				<?php echo $uplLoadImgs; ?>
			</div>
		</th>
	</tr>
	<tr>
		<td class = "row1" valign = "top">1. <input name = "datei[]" type = "file" /></td>
		<td class = "row1" valign = "top">2. <input name = "datei[]" type = "file" /></td>
	</tr>
	<tr>
		<td class = "row2" valign = "top">3. <input name = "datei[]" type = "file" /></td>
		<td class = "row2" valign = "top">4. <input name = "datei[]" type = "file" /></td>
	</tr>
	<tr>
		<td class = "row1" valign = "top">5. <input name = "datei[]" type = "file" /></td>
		<td class = "row1" valign = "top">6. <input name = "datei[]" type = "file" /></td>
	</tr>
	<tr>
		<td class = "row2" valign = "top">7. <input name = "datei[]" type = "file" /></td>
		<td class = "row2" valign = "top">8. <input name = "datei[]" type = "file" /></td>
	</tr>
	<tr>
		<td class = "row1" valign = "top">9. <input name = "datei[]" type = "file" /></td>
		<td class = "row1" valign = "top">10. <input name = "datei[]" type = "file" /></td>
	</tr>
	<tr>
		<td class = "row2" valign = "top">11. <input name = "datei[]" type = "file" /></td>
		<td class = "row2" valign = "top">12. <input name = "datei[]" type = "file" /></td>
	</tr>
	<tr>
		<td class = "row1" valign = "top">13. <input name = "datei[]" type = "file" /></td>
		<td class = "row1" valign = "top">14. <input name = "datei[]" type = "file" /></td>
	</tr>
	<tr>
		<td class = "row2" valign = "top">15. <input name = "datei[]" type = "file" /></td>
		<td class = "row2" valign = "top">16. <input name = "datei[]" type = "file" /></td>
	</tr>
	<tr>
		<td class = "row1" valign = "top">17. <input name = "datei[]" type = "file" /></td>
		<td class = "row1" valign = "top">18. <input name = "datei[]" type = "file" /></td>
	</tr>
	<tr>
		<td class = "row2" valign = "top">19. <input name = "datei[]" type = "file" /></td>
		<td class = "row2" valign = "top">20. <input name = "datei[]" type = "file" /></td>
	</tr>
	<tr>
	<th valign = "top" colspan = "2" align = "right">
		<div align = "right" class = "foot">
			<input type = "button"
			       value = "<?php echo $uplAPicBtn; ?>"
			       title = "<?php echo $uplAPicRep; ?>"
				   onclick = "javascript:location.href = '<?php echo $uplAllImages; ?>';"
				   style = "font-weight:normal;"
			/>
			<input type="submit" value = "<?php echo $uplButtonUpld; ?>" />
		</div>
	</th>
	</tr>
	</table>
</form>

<?php } ?>
</body></html>
<?php } ?>

