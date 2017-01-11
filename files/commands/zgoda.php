<?php
if(!$parts[1]){
die($m->info('Aktualny stan to '.$user['zgoda'].'. Aby wyłączyć wpisz /zgoda nie, aby włączyc wpisz /zgoda tak'));
}
if(!in_array($parts[1], array('tak', 'nie'))){
die($m->info('Aktualny stan to '.$user['zgoda'].'. Aby wyłączyć wpisz /zgoda nie, aby włączyc wpisz /zgoda tak'));
}
$db->query("update `userzy` set `zgoda` = '{$parts[1]}' where `numer` = '{$from}'");
$m->info("Ustawiono stan zgody na wiadomości globalne na: {$parts[1]}");
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>