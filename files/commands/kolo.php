<?php
$czas = time();
$q=$db->query('select `kolo` from `userzy` where `numer` = '.$from.' and `kolo` > '.$czas);
if($q->num_rows == 1){
$r=$q->fetch_assoc();
$czekaj = $r['kolo']-time();
die($m->info('Nie możesz kręcić kołem. Poczekaj aż minie '.$main->czas($czekaj).' :('));
}
include("files/cmd_time.php");
$m->addmsg($niczek.' kręci kołem', $dos);
$czaskolo = (time()+$wheel_s);
$db->query('update `userzy` set `kolo` = '.$czaskolo.' where `numer` = '.$from);
$method = rand(1,4);
if($method >= 1 && $method <= 3){
$co = rand(1,7);
if($co == 1){
$wylosowalo = 'tarcz antypokebollowych';
$ile = rand(1,$wheelmaxwheels);
$baza = 'tarcza';
}
if($co == 2){
$wylosowalo = 'elektrycznych tarcz antypokebollowych';
$ile = rand(1,$wheelmaxelectrics);
$baza = 'tarcza2';
}
if($co == 3){
$wylosowalo = 'sprejów przeciw kieszonkowcom';
$ile = rand(1,$wheelmaxspray);
$baza = 'sprej';
}
if($co == 4){
$wylosowalo = 'pustych pokebolli';
$ile = rand(1,$wheelmaxempty);
$baza = 'poke';
}
if($co == 5){
$wylosowalo = 'zł';
$il = rand(1,$wheelmaxzl);
$ile = ceil($il/10)*10;
$baza = 'zl';
}
if($co == 6){
$wylosowalo = "reset wszystkich gier\r\n{$niczek} może śmiało grać we wszystkie gry";
$db->query('update `userzy` set `kostka` = 0, `kosci` = 0, `kolo` = 0, `moneta` = 0, `poke3` = 0, `kieszonkowiec` = 0, `okradanie` = 0, `sejf` = 0 where `numer` = '.$from);
}
if($co == 7){
$wylosowalo = 'kart';
$ile = rand(1,$wheelmaxcarts);
$baza = 'karta';
}
sleep(3);
$m->addmsg($niczek.' Zyskuje: '.$ile.' '.$wylosowalo, $dos);
$db->query('update `userzy` set `'.$baza.'` = '.$baza.' + '.$ile.' where `numer` = '.$from);
}else if($method >= 3 && $method <= 4){
$co = rand(1,6);
if($co == 1){
$wylosowalo = 'tarcz antypokebollowych';
$ile = rand(1,$wheelmaxwheels);
$baza = 'tarcza';
}
if($co == 2){
$wylosowalo = 'elektrycznych tarcz antypokebollowych';
$ile = rand(1,$wheelmaxelectrics);
$baza = 'tarcza2';
}
if($co == 3){
$wylosowalo = 'sprejów przeciw kieszonkowcom';
$ile = rand(1,$wheelmaxspray);
$baza = 'sprej';
}
if($co == 4){
$wylosowalo = 'pustych pokebolli';
$ile = rand(1,$wheelmaxempty);
$baza = 'poke';
}
if($co == 5){
$wylosowalo = 'zł';
$il = rand(1,$wheelmaxzl);
$ile = ceil($il/10)*10;
$baza = 'zl';
}
if($co == 6){
$wylosowalo = 'kart';
$ile = rand(1,$wheelmaxcarts);
$baza = 'karta';
}
if($user[$baza] < $ile){
sleep(3);
if($plec == 1) $kogo = 'jej';
if($plec == 2) $kogo = 'jego';
$m->addmsg('Niestety, '.$niczek.' nic nie traci ani nie zyskuje, ponieważ '.$kogo.' liczba '.$wylosowalo.' nie przekracza większej liczby niż '.$ile, $dos);
die;
}else
sleep(3);
$m->addmsg($niczek.' Traci: '.$ile.' '.$wylosowalo, $dos);
$db->query('update `userzy` set `'.$baza.'` = '.$baza.' - '.$ile.' where `numer` = '.$from);
}
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>