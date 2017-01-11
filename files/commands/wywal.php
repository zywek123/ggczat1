<?php
$czass2 = (time()-600);
$qq=$db->query('select `numer`,`staff`,`nick` from `userzy` where `czas` < '.$czass2.' and `online` = 1 and `numer` != '.$from.' and `spy` = 0 and `zw` = 0');
if($qq->num_rows == 0){
die($m->info("Nie ma użytkowników nieaktywnych!"));
}
while($r=$qq->fetch_assoc()){
$wyrzuceni .= ''.$main->nick($r['nick'], $r['staff']).' ';
$d[] = $r['numer'];
$inf = gg($r['numer']);
$plc = $inf->gender[0];
if($plc == 1) $co = 'zostałaś wyrzucona';
if($plc == 2) $co = 'zostałeś wyrzucony';
}
$db->query('update `userzy` set `online` = 0 where `czas` < '.$czass2.' and `online` = 1 and `numer` != '.$from.' and `spy` = 0 and `zw` = 0');
$m->addmsg("Wyrzucanie nieaktywnych przez {$niczek}. Wyrzucono:\r\n{$wyrzuceni}", $doo);
$m->addmsg($co.' z powodu nieaktywności przez 10 minut.', $d);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>