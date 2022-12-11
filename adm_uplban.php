
<?php if ( $_SESSION['logged'] > 0 ) { ?>

<style type = "text/css">
	.selectionArea {
		background: url('imgs/btn_paten.png') repeat-x center center;
		line-height: 32px;
		border-top: 1px solid rgb( 200, 200, 200 );
		border-left: 1px solid rgb( 200, 200, 200 );
		border-right: 1px solid rgb( 150, 150, 150 );
		border-bottom: 1px solid rgb( 150, 150, 150 );
		margin-bottom: 1px;
	}
	.selectionArea th {
		text-align: right;
		padding: 4px;
	}
	.selectionArea td {
		text-align: left;
		padding-left: 4px;
		padding-top: 12px;
	}
	.admMenuItem {
		border: 1px solid #ffffff;
		cursor: pointer;
		margin: 2px;
		width : 98%;
		height: 28px;
	}
	.admMenuItem:hover {
		border: 1px solid rgb(200,200,200);
		border-radius: 4px; -moz-border-radius: 4px;
		-webkit-border-radius: 4px; -khtml-border-radius: 4px;
		background: url('imgs/btn_orange.png') repeat-x center center;
	}
	.admMenuItem td, .admMenuItem th {
		font-family: Arial, Helvetica;
		font-size: 12px;
		font-weight: normal;
		background: url('');
		border: none;
		text-align: left;
		cursor: pointer;
		line-height: 24px;
		vertical-align: middle;
	}
	.admMenuItem td img, .admMenuItem th img {
		padding-top: 6px;
	}
</style>

	<div class = "titleOfDoc">
		Banner-Bilder Hochladen
	</div>

<center>

		<script type = "text/javascript">

			function iframeSz(obj) {
				obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';			
			}

		</script>

	<div style = "padding-top: 0px; padding-bottom: 1px; padding-left:1px; padding-right: 1px; z-index:0;" onclick = "javascript:SetDisp('wechsler',false);">

	<br /><br />
	<div style = "width:500px;">

			<b>Hinweis</b><br /><br />
			Bilder die gr&ouml;&szlig;er als 1MB sind werden nicht akzepiert. Bitte passen Sie die Bilder entsprechend an, damit diese hochgeladen 
			werden k&ouml;nnen. Unterst&uuml;tzt werden JPEG und PNG-Bilder.<br /><br />

	</div>
	
	<?php
	// Erster Zielverzeichnis wird ermittelt //
	$_SESSION['first_dir'] = "bilder";
	// zweiter Zielverzeichnis wird ermittelt //
	$_SESSION['second_dir'] = "bilder2";
	// Modul wird geladen //
	echo '<iframe onmouseover = "javascript:SetDisp(\'wechsler\',false);" src = "uploadmplf2.php?'.session_id().'&allimages=1&lang='.$lang.'&fdir=bilder&sdir=bilder2" style = "width:996px; height: 600px; border: none;" id = "uplif" name = "uplif" frameborder="0" scrolling="no" onload = "javascript:iframeSz(this);"></iframe>';
?>
	</div>

	<br /><br />

</center>

<?php } else { echo "Access denied."; } ?>