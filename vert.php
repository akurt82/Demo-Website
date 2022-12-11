<center>
<div style = "text-align: left;">
<?php if ( $lang == "de" ) { ?>
Wir vergeben bundesweite Vertriebslizenzen. Unsere aktuellen Vertiebspartner sind auf der Karte markiert.
<?php } elseif ( $lang == "tr" ) { ?>
Almanya &ccedil;ap&#305;nda bayi veriyoruz. Mevcut bayilerimiz haritada belirtilmi&#351;tir.
<?php } ?>
</div>
<div style = "width: 800px; height: 1067px; text-align: left; background: url(imgs/deutschland.png) no-repeat center center;">

<?php

              $query=mysql_query("SELECT * FROM db_5m_german_map ORDER BY id");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

              while ( $datensatz = mysql_fetch_array($query) ) {

				$url = $datensatz['map_url'];

				if ( $url != "" ) { $url = ' onclick = "javascript: location.href = \'' . $url . '\';" '; $cti = "cursor: pointer; "; }
				else              { $url = ''; $cti = ''; }
				
				echo '<img border = "0" src = "imgs/blobber.png" 
				       style = "position: absolute; margin-left: '.(($datensatz['map_x'] / 10)*2).'px; margin-top: '.(($datensatz['map_y'] / 10)*2).'px; '.$cti.'" 
					   title = "'.$datensatz['map_text'].'" '.$url.'
					  />';

			  }

?>

</div>
</center>