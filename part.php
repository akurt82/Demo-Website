<?php

              $query=mysql_query("SELECT * FROM aj_text WHERE kennung = 'part' AND subkenn = '$lang' LIMIT 1");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

              while ( $datensatz = mysql_fetch_array($query) ) {

			  echo ereg_replace("%@1","'",$datensatz['inhalt']);
			  
			  }

?>
