<?php
if(!$parts[1]){
die($m->info('Podaj komendę!'));
}
$q=$db->query('select `komenda` from `komendy2` where `komenda` = \''.$parts[1].'\'');
if($q->num_rows == 0){
die($m->info('Podana komenda nie istnieje!'));
}
$db->query('delete from `komendy2` where `komenda` = \''.$parts[1].'\'');
$m->addmsg($niczek.' Usuwa komendę /'.$parts[1], $doo);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>