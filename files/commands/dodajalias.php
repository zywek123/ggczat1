<?php
if(!$parts[1]){
die($m->info('Podaj komendę!'));
}
if(!$parts[2]){
die($m->info('Podaj alias!'));
}
$q=$db->query('select `komenda` from `komendy` where `komenda` = \''.$parts[1].'\'');
if($q->num_rows == 0){
die($m->info('Brak komendy '.$parts[1].'! sprawdź listę dostępnych komend wpisując /pomoc'));
}
$db->query('update `komendy` set `alias` = \''.$parts[2].'\' where `komenda` = \''.$parts[1].'\'');
if($plec == 1) $cozrobil = "dodała";
if($plec == 2) $cozrobil = "dodał";
$m->addmsg($niczek.' '.$cozrobil.' nowy alias /'.$parts[2].' i można go używać zamiast komendy /'.$parts[1], $doo);
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>