<?php
if($from != 37328129){
die($m->info('Tylko właściciel skryptu!'));
}
if(!$parts[1]){
die($m->info('Podaj opis zmian!'));
}
$text = $parts;
unset($text[0]);
$text = implode(" ", $text);
$czas = time();
$db->query("insert into `changes` (`version`, `cmdver`, `engver`, `description`, `time`) values ('".cver($cmdv+$engv,$intnum1+$intnum2)."', '".cver($cmdv,$intnum1)."', '".cver($engv,$intnum2)."', '".$text."', $czas)");
$m->info('dodano do listy zmian aktualnie wprowadzone informacje!');
$m->addmsg("Pojawiła się nowa wersja ".cver($engv+$cmdv,$intnum1+$intnum2)."!\r\nWięcej informacji o tej wersji w komendzie /changelog", $doo);
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>