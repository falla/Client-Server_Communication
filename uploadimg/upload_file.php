<?php 
$dir = 'upload/';
if (! file_exists ( $dir )) {
mkdir ( $dir );
}
if( preg_match( "#^image/((?:gif)|(?:jpg)|(?:jpeg)|(?:png))$#is", $_FILES["file"]["type"], $match ) && ($_FILES["file"]["size"] < 2097152) )
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    //echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      
		$name= $_FILES["file"]["name"]; 
		$rand = '';
		$string = 'abcdefghijklmnopgrstuvwxyz0123456789';
		for ($i=0;$i<10;$i++)
		$rand .= substr($string,mt_rand(0,strlen($string)-1),1);
		$id=date("YmdHis").'_'.$rand;
		move_uploaded_file(     $_FILES["file"]["tmp_name"],      "upload/" . $id  .".jpg"  );
		//echo "Stored in: " . "upload/" . $id  .".jpg";
		echo  $id  ;
      }
    }
  }
else
  {
  echo "Invalid file";
  }  
?>