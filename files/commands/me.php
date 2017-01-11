<?php
if(!$parts[1]){
die($m->info('Podaj treść wiadomości do wysłania!'));
}
$text = $parts;
unset($text[0]);
$text = implode(' ', $text);
$m->insmsg2("{$user['nick']} $text", $doo);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>