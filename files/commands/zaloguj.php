<?php
if(!$parts[1]){
die($m->info('Podaj nick użytkownika!'));
}
$text = $parts;
unset($text[0]);
unset($text[1]);
$text = implode(' ', $text);
$q=$db->query('select `nick`,`numer`,`staff` from `userzy` where `nick` = \''.$parts[1].'\'');
if($q->num_rows == 0){
die($m->info('Podany użytkownik nie istnieje!'));
}
while($r=$q->fetch_assoc())
$numer = $r['numer'];
$inf = gg($numer);
$plc = $inf->gender[0];
if($plc == 1) $jaki = 'zostałaś zalogowana';
if($plc == 2) $jaki = 'zostałeś zalogowany';
$qq=$db->query('select * from `userzy` where `online` = 1 and `nick` != \''.$parts[1].'\'');
while($n=$qq->fetch_assoc())
$do[] = $n['numer'];
$db->query('update `userzy` set `online` = 1 where `nick` = \''.$parts[1].'\'');
$licz = $main->liczZalogowanych($kanal);
if($plec == 1) $cozrobil = 'zalogowała';
if($plec == 2) $cozrobil = 'zalogował';
$m->addmsg($niczek.' '.$cozrobil.' użytkownika <'.$parts[1].'> na czat z powodu: '.$text."\r\n$licz", $do);
$m->addmsg($jaki.' na czat przez '.$niczek.' z powodu: '.$text, $numer);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>