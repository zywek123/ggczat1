<?php
unlink("files/logs/logpriv.txt");
$m->info('Wyczyszczono logi rozmów prywatnych!');
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>