<?php
if(!$parts[1]){
die($m->info('Podaj nazwę akcji!'));
}
if(!$parts[2]){
die($m->info("Podaj treść! Dostępne słowa specjalne: `nick` - Nick wykonującego akcje\r\n`user` - nick użytkownika na którym będzie wykonywana akcja"));
}
$text = $parts;
unset($text[0]);
unset($text[1]);
$text = implode(' ', $text);
$ak=$db->query('select `akcja` from `akcje` where `akcja` = \''.$parts[1].'\'');
if($ak->num_rows == 1){
die($m->info('Podana akcja już istnieje!'));
}
$db->query('insert into `akcje` (`akcja`, `text`) values (\''.$parts[1].'\', \''.$text.'\')');
$m->info('Akcja dodana :)');
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>