<?php
if(!$parts[1]){
die($m->info('Podaj komendę!'));
}
if($parts[2] == ''){
die($m->info('Podaj treść!'));
}
$q=$db->query('select `komenda` from `komendy2` where `komenda` = \''.$parts[1].'\'');
if($q->num_rows == 1){
die($m->info('Podana komenda już istnieje!'));
}
$text = $parts;
unset($text[0]);
unset($text[1]);
$text = implode(' ', $text);
$db->query('insert into `komendy2` (`komenda`, `text`) values (\''.$parts[1].'\', \''.$text.'\')');
if($plec == 1) $cozrobil = "dodała";
if($plec == 2) $cozrobil = "dodał";
$m->addmsg($niczek.' '.$cozrobil.' komendę '.$parts[1], $doo);
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>