<?php 

	class wepi_product_box_reported_previewer {

		// Gesamte Breite fŸr die DarstellungsflŠche
		public $maxWidth = 1000;
		// Gesamte Breite und Hšhe fŸr ein Item
		public $boxWidth =  190;
		public $boxHeight = 144;
		// Ausrichtung des Item-Bezeichners
		// GŸltige Werte: top, bottom
		public $boxTitle = "bottom";
		// Klasse fŸr die Styling der Report-Box
		public $reportClass = "";
		// Style-Array fŸr markierte Elemente
		private $styles = array(); private $styleN = array(); private $stc = 0;
		// Wechselwirkung beim Klick oder RollOver.
		// GŸltige Werte: click, hover
		public $popupEvent = "click";
		// TemporŠre Item-Array
		private $items = array();
		// TemporŠre Item-Array-Zehler
		private $itc = 0;
		// TemporŠrer ID fŸr den ReportBox
		private $repID = "";

		// Spezielle Funktion
		private function cleared( $value ) {
			$t = "";
			for ( $p = 0; $p < strlen($value); $p++ ) {
				if ( $value[$p] == '\'' ) { break; }
				$t .= $value[$p];
			}
			$t .= "''";
			return $t;
		}
		
		// Styles
		public function style( $name, $css ) {
			$this->styleN[$this->stc] = $name;
			$this->styles[$this->stc] = array();
			$i             = &$this->styles[$this->stc];
			// *** //
			$t = ""; $n = 0; $r = ""; $sChapter = false;
			// *** //
			for ( $c = 0; $c < strlen($css); $c++ ) {
				if ( $css[$c] == ';' ) {
					$i[$n] = str_replace( ':', ' = \'', ".style." . trim($t) ) . '\';';
					$r = ""; $sChapter = false;
					for ( $u = 0; $u < strlen($i[$n]); $u++ ) {
						if ( $i[$n][$u] == '-' ) {
							$sChapter = true;
						} else {
							if ( $sChapter == false ) {
								$r .= $i[$n][$u];
							} else {
								$sChapter = false;
								$r .= strtoupper($i[$n][$u]);
							}
						}
					}
					$i[$n] = $r;
					$n++;
					$t = "";
				} else {
					$t .= $css[$c];
				}
			}
			// *** //
			$this->stc++;
		}

		// FŸgt neue Items in die Struktur hinein
		public function add( $id, $class, $link, $title, $details, $picture = "" ) {
			$this->items[$this->itc] = array();
			// *** //
			$i            = &$this->items[$this->itc];
			$i['id']      = $id;
			$i['class']   = $class;
			if ( strstr( $link, "http://" ) ) {
				$i['link']    = ('location.href = \'' . $link . '\';');
			} else {
				$i['link']    = $link;
			}
			$i['title']   = $title;
			$i['details'] = $details;
			$i['picture'] = $picture;
			// *** //
			$this->itc++;
		}

		// Generiert den Spa§
		public function get() {
			$this->repID = 'wpbrpv_' . rand(900,100) . '_xzf_' . rand(99,10);
			// *** //
			$ret .= '<script type = "text/javascript">' . "\n";
			$ret .= 'var '. $this->repID.'_last_id = "";' . "\n";
			$ret .= 'var '. $this->repID.'_this_id = "";' . "\n";
			$ret .= 'var '. $this->repID.'_this_on = 0.0;' . "\n";
			$ret .= 'var '. $this->repID.'_this_obj = 0;' . "\n\n";
			$ret .= 'window.setInterval(';
			$ret .= 'function () {' . "\n";
			$ret .= '    if ( '. $this->repID.'_this_on != 1.0 ) {' . "\n";
			$ret .= '     '.$this->repID.'_this_on += 0.01;' . "\n";
			$ret .= '     '. $this->repID.'_this_obj.style.display = "block";' . "\n";
		    $ret .= '     if ( window.XMLHttpRequest ) {' . "\n";
		    $ret .= '       '. $this->repID.'_this_obj.style.opacity = '.$this->repID.'_this_on;' . "\n";
            $ret .= '     } else {' . "\n";
            $ret .= '       '. $this->repID.'_this_obj.style.filter = "alpha(opacity = " + ('.$this->repID.'_this_on * 10) + ")";' . "\n";
            $ret .= '     }' . "\n";
   			$ret .= '    }' . "\n";
			$ret .= '},10);' . "\n\n";
			$ret .= 'function '. $this->repID.'_switchTo( id ) {' . "\n";
			$ret .= '    if ( '.$this->repID.'_this_id != "'.$this->repID . '_con_" + id ) { ' . "\n";
			$ret .= '    '.$this->repID.'_last_id = '. $this->repID.'_this_id;' . "\n";
			$ret .= '    '.$this->repID.'_this_id = "'.$this->repID . '_con_" + id;' . "\n";
			$ret .= '    var o = document.getElementById('. $this->repID.'_last_id);' . "\n";
			$ret .= '    var n = document.getElementById('. $this->repID.'_this_id);' . "\n";
			$ret .= '    '.$this->repID.'_this_on  = 0.0;' . "\n";
			$ret .= '    '. $this->repID.'_this_obj = n;' . "\n";
			$ret .= '    if ( o ) { o.style.display = "none"; }' . "\n";
			if ( $this->stc > 0 ) {
				foreach( $this->items as $i ) {
				$ret .= '        if ( document.getElementById("' . $i['id'] . '") ) {' . "\n";
				$p = -1;
				foreach( $this->styleN as $s ) {
					$p++;
					if ( $i['class'] == $s ) {
						foreach( $this->styles[$p] as $e ) {
							$ret .= '               document.getElementById("' . $i['id'] . '")' . $this->cleared($e) . ';' . "\n";
						}
					}
				}
				$ret .= '        }' . "\n";
				}
			}
			$ret .= '}}' . "\n";
			$ret .= '</script>' . "\n\n";
			// *** //
			$ret .= '<table border = "0" cellspacing = "0" cellpadding = "0" style = "width:' . $this->maxWidth . 'px;">' . "\n";
			// *** //
			$rid = 0; $row = 0; $idn = -1;
			// *** //
			foreach( $this->items as $i ) {
				$idn++;
				// *** //
				if ( $rid == 0 ) {
					if ( $row == 0 ) {
						$ret .= '<tr><td valign = "top" rowspan = "2" colspan = "2"><div class = "' . $this->reportClass . '" id = "'.$this->repID.'"></div></td>' . "\n";
					} elseif ( $row == 1 ) {
						$ret .= '<tr>' . "\n";
					} else {
						$ret .= '<tr>' . "\n";
					}
					// *** //
					$row++;
				}
				// *** //
				$ret .= '<td valign = "top"><center><div class = "' . $i['class'] .'" id = "' . $i['id'] . '" style = "width:' . $this->boxWidth . 'px; height:' . $this->boxHeight . 'px;' . "\n";
				// *** //
				if ( $i['picture'] != "" ) {
					$ret .= 'background: url('. $i['picture'] .') no-repeat top left;' . "\n";
				}
				// *** //
				$ret .= '"';
				// *** //
				if ( $this->popupEvent == "click" ) {
					$ret .= ' onclick = "javascript:' . $i['link'] . ';'.$this->repID.'_switchTo(' . $idn . ');' . "\n";
					if ( $this->stc > 0 ) {
						$p = -1;
						foreach( $this->styleN as $s ) {
							$p++;
							if ( $i['class'] == $s ) {
								foreach( $this->styles[$p] as $e ) {
									$ret .= 'document.getElementById(\'' . $i['id'] . '\')' . $e . ';' . "\n";
								}
							}
						}
					}
					$ret .= '">';
				} elseif ( $this->popupEvent == "hover" ) {
					$ret .= ' onclick = "javascript:' . $i['link'] . '" onmouseover = "javascript:'.$this->repID.'_switchTo(' . $idn . ');">' . "\n";
				}
				// *** //
				$ret .= '<div class = "innerText">' . addslashes(str_replace("\n", '', $i['title'])) . '</div>' . "\n";
				// *** //
				$ret .= '</div></center></td>' . "\n";
				// *** //
				$ret .= '<script type = "text/javascript">' . "\n";
				$ret .= 'document.getElementById(\''. $this->repID.'\').innerHTML += "<div style = \'display:none;\' id = \'' . $this->repID . '_con_' . $idn . '\'>' . addslashes(str_replace("\n", '', '<div class = "header"><div class = "' . str_replace('box_', '', $i['class']) . '">' . $i['title'] . '</div></div><div class = "inner">' . $i['details'] . '</div>')) . '</div>";' . "\n";
				$ret .= '</script>' . "\n";
				// *** //
				$rid++;
				// *** //
				if ( $row == 1 || $row == 2 ) {
					if ( $rid == 3 ) { $ret .= '</tr>' . "\n"; $rid = 0; }
				} else {
					if ( $rid == 5 ) { $ret .= '</tr>' . "\n"; $rid = 0; }
				}
			}
			// *** //
			$ret .= '</table>' . "\n";
			$ret .= '<script type = "text/javascript">' . "\n";
			$ret .= $this->repID.'_switchTo(0); ' . "\n";
			$ret .= '</script>' . "\n";
			// *** //
			return $ret;
		}

		// FŸgt es an die aufrufende Stelle
		public function write() {
			echo $this->get();
		}

	}

?>