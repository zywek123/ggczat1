<?php
if(!$parts[1]){
die($m->info('Podaj akcję do usunięcia!'));
}
$q=$db->query('select `akcja` from `akcje` where `akcja` = \''.$parts[1].'\'');
if($q->num_rows == 0){
die($m->info('Brak akcji '.$parts[1].'! Sprawdź listę dostępnych akcji wpisując /akcja lista'));
}
$db->query('delete from `akcje` where `akcja` = \''.$parts[1].'\'');
$m->info('Akcja '.$parts[1].' została usunięta!');
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>