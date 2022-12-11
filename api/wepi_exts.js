    /* ---------------------------------------------------------------------
       *
       *      Horizontally centerized the page-content
       *
       --------------------------------------------------------------------- */
		function wepi_body_centerize(sizeh) {
			$(window).resize(
				function() {
					var w = $(window).width();
					// *** //
					if ( w <= sizeh ) {
						$("body").css("margin-left", "0");
						$("body").css("margin-right", "0");
						$("body").css("width", "100%");
					} else {
						$("body").css("margin-left", "auto");
						$("body").css("margin-right", "auto");
						$("body").css("width", sizeh + "px");
					}
				}
			);
			// *** //
			$(document).ready(
				function() {
					var w = $(window).width();
					// *** //
					if ( w <= sizeh ) {
						$("body").css("margin-left", "0");
						$("body").css("margin-right", "0");
						$("body").css("width", "100%");
					} else {
						$("body").css("margin-left", "auto");
						$("body").css("margin-right", "auto");
						$("body").css("width", sizeh + "px");
					}
				}
			);
		}

	/* ---------------------------------------------------------------------
	*
	*      Replace string
	*
	--------------------------------------------------------------------- */
	function replaceStr(textstream,searchthis, replacement) {
	    return textstream.replace(new RegExp(searchthis, 'g'), replacement);
	};

	/* ---------------------------------------------------------------------
	*
	*      Default WEPI-Slider
	*      -------------------
	*
	*      wepi_slide ( TAGID, WIDTH, SWITCH-SPEED, INTERVAL, EFFECT, ARRAY );
	*
	*      EFFECT only "fade"
	*
	*      Structure of the array:
	*
	*      { ... }, ...
	*
	*      Attributes:
	*
	*      file				Image
	*      text				On-Pasted Text
	*      w				Width
	*      h				Height
	*      font				Font
	*      size				Font-Size
	*      radius			Border-Radius
	*      border			Border
	*      shadow			Box-Shadow
	*      backcolor		Background-Color
	*      color			Color
	*      padding			Padding
	*      margin			Border
	*
	*      Sample:
	*
	*			wepi_slide( "lauf", "90%", 2000, 5000, "fade",
	*						{ file: "imgs/main_slider_01.jpg", 
	*						  text: "Software für Windows, Mac, OS/2 und Co.", x: "0%", y: "30%",
	*						  w: "90%", h: "auto", padding: "5%",
	*						  font: "Arial", size: "120%", radius: "10px",
	*						  shadow: "0px 0px 6px rgba(0,0,0,0.5)",
	*						  backcolor: "rgba(200,150,200,0.4)" },
	*						{ file: "imgs/main_slider_02.jpg", 
	*						  text: "Web-Services", x: "0%", y: "50%",
	*						  w: "90%", h: "auto", padding: "5%",
	*						  font: "Arial", size: "120%", radius: "10px",
	*						  shadow: "0px 0px 6px rgba(0,0,0,0.5)",
	*						  backcolor: "rgba(150,200,200,0.4)" },
	*						{ file: "imgs/main_slider_03.jpg", 
	*						  text: "Knowledge-Base", x: "40%", y: "0%",
	*						  w: "auto", h: "90%", padding: "5%",
	*						  font: "Arial", size: "120%", radius: "10px",
	*						  shadow: "0px 0px 6px rgba(0,0,0,0.5)",
	*						  backcolor: "rgba(200,200,150,0.4)" } );
	*
	--------------------------------------------------------------------- */

	function wepi_slide_animation(rootname, switchSpeed) {
	    var $active = jQuery(rootname + ' .inner.active');
	    if ( $active.length == 0 ) $active = jQuery(rootname + ' .inner:last');
	    var $next =  $active.next('.inner').length ? $active.next('.inner') : jQuery(rootname + ' .inner:first');
	    $active.addClass('last-active').fadeOut(switchSpeed);
		$next.addClass('active').fadeIn(switchSpeed);
		$active.removeClass('active last-active');
	}
	function wepi_slide_callup() {
		var w = $(window).width();
		// *** //
		var bkg = "#" + arguments[0];
		// *** //
		var n = 0; var p; var tag = "";
		// *** //
		var speed = arguments[1];
		var intvl = arguments[2];
		var width = arguments[3];
		// *** //
		if ( width == "100%" ) { w = width; } else { w += "px"; }
		// *** //
		$(bkg).css("width", w);
		$(bkg).css("position", "relative");
		// *** //
		var lst = new Array();
		// *** //
		for ( n = 0; n < 1000; n++ ) {
			tag = bkg + "_" + n;
			// *** //
			if ( $(tag).length > 0 ) {
				lst[lst.length] = tag;
				// *** //
				if ( n == 0 ) {
					$(tag).css("display", "block");	
				} else {
					$(tag).css("display",  "none");
				}
				// *** //
				$(tag).css("position",  "absolute");
			}
		}
		// *** //
		$(bkg).css("height", $(bkg + "_0").height() + "px");
		// *** //
		setInterval( "wepi_slide_animation( \'" + bkg + "\', " + speed + " )", intvl );
		// *** //
		if ( width.search("%") ) {
			p = width.replace("%","");
			p = "($(window).width() / 100) * " + p;
		} else {
			p = width;
		}
		// *** //
		setTimeout( "$(window).resize( function() { " +
					"var w = " + p + ";" +
					"var n = 0; var u = \'" + bkg + "\'; var tag;" +
					"for( n = 0; n < 1000; n++ ) {" +
					"tag = u + \'_\' + n;" +
					"if ( $(tag).length > 0 ) { " +
					"$(tag).css(\'width\',w+\'px\');" +
					"$(u).css(\'width\',w+\'px\');" +
					"$(u).css(\'height\', $(u + \'_0\').height() + \'px\');" +
					"}}} );", 50 );
		// *** //
		setTimeout( "$(window).onload( function() { " +
					"var w = " + p + ";" +
					"var n = 0; var u = \'" + bkg + "\'; var tag;" +
					"for( n = 0; n < 1000; n++ ) {" +
					"tag = u + \'_\' + n;" +
					"if ( $(tag).length > 0 ) { " +
					"$(tag).css(\'width\',w+\'px\');" +
					"$(u).css(\'width\',w+\'px\');" +
					"$(u).css(\'height\', $(u + \'_0\').height() + \'px\');" +
					"}}} );", 50 );
		// *** //
		setTimeout( "$(document).ready( function() { " +
					"var w = " + p + ";" +
					"var n = 0; var u = \'" + bkg + "\'; var tag;" +
					"for( n = 0; n < 1000; n++ ) {" +
					"tag = u + \'_\' + n;" +
					"if ( $(tag).length > 0 ) { " +
					"$(tag).css(\'width\',w+\'px\');" +
					"$(u).css(\'width\',w+\'px\');" +
					"$(u).css(\'height\', $(u + \'_0\').height() + \'px\');" +
					"}}} );", 10 );
	}
	function wepi_slide() {
		var n = 0; var t = ""; var e = "";
		// *** //
		for ( n = 0; n < arguments.length; n++ ) {
			if ( n == 0 ) {
				t += "<div id = \'" + arguments[0] + "\' style = \'position:relative;width:" + arguments[1] + ";\'>";	
			} else if ( n >= 5 ) {
				if ( arguments[n].hasOwnProperty("file") ) {
					if ( ( arguments[n].hasOwnProperty("text") ) && 
					     ( arguments[n].hasOwnProperty("x") ) &&
					     ( arguments[n].hasOwnProperty("y") ) ) {
					t += "<div class = \'inner\' id = \'" + arguments[0] + "_" + (n - 5) + "\' border = \'0\' " +
				    	 " style = \'width:" + arguments[1] + ";\'>";
				    e = "";
				    if ( arguments[n].hasOwnProperty("w") ) { e += "width:" + arguments[n].w + ";"; }
				    if ( arguments[n].hasOwnProperty("h") ) { e += "height:" + arguments[n].h + ";"; }
				    if ( arguments[n].hasOwnProperty("backcolor") ) { e += "background-color:" + arguments[n].backcolor + ";"; }
				    if ( arguments[n].hasOwnProperty("color") ) { e += "color:" + arguments[n].color + ";"; }
				    if ( arguments[n].hasOwnProperty("border") ) { e += "border:" + arguments[n].border + ";"; }
				    if ( arguments[n].hasOwnProperty("borderTop") ) { e += "border-top:" + arguments[n].borderTop + ";"; }
				    if ( arguments[n].hasOwnProperty("borderLeft") ) { e += "border-left:" + arguments[n].borderLeft + ";"; }
				    if ( arguments[n].hasOwnProperty("borderBottom") ) { e += "border-bottom:" + arguments[n].borderBottom + ";"; }
				    if ( arguments[n].hasOwnProperty("borderRight") ) { e += "border-right:" + arguments[n].borderRight + ";"; }
				    if ( arguments[n].hasOwnProperty("padding") ) { e += "padding:" + arguments[n].padding + ";"; }
				    if ( arguments[n].hasOwnProperty("paddingTop") ) { e += "padding-top:" + arguments[n].paddingTop + ";"; }
				    if ( arguments[n].hasOwnProperty("paddingLeft") ) { e += "padding-left:" + arguments[n].paddingLeft + ";"; }
				    if ( arguments[n].hasOwnProperty("paddingRight") ) { e += "padding-right:" + arguments[n].paddingRight + ";"; }
				    if ( arguments[n].hasOwnProperty("paddingBottom") ) { e += "padding-bottom:" + arguments[n].paddingBottom + ";"; }
				    if ( arguments[n].hasOwnProperty("shadow") ) { e += "box-shadow:" + arguments[n].shadow + ";"; }
				    if ( arguments[n].hasOwnProperty("radius") ) { e += "border-radius:" + arguments[n].radius + ";"; }
				    if ( arguments[n].hasOwnProperty("font") ) { e += "font-family:" + arguments[n].font + ";"; }
				    if ( arguments[n].hasOwnProperty("size") ) { e += "font-size:" + arguments[n].size + ";"; }
				    if ( arguments[n].hasOwnProperty("align") ) { e += "text-align:" + arguments[n].align + ";"; }
				    if ( arguments[n].hasOwnProperty("valign") ) { e += "vertical-align:" + arguments[n].valign + ";"; }
				    if ( arguments[n].hasOwnProperty("background") ) { e += "background:" + arguments[n].background + ";"; }
			     	t += "<div id = \'" + arguments[0] + "_" + (n - 5) + "_splash\' " +
				     		 "style = \'position:absolute;margin-top:" + arguments[n].y + ";" +
				     		 "margin-left:" + arguments[n].x + ";" + e +
				     		 "\'>" + arguments[n].text + "</div>";
				   	t += "<img src = \'" + arguments[n].file + "\' style = \'width:100%;\'>";
					t += "</div>";
					     } else {
				    e = "";
				    if ( arguments[n].hasOwnProperty("w") ) { e += "width:" + arguments[n].w + ";"; }
				    if ( arguments[n].hasOwnProperty("h") ) { e += "height:" + arguments[n].h + ";"; }
				    if ( arguments[n].hasOwnProperty("backcolor") ) { e += "background-color:" + arguments[n].backcolor + ";"; }
				    if ( arguments[n].hasOwnProperty("color") ) { e += "color:" + arguments[n].color + ";"; }
				    if ( arguments[n].hasOwnProperty("border") ) { e += "border:" + arguments[n].border + ";"; }
				    if ( arguments[n].hasOwnProperty("borderTop") ) { e += "border-top:" + arguments[n].borderTop + ";"; }
				    if ( arguments[n].hasOwnProperty("borderLeft") ) { e += "border-left:" + arguments[n].borderLeft + ";"; }
				    if ( arguments[n].hasOwnProperty("borderBottom") ) { e += "border-bottom:" + arguments[n].borderBottom + ";"; }
				    if ( arguments[n].hasOwnProperty("borderRight") ) { e += "border-right:" + arguments[n].borderRight + ";"; }
				    if ( arguments[n].hasOwnProperty("padding") ) { e += "padding:" + arguments[n].padding + ";"; }
				    if ( arguments[n].hasOwnProperty("paddingTop") ) { e += "padding-top:" + arguments[n].paddingTop + ";"; }
				    if ( arguments[n].hasOwnProperty("paddingLeft") ) { e += "padding-left:" + arguments[n].paddingLeft + ";"; }
				    if ( arguments[n].hasOwnProperty("paddingRight") ) { e += "padding-right:" + arguments[n].paddingRight + ";"; }
				    if ( arguments[n].hasOwnProperty("paddingBottom") ) { e += "padding-bottom:" + arguments[n].paddingBottom + ";"; }
				    if ( arguments[n].hasOwnProperty("shadow") ) { e += "box-shadow:" + arguments[n].shadow + ";"; }
				    if ( arguments[n].hasOwnProperty("radius") ) { e += "border-radius:" + arguments[n].radius + ";"; }
				    if ( arguments[n].hasOwnProperty("font") ) { e += "font-family:" + arguments[n].font + ";"; }
				    if ( arguments[n].hasOwnProperty("size") ) { e += "font-size:" + arguments[n].size + ";"; }
				    if ( arguments[n].hasOwnProperty("align") ) { e += "text-align:" + arguments[n].align + ";"; }
				    if ( arguments[n].hasOwnProperty("valign") ) { e += "vertical-align:" + arguments[n].valign + ";"; }
				    if ( arguments[n].hasOwnProperty("background") ) { e += "background:" + arguments[n].background + ";"; }
					t += "<img class = \'inner\' id = \'" + arguments[0] + "_" + (n - 5) + "\' border = \'0\' " +
				    	 "src = \'" + arguments[n].file + "\' style = \'width:" + arguments[1] + ";" + e + "\'>";
					     }
				}
			}
		}
		// *** //
		t += "</div>";
		// *** //
		document.write( t );
		// *** //
		// Blendeffekt
		if ( arguments[4] == "fade" ) {
			wepi_slide_callup(arguments[0], arguments[2], arguments[3], arguments[1]);
		// Reinfahren von links nach rechts
		} else if ( arguments[4] == "rollx" ) {
			wepi_slide_callup(arguments[0], arguments[2], arguments[3], arguments[1]);
		// Reinfahren von rechts nach links
		} else if ( arguments[4] == "rollx2" ) {
			wepi_slide_callup(arguments[0], arguments[2], arguments[3], arguments[1]);
		// Reinfahren von oben nach unten
		} else if ( arguments[4] == "rolly" ) {
			wepi_slide_callup(arguments[0], arguments[2], arguments[3], arguments[1]);
		// Reinfahren von unten nach oben
		} else if ( arguments[4] == "rolly2" ) {
			wepi_slide_callup(arguments[0], arguments[2], arguments[3], arguments[1]);
		// Der sichtbare drängt zu Hälfte, der nächste kommt genauso raus und
		// und anschließend wird der zu verdrängende ausgeblendet
		} else if ( arguments[4] == "switchx" ) {
			wepi_slide_callup(arguments[0], arguments[2], arguments[3], arguments[1]);
		} else if ( arguments[4] == "switchy" ) {
			wepi_slide_callup(arguments[0], arguments[2], arguments[3], arguments[1]);
		// Das neue Bild wird auf das alte verkleinernd draufgelegt
		} else if ( arguments[4] == "maximize" ) {
			wepi_slide_callup(arguments[0], arguments[2], arguments[3], arguments[1]);
		// Das neue Bild wird über das alte druchgestretched
		} else if ( arguments[4] == "minimize" ) {
			wepi_slide_callup(arguments[0], arguments[2], arguments[3], arguments[1]);
		// Das neue Bild fällt auf das alte Bild drauf
		} else if ( arguments[4] == "fall" ) {
			wepi_slide_callup(arguments[0], arguments[2], arguments[3], arguments[1]);
		}
	}


	/* ---------------------------------------------------------------------
	*
	*      Default WEPI-Menu
	*      -------------------
	*
	*      wepi_menu ( TAGID, ARRAY );
	*
	*      Structure of the array:
	*
	*      { ... }, ...
	*
	*      Attributes:
	*
	*
	*      Sample:
	*
			.meinStil {
				font-family: 'Open Sans';
			}
			.meinStil .bar {
				background-color: rgba(100,120,145,0.88);
			}
			.meinStil .bar #lpart, .meinStil .bar #rpart {
				color: #FFFFFF;
				padding: 10px;
			}
			.meinStil .bar #cpart {
				color: #FFFFFF;
				text-align: center;
			}
			.meinStil .bar * td, .meinStil .bar * th {
				color: #FFFFFF;
			}
			.meinStil * .sub {
			    width: 20px;
			    height: 0;
			    overflow: hidden;
			}
			.meinStil * .sub:after {
			    content: "";
			    display: block;
			    width: 0;
			    height: 0;
			    border-left: 6px solid transparent;
			    border-right: 6px solid transparent;
			    border-top: 6px solid #FFFFFF;
			}
			.meinStil * .enter {
			    width: 20px;
			    height: 0;
			    overflow: hidden;
			}
			.meinStil * .enter:after {
			    content: "";
			    display: block;
			    width: 0;
			    height: 0;
			    border-top: 6px solid transparent;
			    border-bottom: 6px solid transparent;
			    border-left: 6px solid #FFFFFF;
			}
			.meinStil * .root {
				padding: 10px;
				cursor: pointer;
				-moz-transition:     all 0.25s ease;
				-webkit-transition:  all 0.25s ease;
				-ms-transition:      all 0.25s ease;
				-o-transition:       all 0.25s ease;
				transition:          all 0.25s ease;
			}
			.meinStil * .root:hover {
				background-color: rgba(130,170,220,0.7);
				-moz-transition:     all 0.25s ease;
				-webkit-transition:  all 0.25s ease;
				-ms-transition:      all 0.25s ease;
				-o-transition:       all 0.25s ease;
				transition:          all 0.25s ease;
			}
			.meinStil * .popup {
				margin-top: 10px;
				margin-left: -10px;
				border: 2px solid rgba(130,170,220,0.9);
				background-color: rgba(140,155,170,0.95);
				box-shadow: 0px 0px 7px rgba(40,40,90,0.55);
			}
			.meinStil * .popup_mobile {
				border-top: 2px solid rgba(130,170,220,0.9);
				border-bottom: 2px solid rgba(130,170,220,0.9);
				background-color: rgba(140,155,170,0.95);
				box-shadow: 0px 0px 7px rgba(40,40,90,0.55);
			}
			.meinStil * .topic {
				padding: 5px;
				text-align: left;
				background-color: rgb(200,200,200);
				color: #000000;
			}
			.meinStil * .item {
				padding: 5px;
				color: rgb(255,255,140);
				text-align: left;
				cursor: pointer;
			}
			.meinStil * .item:hover, .meinStil * .item:focus {
				background-color:rgba(130,170,220,0.9);
			}
			.meinStil .banner {}

				wepi_menu( 
					"meinMenu",
					{
						style: "meinStil",
						type: "default",
						scroll: "menu.fixed",
						icon: "imgs/mobmenu2.png",
						minwidth: 650,
						banner: {
							height: "120px",
							desktop: "Inhalt des Banner-Bereichs im Desktop-Modus",
							mobile: "Inhalt des Banner-Bereichs im Mobile-Modus"
						},
						bar: {
							lpart: { size: "25%", align: "left" },
							cpart: { size: "50%", align: "center" },
							rpart: { size: "25%", align: "right" }
						}
					},
					{
						type: "unit",
						insert: "lpart",
						text: "Links ist alles tool!"
					},
					{
						type: "unit",
						insert: "rpart",
						text: "Kühl und Kühler!!"
					},
					{
						type: "menu",
						insert: "cpart",
						text: "Startseite",
						popup: {
							columns: 1,
							entry: [
							{ text: "Intro", click: "javascript:alert(\'Intro!\');", info: "Introtext" },
							{ text: "Startseite", click: "javascript:alert(\'Startseite!\');", info: "Startseite oha moha" },
							{ text: "Alles Cool", click: "javascript:alert(\'Coooooll….!\');", info: "Alles Cool alde!!" } 
							]
						}
					},
					{
						type: "menu",
						insert: "cpart",
						text: "Downloads",
						click: "javascript:alert(\'Herunterladen von Kram!\');",
						popup: {
							columns: 2,
							entry: [
							{ topic: "Blabla" },
							{ text: "Intro", click: "a", info: "Introtext" },
							{ text: "Startseite", click: "a", info: "Startseite oha moha" },
							{ text: "Alles Cool", click: "a", info: "Alles Cool alde!!" },
							{ make: "separator" },
							{ text: "Verschiedenes", click: "a", info: "Introtext" },
							{ text: "Kühle Angelegenheit", click: "a", info: "Introtext" },
							{ make: "next" },
							{ topic: "Witzig" },
							{ text: "Deutsch", click: "a", info: "Introtext" },
							{ text: "Türkisch", click: "a", info: "Introtext" },
							{ text: "Englisch", click: "a", info: "Introtext" },
							{ text: "Japanisch", click: "a", info: "Introtext" },
							{ make: "next" },
							{ topic: "Bildisch :-)" },
							{ container: $("#nimmMich").html() }
							]
						}
					}
				);
				// Nachdem der Inhalt in den Menü-Container in der dritten Spalte
				// kopiert wurde, ist es sinnvoll den Tag vollständig aus der
				// Seite zu entfernen.
				$("#nimmMich").remove();
	*
	--------------------------------------------------------------------- */

			function wepi_menu_popup_hide(uid,non) {
				var n = 0; var p = ""; var h;
				// *** //
				for ( n = 0; n < 5000; n++ ) {
					p = "#" + uid + "_popup_unit_" + n;
					// *** //
					if ( $(p).length > 0 ) {
						if ( p != non ) {
							$(p).fadeOut("fast");
						}
					}
				}
			}
			function wepi_menu_popup_show(uid,index) {
				var h;
				// *** //
				wepi_menu_popup_hide(uid, "#" + uid + "_popup_unit_" + index);
				// *** //
				if ( $("#" + uid + "_popup_unit_" + index).css("display") == "none" ) {
					h = $("#" + uid + "_popup_unit_" + index).css("height");
					$("#" + uid + "_popup_unit_" + index).css("height","1px");
					$("#" + uid + "_popup_unit_" + index).css("opacity","0");
					$("#" + uid + "_popup_unit_" + index).css("display","block");
					$("#" + uid + "_popup_unit_" + index).slideDown("fast");
					$("#" + uid + "_popup_unit_" + index).animate({ height: h, opacity: 1, queue: false, duration: "slow" });
				}
			}
			function wepi_menu_mobile_popup_show(uid,index) {
				wepi_menu_popup_hide(uid, "#" + uid + "_popup_unit_" + index);
				// *** //
				if ( $("#" + uid + "_popup_unit_" + index).css("display") == "none" ) {
					$("#" + uid + "_popup_unit_" + index).fadeIn();
				} else if ( $("#" + uid + "_popup_unit_" + index).css("display") == "block" ) {
					$("#" + uid + "_popup_unit_" + index).fadeOut();
				}
			}
			function wepi_menu_switchto(uid,index) {
				if ( $("#" + uid + "_sub_panel_" + index).css("display") == "none" ) {
					$("#" + uid + "_sub_panel_" + index).fadeIn();
				} else if ( $("#" + uid + "_sub_panel_" + index).css("display") == "block" ) {
					$("#" + uid + "_sub_panel_" + index).fadeOut();
				}
			}
			function wepi_menu() {
				/* ************************************************************************* *
				 * Deklarationen
				 * ************************************************************************* */
				var t = "", n = 0, m = 0, g = 0, f = 0;
				var id = arguments[0]; // ID
				var co = arguments[1]; // JSON
				var cs = ""; var fs = ""; var whereTo = "";
				var bar, part, unit, item, popup, popin = 0, subin = 0;
				var lp = "", cp = "", rp = "", tp = "", pe = "", moMenu = "";
				var lu = 0, cu = 0, ru = 0, mm = 0, hih = 0, mc = 0;
				/* ************************************************************************* *
				 * Popup-Type
				 * ************************************************************************* */
				if ( co.type == "default" ) {
					pe = "position:absolute;width:auto;";
				} else if ( co.type == "stretched" ) {
					pe = "position:absolute;width:100%;left:0;";
				}
				/* ************************************************************************* *
				 * Root-Verhalten
				 * ************************************************************************* */
				if ( co.scroll == "default" ) {
					cs = "";
				} else if ( co.scroll == "menu.fixed" ) {
					cs = "position:relative;width:100%;margin-top:0;margin-left:0;";
				} else if ( co.scroll == "full.fixed" ) {
					fs = "position:relative;width:100%;margin-top:0;margin-left:0;";
				}
				/* ************************************************************************* *
				 * Einrahmen
				 * ************************************************************************* */
				var q = function( vv ) { return "\"" + vv + "\""; }
				/* ************************************************************************* *
				 * Aufbau
				 * ************************************************************************* */
				t += "<div id = " + q(id) + " class = " + q(co.style) + " style = " + q(fs) + ">";
				// # # # # # # # # # //
				if ( co.hasOwnProperty("banner") ) {
					hih = $(window).height() - parseInt(co.banner.height) - 100; // Für die mobile Menü-Höhe
					// *** //
					t += "<div id = " + q(id + "_banner") + " class = " + q("banner") + 
						 " onmouseover = " + q("javascript:wepi_menu_popup_hide(\'" + id + "\');") +
						 " style = " + q("width:100%;height:" + co.banner.height + ";") + ">";
						// # # # # # # # # # # # # //
						// DESKTOP
						// # # # # # # # # # # # # //
						t += "<div id = " + q(id + "_desktop") + " style = " + 
						 	 q("display:none;width:100%;") + ">";
							 // # # # # # # # # # # # # //
							 t += co.banner.desktop;
							 // # # # # # # # # # # # # //
						t += "</div>";
						// # # # # # # # # # # # # //
						// MOBILE
						// # # # # # # # # # # # # //
						t += "<div id = " + q(id + "_mobile") + " style = " + 
						 	 q("display:none;width:100%;") + ">";
							 // # # # # # # # # # # # # //
							 t += co.banner.mobile;
							 // # # # # # # # # # # # # //
						t += "</div>";
						// # # # # # # # # # # # # //
					t += "</div>";
				}
				// # # # # # # # # # //
				if ( co.hasOwnProperty("bar") ) {
				/* ************************************************************************* *
				 * DESKTOP
				 * ************************************************************************* */
					bar = co.bar;
					// # # # # # # # # # //
					t += "<div id = " + q(id + "_bar") + " class = " + q("bar") + " style = " + q(cs + ";width:100%;display:none;") + ">";
					t += "<table border = " + q("0") + " cellspacing = " + q("0") + " cellpadding = " + q("0");
					t += " width = " + q("100%") + "><tr>";
					// # # # # # # # # # //
					if ( bar.hasOwnProperty("lpart") ) {
						lp += "<td id = " + q("lpart") + " style = \'";
						part = bar.lpart;
						// # # # # # # # # # //
						if ( part.hasOwnProperty("size") ) { lp+= "width:" + part.size + ";"; } 
						if ( part.hasOwnProperty("align") ) { lp+= "text-align:" + part.align + ";"; } 
						if ( part.hasOwnProperty("valign") ) { lp+= "vertical-align:" + part.valign + ";"; } 
						if ( part.hasOwnProperty("padding") ) { lp+= "padding:" + part.padding + ";"; }
						// # # # # # # # # # //
						lp += "\'>";
					}
					// # # # # # # # # # //
					if ( bar.hasOwnProperty("cpart") ) {
						cp += "<td id = " + q("cpart") + " style = \'";
						part = bar.cpart;
						// # # # # # # # # # //
						if ( part.hasOwnProperty("size") ) { cp+= "width:" + part.size + ";"; } 
						if ( part.hasOwnProperty("align") ) { cp+= "text-align:" + part.align + ";"; } 
						if ( part.hasOwnProperty("valign") ) { cp+= "vertical-align:" + part.valign + ";"; } 
						if ( part.hasOwnProperty("padding") ) { cp+= "padding:" + part.padding + ";"; }
						// # # # # # # # # # //
						cp += "\'>";
					}
					// # # # # # # # # # //
					if ( bar.hasOwnProperty("rpart") ) {
						rp += "<td id = " + q("rpart") + " style = \'";
						part = bar.rpart;
						// # # # # # # # # # //
						if ( part.hasOwnProperty("size") ) { rp+= "width:" + part.size + ";"; } 
						if ( part.hasOwnProperty("align") ) { rp+= "text-align:" + part.align + ";"; } 
						if ( part.hasOwnProperty("valign") ) { rp+= "vertical-align:" + part.valign + ";"; } 
						if ( part.hasOwnProperty("padding") ) { rp+= "padding:" + part.padding + ";"; }
						// # # # # # # # # # //
						rp += "\'>";
					}
					// # # # # # # # # # //
					for ( n = 2; n < arguments.length; n++ ) {
						unit = arguments[n];
						// # # # # # # # # # //
						if ( unit.type == "unit" ) {
							whereTo = unit.insert;
							// *** //
							if ( whereTo == "lpart" ) {
								lp += "<div onmouseover = " + q("javascript:wepi_menu_popup_hide(\'" + id + "\');") + ">";
								if ( unit.hasOwnProperty("text") ) { lp+= replaceStr(unit.text,"@@",mc);mc++; }
								lp += "</div>";
							} else if ( whereTo == "cpart" ) {
								cp += "<div onmouseover = " + q("javascript:wepi_menu_popup_hide(\'" + id + "\');") + ">";
								if ( unit.hasOwnProperty("text") ) { cp+= replaceStr(unit.text,"@@",mc);mc++; }
								cp += "</div>";
							} else if ( whereTo == "rpart" ) {
								rp += "<div onmouseover = " + q("javascript:wepi_menu_popup_hide(\'" + id + "\');") + ">";
								if ( unit.hasOwnProperty("text") ) { rp+= replaceStr(unit.text,"@@",mc);mc++; }
								rp += "</div>";
							}
						} else if ( unit.type == "menu" ) {
							whereTo = unit.insert;
							// *** //
							tp = "";
							// *** //
							if ( whereTo == "lpart" ) {
								if ( lu == 0 ) {
									lu = 1;
									lp += "<table border = \'0\' cellspacing = \'0\' cellpadding = \'0\' align = \'left\'><tr>";
									lp += "<td style = \'width:20px;\' onmouseover = " + 
										 q("javascript:wepi_menu_popup_hide(\'" + id + "\');") + ">";
									lp += "&nbsp;</td>";
								}
							} else if ( whereTo == "cpart" ) {
								if ( cu == 0 ) {
									cu = 1;
									cp += "<table border = \'0\' cellspacing = \'0\' cellpadding = \'0\' " +
										  "style = \'margin-left:auto;margin-right:auto;\'><tr>";
									cp += "<td style = \'width:20px;\' onmouseover = " + 
										 q("javascript:wepi_menu_popup_hide(\'" + id + "\');") + ">";
									cp += "&nbsp;</td>";
								}
							} else if ( whereTo == "rpart" ) {
								if ( ru == 0 ) {
									ru = 1;
									rp += "<table border = \'0\' cellspacing = \'0\' cellpadding = \'0\' align = \'right\'><tr>";
									rp += "<td style = \'width:20px;\' onmouseover = " + 
										 q("javascript:wepi_menu_popup_hide(\'" + id + "\');") + ">";
									rp += "&nbsp;</td>";
								}
							}
							// *** //
							if ( unit.hasOwnProperty("click") ) {
								tp += "<td onmouseover = " + q("javascript:wepi_menu_popup_show(\'"+id+"\', "+popin+");") + " class = " + q("root") + " id = " + q(id + "_root_" + popin) + "><span onmousedown = " + q(unit.click) + ">" + unit.text + "</span>";
							} else {
								tp += "<td onmouseover = " + q("javascript:wepi_menu_popup_show(\'"+id+"\', "+popin+");") + " class = " + q("root") + " id = " + q(id + "_root_" + popin) + ">" + unit.text;
							}
							// *** //
							if ( unit.hasOwnProperty("popup") ) {
								popup = unit.popup;
								// *** //
								tp += "<div id = " + q(id + "_popup_unit_" + popin) + " class = " + q("popup") + 
								" style = " + q("cursor:default;display:none;" + pe) + ">"; popin++;
								// *** //
								tp += "<table border = \'0\' cellspacing = \'0\' cellpadding = \'0\' width = \'100%\'>";
								tp += "<tr><td valign = \'top\' style = \'padding:2px;\'>";
								// *** //
								tp += "<table border = \'0\' cellspacing = \'0\' cellpadding = \'0\' width = \'100%\'>";
								// *** //
								for ( m = 0; m < popup.entry.length; m++ ) {
									item = popup.entry[m];
									// *** //
									if ( item.hasOwnProperty("make") ) {
										if ( item.make == "separator" ) {
											tp += "<tr><td><hr /></td></tr>";
										} else if ( item.make == "next" ) {
											tp += "</table></td><td valign = \'top\' style = \'padding:2px;\'>";
											tp += "<table border = \'0\' cellspacing = \'0\' cellpadding = \'0\' width = \'100%\'>";
										}
									} else if ( item.hasOwnProperty("container") ) {
										tp += "<tr><td valign = \'top\' style = \'cursor:default;\'>" + item.container + "</td></tr>";
									} else if ( item.hasOwnProperty("topic") ) {
										if ( item.hasOwnProperty("info") ) {
											tp += "<tr><th class = \'topic\' style = \'cursor:default;text-align:left;\' title = " + q(item.info) + ">" + item.topic + "</th></tr>";
										} else {
											tp += "<tr><th class = \'topic\' style = \'cursor:default;text-align:left;\'>" + item.topic + "</th></tr>";
										}
									} else if ( unit.hasOwnProperty("text") ) {
										if ( unit.hasOwnProperty("click") ) {
											if ( item.hasOwnProperty("info") ) {
												tp += "<tr><td class = \'item\' style = \'cursor:pointer;text-align:left;\' title = " + q(item.info) + " onclick = " + q(item.click) + ">" + item.text + "</td></tr>";
											} else {
												tp += "<tr><td class = \'item\' style = \'cursor:pointer;text-align:left;\' onclick = " + q(item.click) + ">" + item.text + "</td></tr>";
											}
										} else {
											if ( item.hasOwnProperty("info") ) {
												tp += "<tr><td class = \'item\' style = \'cursor:default;text-align:left;\' title = " + q(item.info) + ">" + item.text + "</td></tr>";
											} else {
												tp += "<tr><td class = \'item\' style = \'cursor:default;text-align:left;\'>" + item.text + "</td></tr>";
											}
										}
									}
								}
								// *** //
								tp += "</table>";
								// *** //
								tp += "</td></tr></table></div>";
							}
							// *** //
							tp += "</td>";
							// *** //
							if ( whereTo == "lpart" ) {
								lp += tp;
							} else if ( whereTo == "cpart" ) {
								cp += tp;
							} else if ( whereTo == "rpart" ) {
								rp += tp;
							}
						}
					}
					// *** //
					if ( whereTo == "lpart" ) {
						if ( lu == 1 ) {
							lp += "<td style = \'width:20px;\' onmouseover = " + 
								 q("javascript:wepi_menu_popup_hide(\'" + id + "\');") + ">";
							lp += "&nbsp;</td>";
							lp += "</tr></table>";
						}
					} else if ( whereTo == "cpart" ) {
						if ( cu == 1 ) {
							cp += "<td style = \'width:20px;\' onmouseover = " + 
								 q("javascript:wepi_menu_popup_hide(\'" + id + "\');") + ">";
							cp += "&nbsp;</td>";
							cp += "</tr></table>";
						}
					} else if ( whereTo == "rpart" ) {
						if ( ru == 1 ) {
							rp += "<td style = \'width:20px;\' onmouseover = " + 
								 q("javascript:wepi_menu_popup_hide(\'" + id + "\');") + ">";
							rp += "&nbsp;</td>";
							rp += "</tr></table>";
						}
					}
					// # # # # # # # # # //
					if ( bar.hasOwnProperty("lpart") ) {
						lp += "</td>";
						t += lp;
					}
					// # # # # # # # # # //
					if ( bar.hasOwnProperty("cpart") ) {
						cp += "</td>";
						t += cp;
					}
					// # # # # # # # # # //
					if ( bar.hasOwnProperty("rpart") ) {
						rp += "</td>";
						t += rp;
					}
					// # # # # # # # # # //
					t += "</tr></table>";
					t += "</div>";
				}
				/* ************************************************************************* *
				 * MOBILE
				 * ************************************************************************* */
				// # # # # # # # # # //
				g = 0; f = 0;
				// # # # # # # # # # //
				t += "<div id = " + q(id + "_bar_mobile") + " class = " + q("bar") + " style = " 
				     + q(cs + ";width:100%;display:none;") + ">";
				// # # # # # # # # # //
				lp = ""; cp = ""; rp = ""; lu = 0; cu = 0; ru = 0;
				// # # # # # # # # # //
					t += "<table border = " + q("0") + " cellspacing = " + q("0") + " cellpadding = " + q("0");
					t += " width = " + q("100%") + "><tr>";
					// # # # # # # # # # //
					if ( bar.hasOwnProperty("lpart") ) {
						lp += "<td id = " + q("lpart") + " style = \'";
						part = bar.lpart;
						// # # # # # # # # # //
						if ( part.hasOwnProperty("size") ) { lp+= "width:" + part.size + ";"; } 
						if ( part.hasOwnProperty("align") ) { lp+= "text-align:" + part.align + ";"; } 
						if ( part.hasOwnProperty("valign") ) { lp+= "vertical-align:" + part.valign + ";"; } 
						if ( part.hasOwnProperty("padding") ) { lp+= "padding:" + part.padding + ";"; }
						// # # # # # # # # # //
						lp += "\'>";
					}
					// # # # # # # # # # //
					if ( bar.hasOwnProperty("cpart") ) {
						cp += "<td id = " + q("cpart") + " style = \'";
						part = bar.cpart;
						// # # # # # # # # # //
						if ( part.hasOwnProperty("size") ) { cp+= "width:" + part.size + ";"; } 
						if ( part.hasOwnProperty("align") ) { cp+= "text-align:" + part.align + ";"; } 
						if ( part.hasOwnProperty("valign") ) { cp+= "vertical-align:" + part.valign + ";"; } 
						if ( part.hasOwnProperty("padding") ) { cp+= "padding:" + part.padding + ";"; }
						// # # # # # # # # # //
						cp += "\'>";
					}
					// # # # # # # # # # //
					if ( bar.hasOwnProperty("rpart") ) {
						rp += "<td id = " + q("rpart") + " style = \'";
						part = bar.rpart;
						// # # # # # # # # # //
						if ( part.hasOwnProperty("size") ) { rp+= "width:" + part.size + ";"; } 
						if ( part.hasOwnProperty("align") ) { rp+= "text-align:" + part.align + ";"; } 
						if ( part.hasOwnProperty("valign") ) { rp+= "vertical-align:" + part.valign + ";"; } 
						if ( part.hasOwnProperty("padding") ) { rp+= "padding:" + part.padding + ";"; }
						// # # # # # # # # # //
						rp += "\'>";
					}
					// # # # # # # # # # //
					for ( n = 2; n < arguments.length; n++ ) {
						unit = arguments[n];
						// # # # # # # # # # //
						if ( unit.type == "unit" ) {
							whereTo = unit.insert;
							// *** //
							if ( whereTo == "lpart" ) {
								lp += "<div onmouseover = " + q("javascript:wepi_menu_popup_hide(\'" + id + "\');") + ">";
								if ( unit.hasOwnProperty("text") ) { lp+= replaceStr(unit.text,"@@",mc);mc++; }
								lp += "</div>";
							} else if ( whereTo == "cpart" ) {
								cp += "<div onmouseover = " + q("javascript:wepi_menu_popup_hide(\'" + id + "\');") + ">";
								if ( unit.hasOwnProperty("text") ) { cp+= replaceStr(unit.text,"@@",mc);mc++; }
								cp += "</div>";
							} else if ( whereTo == "rpart" ) {
								rp += "<div onmouseover = " + q("javascript:wepi_menu_popup_hide(\'" + id + "\');") + ">";
								if ( unit.hasOwnProperty("text") ) { rp+= replaceStr(unit.text,"@@",mc);mc++; }
								rp += "</div>";
							}
						} else if ( unit.type == "menu" ) {
							whereTo = unit.insert;
							// *** //
							tp = "";
							// *** //
							/*
								Im mobilen Modus gibt es nur einen Popup-Men�, welches den gesamten Men�-Baum
								enth�lt. Dieser wird unter dem Icon, jedoch im gesamten Viewport auf der X-Achse
								gestretched dargestellt. Dehalb wird sie au�erhalb der Tabelle angelegt. Dazu
								werden die Men�daten zunächst in ein tempor�res String gesammelt und erst dann
								mit dem Popup-Men� gemeinsam generiert und unterhalb der Tabelle platziert.
								// *** //
								Die Hauptmen�-Items werden mit fettem Schrift und einem Pfeil auf der rechten
								Ecke dargestellt. Beim Klick oder FingerTap wird der Eintrag einfach nach
								unten expandiert und dessen Inhalt kommt in den Vorschein.
								// *** //
								Wenn ein Hauptmenü-Item auf Klick reagieren soll, so wird im mobilen Modus
								neben dem Pfeil noch ein ... Feld angezeigt und erst beim Tappen oder Klicken
								auf diesen, der Klick-Ereignis dazu ausgeführt.
								// *** //
								Topics werden im mobilen Modus wie Untermenüs behandelt und haben ebenfalls
								einen rechten Pfeil der nach unten zeigt. Nur hier ist der Text im normalem
								Schrift dargestellt und von links aus leicht nach innen gerückt.
								// *** //
								Die eigentlichen Items haben keine besonderen Merkmale, außer falls
								verfügbar, Icons. Die sind jedoch auch leicht nach innen gerückt.
							*/
							if ( mm == 0 ) {
								mm = 1;
								tp += "<table border = \'0\' cellspacing = \'0\' cellpadding = \'0\' width = \'100%\'><tr>";
								tp += "<td width = \'50%\'>&nbsp;</td>";
								tp += "<td style = \'vertical-align:middle;\'><img border = \'0\' style = \'cursor:pointer;\' src = \'"+ co.icon +"\' "+
									  " onmousedown = " + q("javascript:wepi_menu_mobile_popup_show(\'"+id+"\', "+popin+");") + "></td>";
								tp += "<td width = \'50%\'>&nbsp;</td>";
								tp += "</tr></table>";
								// *** //
								moMenu += "<div id = " + q(id + "_popup_unit_" + popin) + " class = \'popup_mobile\' style = \'position:absolute;left:0px;width:100%;display:none;max-height:"+hih+"px;overflow:auto;\'>";
								// *** //
								popin++;
							}
							// *** //
							if ( unit.hasOwnProperty("click") ) {
								if ( f > 0 ) { moMenu += "</div>"; }
								moMenu += "<div class = \'root\'>";
								moMenu += "<table border = \'0\' cellspacing = \'0\' cellpadding = \'0\' width = \'100%\'><tr>";
								moMenu += "<td style = \'vertical-align:middle;width:100%;\' onmousedown = " + 
								          q("javascript:wepi_menu_switchto(\'"+id+"\',"+subin+");") + 
								          ">" + unit.text + "</td>";
								if ( unit.hasOwnProperty("popup") ) {
								moMenu += "<td style = \'vertical-align:middle;\' onmousedown = " + 
								          q("javascript:wepi_menu_switchto(\'"+id+"\',"+subin+");") + 
								          " class = \'sub\'>&nbsp;&nbsp;</td>";
								}
								moMenu += "<td style = \'vertical-align:middle;padding-left:50px;\' onmousedown = " + 
								          q(unit.click + ";" + "wepi_menu_popup_hide(\'" + id + "\');") + 
								          " class = \'enter\'>&nbsp;&nbsp;&nbsp;</td>";
								moMenu += "</tr></table></div>";
								moMenu += "<div style = \'display:none;\' id = " + q(id + "_sub_panel_" + subin) + ">";
								f++; subin++;
							} else {
								if ( f > 0 ) { moMenu += "</div>"; }
								moMenu += "<div class = \'root\'>";
								moMenu += "<table border = \'0\' cellspacing = \'0\' cellpadding = \'0\' width = \'100%\'><tr>";
								moMenu += "<td style = \'vertical-align:middle;width:100%;\' onmousedown = " + 
								          q("javascript:wepi_menu_switchto(\'"+id+"\',"+subin+");") + 
								          ">" + unit.text + "</td>";
								if ( unit.hasOwnProperty("popup") ) {
								moMenu += "<td style = \'vertical-align:middle;\' onmousedown = " + 
								          q("javascript:wepi_menu_switchto(\'"+id+"\',"+subin+");") + 
								          " class = \'sub\'>&nbsp;&nbsp;</td>";
								}
								moMenu += "</tr></table></div>";
								moMenu += "<div style = \'display:none;\' id = " + q(id + "_sub_panel_" + subin) + ">";
								f++; subin++;
							}
							// *** //
							if ( unit.hasOwnProperty("popup") ) {
								popup = unit.popup;
								// *** //
								g = 0;
								// *** //
								for ( m = 0; m < popup.entry.length; m++ ) {
									item = popup.entry[m];
									// *** //
									if ( item.hasOwnProperty("make") ) {
										if ( item.make == "separator" ) {
											moMenu += "<hr />";
										} else if ( item.make == "next" ) {
											// Hat im mobilen Zustand keine Wirkung!!!
										}
									} else if ( item.hasOwnProperty("container") ) {
										moMenu += "<div style = \'cursor:default;\'>" + item.container + "</div>";
									} else if ( item.hasOwnProperty("topic") ) {
										if ( g > 0 ) { moMenu += "</div>"; }
										// *** //
										if ( item.hasOwnProperty("info") ) {
											moMenu += "<div class = \'topic\' title = " + q(item.info) + ">";
											moMenu += "<table border = \'0\' cellspacing = \'0\' cellpadding = \'0\' width = \'100%\'><tr>";
											moMenu += "<td style = \'cursor:pointer;vertical-align:middle;width:100%;\' onmousedown = " + 
											          q("javascript:wepi_menu_switchto(\'"+id+"\',"+subin+");") + 
											          ">&nbsp;&nbsp;&nbsp;&nbsp;" + item.topic + "</td>";
											moMenu += "<td style = \'vertical-align:middle;\' onmousedown = " + 
											          q("javascript:wepi_menu_switchto(\'"+id+"\',"+subin+");") + 
											          " class = \'sub\'>&nbsp;&nbsp;</td>";
											moMenu += "</tr></table></div>";
										} else {
											moMenu += "<div class = \'topic\'>";
											moMenu += "<table border = \'0\' cellspacing = \'0\' cellpadding = \'0\' width = \'100%\'><tr>";
											moMenu += "<td style = \'cursor:pointer;vertical-align:middle;width:100%;\' onmousedown = " + 
											          q("javascript:wepi_menu_switchto(\'"+id+"\',"+subin+");") + 
											          ">&nbsp;&nbsp;&nbsp;&nbsp;" + item.topic + "</td>";
											moMenu += "<td style = \'vertical-align:middle;\' onmousedown = " + 
											          q("javascript:wepi_menu_switchto(\'"+id+"\',"+subin+");") + 
											          " class = \'sub\'>&nbsp;&nbsp;</td>";
											moMenu += "</tr></table></div>";
										}
										// *** //
										moMenu += "<div style = \'display:none;\' id = " + q(id + "_sub_panel_" + subin) + ">";
										// *** //
										g++; subin++;
									} else if ( unit.hasOwnProperty("text") ) {
										if ( item.hasOwnProperty("click") ) {
											if ( item.hasOwnProperty("info") ) {
												moMenu += "<div class = \'item\' style = \'cursor:pointer;text-align:left;\' title = " + q(item.info) + 
												" onmousedown = " + q(item.click + ";" + "wepi_menu_popup_hide(\'" + id + "\');") +
												">&nbsp;&nbsp;&nbsp;&nbsp;" + item.text + "</div>";
											} else {
												moMenu += "<div class = \'item\' style = \'cursor:pointer;text-align:left;\' onmousedown = " + 
												q(item.click + ";" + "wepi_menu_popup_hide(\'" + id + "\');") + 
												">&nbsp;&nbsp;&nbsp;&nbsp;" + item.text + "</div>";
											}
										} else {
											if ( item.hasOwnProperty("info") ) {
												moMenu += "<div class = \'item\' style = \'cursor:default;text-align:left;\' title = " + q(item.info) + ">" + 
												"&nbsp;&nbsp;&nbsp;&nbsp;" + item.text + "</div>";
											} else {
												moMenu += "<div class = \'item\' style = \'cursor:default;text-align:left;\'>" + 
												"&nbsp;&nbsp;&nbsp;&nbsp;" + item.text + "</div>";
											}
										}
									}
								}
								// *** //
								if ( g > 0 ) { moMenu += "</div>"; }
							}
							// *** //
							if ( whereTo == "lpart" ) {
								lp += tp;
							} else if ( whereTo == "cpart" ) {
								cp += tp;
							} else if ( whereTo == "rpart" ) {
								rp += tp;
							}
						}
					}
					// *** //
					if ( f > 0 ) { moMenu += "</div>"; }
					// *** //
					moMenu += "</div>";
					// # # # # # # # # # //
					lp += "</td>";
					cp += "</td>";
					rp += "</td>";
					// # # # # # # # # # //
					t += lp + cp + rp + "</tr></table>";
					// # # # # # # # # # //
					t += moMenu;
				// # # # # # # # # # //
				/* ************************************************************************* *
				 * Haupt-Div-Tag schließen
				 * ************************************************************************* */
				t += "</div>";
				/* ************************************************************************* *
				 * Ausgabe
				 * ************************************************************************* */
				document.write( t );//$("#searchField").val(t);
				/* ************************************************************************* *
				 * Event-Handling zur Hiding-Popups
				 * ************************************************************************* */
				$("body").mouseup( function(){
					var w = $(window).width();
					// *** //
					if ( w > co.minwidth ) {
						wepi_menu_popup_hide( id );
					}
				} );
				// *** //
				$(document).ready( function() {
					var w = $(window).width();
					// *** //
					if ( w > co.minwidth ) {
						$("#" + id + "_bar").css("display", "block");
						$("#" + id + "_bar_mobile").css("display",  "none");
						$("#" + id + "_desktop").css("display", "block");
						$("#" + id + "_mobile").css("display", "none");
					} else {
						$("#" + id + "_bar").css("display", "none");
						$("#" + id + "_bar_mobile").css("display", "block");
						$("#" + id + "_desktop").css("display", "none");
						$("#" + id + "_mobile").css("display", "block");
					}
				});
				// *** //
				$(window).resize( function() {
					var w = $(window).width();
					// *** //
					if ( w > co.minwidth ) {
						$("#" + id + "_bar").css("display", "block");
						$("#" + id + "_bar_mobile").css("display",  "none");
						$("#" + id + "_desktop").css("display", "block");
						$("#" + id + "_mobile").css("display", "none");
					} else {
						$("#" + id + "_bar").css("display", "none");
						$("#" + id + "_bar_mobile").css("display", "block");
						$("#" + id + "_desktop").css("display", "none");
						$("#" + id + "_mobile").css("display", "block");
					}
				});
				// *** //
				if ( co.scroll == "full.fixed" ) {
					$(window).scroll( function(){
						if ( $(document).scrollTop() >= 10 ) {
							$("#" + id).css( "position", "fixed" );
							$("#" + id).css( "top", "0px" );
							$("#" + id).css( "left", "0px" );
						} else {
							$("#" + id).css( "position", "relative" );
							$("#" + id).css( "top", "auto" );
							$("#" + id).css( "left", "auto" );
						}
					} );
				} else
				if ( co.scroll == "menu.fixed" ) {
					$(window).scroll( function(){
						if ( $("#" + id + "_banner").length > 0 ) {
							if ( $(document).scrollTop() >= parseInt($("#" + id + "_banner").css("height")) ) {
								$("#" + id + "_bar").css( "position", "fixed" );
								$("#" + id + "_bar").css( "top", "0px" );
								$("#" + id + "_bar").css( "left", "0px" );
								$("#" + id + "_bar_mobile").css( "position", "fixed" );
								$("#" + id + "_bar_mobile").css( "top", "0px" );
							} else {
								$("#" + id + "_bar").css( "position", "relative" );
								$("#" + id + "_bar").css( "top", "auto" );
								$("#" + id + "_bar").css( "left", "auto" );
								$("#" + id + "_bar_mobile").css( "position", "relative" );
								$("#" + id + "_bar_mobile").css( "top", "auto" );
							}
						} else {
							if ( $(document).scrollTop() >= 0 ) {
								$("#" + id + "_bar").css( "position", "fixed" );
								$("#" + id + "_bar").css( "top", "0px" );
								$("#" + id + "_bar").css( "left", "0px" );
								$("#" + id + "_bar_mobile").css( "position", "fixed" );
								$("#" + id + "_bar_mobile").css( "top", "0px" );
							} else {
								$("#" + id + "_bar").css( "position", "relative" );
								$("#" + id + "_bar").css( "top", "auto" );
								$("#" + id + "_bar").css( "left", "auto" );
								$("#" + id + "_bar_mobile").css( "position", "relative" );
								$("#" + id + "_bar_mobile").css( "top", "auto" );
							}
						}
					} );
				}
			}


	/* ---------------------------------------------------------------------
	*
	*      Default WEPI-Footer
	*      -------------------
	*
	*      wepi_footer ( TAGID, ARRAY );
	*
	*      Structure of the array:
	*
	*      { ... }, ...
	*
	*      Attributes:
	*
	*      file				Image
	*
	*      Sample:
	*
			.meinFooter {
				padding-top:15px;
				padding-bottom: 50px;
				border-top: 2px solid rgb(160,175,190);
				background-color: rgb(230,245,255);
				position: absolute;
				bottom: 0; width: 100%;
				clear: both;
			}
			.meinFooter * ul {
				list-style: none; margin:0; padding: 0;
			}
			.meinFooter .desktop * ul li {
				padding: 5px;
			}
			.meinFooter * .container {
				padding: 5px;
			}
			.meinFooter .mobile * ul {
				width: 400px;
			}
			.meinFooter .mobile * ul li {
				display: inline;
				float: left;
				padding: 5px;
			}
			.meinFooter .desktop * .topic {
				padding: 5px;
				font-weight: bold;
				color: rgb(120,0,0);
			}
			.meinFooter .mobile * .topic {
				padding: 5px;
				font-weight: bold;
				color: rgb(0,120,0);
				cursor: pointer;
			}
			.meinFooter .mobile * .topic:hover {
				background-color: rgb(0,120,0);
				color: #FFFFFF;
			}
			.meinFooter * a:link, .meinFooter * a:visited {
				color: rgb(40,70,120);
				font-weight: normal;
				text-decoration: none;
			}
			.meinFooter * a:hover, .meinFooter * a:active {
				text-decoration: underline;
			}
			.meinFooter * .subline {
				padding-top: 10px;
				position: absolute;
				width: 100%;
				bottom: 0;
			}
			.meinFooter * .subline * td {
				padding-left: 10px;
				padding-right: 10px;
				text-align: center;
				line-height: 22px;
			}


			wepi_footer(
				{
				id: "meinFooter",
				css: "meinFooter",
				align: "center",
				expand: "multiple", // single = im mobilen Modus darf nur ein Topic ausfalten, multiple = alle dürfen ausfalten
				minwidth: 650,
				subline: [
				  { text: "Copyright&copy; 2016" },
				  { text: "5M-Ware Software & WebDesign" }
				]
				},
				{
					topic: "Unternehmen",
					links: [ 
					{ text: "Über uns", url: "uberuns.html" },
					{ text: "Impressum", url: "uberuns.html" },
					{ text: "Disclaimer", url: "uberuns.html" }
					]
				},
				{
					topic: "Netzwerk",
					links: [
					{ text: "Facebook", url: "uberuns.html" },
					{ text: "Twitter", url: "uberuns.html" },
					{ text: "Google+", url: "uberuns.html" },
					{ text: "LinkedIn", url: "uberuns.html" },
					{ text: "XIng", url: "uberuns.html" },
					{ text: "Despora", url: "uberuns.html" },
					{ text: "Microsoft", url: "uberuns.html" },
					{ text: "Google", url: "uberuns.html" },
					{ text: "Apple", url: "uberuns.html" },
					{ text: "IBM", url: "uberuns.html" }
					]
				},
				{
					topic: "Information",
					container: "HALLO WELT! Hier kannst du Bilder und sonstiges reinpacken!",
					width: "200px",
					height: "100px"
				}
			);

	*
	--------------------------------------------------------------------- */

			function wepi_footer_mobile_tab( id, index, way ) {
				var i;
				// *** //
				if ( ( way == "single" ) || ( way == "multiple" ) ) {
					if ( way == "single" ) {
						for( i = 0; i < 1000; i++ ) {
							if ( i != index ) {
								if ( $("#" + id + "_" + i).length > 0 ) {
									$("#" + id + "_" + i).hide("fold");
								}
							}
						}
					}
					// *** //
					if ( $("#" + id + "_" + index).css("display") == "none" ) {
						$("#" + id + "_" + index).show("fold");
					} else {
						$("#" + id + "_" + index).hide("fold");
					}
				}
			}
			function wepi_footer( root ) {
				/* ************************************************************************* *
				 * Einrahmen
				 * ************************************************************************* */
				var q = function( vv ) { return "\"" + vv + "\""; }
				/* ************************************************************************* *
				 * Deklarationen
				 * ************************************************************************* */
				var subline_desktop = "", subline_mobile = "";
				var content_desktop = "", content_mobile = "";
				// **** //
				var subline, content, item;
				// *** //
				var moc = 0; var expa = "single";
				// *** //
				var t = "", a = "";
				var n, m, i;
				/* ************************************************************************* *
				 * Ausfaltungstyp für den mobilen Modus
				 * Typen: single, multiple
				 * ************************************************************************* */
				if ( root.hasOwnProperty("expand") ) {
					expa = root.expand;
				}
				/* ************************************************************************* *
				 * Connecten
				 * ************************************************************************* */
				subline = root.subline;
				/* ************************************************************************* *
				 * Subline
				 * ************************************************************************* */
				subline_desktop += "<table border = \'0\' cellspacing = \'0\' " +
				                   "cellpadding = \'0\' " +
				                   "style = \'margin-left:auto;margin-right:auto;\'><tr>";
				// *** //
				subline_mobile  += "<table border = \'0\' cellspacing = \'0\' " +
				                   "cellpadding = \'0\' " +
				                   "style = \'margin-left:auto;margin-right:auto;\'>";
				// *** //
				for ( n = 0; n < subline.length; n++ ) {
					if ( subline[n].hasOwnProperty("next") ) {
						subline_desktop += "</tr><tr>";
					} else if ( subline[n].hasOwnProperty("text") ) {
						subline_desktop += "<td";
						subline_mobile  += "<tr><td";
						// *** //
						if ( subline[n].hasOwnProperty("info") ) {
							subline_desktop += " title = " + q(subline[n].info);
							subline_mobile  += " title = " + q(subline[n].info);
						}
						// *** //
						subline_desktop += ">";
						subline_mobile  += ">";
						// *** //
						if ( subline[n].hasOwnProperty("url") ) {
							subline_desktop += "<a href = " + q(subline[n].url) + ">";
							subline_mobile  += "<a href = " + q(subline[n].url) + ">";
						}
						// *** //
						subline_desktop += subline[n].text;
						subline_mobile  += subline[n].text;
						// *** //
						if ( subline[n].hasOwnProperty("url") ) {
							subline_desktop += "</a>";
							subline_mobile  += "</a>";
						}
						// *** //
						subline_desktop += "</td>";
						subline_mobile  += "</td></tr>";
					}
				}
				// *** //
				subline_mobile  += "</table>";
				// *** //
				subline_desktop += "</tr></table>";
				/* ************************************************************************* *
				 * Content
				 * ************************************************************************* */
				if ( root.hasOwnProperty("align") ) {
					// Dieser Wert hat nur im Desktop-Modus Wirkung. Im mobilen Modus
					// bleibt die Linkliste stets zentriert.
					if ( root.align == "left" ) {
						a = " align = \'left\' ";
					} else
					if ( root.align == "right" ) {
						a = " align = \'right\' ";
					} else
					if ( root.align == "center" ) {
						a = " style = " + q("margin-left:auto; margin-right:auto;") + " ";
					}
				} else {
					a = " style = " + q("margin-left:auto; margin-right:auto;") + " ";
				}
				content_desktop += "<table border = \'0\' cellspacing = \'0\' " +
				                   "cellpadding = \'0\' " +
				                   a + "><tr>";
				// *** //
				content_mobile  += "<table border = \'0\' cellspacing = \'0\' " +
				                   "cellpadding = \'0\' " +
				                   "style = \'margin-left:auto;margin-right:auto;\'>";
				// *** //
				for ( i = 1; i < arguments.length; i++ ) {
					content = arguments[i];
					// *** //
					if ( ! content.hasOwnProperty("container") ) {
						content_desktop += "<td valign = \'top\'>" +
						                   "<div class = \'topic\'>" + content.topic + "</div>" +
						                   "<div><ul>";
						// *** //
						content_mobile  += "<tr><td valign = \'top\'>" +
										   "<div onmousedown = " + 
						                   q("javascript:wepi_footer_mobile_tab(\'" + root.id + "\'," + moc + ",\'" + expa + "\');") + " " +
						                   "class = " + q("topic") + ">" +
						                   content.topic + "</div>" +
						                   "<div id = " + q(root.id + "_" + moc) + " " +
						                   "style = \'display:none;\'><ul>"; moc++;
						// *** //
						for ( m = 0; m < content.links.length; m++ ) {
							item = content.links[m];
							// *** //
							content_desktop += "<li";
							content_mobile  += "<li";
							// *** //
							if ( item.hasOwnProperty("info") ) {
								content_desktop += " title = " + q(item.info);
								content_mobile  += " title = " + q(item.info);
							}
							// *** //
							content_desktop += ">";
							content_mobile  += ">";
							// *** //
							if ( item.hasOwnProperty("url") ) {
								content_desktop += "<a href = " + q(item.url) + ">";
								content_mobile  += "<a href = " + q(item.url) + ">";
							}
							// *** //
							content_desktop += item.text;
							content_mobile  += item.text;
							// *** //
							if ( item.hasOwnProperty("url") ) {
								content_desktop += "</a>";
								content_mobile  += "</a>";
							}
							// *** //
							content_desktop += "</li>";
							content_mobile  += "</li>";
						}
						// *** //
						content_mobile  += "</ul></div></td></tr>";
						// *** //
						content_desktop += "</ul></div></td>";
					} else if ( content.hasOwnProperty("container") ) {
						content_desktop += "<td valign = \'top\'>" +
						                   "<div class = \'topic\'>" + content.topic + "</div>" +
						                   "<div><ul>";
						// *** //
						content_mobile  += "<tr><td valign = \'top\'>" +
										   "<div onmousedown = " + 
						                   q("javascript:wepi_footer_mobile_tab(\'" + root.id + "\'," + moc + ",\'" + expa + "\');") + " " +
						                   "class = " + q("topic") + ">" +
						                   content.topic + "</div>" +
						                   "<div id = " + q(root.id + "_" + moc) + " " +
						                   "style = \'display:none;\'><ul>"; moc++;
						// *** //
						if ( 
						     ( content.hasOwnProperty("width") ) && ( content.hasOwnProperty("height") ) 
						   ) {
							content_desktop += "<div class = \'container\' style = " + q("width:" + content.width + ";height:" + content.height + ";") + ">";
							content_mobile  += "<div class = \'container\' style = " + q("width:" + content.width + ";height:" + content.height + ";") + ">";
						} else
						if ( content.hasOwnProperty("width") ) {
							content_desktop += "<div class = \'container\' style = " + q("width:" + content.width + ";") + ">";
							content_mobile  += "<div class = \'container\' style = " + q("width:" + content.width + ";") + ">";
						} else
						if ( content.hasOwnProperty("height") ) {
							content_desktop += "<div class = \'container\' style = " + q("height:" + content.height + ";") + ">";
							content_mobile  += "<div class = \'container\' style = " + q("height:" + content.height + ";") + ">";
						}
						// *** //
						content_desktop += content.container;
						content_mobile  += content.container;
						// *** //
						content_desktop += "</div>";
						content_mobile  += "</div>";
						// *** //
						content_mobile  += "</ul></div></td></tr>";
						// *** //
						content_desktop += "</ul></div></td>";
					}
				}
				// *** //
				content_mobile  += "</table>";
				// *** //
				content_desktop += "</tr></table>";
				/* ************************************************************************* *
				 * Zusammenführung
				 * ************************************************************************* */
				t += "<footer id = " + q(root.id) + " class = " + q(root.css) + ">";
				// *** //
				t += "<div id = " + q(root.id + "_desktop") + " class = \'desktop\' style = \'display:none;\'>";
				t += "<div class = \'listline\'>" + content_desktop + "</div><div class = \'subline\'>" + subline_desktop + "</div>";
				t += "</div>";
				// *** //
				t += "<div id = " + q(root.id + "_mobile") + " class = \'mobile\' style = \'display:none;\'>";
				t += "<div class = \'listline\'>" + content_mobile + "</div><div class = \'subline\'>" + subline_mobile + "</div>";
				t += "</div>";
				// *** //
				t += "</footer>";
				/* ************************************************************************* *
				 * Ausgabe
				 * ************************************************************************* */
				document.write(t);
				/* ************************************************************************* *
				 * Event-Handling
				 * ************************************************************************* */
				$(document).ready( function() {
					var w = $(window).width();
					// *** //
					if ( w > root.minwidth ) {
						$("#" + root.id + "_desktop").css("display", "block");
						$("#" + root.id + "_mobile").css("display", "none");
					} else {
						$("#" + root.id + "_desktop").css("display", "none");
						$("#" + root.id + "_mobile").css("display", "block");
					}
				});
				// *** //
				$(window).resize( function() {
					var w = $(window).width();
					// *** //
					if ( w > root.minwidth ) {
						$("#" + root.id + "_desktop").css("display", "block");
						$("#" + root.id + "_mobile").css("display", "none");
					} else {
						$("#" + root.id + "_desktop").css("display", "none");
						$("#" + root.id + "_mobile").css("display", "block");
					}
				});
			}


	/* ---------------------------------------------------------------------
	*
	*      Default WEPI-Tabs
	*      -------------------
	*
	*      wepi_tabs ( TAGID, ARRAY );
	*
	*      Structure of the array:
	*
	*      { ... }, ...
	*
	*      Attributes:
	*
	*      file				Image
	*
	*      Sample:
	*
			.meineTabs {
				margin: 10px;
			}
			.meineTabs .topic {
				background-color: rgb(230,235,245);
				padding: 5px;
				border-radius: 8px;
				margin-bottom: 1px;
				display: block;
				clear: both;
				cursor: pointer;
			}
			.meineTabs div ul {
				list-style: none; margin:0; padding: 0;
			}
			.meineTabs div ul li {
				display: inline;
				float: left;
				padding: 10px;
				margin: 3px;
				cursor: pointer;
			}
			.meineTabs div ul li:hover, .meineTabs div ul li:focus {
				background-color: rgb(240,245,255);
				padding: 9px;
				border: 1px solid rgb(210,225,235);
				border-radius: 8px;
			}
			.meineTabs div ul li .icon {
				text-align: center;	
			}
			.meineTabs div ul li .label {
				text-align: center;	
			}


			wepi_tabs(
				{
					id: "meineTabs",
					css: "meineTabs",
					// single = nur in Tab darf aufrollen, multiple = alle Tabs dürfen aufrulen. Fehlt diese Eigenschaft, bleiben alle Tabs aufgerollt.
					expand: "multiple",
					// Gibt an, welcher Tab standardmäßig aufgerollt ist und alle anderen sind nicht aufgerollt. Nur gültig, wenn "expand" angegeben.
					//active: 0,
					iconsize: { maxwidth: 32, maxheight: 32 }
				},
				{
					topic: "Unternehmen",
					info: "Alles wird gut…"
				},
				{
					item: [
					{ text: "Facebook", url: "javascript:alert('Facebook ist scheisse!');", info: "Facebook ist für'n Arsch!", icon: "imgs/document.png" },
					{ text: "Twitter", url: "uberuns.html", info: "Twitter ebenso fürn Arsch!", icon: "imgs/document.png" },
					{ text: "Google+", url: "uberuns.html", info: "Google+ ist auch nicht besser!", icon: "imgs/document.png" },
					{ text: "LinkedIn", url: "uberuns.html", info: "Oh mann der auch nitt!", icon: "imgs/document.png" },
					{ text: "XIng", url: "uberuns.html", info: "XIng klickt besser als es ist", icon: "imgs/document.png" },
					{ text: "Despora", url: "uberuns.html", info: "Nicht im Ernst oder?", icon: "imgs/setup.png" },
					{ text: "Microsoft", url: "uberuns.html", info: "Naja, mit viel Bluescreen, aber geht so", icon: "imgs/forms.png" },
					{ text: "Google", url: "uberuns.html", info: "Als Suchmaschine unschlagbar, für alles andere, kein Kommentar!", icon: "imgs/help.png" },
					{ text: "Apple", url: "uberuns.html", info: "Der Inbegriff für Innovation in der IT", icon: "imgs/help.png" },
					{ text: "IBM", url: "uberuns.html", info: "Der Big-Blue", icon: "imgs/help.png" }
					]
				},
				{
					topic: "Verschiedenes",
					info: "Mal jucke, watt et jiebd…!"
				},
				{
					item: [
					{ text: "Facebook", url: "uberuns.html", info: "Facebook ist für'n Arsch!", icon: "imgs/document.png" },
					{ text: "Twitter", url: "uberuns.html", info: "Twitter ebenso fürn Arsch!", icon: "imgs/document.png" },
					{ text: "Google+", url: "uberuns.html", info: "Google+ ist auch nicht besser!", icon: "imgs/document.png" },
					{ text: "LinkedIn", url: "uberuns.html", info: "Oh mann der auch nitt!", icon: "imgs/document.png" },
					{ text: "XIng", url: "uberuns.html", info: "XIng klickt besser als es ist", icon: "imgs/document.png" },
					{ text: "Despora", url: "uberuns.html", info: "Nicht im Ernst oder?", icon: "imgs/setup.png" },
					{ text: "Microsoft", url: "uberuns.html", info: "Naja, mit viel Bluescreen, aber geht so", icon: "imgs/forms.png" },
					{ text: "Google", url: "uberuns.html", info: "Als Suchmaschine unschlagbar, für alles andere, kein Kommentar!", icon: "imgs/help.png" },
					{ text: "Apple", url: "uberuns.html", info: "Der Inbegriff für Innovation in der IT", icon: "imgs/help.png" },
					{ text: "IBM", url: "uberuns.html", info: "Der Big-Blue", icon: "imgs/help.png" }
					]
				}
			);

	* --------------------------------------------------------------------- */

			function wepi_tabs_on_off_tab( id, index, way ) {
				var i;
				// *** //
				if ( ( way == 0 ) || ( way == 1 ) ) {
					if ( way == 0 ) {
						for( i = 0; i < 1000; i++ ) {
							if ( i != index ) {
								if ( $("#" + id + "_" + i).length > 0 ) {
									$("#" + id + "_" + i).hide("fold");
								}
							}
						}
					}
					// *** //
					$("#" + id + "_" + index).toggle("fold");
				}
			}
			function wepi_tabs( root ) {
				/* ************************************************************************* *
				 * Einrahmen
				 * ************************************************************************* */
				var q = function( vv ) { return "\"" + vv + "\""; }
				/* ************************************************************************* *
				 * Deklarationen
				 * ************************************************************************* */
				var iw = 48, ih = 48;
				// *** //
				if ( root.hasOwnProperty("iconsize") ) {
					if ( root.iconsize.hasOwnProperty("maxwidth") ) { iw = root.iconsize.maxwidth; }
					if ( root.iconsize.hasOwnProperty("maxheight") ) { iw = root.iconsize.maxheight; }
				}
				// *** //
				var t = "", f = "";
				// *** //
				var n, m = 0, i;
				// *** //
				var root, unit, item;
				/* ************************************************************************* *
				 * Zusammenführung
				 * ************************************************************************* */
				root = arguments[0];
				// *** //
				t += "<div id = " + q(root.id) + " class = " + q(root.css) + ">";
				// *** //
				for ( n = 1; n < arguments.length; n++ ) {
					unit = arguments[n];
					// *** //
					if ( unit.hasOwnProperty("topic") ) {
						t += "<div class = " + q("topic") + " ";
						// *** //
						if ( unit.hasOwnProperty("info") ) {
							t += "title = " + q(unit.info);	
						}
						// *** //
						if ( root.hasOwnProperty("expand") ) {
							if ( root.expand == "single" ) {
								t += " onmousedown = " + q("wepi_tabs_on_off_tab(\'" + root.id + "\'," + m + ",0);");
							} else if ( root.expand == "multiple" ) {
								t += " onmousedown = " + q("wepi_tabs_on_off_tab(\'" + root.id + "\'," + m + ",1);");
							}
						}
						// *** //
						m++;
						// *** //
						t += ">";
						// *** //
						t += unit.topic + "</div>";
					} else if ( ! unit.hasOwnProperty("topic") ) {
						if ( unit.hasOwnProperty("item") ) {
							item = unit.item;
							// *** //
							if ( ! root.hasOwnProperty("expand") ) { 
								t += "<div id = " + q(root.id + "_" + (m-1)) + "><ul>";
							} else {
								if ( root.expand == "single" ) {
									if ( ( root.hasOwnProperty("active") ) && ( root.active == (m - 1) ) ) {
										t += "<div id = " + q(root.id + "_" + root.active) + " style = \'display:block;\'><ul>";
									} else if ( ( root.hasOwnProperty("active") ) && ( root.active != (m - 1) ) ) {
										t += "<div id = " + q(root.id + "_" + root.active) + " style = \'display:none;\'><ul>";
									} else {
										t += "<div id = " + q(root.id + "_" + (m-1)) + "><ul>";
									}
								} else if ( root.expand == "multiple" ) {
									if ( ( root.hasOwnProperty("active") ) && ( root.active == (m - 1) ) ) {
										t += "<div id = " + q(root.id + "_" + root.active) + " style = \'display:block;\'><ul>";
									} else if ( ( root.hasOwnProperty("active") ) && ( root.active != (m - 1) ) ) {
										t += "<div id = " + q(root.id + "_" + root.active) + " style = \'display:none;\'><ul>";
									} else {
										t += "<div id = " + q(root.id + "_" + (m-1)) + "><ul>";
									}
								}
							}
							// *** //
							for ( i = 0; i < item.length; i++ ) {
								if ( item[i].hasOwnProperty("info") ) {
									f = " title = " + q(item[i].info) + " ";
								} else {
									f = "";
								}
								// *** //
								if ( 
									( item[i].hasOwnProperty("text") ) && ( item[i].hasOwnProperty("icon") ) && ( item[i].hasOwnProperty("url") )
								) {
									t += "<li onmousedown = " + q(item[i].url) + f + ">" +
										 "<table border = \'0\' cellspacing = \'0\' cellpadding = \'0\'><tr>" +
									     "<td valign = \'top\' class = " + q("icon") + "><img border = \'0\' style = " + 
									     q("max-width:" + iw + "px;max-height:" + ih + "px;") + " " +
									     "src = " + q(item[i].icon) + "></td></tr><tr>" +
									     "<td valign = \'top\' class = " + q("label") + ">" + item[i].text + "</td></tr></table></li>";
								} else
								if ( 
									( item[i].hasOwnProperty("text") ) && ( ! item[i].hasOwnProperty("icon") ) && ( item[i].hasOwnProperty("url") )
								) {
									t += "<li onmousedown = " + q(item[i].url) + f + ">" +
										 "<table border = \'0\' cellspacing = \'0\' cellpadding = \'0\'><tr>" +
									     "<td valign = \'top\' class = " + q("label") + ">" + item[i].text + "</td></tr></table></li>";
								} else
								if ( 
									( ! item[i].hasOwnProperty("text") ) && ( item[i].hasOwnProperty("icon") ) && ( item[i].hasOwnProperty("url") )
								) {
									t += "<li onmousedown = " + q(item[i].url) + f + ">" +
										 "<table border = \'0\' cellspacing = \'0\' cellpadding = \'0\'><tr>" +
									     "<td valign = \'top\' class = " + q("icon") + "><img border = \'0\' style = " + 
									     q("max-width:" + iw + "px;max-height:" + ih + "px;") + " " +
									     "src = " + q(item[i].icon) + "></td></tr></tr></table></li>";
								}
							}
							// *** //
							t += "</ul></div>";
						}
					}
				}
				// *** //
				t += "</div>";
				/* ************************************************************************* *
				 * Ausgabe
				 * ************************************************************************* */
				document.write(t);
			}









			function wepi_responsive_display ( id ) {
				if ( $("#" + id).length > 0 ) {
					$("#" + id).fadeToggle("slow");
				}
			}
			function wepi_responsive( root ) {
				/* ************************************************************************* *
				 * Einrahmen
				 * ************************************************************************* */
				var q = function( vv ) { return "\"" + vv + "\""; }
				/* ************************************************************************* *
				 * Deklarationen
				 * ************************************************************************* */
				// *** //
				var t = "";
				// *** //
				var n, m = 0, miw = "", maw = "", mih = "", mah = "", msz = "";
				// *** //
				var root, item;
				// *** //
				/* ************************************************************************* *
				 * Zusammenf�hrung
				 * ************************************************************************* */
				root = arguments[0];
				// *** //
				t += "<ul id = " + q(root.id) + " class = " + q(root.css) + ">\n";
				// *** //
				if ( root.hasOwnProperty("minwidth") ) {
					miw = root.minwidth;
					msz += "min-width:" + miw + ";";
				}
				// *** //
				if ( root.hasOwnProperty("maxwidth") ) {
					maw = root.maxwidth;
					msz += "max-width:" + miw + ";";
				}
				// *** //
				if ( root.hasOwnProperty("minheight") ) {
					mih = root.minheight;
					msz += "min-height:" + mih + ";";
				}
				// *** //
				if ( root.hasOwnProperty("maxheight") ) {
					mah = root.maxheight;
					msz += "max-height:" + mah + ";";
				}
				// *** //
				if ( msz != "" ) {
					msz += "overflow:auto;";
				}
				// *** //
				for ( n = 1; n < arguments.length; n++ ) {
					item = arguments[n];
					// *** //
					t += "<li";
					// *** //
					if ( item.hasOwnProperty("subclass") ) {
						t += " class = " + q(item.subclass);
					}
					// *** //
					if ( ( item.hasOwnProperty("onclick") ) && ( item.hasOwnProperty("click") ) ) {
						if ( item.onclick == "subcontent" ) {
							t += " style = " + q("cursor:pointer;overflow:hidden;" + msz) + 
							     " onmousedown = " + q("javascript:wepi_responsive_display(\'" + root.id + "_subcontent_" + m 
							     + "\');");
						} else if ( item.onclick == "link" ) {
							t += " style = " + q("cursor:pointer;overflow:hidden;" + msz) +
							     " onmousedown = " + q(item.click);
						}
					} else {
						t += " style = " + q(msz) + ";overflow:hidden;";
					}
					// *** //
					t += ">\n";
					// *** //
					t += item.container;
					// *** //
					if ( ( item.hasOwnProperty("onclick") ) && ( item.hasOwnProperty("click") ) ) {
						if ( item.onclick == "subcontent" ) {
							t += "<div id = " + q(root.id + "_subcontent_" + m) + " class = " + q("sub") +
							     " style = " + q("display:none;overflow:hidden;") +
							     ">" + item.click + "</div>\n";
							m++;
						}
					}
					// *** //
					t += "</li>\n";
				}
				// *** //
				t += "</ul>\n";
				/* ************************************************************************* *
				 * Ausgabe
				 * ************************************************************************* */
				document.write(t);
			}

