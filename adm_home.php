
<?php

 if ( $_SESSION['modus'] == 1 ) {

?>

	<style type = "text/css">
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
	</style>

	<div style = "padding-left:18%; padding-right:18%;">

		<script type = "text/javascript">
			wepi_tabs(
				{
					id: "meineTabs",
					css: "meineTabs",
					expand: "multiple",
					iconsize: { maxwidth: 64, maxheight: 64 }
				},
				{
					topic: "Einstellungen"
				},
				{
					item: [
					{ text: "Kennwort", 
					  url: "javascript:location.href='index.php?page=modf&lang=de';", 
					  info: "Ändere den Administrator-Kennnwort", icon: "imgs/member.png" },
					{ text: "Meta", 
					  url: "javascript:location.href='index.php?page=meta&lang=de';", 
					  info: "Metadaten sind Suchbegriffe, die mit dem Inhalt der Webseite zu tun haben. Sie dienen dazu, Suchmaschinen wie Google, Bing und Yahoo Ihre Webseite zu beschreiben.", icon: "imgs/document.png" },
					{ text: "Hochladen", 
					  url: "javascript:location.href='index.php?page=upld&lang=de';", 
					  info: "Laden Sie Bilder auf den Server um diese anschlie&szlig;end in den Inhalten nutzen zu k&ouml;nnen", icon: "imgs/fold.png" }
					]
				},
				{
					topic: "Inhalte"
				},
				{
					item: [
					{ text: "Home", 
					  url: "javascript:location.href='index.php?edit=hpag&lang=de&page=sedi';", 
					  info: "Bearbeiten Sie die Startseite", icon: "imgs/document.png" },
					{ text: "Impressum", 
					  url: "javascript:location.href='index.php?edit=impr&lang=de&page=sedi';", 
					  info: "Bearbeiten Sie die Impressums-Seite", icon: "imgs/document.png" },
					{ text: "Kontakt", 
					  url: "javascript:location.href='index.php?edit=cont&lang=de&page=sedi';", 
					  info: "Bearbeiten Sie die Kontakt-Seite", icon: "imgs/document.png" },
					{ text: "AGB", 
					  url: "javascript:location.href='index.php?edit=agb&lang=de&page=sedi';", 
					  info: "Bearbeiten Sie die AGB-Seite", icon: "imgs/document.png" },
					{ text: "Datenschutz", 
					  url: "javascript:location.href='index.php?edit=dschutz&lang=de&page=sedi';", 
					  info: "Bearbeiten Sie die Datenschutz-Seite", icon: "imgs/document.png" },
					{ text: "Haftungsausschluss", 
					  url: "javascript:location.href='index.php?edit=disc&lang=de&page=sedi';", 
					  info: "Bearbeiten Sie die Disclaimer-Seite", icon: "imgs/document.png" },

					{ text: "Urbanes Verkehrsmanagement", 
					  url: "javascript:location.href='index.php?edit=page_2&lang=de&page=sedi';", 
					  info: "", icon: "imgs/document.png" },
					{ text: "Interurbanes Verkehrsmanagement", 
					  url: "javascript:location.href='index.php?edit=page_3&lang=de&page=sedi';", 
					  info: "", icon: "imgs/document.png" },
					{ text: "Parken", 
					  url: "javascript:location.href='index.php?edit=page_4&lang=de&page=sedi';", 
					  info: "", icon: "imgs/document.png" },
					{ text: "&Ouml;ffentlicher Nahverkehr", 
					  url: "javascript:location.href='index.php?edit=page_5&lang=de&page=sedi';", 
					  info: "", icon: "imgs/document.png" },
					{ text: "Detektion & Verkehrs&uuml;berwachung", 
					  url: "javascript:location.href='index.php?edit=page_14&lang=de&page=sedi';", 
					  info: "", icon: "imgs/document.png" },
					{ text: "Glasperlen", 
					  url: "javascript:location.href='index.php?edit=page_6&lang=de&page=sedi';", 
					  info: "", icon: "imgs/document.png" },
					{ text: "Fl&uuml;ssige & Mehrkomponentige Farben", 
					  url: "javascript:location.href='index.php?edit=page_7&lang=de&page=sedi';", 
					  info: "", icon: "imgs/document.png" },
					{ text: "Vorgeformte Markierungen", 
					  url: "javascript:location.href='index.php?edit=page_8&lang=de&page=sedi';", 
					  info: "", icon: "imgs/document.png" },
					{ text: "Thermoplastik", 
					  url: "javascript:location.href='index.php?edit=page_9&lang=de&page=sedi';", 
					  info: "", icon: "imgs/document.png" },
					{ text: "Beschilderung", 
					  url: "javascript:location.href='index.php?edit=page_10&lang=de&page=sedi';", 
					  info: "", icon: "imgs/document.png" },
					{ text: "Stromnetz", 
					  url: "javascript:location.href='index.php?edit=page_15&lang=de&page=sedi';", 
					  info: "", icon: "imgs/document.png" },

					{ text: "Mehr&nbsp;Inhalte", 
					  url: "javascript:location.href='index.php?page=docs&lang=de';", 
					  info: "Erstellen und bearbeiten Sie weitere Inhalte", icon: "imgs/fold.png" }
					]
				}
			);
		</script>

	</div>

<div style = "clear:both;">

</div>

<?php

	} else {
	
		echo "Sie m&uuml;ssen sich anmelden, um diese Seite aufrufen zu k&ouml;nnen.";
	
	}

?>
