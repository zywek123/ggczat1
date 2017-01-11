<?php
if(!$parts[1]){
die($m->info('Podaj akcje! Listę dostępnych akcji znajdziesz w /akcja lista'));
}
if($parts[1] == 'lista'){
$es=$db->query('select `akcja` from `akcje`');
while($akcj=$es->fetch_assoc())
$akcje .= $akcj['akcja']."\r\n";
$m->info("Lista akcji:\r\n$akcje");
die;
}
$s=$db->query('select `text` from `akcje` where `akcja` = \''.$parts[1].'\'');
if($s->num_rows == 0){
die($m->info('Podana akcja nie istnieje! :('));
}
$ex=$s->fetch_assoc();
$akcyja = $ex['text'];
if(!$parts[2]){
die($m->info('Podaj nick użytkownika!'));
}
$q=$db->query('select `numer`,`nick` from `userzy` where `nick` = \''.$parts[2].'\'');
if($q->num_rows == 0){
die($m->info('Podany użytkownik nie istnieje! :('));
}
$akcyja = str_replace("`nick`","$niczek",$akcyja);
$akcyja = str_replace("`user`","$parts[2]",$akcyja);
$m->addmsg("$akcyja", $dos);
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>