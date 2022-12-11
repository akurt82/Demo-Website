
<?php

	$query=mysql_query("SELECT * FROM aj_text WHERE kennung = 'hpag' AND subkenn = '$lang' LIMIT 1");
	if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

	while ( $datensatz = mysql_fetch_array($query) ) {

		echo str_replace("%@1","'",$datensatz['inhalt']);

	}

?>
