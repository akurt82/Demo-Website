    <style>
         <?php
         $unit_navigator = array( "a01.png", "a02.png", "a03.png", "a04.png",
         						  "a06.png", "a10.png", "a11.png", "a12.png",
         						  "a13.png", "a14.png", "a15.png", "a16.png",
         						  "a20.png", "a22.png" );
         // *** //
         $unit_buttons   = array( "b03.png", "b05.png", "b06.png", "b07.png", 
         						  "b11.png", "b14.png", "b17.png", "b20.png",
         						  "b21.png" );
         // *** //
         $unit_size      = array( array( "w" => "55", "h" => "55" ), array( "w" => "55", "h" => "55" ),
         						  array( "w" => "55", "h" => "55" ), array( "w" => "55", "h" => "55" ),
         						  array( "w" => "55", "h" => "55" ), array( "w" => "55", "h" => "55" ),
         						  array( "w" => "55", "h" => "55" ), array( "w" => "55", "h" => "55" ),
         						  array( "w" => "55", "h" => "55" ) );
         // *** //
         $bi = 0; $ni = 0;
         // *** //
         foreach ( $unit_buttons as $b ) {
         	$ni = 0;
         	// *** //
         	foreach ( $unit_navigator as $n ) {
         		$bb = $b; if ( file_exists($bb) ) { $nn = $n; } else {
	         		$bb = "img/".$b; if ( file_exists($bb) ) { $nn = "img/".$n; } else {
		         		$bb = "../img/".$b; if ( file_exists($bb) ) { $nn = "../img/".$n; } else {
			         		$bb = "../../img/".$b; if ( file_exists($bb) ) { $nn = "../../img/".$n; } else {
				         		$bb = "../../../img/".$b; if ( file_exists($bb) ) { $nn = "../../../img/".$n; } else {
					         		$bb = "../../../../img/".$b; if ( file_exists($bb) ) { $nn = "../../../../img/".$n; }
				         		}
			         		}
		         		}
	         		}
         		}
         		// *** //
         		$w = $unit_size[$ni]["w"];
         		$h = $unit_size[$ni]["h"];
         		// *** //
         		$m = $bi."_".$ni;
         		// *** //
         		$ni++;
         		// *** //
         		echo "\n";
		        echo "/* ************************************************************************** *\n";
		        echo " * JSSOR - SLIDER - STYLE ".$m."\n";
		        echo " * ************************************************************************** */\n";
		        echo ".jssor_style_".$m."_nav { position: absolute; }\n";
		        echo ".jssor_style_".$m."_nav div, .jssor_style_".$m."_nav div:hover, .jssor_style_".$m."_nav .av {\n";
		        echo "    position: absolute; width: 16px; height: 16px;\n";
		        echo "    background: url(\"".$bb."\") no-repeat;\n";
		        echo "    overflow: hidden; cursor: pointer; }\n";
		        echo ".jssor_style_".$m."_nav div { background-position: -7px -7px; }\n";
		        echo ".jssor_style_".$m."_nav div:hover, .jssor_style_".$m."_nav .av:hover { background-position: -37px -7px; }\n";
		        echo ".jssor_style_".$m."_nav .av { background-position: -67px -7px; }\n";
		        echo ".jssor_style_".$m."_nav .dn, .jssor_style_".$m."_nav .dn:hover { background-position: -97px -7px; }\n";
		        echo ".jssor_style_".$m."_left, .jssor_style_".$m."_right {\n";
		        echo "    display: block; position: absolute;\n";
		        echo "    width: ".$w."px; height: ".$h."px;\n";
		        echo "    cursor: pointer; overflow: hidden;\n";
		        echo "    background: url(\"".$nn."\") center center no-repeat; }\n";
		        echo ".jssor_style_".$m."_left { background-position: -10px -31px; }\n";
		        echo ".jssor_style_".$m."_right { background-position: -70px -31px; }\n";
		        echo ".jssor_style_".$m."_left:hover { background-position: -130px -31px; }\n";
		        echo ".jssor_style_".$m."_right:hover { background-position: -190px -31px; }\n";
		        echo ".jssor_style_".$m."_left.jssora22ldn { background-position: -250px -31px; }\n";
		        echo ".jssor_style_".$m."_right.jssora22rdn { background-position: -310px -31px; }\n";
         	}
         	// *** //
         	$bi++;
         }
         ?>
    </style>
    <script type = "text/javascript">
    	function wepi_jssor_slider () {
    		var id = "";
    		// *** //
    		var i, c = 0, m = 0, n = 0; var cls; var unit, text; 
    		var t = ""; var f = 0; var mw = 0, mh = 0;
    		var duration = 800, play = true, idle = 3000, dire = 1;
    		// *** //
    		for ( i = 0 ; i < arguments.length; i++ ) {
    			unit = arguments[i];
    			// *** //
    			if ( unit.hasOwnProperty("id") ) { id = unit.id; }
    			if ( unit.hasOwnProperty("style") ) { cls = unit.style; }
    			if ( unit.hasOwnProperty("maxwidth") ) { mw = unit.maxwidth; }
    			if ( unit.hasOwnProperty("maxheight") ) { mh = unit.maxheight; }
    			if ( unit.hasOwnProperty("duration") ) { duration = unit.duration; }
    			if ( unit.hasOwnProperty("autoplay") ) { play = unit.autoplay; }
    			if ( unit.hasOwnProperty("interval") ) { idle = unit.interval; }
    			if ( unit.hasOwnProperty("direction") ) { dire = unit.direction; } // horizontal oder vertical?
    			// *** //
    			if ( unit.hasOwnProperty("image") ) {
    				if ( f == 0 ) {
    					f = 1;
    					t += '<div data-b="0" data-p="170.00" data-po="80% 55%" style="display: none;">';
    				} else {
    					t += '<div data-b="0" data-p="170.00" style="display: none;">';
    				}
    				// *** //
    				t += '<img data-u="image" src="' + unit.image + '" />';
    				// *** //
    				if ( unit.hasOwnProperty("label") ) {
    					text = unit.label;
    					// *** //
    					t += '<div data-u="caption" data-t="'+c+'" data-3d="1" '+
    					     'style="position: absolute; top: 30px; left: 100px; width: 50px; height: 50px;">';
						c++; n = 0;
						// *** //
    					for ( m = 0; m < text.length; m++ ) {
    						n++;
    						// *** //
                    		t += '<div data-u="caption" data-t="'+n+'" '+ 
                    			 'style="position: absolute; ';
                    		// *** //
                    		if ( text[m].hasOwnProperty("x") ) { t += 'left:' + text[m].x + ";"; }
                    		if ( text[m].hasOwnProperty("y") ) { t += 'top:' + text[m].y + ";"; }
                    		if ( text[m].hasOwnProperty("w") ) { t += 'width:' + text[m].w + ";"; }
                    		if ( text[m].hasOwnProperty("h") ) { t += 'height:' + text[m].h + ";"; }
                    		if ( text[m].hasOwnProperty("align") ) { t += 'text-align:' + text[m].align + ";"; }
                    		if ( text[m].hasOwnProperty("valign") ) { t += 'vertical-align:' + text[m].valign + ";"; }
                    		if ( text[m].hasOwnProperty("color") ) { t += 'color:' + text[m].color + ";"; }
                    		if ( text[m].hasOwnProperty("background") ) { t += 'background:' + text[m].background + ";"; }
                    		if ( text[m].hasOwnProperty("font") ) { t += 'font-family:' + text[m].font + ";"; }
                    		if ( text[m].hasOwnProperty("size") ) { t += 'font-size:' + text[m].size + ";"; }
                    		if ( text[m].hasOwnProperty("borderRadius") ) { t += 'border-radius:' + text[m].borderRadius + ";"; }
                    		if ( text[m].hasOwnProperty("border") ) { t += 'border:' + text[m].border + ";"; }
                    		if ( text[m].hasOwnProperty("padding") ) { t += 'padding:' + text[m].padding + ";"; }
                    		if ( text[m].hasOwnProperty("shadow") ) { t += 'box-shadow:' + text[m].shadow + ";"; }
                    		// *** //
                    		t += '">' + text[m].text + '</div>';
    					}
    					// *** //
    					t += '</div>';
    				}
    				// *** //
    				t += '</div>';
    			}
    		}
    		// *** //
    		t = '<div id="'+id+'" '+
    		    'style="position: relative; margin: 0 auto; top: 0px; left: 0px; '+
    		    'width: '+mw+'; height: '+mh+'; overflow: hidden; visibility: hidden;">'+
        		'<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">'+
            	'<div style="filter: alpha(opacity=70); opacity: 0.7; '+
            	'position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>'+
            	'<div style="position:absolute;display:block;background:url(\'img/loading.gif\') no-repeat center center;'+
            	'top:0px;left:0px;width:100%;height:100%;"></div>'+
        		'</div>'+
        		'<div data-u="slides" style="cursor: default; position: relative; '+
        		'top: 0px; left: 0px; width: '+mw+'; height: '+mh+'; overflow: hidden;">'+
        		t +
        		'</div>'+
        		'<div data-u="navigator" class="'+cls+'_nav" style="bottom:16px;right:16px;" data-autocenter="1">'+
            	'<div data-u="prototype" style="width:16px;height:16px;"></div>'+
        		'</div>'+
        		'<span data-u="arrowleft" class="'+cls+'_left" style="top:0px;left:10px;width:50px;height:58px;" data-autocenter="2"></span>'+
        		'<span data-u="arrowright" class="'+cls+'_right" style="top:0px;right:10px;width:50px;height:58px;" data-autocenter="2"></span>'+
    			'</div>';
    		// *** //
    		document.write(t);
    		// *** //
	        jQuery(document).ready(function ($) {
	            var jssor_1_options = {
	              $AutoPlay: play, $SlideDuration: duration,
	              $SlideEasing: $Jease$.$OutQuint,
	              $PauseOnHover: 3,
	              $Idle: idle,
	              $AutoPlay: play,
	              $PlayOrientation: dire,
	              $ArrowNavigatorOptions: { $Class: $JssorArrowNavigator$ },
	              $BulletNavigatorOptions: { $Class: $JssorBulletNavigator$ }
	            };
	            var jssor_1_slider = new $JssorSlider$(id, jssor_1_options);
	            var ScaleSlider = function () {
	                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
	                if (refSize) { refSize = Math.min(refSize, parseInt(mw)); jssor_1_slider.$ScaleWidth(refSize); }
	                else { window.setTimeout(ScaleSlider, 30); }
	            }
	            ScaleSlider();
	            $(window).bind("load", ScaleSlider);
	            $(window).bind("resize", ScaleSlider);
	            $(window).bind("orientationchange", ScaleSlider);
	        });
    	}
    </script>