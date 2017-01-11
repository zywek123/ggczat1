<?php
if(!$parts[1]){
die($m->info('Podaj komendę!'));
}
if($parts[2] == ''){
die($m->info('Podaj staff!'));
}
$q=$db->query('select `komenda` from `komendy` where `komenda` = \''.$parts[1].'\'');
if($q->num_rows == 1){
die($m->info('Podana komenda już istnieje!'));
}
$db->query('insert into `komendy` (`komenda`, `alias`, `staff`) values (\''.$parts[1].'\', \'\', '.$parts[2].')');
$m->info('Dodano komendę /'.$parts[1].' do bazy i zmieniono do niej dostęp na staff '.$parts[2]);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>