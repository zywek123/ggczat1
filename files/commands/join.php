<?php
$q=$db->query('select `numer` from `userzy` where `numer` = '.$from.' and `online` = 1');
if($q->num_rows == 1){
if($plec == 1) $jaki = 'zalogowana';
if($plec == 2) $jaki = 'zalogowany';
die($m->info('Hej! Przecież jesteś już '.$jaki.'!'));
}
$czas = time();
$f=$db->query('select `numer` from `userzy` where `numer` = '.$from.' and `wyjscie` > '.$czas);
if($f->num_rows == 1){
$czekaj = $user['wyjscie']-time();
die($m->info('Aby wejść ponownie na czat musisz odczekać jeszcze '.$main->czas($czekaj).' :('));
}
$q=$db->query('select `numer` from `userzy` where `online` = 1 and not `numer` = '.$from.' and `zw` = 0');
while($n=$q->fetch_assoc())
$do[] = $n['numer'];
$fs=$db->query('select `nick`,`numer`,`staff` from `userzy` where `online` = 1 and `spy` = 0 order by `staff` desc');
while($sv=$fs->fetch_assoc())
$zalogowani .= $main->nick($sv['nick'], $sv['staff'])."\r\n";
$oo = $user['opis'];
$t = unserialize(gzinflate(file_get_contents('files/temat.gzd')));
if($t == ''){
$t = 'Brak tematu';
}
$czasdm = date("d-m-Y G:i:s");
if($plec == 1) $cosiestalo = 'zalogowałaś';
if($plec == 2) $cosiestalo = 'zalogowałeś';
$powitanie = "Cześć `nick`! $cosiestalo się na czat!\r\nTwój status gg: `statusgg`\r\nOpis: `opis`\r\nAktualny temat konwersacji: `temat`\r\nAktualnie rozmawiają:\r\n`online`";
$status = file_get_contents("http://status.gadu-gadu.pl/users/.asp?id=".$from."&styl=6");
if(trim($status) == 'unavailable'){
$s = "Niedostępny";
}
if(trim($status) == 'available'){
$s = "Dostępny";
}
if(trim($status) == 'talktome'){
$s = "PoGGadaj ze mną";
}
if(trim($status) == 'busy'){
$s = "Zaraz wraca";
}
if(trim($status) == 'dnd'){
$s = "Nieprzeszkadzać";
}
$czas = time();
$czas2 = (time()+60);
$db->query("update `userzy` set `online` = 1, `wejscia` = wejscia + 1, `czas` = {$czas}, `wejscie` = {$czas2} where `numer` = '{$from}'");
$licz = $main->liczZalogowanych($nr);
if($oo != ""){
$opisek= "\r\nOpis: {$oo}";
}else{
$opisek = "";
}
if($plec == 1) $cozrobil = 'zalogowała';
if($plec == 2) $cozrobil = 'zalogował';
$m->addmsg($niczek." $cozrobil się na czat! :) status gg: $s $opisek\r\n$licz", $do);
$opis = $user['opis'];
$powitanie = str_replace("`nick`","$niczek",$powitanie);
$powitanie = str_replace("`czas`","$czasdm",$powitanie);
$powitanie = str_replace("`numer`","$from",$powitanie);
$powitanie = str_replace("`temat`","$t",$powitanie);
$powitanie = str_replace("`statusgg`","$s",$powitanie);
$powitanie = str_replace("`opis`","$opis",$powitanie);
$powitanie = str_replace("`online`","$zalogowani",$powitanie);
$m->info("{$powitanie}");
?>