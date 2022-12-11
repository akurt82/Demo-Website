<?php 
// Erstellt ein thumbnail eines Bildes 
// Ordner unter $speicherordner benötigt ggf. Schreibrechte CHMOD(777) 

// Parameter: 
// $imgfile: Pfad zur Bilddatei 
// $speicherordner: Ordner indem die Thumbnails gespeichert werden sollen 
// $filenameOnly: Soll nur der Dateiname als Name für Thumbnail verwendet werden, 
// ansonsten inkl. Pfad 
function thumbnail( $imgfile, $realfile, $outpfile, $speicherordner, $filenameOnly = true ) { 
   //Max. Größe des Thumbnail (Höhe und Breite) 
   $thumbsize = 200; 

   //Dateiname erzeugen 
   $filename = basename($imgfile); 
   //$filename = $imgfile; 

   //Fügt den Pfad zur Datei dem Dateinamen hinzu 
   //Aus ordner/bilder/bild1.jpg wird dann ordner_bilder_bild1.jpg 
   if(!$filenameOnly) 
      { 
      $replace = array("/","\\","."); 
      $filename = str_replace($replace,"_",dirname($imgfile))."_".$filename; 
      } 

   //Schreibarbeit sparen 
   $ordner = $speicherordner; 

   //Speicherordner vorhanden 
   if(!is_dir($ordner)) 
      return false; 

   //Wenn Datei schon vorhanden, kein Thumbnail erstellen 
   if(file_exists($ordner.$filename)) 
      return $ordner.$filename; 

   //Ausgangsdatei vorhanden? Wenn nicht, false zurückgeben 
   if(!file_exists($imgfile)) 
      return false; 

   //Infos über das Bild 
   $endung = strrchr($realfile,"."); 

   list($width, $height) = getimagesize($imgfile); 
   $imgratio=$width/$height; 

   //Ist das Bild höher als breit? 
   if($imgratio>1) 
      { 
      $newwidth = $thumbsize; 
      $newheight = $thumbsize/$imgratio; 
      } 
   else 
      { 
      $newheight = $thumbsize; 
      $newwidth = $thumbsize*$imgratio; 
      } 

   //Bild erstellen 
   //Achtung: imagecreatetruecolor funktioniert nur bei bestimmten GD Versionen 
   //Falls ein Fehler auftritt, imagecreate nutzen 
   if(function_exists("imagecreatetruecolor")) 
     $thumb = imagecreatetruecolor($newwidth,$newheight);  
   else 
      $thumb = imagecreate ($newwidth,$newheight); 

   if(($endung == ".jpg")||($endung == ".jpeg"))
      { 
      imageJPEG($thumb,$ordner."temp.jpg"); 
      $thumb = imagecreatefromjpeg($ordner."temp.jpg"); 

      $source = imagecreatefromjpeg($imgfile); 
      } 
   elseif($endung == ".png")
      { 
	  $black = imagecolorallocate($thumb, 0, 0, 0);
	  imagecolortransparent($thumb, $black);
      imagePNG($thumb,$ordner."temp.png"); 
      $thumb = imagecreatefrompng($ordner."temp.png"); 

      $source = imagecreatefrompng($imgfile); 
      }
   elseif(($endung == ".gif")||($endung == ".giff"))
      { 
      imageGIF($thumb,$ordner."temp.gif"); 
      $thumb = imagecreatefromgif($ordner."temp.gif"); 

      $source = imagecreatefromgif($imgfile); 
      } 

   //imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height); 
   imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height); 

   //Bild speichern 
   if($endung == ".png") 
      //imagepng($thumb,$ordner.$filename); 
	  imagepng($thumb,$outpfile); 
   else if($endung == ".gif") 
      //imagegif($thumb,$ordner.$filename); 
	  imagegif($thumb,$outpfile); 
   else 
      //imagejpeg($thumb,$ordner.$filename); 
	  imagejpeg($thumb,$outpfile); 


   //Speicherplatz wieder freigeben 
   ImageDestroy($thumb); 
   ImageDestroy($source); 


   //Pfad zu dem Bild zurückgeben 
   return $outpfile; 
   } 

/* Beispiel */ 
//echo "<img src=\"".thumbnail("foto.jpg")."\" alt=\"Foto\">"; 
/* Beispiel */ 
?>