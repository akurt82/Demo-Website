<?php session_start(); ?>

<!-- ------------------------------------------------------------------------------------------------ --
  -- ------------------------------------------------------------------------------------------------ --
  --
  -- 5M-Ware tinyMCE plugin-extension
  -- Copyright 2015(c)
  -- info@5m-ware.eu
  --
  -- 5M-Ware Web Solutions License
  --
  -- Requirements: wepi_core.js, wepi_serv.js
  --
  -- ------------------------------------------------------------------------------------------------ --
  -- ------------------------------------------------------------------------------------------------ -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <script type = "text/javascript" src = "api/wepi_core.js"></script>
  <script type = "text/javascript" src = "api/wepi_serv.js"></script>
  <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script type = "text/javascript"> var svr = new wepiServ(); svr.sessionID = "<?php echo session_id(); ?>"; </script>

</head><body>

<center>
<textarea id = "generated" style = "width:660px; height: 440px;"></textarea>
</center>

<script type = "text/javascript">
	var args = top.tinymce.activeEditor.windowManager.getParams();
	// *** //
	var code = args.arg1;
	// *** //
	code = code.replace( /\n/g, '' );
	code = code.replace( /index.php/g, "http://www.hotandice.de/index.php" );
	code = code.replace( /"imgs/g, '"http://www.hotandice.de/imgs' );
	// *** //
	$_id('generated').value = code;
</script>

</body>
</html>
