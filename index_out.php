<?php

	if ( $in_page == "home" ){$in_page = "hpag";}
	if ( $page == "home" ) { $page = "hpag"; }

	if ( $in_page == "" ){$in_page = "hpag";}
	if ( $page == "" ) { $page = "hpag"; }

	if ( $_SESSION['plang'] != "" ) {
	  $lang = $_SESSION['plang'];
	} else {
		if ( $lang == "" ) { $page = "en"; }
	}

	function load_list_of( $lng, $tpc ) {

		$query=mysql_query(
		"SELECT * FROM aj_content WHERE contype = '$tpc' ORDER BY id");

		if(!$query) die("Fehler bei der Abfrage: ".mysql_error()); $zes = 0;

		while ( $datensatz = mysql_fetch_array($query) ) {

			$text = $datensatz['title_'.$lng];

			echo  
			'<div class = "item">'.
			'<a href = "index.php?page=conn&mode='.
			$datensatz['id'].'&lang='.$lng.'">'.
			$text.'</a>'.
			'</div>';

		}

	}

	function load_evt_list($lng) {

		$colt = 0;

		$query=mysql_query(
		"SELECT * FROM aj_content WHERE contype = '12' ORDER BY id");

		if(!$query) die("Fehler bei der Abfrage: ".mysql_error()); $zes = 0;

		while ( $datensatz = mysql_fetch_array($query) ) {

			$text = $datensatz['title_'.$lng];

			echo  
			'<a href = "index.php?page=conn&mode='.
			$datensatz['id'].'&lang='.$lng.'">'.
			'<div class = "item">'.
			$text.
			'</div></a>';

			$colt++;

		}

		if ( $colt == 0 ) {
			echo gls($lng,"<i>Keine News oder Events verf&uuml;gbar</i>", "<i>No news or events available</i>");
		}

	}

	function load_ref_list($lng) {

		$colt = 0;

		$query=mysql_query(
		"SELECT * FROM aj_content WHERE contype = '11' ORDER BY id");

		if(!$query) die("Fehler bei der Abfrage: ".mysql_error()); $zes = 0;

		while ( $datensatz = mysql_fetch_array($query) ) {

			$text = $datensatz['title_'.$lng];

			echo  
			'<a href = "index.php?page=conn&mode='.
			$datensatz['id'].'&lang='.$lng.'">'.
			'<div class = "item">'.
			$text.
			'</div></a>';

			$colt++;

		}

		if ( $colt == 0 ) {
			echo gls($lng,"<i>Keine Referenzen verf&uuml;gbar</i>", "<i>No references available</i>");
		}

	}

	function load_com_list($lng) {

		$colt = 0;

		$query=mysql_query(
		"SELECT * FROM aj_content WHERE contype = '13' ORDER BY id");

		if(!$query) die("Fehler bei der Abfrage: ".mysql_error()); $zes = 0;

		while ( $datensatz = mysql_fetch_array($query) ) {

			$text = $datensatz['title_'.$lng];

			echo  
			'<a href = "index.php?page=conn&mode='.
			$datensatz['id'].'&lang='.$lng.'">'.
			'<div class = "item">'.
			$text.
			'</div></a>';

			$colt++;

		}

		if ( $colt == 0 ) {
			echo gls($lng,"<i>Keine Information verf&uuml;gbar</i>", "<i>No information available</i>");
		}

	}

	function fixedger($lng) {
		if ( $lng == "de" ) {
			echo 'style = "font-weight: bold; color: rgb(166,87,180); border-bottom: 1px dashed rgb(166,87,180);"';
		} else {
			echo "";
		}		
	}

	function fixedeng($lng) {
		if ( $lng == "en" ) {
			echo 'style = "font-weight: bold; color: rgb(166,87,180); border-bottom: 1px dashed rgb(166,87,180);"';
		} else {
			echo "";
		}		
	}

	function referto($lng,$nbr) {

		echo "javascript:location.href = 'index.php?lang=$lng&page=oview&mode=$nbr'; ";

	}

	function ch_lang($from,$into) {
		$e = $_SERVER['QUERY_STRING'];
		if ( $e == "" ) {
			$e = "page=hpag&lang=$from";
		}
		if ( stristr( $e, "lang=" ) === false ) {
			$e = "$e&lang=$from";
		}
		if ( stristr( $e, "lang=" ) == false ) {
			$e = "$e&lang=$from";
		}
		$e = str_replace("lang=$from","lang=$into",$e);
		echo "index.php?$e";
	}

?>

<!DOCTYPE html>

<html>

	<head>

	<title>DEMO</title>

	<link rel="shortcut icon" href="imgs/logo_favicon_ico.ico">
	<link rel="icon" type="image/png" href="imgs/logo_favicon.png" sizes="32x32">
	<link rel="icon" type="image/png" href="imgs/logo_favicon.png" sizes="96x96">
	<link rel="apple-touch-icon" sizes="180x180" href="imgs/logo_favicon.png">

 	 <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
     <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="content-type" content="text/html; charset=utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
     <meta name = "keywords" content = "<?php
              $query=mysql_query("SELECT * FROM aj_text WHERE kennung = 'meta' AND subkenn = 'de' LIMIT 1");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) { echo str_replace("%@1","'",$datensatz['inhalt']); }
?>" />
	<link href="https://fonts.googleapis.com/css?family=ABeeZee|Abel|Alegreya+Sans|Arsenal|Dosis|Fira+Sans+Extra+Condensed|Glegoo|Josefin+Sans|Julius+Sans+One|Open+Sans|PT+Sans|Quicksand" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans|Baumans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">

    <script type = "text/javascript" src = "js/jquery.js"></script>
	<script src="js/modernizr.js"></script>
	<script src="js/respond.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/prefixfree.js"></script>

  <script type = "text/javascript" src = "api/wepi_core.js"></script>
  <script type = "text/javascript" src = "api/wepi_serv.js"></script>
  <script type = "text/javascript" src = "api/wepi_exts.js"></script>

  <script type="text/javascript" src="tinymce/tinymce.min.js"></script>

		<link href="https://fonts.googleapis.com/css?family=ABeeZee|Abel|Alegreya+Sans|Arsenal|Dosis|Fira+Sans+Extra+Condensed|Glegoo|Josefin+Sans|Julius+Sans+One|Open+Sans|PT+Sans|Quicksand" rel="stylesheet">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<style>

			/*
				font-family: 'Dosis', sans-serif;
				font-family: 'Quicksand', sans-serif;
				font-family: 'Abel', sans-serif;
				font-family: 'ABeeZee', sans-serif;
				font-family: 'Julius Sans One', sans-serif;
				font-family: 'Glegoo', serif;
				font-family: 'Arsenal', sans-serif;
				font-family: 'Fira Sans Extra Condensed', sans-serif;
				font-family: 'Open Sans', sans-serif;
				font-family: 'PT Sans', sans-serif;
				font-family: 'Josefin Sans', sans-serif;
			*/

			.underlined_cells td, .underlined_cells th {
				padding-top: 7px;
				padding-bottom: 7px;
				border-bottom: 1px solid #000000;
				vertical-align: top;
			}

			.underlined_cells_2 td, .underlined_cells_2 th {
				padding: 7px;
				border-bottom: 1px solid #000000;
				vertical-align: top;
			}

			html {
				background-color: rgb( 217, 201, 225 );
				/*overflow: hidden;*/
			}
		
			body {
				font-family: 'Alegreya Sans', sans-serif;
				font-size: 16px;
				margin: 0;
				padding: 0;
				max-width: 1120px;
				margin-left: auto;
				margin-right: auto;
				background-color: rgb( 255, 255, 255 );
				padding-top: 80px;
				overflow: auto;
			}

			#menu_desktop {

				position: fixed;
				left: 0px;
				top: 0px;
				width: 100%;
				padding: 0px;
				margin: 0px;
				z-index: 99000;
				background-color: rgb( 248, 248, 248 );
				box-shadow: 0px 4px 4px rgba(0,0,0,0.1);

			}

			#menu_mobile {

				width: 100%;
				padding: 0px;
				margin: 0px;
				z-index: 99000;
				background-color: rgb( 248, 248, 248 );
				box-shadow: 0px 4px 4px rgba(0,0,0,0.1);

			}

			#menu_desktop .bannerLogo, #menu_mobile .bannerLogo {

				background: url('imgs/theme/allin.png') no-repeat right center;

			}

			#menu_desktop .bannerLogoM, #menu_mobile .bannerLogoM {

				background: url('imgs/theme/allin.png') no-repeat right top;

			}

			#menu_desktop .menu {

				height: 75px;
				padding: 5px;
				padding-bottom: 0px;

			}

			#menu_mobile .menu {

				padding: 5px;
				padding-bottom: 0px;

			}

			#menu_desktop .menu .lang td, #menu_mobile .menu .lang td {

				padding-right: 10px;
				font-size: 12px;

			}

			#menu_desktop .menu .lang a:link,
			#menu_desktop .menu .lang a:visited,
			#menu_mobile .menu .lang a:link,
			#menu_mobile .menu .lang a:visited {

				color: rgb( 98, 62, 133 );
				text-decoration: none;

			}

			#menu_desktop .menu .lang a:hover,
			#menu_desktop .menu .lang a:active,
			#menu_mobile .menu .lang a:hover,
			#menu_mobile .menu .lang a:active {

				text-decoration: underline;

			}

			#menu_desktop .menu .root .rootButton {

				height: 31px;
				padding-left: 10px;
				padding-right: 10px;
				vertical-align: middle;
				cursor: pointer;
				border-top-left-radius: 16px;
				border-top-right-radius: 16px;
  				font-family: 'Julius Sans One', sans-serif;

			}

			#menu_desktop .menu .root .rootButton:hover {

				background: url('imgs/theme/btn_lila.png') repeat-x center center;
				text-shadow: 0px 1px 3px rgba(255,255,255,0.7);
  				/* transition: all ease 2.5s; */

			}

			#menu_mobile .menu .root .rootButton {

				height: 31px;
				padding-left: 10px;
				padding-right: 10px;
				vertical-align: middle;
				cursor: pointer;
				border-top-left-radius: 16px;
				border-top-right-radius: 16px;
  				font-family: 'Julius Sans One', sans-serif;

			}

			#menu_mobile .menu .root .rootButton:hover {

				text-shadow: 0px 1px 3px rgba(255,255,255,0.7);

			}

			#menu_desktop .popupmenu {

				background-color: rgba(240,240,240,0.97);
				/*background-color: rgb(240,240,240);*/
				padding: 10px;
				border-bottom-left-radius:  16px;
				border-bottom-right-radius: 16px;
				box-shadow: 0px 4px 4px rgba(0,0,0,0.3);
				position: absolute;
				display: none;
				margin-left: -10px;
				margin-top: 8px;
				z-index: 90000;

			}

			#menu_desktop .popupmenu:hover, #menu_desktop .popupmenu td:hover {

				background:;

			}

			#menu_desktop .popupmenu .topic {

				font-family: 'Julius Sans One', sans-serif;
				padding-top: 5px;
				padding-bottom: 5px;
				border-bottom: 1px solid rgb(210,210,210);
				margin-bottom: 10px;
				
			}

			#menu_desktop .popupmenu .item {

				font-family: 'Julius Sans One', sans-serif;
				padding: 10px;
				padding-top: 7px;
				padding-bottom: 7px;
				font-size: 14px;
				border-radius: 6px;

			}

			#menu_desktop .popupmenu .item:hover {

				background: url('imgs/theme/btn_lila.png') repeat-x center center;
				box-shadow: inset 0px 4px 4px rgba(0,0,0,0.05);

			}

			#menu_desktop .popupmenu a:link,
			#menu_desktop .popupmenu a:visited,
			#menu_desktop .popupmenu a:hover,
			#menu_desktop .popupmenu a:active {

				font-size: 14px;
				text-decoration: none;
				color: rgb( 98, 62, 133 );

			}






			#menu_mobile .popupmenu {

				background-color: rgba(240,240,240,0.97);
				/*background-color: rgb(240,240,240);*/
				margin-left: -10px;
				margin-right: -10px;
				border: 2px solid rgb(200,200,200);
				padding: 10px;
				display: none;
				margin-left: 15px;
				margin-right: 15px;

			}

			#menu_mobile .popupmenu:hover, #menu_mobile .popupmenu td:hover {

				background:;

			}

			#menu_mobile .popupmenu .topic {

				font-family: 'Julius Sans One', sans-serif;
				padding-top: 5px;
				padding-bottom: 5px;
				border-bottom: 1px solid rgb(210,210,210);
				margin-bottom: 10px;
				
			}

			#menu_mobile .popupmenu .item {

				font-family: 'Julius Sans One', sans-serif;
				padding: 10px;
				padding-top: 7px;
				padding-bottom: 7px;
				font-size: 14px;
				border-radius: 6px;

			}

			#menu_mobile .popupmenu .item:hover {

				background: url('imgs/theme/btn_lila.png') repeat-x center center;
				box-shadow: inset 0px 4px 4px rgba(0,0,0,0.05);

			}

			#menu_mobile .popupmenu a:link,
			#menu_mobile .popupmenu a:visited,
			#menu_mobile .popupmenu a:hover,
			#menu_mobile .popupmenu a:active {

				font-size: 14px;
				text-decoration: none;
				color: rgb( 98, 62, 133 );

			}

			#menu_desktop .popupmenu .popinlist, 
			#menu_mobule .popupmenu .popinlist {

				max-height: 240px;
				overflow: auto;
				padding: 0px;
				margin: 0px;

			}

			.inp {

				border: 1px solid rgb(131, 67, 147);
				border-radius: 4px;
				padding: 4px;
				width: 140px;
				padding-right: 18px;
				box-shadow: inset 0px 4px 4px rgba(200,200,200,0.2);
				background-color: rgb(251,253,255);
				margin-right: 10px;

			}

			.finder {

				border: 1px solid rgb(131, 67, 147);
				border-radius: 4px;
				padding: 4px;
				width: 140px;
				background: url('imgs/theme/search_16x16.png') no-repeat center right;
				padding-right: 18px;
				box-shadow: inset 0px 4px 4px rgba(200,200,200,0.2);
				background-color: rgb(251,253,255);
				margin-right: 10px;

			}

			.footer {

				position: fixed;
				bottom: 0;
				max-width: 1120px;
				height: 30px;
				vertical-align: middle;
				background-color: rgba(230,230,230, 0.98);
				box-shadow: -3px 0px 5px rgba(0,0,0,0.3);

			}

			.footer td {

				padding: 5px;
				text-align: center;
				font-size: 12px;

			}

			.footer a:link,
			.footer a:visited {

				color: rgb( 98, 62, 133 );
				text-decoration: none;

			}

			.footer a:hover,
			.footer a:active {

				text-decoration: underline;

			}

			.contentarea {

				padding: 20px;

			}

			.contentarea .inside {

				font-size: 16px;
				line-height: 28px;

			}

			.sidebar {

				padding: 0px;
				padding-right: 1px;
				width: 219px;
				background-color: rgb(251,252,253);
				font-family: 'Julius Sans One', sans-serif;

			}

			.sidebar .topic {

				background: url('imgs/theme/btn_lila_3.png') repeat-x top left; 
				padding: 4px;
				font-size: 12px;
				border-bottom: 1px solid rgb(131, 67, 147);

			}

			.sidebar .topic th {
			
				text-align: left;
				font-size: 16px;
			
			}

			.sidebar .popup {

				border-bottom: 1px solid rgb(131, 67, 147);

			}

			.sidebar .popup table {

				cursor: pointer;

			}

			.sidebar .popup table:hover {
			
			}

			.sidebar .popup .arrow {

				width: 24px;
				vertical-align: bottom;

			}

			.sidebar .popup .list {

				padding: 8px;
				padding-left: 14px;
				display: none;
				font-size: 12px;

			}

			.sidebar .popup .list .item {

				padding-top: 7px;
				padding-bottom: 7px;

			}

			.sidebar .popup .list .item a:link,
			.sidebar .popup .list .item a:visited {

				color: rgb( 98, 62, 133 );
				text-decoration: none;

			}

			.sidebar .popup .list .item a:hover,
			.sidebar .popup .list .item a:active {

				text-decoration: underline;

			}

			.floater {

				list-style-type: none;

			}

			.floater .pickerItem {

				float: left;
				display: inline;
				text-align: center;
				border-radius: 16px;
				padding: 3px;
				cursor: pointer;

			}

			.floater .pickerItem:hover {

				background-color: rgb(240,240,240);
				box-shadow: inset 0px 4px 4px rgba(190,190,190,0.5);
				padding: 1px;
				border: 2px solid rgb(190,190,190);

			}

			.floater .pickerItem {

				float: left;
				display: inline;
				text-align: center;
				border-radius: 16px;
				padding: 3px;
				cursor: pointer;

			}

			.floater .pickerItem:hover {

				background-color: rgb(240,240,240);
				box-shadow: inset 0px 4px 4px rgba(190,190,190,0.5);
				padding: 1px;
				border: 2px solid rgb(190,190,190);

			}

			.floater .pickerItem img {

				height: 120px;
				opacity: 0.5;
				border-radius: 50%;
				cursor: pointer;
				border: 2px solid $FFFFFF;

			}

			.floater .pickerItem img:hover {

				height: 120px;
				opacity: 1;
				border-radius: 10px;
				transition: all ease 0.25s;

			}

			.floater .rawItemCell td, .floater .rawItemCell th {

				vertical-align: middle;
				text-align: center;
				padding: 0px;
				margin: 10px;
				padding: 10px;
				font-family: 'Julius Sans One', sans-serif;

			}

			.floater .rawItemCell div {

				vertical-align: middle;
				text-align: center;
				padding: 0px;
				margin:0px;

			}

			.floater .rawItem {

				float: left;
				vertical-align: middle;
				text-align: center;
				padding: 0px;
				margin: 10px;
				padding: 10px;
				font-family: 'Julius Sans One', sans-serif;

			}

			br {

				clear: left;	

			}

			#loginBox {

				top: 140px;
				width: 292px;
				z-index: 99999;
				position: fixed;
				border-radius: 16px;
				border: 3px solid $FFFFFF;
				background-color: rgba(250,250,250,0.95);
				box-shadow: 0px 10px 10px rgba(0,0,0,0.4);

			}

			#loginBox .inside {

				margin: 1px;
				padding: 1px;
				border-radius: 16px;
				border: 2px solid rgb(131, 67, 147);

			}

			#loginBox .topic {

				padding: 10px;
				border-top-left-radius: 16px;
				border-top-right-radius: 16px;
				background-color: rgb(131, 67, 147);
				color: #FFFFFF;

			}

			#loginBox .inner {

				padding: 10px;
				line-height: 20px;

			}

			.default_button, .defbutton {
				border: 1px solid rgb(132,135,145); font-weight: bold;
				background: url(imgs/theme/btn_lila.png) repeat-x center center;
				border-radius: 14px; -moz-border-radius: 14px; color: rgb(30,50,90);
				-khtml-border-radius: 14px; -webkit-border-radius: 14px; cursor: pointer;
				padding: 7px; padding-left: 12px; padding-right: 12px;
			}
			.default_button:hover, .defbutton:hover {
				border: 1px solid rgb(132,135,145); font-weight: bold;
				background: url(imgs/theme/btn_lila_2.png) repeat-x center center;
				padding: 7px;
				text-shadow: 0px 0px 5px #ffffff; padding: 7px;
				 text-shadow: 0px 0px 4px #fff;
				-moz-text-shadow: 0px 0px 4px #fff; -khtml-text-shadow: 0px 0px 4px #fff;
				-webkit-text-shadow: 0px 0px 4px #fff;
				padding-left: 12px; padding-right: 12px;
			}
			.default_button:active, .default_button:focus,
			.defbutton:active, .defbutton:focus {
				padding: 3px; background: url(imgs/theme/btn_lila_2.png) repeat-x center center;
				border: 1px solid rgb(145,125,125); color: rgb(40,40,50);
				text-shadow: 0px 0px 5px #ffffff; padding: 7px;
				 text-shadow: 0px 0px 4px #fff;
				-moz-text-shadow: 0px 0px 4px #fff; -khtml-text-shadow: 0px 0px 4px #fff;
				-webkit-text-shadow: 0px 0px 4px #fff;
				padding-left: 12px; padding-right: 12px;
			}

			.result_marker:link, .result_marker:visited, .result_marker:hover, .result_marker:active {
				text-decoration: none;
				color: rgb(78,8,95);
			}
			
			.result_marker div {
				padding: 5px;
				cursor: pointer;
				border-radius: 6px;
			}
			
			.result_marker div:hover {
				background: url(imgs/theme/btn_lila.png) repeat-x center center;
				padding: 4px;
				border: 1px solid rgb(138,68,155);
			}

			#previewup {

				background-color: rgba(100,100,100,0.85);
				position: fixed;
				top: 0px;
				left: 0px;
				width: 100%;
				height: 100%;
				z-index: 999998;

			}

			#previewup table {
				padding: 20px;
			}

			#previewup div img {
				box-shadow: 4px 4px 4px rgba(250,250,250,0.15);
				border: 1px solid rgb(180,180,185);
				padding: 1px;
				background-color: #FFFFFF;
				border-radius: 6px;
				cursor: pointer;
			}

			#previewup .img_sub_menu {
				position: fixed;
				top: 80px;
				left: 20px;
				z-index: 999999;
				background-color: rgba(250,250,250,0.7);
				width: 200px;
				padding: 5px;
				border: 1px solid rgb(180,180,185);
				border-radius: 6px;
			}

			#previewup .img_sub_menu .img_sub_inner {
				height: 300px;
				overflow: auto;
			}

			#previewup .img_sub_menu .img_sub_inner .sub_item {
				padding: 5px;
				cursor: pointer;
				border-radius: 6px;
			}

			#previewup .img_sub_menu .img_sub_inner .sub_item:hover {
				padding: 4px;
				border: 1px solid rgb(180,190,200);
				background-color: rgba(230,230,230,0.66);
			}

		</style>

		<script type = "text/javascript">

			  var isMobileDevice = 0;

			  function dispGroup() {
			  	var i;
			  	for ( i = 1; i < arguments.length; i++ ) {
			  		if ( $("#" + arguments[i]).length > 0 ) {
			  			$("#" + arguments[i]).slideUp("fast");
			  			$("#" + arguments[i]).css("border-top", "none");
			  			$("#_" + arguments[i]).css("background-color", "");
			  		}
			  	}
			  	// *** //
			  	if ( $("#" + arguments[0]).length > 0 ) {
		 			$("#" + arguments[0]).css("border-top", "1px solid rgb(220,220,220)");
			  		$("#" + arguments[0]).slideToggle("fast","swing");
		  			$("#_" + arguments[0]).css("background-color", "rgb(228,231,238)");
			  		// *** //
			  		$("#content_desktop .sidebar").height( $("#content_desktop").height() );
			  	}
			  }

			  function dispPopup() {
			  	var i;
			  	for ( i = 1; i < arguments.length; i++ ) {
			  		if ( $("#" + arguments[i]).length > 0 ) {
			  			$("#" + arguments[i]).slideUp("fast");
			  			$("#" + arguments[i]).css("border-top", "none");
			  			//$("#_" + arguments[i]).css("background-color", "");
			  		}
			  	}
			  	// *** //
			  	if ( $("#" + arguments[0]).length > 0 ) {
		 			$("#" + arguments[0]).css("border-top", "1px solid rgb(220,220,220)");
			  		$("#" + arguments[0]).slideToggle("fast");
		  			//$("#_" + arguments[0]).css("background-color", "rgb(228,231,238)");
			  	}
			  }

			  function dispClearPopups() {
			  	 dispPopup('dmNone','dm0','dm1','dm2','dm3','mm0','mm1','mm2','mm3');
			  	 $('#thatis').slideUp('fast');
			  }

			  function dispPopupM() {
			  	var i;
			  	for ( i = 1; i < arguments.length; i++ ) {
			  		if ( $("#" + arguments[i]).length > 0 ) {
			  			$("#" + arguments[i]).slideUp("fast");
			  			$("#" + arguments[i]).css("border-top", "none");
			  			//$("#_" + arguments[i]).css("background-color", "");
			  		}
			  	}
			  	// *** //
			  	if ( $("#" + arguments[0]).length > 0 ) {
		 			$("#" + arguments[0]).css("border-top", "1px solid rgb(220,220,220)");
			  		$("#" + arguments[0]).slideToggle("fast");
		  			//$("#_" + arguments[0]).css("background-color", "rgb(228,231,238)");
			  	}
			  }

			  var sizeMobileFooterMode = 0;
			  function sizeMobileFooter () {
			  	var f = $("#footer_mobile");
			  	// *** //
			  	if ( isMobileDevice == 0 ) {
				  	if ( sizeMobileFooterMode == 0 ) {
				  		sizeMobileFooterMode = 1;
				  		f.animate({
				  			height: '+=120px'
				  		},500);
				  		f.css("overflow","auto");
				  	} else if ( sizeMobileFooterMode == 1 ) {
				  		sizeMobileFooterMode = 0;
				  		f.animate({
				  			height: '-=120px'
				  		},500);
				  		f.css("overflow","hidden");
				  	}
			  	} else {
				  	if ( sizeMobileFooterMode == 0 ) {
				  		sizeMobileFooterMode = 1;
				  		f.animate({
				  			height: '+=250px'
				  		},500);
				  		f.css("overflow","auto");
				  	} else if ( sizeMobileFooterMode == 1 ) {
				  		sizeMobileFooterMode = 0;
				  		f.animate({
				  			height: '-=250px'
				  		},500);
				  		f.css("overflow","hidden");
				  	}	
			  	}
			  }

			  function toggleView () {
			  	if ( $("#view_sidebar").css("display") == "none" ) {
			  		$("#view_sidebar").fadeIn("slow");
			  		$("#view_normal").css("display","none");
			  		$("html, body").animate({ scrollTop: 0 }, "fast");
			  	} else {
			  		$("#view_sidebar").css("display","none");
			  		$("#view_normal").fadeIn("slow");
			  	}
			  	//$("#view_normal").slideToggle('fast');
			  	//$("#view_sidebar").slideToggle('fast');
			  }

			  function loggingIn () {
				$("#loginBox").fadeToggle("slow");
			  }

			  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			 	isMobileDevice = 1;
			  }

			  var enlargePic = new Array();
			  var enlargeTot = 0;
			  var enlargeIdx = 0;

			  function i_back() {
				enlargeIdx--;
				if ( enlargeIdx < 0 ) {
					enlargeIdx = enlargeTot;
				}
				$("#canvas_picture").html('<center><img id = "thatpic" border = "0" style = "display:none;max-width:90%;max-height:70%;" src = "' + enlargePic[enlargeIdx] + '" /></center>');
				$("#thatpic").fadeIn("slow");
			  }

			  function i_next() {
				enlargeIdx++;
				if ( enlargeIdx > enlargeTot - 1 ) {
					enlargeIdx = 0;
				}
				$("#canvas_picture").html('<center><img id = "thatpic" border = "0" style = "display:none;max-width:90%;max-height:70%;" src = "' + enlargePic[enlargeIdx] + '" /></center>');
				$("#thatpic").fadeIn("slow");
			  }

			  function i_goto(idx) {
				enlargeIdx = idx;
				$("#canvas_picture").html('<center><img id = "thatpic" border = "0" style = "display:none;max-width:90%;max-height:70%;" src = "' + enlargePic[enlargeIdx] + '" /></center>');
				$("#thatpic").fadeIn("slow");
			  }

			  function i_init() {
				enlargeIdx = 0;
				$("#canvas_picture").html('<center><img id = "thatpic" border = "0" style = "max-width:90%;max-height:70%;" src = "' + enlargePic[enlargeIdx] + '" /></center>');
				var i; var t = "";
				for ( i = 0; i < enlargeTot; i++ ) {
					t += '<div class = "sub_item" onclick = "javascript:i_goto(' + i + ');">' +
									 '<?php echo gls($lang,"Bild", "Picture"); ?> ' + (i+1) + '</div>';
				}
				$("#img_list").html(t);
				$("#img_list").slideDown("fast");
			  }

		</script>

	</head>

	<body>

		<div id = "previewup" style = "display:none;">
			<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%">
				<tr>
					<td valign = "top" width = "100%">
						<img border = "0" src = "imgs/aleft.png" onclick = "javascript:i_back();" style = "cursor:pointer;"
						onmouseover = "javascript:if(isMobileDevice==0){$('.img_sub_menu').fadeIn('slow');}" />
						<img border = "0" src = "imgs/aright.png" onclick = "javascript:i_next();" style = "cursor:pointer;"
						onmouseover = "javascript:if(isMobileDevice==0){$('.img_sub_menu').fadeIn('slow');}" />
					</td>
					<td valign = "top" style = "text-align: right;">
						<img border = "0" src = "imgs/theme/closeis.png" title = "<?php echo gls($lang,'Schlie&szlig;en','Close'); ?>" 
							 onclick = "javascript:$('#previewup').fadeOut('slow');" style = "cursor:pointer;height:16px;" />
					</td>
				</tr>
				<tr>
					<td valign = "top" width = "100%" colspan = "2">
						<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%">
							<tr>
								<td width = "15%" onmouseover = "javascript:if(isMobileDevice==0){$('.img_sub_menu').fadeIn('slow');}">&nbsp;</td>
								<td width = "70%" valign = "top">
									<div id = "canvas_picture" onclick = "javascript:$('#previewup').fadeOut('slow');"
									     onmouseover = "javascript:$('.img_sub_menu').fadeOut('slow');" 
									></div>
								</td>
								<td width = "15%">&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<div class = "img_sub_menu">
				<div class = "img_sub_inner" id = "img_list">
					<script type = "text/javascript">
						if(isMobileDevice==1){
							$('.img_sub_menu').css('display','none');
						}
					</script>
				</div>
			</div>
		</div>

		<div style = "display:none;" id = "loginBox"><div class = "inside">
			<div class = "topic">
				<table border = "0" cellspacing = "0" cellpadding = "0" style = "padding:0;margin:0;" width = "100%">
				<tr><td width = "100%">
					Login
				</td><td>
					<img border = "0" src = "imgs/theme/closeis.png" title = "<?php echo gls($lang,'Schlie&szlig;en','Close'); ?>" 
						 onclick = "javascript:loggingIn();" style = "cursor:pointer;height:16px;" />
				</td></tr></table>
			</div>
			<div class = "inner">
				<form action="login.php" method="post">
					<table border = "0">
						<tr>
							<td><?php echo gls($lang,'Benutzer','User'); ?>:</td>
						</tr>
						<tr>
							<td><input type = "text" id = "user" name = "user" class = "inp" /></td>
						</tr>
						<tr>
							<td><?php echo gls($lang,'Kennwort','Password'); ?>:</td>
						</tr>
						<tr>
							<td><input type = "password" id = "pass" name = "pass" class = "inp" /></td>
						</tr>
					</table>
					<div align = "right">
						<input type = "submit" value = "Login" class = "defbutton" />
					</div>
				</form>
			</div>
		</div></div>

		<div id = "menu_desktop" style = "display:none;">

			<div class = "bannerL">
			<div class = "bannerR">
			<div class = "bannerLogo">
			<div class = "menu">
				<table border = "0" cellpadding = "0" cellspacing = "0" width = "100%" height = "100%">
					<tr>
						<td valign = "top" style = "height: 34px;" onmouseover = "javascript:dispClearPopups();">
							<table border = "0" class = "lang">
								<tr>
									<td valign = "top" style = "border-right: 1px solid rgb(120,120,120);">
										<a <?php fixedger($lang); ?> href = "<?php echo ch_lang('en','de'); ?>">DE</a>
									</td>
									<td valign = "top" style = "padding-left:9px;">
										<a <?php fixedeng($lang); ?> href = "<?php echo ch_lang('de','en'); ?>">EN</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td valign = "top" style = "height: 31px;">
							<table border = "0" class = "bar" align = "center">
								<tr>
									<th onmouseover = "javascript:dispClearPopups();">
										<input type = "text" id = "finder1" class = "finder" />
										<script type = "text/javascript">
											$('#finder1').keyup(function(e){
											    if(e.keyCode == 13)
											    {
											        var f = $(this).val();
											        location.href = 'index.php?page=find&lang=<?php echo $lang; ?>&seek=' + f;
											    }
											});
										</script>
									</th>
									<td valign = "top">
										<table border = "0" class = "root">
											<tr>
												<td class = "rootButton">
													<div id = "_dm0" 
													 onmouseover = "javascript:dispPopup('dm0','dm1','dm2','dm3');">
													 	<?php echo gls($lang,'Produkte & Services','Products & Services'); ?>
													</div>
													<div class = "popupmenu" id = "dm0">
														<table border = "0" cellspacing = "0" cellapdding = "0">
															<tr>
																<td valign = "top">
																	<div class = "topic">
																		Traffic Management
																	</div>
																	<a href = "<?php echo referto($lang,'2'); ?>"><div class = "item">
																		<?php echo gls($lang,'Urbanes Verkehrsmanagement',
																		'Urban Traffic Management'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'3'); ?>"><div class = "item">
																		<?php echo gls($lang,'Interurbanes Verkehrsmanagement',
																		'Interurban Traffic Management'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'4'); ?>"><div class = "item">
																		<?php echo gls($lang,'Parken','Parking Solutions'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'5'); ?>"><div class = "item">
																		<?php echo gls($lang,'&Ouml;ffentlicher Nahverkehr',
																		'Public Transport'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'14'); ?>"><div class = "item">
																		<?php echo gls($lang,
																		'Detektion und Verkehrs&uuml;berwachung',
																		'Detection'); ?>
																	</div></a>
																</td>
																<td valign = "top">
																	<div class = "topic">
																		Traffic Materials
																	</div>
																	<a href = "<?php echo referto($lang,'6'); ?>"><div class = "item">
																		<?php echo gls($lang,'Glasperlen','Glass Beads'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'7'); ?>"><div class = "item">
																		<?php echo gls($lang,
																		'Fl&uuml;ssige & Mehrkomponentige Farben',
																		'Liquid & Plural-Component Paints'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'8'); ?>"><div class = "item">
																		<?php echo gls($lang,
																		'Vorgeformte Markierungen',
																		'Preformed Markings'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'9'); ?>"><div class = "item">
																		<?php echo gls($lang,'Thermoplastik',
																		'Thermoplastic Markings'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'10'); ?>"><div class = "item">
																		<?php echo gls($lang,
																		'Beschilderung',
																		'Signage'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'15'); ?>"><div class = "item">
																		<?php echo gls($lang,
																		'Stromnetz',
																		'Power&nbsp;Grid'); ?>
																	</div></a>
																</td>
															</tr>
														</table>
													</div>
												</td>
												<td class = "rootButton">
													<div id = "_dm1" 
													 onmouseover = "javascript:dispPopup('dm1','dm0','dm2','dm3');">
													<?php echo gls($lang,'Referenzen','References'); ?>
													</div>
													<div class = "popupmenu" id = "dm1">
														<table border = "0" cellspacing = "0" cellapdding = "0">
															<tr>
																<td valign = "top">
																	<div class = "popinlist">
																		<?php load_ref_list($lang); ?>
																	</div>
																</td>
															</tr>
														</table>
													</div>
												</td>
												<td class = "rootButton">
													<div id = "_dm2" 
													 onmouseover = "javascript:dispPopup('dm2','dm0','dm1','dm3');">
													News & Events
													</div>
													<div class = "popupmenu" id = "dm2">
														<table border = "0" cellspacing = "0" cellapdding = "0">
															<tr>
																<td valign = "top">
																	<div class = "popinlist">
																		<?php load_evt_list($lang); ?>
																	</div>
																</td>
															</tr>
														</table>
													</div>
												</td>
												<td class = "rootButton">
													<div id = "_dm3" 
													 onmouseover = "javascript:dispPopup('dm3','dm0','dm2','dm1');">
													<?php echo gls($lang,'Unternehmen','Company'); ?>
													</div>
													<div class = "popupmenu" id = "dm3">
														<table border = "0" cellspacing = "0" cellapdding = "0">
															<tr>
																<td valign = "top">
																	<div class = "popinlist">
																		<?php load_com_list($lang); ?>
																	</div>
																</td>
															</tr>
														</table>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			</div>
			</div>
			</div>

		</div>

		<div id = "menu_mobile" style = "display:none;">

			<div class = "bannerLogoM">
			<div class = "menu">
				<table border = "0" cellpadding = "0" cellspacing = "0" width = "100%" height = "100%">
					<tr>
						<td valign = "top" style = "height: 34px;" 
						 onmouseover = "javascript:if(isMobileDevice==0){dispClearPopups(); $('#thatis').slideDown('fast');}" 
						 ontouchend = "javascript:if(isMobileDevice==1){dispClearPopups(); $('#thatis').slideDown('fast');}">
							<table border = "0" class = "lang">
								<tr>
									<td valign = "top" style = "border-right: 1px solid rgb(120,120,120);">
										<a <?php fixedger($lang); ?> href = "<?php echo ch_lang('en','de'); ?>">DE</a>
									</td>
									<td valign = "top" style = "padding-left:9px;">
										<a <?php fixedeng($lang); ?> href = "<?php echo ch_lang('de','en'); ?>">EN</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td valign = "top" width = "100%" style = "height: 31px; text-align:center;" 
						 onmouseover = "javascript:if(isMobileDevice==0){dispClearPopups(); $('#thatis').slideDown('fast');}" 
						 ontouchend = "javascript:if(isMobileDevice==1){dispClearPopups(); $('#thatis').slideDown('fast');}">
								<input type = "text" id = "finder2" class = "finder" style = "text-align:left;" />
								<script type = "text/javascript">
									$('#finder2').keyup(function(e){
									    if(e.keyCode == 13)
									    {
									        var f = $(this).val();
									        location.href = 'index.php?page=find&lang=<?php echo $lang; ?>&seek=' + f;
									    }
									});
								</script>
						</td>
					</tr>
					<tr>
						<td valign = "top" style = "height: 31px;" width = "100%" onmousemover = "javascript:if(isMobileDevice==0){$('#thatis').slideDown('fast');}" 
						 ontouchend = "javascript:if(isMobileDevice==1){dispClearPopups(); $('#thatis').slideDown('fast');}">
							<table border = "0" class = "bar" align = "center" width = "100%" id = "thatis" style = "display:none;">
								<tr>
									<td valign = "top" width = "100%">
										<table border = "0" class = "root" width = "100%">
											<tr>
												<td class = "rootButton">
													<div id = "_mm0" 
								onmouseup = "javascript:dispPopupM('mm0','mm1','mm2','mm3');">
														<?php echo gls($lang,'Produkte & Services','Products & Services'); ?>
													</div>
													<div class = "popupmenu" id = "mm0">
														<table border = "0" cellspacing = "0" cellapdding = "0" width = "100%">
															<tr>
																<td valign = "top">
																	<div class = "topic">
																		Traffic Management
																	</div>
																	<a href = "<?php echo referto($lang,'2'); ?>"><div class = "item">
																		<?php echo gls($lang,'Urbanes Verkehrsmanagement',
																		'Urban Traffic Management'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'3'); ?>"><div class = "item">
																		<?php echo gls($lang,'Interurbanes Verkehrsmanagement',
																		'Interurban Traffic Management'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'4'); ?>"><div class = "item">
																		<?php echo gls($lang,'Parken','Parking Solutions'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'5'); ?>"><div class = "item">
																		<?php echo gls($lang,'&Ouml;ffentlicher Nahverkehr',
																		'Public Transport'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'14'); ?>"><div class = "item">
																		<?php echo gls($lang,
																		'Detektion und Verkehrs&uuml;berwachung',
																		'Detection'); ?>
																	</div></a>
																</td>
															</tr><tr>
																<td valign = "top">
																	<div class = "topic">
																		<?php echo gls($lang,'',''); ?>
																		Traffic Materials
																	</div>
																	<a href = "<?php echo referto($lang,'6'); ?>"><div class = "item">
																		<?php echo gls($lang,'Glasperlen','Glass Beads'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'7'); ?>"><div class = "item">
																		<?php echo gls($lang,
																		'Fl&uuml;ssige & Mehrkomponentige Farben',
																		'Liquid & Plural-Component Paints'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'8'); ?>"><div class = "item">
																		<?php echo gls($lang,
																		'Vorgeformte Markierungen',
																		'Preformed Markings'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'9'); ?>"><div class = "item">
																		<?php echo gls($lang,'Thermoplastik',
																		'Thermoplastic Markings'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'10'); ?>"><div class = "item">
																		<?php echo gls($lang,
																		'Beschilderung',
																		'Signage'); ?>
																	</div></a>
																	<a href = "<?php echo referto($lang,'15'); ?>"><div class = "item">
																		<?php echo gls($lang,
																		'Stromnetz',
																		'Powert&nbsp;Grid'); ?>
																	</div></a>

																</td>
															</tr>
														</table>
													</div>
												</td>
											</tr><tr>
												<td class = "rootButton" width = "100%">
													<div id = "_mm1" 
							onmouseup = "javascript:dispPopupM('mm1','mm0','mm2','mm3');">
													<?php echo gls($lang,'',''); ?>
													Referenzen
													</div>
													<div class = "popupmenu" id = "mm1">
														<table border = "0" cellspacing = "0" cellapdding = "0" width = "100%">
															<tr>
																<td valign = "top">
																	<div class = "popinlist">
																		<?php load_ref_list($lang); ?>
																	</div>
																</td>
															</tr>
														</table>
													</div>
												</td>
											</tr><tr>
												<td class = "rootButton" width = "100%">
													<div id = "_mm2" 
							onmouseup = "javascript:dispPopupM('mm2','mm0','mm1','mm3');">
													News & Events
													</div>
													<div class = "popupmenu" id = "mm2">
														<table border = "0" cellspacing = "0" cellapdding = "0" width = "100%">
															<tr>
																<td valign = "top">
																	<div class = "popinlist">
																		<?php load_evt_list($lang); ?>
																	</div>
																</td>
															</tr>
														</table>
													</div>
												</td>
											</tr><tr>
												<td class = "rootButton" width = "100%">
													<div id = "_mm3" 
							onmouseup = "javascript:dispPopupM('mm3','mm0','mm2','mm1');">
													<?php echo gls($lang,'Unternehmen','Company'); ?>
													</div>
													<div class = "popupmenu" id = "mm3">
														<table border = "0" cellspacing = "0" cellapdding = "0" width = "100%">
															<tr>
																<td valign = "top">
																	<div class = "popinlist">
																		<?php load_com_list($lang); ?>
																	</div>
																</td>
															</tr>
														</table>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			</div>

		</div>

		<div id = "content_desktop" style = "display:none;">

			<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%" 
			  onmouseover = "javascript:dispClearPopups();"
			  ontouchstart = "javascript:dispClearPopups();">
				<tr>
					<td valign = "top" style = "background-color: rgb(251,252,253); border-right: 1px solid rgb(200,200,200);">
						<div class = "sidebar">
							 <div class = "topic">
							 	<table border = "0" width = "100%"><tr>
							 		<th width = "80%" valign = "top">
							 			TRAFFIC MANAGEMENT
							 		</th>
							 		<td>
							 			<img border = "0" style = "height:48px;" src = "imgs/theme/allin.png" />
							 		</td>
							 	</tr></table>
							 	<?php
							 		echo gls(
							 			$lang,
							 			"ITS & Komplettl&ouml;sungen f&uuml;r Verkehrsmanagement",
							 			"ITS & Turnkey Solutions for Traffic Management" );
							 	?>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_dt0" 
					onclick = "javascript:dispGroup('dt0','dt1','dt2','dt3','dt4','dt5','dt6','dt7','dt8','dt9','dt10','dt11')"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,'Urbanes Vekehrsmanagement',
							 			'Urban Traffic Management'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "dt0">
									<?php load_list_of( $lang, 2 ); ?>
							 	</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_dt1"  
					onclick = "javascript:dispGroup('dt1','dt0','dt2','dt3','dt4','dt5','dt6','dt7','dt8','dt9','dt10','dt11')"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,'Interurbanes Vekehrsmanagement',
							 			'Interurban Traffic Management'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "dt1">
									<?php load_list_of( $lang, 3 ); ?>
								</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_dt2"  
					onclick = "javascript:dispGroup('dt2','dt1','dt0','dt3','dt4','dt5','dt6','dt7','dt8','dt9','dt10','dt11')"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,'Parken','Parking Solutions'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "dt2">
									<?php load_list_of( $lang, 4 ); ?>
							 	</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_dt3"  
					onclick = "javascript:dispGroup('dt3','dt1','dt2','dt0','dt4','dt5','dt6','dt7','dt8','dt9','dt10','dt11')"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,
							 			'&Ouml;ffentlicher Nachverkehr',
							 			'Public Transport'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "dt3">
									<?php load_list_of( $lang, 5 ); ?>
							 	</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_dt11"  
					onclick = "javascript:dispGroup('dt11','dt1','dt2','dt0','dt4','dt5','dt6','dt7','dt8','dt9','dt10','dt3')"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,
							 			'Detektion & Verkehrs&uuml;berwa..',
							 			'Detection'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "dt11">
									<?php load_list_of( $lang, 14 ); ?>
							 	</div>
							 </div>

							 <div class = "topic">
							 	<table border = "0" width = "100%"><tr>
							 		<th width = "80%" valign = "top">
							 			TRAFFIC MATERIALS
							 		</th>
							 		<td>
							 			<img border = "0" style = "height:48px;" src = "imgs/theme/allin.png" />
							 		</td>
							 	</tr></table>
							 	<?php
							 		echo gls(
							 			$lang,
							 			"Die Welt der Verkehrsleiteinrichtungen",
							 			"Solutions for Marketing, Signage & Traffic Guidance" );
							 	?>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_dt4"  
					onclick = "javascript:dispGroup('dt4','dt1','dt2','dt3','dt0','dt5','dt6','dt7','dt8','dt9','dt10','dt11')"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,'Glasperlen','Glass Beads'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "dt4">
									<?php load_list_of( $lang, 6 ); ?>
							 	</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_dt5"  
					onclick = "javascript:dispGroup('dt5','dt1','dt2','dt3','dt4','dt0','dt6','dt7','dt8','dt9','dt10','dt11')"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,
							 			'Fl&uuml;ssige & Mehrkomponentige Farben',
							 			'Liquid & Plural-Component Paints'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "dt5">
									<?php load_list_of( $lang, 7 ); ?>
							 	</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_dt6"  
					onclick = "javascript:dispGroup('dt6','dt1','dt2','dt3','dt4','dt5','dt0','dt7','dt8','dt9','dt10','dt11')"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,'Vorgeformte Markierungen',
							 			'Preformed Markings'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "dt6">
									<?php load_list_of( $lang, 8 ); ?>
							 	</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_dt7"  
					onclick = "javascript:dispGroup('dt7','dt1','dt2','dt3','dt4','dt5','dt6','dt0','dt8','dt9','dt10','dt11')"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,
							 			'Thermoplastik',
							 			'Thermoplastic Markings'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "dt7">
									<?php load_list_of( $lang, 9 ); ?>
							 	</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_dt8"  
					onclick = "javascript:dispGroup('dt8','dt1','dt2','dt3','dt4','dt5','dt6','dt7','dt0','dt9','dt10','dt11')"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,'Beschilderung','Signage'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "dt8">
									<?php load_list_of( $lang, 10 ); ?>
							 	</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_dt8"  
					onclick = "javascript:dispGroup('dt12','dt8','dt1','dt2','dt3','dt4','dt5','dt6','dt7','dt0','dt9','dt10','dt11')"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,'Stromnetz','Power&nbsp;Grid'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "dt12">
									<?php load_list_of( $lang, 15 ); ?>
							 	</div>
							 </div>

						</div>
					</td>
					<td valign = "top">
						<div class = "contentarea" onmouseover = "javascript:dispClearPopups();">
							<div class = "inside">
								<?php include "content.php"; ?>
							</div>
						</div>
					</td>
				</tr>
			</table>

		</div>

		<div id = "content_mobile" style = "display:none;">
			<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%"><tr>
			<td valign = "top" style = "background-color:rgb(131, 67, 147); cursor: pointer;" onclick = "javascript:toggleView();">
			<div style = "width:30px;background-color:rgb(131, 67, 147);" id = "barbar"></div>
			</td><td valign = "top" 
			  onmouseover = "javascript:dispClearPopups();"
			  ontouchstart = "javascript:dispClearPopups();">
			<div id = "view_normal">
			    <div class = "contentarea" onmouseover = "javascript:dispClearPopups();">
			    	<div class = "inside">
						<?php include "content.php"; ?>
					</div>
				</div>
            </div>
            <div id = "view_sidebar" style = "display:none;">
						<div class = "sidebar">
							 <div class = "topic">
							 	<table border = "0" width = "100%"><tr>
							 		<th width = "80%" valign = "top">
							 			TRAFFIC MANAGEMENT
							 		</th>
							 		<td>
							 			<img border = "0" style = "height:48px;" src = "imgs/theme/allin.png" />
							 		</td>
							 	</tr></table>
							 	<?php
							 		echo gls(
							 			$lang,
							 			"ITS & Komplettl&ouml;sungen f&uuml;r Verkehrsmanagement",
							 			"ITS & Turnkey Solutions for Traffic Management" );
							 	?>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_mt0" 
onclick = "javascript:if(isMobileDevice==0){dispGroup('mt0','mt1','mt2','mt3','mt4','mt5','mt6','mt7','mt8','mt9');}"
ontouchstart = "javascript:if(isMobileDevice==1){dispGroup('mt0','mt1','mt2','mt3','mt4','mt5','mt6','mt7','mt8','mt9');}"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,
							 			'Urbanes Vekehrsmanagement',
							 			'Urban Traffic Management'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "mt0">
									<?php load_list_of( $lang, 2 ); ?>
							 	</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_mt1"  
onclick = "javascript:if(isMobileDevice==0){dispGroup('mt1','mt0','mt2','mt3','mt4','mt5','mt6','mt7','mt8','mt9');}"
ontouchstart = "javascript:if(isMobileDevice==1){dispGroup('mt1','mt0','mt2','mt3','mt4','mt5','mt6','mt7','mt8','mt9');}"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,
							 			'Interurbanes Vekehrsmanagement',
							 			'Interurban Traffic Management'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "mt1">
									<?php load_list_of( $lang, 3 ); ?>
							 	</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_mt2"  
onclick = "javascript:if(isMobileDevice==0){dispGroup('mt2','mt1','mt0','mt3','mt4','mt5','mt6','mt7','mt8','mt9');}"
ontouchstart = "javascript:if(isMobileDevice==1){dispGroup('mt2','mt1','mt0','mt3','mt4','mt5','mt6','mt7','mt8','mt9');}"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,"Parken","Parking Solutions"); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "mt2">
									<?php load_list_of( $lang, 4 ); ?>
							 	</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_mt3"  
onclick = "javascript:if(isMobileDevice==0){dispGroup('mt3','mt1','mt2','mt0','mt4','mt5','mt6','mt7','mt8','mt9');}"
ontouchstart = "javascript:if(isMobileDevice==1){dispGroup('mt3','mt1','mt2','mt0','mt4','mt5','mt6','mt7','mt8','mt9');}"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,
							 			'&Ouml;ffentlicher Nachverkehr',
							 			'Public Transport'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "mt3">
									<?php load_list_of( $lang, 5 ); ?>
							 	</div>
							 </div>

							 <div class = "topic">
							 	<table border = "0" width = "100%"><tr>
							 		<th width = "80%" valign = "top">
							 			TRAFFIC MATERIALS
							 		</th>
							 		<td>
							 			<img border = "0" style = "height:48px;" src = "imgs/theme/allin.png" />
							 		</td>
							 	</tr></table>
							 	<?php
							 		echo gls(
							 			$lang,
							 			"Die Welt der Verkehrsleiteinrichtungen",
							 			"Solutions for Marketing, Signage & Traffic Guidance" );
							 	?>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_mt4"  
onclick = "javascript:if(isMobileDevice==0){dispGroup('mt4','mt1','mt2','mt3','mt0','mt5','mt6','mt7','mt8','mt9');}"
ontouchstart = "javascript:if(isMobileDevice==1){dispGroup('mt4','mt1','mt2','mt3','mt0','mt5','mt6','mt7','mt8','mt9');}"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,'Glasperlen','Glass Beads'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "mt4">
									<?php load_list_of( $lang, 6 ); ?>
							 	</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_mt5"  
onclick = "javascript:if(isMobileDevice==0){dispGroup('mt5','mt1','mt2','mt3','mt4','mt0','mt6','mt7','mt8','mt9');}"
ontouchstart = "javascript:if(isMobileDevice==1){dispGroup('mt5','mt1','mt2','mt3','mt4','mt0','mt6','mt7','mt8','mt9');}"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,
							 			'Fl&uuml;ssige & Mehrkomponentige Farben',
							 			'Liquid & Plural-Component Paints'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "mt5">
									<?php load_list_of( $lang, 7 ); ?>
							 	</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_mt6"  
onclick = "javascript:if(isMobileDevice==0){dispGroup('mt6','mt1','mt2','mt3','mt4','mt5','mt0','mt7','mt8','mt9');}"
ontouchstart = "javascript:if(isMobileDevice==1){dispGroup('mt6','mt1','mt2','mt3','mt4','mt5','mt0','mt7','mt8','mt9');}"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,
							 			'Vorgeformte Markierungen',
							 			'Preformed Markings'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "mt6">
									<?php load_list_of( $lang, 8 ); ?>
							 	</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_mt7"  
onclick = "javascript:if(isMobileDevice==0){dispGroup('mt7','mt1','mt2','mt3','mt4','mt5','mt6','mt0','mt8','mt9');}"
ontouchstart = "javascript:if(isMobileDevice==1){dispGroup('mt7','mt1','mt2','mt3','mt4','mt5','mt6','mt0','mt8','mt9');}"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,
							 			'Thermoplastik',
							 			'Thermoplastic Markings'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "mt7">
									<?php load_list_of( $lang, 9 ); ?>
							 	</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_mt8"  
onclick = "javascript:if(isMobileDevice==0){dispGroup('mt8','mt1','mt2','mt3','mt4','mt5','mt6','mt7','mt0','mt9');}"
ontouchstart = "javascript:if(isMobileDevice==1){dispGroup('mt8','mt1','mt2','mt3','mt4','mt5','mt6','mt7','mt0','mt9');}"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,'Beschilderung','Signage'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "mt8">
									<?php load_list_of( $lang, 10 ); ?>
							 	</div>
							 </div>

							 <div class = "popup">
							 	<table border = "0" width = "100%" id = "_mt8"  
onclick = "javascript:if(isMobileDevice==0){dispGroup('mt10','mt8','mt1','mt2','mt3','mt4','mt5','mt6','mt7','mt0','mt9');}"
ontouchstart = "javascript:if(isMobileDevice==1){dispGroup('mt10','mt8','mt1','mt2','mt3','mt4','mt5','mt6','mt7','mt0','mt9');}"><tr>
							 		<td width = "100%">
							 			<?php echo gls($lang,'Stromnetz','Power&nbsp;Grid'); ?>
							 		</td><td class = "arrow" style = "width:24px;">
							 			<img border = "0" src = "imgs/theme/downed.png" />
							 		</td>
							 	</tr></table>
							 	<div class = "list" id = "mt10">
									<?php load_list_of( $lang, 15 ); ?>
							 	</div>
							 </div>

						</div>
            </div>
            </td></tr></table>
		</div>

		<div class = "footer" onmouseover = "javascript:dispClearPopups();">
			<div id = "footer_desktop">
			<table border = "0" cellspacing = "0" cellpadding = "0" align = "center">
				<tr>
					<td><a href = "index.php?page=hpag&lang=<?php echo $lang; ?>"><?php echo gls($lang,'Startseite','Home'); ?></a></td>
					<td><a href = "index.php?page=impr&lang=<?php echo $lang; ?>"><?php echo gls($lang,'Impressum','Imprint'); ?></a></td>
					<td><a href = "index.php?page=disc&lang=<?php echo $lang; ?>"><?php echo gls($lang,'Haftungsausschluss','Disclaimer'); ?></a></td>
					<td><a href = "index.php?page=dschutz&lang=<?php echo $lang; ?>" style = "font-weight:bold;color:rgb( 255, 0, 51 );"><?php echo gls($lang,'Datenschutz','Privacy'); ?></a></td>
					<td><a href = "index.php?page=agb&lang=<?php echo $lang; ?>"><?php echo gls($lang,'AGB','Terms'); ?></a></td>
					<td><a href = "index.php?page=cont&lang=<?php echo $lang; ?>"><?php echo gls($lang,'Kontakt','Contact'); ?></a></td>
					<td>
						&copy; ALL-IN GMBH
					</td>
					<td>
						<img border = "0" src = "imgs/theme/lock.png" 
						     style = "cursor:pointer;height:12px;" 
							 title = "Login" onclick = "javascript:loggingIn();" />
					</td>
				</tr>
			</table>
			</div>
			<div id = "footer_mobile" style = "height:30px;overflow:hidden;"
				onmouseup = "javascript:sizeMobileFooter();"
			>
			<table border = "0" cellspacing = "0" cellpadding = "0" align = "center">
				<tr>
					<td><a href = "index.php?page=hpag&lang=<?php echo $lang; ?>"><?php echo gls($lang,'Startseite','Home'); ?></a></td>
				</tr><tr>
					<td><a href = "index.php?page=impr&lang=<?php echo $lang; ?>"><?php echo gls($lang,'Impressum','Imprint'); ?></a></td>
				</tr><tr>
					<td><a href = "index.php?page=disc&lang=<?php echo $lang; ?>"><?php echo gls($lang,'Haftungsausschluss','Disclaimer'); ?></a></td>
				</tr><tr>
					<td><a href = "index.php?page=dschutz&lang=<?php echo $lang; ?>" style = "font-weight:bold;color:rgb( 255, 0, 51 );"><?php echo gls($lang,'Datenschutz','Privacy'); ?></a></td>
				</tr><tr>
					<td><a href = "index.php?page=agb&lang=<?php echo $lang; ?>"><?php echo gls($lang,'AGB','Terms'); ?></a></td>
				</tr><tr>
					<td><a href = "index.php?page=cont&lang=<?php echo $lang; ?>"><?php echo gls($lang,'Kontakt','Contact'); ?></a></td>
				</tr><tr>
					<td>
						&copy; ALL-IN GMBH
					</td>
				</tr>
			</table>
			</div>
		</div>

	</body>

</html>

<script>

    function ontoBodyAutoResz () {
		$("#barbar").css( "height", $(document).height() - 100 );
		$(".footer").width( $("body").width() );
		$("#content_desktop .contentarea").width( $("body").width() - 265 );
		$("#content_mobile .contentarea").width( $("body").width() - 70 );
		$("#imgban").width( $("body").width() - 260 );
		$("#content_desktop .sidebar").css( "min-height", ($(window).height() + 30) + "px" );
		$("#content_mobile .sidebar").width( $(window).width() - 30 );
		$("#loginBox").css( "left", ( $(window).width() - 320 ) / 2 );
		// *** //
		//$("#content_desktop").css("min-height", $(window).height() + "px" );
		//$("#content_mobile").css("min-height",  $(window).height() + "px" );
		// *** //
		$("#previewup").width(  $(window).width()  );
		$("#previewup").height( $(window).height() );
		// *** //
		if ( $(window).width() <= 900 ) {
			$("#menu_mobile").fadeIn("slow");
			$("#menu_desktop").css( "display", "none" );
			$("body").css( "padding-top", "0px" );
		} else {
			if ( isMobileDevice == 0 ) { 
				$("#menu_mobile").css( "display", "none" );
				$("#menu_desktop").fadeIn("slow");
				$("body").css( "padding-top", "80px" );
			} else {
				$("#menu_mobile").fadeIn("slow");
				$("#menu_desktop").css( "display", "none" );
				$("body").css( "padding-top", "0px" );
			}
		}
		// *** //
		if ( $(window).width() <= 700 ) {
			$("#content_mobile").fadeIn("slow");
			$("#content_desktop").css( "display", "none" );
		} else {
			if ( isMobileDevice == 0 ) { 
				$("#content_mobile").css( "display", "none" );
				$("#content_desktop").fadeIn("slow");
			} else {
				$("#content_mobile").fadeIn("slow");
				$("#content_desktop").css( "display", "none" );
			}
		}
		// *** //
		if ( $(window).width() <= 600 ) {
			$("#footer_mobile").css( "display", "block" );
			$("#footer_desktop").css( "display", "none" );
			$(".footer").css("height","auto");
			$(".footer").css("position","fixed");
		} else {
			if ( isMobileDevice == 0 ) { 
				$("#footer_mobile").css( "display", "none" );
				$("#footer_desktop").css( "display", "block" );
				$(".footer").css("height","30px");
				$(".footer").css("position","fixed");
				$(".footer").css("bottom","0");
			} else {
				$("#footer_mobile").css( "display", "block" );
				$("#footer_desktop").css( "display", "none" );
				$(".footer").css("height","auto");
				$(".footer").css("position","fixed");
			}
		}
    }
    // *** //
    ontoBodyAutoResz();
    // *** //
    $(window).bind("load", ontoBodyAutoResz);
    $(window).bind("resize", ontoBodyAutoResz);
    $(window).bind("orientationchange", ontoBodyAutoResz);
    // *** //
    if ( isMobileDevice == 1 ) {
    	$("body").css("font-size","100%");
    	$(".footer td").css("font-size","200%");
    	$("#menu_mobile .popupmenu").css("font-size","100%");
    	$(".sidebar .popup .list").css("font-size","200%");
    	$("#menu_mobile .popupmenu").css("font-size","100%");
    	$("#menu_mobile .popupmenu a").css("font-size","100%");
    	$("#menu_mobile .menu .lang td").css("font-size","170%");
    	$("#menu_mobile .popupmenu .item").css("font-size","100%");
    	$("#menu_mobile .popupmenu .topic").css("font-size","100%");
    	$(".popupmenu .item").css("font-size","100%");
    	$(".popupmenu .topic").css("font-size","140%");
    	$("#content_mobile .contentarea").css("font-size","100%");
    	$("#content_mobile .sidebar").css("font-size","100%");
    	$(".sidebar .popup .list").css("font-size","130%");
    	$(".sidebar .popup .list .item").css("font-size","130%");
    	$(".sidebar .popup .list .item").css("padding-top","20px");
    	$(".sidebar .popup .list .item").css("padding-bottom","20px");
    	$(".sidebar .popup .list a").css("font-size","120%");
    	$(".contentarea .inside").css("font-size","130%");
    	$("#menu_mobile .menu .root .rootButton").css("font-size","200%");
    } 
    // *** /
    function enlarge_picture () {
    	$("#previewup").fadeIn("fast");
    }
    // *** //
	$("ul[class='floater']").each(function() {
		$(this).find('li[class="pickerItem"]').each(function(){
		    var img = $(this).find('img');
		    enlargePic[enlargeTot] = img.attr("src");
		    img.attr("id","id_pic_"+enlargeTot);
		    img.bind("click",function(){enlarge_picture();});
		    enlargeTot++;
		});
	});
	// *** //
	enlargeTot = enlargeTot / 2;
	// *** //
	i_init();
</script>
