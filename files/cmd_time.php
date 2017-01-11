<?php
//plik zapobiegający spamowi zabawami
$a=$db->query("select `antyspam`,`time_cmd` from `czat` where `antyspam` = 'tak'");
if($a->num_rows == 1){
$r=$a->fetch_assoc();
$ar = time();
if($r['time_cmd'] > $ar){
$wait = $r['time_cmd']-time();
die($m->info("w celu zapobiegnięcia spamu aby grac musisz odczekać jeszcze {$main->czas($wait)}"));
}else
$kc = (time()+60);
$db->query("update `czat` set `time_cmd` = {$kc}");
}
//end
?>