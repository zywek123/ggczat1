<?php
$db->query('update `userzy` set `zw` = 1 where `numer` = '.$from);
$q=$db->query('select `numer` from `userzy` where `online` = 1 and `numer` != '.$from.' and `zw` = 0');
while($n=$q->fetch_assoc())
$do[] = $n['numer'];
$m->addmsg("$niczek oznajmia, że idzie na zw", $do);
if($plec == 1) $cozrobil = 'przeszłaś';
if($plec == 2) $cozrobil = 'przeszedłeś';
$m->info($cozrobil.' w tryb zw. Aby z niego powrócić, wpisz /jj');
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>