<?php 
	session_start(); 
	if ( $_SESSION['logged'] == 1 ) {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN">
<html>
  <head>
<script type = "text/javascript" src = "api/wepi_core.js"></script>
<script type = "text/javascript" src = "api/wepi_serv.js"></script>
<script type = "text/javascript"> var svr = new wepiServ(); </script>
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
if ( $uplForceHeader == "" ) { include_once( "wepi_dyn_public.php" ); }
// Thumbnail-Funktion
include_once( "uplresize.php" );
// Die Größe einer Bilddatei darf 1 MB nicht übersteigen
$maxSize = ( 1024 * 1024 ); // 1 MB
// Fehlermeldung
$maxErrr = "Die Datei % ist gr&ouml;&szlig;er als ein <b>1&nbsp;MB</b>";
// Button-Click, weitere Bilder hochladen
//$uplMore = "uploadmplf.php";
if ( $uplForceHeader == "" ) { $uplMore = "http://localhost/uploadsifi2.php"; }
// Der Aufruf zur Datei
if ( $uplForceHeader == "" ) { $uplPass = "uploadsifi2.php?".session_id()."&sessno=".$_GET['sessno']."&pid=".$_GET['pid']."&"; }
// Button-Click, zurück zur vorherigen Inhalt
$uplBack = "";
// Pfad der tatsächlichen Bilder
$uplImageDir = "bilder/";
// Pfad der Thumbnail-Bilder
$uplImageTmb = "bilder2/";
// Hinweis-Information hinsichtlich Mineaturbilder
$uplReMark = "Hinweis: Mineaturansicht kann vom Originalansicht abweichen. Das ist normal. Wird das Bild schwarz dargestellt, dann konnte die Mineaturansicht nicht erstellt werden. Konvertieren Sie das Bild mit einem Konvertierungsprogramm in ein Standard-JPEG oder Standard-PNG. Die Darstellung der Mineaturansicht hat keinen Effekt auf das Originalbild.";
// Vorschau
$uplPreview = "Vorschau";
// Bild hochladen
$uplIUpload = "Bild hochladen";
// Verfügbare Bilder
$uplAvaiImg = "Verf&uuml;gbare Bilder";
// Meldung: Keine Bilder auf dem Server
$uplServerEmpty = "Auf dem Server gibt es derzeit keine Bilder.";
// Button: Weitere...
$uplButtonMore = "Weitere...";
$uplReportMore = "Weitere Bilder hochladen";
// Button: Hochladen
$uplButtonUpld = "Hochladen";
// Button: Verwerfen
$uplButtonRemv = "Verwerfen";
// Dieses Bild wird anstatt von gelöschten Bildern angezeigt


$query=mysql_query("SELECT * FROM worker_cats WHERE id = '".$_GET['pid']."'");
if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
while ( $datensatz = mysql_fetch_array($query) ) {
	$bild = $datensatz['bild'];
}

$_SESSION['worker.station.bild'] = $bild;

if ( ! $_SESSION['worker.station.bild'] ) {
	$uplRemoved = "imgs/none.png";
} else {
	$query=mysql_query("SELECT * FROM aj_images WHERE id = '".$_SESSION['worker.station.bild']."'");
	if(!$query) die("Fehler bei der Abfrage: ".mysql_error()); $uplRemoved = "imgs/none.png";
	while ( $datensatz = mysql_fetch_array($query) ) {
		$uplRemoved = $datensatz['mintr'];
	}
}
// Diese Meldung wird anstatt von gelöschten Bildern angezeigt
$uplDelInfo = "Das Bild wurde vom Server entfernt";
// Diese Meldung wird anstatt dem Link angezeigt
$uplDelInf2 = "Datei gel&ouml;scht";
// Aufforderung zum Laden einer Bilddatei
$uplLoadAFile = '<div style = "width:270px;text-align:left;">Bild hochladen oder vom Server w&auml;hlen.</div>';
// Sprache
$uplLang = "de";
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

/*
$uplRunByUpload
	Diese Variable kann mittels POST oder GET gesetzt werden und enthält
	einen JavaScript-Code, der nach jedem Upload automatisch ausgeführt wird.

$uplRunBySelection
	Diese Variable kann mittels POST oder GET gesetzt werden und enthält
	einen JavaScript-Code, der nach jeder Selektion automatisch ausgeführt wird.
*/
$uplC = trim($_POST['uplRunByUpload']);
if ( $uplC == "" ) { $uplC = trim($_GET['uplRunByUpload']); }
$uplRunByUpload = $uplC;
// *** //
$uplC = trim($_POST['uplRunBySelection']);
if ( $uplC == "" ) { $uplC = trim($_GET['uplRunBySelection']); }
$uplRunBySelection = $uplC;

?>

<script type = "text/javascript">
	var svr = new wepiServ(); svr.sessionID = '<?php echo session_id(); ?>';
	function uplSifiThatImage ( i, m, f ) {
		if ( ( document.getElementById("uplsifiImage") ) && ( document.getElementById("uplsifiLink") ) ) {
			var img = document.getElementById("uplsifiImage");
			var lnk = document.getElementById("uplsifiLink");
			// *** //
			img.innerHTML = '<center><img border = "0" src = "' + f + '" id = "tebiSing" /></center>';
			// *** //
			lnk.innerHTML = '<input type = "text" style = "display:none;" value = "' + f + '" /><a href = "javascript:verwerfe_datei(' + i + ',\''+ f + '\',\''+ m + '\');"><?php echo $uplButtonRemv; ?></a>';
			// *** //
			svr.Sess("worker.station.bild", i );
		} else {
			if ( document.getElementById("uplsifiCont") ) {
				var con = document.getElementById("uplsifiCont");
				// *** //
				con.innerHTML = '<div class = "pict" id = "uplsifiImage">' +
								'<center><img border = "0" src = "' + f + '" id = "tebiSing" /></center>' +
								'</div>' +
								'<div align = "right" id = "uplsifiLink">' +
								'<input type = "text" style = "display:none;" value = "' + f + '" />' +
								'<a href = "javascript:verwerfe_datei(\'tebiSing\',\'' + f + '\',\'' + m + '\');"><?php echo $uplButtonRemv; ?></a>' +
								'</div>';
				// *** //
				svr.Sess("worker.station.bild", i );
			}
		}
		<?php if (( $uplRunBySelection != "" ) && ( file_exists($uplRunBySelection.'.php') ) ) { include "$uplRunBySelection.php"; } ?>
	}
	function verwerfe_datei( ident, datei, mintr ) {
		if ( ( document.getElementById("uplsifiImage") ) && ( document.getElementById("uplsifiLink") ) ) {
			var img = document.getElementById("uplsifiImage");
			var lnk = document.getElementById("uplsifiLink");
			// *** //
			img.innerHTML = '<center><img border = "0" src = "<?php echo $uplRemoved; ?>" title = "<?php echo $uplDelInfo; ?>" /></center>';
			// *** //
			lnk.innerHTML = '<center><?php echo $uplDelInf2; ?></center>';
			// *** //
			svr.Return( "verwerfe_datei", ident, datei, mintr );
			// *** //
			var obj = "uplMintr" + ident;
			// *** //
			if ( document.getElementById(obj) ) {
				document.getElementById(obj).innerHTML = '<center><img border = "0" src = "<?php echo $uplRemoved; ?>" /></center>';
			}
		}
	}
</script>

<style type = "text/css">
	.c5m_broEr {
		font-family: Arial, Helvetica;
		font-size: 12px;
		font-weight: normal;
		text-align: left;
		padding: 5px;
		margin-bottom: 1px;
		border: 1px solid rgb( 120, 0, 0 );
		background-color: rgb( 250, 230, 230 );
		color: #000000;
		width: 594px;
	}
	.c5m_broEr a:link, .c5m_broEr a:visited {
		color: rgb( 140, 0, 0 );
		text-decoration: none;
	}
	..c5m_broEr a:hover, .c5m_broEr a:active {
		text-decoration: underline;
	}
	.c5m_upload {
		border-top:   1px solid rgb( 170, 170, 170 );
		border-left:  1px solid rgb( 170, 170, 170 );
		border-right: 1px solid rgb( 170, 170, 170 );
		min-width:    300px;
		max-width:    720px;
		height:       440px;
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
		text-align:       left;
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
	/* -------------------------------- */
	.c5m_upload_bySide {
		border-top:   1px solid rgb( 170, 170, 170 );
		border-right: 1px solid rgb( 170, 170, 170 );
		min-width:    340px;
		max-width:    720px;
		height:       440px;
	}
	.c5m_upload_bySide .row1 {
		text-align:       center;
		padding-top:      4px;
		padding-left:     1px;
		padding-right:    1px;
		padding-bottom:   4px;
		border-bottom:    1px solid rgb( 140, 150, 160 );
		background-color: #FFFFFF;
	}
	.c5m_upload_bySide .row2 {
		text-align:       center;
		padding-top:      4px;
		padding-left:     1px;
		padding-right:    1px;
		padding-bottom:   4px;
		border-bottom:    1px solid rgb( 140, 150, 160 );
		background-color: rgb( 249, 249, 249 );
	}
	.c5m_upload_bySide .row1 .selection, .c5m_upload_bySide .row2 .selection {
		height:           398px;
		overflow:         auto;
	}
	.c5m_upload_bySide .row1 .error, .c5m_upload_bySide .row2 .error {
		color:            rgb( 120, 0, 0 );
		font-weight:      normal;
		text-align:       left;
	}
	.c5m_upload_bySide .row1 .pict, .c5m_upload_bySide .row2 .pict {
		/*background-color: #FFFFFF;
		border:           1px solid rgb( 170, 170, 170 );
		padding:          1px;*/
	}
	.c5m_upload_bySide .row1 img, .c5m_upload_bySide .row2 img {
		border:           1px solid rgb( 170, 170, 170 );
		background-color: #FFFFFF;
		padding:          2px;
		cursor:           pointer;
		<?php
			if ( ( $server->browser == "ie" ) || ( $server->browser == "universal" ) || ( $server->browser == "" ) ) {
				echo '
		width:            90px;
				';
			} else {
				echo '
		max-width:        90px;
		max-height:       90px;
				';
			}
		?>
	}
	.c5m_upload_bySide .row1 img:hover, .c5m_upload_bySide .row2 img:hover {
		padding:          2px;
		background-color: rgb( 210, 185, 190 );
		border:           1px dashed rgb( 120, 80, 80 );
	}
	.c5m_upload_bySide .row1 a:link, .c5m_upload_bySide .row2 a:link,
	.c5m_upload_bySide .row1 a:visited, .c5m_upload_bySide .row2 a:visited {
		color:            rgb( 80, 80, 170 );
		font-family:      Arial, Helvetica;
		font-size:        12px;
		font-weight:      normal;
		text-decoration:  none;
	}
	.c5m_upload_bySide .row1 a:hover, .c5m_upload_bySide .row2 a:hover,
	.c5m_upload_bySide .row1 a:active, .c5m_upload_bySide .row2 a:active {
		color:            rgb( 80, 80, 170 );
		font-family:      Arial, Helvetica;
		font-size:        12px;
		font-weight:      normal;
		text-decoration:  underline;
	}
	.c5m_upload_bySide th {
		text-align: center;
		border-bottom: 1px solid rgb( 140, 150, 160 );
	}
	.c5m_upload_bySide th .foot input {
		padding: 7px;
		margin: 5px;
		font-weight: bold;
	}
	.c5m_upload_bySide th .head {
		padding: 7px;
		background-color: rgb( 200, 200, 200 );
		text-align: left;
		font-size: 20px;
		font-weight: bold;
		color: #000000;
	}
	.c5m_upload_bySide th .head small {
		font-weight: normal;
		font-size:   10px;
		color:       rgb( 120, 0, 0 );
	}

</style>

<?php

if  ( ( $_POST['uploaded'] ) || ( $_GET['uploaded'] ) ) {

?>

	<div style = "height:440px;">
	<?php
	if ( ( $server->browser == "ie" ) || ( $server->browser == "universal" ) || ( $server->browser == "" ) ) {
		echo '<center><div class = "c5m_broEr">'.$uplOthBro.'</div></center>';
	}
	?>
	<table border = "0" cellspacing = "0" cellpadding = "0" align = "center" style = "height:440px;"><tr>
		<td valign = "top">
				<form enctype="multipart/form-data" action="<?php echo $uplPass; ?>" method="POST">
				<table border = "0" cellspacing = "0" cellpadding = "0" align = "center" class = "c5m_upload">
				<tr>
					<th valign = "top" colspan = "3">
						<div class = "head">
							<?php echo $uplPreview; ?>
						</div>
					</th>
				</tr>
			<?php
				$bool = 0; $bols = "row2";
				// *** //
				{
					{
						$tmp_name = $_FILES["datei"]["tmp_name"];
						$name     = $_FILES["datei"]["name"];
						$size     = $_FILES["datei"]["size"];
						$datei    = "./$uplImageDir".neuername($name);
						$mintr    = "./$uplImageTmb".neuername($name);
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
								$query=mysql_query("INSERT INTO aj_images ( datei, mintr ) VALUES ( '$datei', '$mintr' )");
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
											<div class = "pict" id = "uplsifiImage">
												<center>
													<img border = "0" src = "'.$mintr.'" id = "tebiSing" title = "'.$uplReMark.'" />
												</center>
											</div>
											<div align = "right" id = "uplsifiLink">
												<input type = "text" style = "display:none;" value = "'.$datei.'" />
												<a href = "javascript:verwerfe_datei(\'tebiSing\',\''.$datei.'\',\''.$mintr.'\');">'.$uplButtonRemv.'</a>
											</div>
										</td>
									</tr>
								';
							} elseif ( $geladen == 2 ) {
								echo '
									<tr>
										<td class = "'.$bols.'" valign = "top" align = "left" height = "100%" id = "uplsifiCont">
											<span class = "error">
												'.ereg_replace( "%", $name, $uplToLarge ).'
											</span>
										</td>
									</tr>
								';
							} else {
								echo '
									<tr>
										<td class = "'.$bols.'" valign = "top" align = "left" height = "100%" id = "uplsifiCont">
											<span class = "error">
												'.ereg_replace( "%", $name, $uplNonSupp ).'
											</span>
										</td>
									</tr>
								';
							}
						}
					}
				}
				$da = $datei; $mi = $mintr;
			?>
				<tr>
					<th valign = "top">
						<input type = "text" name = "uploaded" style = "display:none;" value = "ok" />
						<div class = "head">
							<?php echo $uplIUpload; ?>
						</div>
					</th>
				</tr>
				<tr>
					<td class = "row1" valign = "top" height = "100%"><input name = "datei" type = "file" /></td>
				</tr>
				<tr>
				<th valign = "top" align = "right">
					<div align = "right" class = "foot">
						<input type="submit" value = "<?php echo $uplButtonUpld; ?>" />
					</div>
				</th>
				</tr>
				</table>
			</form>

		</td><td valign = "top">
			<form enctype="multipart/form-data" action="uploadmplf.php" method="POST">
				<input type = "text" name = "uploaded" style = "display:none;" value = "ok" />
				<input type = "text" name = "pickedup" style = "display:none;" value = "ok" />
				<table border = "0" cellspacing = "0" cellpadding = "0" class = "c5m_upload_bySide">
				<tr>
					<th valign = "top">
						<div class = "head">
							<?php echo $uplAvaiImg; ?>
						</div>
					</th>
				</tr>
				<tr>
					<td class = "row1" valign = "top" style = "padding:0px; margin:0px;">
						<div align = "left" class = "selection" style = "height: 398px; overflow: auto;">
							<table border = "0" cellspacing = "0" cellpadding = "0" align = "center" style = "height:440px;">
								<?php

								$bool = 0; $bols = "row2"; $bi = 0;

								$query=mysql_query("SELECT * FROM aj_images ORDER BY id");
								if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
								while ( $datensatz = mysql_fetch_array($query) ) {
									$bi++;
									// *** //
									$idnr = $datensatz['id'];
									$bild = $datensatz['datei'];
									$mintr = $datensatz['mintr'];
									// *** //
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
													<div class = "pict" id = "uplMintr'.$idnr.'">
														<center>
															<img border = "0" src = "'.$mintr.'" onclick = "javascript:uplSifiThatImage('.$idnr.',\''.$datei.'\',\''.$mintr.'\');" title = "'.$uplReMark.'" />
														</center>
													</div>
												</td>
										';
										// *** //
										$bool = 1;
									} elseif ( $bool == 1 ) {
										echo '
												<td class = "'.$bols.'" valign = "top">
													<div class = "pict" id = "uplMintr'.$idnr.'">
														<center>
															<img border = "0" src = "'.$mintr.'" onclick = "javascript:uplSifiThatImage('.$idnr.',\''.$datei.'\',\''.$mintr.'\');" title = "'.$uplReMark.'" />
														</center>
													</div>
												</td>
										';
										// *** //
										$bool = 2;
									} elseif ( $bool == 2 ) {
										echo '
												<td class = "'.$bols.'" valign = "top">
													<div class = "pict" id = "uplMintr'.$idnr.'">
														<center>
															<img border = "0" src = "'.$mintr.'" onclick = "javascript:uplSifiThatImage('.$idnr.',\''.$datei.'\',\''.$mintr.'\');" title = "'.$uplReMark.'" />
														</center>
													</div>
												</td>
											</tr>
										';
										// *** //
										$bool = 0;
									}
								}
								// *** //
								if     ( $bool == 1 ) { echo '<td class = "'.$bols.'">&nbsp;</td><td class = "'.$bols.'">&nbsp;</td></tr>'; }
								elseif ( $bool == 2 ) { echo '<td class = "'.$bols.'">&nbsp;</td></tr>'; }
								// *** //
								if ( $bi > 0 ) {
								?>
								<tr>
								<th valign = "top" align = "right" colspan = "3" style = "border-bottom: none; padding-bottom: 0px; margin-bottom: 0px;">
								</th>
								</tr>
								<?php
								} else {
								?>
								<tr>
								<th valign = "top" align = "right" colspan = "3" style = "border-bottom: none; padding-bottom: 0px; margin-bottom: 0px;" width = "100%">
									<div align = "right" class = "foot" style = "padding-bottom: 0px; margin-bottom: 0px; padding-top: 10px;">
										<?php echo $uplServerEmpty; ?>
									</div>
								</th>
								</tr>
								<?php
								}
								?>
							</table>
						</div>
					</td>
				</tr>
				</table>
			</form>
		</td>
	</tr></table></div>
	<script type = "text/javascript">
		<?php if (( $uplRunByUpload != "" ) && ( file_exists($uplRunByUpload.'.php') ) ) { include "$uplRunByUpload.php"; } ?>
	</script>
<?php

} else {

?>

	<div style = "height:440px;">
	<?php
	if ( ( $server->browser == "ie" ) || ( $server->browser == "universal" ) || ( $server->browser == "" ) ) {
		echo '<center><div class = "c5m_broEr">'.$uplOthBro.'</div></center>';
	}
	?>
	<table border = "0" cellspacing = "0" cellpadding = "0" align = "center" style = "height:440px;"><tr>
		<td valign = "top">
			<form enctype="multipart/form-data" action="<?php echo $uplPass; ?>?uplRunByUpload=<?php echo $uplRunByUpload; ?>" method="POST">
				<input type = "text" name = "uploaded" style = "display:none;" value = "ok" />
				<table border = "0" cellspacing = "0" cellpadding = "0" class = "c5m_upload" width = "100%" style = "height:440px;">
				<tr>
					<th valign = "top">
						<div class = "head">
							<?php echo $uplPreview; ?>
						</div>
					</th>
				</tr>
				<tr>
					<td valign = "top" height = "100%" id = "uplsifiCont" class = "row1">
						<div class = "pict" id = "uplsifiImage">
							<center>
								<img border = "0" src = "<?php echo $uplRemoved; ?>" id = "tebiSing" />
							</center>
						</div>
						<div align = "right" id = "uplsifiLink">
							<?php echo $uplLoadAFile; ?>
						</div>
					</td>
				</tr>
				<tr>
					<th valign = "top">
						<div class = "head">
							<?php echo $uplIUpload; ?>
						</div>
					</th>
				</tr>
				<tr>
					<td class = "row1" valign = "top" height = "100%"><input name = "datei" type = "file" /></td>
				</tr>
				<tr>
				<th valign = "top" align = "right">
					<div align = "right" class = "foot">
						<input type="submit" value = "<?php echo $uplButtonUpld; ?>" />
					</div>
				</th>
				</tr>
				</table>
			</form>
		</td><td valign = "top">
			<form enctype="multipart/form-data" action="uploadmplf.php" method="POST">
				<input type = "text" name = "uploaded" style = "display:none;" value = "ok" />
				<input type = "text" name = "pickedup" style = "display:none;" value = "ok" />
				<table border = "0" cellspacing = "0" cellpadding = "0" class = "c5m_upload_bySide" style = "height:440px;">
				<tr>
					<th valign = "top">
						<div class = "head">
							<?php echo $uplAvaiImg; ?>
						</div>
					</th>
				</tr>
				<tr>
					<td class = "row1" valign = "top" style = "padding:0px;margin:0px;">
						<div align = "left" class = "selection" style = "height: 398px; height: 398px; overflow: auto;">
							<table border = "0" cellspacing = "0" cellpadding = "0" align = "center">
								<?php
								$bool = 0; $bols = "row2"; $bi = 0;
								$query=mysql_query("SELECT * FROM aj_images ORDER BY id");
								if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
								while ( $datensatz = mysql_fetch_array($query) ) {
									$bi++;
									// *** //
									$idnr = $datensatz['id'];
									$bild = $datensatz['datei'];
									$mintr = $datensatz['mintr'];
									// *** //
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
													<div class = "pict" id = "uplMintr'.$idnr.'">
														<center>
															<img style = "width:90px;" border = "0" src = "'.$mintr.'" onclick = "javascript:uplSifiThatImage('.$idnr.',\''.$datei.'\',\''.$mintr.'\');" title = "'.$uplReMark.'" />
														</center>
													</div>
												</td>
										';
										// *** //
										$bool = 1;
									} elseif ( $bool == 1 ) {
										echo '
												<td class = "'.$bols.'" valign = "top">
													<div class = "pict" id = "uplMintr'.$idnr.'">
														<center>
															<img style = "width:90px;" border = "0" src = "'.$mintr.'" onclick = "javascript:uplSifiThatImage('.$idnr.',\''.$datei.'\',\''.$mintr.'\');" title = "'.$uplReMark.'" />
														</center>
													</div>
												</td>
										';
										// *** //
										$bool = 2;
									} elseif ( $bool == 2 ) {
										echo '
												<td class = "'.$bols.'" valign = "top">
													<div class = "pict" id = "uplMintr'.$idnr.'">
														<center>
															<img style = "width:90px;" border = "0" src = "'.$mintr.'" onclick = "javascript:uplSifiThatImage('.$idnr.',\''.$datei.'\',\''.$mintr.'\');" title = "'.$uplReMark.'" />
														</center>
													</div>
												</td>
											</tr>
										';
										// *** //
										$bool = 0;
									}
								}
								// *** //
								if     ( $bool == 1 ) { echo '<td class = "'.$bols.'">&nbsp;</td><td class = "'.$bols.'">&nbsp;</td></tr>'; }
								elseif ( $bool == 2 ) { echo '<td class = "'.$bols.'">&nbsp;</td></tr>'; }
								// *** //
								if ( $bi > 0 ) {
								?>
								<tr>
								<th valign = "top" align = "right" colspan = "3" style = "border-bottom: none; padding-bottom: 0px; margin-bottom: 0px;">
								</th>
								</tr>
								<?php
								} else {
								?>
								<tr>
								<th valign = "top" align = "right" colspan = "3" style = "border-bottom: none; padding-bottom: 0px; margin-bottom: 0px;" width = "100%">
									<div align = "right" class = "foot" style = "padding-bottom: 0px; margin-bottom: 0px; padding-top: 10px;">
										<?php echo $uplServerEmpty; ?>
									</div>
								</th>
								</tr>
								<?php
								}
								?>
							</table>
						</div>
					</td>
				</tr>
				</table>
			</form>
		</td>
	</tr></table></div>

<?php } ?>
</body></html>
<?php } ?>
