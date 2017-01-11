<?php
if(!$parts[1]){
die($m->info('Podaj liczbę zł które chcesz wpłacić do banku!'));
}
if($parts[1] > $user['zl']){
die($m->info('Nie posiadasz takiej liczby zł!'));
}
if(preg_replace('/[^a-zA_Z]/', '', $parts[1])){
die($m->info("Liczba zł to znaki z zakresu 0-9!"));
}
$db->query('update `czat` set `bank` = bank + '.$parts[1]);
$db->query("update `userzy` set `zl` = zl - '.$parts[1].' where `numer` = '.$from);
if($plec == 1) $cozrobil = 'wpłaciła';
if($plec == 2) $cozrobil = 'wpłacił';
$m->addmsg($niczek.' '.$cozrobil.' do banku '.$parts[1].' zł', $doo);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>