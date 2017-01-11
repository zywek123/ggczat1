<?php
extract($GLOBALS);
if($parts[1] == "lista"){
$q=$db->query("select `nick`,`wartosc` from `schwytani` where `schwytany` = 1 and `przez` = '{$from}'");
if($q->num_rows == 0){
die($m->info("Nie masz nikogo w pokebollu!"));
}
while($r=$q->fetch_assoc()){
$tzld = floor($r['wartosc']);
$x=$db->query("select sum(wartosc) as suma from `schwytani` where `przez` = '{$from}'");
while($xa=$x->fetch_assoc()){
$c = floor($xa['suma']);
}
$lista .= $main->nick($r['nick'], $r['staff'])." wartość: ".$tzld." zł\r\n";
}
$m->info("Lista Osób które schwytałeś w pokebolla:\r\n{$lista}\r\nŁączna wartość schwytanych przez Ciebie: {$c} zł");
die;
}
if($parts[1] == "sprzedaj"){
if(!$parts[2]){
die($m->info("Podaj nick użytkownika!"));
}
$q=$db->query("select `nick`,`wartosc`,`numer` from `schwytani` where `nick` = '{$parts[2]}' and `schwytany` = 1 and `przez` = '{$from}'");
if($q->num_rows == 0){
die($m->info("Nie możesz sprzedać tego użytkownika ponieawż nie złapałeś go w pokebolla!"));
}
$r=$q->fetch_assoc();
$wartosc = floor($r['wartosc']);
$numer = $r['numer'];
$db->query("delete from `schwytani` where `schwytany` = 1 and `nick` = '{$parts[2]}' and `przez` = '{$from}'");
$db->query("update `chan` set `zl` = zl - {$wartosc} where `numer` = $numer and `kanal` = '{$kanal}'");
$db->query("update `chan` set `zl` = zl + {$wartosc}, `poke2` = poke2 - 1 where `numer` = '{$from}' and `kanal` = '{$kanal}'");
$m->addmsg("{$niczek} Sprzedaje użytkownika {$parts[2]} za cene: ".$wartosc." zł", $dos);
die;
}
else
$czas = time();
$q=$db->query("select `poke3` from `chan` where `numer` = '{$from}' and `poke3` > {$czas} and `kanal` = '{$kanal}'");
if($q->num_rows == 1){
$r=$q->fetch_assoc();
$czekaj = $r['poke3']-time();
die($m->info("Nie możesz rzucać pokebollem w nikogo. Poczekaj aż minie {$main->czas($czekaj)} :("));
}
include("files/cmd_time.php");
if(!$parts[1]){
die($m->info("wpisz kogo chcesz zlapać w pokebolla"));
}
$q=$db->query("select `nick`,`numer`,`tarcza`,`tarcza2`,`mtarcza` from `chan` where `nick` like '{$parts[1]}%' and `kanal` = '{$kanal}'");
if($q->num_rows == 0){
die($m->info("Podany użytkownik nie istnieje!"));
}
$r=$q->fetch_assoc();
$tarcza = $r['tarcza'];
$tarcza2 = $r['tarcza2'];
$mtarcza = $r['mtarcza'];
$nr = $r['numer'];
if($r['numer'] == $from){
die($m->info("Nie możesz łapać sam siebie!"));
}
$qq=$db->query("select `nick` from `schwytani` where `nick` like '{$parts[1]}%' and `schwytany` = 1 and `przez` = '{$from}'");
if($qq->num_rows == 1){
die($m->info("Nie możesz łapać ponownie tej samej osoby!"));
}
if($ukan['poke'] == 0){
die($m->info("Nie masz pustych pokebolli"));
}
$m->addmsg("{$niczek} rzucił pokebollem w stronę {$parts[1]}", $dos);
$czasp = (time()+$poke_s);
$db->query("update `chan` set `poke3` = {$czasp} where `numer` = '{$from}' and `kanal` = '{$kanal}'");
sleep(3);
$co = rand(1,3);
if($co == 1){
$naco = "tarczę antypokebollową";
$baza = "tarcza";
$traci = $ukan['zl']*0.1;
$cotraci = "{$niczek} traci 10% zł ".floor($traci)." Które trafiają na konto użytkownika {$parts[1]}";
}
if($co == 2){
$naco = "elektryczną tarczę antypokebollową";
$baza = "tarcza2";
$traci = $ukan['zl']*0.25;
$cotraci = "{$niczek} traci 25% zł ".floor($traci)." Które trafiają na konto użytkownika {$parts[1]}";
}
if($co == 3){
$naco = "elektryczną tarczę antypokebollową";
$baza = "tarcza2";
$traci = $ukan['zl']*0.25;
$cotraci = "{$niczek} traci 25% zł ".floor($traci)." Które trafiają na konto użytkownika {$parts[1]}";
}
$qq=$db->query("select `nick`,`$baza` from `chan` where `nick` like '{$parts[1]}%' and `{$baza}` > 0 and `kanal` = '{$kanal}'");
if($qq->num_rows == 0){
$m->addmsg("Brawo {$niczek} zchwytał Użytkownika {$parts[1]} w pokebolla i teraz może go sprzedać wpisując /poke sprzedaj {$parts[1]}\r\n{$niczek} Może zobaczyć kogo schwytał w /poke lista", $dos);
$db->query("insert into `schwytani` (`nick`, `numer`, `schwytany`, `przez`) values ('{$parts[1]}', $nr, 1, '{$from}')");
$db->query("update `chan` set `poke` = poke - 1, `poke2` = poke2 + 1 where `numer` = '{$from}' and `kanal` = '{$kanal}'");
die;
}else
if($ukan['mpoke'] > 0){
sleep(3);
if($mtarcza == 0){
$m->addmsg("{$niczek} Rzucając w {$parts[1]} Magicznym pokebollem przełamał jego zabezpieczenia i schwytał go w pokebolla i teraz może go sprzedać wpisując /poke sprzedaj {$parts[1]}\r\n{$niczek} Może zobaczyć kogo schwytał w /poke lista", $dos);
$db->query("insert into `schwytani` (`nick`, `numer`, `schwytany`, `przez`) values ('{$parts[1]}', $nr, 1, '{$from}')");
$db->query("update `chan` set `mpoke` = mpoke - 1, `poke2` = poke2 + 1 where `numer` = '{$from}' and `kanal` = '{$kanal}'");
die;
}else
$m->addmsg("{$niczek} Rzucając w {$parts[1]} Magicznym pokebollem zapomniał, że istnieje coś takiego jak magiczna tarcza antypokebollowa na którą natknął się w tym momencie i jego magiczny pokeboll odbił się i pofrunął gdzieś daleko", $dos);
$db->query("update `chan` set `mtarcza` = mtarcza -1 where `nick` like = '{$parts[1]}%' and `kanal` = '{$kanal}'");
sleep(3);
$m->addmsg("Po długim locie zrezygnowany  magiczny pokeboll zawrócił i zwięlką prędkością przebił się przez zabezpieczenia użytkownika $niczek i w ten oto sposób $niczek złapał sam Siebie :p", $dos);
$parts[1] = $ukan['nick'];
$db->query("insert into `schwytani` (`nick`, `numer`, `schwytany`, `przez`) values ('{$parts[1]}', $from, 1, '{$from}')");
$db->query("update `chan` set `mpoke` = mpoke - 1, `poke2` = poke2 + 1 where `numer` = '{$from}' and `kanal` = '{$kanal}'");
$db->query("update `chan` set `mtarcza` = mtarcza -1 where `nick` like = '{$parts[1]}%' and `kanal` = '{$kanal}'");
die;
}else
$m->addmsg("Niestety użytkownikowi {$niczek} Nie udało się złapać w pokebolla użytkownika {$parts[1]} Ponieważ {$niczek} Trafił na {$naco}\r\n{$cotraci}", $dos);
$db->query("update `chan` set `zl` = zl - {$traci}, `poke` = poke - 1 where `numer` = '{$from}' and `kanal` = '{$kanal}'");
$db->query("update `chan` set `{$baza}` = {$baza} - 1, `zl` = zl + {$traci} where `nick` like '{$parts[1]}%' and `kanal` = '{$kanal}'");
?>