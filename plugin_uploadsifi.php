<?php session_start(); ?>

<!-- ------------------------------------------------------------------------------------------------ --
  -- ------------------------------------------------------------------------------------------------ --
  --
  -- 5M-Ware tinyMCE plugin-extension
  -- Copyright 2014(c)
  -- info@5m-ware.eu
  --
  -- 5M-Ware Web Solutions License
  --
  -- Requirements: wepi_core.js, wepi_serv.js
  --
  -- ------------------------------------------------------------------------------------------------ --
  -- ------------------------------------------------------------------------------------------------ -->

<?php $_SESSION['tinyMCEGeneratedCode'] = ""; ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN">
<html>
  <head>
<script type = "text/javascript" src = "api/wepi_core.js"></script>
<script type = "text/javascript" src = "api/wepi_serv.js"></script>
<script type = "text/javascript"> var svr = new wepiServ(); svr.sessionID = "<?php echo session_id(); ?>"; </script>
<style type = "text/css">
	.slide_tab_header {
		border: 1px solid rgb( 150, 150, 150 );
		background-color: rgb( 245, 245, 245 );
		cursor: pointer;
		border-radius: 6px;
		-moz-border-radius: 6px;
		-webkit-border-radius: 6px;
		-khtml-border-radius: 6px;
		margin-top: 2px;
	}
	.slide_tab_header div {
		border-top: 1px solid #FFFFFF;
		border-left: 1px solid #FFFFFF;
		border-right: 1px solid rgb(190,190,190);
		border-bottom: 1px solid rgb(190,190,190);
		padding: 5px;
		font-family: Arial, Helvetica;
		font-size: 12px;
		font-weight: bold;
		-moz-border-radius: 6px;
		-webkit-border-radius: 6px;
		-khtml-border-radius: 6px;
	}
	.slide_tab_content {
		border-left: 1px solid rgb( 150, 150, 150 );
		border-right: 1px solid rgb( 150, 150, 150 );
		border-bottom: 1px solid rgb( 150, 150, 150 );
		margin-left: 5px;
		margin-right: 5px;
		margin-bottom: 5px;
		background-color: #FFFFFF;
		display:none;
	}
	.slide_tab_content div {
		border-top: 1px solid #FFFFFF;
		border-left: 1px solid #FFFFFF;
		border-right: 1px solid rgb(190,190,190);
		border-bottom: 1px solid rgb(190,190,190);
		padding: 5px;
		font-family: Arial, Helvetica;
		font-size: 12px;
	}
	.slide_tab_content div table td {
		padding: 5px;
		font-family: Arial, Helvetica;
		font-size: 12px;
		font-weight: normal;
	}
	.slide_tab_content div table th {
		padding: 5px;
		width: 200px;
		font-family: Arial, Helvetica;
		font-size: 12px;
		font-weight: bold;
		text-align: left;
	}
	.none_aff, .none_aff td, .none_aff th {
		border: none;
		padding: 0px;
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
include ("wepi_server_side.php");
$server = new wepi_server_side();
// Datenbankanbindung
include( "wepi_dyn_public.php" );
// Thumbnail-Funktion
include( "uplresize.php" );
// Die Größe einer Bilddatei darf 1 MB nicht übersteigen
$maxSize = ( 1024 * 1024 ); // 1 MB
// Fehlermeldung
$maxErrr = "Die Datei % ist gr&ouml;&szlig;er als ein <b>1&nbsp;MB</b>";
// Button-Click, weitere Bilder hochladen
//$uplMore = "uploadmplf.php";
$uplMore = "plugin_uploadsifi.php";
// Button-Click, zurück zur vorherigen Inhalt
$uplBack = "";
// Pfad der tatsächlichen Bilder
$uplImageDir = "bilder/";
// Pfad der Thumbnail-Bilder
$uplImageTmb = "bilder2/";
// Hinweis-Information hinsichtlich Mineaturbilder
$uplReMark = "Hinweis: Mineaturansicht kann vom Originalansicht abweichen. Das ist normal.";
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
$uplRemoved = "imgs/none.png";
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

?>

<script type = "text/javascript">

	var uplCurrentColor = svr.Sess( "uplCOLOR1" );
	var uplCurrentBkgColor = svr.Sess( "uplCOLOR2" );
	var uplGeneratedStyle = svr.Sess( "uplSTYLE" );
	var uplwsz = 0;
	var uplhsz = 0;
	var uplURL = svr.Sess( "uplURL" );
	var uplDeclPopup = 0;

	function uplXYRatio(srcWidth, srcHeight, maxWidth, maxHeight) {
		var ratio = Math.min(maxWidth / srcWidth, maxHeight / srcHeight);
		return { width: srcWidth*ratio, height: srcHeight*ratio };
	}

	function uplXRatio(srcWidth, maxWidth) {
		var ratio = Math.min(maxWidth / srcWidth);
		return srcWidth*ratio;
	}

	function uplYRatio(srcHeight, maxHeight) {
		var ratio = Math.min(maxHeight / srcHeight);
		return srcHeight*ratio;
	}

	function uplSifiThatImage ( i, m, f, w, h ) {
		if ( ( document.getElementById("uplsifiImage") ) && ( document.getElementById("uplsifiLink") ) ) {
			var img = document.getElementById("uplsifiImage");
			var lnk = document.getElementById("uplsifiLink");
			// *** //
			if ( uplGeneratedStyle == "" ) {
				img.innerHTML = '<center><img border = "0" src = "' + f + '" id = "tebiSing" /></center>';
			} else {
				img.innerHTML = '<center><img border = "0" src = "' + f + '" id = "tebiSing" style = "' + uplGeneratedStyle + '" /></center>';
			}
			// *** //
			lnk.innerHTML = '<input type = "text" style = "display:none;" value = "' + f + '" /><a href = "javascript:verwerfe_datei(' + i + ',\''+ f + '\',\''+ m + '\');"><?php echo $uplButtonRemv; ?></a>';
			// *** //
			svr.Sess( "uplSOURCEFile", m );
			// *** //
			var wio = document.getElementById("uplImgW");
			var hio = document.getElementById("uplImgH");
			// *** //
			uplwsz = w; uplhsz = h;
			// *** //
			var maxw = 200; var maxh = 200;
			// *** //
			if ( ( w <= 200 ) && ( h <= 200 ) ) {
				wio.value = w;
				hio.value = h;
			} else {
				var maxf = Math.min( maxw / w, maxh / h );
				// *** //
				wio.value = parseInt(uplwsz * maxf);
				hio.value = parseInt(uplhsz * maxf);
			}
			// *** //
			uplwsz = w; uplhsz = h;
			// *** //
			svr.Sess( "uplSOURCE", i );
			svr.Sess( "uplWIDTH", wio.value );
			svr.Sess( "uplHEIGHT", hio.value );
			svr.Sess( "uplURL", document.getElementById("uplImgU").value );
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
			}
		}
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

	function applyredesign(){
		if ( uplCurrentColor == "" ) { uplCurrentColor = "#FFFFFF"; }
		if ( uplCurrentBkgColor == "" ) { uplCurrentBkgColor = "#FFFFFF"; }
		// *** //
		var bild = tebiSing.src;
		// *** //
		var ww = 200;
		var hh = 200;
		// *** //
		var rahmen = document.getElementById('uplImgBorder').options[document.getElementById('uplImgBorder').selectedIndex].value;
		var dichte = document.getElementById('uplImgBorderSize').options[document.getElementById('uplImgBorderSize').selectedIndex].value;
		var schatn = "";//document.getElementById('uplImgShadow').options[document.getElementById('uplImgShadow').selectedIndex].value;
		// *** //
		svr.Sess( "uplBORDER", rahmen );
		svr.Sess( "uplDEPTH", dichte );
		svr.Sess( "uplSHADOW", schatn );
		// *** //
		var farbe = uplCurrentColor;
		var bkgfr = uplCurrentBkgColor;
		// *** //
		var inhlt = document.getElementById('uplsifiCont');
		// *** //
		var cur = "";
		// *** //
		if ( uplURL == "" ) { cur = ";cursor: pointer;"; }
		// *** //
		if ( schatn == 1 ) {
			if ( bkgfr == "" ) {
				schatn = "-moz-box-shadow: 4px 4px 3px #888;-webkit-box-shadow: 4px 4px 3px #888;box-shadow: 4px 4px 3px #888;";
			} else {
				schatn = "background-color: " + bkgfr + "; -moz-box-shadow: 4px 4px 3px #888;-webkit-box-shadow: 4px 4px 3px #888;box-shadow: 4px 4px 3px #888;";
			}
		} else {
			if ( bkgfr == "" ) {
				schatn = "";
			} else {
				schatn = "background-color: " + bkgfr + ";";
			}
		}
		// *** //
		if ( rahmen == 0 ) {
			if ( schatn != "" ) {
				inhlt.innerHTML = '<center><div class = "pict" id = "uplsifiImage">' +
							  '<img border = "0" src = "' + bild + '" id = "tebiSing" /></center></div>' +
							  '<div align = "right" id = "uplsifiLink"><?php echo $uplLoadAFile; ?></div>';
			} else {
				inhlt.innerHTML = '<center><div class = "pict" id = "uplsifiImage">' +
							  '<img border = "0" src = "' + bild + '" id = "tebiSing" style = "' + schatn + cur + '" /></center></div>' +
							  '<div align = "right" id = "uplsifiLink"><?php echo $uplLoadAFile; ?></div>';
				uplGeneratedStyle = schatn + cur;
			}
		} else if ( rahmen == 1 ) {
			inhlt.innerHTML = '<center><div class = "pict" id = "uplsifiImage">' +
						  '<img border = "0" src = "' + bild + '" id = "tebiSing" style = "border:' + dichte + "px solid " + farbe + '; ' + schatn + cur + '; padding: 0px;" /></center></div>' +
						  '<div align = "right" id = "uplsifiLink"><?php echo $uplLoadAFile; ?></div>';
			uplGeneratedStyle = 'border:' + dichte + "px solid " + farbe + '; ' + schatn + cur + '; padding: 0px;';
		} else if ( rahmen == 2 ) {
			inhlt.innerHTML = '<center><div class = "pict" id = "uplsifiImage">' +
						  '<img border = "0" src = "' + bild + '" id = "tebiSing" style = "border:' + dichte + "px solid " + farbe + '; ' + schatn + cur + ';  padding: 0px;-moz-border-radius: 6px;-webkit-border-radius: 6px;border-radius: 6px;" /></center></div>' +
						  '<div align = "right" id = "uplsifiLink"><?php echo $uplLoadAFile; ?></div>';
			uplGeneratedStyle = 'border:' + dichte + "px solid " + farbe + '; ' + schatn + cur + ';  padding: 0px;-moz-border-radius: 6px;-webkit-border-radius: 6px;border-radius: 6px;';
		}
		// *** //
		svr.Sess( "uplSTYLE", uplGeneratedStyle );
	}

	function takecolor( obj ) {
		uplCurrentColor = obj.style.backgroundColor;
		applyredesign();
		svr.Sess( "uplCOLOR1", uplCurrentColor );
	}

	function takecolor2( obj ) {
		uplCurrentBkgColor = obj.style.backgroundColor;
		applyredesign();
		svr.Sess( "uplCOLOR2", uplCurrentBkgColor );
	}

	function decl_popup( no ) {
		uplDeclPopup = no;
		applyredesign();
		svr.Sess( "uplDECL", no );
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
		background-color: rgb( 250, 250, 250 );
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
		background-color: rgb( 250, 250, 250 );
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

<table border = "0" cellspacing = "0" cellpadding = "0"><tr><td valign = "top">
<style type = "text/css">
	.c5m_sidebar {
		/*background-color: rgb( 230, 230, 230 );
		border-top: 1px solid rgb( 200, 200, 200 );
		border-left: 1px solid rgb( 200, 200, 200 );
		border-bottom: 1px solid rgb( 200, 200, 200 );
		border-right: 1px solid rgb( 200, 200, 200 );*/
		margin-right: 1px;
		height: 438px;
		overflow: auto;
	}
	.c5m_sidebar table {
		padding-right: 1px;
	}
	.c5m_sidebar table td {
		padding: 2px;
		font-family: Arial, Helvetica;
		font-size: 12px;
		font-weight: normal;
		text-align: left;
	}
	.c5m_sidebar table th {
		border: 1px solid rgb( 170, 170, 170 );
		background-color: rgb( 250, 250, 250 );
		border-radius: 6px;
		-moz-border-radius: 6px;
		-webkit-border-radius: 6px;
		-khtml-border-radius: 6px;
		margin-top: 2px;
	}
	.c5m_sidebar table th div {
		border-top: 1px solid #FFFFFF;
		border-left: 1px solid #FFFFFF;
		border-right: 1px solid rgb(210,210,210);
		border-bottom: 1px solid rgb(210,210,210);
		padding: 3px;
		text-align: left;
		font-family: Arial, Helvetica;
		font-size: 12px;
		font-weight: bold;
		-moz-border-radius: 6px;
		-webkit-border-radius: 6px;
		-khtml-border-radius: 6px;
	}
	.c5m_sidebar table td input, .c5m_sidebar table td textarea, .c5m_sidebar table td select {
		width: 120px;
		text-align: right;
	}
</style>
<div id = "uplHiddenRealImage" style = "display:none;"></div>
<div style = "padding-right: 1px;">
<div style = "width: 200px;" class = "c5m_sidebar">
	<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%">
		<tr>
			<th valign = "top" colspan = "2">
				<div>Gr&ouml;&szlig;e</div>
			</th>
		</tr>
		<tr>
			<td valign = "top">
				Breite:
			</td><td valign = "top">
				<input type = "text" value = "" id = "uplImgW" />
			</td>
		</tr>
		<tr>
			<td valign = "top">
				H&ouml;he:
			</td><td valign = "top">
				<input type = "text" value = "" id = "uplImgH" />
			</td>
		</tr>
		<tr>
			<th valign = "top" colspan = "2">
				<div>Seitenverh&auml;ltnis</div>
			</th>
		</tr>

		<tr>
			<td valign = "top" title = "Seitenverh&auml;ltnis beibehatlen" colspan = "2">
				<input type = "checkbox" value = "1" id = "uplImgRatio" style = "width:20px;" /> Seitenverh&auml;ltnis
			</td>
		</tr>
		<tr>
			<th valign = "top" colspan = "2">
				<div>Klicken zulassen</div>
			</th>
		</tr>
		<tr>
			<td valign = "top" title = "Wohin soll's gehen, wenn auf das Bild geklickt wird?">
				URL:
			</td><td valign = "top">
				<input type = "text" value = "" id = "uplImgU" style = "text-align:left;" onchange = "javascript:svr.Sess('uplURL',this.value);" />
			</td>
		</tr>
		<tr>
			<th valign = "top" colspan = "2">
				<div>Popup</div>
			</th>
		</tr>
		<tr>
			<td valign = "top" colspan = "2" title = "Diese Option schaltet die Popup-F&auml;higkeit des Bildes ab.">
				<input type = "radio" value = "0" name = "uplImgZ" id = "uplImgZ" style = "text-align:left;width:20px;" oncange = "javascript:decl_popup(0);" checked /> Keine
			</td>
		</tr>
		<tr>
			<td valign = "top" colspan = "2" title = "Soll das Bild beim anklicken gr&ouml;&szlig;er werden und in der Mitte angezeigt werden? Achtung: Wenn Sie diese Option aktivieren, wird der Klick-Effekt wirkungslos!">
				<input type = "radio" value = "1" name = "uplImgZ" id = "uplImgZ" style = "text-align:left;width:20px;" oncange = "javascript:decl_popup(1);" /> Vergr&ouml;&szlig;ern...
			</td>
		</tr>
		<tr>
			<td valign = "top" colspan = "2" title = "Soll das Bild beim &uuml;berfahren mit dem Mauszeiger etwas gr&ouml;&szlig;er werden?">
				<input type = "radio" value = "2" name = "uplImgZ" id = "uplImgZ" style = "text-align:left;width:20px;" oncange = "javascript:decl_popup(2);" /> Hervorheben...
			</td>
		</tr>
		<tr>
			<th valign = "top" colspan = "2">
				<div>Rahmen</div>
			</th>
		</tr>
		<tr>
			<td valign = "top">
				Typ:
			</td><td valign = "top">
				<select size = "1" id = "uplImgBorder" onchange = "javascript:applyredesign();">
					<option value = "0" selected>Keine</option>
					<option value = "1">Eckig, Farbig</option>
					<option value = "2">Rundig, Farbig</option>
				</select>
			</td>
		</tr>
		<tr>
			<td valign = "top">
				Farbe:
			</td><td valign = "top">
				<div style = "height: 100px; overflow: auto;">
				<table border = "0">
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #000000; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #000033; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #000066; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #0000CC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #0000FF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #330033; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #660000; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #660033; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #660066; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #6600CC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #990000; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #990033; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #990066; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CC0000; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CC0033; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CC00CC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FF00FF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #003300; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #003333; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #003366; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #003399; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #333399; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #663366; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #663399; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CC6633; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FF6600; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FF66FF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #009900; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #009966; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #009999; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #339900; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #339966; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #0099FF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #009900; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CC9900; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CC9933; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CC9966; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FF99FF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFCCFF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFCCCC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFCC00; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFCC33; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFCC66; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFCC99; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CCFF00; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CCFF33; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CCFF66; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CCFF99; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CCFFCC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CCFFFF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFFF00; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFFF33; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFFF66; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFFF99; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFFFCC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #99FF99; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #99FFCC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #99FFFF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CCFFCC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFFFFF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #EDECFF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #E8ECFC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #DBE0F4; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #D3D2EB; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #C6CAE4; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #BABEE0; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #AFB2DE; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #A6A3D8; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #8599D2; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #6C8BD0; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #566DC2; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #5160B4; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #465BA8; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #3B3F86; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #3A3B6A; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #505050; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #646464; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #7D7D7D; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #969696; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #AAAAAA; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #BEBEBE; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #D2D2D2; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #E1E1E1; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #EBEBEB; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #F5F5F5; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor(this)"></div></td>
					</tr>
				</table>
				</div>
			</td>
		</tr>
		<tr>
			<td valign = "top">
				Dichte:
			</td><td valign = "top">
				<select size = "1" id = "uplImgBorderSize" onchange = "javascript:applyredesign();">
					<option value = "1" selected>D&uuml;nn</option>
					<option value = "2">Etwas dicker</option>
					<option value = "3">Dick</option>
					<option value = "4">Dicker</option>
					<option value = "5">Sehr dick</option>
				</select>
			</td>
		</tr>
		<tr>
			<td valign = "top">
				Effekt:
			</td><td valign = "top">
				<select size = "1" id = "uplImgShadow" onchange = "javascript:applyredesign();">
					<option value = "0" selected>Keine</option>
					<option value = "1">Schatten</option>
				</select>
			</td>
		</tr>
		<tr>
			<th valign = "top" colspan = "2">
				<div>Hintergrund</div>
			</th>
		</tr>
		<tr>
			<td valign = "top">
				Farbe:
			</td><td valign = "top">
				<div style = "height: 100px; overflow: auto;">
				<table border = "0">
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #000000; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #000033; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #000066; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #0000CC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #0000FF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #330033; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #660000; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #660033; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #660066; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #6600CC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #990000; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #990033; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #990066; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CC0000; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CC0033; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CC00CC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FF00FF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #003300; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #003333; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #003366; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #003399; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #333399; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #663366; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #663399; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CC6633; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FF6600; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FF66FF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #009900; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #009966; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #009999; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #339900; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #339966; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #0099FF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #009900; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CC9900; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CC9933; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CC9966; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FF99FF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFCCFF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFCCCC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFCC00; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFCC33; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFCC66; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFCC99; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CCFF00; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CCFF33; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CCFF66; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CCFF99; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CCFFCC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CCFFFF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFFF00; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFFF33; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFFF66; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFFF99; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFFFCC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #99FF99; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #99FFCC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #99FFFF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #CCFFCC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #FFFFFF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #EDECFF; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #E8ECFC; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #DBE0F4; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #D3D2EB; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #C6CAE4; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #BABEE0; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #AFB2DE; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #A6A3D8; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #8599D2; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #6C8BD0; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #566DC2; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #5160B4; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #465BA8; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #3B3F86; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #3A3B6A; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #505050; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #646464; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #7D7D7D; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #969696; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #AAAAAA; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
					<tr>
						<td valign = "top"><div style = "cursor: pointer; background-color: #BEBEBE; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #D2D2D2; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #E1E1E1; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #EBEBEB; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
						<td valign = "top"><div style = "cursor: pointer; background-color: #F5F5F5; border: 1px solid rgb(200,200,200); padding:1px; width:10px;height:10px;" onclick = "javascript:takecolor2(this)"></div></td>
					</tr>
				</table>
				</div>
			</td>
		</tr>
	</table>
</div>
</div>
</td><td valign = "top">

<?php 

if ( $_POST['uploaded'] ) {

?>

	<div style = "height:440px;">
	<?php
	if ( ( $server->browser == "ie" ) || ( $server->browser == "universal" ) || ( $server->browser == "" ) ) {
		echo '<center><div class = "c5m_broEr">'.$uplOthBro.'</div></center>';
	}
	?>
	<table border = "0" cellspacing = "0" cellpadding = "0" align = "center" style = "height:440px;"><tr>
		<td valign = "top">
				<form enctype="multipart/form-data" action="plugin_uploadsifi.php" method="POST">
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
									if ( file_exists( $datei ) ) {
										$sz = GetImageSize( $datei );
										$szW = $sz[0];
										$szH = $sz[1];
									} else {
										$szW = 0; $szH = 0;
									}
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
															<img border = "0" src = "'.$mintr.'" onclick = "javascript:uplSifiThatImage('.$idnr.',\''.$datei.'\',\''.$mintr.'\','.$szW.','.$szH.');" title = "'.$uplReMark.'" />
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
															<img border = "0" src = "'.$mintr.'" onclick = "javascript:uplSifiThatImage('.$idnr.',\''.$datei.'\',\''.$mintr.'\','.$szW.','.$szH.');" title = "'.$uplReMark.'" />
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
															<img border = "0" src = "'.$mintr.'" onclick = "javascript:uplSifiThatImage('.$idnr.',\''.$datei.'\',\''.$mintr.'\','.$szW.','.$szH.');" title = "'.$uplReMark.'" />
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
			<form enctype="multipart/form-data" action="plugin_uploadsifi.php" method="POST">
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
									if ( file_exists( $datei ) ) {
										$sz = GetImageSize( $datei );
										$szW = $sz[0];
										$szH = $sz[1];
									} else {
										$szW = 0; $szH = 0;
									}
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
															<img style = "width:90px;" border = "0" src = "'.$mintr.'" onclick = "javascript:uplSifiThatImage('.$idnr.',\''.$datei.'\',\''.$mintr.'\','.$szW.','.$szH.');" title = "'.$uplReMark.'" />
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
															<img style = "width:90px;" border = "0" src = "'.$mintr.'" onclick = "javascript:uplSifiThatImage('.$idnr.',\''.$datei.'\',\''.$mintr.'\','.$szW.','.$szH.');" title = "'.$uplReMark.'" />
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
															<img style = "width:90px;" border = "0" src = "'.$mintr.'" onclick = "javascript:uplSifiThatImage('.$idnr.',\''.$datei.'\',\''.$mintr.'\','.$szW.','.$szH.');" title = "'.$uplReMark.'" />
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
</td></tr></table>

<script type = "text/javascript">

      wepiAddEventDOM( "uplImgW", "keydown",
          function(e){
			var uplImgRatio = document.getElementById("uplImgRatio");
			// *** //
			var wio = document.getElementById("uplImgW");
			var hio = document.getElementById("uplImgH");
			// *** //
			svr.Sess( "uplWIDTH", wio.value );
			svr.Sess( "uplHEIGHT", hio.value );
			// *** //
			//if ( uplImgRatio.checked == true ) {
				//var ow = document.getElementById("uplImgW");
				//var oh = document.getElementById("uplImgH");
				// *** //
				/*var w = ow.value; var h = oh.value;
				// *** //
				if ( w < 16 ) { w = 16; }
				if ( h < 16 ) { h = 16; }
				// *** //
				var maxw = w; var maxh = w;
				// *** //
				do {
					h--;
				} while ( h >= w );
				// *** //
				var maxf = Math.min( maxw / w, maxh / h );
				// *** //
				//wio.value = parseInt(w * maxf);
				oh.value = parseInt(h * maxf);*/
			//}
          }
      );

      wepiAddEventDOM( "uplImgH", "keydown",
          function(e){
			var uplImgRatio = document.getElementById("uplImgRatio");
			// *** //
			var wio = document.getElementById("uplImgW");
			var hio = document.getElementById("uplImgH");
			// *** //
			svr.Sess( "uplWIDTH", wio.value );
			svr.Sess( "uplHEIGHT", hio.value );
			// *** //
			//if ( uplImgRatio.checked == true ) {
			//}
          }
      );

      wepiAddEventDOM( "uplImgU", "keydown",
          function(e){
			uplURL = document.getElementById("uplImgU").value;
			// *** //
			svr.Sess( "uplURL", uplURL );
          }
      );

	// *** //
	if ( parseInt(svr.Sess( "uplBORDER" )) > 0 ) {
		document.getElementById('uplImgBorder').options[parseInt(svr.Sess( "uplBORDER" ))].selected;
	}
	// *** //
	if ( parseInt(svr.Sess( "uplDEPTH" )) > 0 ) {
		document.getElementById('uplImgBorderSize').options[parseInt(svr.Sess( "uplDEPTH" ))].selected;
	}
	// *** //
	if ( parseInt(svr.Sess( "uplSHADOW" )) > 0 ) {
		document.getElementById('uplImgShadow').options[parseInt(svr.Sess( "uplSHADOW" ))].selected;
	}
	// *** //
	document.getElementById("uplImgU").value = svr.Sess( "uplURL" );

</script>

</body></html>
