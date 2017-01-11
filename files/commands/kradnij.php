<?php
$czas = time();
$q=$db->query("select `kieszonkowiec` from `chan` where `numer` = '{$from}' and `kieszonkowiec` > {$czas} and `kanal` = '{$kanal}'");
if($q->num_rows == 1){
$r=$q->fetch_assoc();
$czekaj = $r['kieszonkowiec']-time();
die($m->info("Nie możesz nikogo okradać. Poczekaj aż minie {$main->czas($czekaj)} :("));
}
include("files/cmd_time.php");
$co = rand(1,5);
if($co == 1){
$wylosowalo = "tarcz antypokebollowych";
$ile = rand(1,5);
$baza = "tarcza";
$cokradnie = "Tarcze antypokebollowe";
$czegonieukradl = "tarcz antypokebollowych";
}
if($co == 2){
$wylosowalo = "elektrycznych tarcz antypokebollowych";
$ile = rand(1,6);
$baza = "tarcza2";
$cokradnie = "Elektryczne tarcze antypokebollowe";
$czegonieukradl = "elektrycznych tarcz antypokebollowych";
}
if($co == 3){
$wylosowalo = "pustych pokebolli";
$ile = rand(1,16);
$baza = "poke";
$cokradnie = "puste pokebolle";
$czegonieukradl = "pustych pokebolli";
}
if($co == 4){
$wylosowalo = "zl";
$ile = rand(1,5000);
$baza = "zl";
$cokradnie = "zł";
$czegonieukradl = "zł";
}
if($co == 5){
$wylosowalo = "kart";
$ile = rand(1,5);
$baza = "karta";
$cokradnie = "karty";
$czegonieukradl = "kart";
}
if(!$parts[1]){
die($m->info("Podaj nick użytkownika!"));
}
$q=$db->query("select `numer`,`nick`,`staff`,`sprej` from `chan` where `nick` like '{$parts[1]}%' and `kanal` = '{$kanal}'");
if($q->num_rows == 0){
die($m->info("podany użytkownik nie istnieje!"));
}
$r=$q->fetch_assoc();
if($r['numer'] == $from){
die($m->info("Nie możesz okradać sam siebie!"));
}
$sprej = $r['sprej'];
if($plec == 1){ $cozrobil = "została brutalnie potraktowana"; $cosiestalo = "została Wyrzucona"; $cosie = "wykradła";
}else if($plec == 2){ $cozrobil = "został brutalnie potraktowany"; $cosiestalo = "został Wyrzucony"; $cosie = "Wykradł"; }
$inf = gg($r['numer']);
$plc = $inf->gender[0];
if($plc == 1){ $kto = "ta biedaczka nie miała"; $komu = "jej";
}else if($plc == 2){ $kto = "ten biedaczek nie miał"; $komu = "mu"; }
$m->addmsg("{$niczek} Próbuje ukraść {$cokradnie} użytkownikowi {$parts[1]}", $dos);
$czask = (time()+$kr_s);
$db->query("update `chan` set `kieszonkowiec` = {$czask} where `numer` = '{$from}' and `kanal` = '{$kanal}'");
sleep(3);
if($sprej > 0){
$m->addmsg("Niestety użytkownikowi {$niczek} Nie udało się ukraść $czegonieukradl użytkownikowi {$parts[1]} ponieważ {$niczek} $cozrobil sprejem przeciw kieszonkowcom\r\nZa karę {$niczek} $cosiestalo z czatu!", $dos);
$db->query("update `chan` set `sprej` = sprej - 1 where `nick` like '{$parts[1]}%' and `kanal` = '{$kanal}'");
$db->query("update `chan` set `online` = 0 where `numer` = '{$from}' and `kanal` = '{$kanal}'");
}else{
$qq=$db->query("select `$baza` from `chan` where `nick` like '{$parts[1]}%' and `{$baza}` < {$ile} and `kanal` = '{$kanal}'");
if($qq->num_rows == 1){
$m->addmsg("kradziesz na użytkownikó {$parts[1]} zakończyła się sukcesem\r\nNiestety $kto {$ile} {$wylosowalo}", $dos);
die;
}else
$m->addmsg("kradziesz na użytkownikó {$parts[1]} zakończyła się sukcesem {$niczek} $cosie $komu: {$ile} {$wylosowalo}", $dos);
$db->query("update `chan` set `{$baza}` = {$baza} - {$ile} where `nick` like '{$parts[1]}%' and `kanal` = '{$kanal}'");
$db->query("update `chan` set `{$baza}` = {$baza} + {$ile} where `numer` = '{$from}' and `kanal` = '{$kanal}'");
}
?>