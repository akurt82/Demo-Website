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
</style>
</head><body>

	<script type = "text/javascript">
		function setto_tinymce_plugin_src( where, text, idnr ) {
			svr.Sess("tinymce_plugin_src",where);
			svr.Sess("tinymce_plugin_text",text);
			svr.Sess("tinymce_plugin_id",idnr);
		}
	</script>

	<div style = "height:280px;overflow:auto;" class = "slide_tab">
	<table border = "0" cellspacing = "0" cellpadding = "0" align = "center" width = "100%">
		<tr>
			<?php
				$bkgc = "rgb(250,250,250)";
				$query=mysql_query("SELECT * FROM aj_content ORDER BY contype, id");
				if(!$query) die("Fehler bei der Abfrage: ".mysql_error());$fond=0;
				while ( $datensatz = mysql_fetch_array($query) ) {
					$fond++;
					// *** //
					$txt = $datensatz["titel"];
					$tx1 = $datensatz["title_de"];
					$tx2 = $datensatz["title_en"];
					// *** //
					echo '
					<td valign = "top" style = "background-color:'.$bkgc.';">
						<input type = "radio" name = "pagelink" style = "width:20px;" onclick = "javascript:setto_tinymce_plugin_src(\'D\',\''.$tx1.'\','.$datensatz['id'].');" />
					</td><td valign = "top" width = "100%" style = "background-color:'.$bkgc.';">
						(de) '.geschnitten_($datensatz['title_de'],38,true).'
					</td>
					</tr><tr>
					';
					// *** //
					echo '
					<td valign = "top" style = "background-color:'.$bkgc.'; border-bottom: 1px solid rgb(140,140,140);">
						<input type = "radio" name = "pagelink" style = "width:20px;" onclick = "javascript:setto_tinymce_plugin_src(\'D\',\''.$tx2.'\','.$datensatz['id'].');" />
					</td><td valign = "top" width = "100%" style = "background-color:'.$bkgc.'; border-bottom: 1px solid rgb(140,140,140);">
						(en) '.geschnitten_($datensatz['title_en'],38,true).'
					</td>
					</tr><tr>
					';
				}
				if ( $fond == 0 ) { echo '</tr><tr>'; }
			?>
		</tr>
		<td colspan = "2">&nbsp;</td>
		</tr>
	</table>
	</div>

</body>
</html>
