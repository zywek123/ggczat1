<?php
$text = $parts;
unset($text[0]);
$text = implode(' ', $text);
file_put_contents('files/temat.gzd', gzdeflate(serialize($text), 9));
if($plec == 1) $cozrobil = 'ustawiła';
if($plec == 2) $cozrobil = 'ustawił';
$m->addmsg($niczek.' '.$cozrobil.' temat rozmowy na: '.$text, $doo);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>