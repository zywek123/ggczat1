<?php
if(!$parts[1]){
die($m->info('Podaj komendę!'));
}
$text = $parts;
unset($text[0]);
unset($text[1]);
$text = implode(' ', $text);
$q=$db->query('select `komenda` from `komendy` where `komenda` = \''.$parts[1].'\' OR `alias` = \''.$parts[1].'\'');
if($q->num_rows == 0){
die($m->info('Podana komenda nie istnieje!'));
}
$db->query('update `komendy` set `opis` = \''.$text.'\' where `komenda` = \''.$parts[1].'\' OR `alias` = \''.$parts[1].'\'');
if($plec == 1) $cozrobil = 'ustawiła';
if($plec == 2) $cozrobil = 'ustawił';
$m->addmsg($niczek.' '.$cozrobil.' opis komendy /'.$parts[1], $doo);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>