<?php
if(!$parts[1]){
die($m->info('Podaj swój nowy nick! Pamiętaj, że później nie będzie możliwości jego zmiany!'));
}
$q=$db->query('select `nick` from `userzy` where `nick` = \''.$parts[1].'\'');
if($q->num_rows == 1){
die($m->info('Podany nick już jest zajęty!'));
}
if(preg_match('/[^0-9a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]/', $parts[1])){
die($m->info('Nick musi zaiwrać znaki polskie oraz z zakresu a-z A-Z 0-9!'));
}
if($user['changenick'] == 1){
if($plec == 1) $cozrobiles = 'zmieniałaś';
if($plec == 2) $cozrobiles = 'zmieniałeś';
die($m->info('Ty już '.$cozrobiles.' raz swój nick! Poproś obsługę o jego zmiane!'));
}
if($plec == 1) $corobi = 'postanowiła';
if($plec == 2) $corobi = 'postanowił';
$m->addmsg('Użytkownikowi '.$niczek.' znudził się ten nick, więc '.$corobi.' zmienić sobie nick na '.$parts[1].' :)', $doo);
$db->query('update `userzy` set `nick` = \''.$parts[1].'\', `changenick` = 1 where `numer` = '.$from);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>