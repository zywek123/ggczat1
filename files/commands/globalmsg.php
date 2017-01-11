<?php
if(!$parts[1]){
die($m->info('Podaj treść wiadomości!'));
}
$q=$db->query('select `numer` from `userzy` where `zgoda` = \'tak\'');
while($n=$q->fetch_assoc())
$do[] = $n['numer'];
$text = $parts;
unset($text[0]);
$text = implode(' ', $text);
sleep(3);
$m->addmsg("Globalna wiadomość do użytkowników czatu wysłana przez {$niczek}:\r\n======\r\n{$text}\r\n======\r\nJeżeli nie wyrażasz zgody na ich otrzymywanie zaloguj się i wpisz /zgoda nie", $do);
$q=$db->query('select `numer` from `userzy` where `zgoda` = \'tak\'');
$f=$q->num_rows;
$m->info('Wiadomość globalną dostało '.$f.' osób :)');
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>