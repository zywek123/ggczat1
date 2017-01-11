<?php
$czas = time();
$q=$db->query('select `kolo` from `userzy` where `numer` = '.$from.' and `kolo` > '.$czas);
if($q->num_rows == 1){
$r=$q->fetch_assoc();
$waitwheel = $r['kolo']-time();
$czekajkol = 'dostępne za: '.$main->czas($waitwheel);
}else{
$czekajkol = 'już możesz grać';
}
$qq=$db->query('select `kosci` from `userzy` where `numer` = '.$from.' and `kosci` > '.$czas);
if($qq->num_rows == 1){
$rr=$qq->fetch_assoc();
$waitdices = $rr['kosci']-time();
$czekajkos = 'dostępne za: '.$main->czas($waitdices);
}else{
$czekajkos = 'już możesz grać';
}
$qqq=$db->query('select `kostka` from `userzy` where `numer` = '.$from.' and `kostka` > '.$czas);
if($qqq->num_rows == 1){
$rrr=$qqq->fetch_assoc();
$waitdice = $rrr['kostka']-time();
$czekajko = 'dostępna za: '.$main->czas($waitdice);
}else{
$czekajko = 'już możesz grać';
}
$qqqq=$db->query('select `kieszonkowiec` from `userzy` where `numer` = '.$from.' and `kieszonkowiec` > '.$czas);
if($qqqq->num_rows == 1){
$rrrr=$qqqq->fetch_assoc();
$waitsteal = $rrrr['kieszonkowiec']-time();
$czekajkr = 'dostępne za: '.$main->czas($waitsteal);
}else{
$czekajkr = 'już możesz grać';
}
$qqqqq=$db->query('select `moneta` from `userzy` where `numer` = '.$from.' and `moneta` > '.$czas);
if($qqqqq->num_rows == 1){
$rrrrr=$qqqqq->fetch_assoc();
$waitcoin = $rrrrr['moneta']-time();
$czekajmo = 'dostępna za: '.$main->czas($waitcoin);
}else{
$czekajmo = 'już możesz grać';
}
$qqqqqq=$db->query('select `poke3` from `userzy` where `numer` = '.$from.' and `poke3` > '.$czas);
if($qqqqqq->num_rows == 1){
$rrrrrr=$qqqqqq->fetch_assoc();
$waitpoke = $rrrrrr['poke3']-time();
$czekajpo = 'dostępne za: '.$main->czas($waitpoke);
}else{
$czekajpo = 'już możesz grać';
}
$qqqqqqq=$db->query('select `okradanie` from `userzy` where `numer` = '.$from.' and `okradanie` > '.$czas);
if($qqqqqqq->num_rows == 1){
$rrrrrrr=$qqqqqqq->fetch_assoc();
$waitokradnij = $rrrrrrr['okradanie']-time();
$czekajok = 'dostępne za: '.$main->czas($waitokradnij);
}else{
$czekajok = 'już możesz grać';
}
$qqqqqqqq=$db->query('select `sejf` from `userzy` where `numer` = '.$from.' and `sejf` > '.$czas);
if($qqqqqqqq->num_rows == 1){
$rrrrrrrr=$qqqqqqqq->fetch_assoc();
$waitsejf = $rrrrrrrr['sejf']-time();
$czekajse = 'dostępne za: '.$main->czas($waitsejf);
}else{
$czekajse = 'już możesz grać';
}
$odczekac = "/kolo - {$czekajkol}\r\n/kosci = {$czekajkos}\r\n/kostka - {$czekajko}\r\n/kradnij - {$czekajkr}\r\n/moneta - {$czekajmo}\r\n/poke - {$czekajpo}\r\n/okradnij - {$czekajok}\r\n/sejf - {$czekajse}";
$m->info("Dostępne gry:\r\n{$odczekac}");
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>