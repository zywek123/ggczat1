<?php
$czas = time();
$q=$db->query('select `kostka` from `userzy` where `numer` = '.$from.' and `kostka` > '.$czas);
if($q->num_rows == 1){
$r=$q->fetch_assoc();
$czekaj = $r['kostka']-time();
die($m->info('Nie możesz rzucać kostką. Poczekaj aż minie '.$main->czas($czekaj).' :('));
}
include("files/cmd_time.php");
if(!$parts[1]){
die($m->info('Wpisz '.$parts[0].' liczba którą obstawiasz np: '.$parts[0].' 4'));
}
if($parts[1] < 1 || $parts[1] > 6){
die($m->info('Nie możesz obstawić liczby mniejszej niż 0 lub większej niż 6'));
}
if(!preg_replace('/[^0-9]/', '', $parts[1])){
die($m->info('Możesz obstawiać tylko liczby!'));
}
if($plec == 1){ $cozrobil = "rzuciła"; $cosiestalo = "obstawiła";
}else if($plec == 2){ $cozrobil = "rzucił"; $cosiestalo = "obstawił"; }
$m->addmsg($niczek.' '.$cozrobil.' kostką obstawiając liczbę '.$parts[1], $dos);
sleep(4);
$id = rand(1,6);
if($id == $parts[1]){
$m->addmsg('brawo! '.$niczek.' poprawnie '.$cosiestalo.' liczbę '.$id."\r\nW nagrodę dostaje 100 zl do Swojego portfela", $dos);
$db->query('update `userzy` set `zl` = zl + 100 where `numer` = '.$from}');
}else{
$m->addmsg('Niestety! '.$niczek.' źle '.$cosiestalo.', ponieważ kostka zatrzymała się na liczbie '.$id."\r\nNa pocieszenie $niczek dostaje 3 zl do Swojego portfela :)", $dos);
$db->query('update `chan` set `zl` = zl + 3 where `numer` = '.$from);
}
$time2 = (time()+$dice_s);
$db->query("update `chan` set `kostka` = {$time2} where `numer` = '{$from}' and `kanal` = '{$kanal}'");
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>