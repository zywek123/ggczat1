<?php
if(!$parts[1]){
die($m->info("Składnia: {$parts[0]} tak lub nie\r\nAktualny stan: {$user['bufor']}"));
}
if(!in_array($parts[1], array('tak','nie'))){
die($m->info("Składnia: {$parts[0]} tak lub nie\r\nAktualny stan: {$ukan['bufor']}"));
}
$db->query('update `userzy` set `bufor` = \''.$parts[1].'\' where `numer` = '.$from);
$m->info('Bufor ustawiono na '.$parts[1]);
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>