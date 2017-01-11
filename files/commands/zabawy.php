<?php
if(!$parts[1]){
die($m->info('Aktualny stan to '.$user['zabawy'].'. Aby wyłączyć wpisz '.$parts[0].' nie, aby włączyć wpisz '.$parts[0].' tak'));
}
if(!in_array($parts[1], array('tak', 'nie'))){
die($m->info('Aktualny stan to '.$user['zabawy'].'. Aby wyłączyć wpisz '.$parts[0].' nie, aby włączyć wpisz '.$parts[0].' tak'));
}
$db->query('update `userzy` set `zabawy` = \''.$parts[1].'\' where `numer` = '.$from);
$m->info('Ustawiono stan zgody na wiadomości związane z grami na: '.$parts[1]);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>