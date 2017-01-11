<?php
if(!$parts[1]){
die($m->info('Podaj kawał!'));
}
$text = $parts;
unset($text[0]);
$text = implode(' ', $text);
$qq=$db->query('select `text` from `kawaly` where `text` = \''.$text.'\'');
if($qq->num_rows == 1){
die($m->info('Taki kawał już jest w bazie danych!'));
}
$db->query("insert into `kawaly` (`text`) values ('{$text}')");
$m->info('Kawał został dodany pomyślnie!');
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>