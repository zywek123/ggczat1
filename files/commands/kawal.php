<?php
$m->addmsg($niczek.' Losuje kawał :)', $dos);
sleep(3);
$ta=$db->query('select count(text) as text from `kawaly`');
$ra=$ta->fetch_assoc();
$kawalek = rand(1,$ra['text']);
$rand=$db->query('select * from `kawaly` where `id` = '.$kawalek);
$wkawal=$rand->fetch_assoc();
if($plec == 1) $cozrobil = "wylosowała";
if($plec == 2) $cozrobil = "wylosował";
$m->addmsg($niczek.' '.$cozrobil.' kawał '.$wkawal['id'].': '.$wkawal['text'], $dos);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>