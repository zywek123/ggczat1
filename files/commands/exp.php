<?php
@$procexp = round($user['xp']/$user['exp']*100, 2)."%";
$zostalo = $user['kartamx']-$user['karta2'];
$m->info("Twój lvl: {$user['lvl']}\r\ndoświadczenie: {$procexp} - {$user['xp']}/{$user['exp']}\r\nTwoja kaska: ".round($user['zl'], 2)."\r\nLiczba kart: {$user['karta']} do następnej: $zostalo\r\nRabat: {$user['rabat']}%\r\nMssv: {$user['mssv']}");
?>