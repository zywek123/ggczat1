<?php
function dl_file($file){

if (!is_file($file)) { die("<b>404 File not found!</b>"); }

$len = filesize($file);
$filename = basename($file);
$file_extension = strtolower(substr(strrchr($filename,"."),1));

switch( $file_extension ) {
case "pdf": $ctype="application/pdf"; break;
case "exe": $ctype="application/octet-stream"; break;
case "zip": case "buf": $ctype="application/zip"; break;
case "doc": $ctype="application/msword"; break;
case "xls": $ctype="application/vnd.ms-excel"; break;
case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
case "gif": $ctype="image/gif"; break;
case "png": $ctype="image/png"; break;
case "jpeg":
case "jpg": $ctype="image/jpg"; break;
case "mp3": $ctype="audio/mpeg"; break;
case "wav": $ctype="audio/x-wav"; break;
case "mpeg":
case "mpg":
case "mpe": $ctype="video/mpeg"; break;
case "mov": $ctype="video/quicktime"; break;
case "avi": $ctype="video/x-msvideo"; break;

case "php":
case "htm":
case "html":
case "txt": die("Zakazane uzycie dla ". $file_extension ." </b>"); break;

default: $ctype="application/force-download";
}

header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: public');
header('Content-Description: File Transfer');
header('Content-Type: '.$ctype);
$header='Content-Disposition: attachment; filename='.$filename.';';
header($header);
header('Content-Transfer-Encoding: binary');
header('Content-Length: '.$len);
@readfile($file);
exit;
}
function deldir($dir){
if(file_exists($dir) and is_dir($dir)){
$handle = opendir($dir);
while($file = readdir($handle)){
if($file != '.' && $file != '..'){
if(!is_dir($dir.'/'.$file)){
unlink($dir.'/'.$file);
}else{
deldir($dir.'/'.$file);
}
}
}
}
closedir($handle);
rmdir($dir);
}


?>