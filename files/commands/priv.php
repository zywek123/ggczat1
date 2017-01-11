<?php
if(!$parts[1]){
die($m->info('Podaj nick użytkownika!'));
}
if($parts[2] == ''){
die($m->info('Podaj treść wiadomości!'));
}
$q=$db->query('select `nick`,`numer` from `userzy` where `nick` = \''.$parts[1].'\'');
if($q->num_rows == 0){
die($m->info('Podany  użytkownik nie istnieje!'));
}
$r=$q->fetch_assoc();
$numer = $r['numer'];
$text = $parts;
unset($text[0]);
unset($text[1]);
$text = implode(' ', $text);
$m->addmsg('Priv od '.$niczek.': '.$text, $numer);
$m->info('Wiadomość prywatna została pomyślnie dostarczona!');
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
$fp = fopen('files/logs/priv.log', a);
$read = fread($fp, filesize('files/logs/priv.log'));
$dat = date('d.m.Y G:I:s');
$read .= $niczek.' do '.$parts[1].' dnia '.$dat.': '.$text."\r\n";
fwrite($fp,$read);
fclose($fp);
?>