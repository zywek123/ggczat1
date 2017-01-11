<?php
$czas = time();
$q=$db->query("select `okradanie` from `chan` where `numer` = '{$from}' and `okradanie` > {$czas} and `kanal` = '{$kanal}'");
if($q->num_rows == 1){
$r=$q->fetch_assoc();
$czekaj = $r['okradanie']-time();
die($m->info("Nie możesz zkołować hajsu. Poczekaj aż minie {$main->czas($czekaj)} :("));
}
if($plec == 1){  $cozrobil = "ukradła"; $cosiestalo = "straciła"; $komu = "jej";
}else if($plec == 2){ $cozrobil = "ukradł"; $cosiestalo = "stracił"; $komu = "mu"; }
$m->addmsg("$niczek próbuje okraść bank", $dos);
$czasokradnij = (time()+$robbing_s);
$db->query("update `chan` set `okradanie` = $czasokradnij where `numer` = $from and `kanal` = '$kanal'");
sleep(3);
$szczescie = rand(0,100);
if($szczescie >= 50 && $szczescie < 60){
$kask = rand(50000,$robbingmaxzl);
$kaska = ceil($kask/1000)*1000;
}else if($szczescie >= 60 && $szczescie < 70){
$kask = rand(100000,$robbingmaxzl);
$kaska = ceil($kask/1000)*1000;
}else if($szczescie >= 70 && $szczescie < 80){
$kask = rand(150000,$robbingmaxzl);
$kaska = ceil($kask/1000)*1000;
}else if($szczescie >= 80 && $szczescie < 90){
$kask = rand(200000,$robbingmaxzl);
$kaska = ceil($kask/1000)*1000;
}else if($szczescie >= 90){
$kask = rand(300000,$robbingmaxzl);
$kaska = ceil($kask/1000)*1000;
}
if($szczescie >= 50 && $szczescie <= 100){
$m->addmsg("$niczek ma dzisiaj aż $szczescie% szczęścia, dlatego $cozrobil z banku aż $kaska zł", $dos);
$db->query("update `kanaly` set `bank` = bank - $kaska where `kanal` = '$kanal'");
$db->query("update `chan` set `zl` = zl + $kaska where `numer` = $from and `kanal` = '$kanal'");
}else{
$trac = rand(0,$robbingtrzl);
$traci = ceil($trac/1000)*1000;
if(floor($ukan['zl']) < $traci){
die($m->addmsg("Niestety! poziom szczęścia użytkownika $niczek wynosi tylko $szczescie%, a że $niczek nie posiada $traci zł w związku z powyższym nic nie traci ani nie zyskuje!", $dos));
}else{
$m->addmsg("Niestety! Poziom szczęścia użytkownika $niczek wynosił tylko $szczescie%, w związku z tym, $niczek $cosiestalo $traci zł! Może następnym razem $komu się poszczęści.", $dos);
$db->query("update `kanaly` set `bank` = bank + $traci where `kanal` = '$kanal'");
$db->query("update `chan` set `zl` = zl - $traci where `numer` = $from and `kanal` = '$kanal'");
}
}
?>