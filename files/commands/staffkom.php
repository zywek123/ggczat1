<?php
if(!$parts[1]){
die($m->info('Podaj komendę!'));
}
if($parts[2]== ''){
die($m->info('Podaj staff dostępu!'));
}
$q=$db->query('select `komenda` from `komendy` where `komenda` = \''.$parts[1].'\' OR `alias` = \''.$parts[1].'\'');
if($q->num_rows == 0){
die($m->info('Podana komenda nie istnieje!'));
}
$db->query('update `komendy` set `staff` = '.$parts[2].' where `komenda` = \''.$parts[1].'\' OR `alias` = \''.$parts[1].'\'');
if($plec == 1) $cozrobil = 'zmieniła';
if($plec == 2) $cozrobil = 'zmienił';
$m->addmsg($niczek.' '.$cozrobil.' poziom dostępu do komendy /'.$parts[1].' na staff '.$parts[2], $doo);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>