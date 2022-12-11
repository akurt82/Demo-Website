<?php
	$lang = "de";
?>

<!doctype html>
<html>
  <head>

  <title>DEMO - Administration</title>

<link rel="shortcut icon" href="imgs/logo_favicon_ico.ico">
<link rel="icon" type="image/png" href="imgs/logo_favicon.png" sizes="32x32">
<link rel="icon" type="image/png" href="imgs/logo_favicon.png" sizes="96x96">
<link rel="apple-touch-icon" sizes="180x180" href="imgs/logo_favicon.png">

  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' 
  	    type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
  <link href='http://fonts.googleapis.com/css?family=Open+Sans|Baumans' rel='stylesheet' 
        type='text/css'>
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

    <script type = "text/javascript">
		var svr = new wepiServ(); svr.sessionID = '<?php echo session_id(); ?>';
        function blowup(id) {
            var popup = new Array();
            popup[0] = "popup1";
            popup[1] = "popup2";
            popup[2] = "popup3";
            popup[3] = "popup4";
            popup[4] = "popup5";
            var n;
            for ( n = 0; n < 6; n++ ) {
                if ( $_id(popup[n]) ) {
                    $_id(popup[n]).style.display = "none";
                }
            }
            if ( ( id >= 0 ) && ( id <= 5 ) ) {
                n = id - 1;
                if ( $_id(popup[n]) ) {
                    $_id(popup[n]).style.display = "block";
                }
            }
        }
		function pullout( id ) {
			var i = 0;
			// ...
			for ( i = 0; i < 10; i++ ) {
				if ( $_id("popup_box_0"+i) ) { $_css("popup_box_0"+i).display = "none"; }
			}
			// ...
			for ( i = 10; i < 321; i++ ) {
				if ( $_id("popup_box_"+i) ) { $_css("popup_box_"+i).display = "none"; }
			}
			// ...
			if ( id != "" ) {
				if ( $_id(id) ) { $_css(id).display = "block"; }
			}
		}
    </script>

    <style type = "text/css">
		table td, table th {
			vertical-align: top;
		}
    	.modern_picking_table img {
    		border-radius: 6px;
    		cursor: pointer;
    	}
    	.modern_picking_table img:hover {
			box-shadow: 0px 5px 5px rgba(100,100,100,0.5);
			-moz-box-shadow: 0px 5px 5px rgba(100,100,100,0.5);
			-khtml-box-shadow: 0px 5px 5px rgba(100,200,100,0.5);
			-webkit-box-shadow: 0px 5px 5px rgba(100,100,100,0.5);
    	}
    	.footer_topic {
    		font-size: 20px;margin-bottom:20px;	
    	}
		.selected_category {
			border-radius: 10px;
			-o-border-radius: 10px;
			-ms-border-radius: 10px;
			-moz-border-radius: 10px;
			-khtml-border-radius: 10px;
			-webkit-border-radius: 10px;
			background-color: rgb(234,238,242);
			padding: 3px;
			border: 1px solid rgb(214,218,222);
		}
		a:link, a:visited, .link_button {
			color: rgb( 51, 51, 153 ); text-decoration: none;
			text-shadow: none; -moz-text-shadow: none;
			-khtml-text-shadow: none; -webkit-text-shadow: none;
		}
		a:hover, .link_button:hover {
			text-decoration: underline;
		}
		.markerin {
			padding: 6px;
			border-radius: 8px; -moz-border-radius: 8px;
			-webkit-border-radius: 8px; -khtml-border-radius: 8px;
		}
		.markerin:hover {
			background: url(imgs/backstage.png) repeat-x center center;
			padding: 5px;
			border: 1px solid rgb(110,135,120);
			color: rgb(50,40,30);
			text-shadow: 0px 0px 4px rgb(210,240,210);
			-moz-text-shadow: 0px 0px 4px rgb(210,240,210);
			-khtml-text-shadow: 0px 0px 4px rgb(210,240,210);
			-webkit-text-shadow: 0px 0px 4px rgb(210,240,210);
		}
		.topica {
			background: url(imgs/btn_blau.png) repeat-x center center;
			padding: 8px; border: 1px solid rgb( 120, 145, 130 );
			text-align: left; margin-bottom: 1px;
			font-weight: bold;
			color: #ffffff;
			cursor: pointer;
			border-radius: 6px;
			-moz-border-radius: 6px;
			-khtml-border-radius: 6px;
			-webkit-border-radius: 6px;
			text-shadow: 0px 0px 10px #000;
		}
		.topica:hover {
			background: url(imgs/btn_blau_2.png) repeat-x center center;
		}
		.contenta {
			display: none;
			padding: 8px;
			line-height: 20px;
			max-height: 384px;
			overflow: auto;
			background: url(imgs/backstage.png) repeat-x top left;
			text-align: left;
			font-weight: normal;
			font-size: 12px;
			margin-bottom: 1px;
			border-radius: 6px;
			-moz-border-radius: 6px;
			-khtml-border-radius: 6px;
			-webkit-border-radius: 6px;
			border: 1px solid rgb( 120, 145, 130 );
		}
		.flat_image, .flat_image img {
			border-shadow: none; border: none; -moz-border-shadow: none; -khtml-border-shadow: none; -webkit-border-shadow: none;
		}
		.pathbar {
			background-color: #000000;
			padding: 4px; text-align: left; font-weight: normal;
			border-bottom: 1px solid rgb(150,180,165);
			position: fixed; margin-top: -4px; margin-left: -10px;
			width: 100%; line-height: 22px; vertical-align: middle;
			z-index:200; color: #fff; display: none;
			box-shadow: 0px 1px 4px rgba(170,170,210,0.45);
			-moz-box-shadow: 0px 1px 4px rgba(170,170,210,0.45);
			-khtml-box-shadow: 0px 1px 4px rgba(170,170,210,0.45);
			-webkit-box-shadow: 0px 1px 4px rgba(170,170,210,0.45);
		}
		.pathbar2 {
			background: url(imgs/selbox/selbox.png) repeat-x bottom left;
			padding: 4px; text-align: left; font-weight: normal;
			border-bottom: 1px solid rgb(150,180,165);
			position: fixed; margin-top: -48px; margin-left: -30px;
			width: 992px; line-height: 22px; vertical-align: middle;
			z-index:200;
		}
		.pathbar a:link, .pathbar a:visited,
		.pathbar2 a:link, .pathbar2 a:visited {
			color: #766a5b;
		}
		.distancing_inner_images img, .distancing_inner_images td img, .distancing_inner_images th img,
		.distancing_inner_images tbody td img, .distancing_inner_images tbody th img {
			padding: 4px;
		}
		.distancing_inner_images img:hover, .distancing_inner_images td img:hover, .distancing_inner_images th img:hover,
		.distancing_inner_images tbody td img:hover, .distancing_inner_images tbody th img:hover {
			padding: 2px;
			border: 2px solid rgb( 150, 190, 165 );
		}
		.table001 td, .table0001 td {
			padding: 7px;
		}
		.table001 th, .table0001 th {
			padding: 5px;
			background: url(imgs/backstage.png) repeat-x center center;
			border-radius: 8px;
			-moz-border-radius: 8px;
			-khtml-border-radius: 8px;
			-webkit-border-radius: 8px;
			box-shadow: 0px 2px 2px rgb(200,200,200);
			-moz-box-shadow: 0px 2px 2px rgb(200,200,200);
			-khtml-box-shadow: 0px 2px 2px rgb(200,200,200);
			-webkit-box-shadow: 0px 2px 2px rgb(200,200,200);
		}
		.titleOfDoc {
			font-family: 'Josefin Sans', sans-serif;
			font-size: 20px;
			font-weight: normal;
			/*color: #FFFFFF;
			text-shadow: 0px 0px 8px #000000;*/
			color: #000000;
			padding: 10px;
			text-align: left;
			/*border-bottom: 2px solid rgb(190,190,240);*/
			border-bottom: 1px solid #ffffff;
			margin-bottom: 10px;
		}
		.le_inf {
			margin-top: 20px;
			margin-bottom: 20px;
			width: 500px;
			padding: 5px;
			color: #FFFFFF;
			text-shadow: 0px 0px 4px rgb(50,50,80);
			background-color: rgb(100,150,100);
			border: 2px solid rgb(30,90,30);
			box-shadow: 0px 0px 8px rgb(70,70,110);
			-moz-box-shadow: 0px 0px 8px rgb(70,70,110);
			-khtml-box-shadow: 0px 0px 8px rgb(70,70,110);
			-webkit-box-shadow: 0px 0px 8px rgb(70,70,110);
		}
		.lo_inf {
			margin-top: 20px;
			margin-bottom: 20px;
			width: 500px;
			padding: 5px;
			color: #FFFFFF;
			text-shadow: 0px 0px 4px rgb(50,50,80);
			background-color: rgb(150,100,100);
			border: 2px solid rgb(90,30,30);
			box-shadow: 0px 0px 8px rgb(70,70,110);
			-moz-box-shadow: 0px 0px 8px rgb(70,70,110);
			-khtml-box-shadow: 0px 0px 8px rgb(70,70,110);
			-webkit-box-shadow: 0px 0px 8px rgb(70,70,110);
		}
		.imaginar img {
			margin-bottom: 20px;
			padding: 3px;
			background: #fff;
			border-radius: 6px;
			-moz-border-radius: 6px;
			-khtml-border-radius: 6px;
			-webkit-border-radius: 6px;
			cursor: pointer;
		}
		.imaginar img:hover {
			padding: 1px;
			border: 2px solid rgb(120,30,11);
		}
		.ga_tab {
			border-radius: 4px; -moz-border-radius: 4px;
			-khtml-border-radius: 4px; -webkit-border-radius: 4px;
			border: 1px solid rgb(200,200,200);
		}
		.ga_tab th {
			font-family: 'Josefin Sans', sans-serif;
			border-bottom: 1px solid rgb(152,145,142);
			background: rgb(200,200,200); color: #000;
			line-height: 20px; padding: 3px; font-weight: normal;
			border-top-left-radius: 4px; -moz-border-top-left-radius: 4px;
			-khtml-border-top-left-radius: 4px; -webkit-border-top-left-radius: 4px;
			border-top-right-radius: 4px; -moz-border-top-right-radius: 4px;
			-khtml-border-top-right-radius: 4px; -webkit-border-top-right-radius: 4px;
		}
		.ga_tab td {
			font-family: 'Josefin Sans', sans-serif;
			padding: 3px;
			text-align: left;
		}
		.infobar {
			border-top: 1px solid #ffffff;
			margin-top: 5px;
			padding: 40px;
			color: #ffffff;
			background-color: #000000;
		    -webkit-box-shadow: 0px -2px 1px rgba(170,170,210,0.45);
		    -moz-box-shadow:    0px -2px 1px rgba(170,170,210,0.45);
		    box-shadow:         0px -2px 1px rgba(170,170,210,0.45);
		}
		.infobar img {
			box-shadow: none; -webkit-box-shadow: none;
			-moz-box-shadow: none; -khtml-box-shadow: none;
		}
		.infobar a:link, .infobar a:visited {
			color: #766a5b; text-decoration: none;
			text-shadow: none; -moz-text-shadow: none;
			-khtml-text-shadow: none; -webkit-text-shadow: none;
		}
		.infobar a:hover {
			text-decoration: underline;
		}
		.infobar .imgorder .shorter {
			box-shadow: none; -webkit-box-shadow: none;
			-moz-box-shadow: none; -khtml-box-shadow: none;
			margin-left: 10px;
			marign-bottom: 10px; float: left;
			padding: 6px; background-color: #ffffff;
		}
		.infobar .imgorder .longer {
			box-shadow: none; -webkit-box-shadow: none;
			-moz-box-shadow: none; -khtml-box-shadow: none;
			margin-left: 10px;
			marign-bottom: 10px; float: left;
			padding: 5px; background-color: #ffffff;
			padding-right: 6px; padding-top: 6px; padding-bottom: 7px;
		}
		.overviewBlock img {
			box-shadow: none; -webkit-box-shadow: none;
			-moz-box-shadow: none; -khtml-box-shadow: none;
		}
		.overviewBlock th {
			line-height: 20px; padding: 10px;
			background: #000;
			color: #ffffff;
			text-shadow: 0px 0px 4px rgb(85,145,142);
			-moz-text-shadow: 0px 0px 4px rgb(85,145,142);
			-khtml-text-shadow: 0px 0px 4px rgb(85,145,142);
			-webkit-text-shadow: 0px 0px 4px rgb(85,145,142);
			border-radius: 8px; -moz-border-radius: 8px;
			-khtml-border-radius: 8px; -webkit-border-radius: 8px;
		}
		.overviewBlock td .inner {
			padding: 10px;
			cursor: pointer;
			text-center;
			margin:2px;
		}
		.overviewBlock td .inner div {
			text-align: center;
		}
		.overviewBlock td .inner:hover {
			padding: 9px;
			background: url(imgs/overviewBlockItem.png) no-repeat top left;
			border: 1px solid rgb(30,30,90);
			border-radius: 8px; -moz-border-radius: 8px;
			-khtml-border-radius: 8px; -webkit-border-radius: 8px;
		}
		.overviewBlock td .inner img, .overviewBlock td .inner div img {
			box-shadow: none; -webkit-box-shadow: none;
			-moz-box-shadow: none; -khtml-box-shadow: none;
		}
		.we_cont {
			color: rgb( 137, 62, 158 );
			font-family: 'Josefin Sans', sans-serif;
			text-align: left;
			padding-left: 1%;
			padding-right: 1%;
		}
		.we_cont a:link, .we_cont a:visited {
			color: rgb( 51, 51, 153 ); text-decoration: none;
			text-shadow: none; -moz-text-shadow: none;
			-khtml-text-shadow: none; -webkit-text-shadow: none;
		}
		.we_cont a:hover {
			text-decoration: underline;
		}
        body {
        	background: #FFFFFF;
            padding: 0; margin: 0;
            font-family: 'Josefin Sans', sans-serif;
            font-size: 20px;
            font-weight: normal;
            color: rgb( 137, 62, 158 );
            overflow-x: hidden;
            box-shadow: 12px 0 15px -1px rgba(161, 173, 195, 0.4), -12px 0 8px -1px rgba(161, 173, 195, 0.4);
        }

			.meineResponsive {
				list-style: none; margin:0; padding: 0;
			}
			.meineResponsive li {
				display: inline;
				float: left;
				padding: 0px;
				color: #000000;
				margin-left: 1px; margin-bottom: 1px;
				font-size: 12pt; text-align: left; line-height: 30px;
			}
			.meineResponsive .rot {
				background-color: rgb(180,40,40);
				border: 2px solid rgb(150,40,40);
				height: 140px;
			}
			.meineResponsive .gelb {
				background-color: rgb(180,180,40);
				border: 2px solid rgb(150,150,40);
				height: 140px;
			}
			.meineResponsive .gruen {
				background-color: rgb(40,180,40);
				border: 2px solid rgb(40,150,40);
				height: 140px;
			}
			.meineResponsive .blau {
				background-color: rgb(40,130,230);
				border: 2px solid rgb(40,130,200);
				height: 140px;
			}
			.meineResponsive .grau {
				background-color: rgb(180,180,180);
				border: 2px solid rgb(150,150,150);
				height: 140px;
			}
			.meineResponsive * .sub {
				position: absolute;
				margin-left: 14%;
				margin-top: -5%;
				background-color: rgb(230,230,230);
				border: 2px solid #000000;
			}


.loginbox {
	position: absolute;
	z-index: 2000;
	margin-left: 0px;
	margin-top: 16px;
	display: none;
	z-index:99999;
}

.loginbox .container {
    background-color: rgba(255,255,255,0.98); 
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px; 
    min-height:50px;
    display: block;
    padding: 5px;
    color: #000000;
    position: relative;
    border: 1px solid rgb(210,210,215);
    box-shadow: 0px 0px 8px rgba(100,100,100,0.25);
}

.loginbox #pointer{
    border-bottom:solid 10px #FFF;
    border-left: solid 5px transparent;
    border-right: solid 5px transparent;
    position:absolute;
    width: 0;
    height: 0;
    top: -10px;
    left: 10px;
}

.loginbox .container td {
	padding: 5px;
}

		.rd-bock-set {
			clear: both;
		}
		.rd-bock-set ul {
			list-style: none; 
			margin:0; padding: 0;
		}
		.rd-bock-set ul li {
			display: inline;
			float: left;
			padding: 5px;
			vertical-align: top;
		}

        a:link, a:visited {
            text-decoration : none;
            color: rgb( 51, 51, 153 );
        }
        a:hover { text-decoration: underline; }
        .innerbody {
            background: #FFFFFF;
        }
        .banner {
            z-index: 1000;
            /*position: fixed;*/
            text-align: center;
			width: 100%; color: #ffffff;
            padding: 0px; margin: 0px;
        }
		.banner .backendStyle {
			margin: 0px;
			padding: 0px;
			position: absolute;
			width: 100%;
			height: 80px;
			background: #000000;
		}
		.banner .backendStyle img {
			height: 50px;
		}
		.banner img {
			box-shadow: none; -webkit-box-shadow: none;
			-moz-box-shadow: none; -khtml-box-shadow: none;
		}
        .banner .inside {
/*            border-bottom: 1px solid rgb(86,111,132);*/
            width: 100%; z-index: 1000;
            height: 50px;
            text-align: left;
            padding: 0px; margin: 0px;
/*			box-shadow: 0px 0px 4px rgb(70,70,110);
			-moz-box-shadow: 0px 0px 4px rgb(70,70,110);
			-khtml-box-shadow: 0px 0px 4px rgb(70,70,110);
			-webkit-box-shadow: 0px 0px 4px rgb(70,70,110);*/
        }
        .innerbody .inside {
            padding: 10px;
            text-align: left;
        }
		.infomarker {
			text-align:left;
			width:200px;
			font-family: 'Josefin Sans', sans-serif;
			font-size: 30px;
			font-weight: bold;
			color: #ffffff;
			text-shadow: 0px 0px 16px #766a5b;
			margin-top: 8px;
		}
		.menu_bar {
			position: absolute; width: 100%; 
			z-index: 1006; 
			height: 40px;
			<?php if ( $browser->mobility == 0 ) { ?>
			margin-top: 80px;
			<?php } else { ?>
			margin-top: 60px;
			<?php } ?>
			font-family: 'Josefin Sans', sans-serif;
		}
        .selectiveBox {
            
        }
        .selectiveBox th .ban {
            min-height: 140px;
        }
        .selectiveBox th .txt {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            background: url(imgs/selbox/selbox.jpg) repeat-x bottom left;
            cursor: pointer;
            color: rgb(89,131,142);
            width:100px;
            text-shadow: 0px 0px 4px #ffffff;
           /*border: 1px solid rgb(149,201,212);*/
        }
        .selectiveBox th .txt:hover {
            background: url(imgs/selbox/selbox.jpg) repeat-x center left;
        }
        .searchbox, .searchbox table td, .searchbox table th {
            padding: 0px; margin: 0px;
        }
        .searchbox input {
            border: 1px solid rgb(100,100,130);
            padding: 3px;
            font-weight: normal;
            font-size: 12px;
            background: url(imgs/input/bkg.png) repeat-x bottom left rgb(240,240,250);
            border-radius: 6px; -moz-border-radius: 6px; 
            -khtml-border-radius: 6px; -webkit-border-radius: 6px;
        }
		.loggerBox {
			font-family: 'Josefin Sans', sans-serif; color: #000000;
			border: 1px solid #fff;
			font-size: 12px; z-index:99999;
			border-radius: 6px; -moz-border-radius: 6px;
			-khtml-border-radius: 6px; -webkit-border-radius: 6px;
			/*background-color: rgb(230,230,230);*/
			background: #fff;
			box-shadow: 0px 0px 8px rgba(0,0,0,0.55);
			-moz-box-shadow: 0px 0px 8px rgba(0,0,0,0.55);
			-khtml-box-shadow: 0px 0px 8px rgba(0,0,0,0.55);
			-webkit-box-shadow: 0px 0px 8px rgba(0,0,0,0.55);
		}
		.loggerBox td {
			padding: 10px; text-align: left;
		}
		.loggerBox td input {
			border: 1px solid rgb(50,70,110); font-weight: bold;
			height: 40px;
			padding: 4px; background: url(imgs/btn_blau.png) repeat-x center center;
			border-radius: 6px; -moz-border-radius: 6px; color: #ffffff;
			-khtml-border-radius: 6px; -webkit-border-radius: 6px; cursor: pointer;
		}
		.loggerBox td input:hover {
			padding: 3px; background: url(imgs/btn_blau_2.png) repeat-x bottom center;
			border: 2px solid rgb(150,105,45); color: rgb(40,40,50);
			text-shadow: 0px 0px 5px #ffffff;
			-moz-text-shadow: 0px 0px 5px #ffffff;
			-khtml-text-shadow: 0px 0px 5px #ffffff;
			-webkit-text-shadow: 0px 0px 5px #ffffff;			
		}
		.loggerBox th {
			padding: 2px;
		}
		.loggerBox th input {
			border: 1px solid rgb(130,135,145);
			padding: 4px; background: url(imgs/inbox.png) no-repeat center center;
			width: 120px; border-radius: 6px; -moz-border-radius: 6px;
			-khtml-border-radius: 6px; -webkit-border-radius: 6px;
		}
		.selectiveEntry {
			margin-top: 5px;
			margin-bottom: 5px;
			padding: 4px;
			border-radius: 6px; -moz-border-radius: 6px;
			-khtml-border-radius: 6px; -webkit-border-radius: 6px;
		}
		.selectiveEntry table td {
			padding: 3px;
		}
		.selectiveEntry:hover {
			background: url(imgs/btn_blau_2.png) repeat-x center center;
		}
		.preview_box {
			border-radius: 6px; -moz-border-radius: 6px;
			-khtml-border-radius: 6px; -webkit-border-radius: 6px;
			color: #ffffff; text-shadow: 0px 0px 6px #000000;
			-moz-text-shadow: 0px 0px 6px #000000;
			-khtml-text-shadow: 0px 0px 6px #000000;
			-webkit-text-shadow: 0px 0px 6px #000000;
			padding: 20px; display: none; z-index: 9000;
			position: absolute; margin-top: 20px; margin-left: 50px;
			width: 856px; height: 85%; border: 2px solid rgb( 130, 155, 142 );
			background-color: rgba( 240, 255, 245, 0.8 );
			position: fixed;
		}
		.preview_box img {
			box-shadow: none; -moz-box-shadow: none;
			-khtml-box-shadow: none; -webkit-box-shadow: none;
		}
		.preview_box #abbild img {
			box-shadow: 0px 0px 8px rgb(120,120,120);
			-moz-box-shadow: 0px 0px 8px rgb(120,120,120);
			-khtml-box-shadow: 0px 0px 8px rgb(120,120,120);
			-webkit-box-shadow: 0px 0px 8px rgb(120,120,120);
			border: 5px solid rgb( 170, 210, 185 );
			border-radius: 6px; -moz-border-radius: 6px;
			-khtml-border-radius: 6px; -webkit-border-radius: 6px;
		}
		.preview_box input {
			background: url(imgs/menu/item.png) repeat-x top left;
			cursor: pointer; padding: 10px; color: #ffffff;
			border: 1px solid rgb( 130, 155, 142 ); text-align: center;
			border-radius: 6px; -moz-border-radius: 6px;
			-khtml-border-radius: 6px; -webkit-border-radius: 6px;
		}
		.preview_box input:hover {
			background: url(imgs/menu/item.png) repeat-x bottom left;
			text-decoration: none;
		}
		.default_button, .defbutton {
			border: 1px solid rgb(110,135,145); font-weight: bold;
			background: url(imgs/btn_paten.png) repeat-x center center;
			border-radius: 6px; -moz-border-radius: 6px; color: rgb(90,50,30);
			-khtml-border-radius: 6px; -webkit-border-radius: 6px; cursor: pointer;
			padding: 7px; text-shadow: 0px 0px 4px #fff;
			-moz-text-shadow: 0px 0px 4px #fff; -khtml-text-shadow: 0px 0px 4px #fff;
			-webkit-text-shadow: 0px 0px 4px #fff;
		}
		.default_button:hover, .defbutton:hover {
			border: 1px solid rgb(110,135,145); font-weight: bold;
			background: url(imgs/btn_paten.png) repeat-x center center;
			border-radius: 6px; -moz-border-radius: 6px; color: rgb(40,40,50);
			-khtml-border-radius: 6px; -webkit-border-radius: 6px; cursor: pointer;
			padding: 7px; text-shadow: 0px 0px 4px #fff;
			-moz-text-shadow: 0px 0px 4px #fff; -khtml-text-shadow: 0px 0px 4px #fff;
			-webkit-text-shadow: 0px 0px 4px #fff;
		}
		.default_button:active, .default_button:focus,
		.defbutton:active, .defbutton:focus {
			padding: 3px; background: url(imgs/btn_paten.png) repeat-x bottom center;
			border: 1px solid rgb(110,125,195); color: rgb(40,40,50); 
			text-shadow: 0px 0px 5px #ffffff; padding: 7px;
			 text-shadow: 0px 0px 4px #fff;
			-moz-text-shadow: 0px 0px 4px #fff; -khtml-text-shadow: 0px 0px 4px #fff;
			-webkit-text-shadow: 0px 0px 4px #fff;
		}
		.opmen td {
			padding: 9px;
		}
		.opmen td table {
			padding: 2px;
			cursor: pointer;
			border-radius: 6px;
			-o-border-radius: 6px;
			-moz-border-radius: 6px;
			-khtml-border-radius: 6px;
			-webkit-border-radius: 6px;
		}
		.opmen td table td, .opmen td table th {
			padding: 1px;
			font-family: 'Josefin Sans', sans-serif;
			font-size: 12px;
		}
		.opmen td table:hover {
			padding: 1px;
			border: 1px solid rgb(130,145,150);
			background-color: rgb(250,251,255);
		}
		.marker {
			padding: 3px;
			cursor: pointer;
			font-size: 12px;
			font-weight: normal;
			text-align: left;
			color: rgb(10,15,83);
		}
		.marker:hover, .marker:active {
			background-color: rgb(210,212,221);
			padding: 2px;
			border: 1px solid rgb(210,215,226);
		}
		/*input[type="text"], input[type="password"], textarea {
			border: 1px solid #000; padding: 6px; text-align: left;
			border-radius: 8px; -moz-border-radius: 8px;
			-khtml-border-radius: 8px; -webkit-border-radius: 8px;
			background-color: rgb(235,237,239);
		}
		input[type="text"]:focus, input[type="password"]:focus, textarea:focus {
			border: 2px solid rgb(240,180,0); padding: 5px; text-align: left;
			border-radius: 8px; -moz-border-radius: 8px;
			-khtml-border-radius: 8px; -webkit-border-radius: 8px;
			background-color: rgb(235,237,239);
		}*/
		.input_suchfeld, .input_suchfeld:focus {
			border: 1px solid #ffffff; padding: 2px; text-align: left;
			border-radius: 8px; -moz-border-radius: 8px;
			-khtml-border-radius: 8px; -webkit-border-radius: 8px;
			background-color: rgb(235,237,239); width: 200px;
		}
		.red_marked {
			border-radius: 15px;
			-moz-border-radius: 15px;
			-khtml-border-radius: 15px;
			-webkit-border-radius: 15px;
			background-color: rgb(140,20,10);
			color: #ffffff;
			text-align: center;
			padding: 10px;
		}
		.red_marked_large {
			border-radius: 25px;
			-moz-border-radius: 25px;
			-khtml-border-radius: 25px;
			-webkit-border-radius: 25px;
			background-color: rgb(140,20,10);
			color: #ffffff; font-size: 20px;
			text-align: center;
			padding: 6px;
		}
		.freepopup {
			border: 2px solid rgb(21,22,23);
			box-shadow: 0px 0px 3px rgba(0,0,0,0.25);
			-moz-box-shadow: 0px 0px 3px rgba(0,0,0,0.25);
			-khtml-box-shadow: 0px 0px 3px rgba(0,0,0,0.25);
			-webkit-box-shadow: 0px 0px 3px rgba(0,0,0,0.25);
			background-color: rgba(251,253,255,0.95);
			padding: 1px; z-index: 1000;
			/*max-height: 260px; overflow: auto;*/
			border-radius: 3px;
			-moz-transition:     all 0.25s ease;
			-webkit-transition:  all 0.25s ease;
			-ms-transition:      all 0.25s ease;
			-o-transition:       all 0.25s ease;
			transition:          all 0.25s ease;
		}
		.freepopup td {
			font-size: 14px; font-weight: normal;
			padding: 4px; cursor: pointer;
			padding-right: 34px; text-align: left;
		}
		.freepopup td:hover {
			background-color: rgba(240,180,0,0.75);
		}
		.freepopup th {
			font-weight: normal;
			font-size: 12px;
			text-decoration: italic;
			text-align: left;
			padding: 4px;
		}
		.preisfeld {
			/*border: 2px solid rgb(252,253,254);
			background-color: rgb(253,254,255);*/
			/*border-radius: 8px;
			-moz-border-radius: 8px;
			-khtml-border-radius: 8px;
			-webkit-border-radius: 8px;*/
			padding-top: 6px;
			padding-bottom: 6px;
			box-shadow: 0px 0px 4px rgba(0,0,0,0.08);
			border-top: 1px solid rgb(215,195,140);
			border-bottom: 1px solid rgb(215,195,140);
			background-color: rgb(255,250,245);
		}
		.preisfeld .preis {
			font-size: 50px;
			color: rgb(170,30,15);
			font-weight: bolder;
			text-shadow: 1px 4px 6px #ABC, 0 0 0 #FFF, 1px 2px 3px #EFCBCB;
		}
		.preisfeld input[type="text"] {
			width: 50px; text-align: right;
		}
		.noneef tr, .noneef td, .noneef th, .noneef tr:hover, .noneef td:hover, .noneef th:hover {
			padding: 0px;
			background:url();
			color: #000;
		}
		.titelo_negro {
			background-color: #000;
			color: #fff;
			padding: 10px;
			margin-bottom: 1px;
		}
	.tridi {
		margin: 10px;
		padding: 30px;
		border-radius: 30px;
		border: 1px solid rgb(90,80,32);
		background-color: rgb(115,115,75);
		color: #FFFFFF; cursor: pointer;
		font-family: 'Josefin Sans', sans-serif;
		font-size: 20px; font-weight: bolder;
	}
	.tridi_infobox {
		border: 1px solid rgb(160,170,190);
		position: absolute; padding: 6px;
		font-family: 'Josefin Sans', sans-serif;
		max-width: 240px; text-align: left;
		background-color: rgba(240,240,240,0.97);
		color: #000000; font-weight: normal;
		border-radius: 8px; font-size: 12px;
		box-shadow: 0px 4px 10px rgba(0,0,0,0.25);
		-o-box-shadow: 0px 4px 10px rgba(0,0,0,0.25);
		-ms-box-shadow: 0px 4px 10px rgba(0,0,0,0.25);
		-moz-box-shadow: 0px 4px 10px rgba(0,0,0,0.25);
		-khtml-box-shadow: 0px 4px 10px rgba(0,0,0,0.25);
		-webkit-box-shadow: 0px 4px 10px rgba(0,0,0,0.25);
	}
	.finderbox {
		border: none;
		box-shadow: 0px 4px 10px rgba(118,106,91,0.68);border-radius:6px;padding:5px;
		background: url(imgs/glass.png) no-repeat 2% center #ffffff;
		padding: 5px; line-height: 24px;
		width: 160px; font-size: 14px;
		margin-right: 40px; padding-left: 34px;
	}
	table td, table th {
		vertical-align: top;
	}
	.das_vollbild {
		background-color:rgba(230,230,230,0.80);
		position:fixed;
		top:0px;
		left:0px;
		width:100%;
		height:100%;
		cursor:pointer;
		z-index: 99999;
	}
	.hervorgehobenes_bild {
		border-radius: 12px;
		box-shadow: 0px 4px 10px rgba(0,0,0,0.28);
	}
		.homebtn {
			color: rgb( 137, 62, 158 );
			font-weight: bold;
			background-color:rgba(255,255,255,0.97);
		}
		.homebtn a:link, .homebtn a:visited {
			color: #766a5b;
		}
		.homebtn:hover {
			color: #ffffff;
			background-color: rgb( 137, 62, 158 );
		}
		.homebtn a:hover, .homebtn a:active,
		.homebtn:hover a:hover, .homebtn:hover a:active {
			color: #ffffff;
			background-color: rgb( 137, 62, 158 );
			text-decoration: none;
		}
		.slide_tab {
			padding: 5px;
			text-align: left;
			font-weight: bold;
			color: rgb( 137, 62, 158 );
			cursor: pointer;
			margin-bottom: 1px;
		}
		.slide_tab:active, .slide_tab:hover {
			padding: 5px;
			text-align: left;
			font-weight: bold;
			background-color: rgb( 137, 62, 158 );
			color: #ffffff;
			cursor: pointer;
			margin-bottom: 1px;
		}
		.slide_tab .content {
			margin-top: 6px;
			cursor: default;
			padding: 10px;
			text-align: left;
			font-weight: normal;
			color: rgb( 137, 62, 158 );
			background-color: #ffffff;
			border-top: 1px solid rgba(180,185,195,0.25);
			border-left: 1px solid rgba(180,185,195,0.25);
			display: none;
			line-height: 30px;
			max-height: 300px;
			overflow: auto;
		}
		.slide_tab .content a:link, .slide_tab .content a:visited {
			color: #766a5b;
			text-decoration: none;
		}
		.slide_tab .content a:hover, .slide_tab .content a:active {
			color: #766a5b;
			text-decoration: underline;
		}
		.slide_tab .content table td {
			padding: 8px;
			text-align: center;
			vertical-align: top;
		}
		.slide_tab .content table td small {
			text-align: center;
			font-size: 12px;
		}
	</style>
	<div id = "das_vollbild" style = "display:none;z-index:99999;" class = "das_vollbild" onclick = "javascript:$('#das_vollbild').fadeOut('fast');"></div>
	<script type = "text/javascript">

	  function dispGroup() {
	  	var i;
	  	for ( i = 1; i < arguments.length; i++ ) {
	  		if ( $("#" + arguments[i]).length > 0 ) {
	  			$("#" + arguments[i]).slideUp("fast");
	  			$("#" + arguments[i]).css("background-color", "");
	  			$("#" + arguments[i]).css("color", "");
	  		}
	  	}
	  	// *** //
	  	if ( $("#" + arguments[0]).length > 0 ) {
 			$("#" + arguments[i]).css("background-color", "#766a5b");
   			$("#" + arguments[i]).css("color", "#ffffff");
   			// *** //
	  		$("#" + arguments[0]).slideToggle("fast","swing",function(){
  				if ( $("#desktopMenu").height() >= $(window).height() - 140 ) {
					$("#desktopMenu").css("position","absolute");
					$("html, body").animate({ scrollTop: 0 }, "slow");
				} else {
					$("#desktopMenu").css("position","fixed");
  				}
	  		});
	  	}
	  }
	  function pageTop(){
	  	$("html, body").animate({ scrollTop: 0 }, "slow");
	  }
	  function closeMenus(){
	  	$('#desktopStaticMenu').css('display','none');//.slideDown('fast');
	  	$('#desktopDynamicMenu').css('display','none');//.slideDown('fast');
	  	$('#desktopLoginBox').css('display','none');
		$("#desktopMenu").css("position","fixed");
	  	// *** //
	  	$("#tab0").slideUp("fast");
	  	$("#tab1").slideUp("fast");
	  	$("#tab2").slideUp("fast");
	  	$("#tab3").slideUp("fast");
	  	$("#tab4").slideUp("fast");
	  	$("#tab5").slideUp("fast");
	  	$("#tab6").slideUp("fast");
	  	$("#tab7").slideUp("fast");
	  	$("#tab8").slideUp("fast");
	  	$("#tab9").slideUp("fast");
	  	$("#stab0").slideUp("fast");
	  	$("#stab1").slideUp("fast");
	  	$("#stab2").slideUp("fast");
	  	$("#stab3").slideUp("fast");
	  	$("#stab4").slideUp("fast");
	  	$("#stab5").slideUp("fast");
	  	$("#stab6").slideUp("fast");
	  	$("#stab7").slideUp("fast");
	  	$("#stab8").slideUp("fast");
	  	$("#stab9").slideUp("fast");
	  	// *** //
	  	$("#tab0").css('display','none');
	  	$("#tab1").css('display','none');
	  	$("#tab2").css('display','none');
	  	$("#tab3").css('display','none');
	  	$("#tab4").css('display','none');
	  	$("#tab5").css('display','none');
	  	$("#tab6").css('display','none');
	  	$("#tab7").css('display','none');
	  	$("#tab8").css('display','none');
	  	$("#tab9").css('display','none');
	  	// *** //
	  	$("#stab0").css('display','none');
	  	$("#stab1").css('display','none');
	  	$("#stab2").css('display','none');
	  	$("#stab3").css('display','none');
	  	$("#stab4").css('display','none');
	  	$("#stab5").css('display','none');
	  	$("#stab6").css('display','none');
	  	$("#stab7").css('display','none');
	  	$("#stab8").css('display','none');
	  	$("#stab9").css('display','none');
	  }
	  function toggleLoginBox(index){
		$("#loginbox"+index).fadeToggle("fold");
	  }
	  function loginOff() {
		$("#loginbox0").fadeOut("fold");
		$("#loginbox1").fadeOut("fold");
	  }
	  function enlargeImage(src) {
		$("#das_vollbild").fadeIn("fast");
		$("#das_vollbild").width($(window).width());
		$("#das_vollbild").height($(window).height());
		$("#das_vollbild").html( '<center><br /><img class = "hervorgehobenes_bild" border = "0" style = "max-width:90%;max-height:90%;" src = "' + 
		src + 
		'" /></center>' );
	  }
	  var touched_timer;
	  function touchdown() {
	  	touched_timer = setTimeout(function(){
	  		$('#mobileStaticMenu').slideUp('fast');
	  		$('#mobileDynamicMenu').slideUp('fast');
	  		}, 50 );
	  }
	  function touchstop() {
	  	clearTimeout(touched_timer);
	  }
	</script>

  </head>

  <body>
<div id = "desktopMenu" style = "display:none;position:fixed;margin-left:20px;margin-top:20px;z-index:99998;width:100%;">
	<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%"><tr>
		<td valign = "top">
			<table border = "0" cellspacing = "0" cellpadding = "0"><tr>
			<td valign = "top">
			<img border = "0" src = "imgs/theme/allinmenu.png" 
			     style = "cursor:pointer;box-shadow: 0px 4px 8px rgba(118,106,91,0.68);border-radius:6px;padding:5px;background-color:rgba(255,255,255,0.97);" onmouseover = "javascript:$('#desktopStaticMenu').slideDown('fast');$('#desktopDynamicMenu').slideDown('fast');$('#desktopLoginBox').css('display','none');" />
			</td><td valign = "top">
				<a href = "index.php?page=home">
				<div id = "desktopStaticMenu" class = "homebtn" style = "display:none;margin-left:10px;padding:10px;border-radius:6px;box-shadow: 0px 4px 10px rgba(118,106,91,0.68);line-height:20px;">
					Admin <br />
				</div>
				</a>
			</td><td valign = "top">
				<div id = "desktopLoginBox" style = "display:none;margin-left:10px;padding:10px;background-color:rgba(255,255,255,0.97);;border-radius:6px;box-shadow: 0px 4px 10px rgba(118,106,91,0.68);line-height:20px;">
				<form action = "login.php" method = "post">
						Benutzer:<br />
						<input type = "text" name = "user" /><br />
						Kennwort:<br />
						<input type = "password" name = "pass" /><br />
						<input type = "submit" value = "Anmelden" />
				</form>
				</div>
			</td></tr></table>
		</td><td valign = "top" width = "100%" align = "right" onclick = "javascript:closeMenus();">
		  <div style = "text-align:right;padding-right:40px;">
		    <img border = "0" src = "imgs/help_browser.png" style = "height:24px;cursor:pointer;" onclick = "javascript:window.open('allinhelp.html','_blank');">&nbsp;&nbsp;&nbsp;
			<a href = "logout.php">Abmelden</a>
		  </div>
		</td>
	</tr><tr>
		<td valign = "top">
			<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%"><tr>
			<td valign = "top" style = "vertical-align:top;width:260px;">
			<div id = "desktopDynamicMenu" style = "display:none;width:236px;margin-top:10px;padding:10px;background-color:rgba(255,255,255,0.97);;border-radius:6px;box-shadow: 0px 4px 10px rgba(118,106,91,0.68);height:170px;overflow:auto;">
			<div style = "line-height:30px;">

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?page=modf&lang=de';">
					Kennwort
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?page=meta&lang=de';">
					Meta
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?page=upld&lang=de';">
					Hochladen
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=hpag&page=sedi&lang=de';">
					Home
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=impr&page=sedi&lang=de';">
					Impressum
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=cont&page=sedi&lang=de';">
					Kontakt
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=agb&page=sedi&lang=de';">
					AGB
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=disc&page=sedi&lang=de';">
					Haftungsausschluss
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=dschutz&page=sedi&lang=de';">
					Datenschutz
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=page_2&page=sedi&lang=de';">
					Urbanes Verkehrsmanagement
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=page_3&page=sedi&lang=de';">
					Interurbanes Verkehrsmanagement
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=page_4&page=sedi&lang=de';">
					Parken
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=page_5&page=sedi&lang=de';">
					&Ouml;ffentlicher Nahverkehr
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=page_14&page=sedi&lang=de';">
					Detektion & Verkehrs&uuml;berwachung
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=page_6&page=sedi&lang=de';">
					Glasperlen
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=page_7&page=sedi&lang=de';">
					Flüssige & Mehrkomponentige Farben
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=page_8&page=sedi&lang=de';">
					Vorgeformte Markierungen
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=page_9&page=sedi&lang=de';">
					Thermoplastik
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=page_10&page=sedi&lang=de';">
					Beschilderung
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?edit=page_15&page=sedi&lang=de';">
					Stromnetz
				</div>

				<div class = "slide_tab" 
				     onclick = "javascript:location.href='index.php?page=docs&lang=de';">
					Mehr&nbsp;Inhalte
				</div>

			</div>
			</div>
			</td><td onmouseout = "javascript:closeMenus();">&nbsp;</td>
			</tr></table>
		</td><td onmouseout = "javascript:closeMenus();">&nbsp;</td>
	</tr>
	</table>
</div>


    <center>
        <div class = "innerbody" onmouseover = "javascript:wepi_menu_popup_hide('meinMenu','');" onclick = "javascript:closeMenus();">
			<div class = "preview_box" id = "preview_box">
				<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%" height = "100%">
					<tr>
						<td valign = "top" colspan = "3">
							<div align = "right">
								<input type = "button" class = "link_button" value = "Schlie&szlig;en" 
									   onclick = "javascript: $_css('preview_box').display = 'none';" />
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<img border = "0" src = "imgs/aleft.png" style = "cursor: pointer;" title = "Zur&uuml;ck" 
								 onclick = "javascript: bild_zuruck();" />
						</td>
						<td valign = "top" width = "80%">
							<div id = "abbild"></div>
						</td>
						<td align = "right">
							<div align = "right">
							<img border = "0" src = "imgs/aright.png" style = "cursor: pointer;" title = "Weiter" 
								 onclick = "javascript: bild_weiter();" />
							</div>
						</td>
					</tr>
				</table>
			</div>

<div id = "bannerarea" style = "display:block;">
<?php
	$activateHomeBanner = false;

	$query=mysql_query("SELECT * FROM aj_daten WHERE kennung = 'ani_ban1' ORDER BY id");

	if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

	$bile = array();

	while ( $datensatz = mysql_fetch_array($query) ) {

		$bild = $datensatz['wert'];

		if ( file_exists( $bild ) ) { $bile[$datensatz['eintrag']] = $bild; }

	}

	if (

		( $bile["1"] != "" ) || ( $bile["2"] != "" ) || ( $bile["3"] != "" ) ||

		( $bile["4"] != "" ) || ( $bile["5"] != "" ) || ( $bile["6"] != "" )

	) {

		$activateHomeBanner = true;

	}
	if ( $activateHomeBanner == true ) {
		if ( $page != "" && $page != "home" ) {
			$activateHomeBanner = false;
		}
	}
?>



<?php if ( $activateHomeBanner == true ) { ?>
	<div style = "padding-top:200px;padding-bottom:60px;background: url(imgs/bkg/bkg.png) fixed;">
	<script type = "text/javascript" src = "js/jssor.slider.min.js"></script>
		<?php include "api/wepi_jssor.php"; ?>
		<script type = "text/javascript">
		wepi_jssor_slider(
			{
				id: "meinSlider",
				style: "jssor_style_5_3",
				maxwidth: "1000px",
				maxheight: "520px",
				duration: 2500
			}
<?php

	$query=mysql_query("SELECT * FROM aj_daten WHERE kennung = 'ani_ban1' ORDER BY id");

	if(!$query) die("Fehler bei der Abfrage: ".mysql_error()); $zes = 0;

	while ( $datensatz = mysql_fetch_array($query) ) {

		$bild = $datensatz['wert'];

		if ( file_exists( $bild ) && substr_count($bild,".jpg") ) { 
			echo ',{ image: "' . str_replace( "./", "", $bild ) . '" }'."\n";
			$zes++;

		}

	}

?>
		);
		</script>
		</div>
<?php } else {
	if ( $_SESSION['logged'] == 1 ) {
	echo "<br /><br /><br /><br /><br /><br />";
	}
} ?>
</div>

			<div style = "width:100%;margin:0 auto;clear: both;">
            <div style = "padding:10px;clear: both;">
				<div class = "we_cont" id = "thecont" style = "display:block;min-height: 700px;margin:0;padding:0;max-width:100%;overflow-x:auto;"
				onmouseover = "javascript:wepi_menu_popup_hide('meinMenu','');" onmousedown = "javascript:loginOff();">

					<?php
						include "content.php";
					?>

				</div>
            </div>
            </div>

        </div>

</center>

</div>

  </body>
</html>

	<script type = "text/javascript">
    function ontoBodyAutoResz () {
    	if ( $(window).width() <= 400 ) {
    		$("#mobileMenu").fadeIn("slow");
    		$("#desktopMenu").fadeOut("fast");
    	} else {
    		$("#mobileMenu").fadeOut("fast");
    		$("#desktopMenu").fadeIn("slow");
    	}
    	// *** //
    	/*if ( $(window).width() <= 800 ) {
    		$("#desktopview").css("display","none");
    		$("#mobileview").css("display","block");
    	} else {
    		$("#desktopview").css("display","block");
    		$("#mobileview").css("display","none");
    	}*/
    	// *** //
    	if ( $(window).width() <= 1000 ) {
    		$("#desktopview2").css("display","none");
    		$("#mobileview2").css("display","block");
    		// *** //
    		$("#desktopview").css("display","none");
    		$("#mobileview").css("display","block");
    		// *** //
    		$("#disclaimer_desktop").css("display","none");
    		$("#disclaimer_mobile").css("display","block");
    		// *** //
    		if ( $(window).width() > 340 ) {
    		  $("#centera").css("padding-right","0px");
    		  $("#centera").css("padding-left",(($(window).width()-300)/2)+"px");
    		  $("#centera").width( "300px" );
    		}
    	} else {
    		$("#desktopview2").css("display","block");
    		$("#mobileview2").css("display","none");
    		// *** //
    		$("#desktopview").css("display","block");
    		$("#mobileview").css("display","none");
    		// *** //
    		$("#disclaimer_desktop").css("display","block");
    		$("#disclaimer_mobile").css("display","none");
    		// *** //
    		$("#centera").width( "100%" );
    		$("#centera").css("padding-right","20px");
    		$("#centera").css("padding-left","20px");
    	}
    	// *** //
    	var pager = "<?php echo $page;?>";
    	if ( pager == "conn" ) {
    	var mir = ($(window).width() / 100) * 15;
		var max = $(window).width() - mir;
		if ( max > 1000 ) { max = 1000; }
		/*
		$('#thecont #insideconn img').each(function() {
		    //if ($(this).width() > max) {
		        $(this).width(max);
		    //}
		});
		*/
		$('#thecont img').each(function() {
		    if (! $(this).attr("id")) {
		        $(this).width(max);
		        $(this).css('height','auto');
		    }
		});
		}
    	// *** //
    	$("#mobileFooter").width( $(window).width() );
    	$("#subsi").width( $(window).width() );
    	$("#hafiw").width( $(window).width() );
    	// *** //
    	if ( $(window).width() <= $("#desktopFooter").width() ) {
    		$("#desktopFooter").css("display","none");
    		$("#mobileFooter").css("display","block");
    	} else {
    		$("#mobileFooter").css("display","none");
    		$("#desktopFooter").css("display","block");
    	}
    }
    $(window).bind("load", ontoBodyAutoResz);
    $(window).bind("resize", ontoBodyAutoResz);
    $(window).bind("orientationchange", ontoBodyAutoResz);
    /*
    function touchmouse() {
    	touchdown();
    }
    $(window).bind("scroll", touchdown);
    $("#stab0").on("scroll", touchstop);
    $("#stab1").on("scroll", touchstop);
    $("#stab2").on("scroll", touchstop);
    $("#stab3").on("scroll", touchstop);
    $("#stab4").on("scroll", touchstop);
    $("#stab5").on("scroll", touchstop);
    $("#stab6").on("scroll", touchstop);*/
	</script>
	<script type = "text/javascript">
 		$("body").bind( 'scroll', function(e){
			if ( $("#mobileDynamicMenu slide_tab:hover").length != 0 ) {
				$('#mobileStaticMenu').slideUp('fast');$('#mobileDynamicMenu').slideUp('fast');
			}
		});
		// *** //
 		$("body").bind( 'touchmove', function(e){
			if ( $("#mobileDynamicMenu slide_tab:hover").length != 0 ) {
				$('#mobileStaticMenu').slideUp('fast');$('#mobileDynamicMenu').slideUp('fast');
			}
		});
	</script>
