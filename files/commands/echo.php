<?php
if(!$parts[1]){
die($m->info('Aktualny stan to: '.$user['echo'].' aby włączyć wpisz /echo tak, aby wyłączyc wpisz /echo nie'));
}
if(!in_array($parts[1], array('tak','nie'))){
die($m->info('Aktualny stan to: '.$user['echo'].' aby włączyć wpisz /echo tak, aby wyłączyc wpisz /echo nie'));
}
$db->query('update `userzy` set `echo` = \''.$parts[1].'\' where `numer` = '.$from);
$m->info('Stan powtarzania wiadomości ustawiono na: '.$parts[1]);
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>