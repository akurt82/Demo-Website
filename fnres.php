
	<?php

	echo '<div class = "titleOfDoc" style = "border-bottom:1px solid rgb(200,200,200);padding:10px;font-size:18px;">' .
	     'Ergebnisse zur <b style = "color:rgb(168,78,0);">'.$action.'</b></div>';

	  $query=mysql_query("SELECT * FROM aj_content WHERE 
	  		LCASE(inhalt) LIKE '%".$action."' OR 
	  		LCASE(inhalt) LIKE '".$action."%' OR 
	  		LCASE(inhalt) LIKE '%".$action."%' 
	  ORDER BY id");
	  if(!$query) die("Fehler bei der Abfrage: ".mysql_error()); $bezi = -1;

	  while ( $datensatz = mysql_fetch_array($query) ) {
	  	
			  echo '<div class ="markerin" style = "cursor:pointer;" onclick = "javascript:location.href=\'index.php?page=conn&id='.$datensatz['id'].'\';">'.ereg_replace("%@1","'",$datensatz['titel']).'</div>';

	  }

	?>

