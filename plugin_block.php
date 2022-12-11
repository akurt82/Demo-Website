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

<?php $_SESSION['tinyMCEGeneratedCode'] = ""; ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
<script type = "text/javascript" src = "api/wepi_core.js"></script>
<script type = "text/javascript" src = "api/wepi_serv.js"></script>
<script type = "text/javascript"> var svr = new wepiServ(); svr.sessionID = "<?php echo session_id(); ?>"; </script>
<style type = "text/css">
	.slide_tab_header {
		border: 1px solid rgb( 150, 150, 150 );
		background-color: rgb( 245, 245, 245 );
		cursor: pointer;
		border-radius: 6px;
		-moz-border-radius: 6px;
		-webkit-border-radius: 6px;
		-khtml-border-radius: 6px;
		margin-top: 2px;
	}
	.slide_tab_header div {
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
	.slide_tab_content {
		margin-left: 5px;
		margin-right: 5px;
		margin-bottom: 5px;
		background-color: #FFFFFF;
	}
	.slide_tab_content div {
		padding: 5px;
		font-family: Arial, Helvetica;
		font-size: 12px;
	}
	.slide_tab_content div table td {
		padding: 5px;
		font-family: Arial, Helvetica;
		font-size: 12px;
		font-weight: normal;
	}
	.slide_tab_content div table th {
		padding: 5px;
		width: 200px;
		font-family: Arial, Helvetica;
		font-size: 12px;
		font-weight: bold;
		text-align: left;
	}
	.none_aff, .none_aff td, .none_aff th {
		border: none;
		padding: 0px;
	}
	.radim {
		border: 1px solid #ffffff;
		padding: 1px;
	}
	.radim:hover {
		background-color:rgb(130,0,0);
		color:#ffffff;
	}
</style>
</head><body>

<?php
$_SESSION['tinymce_plugin_margin_top'] = 0;
$_SESSION['tinymce_plugin_margin_bot'] = 0;
$_SESSION['tinymce_plugin_margin_lft'] = 0;
$_SESSION['tinymce_plugin_margin_rght'] = 0;
$_SESSION['tinymce_plugin_padding_top'] = 0;
$_SESSION['tinymce_plugin_padding_bot'] = 0;
$_SESSION['tinymce_plugin_padding_lft'] = 0;
$_SESSION['tinymce_plugin_padding_rgt'] = 0;
?>

	<script type = "text/javascript">
		function show_spec_margin(){
			if ( $_css("mar_top").display == "none" ) {
				SetDisp( "mar_top", true );
				SetDisp( "mar_bot", true );
				SetDisp( "mar_lft", true );
				SetDisp( "mar_rgt", true );
				// *** //
				$_id("allmar").src = "imgs/plugins/block/minus.png";
			} else if ( $_css("mar_top").display == "block" ) {
				SetDisp( "mar_top", false );
				SetDisp( "mar_bot", false );
				SetDisp( "mar_lft", false );
				SetDisp( "mar_rgt", false );
				// *** //
				$_id("allmar").src = "imgs/plugins/block/plus.png";
			}
		}
		// *** //
		function show_spec_padding(){
			if ( $_css("pad_top").display == "none" ) {
				SetDisp( "pad_top", true );
				SetDisp( "pad_bot", true );
				SetDisp( "pad_lft", true );
				SetDisp( "pad_rgt", true );
				// *** //
				$_id("allpad").src = "imgs/plugins/block/minus.png";
			} else if ( $_css("pad_top").display == "block" ) {
				SetDisp( "pad_top", false );
				SetDisp( "pad_bot", false );
				SetDisp( "pad_lft", false );
				SetDisp( "pad_rgt", false );
				// *** //
				$_id("allpad").src = "imgs/plugins/block/plus.png";
			}
		}
	</script>

	<table border = "0" cellspacing = "0" cellpadding = "0" align = "center">
		<tr>
			<td align = "left">
				<?php echo $_SESSION['plugin.block.margin']; ?>:
				<input type = "number" style = "width:50px;" value = "0" onchange = "javascript:
				$_id('ml').value = this.value; $_id('mr').value = this.value; $_id('mt').value = this.value; $_id('mb').value = this.value;
				svr.Sess('tinymce_plugin_margin_top',this.value);
				svr.Sess('tinymce_plugin_margin_bot',this.value);
				svr.Sess('tinymce_plugin_margin_lft',this.value);
				svr.Sess('tinymce_plugin_margin_rgt',this.value);
				" />
			</td>
			<td align = "center">
				<div id = "mar_top" style = "display:none;">
				<?php echo $_SESSION['plugin.block.margin.top']; ?>:
				<input type = "number" id = "mt" style = "width:50px;" value = "0" onchange = "javascript:svr.Sess('tinymce_plugin_margin_top',this.value);" />
				</div>
			</td>
			<td>
				<div align = "right">
					<a href = "javascript:show_spec_margin();"><img border = "0" src = "imgs/plugins/block/plus.png" id = "allmar" /></a>
				</div>
			</td>
		</tr>
		<tr>
			<td align = "center">
				<div id = "mar_lft" style = "display:none;">
				<?php echo $_SESSION['plugin.block.margin.lft']; ?>:<br />
				<input type = "number" id = "ml" style = "width:50px;" value = "0" onchange = "javascript:svr.Sess('tinymce_plugin_margin_lft',this.value);" />
				</div>
			</td>
			<td valign = "top">
				<div style = "background:url('imgs/plugins/block/block.png') no-repeat center center; width: 256px; height: 256px;padding:20px;">
						<table border = "0" cellspacing = "0" cellpadding = "0" align = "center" width = "100%" height = "100%">
							<tr>
								<td colspan ="3" align = "center">
									<div id = "pad_top" style = "display:none;">
									<?php echo $_SESSION['plugin.block.padding.top']; ?>:
									<input type = "number" id = "pt" style = "width:50px;" value = "0" onchange = "javascript:svr.Sess('tinymce_plugin_padding_top',this.value);" />
									</div>
								</td>
							</tr>
							<tr>
								<td align = "center" style = "padding-left:20px;">
									<div id = "pad_lft" style = "display:none;">
									<?php echo $_SESSION['plugin.block.padding.lft']; ?>:<br />
									<input type = "number" id = "pl" style = "width:50px;" value = "0" onchange = "javascript:svr.Sess('tinymce_plugin_padding_lft',this.value);" />
									</div>
								</td>
								<td width = "100%">&nbsp;</td>
								<td align = "center" style = "padding-right:20px;">
									<div id = "pad_rgt" style = "display:none;">
									<?php echo $_SESSION['plugin.block.padding.rgt']; ?>:<br />
									<input type = "number" id = "pr" style = "width:50px;" value = "0" onchange = "javascript:svr.Sess('tinymce_plugin_padding_rgt',this.value);" />
									</div>
								</td>
								</tr>
							<tr>
								<td colspan = "3" align = "center">
									<div id = "pad_bot" style = "display:none;">
									<?php echo $_SESSION['plugin.block.padding.bot']; ?>:
									<input type = "number" id = "pb" style = "width:50px;" value = "0" onchange = "javascript:svr.Sess('tinymce_plugin_padding_bot',this.value);" />
									</div>
								</td>
							</tr>
						</table>
				</div>
			</td>
			<td align = "center">
				<div id = "mar_rgt" style = "display:none;">
				<?php echo $_SESSION['plugin.block.margin.rgt']; ?>:<br />
				<input type = "number" id = "mr" style = "width:50px;" value = "0" onchange = "javascript:svr.Sess('tinymce_plugin_margin_rgt',this.value);" />
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div align = "left">
					<a href = "javascript:show_spec_padding();"><img border = "0" src = "imgs/plugins/block/plus.png" id = "allpad" /></a>
				</div>
			</td>
			<td align = "center">
				<div id = "mar_bot" style = "display:none;">
				<?php echo $_SESSION['plugin.block.margin.bot']; ?>:
				<input type = "number" id = "mb" style = "width:50px;" value = "0" onchange = "javascript:svr.Sess('tinymce_plugin_margin_bot',this.value);" />
				</div>
			</td>
			<td align = "right">
				<?php echo $_SESSION['plugin.block.padding']; ?>:
				<input type = "number" style = "width:50px;" value = "0" onchange = "javascript:
				$_id('pl').value = this.value; $_id('pr').value = this.value; $_id('pt').value = this.value; $_id('pb').value = this.value;
				svr.Sess('tinymce_plugin_padding_top',this.value);
				svr.Sess('tinymce_plugin_padding_bot',this.value);
				svr.Sess('tinymce_plugin_padding_lft',this.value);
				svr.Sess('tinymce_plugin_padding_rgt',this.value);
				" />
			</td>
		</tr>
	</table>
	
</body>
</html>
