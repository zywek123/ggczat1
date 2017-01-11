<?php
if(!$parts[1]){
die($m->info('Podaj nick użytkownika!'));
}
$q=$db->query('select * from `userzy` where `nick` like \''.$parts[1].'%\'');
if($q->num_rows == 0){
die($m->info('Podany użytkownik nie istnieje!'));
}
$r=$q->fetch_assoc();
$czas = $r['czas'];
$nick = $r['nick'];
$stafff = $r['staff'];
$gg = $r['numer'];
$inf = gg($gg);
$plc = $inf->gender[0];
if($plc == 1){ $kto = 'kobieta'; $cozrobil1 = 'wysłała'; $cozrobil2 = 'aktywna'; $cozrobil3 = 'zalogowana';
}else if($plc == 2){ $kto = 'mężczyzna'; $cozrobil1 = 'wysłał'; $cozrobil2 = 'aktywny'; $cozrobil3 = 'zalogowany'; }
if($stafff > 99){
$gg  = "UKRYTY";
$stafff = "ADMINISTRATOR";
}
$zgoda = $r['zgoda'];
$znaki = $r['znaki'];
$msg = $r['wiadomosci'];
$wyrazy = $r['wyrazy'];
$wejscia = $r['wejscia'];
$zalogow = $r['online'];
$exp1 = $r['xp'];
$exp2 = $r['exp'];
$exp = $r['lvl'];
$time = $main->czas(time()-$czas)." temu";
if($zalogow == 0){
$zal = "NIE";
}
if($zalogow == 1){
$zal = "TAK";
}
if($time == ''){
$time = "BRAK DANYCH";
}
if($nick == ''){
	$nick = "BRAK DANYCH";
}
$info = "Nick: {$nick}\r\nNumer: {$gg}\r\npłeć: {$kto}\r\nstaff: {$stafff}\r\n$cozrobil1 {$znaki} znaków {$wyrazy} słów {$msg} wiadomości\r\nOstatnio $cozrobil2: {$time}\r\n$cozrobil3: {$zal}\r\nPoziom użytkownika: {$exp}\r\nDoświadczenie: {$exp1} / {$exp2}";
$m->info("Informacje o użytkowniku: {$parts[1]}\r\n{$info}");
?>