<?php
#error_reporting(0);
session_start();
include('files/configs.php');
include('files/functions.php');
ob_start();
include('bufFunc.php');
$ca=$db->query('select `numer`,`nick` from `userzy` where `pass` = \''.$_GET['pass'].'\' and `method` = \''.$_GET['authorization'].'\'');
if($ca->num_rows == 0){
echo "Nie jesteœ tym, za kogo siê podajesz";
}else{
$ac=$ca->fetch_assoc();
$do = $ac['numer'];
$niczek = cpass(6,12);
}
$q=$db->query("select * from `bufor` where `do` = {$do} and `id` >= {$_GET['start']} order by `id` asc limit {$_GET['limit']}");
while($r=$q->fetch_assoc()){
$msg .= $r['nick'].': '.$r['text']."\r\n";
}
//$db->query("delete from `bufor` where `do` = $do and `id` >= {$_GET['start']} limit {$_GET['limit']}");
$buf = $niczek;
$bufdir = 'files/buf/'.$buf;
mkdir($bufdir, 0777);
$fp = fopen($bufdir.'/bufor.txt', a);
$txtf = $msg;
fwrite($fp, $txtf);
fclose($fp);
$exception = system('zip -r files/arch/'.$buf.'.zip '.$bufdir);
dl_file('files/arch/'.$buf.'.zip');
ob_end_flush();
?>