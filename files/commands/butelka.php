<?php
$d=$db->query("select `nick`,`staff`,`numer` from `userzy` where `online` = 1 and `numer` != '.$from.' order by rand() desc limit 1");
$wylosowany=$d->fetch_assoc();
if($plec == 1) $cozrobil = "zakręciła";
if($plec == 2) $cozrobil = "zakręcił";
$m->addmsg($niczek.' '.$cozrobil.' butelką', $dos);
sleep(3);
$inf = gg($wylosowany['numer']);
$plc = $inf->gender[0];
if($plc == 1) $dokogo = "niej";
if($plc == 2) $dokogo = "niego";
$m->addmsg($niczek.' Butelka zatrzymała się na '.$main->nick($wylosowany['nick'], $wylosowany['staff']).' '.$niczek.' Szykuj dla '.$dokogo.' pytanie', $dos);
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>