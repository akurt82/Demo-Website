<?php

	function verwerfe_datei( $ident, $datei, $mintr ) {

		unlink( $datei );
		unlink( $mintr );

		if ( $ident == "tebiSing" ) {

			$query=mysql_query("DELETE FROM aj_images WHERE datei = '$datei' AND mintr = '$mintr'");
			if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

		} else {

			$query=mysql_query("DELETE FROM aj_images WHERE id = '$ident'");
			if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

		}

	}

?>
