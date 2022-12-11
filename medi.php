<?php
              $query=mysql_query("SELECT * FROM aj_text WHERE kennung = 'medi_$lang' LIMIT 1");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

              while ( $datensatz = mysql_fetch_array($query) ) {

			  echo str_replace("%@1","'",$datensatz['inhalt']);
			  
			  }
?>

<?php

	if ( $mode == "subcontent" ) {
		/* ******************************************************************************* *
		 * ******************************************************************************* *
		 * TITEL
		 * ******************************************************************************* *
		 * ******************************************************************************* */
              $query=mysql_query("SELECT * FROM gfd_media_header WHERE id = '$idno' AND typ = '$type' LIMIT 1");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

              while ( $datensatz = mysql_fetch_array($query) ) {
		?>
			<br /><br /><br /><br />
			<div class = "titleOfDoc"><?php echo $datensatz['kennung']; ?></div>
		<?php
			 }
		/* ******************************************************************************* *
		 * ******************************************************************************* *
		 * VIDEOS
		 * ******************************************************************************* *
		 * ******************************************************************************* */
		if ( $type == 0 ) {
		?>
		<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%"><tr>
			<td valign = "top">
				<div class = "ga_tab" style = "max-height: 200px; overflow; auto; width: 200px;">
				<div>
					<table border = "0" cellspacing = "0" cellpadding = "0" width = "100%">
					<tr><th>Videos</th></tr>
				<?php
					$query=mysql_query("SELECT * FROM gfd_media_content WHERE gid = '$idno' ORDER BY id");
					if(!$query) die("Fehler bei der Abfrage: ".mysql_error()); $fle = 0;
					while ( $datensatz = mysql_fetch_array($query) ) {
						$fle++;
						if ( trim($datensatz['wert']) != "" ) {
						?>
						<tr><td>
						<a href = "index.php?page=medi&mode=subcontent&id=<?php echo $idno; ?>&type=0&play=<?php echo $datensatz['id']; ?>&w=<?php echo $datensatz['breit']; ?>&h=<?php echo $datensatz['hohe']; ?>">
						<?php echo "Video&nbsp;$fle"; ?>
						</a>
						</td></tr>
						<?php
						}
					}
				?>
					</table>
				</div>
				</div>
			</td><td valign = "top" width = "100%">
				<?php if ( ( $play != "" ) && ( $sizw != "" ) && ( $sizh != "" ) ) { ?>
					<?php
					$k = $play;
					$query=mysql_query("SELECT * FROM gfd_media_content WHERE id = '$k' ORDER BY id");
					if(!$query) die("Fehler bei der Abfrage: ".mysql_error()); $fle = 0;
					while ( $datensatz = mysql_fetch_array($query) ) { $play = $datensatz['wert']; }
					$play = str_replace( 'watch?v=', 'embed/', $play );
					?>
					<div>
					<center>
					<iframe src = "<?php echo $play; ?>" 
					style = "
					border: 1px solid rgb(100,100,150); background-color: #ffffff; padding: 1px;
					box-shadow: 0px 0px 9px #000000; -moz-box-shadow: 0px 0px 9px #000000;
					-khtml-box-shadow: 0px 0px 9px #000000; -webkit-box-shadow: 0px 0px 9px #000000;
					width:<?php echo $sizw; ?>px;height:<?php echo $sizh; ?>px;"></iframe>
					</center>
					</div>
				<?php } ?>
			</td>
		</tr></table>
		<?php
		/* ******************************************************************************* *
		 * ******************************************************************************* *
		 * BILDERGALERIEN
		 * ******************************************************************************* *
		 * ******************************************************************************* */
		} elseif ( $type == 1 ) {
		?>
			<center>
				<div style = "padding-left:100px; padding-right: 100px;" align = "center">
				<?php
					$query=mysql_query("SELECT * FROM gfd_media_content WHERE gid = '$idno' ORDER BY id");
					if(!$query) die("Fehler bei der Abfrage: ".mysql_error()); $fle = 0;
					while ( $datensatz = mysql_fetch_array($query) ) {
						$fle++;
						if ( trim($datensatz['wert']) != "" ) {
						if ( file_exists($datensatz['wert']) == true ) {
						?>
						<img border = "0" style = "
						box-shadow: none; -moz-box-shadow: none; -khtml-box-shadow: none;
						-webkit-box-shadow: none;
						cursor:pointer;max-width:200px;max-height:200px;margin:10px;" src = "<?php echo $datensatz['wert']; ?>"
							 onclick = "javascript:getuplargedview(<?php echo $gidno; ?>,<?php echo $datensatz['id']; ?>,'<?php echo $datensatz['wert']; ?>');"
						/>
						<?php
						}
						}
					}
				?>
				</div>
			</center>
		<?php
		/* ******************************************************************************* *
		 * ******************************************************************************* *
		 * DOWNLOADS
		 * ******************************************************************************* *
		 * ******************************************************************************* */
		} elseif ( $type == 2 ) {
		?>
			HINWEIS: Wenn das <b>Herunterladen</b> nicht funktioniert, dann bitte mit der rechen Maustaste auf die Datei 
			klicken und aus dem aufklappenden Men&uuml; <b>Speichern unter</b>, <b>Speichern als</b>, <b>Verkn&uuml;pfte Datei laden unter</b> ausw&auml;hlen.
			<br /><br />
			<center>
				<div style = "padding-left:100px; padding-right: 100px;" align = "center">
				<table border = "0" cellspacing = "0" cellpadding = "0">
				<?php
					$query=mysql_query("SELECT * FROM gfd_media_content WHERE gid = '$idno' ORDER BY id");
					if(!$query) die("Fehler bei der Abfrage: ".mysql_error()); $fle = 0; $tr = 0;
					while ( $datensatz = mysql_fetch_array($query) ) {
						$fle++; $pici = "fts/file_other.png";
						if ( trim($datensatz['wert']) != "" ) {
						if ( file_exists($datensatz['wert']) == true ) {
						if ( $tr == 0 ) { echo '<tr>'; } $tr++;
						$ext = pick_up( $datensatz['wert'], 2, '/' );
						$ext = strtolower($ext);
						// *** //
						if ( strpos( $ext, ".png" ) > 0 ) { $pici = "fts/picture_png.png"; } else
						if ( strpos( $ext, ".icns" ) > 0 ) { $pici = "fts/picture_icns.png"; } else
						if ( strpos( $ext, ".bmp" ) > 0 ) { $pici = "fts/picture_bmp.png"; } else
						if ( strpos( $ext, ".ico" ) > 0 ) { $pici = "fts/picture_ico.png"; } else
						if ( strpos( $ext, ".jpg" ) > 0 ) { $pici = "fts/picture_jpg.png"; } else
						if ( strpos( $ext, ".jpeg" ) > 0 ) { $pici = "fts/picture_jpg.png"; } else
						if ( strpos( $ext, ".tif" ) > 0 ) { $pici = "fts/picture_tiff.png"; } else
						if ( strpos( $ext, ".tiff" ) > 0 ) { $pici = "fts/picture_tiff.png"; } else
						if ( strpos( $ext, ".psd" ) > 0 ) { $pici = "fts/picture_photoshop.png"; } else
						if ( strpos( $ext, ".avi" ) > 0 ) { $pici = "fts/video_avi.png"; } else
						if ( strpos( $ext, ".flv" ) > 0 ) { $pici = "fts/video_flash.png"; } else
						if ( strpos( $ext, ".mpg" ) > 0 ) { $pici = "fts/video_mpg.png"; } else
						if ( strpos( $ext, ".swf" ) > 0 ) { $pici = "fts/video_swf.png"; } else
						if ( strpos( $ext, ".webm" ) > 0 ) { $pici = "fts/video_webm.png"; } else
						if ( strpos( $ext, ".wmv" ) > 0 ) { $pici = "fts/video_wmv.png"; } else
						if ( strpos( $ext, ".cmd" ) > 0 ) { $pici = "fts/app_cmd.png"; } else
						if ( strpos( $ext, ".exe" ) > 0 ) { $pici = "fts/app_exe.png"; } else
						if ( strpos( $ext, ".rpm" ) > 0 ) { $pici = "fts/app_rpm.png"; } else
						if ( strpos( $ext, ".acf" ) > 0 ) { $pici = "fts/apple_acf.png"; } else
						if ( strpos( $ext, ".mp3" ) > 0 ) { $pici = "fts/audio_mp3.png"; } else
						if ( strpos( $ext, ".mp4" ) > 0 ) { $pici = "fts/audio_mp4.png"; } else
						if ( strpos( $ext, ".ogg" ) > 0 ) { $pici = "fts/audio_ogg.png"; } else
						if ( strpos( $ext, ".wav" ) > 0 ) { $pici = "fts/audio_wav.png"; } else
						if ( strpos( $ext, ".wma" ) > 0 ) { $pici = "fts/audio_wma.png"; } else
						if ( strpos( $ext, ".iso" ) > 0 ) { $pici = "fts/bin_iso.png"; } else
						if ( strpos( $ext, ".dmg" ) > 0 ) { $pici = "fts/bin_dmg.png"; } else
						if ( strpos( $ext, ".bas" ) > 0 ) { $pici = "fts/code_bas.png"; } else
						if ( strpos( $ext, ".c" ) > 0 ) { $pici = "fts/code_c.png"; } else
						if ( strpos( $ext, ".cpp" ) > 0 ) { $pici = "fts/code_cpp.png"; } else
						if ( strpos( $ext, ".cp" ) > 0 ) { $pici = "fts/code_cpp.png"; } else
						if ( strpos( $ext, ".h" ) > 0 ) { $pici = "fts/code_h.png"; } else
						if ( strpos( $ext, ".hpp" ) > 0 ) { $pici = "fts/code_hpp.png"; } else
						if ( strpos( $ext, ".hp" ) > 0 ) { $pici = "fts/code_hp.png"; } else
						if ( strpos( $ext, ".pas" ) > 0 ) { $pici = "fts/code_pas.png"; } else
						if ( strpos( $ext, ".php" ) > 0 ) { $pici = "fts/code_php.png"; } else
						if ( strpos( $ext, ".php2" ) > 0 ) { $pici = "fts/code_php.png"; } else
						if ( strpos( $ext, ".php3" ) > 0 ) { $pici = "fts/code_php.png"; } else
						if ( strpos( $ext, ".php4" ) > 0 ) { $pici = "fts/code_php.png"; } else
						if ( strpos( $ext, ".php5" ) > 0 ) { $pici = "fts/code_php.png"; } else
						if ( strpos( $ext, ".xhtml" ) > 0 ) { $pici = "fts/code_xhtml.png"; } else
						if ( strpos( $ext, ".html" ) > 0 ) { $pici = "fts/code_xhtml.png"; } else
						if ( strpos( $ext, ".xml" ) > 0 ) { $pici = "fts/code_xml.png"; } else
						if ( strpos( $ext, ".gzip" ) > 0 ) { $pici = "fts/compressed_gzip.png"; } else
						if ( strpos( $ext, ".rar" ) > 0 ) { $pici = "fts/compressed_rar.png"; } else
						if ( strpos( $ext, ".sit" ) > 0 ) { $pici = "fts/compressed_sit.png"; } else
						if ( strpos( $ext, ".tar" ) > 0 ) { $pici = "fts/compressed_tar.png"; } else
						if ( strpos( $ext, ".zip" ) > 0 ) { $pici = "fts/compressed_zip.png"; } else
						if ( strpos( $ext, ".mdb" ) > 0 ) { $pici = "fts/doc_access.png"; } else
						if ( strpos( $ext, ".mdbx" ) > 0 ) { $pici = "fts/doc_access.png"; } else
						if ( strpos( $ext, ".doc" ) > 0 ) { $pici = "fts/doc_word.png"; } else
						if ( strpos( $ext, ".docx" ) > 0 ) { $pici = "fts/doc_word.png"; } else
						if ( strpos( $ext, ".xls" ) > 0 ) { $pici = "fts/doc_excel.png"; } else
						if ( strpos( $ext, ".xlsx" ) > 0 ) { $pici = "fts/doc_excel.png"; } else
						if ( strpos( $ext, ".ppt" ) > 0 ) { $pici = "fts/doc_powerpoint.png"; } else
						if ( strpos( $ext, ".pptx" ) > 0 ) { $pici = "fts/doc_powerpoint.png"; } else
						if ( strpos( $ext, ".txt" ) > 0 ) { $pici = "fts/doc_text.png"; } else
						if ( strpos( $ext, ".odt" ) > 0 ) { $pici = "fts/doc_writer.png"; } else
						if ( strpos( $ext, ".ods" ) > 0 ) { $pici = "fts/doc_calc.png"; } else
						if ( strpos( $ext, ".odp" ) > 0 ) { $pici = "fts/doc_impress.png"; } else
						if ( strpos( $ext, ".pdf" ) > 0 ) { $pici = "fts/doc_pdf.png"; } else
						if ( strpos( $ext, ".dll" ) > 0 ) { $pici = "fts/lib_dll.png"; } else
						if ( strpos( $ext, ".dylip" ) > 0 ) { $pici = "fts/lib_dylib.png"; }
						// *** //
						?>
						<td valign = "top">
						<a href = "<?php echo $datensatz['wert']; ?>">
						<div style = "
						box-shadow: none; -moz-box-shadow: none; -khtml-box-shadow: none; text-align: center;
						-webkit-box-shadow: none; width: 128px; min-height: 150px; padding-top: 128px;
						background: url(imgs/<?php echo $pici; ?>) no-repeat top center;
						cursor:pointer;max-width:200px;max-height:200px;margin:10px;"><?php echo geschnitten(pick_up($datensatz['wert'],2,'/'),20,true); ?></div></a></td>
						<?php
						if ( $tr == 6 ) { echo '</tr>'; $tr = 0; }
						}
						}
					}
					if ( $tr > 0 ) { echo '<td colspan = "'.$tr.'"></td></tr>'; }
				?>
				</table>
				</div>
			</center>
		<?php
		}
		?>
		<br /><br />
		<?php
	}

?>

<table border = "0" cellspacing = "0" cellpadding = "0" align = "center" style = "margin-top: 40px;"><tr>

	<td valign = "top" style = "padding-right:20px;">
		<table border = "0" cellspacing = "0" cellpadding = "0" class = "ga_tab" style = "width: 300px;">
			<tr>
				<th colspan = "2" style = " text-align: left;">
					Videos
				</th>
			</tr>
			<tr>
				<td colspan = "2" style = " text-align: left;">
				<div style = "max-height: 200px; overflow: auto;">
				<?php
					$query=mysql_query("SELECT * FROM gfd_media_header WHERE typ = '0' ORDER BY id");
					if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
					while ( $datensatz = mysql_fetch_array($query) ) {
						?>
						<div style = "padding: 5px;">
						<a href = "index.php?page=medi&mode=subcontent&id=<?php echo $datensatz['id']; ?>&type=0">
						<?php echo $datensatz['kennung']; ?>
						</a>
						</div>
						<?php
					}
				?>
				</div>
				</td>
			</tr>
		</table>
	</td>

	<td valign = "top" style = "padding-right:20px;">
		<table border = "0" cellspacing = "0" cellpadding = "0" class = "ga_tab" style = "width: 300px;">
			<tr>
				<th colspan = "2" style = " text-align: left;">
					Bildergalerien
				</th>
			</tr>
			<tr>
				<td colspan = "2" style = " text-align: left;">
				<div style = "max-height: 200px; overflow: auto;">
				<?php
					$query=mysql_query("SELECT * FROM gfd_media_header WHERE typ = '1' ORDER BY id");
					if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
					while ( $datensatz = mysql_fetch_array($query) ) {
						?>
						<div style = "padding: 5px;">
						<a href = "index.php?page=medi&mode=subcontent&id=<?php echo $datensatz['id']; ?>&type=1">
						<?php echo $datensatz['kennung']; ?>
						</a>
						</div>
						<?php
					}
				?>
				</div>
				</td>
			</tr>
		</table>
	</td>

	<td valign = "top">
		<table border = "0" cellspacing = "0" cellpadding = "0" class = "ga_tab" style = "width: 300px;">
			<tr>
				<th colspan = "2" style = " text-align: left;">
					Downloads
				</th>
			</tr>
			<tr>
				<td colspan = "2" style = " text-align: left;">
				<div style = "max-height: 200px; overflow: auto;">
				<?php
					$query=mysql_query("SELECT * FROM gfd_media_header WHERE typ = '2' ORDER BY id");
					if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
					while ( $datensatz = mysql_fetch_array($query) ) {
						?>
						<div style = "padding: 5px;">
						<a href = "index.php?page=medi&mode=subcontent&id=<?php echo $datensatz['id']; ?>&type=2">
						<?php echo $datensatz['kennung']; ?>
						</a>
						</div>
						<?php
					}
				?>
				</div>
				</td>
			</tr>
		</table>
	</td>

</tr></table>
