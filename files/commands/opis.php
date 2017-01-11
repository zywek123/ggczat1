<?php
$text = $parts;
unset($text[0]);
$text = implode(' ', $text);
$p->setStatus($text,STATUS_FFC);
if($plec == 1) $cozrobil = 'zmieniła';
if($plec == 2) $cozrobil = 'zmienił';
$m->addmsg($niczek.' '.$cozrobil.' opis czatu na '.$text, $doo);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>