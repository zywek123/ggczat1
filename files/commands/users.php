<?php
$q=$db->query('select `nick`,`numer`,`staff`,`czas`,`zw` from `userzy` where `online` = 1 and `spy` = 0 order by `czas` desc');
while($r=$q->fetch_assoc()){
$czass = $r['czas'];
$zw = $r['zw'];
$czas = $_SERVER['REQUEST_TIME']-$czass;
if($czas > 60){
$aktywny = $main->czas($czas)." temu";
}else{
$aktywny = "teraz";
}
if($zw == 1){
$status = ' zaraz wracam';
}else{
$status = '';
}
$inf = gg($r['numer']);
$plc = $inf->gender[0];
if($plc == 1) $jaki = 'aktywna';
if($plc == 2) $jaki = 'aktywny';
$zalogowani .= $main->nick($r['nick'], $r['staff'])." -$status $jaki $aktywny\r\n";
}
$m->info("Aktualnie zalogowani:\r\n{$zalogowani}");
$time = $_SERVER['REQUEST_TIME'];
$czasonline = $_SERVER['REQUEST_TIME']-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>