
    <?php

		include "db_ac.php";

		$wepi_conn = mysql_connect( $wepi_host, $wepi_user, $wepi_pass );
		$wepi_connect = mysql_select_db( $wepi_data, $wepi_conn );

	function geschnitten_( $text, $grenze = 27, $tooltip = true ) {
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

         function gibTage( $datum1, $datum2 ) {
            $diff = $datum1->diff($datum2);
            return $diff->days;
         }

         function gibDatum( $datum ) {
              $dtm = date_create($datum);
              return date_format($dtm,"d.m.Y");
         } 

         function kommazahl($str) {
              $str = preg_replace('[^0-9\,\.\-\+]', '', strval($str));
              $str = strtr($str, ',', '.');
              $pos = strrpos($str, '.');
              return $str;//($pos===false ? floatval($str) : floatval(str_replace('.', '', substr($str, 0, $pos)) . substr($str, $pos)));
         }

         function kommazahl2($str) {
              $str = preg_replace('[^0-9\,\.\-\+]', '', strval($str));
              $str = strtr($str, ',', '.');
              $pos = strrpos($str, '.');
              $rr = $str;//($pos===false ? floatval($str) : floatval(str_replace('.', '', substr($str, 0, $pos)) . substr($str, $pos)));
              $rr = ereg_replace( ",", "%", $rr );
              $rr = ereg_replace( ".", "!", $rr );
              $rr = ereg_replace( "%", ".", $rr );
              $rr = ereg_replace( "!", ",", $rr );
              return $rr;
         }

          function zeichensatz ( $v ) {
              return htmlentities( $v );
          }

		  function verwerfe_datei( $ident, $datei1, $datei2, $src = "aj_images" ) {
			if ( file_exists($datei1) ) { unlink( $datei1 ); }
			if ( file_exists($datei2) ) { unlink( $datei2 ); }
			$query=mysql_query("DELETE FROM $src WHERE id = '$ident");
			if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
		  }

		  function hookUpAktion( $ident, $check ) {
		  	$query=mysql_query("UPDATE worker_products SET aktion = '$check' WHERE id = '$ident'");
		  	if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
		  }

		  function hookUpToCat( $ident, $check, $prodid ) {
		  	if ( $check == 1 ) { $proIdent = $prodid; } else { $proIdent = '-1'; }
		  	$query=mysql_query("UPDATE worker_products SET catgroup = '$proIdent' WHERE id = '$ident'");
		  	if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
		  }

		  function take_that_banner_pic( $banner, $no, $pic ) {
		  	$query=mysql_query("UPDATE aj_daten SET wert = '$pic' WHERE kennung = 'ani_$banner' AND eintrag = '$no'");
		  	if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
		  }

		  function clear_that_banner_pic( $banner, $no ) {
		  	$query=mysql_query("UPDATE aj_daten SET wert = '' WHERE kennung = 'ani_$banner' AND eintrag = '$no'");
		  	if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
		  }

		  function connectToMenu( $id, $no, $lng ) {
				$query=mysql_query("UPDATE aj_content SET lkey_$lng = '$no' WHERE id = '$id'");
				if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
		  }


			function add_jq_js_size_image($text) {

				$t = $text;

				// *** //

				for( $i = 0; $i < 2500; $i++ ) {

				 if ( substr_count( $t, "dok_inhalt_$i" ) ) {

				  $t = str_replace( "dok_inhalt_$i", "index.php?page=conn&mode=$i", $t );
				  }

				 }

				 // *** //

				 $t = str_replace( ".href = '", ".href='", $t );

				 if ( substr_count( $t, "bild_vollbild" ) ) {

				  $t = str_replace( "location.href='bild_vollbild'", "enlargeImage(this.src);", $t );

				 }

				 $t .= '<script type = "text/javascript">'."\n";
				 $t .= 'if ( $(window).width() <= 800 ) {'."\n";
				 $t .= '	$("#desktopview").css("display","none");'."\n";
				 $t .= '	$("#mobileview").css("display","block");'."\n";
				 $t .= '} else {'."\n";
				 $t .= '	$("#desktopview").css("display","block");'."\n";
				 $t .= '	$("#mobileview").css("display","none");'."\n";
				 $t .= '}'."\n";
				 $t .= 'if ( $(window).width() <= 700 ) {'."\n";
				 $t .= '	$("#desktopview2").css("display","none");'."\n";
				 $t .= '	$("#mobileview2").css("display","block");'."\n";
				 $t .= '} else {'."\n";
				 $t .= '	$("#desktopview2").css("display","block");'."\n";
				 $t .= '	$("#mobileview2").css("display","none");'."\n";
				 $t .= '}'."\n";
				 $t .= '</script>';
				 // *** //

				 return $t;

				}


		  function aktuell() {
              $query=mysql_query("SELECT * FROM aj_content WHERE titel = '!aktuelles'");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) {
					echo add_jq_js_size_image(str_replace("%@1","'",$datensatz['inhalt']));
			  }
		  }

		  function projekte() {
              $query=mysql_query("SELECT * FROM aj_content WHERE titel = '!projekte'");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) {
					echo add_jq_js_size_image(str_replace("%@1","'",$datensatz['inhalt']));
			  }
		  }
		  
		  function visual() {
              $query=mysql_query("SELECT * FROM aj_content WHERE titel = '!visual'");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) {
					echo add_jq_js_size_image(str_replace("%@1","'",$datensatz['inhalt']));
			  }
		  }
		  
		  function sach() {
              $query=mysql_query("SELECT * FROM aj_content WHERE titel = '!sach'");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) {
					echo add_jq_js_size_image(str_replace("%@1","'",$datensatz['inhalt']));
			  }
		  }

		  function bio() {
              $query=mysql_query("SELECT * FROM aj_content WHERE titel = '!bio'");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) {
					echo add_jq_js_size_image(str_replace("%@1","'",$datensatz['inhalt']));
			  }
		  }

		  function lei() {
              $query=mysql_query("SELECT * FROM aj_content WHERE titel = '!leistung'");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) {
					echo add_jq_js_size_image(str_replace("%@1","'",$datensatz['inhalt']));
			  }
		  }

?>