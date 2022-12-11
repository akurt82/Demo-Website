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

<?php $_SESSION['tinyMCEGeneratedCode'] = "";
	  include "wepi_dyn_public.php";
 ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
<script type = "text/javascript" src = "api/wepi_core.js"></script>
<script type = "text/javascript" src = "api/wepi_serv.js"></script>
<script type = "text/javascript"> var svr = new wepiServ(); svr.sessionID = "<?php echo session_id(); ?>"; </script>
<style type = "text/css">
	.slide_tab th {
		border: 1px solid rgb( 150, 150, 150 );
		background-color: rgb( 245, 245, 245 );
		cursor: pointer;
		border-radius: 6px;
		-moz-border-radius: 6px;
		-webkit-border-radius: 6px;
		-khtml-border-radius: 6px;
		margin-top: 2px;
	}
	.slide_tab th div {
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
	table td {
		border-right: 1px solid #ffffff;
		border-bottom: 1px solid #ffffff;
		padding: 3px;
		cursor: pointer;
	}
</style>
</head><body>

	<script type = "text/javascript">
		function set_color( where ) {
			document.getElementById('prev').style.borderBottom = "1px solid " + where;
			svr.Sess("tinymce_plugin_src",where);
		}
		function set_format( where ) {
			document.getElementById('prev').style.fontWeight = where;
			svr.Sess("tinymce_plugin_id",where);
		}
		function set_align( where ) {
			document.getElementById('prev').style.textAlign = where;
			svr.Sess("tinymce_plugin_text",where);
		}

		svr.Sess("tinymce_plugin_src","rgb(0,0,0)");
		svr.Sess("tinymce_plugin_id","font-weight:bold;");
		svr.Sess("tinymce_plugin_text","text-align:left;");
	</script>

	<div style = "height:280px;overflow:auto;" class = "slide_tab">

		Vorschau<br />
		<div id = "prev" style = "border-bottom: 1px solid rgb(0,0,0);font-weight:bold;">Titelbereich</div>
		<br /><br />

		Farbe des Unterstrichs?<br />
		<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%">
			<tr>
				<td onclick = "javascript:set_color('rgb(0,0,0)');" style = "background-color:rgb(0,0,0);">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 102, 102, 102 )');" style = "background-color:rgb( 102, 102, 102 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 153, 153, 153 )');" style = "background-color:rgb( 153, 153, 153 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 187, 187, 187 )');" style = "background-color:rgb( 187, 187, 187 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 204, 204, 204 )');" style = "background-color:rgb( 204, 204, 204 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 222, 222, 222 )');" style = "background-color:rgb( 222, 222, 222 );">&nbsp;</td>
			</tr>
			<tr>
				<td onclick = "javascript:set_color('rgb( 0, 0, 204 )');" style = "background-color:rgb( 0, 0, 204 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 0, 0, 255 )');" style = "background-color:rgb( 0, 0, 255 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 86, 166, 255 )');" style = "background-color:rgb( 86, 166, 255 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 86, 180, 212 )');" style = "background-color:rgb( 86, 180, 212 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 0, 204, 51 )');" style = "background-color:rgb( 0, 204, 51 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 0, 204, 204 )');" style = "background-color:rgb( 0, 204, 204 );">&nbsp;</td>
			</tr>
			<tr>
				<td onclick = "javascript:set_color('rgb( 153, 0, 0 )');" style = "background-color:rgb( 153, 0, 0 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 204, 0, 0 )');" style = "background-color:rgb( 204, 0, 0 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 238, 117, 48 )');" style = "background-color:rgb( 238, 117, 48 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 153, 0, 204 )');" style = "background-color:rgb( 153, 0, 204 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 153, 0, 255 )');" style = "background-color:rgb( 153, 0, 255 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 137, 95, 158 )');" style = "background-color:rgb( 137, 95, 158 );">&nbsp;</td>
			</tr>
			<tr>
				<td onclick = "javascript:set_color('rgb( 137, 62, 158 )');" style = "background-color:rgb( 137, 62, 158 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 98, 62, 158 )');" style = "background-color:rgb( 98, 62, 158 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 175, 117, 48 )');" style = "background-color:rgb( 175, 117, 48 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 184, 149, 219 )');" style = "background-color:rgb( 184, 149, 219 );">&nbsp;</td>
				<td onclick = "javascript:set_color('rgb( 170, 107, 60 )');" style = "background-color:rgb( 170, 107, 60 );">&nbsp;</td>
				<td onclick = "javascript:set_color(rgb( 170, 148, 84 ));" style = "background-color:rgb( 170, 148, 84 );">&nbsp;</td>
			</tr>
		</table>

		<br />
		Schriftdarstellung:<br />
		<input name = "aa" type = "radio" onchange = "javascript:set_format('bold');"
		        onclick = "javascript:set_format('bold');" checked /> Fett<br />
		<input name = "aa" type = "radio" onchange = "javascript:set_format('normal');"
		        onclick = "javascript:set_format('normal');" /> Normal<br />

		<br />
		Ausrichtung:<br />
		<input name = "bb" type = "radio" onchange = "javascript:set_align('left');"
		        onclick = "javascript:set_align('left');" checked /> Linksb&uuml;ndig<br />
		<input name = "bb" type = "radio" onchange = "javascript:set_align('center');"
		        onclick = "javascript:set_align('center');" /> Mittig<br />
		<input name = "bb" type = "radio" onchange = "javascript:set_align('right');"
		        onclick = "javascript:set_align('right');" /> Rechtsb&uuml;ndig<br />

	</div>

</body>
</html>
