<?php
if(!$parts[1]){
die($m->info('Podaj komendę!'));
}
$qq=$db->query('select `komenda` from `komendy` where `komenda` = \''.$parts[1].'\'');
if($qq->num_rows == 0){
die($m->info("Podana komenda nie istnieje!"));
}
$db->query('delete from `komendy` where `komenda` = \''.$parts[1].'\'');
chmod("files/commands/$parts[1].php", 0777);
unlink("files/commands/{$parts[1]}.php");
if($plec == 1) $cozrobil = "usunęła";
if($plec == 2) $cozrobil = "usunął";
$m->addmsg("{$niczek} $cozrobil globalną komendę /{$parts[1]}", $doo);
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>