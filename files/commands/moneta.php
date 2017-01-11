<?php
$czas = time();
$q=$db->query("select `moneta` from `chan` where `numer` = '{$from}' and `moneta` > {$czas} and `kanal` = '{$kanal}'");
if($q->num_rows == 1){
$r=$q->fetch_assoc();
$czekaj = $r['moneta']-time();
die($m->info("Aby zagrać ponownie w {$parts[0]} musisz odczekać jeszcze {$main->czas($czekaj)}"));
}
include("files/cmd_time.php");
if(!$parts[1]){
die($m->info("Witaj! Wpisz {$parts[0]} 1 lub 2 1 to orzeł 2 to reszka aby obstawić jaką stroną do gury upadnie moneta"));
}
$co = rand(1, 2);
if(!in_array($parts[1], array(1, 2))){
die($m->info("Witaj! Wpisz {$parts[0]} 1 lub 2 1 to orzeł 2 to reszka aby obstawić jaką stroną do gury upadnie moneta"));
}
if($plec == 1) $cozrobil = "obstawiła";
if($plec == 2) $cozrobil = "obstawił";
if($parts[1] == 2){
$m->addmsg("{$niczek} rzucając monetą obstawia że wypadnie reszka", $dos);
sleep(3);
if($co == 2)
$m->addmsg("brawo {$niczek} poprawnie $cozrobil za to {$niczek} dostaje 120 zł :)", $dos);
 $db->query("update `chan` set `zl` = zl + 120 where `numer` = '{$from}' and `kanal` = '{$kanal}'");
 if($co != 2)
 $m->addmsg("Niestety {$niczek} źle $cozrobil na pocieszenie {$niczek} otrzymuje 3 zł :)", $dos);
 $db->query("update `chan` set `zl` = zl + 3 where `numer` = '{$from}' and `kanal` = '{$kanal}'");
  }
if($parts[1] == 1){
$m->addmsg("{$niczek} rzucając monetą obstawia że wypadnie Orzeł", $dos);
sleep(3);
if($co == 1)
$m->addmsg("brawo {$niczek} poprawnie $cozrobil za to {$niczek} dostaje 120 zł :)", $dos);
 $db->query("update `chan` set `zl` = zl + 120 where `numer` = '{$from}' and `kanal` = '{$kanal}'");
 if($co != 1)
 $m->addmsg("Niestety {$niczek} źle $cozrobil na pocieszenie {$niczek} dostaje 3 zł :)", $dos);
 $db->query("update `chan` set `zl` = zl + 3 where `numer` = '{$from}' and `kanal` = '{$kanal}'");
 }
 $czass = (time()+$coin_s);
$db->query("update `chan` set `moneta` = {$czass} where `numer` = '{$from}' and `kanal` = '{$kanal}'"); 
?>