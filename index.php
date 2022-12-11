<?php

	SESSION_START();

	include "db_ac.php";
	include "wepi_server_side.php";
	$browser = new wepi_server_side();

	function new_count($mo) {
		/*
	  global $lang;

	  $query=mysql_query("SELECT * FROM aj_content WHERE lkey_$lang = '$mo' ORDER BY id LIMIT 5");

	  if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

	  $korrekt = 0;

	  while ( $datensatz = mysql_fetch_array($query) ) {

		$korrekt++;

	  }

	  return $korrekt;*/

	}

	function gls( $lng, $de, $en ) {
		if ( $lng == "de" ) {
			return $de;
		} else {
			return $en;
		}
	}

  	function pickit ( $text ) {
  		$t = ""; $n = 0; $r = 0;
  		for ( $n = 0; $n < strlen($text); $n++ ) {
  			if ( $r == 10 ) {
  				$t .= $text[$n];
  			}
  			if ( $text[$n] == '-' ) {
  				$r = 10;
  			}
  		}
  		return trim($t);
  	}

	function zeichen_satz ( $v ) {
	  return htmlentities( $v );
	}

	function gib_Datum( $datum ) {
	  $dtm = date_create($datum);
	  return date_format($dtm,"d.m.Y");
	}

	function geschnitten( $text, $grenze = 27, $tooltip = true ) {
		$nu = 0; $zz = 0; $utf = 0; $txx = "";
		for( $r = 0; $r < strlen($text); $r++ ) {
			if ( $zz == $grenze ) {
				$txx .= "..."; $nu = 1;
				break;
			}
			if ( $text[$r] == '&' ) {
				$utf = 1;
				$txx .= $text[$r];
			} elseif ( $text[$r] == ';' ) {
				$utf = 0;
				$zz++; $txx .= $text[$r];
			} else {
				if ( $utf == 0 ) {
					$zz++;
				}
				$txx .= $text[$r];
			}
		}
		if ( $nu == 0 ) {
			return $text;
		} elseif ( $nu == 1 ) {
			if ( $tooltip == true ) {
				$te = ""; $au = 0;
				for ($n = 0; $n < strlen($text); $n++ ) {
					if ( $text[$n] == '<' ) {
						$au = 1;
					} elseif( $text[$n] == '>' ) {
						$au = 0;
					} else {
						if ( $au == 0 ) { $te .= $text[$n]; }
					}
				}
				return '<span title = "'.$te.'">'.$txx.'</span>';
			} else {
				return $txx.'...';
			}
		}
	}

	function pick_up( $src, $index, $sepchar ) {
		$idx = 0; $txt = "";
		// *** //
		for ( $pos = 0; $pos < strlen($src); $pos++ ) {
			if ( $src[$pos] == $sepchar ) {
				if ( $idx == $index ) {
					break;
				} else {
					$idx++; $txt = "";
				}
			} else {
				$txt .= $src[$pos];
			}
		}
		// *** //
		$txt = ereg_replace( "&nbsp;", " ", $txt );
		$txt = trim( $txt );
		// *** //
		return $txt;
	}

	function zeichen_konvertieren( $text ) {
		$tt = $text;
		$tt = ereg_replace( '&Uuml;', 'Ü', $tt );
		$tt = ereg_replace( '&uuml;', 'ü', $tt );
		$tt = ereg_replace( '&Ouml;', 'Ö', $tt );
		$tt = ereg_replace( '&ouml;', 'ö', $tt );
		$tt = ereg_replace( '&Auml;', 'Ä', $tt );
		$tt = ereg_replace( '&auml;', 'ä', $tt );
		$tt = ereg_replace( '&szlig;', 'ß', $tt );
		return $tt;
	}

	function als_preis ( $wert ) {
		$ret = trim(str_replace(".",",",$wert));
		// *** //
		$zi = 0; $je = 0;
		for ( $n = 0; $n < strlen($ret); $n++ ) {
			if ( $ret[$n] == ',' ) {
				$je = 1;
			} else {
				if ( $je == 1 ) {
					$zi++;
				}
			}
		}
		// *** //
		if ( $zi == 0 ) { $ret .= ",00"; $ret = str_replace( ",,",",",$ret); } else
		if ( $zi == 1 ) { $ret .= "0"; }
		// *** //
		$ret .= "&nbsp;&euro;";
		// *** //
		return $ret;
	}

	function connect_to_db( $getthis ) { echo "MYSQL Error: Content not found."; }

  $page = $_GET['page'];
  $subp = $_GET['subp'];
  $lang = $_GET['lang'];
  $mode = $_GET['mode'];
  $edit = $_GET['edit'];
  $todo = $_GET['todo'];
  $type = $_GET['type'];
  $idno = $_GET['id'];
  $play = $_GET['play'];
  $sizw = $_GET['w'];
  $sizh = $_GET['h'];
  $sest = $_GET['se'];
  $action = $_GET['action'];
  $total = $_GET['total'];
  $size = $_GET['size'];
  $color = $_GET['color'];

	if ( $lang != "" ) {
  		$_SESSION['plang'] = $lang;
	} else {
		$lang = "en";
		$_SESSION['plang'] = $lang;
	}

  if ( $page == "" ) { $page = "home"; }

  if ( $mode == "" ) { $mode = $_POST['mode']; }
  if ( $edit == "" ) { $edit = $_POST['edit']; }
  if ( $todo == "" ) { $todo = $_POST['todo']; }
  if ( $type == "" ) { $type = $_POST['type']; }
  if ( $idno == "" ) { $idno = $_POST['id']; }
  if ( $play == "" ) { $play = $_POST['play']; }
  if ( $sizw == "" ) { $sizw = $_POST['w']; }
  if ( $sizh == "" ) { $sizh = $_POST['h']; }
  if ( $sest == "" ) { $sest = $_POST['se']; }
  if ( $action == "" ) { $action = $_POST['action']; }
  if ( $total == "" ) { $total = $_POST['total']; }
  if ( $size == "" ) { $size = $_POST['size']; }
  if ( $color == "" ) { $color = $_POST['color']; }

  if ( $sest != "" ) { $_SESSION['menu.session.group'] = $sest; } else { $_SESSION['menu.session.group'] = ""; }

  if ( $_SESSION['logged'] == 1 ) { 
  	if ( $_SESSION['modus'] == 0 ) {
  		if ( $page == "home" || $page == "modf" || $page == "pdat" || $page == "cbes" || $page == "chis" || $page == "kuan" ) {
  			$in_page = "adm_$page"; 
  		} else {
  			$in_page = $page;
  		}
  	} elseif ( $_SESSION['modus'] == 1 ) {
  		$in_page = "adm_$page";
  	}
  } else { 
  	$in_page = $page; 
  }

  if ( $in_page == "adm_logout" ) { $in_page = "logout"; }

	if ( $_SESSION['logged'] == 1 )
	{
		include "index_in.php";
	}
	else
	{
		include "index_out.php";
	}

?>
