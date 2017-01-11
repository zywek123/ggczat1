<?php
$czas = time();
$q=$db->query("select * from `chan` where `numer` = '{$from}' and `sejf` > {$czas} and `kanal` = '{$kanal}'");
if($q->num_rows == 1){
$r=$q->fetch_assoc();
$czekaj = $r['sejf']-time();
die($m->info("Nie możesz otwierać sejfów. Poczekaj aż minie {$main->czas($czekaj)} :("));
}
if(!$parts[1]){
die($m->info("Witaj. Ta komenda umożliwi Ci otwarcie sejfu, w którym znajduje się wiele bardzo pożytecznych rzeczy np. Spreje, tarcze, tarcze elektryczne, puste Pokebolle, oraz niespodzianki np. resety /kolo, /poke, /kradnij, /kosci, /kostka lub /moneta albo resety wszystkich gier. Aby otworzyć jeden z sejfów, wymagane jest posiadanie odpowiedniej liczby kart. Aby otworzyć mały sejf, wpisz/sejf maly wymagane jest posiadanie minimum 2 kart. Aby otworzyć sejf sredni, wpisz /sejf sredni, wymagane jest posiadanie minimum 5 kart. Aby otworzyć duży sejf, wpisz /sejf duży, wymagane jest posiadanie minimum 9 kart. Aby otworzyć ogromny sejf, wpisz /sejf ogromny, wymagane jest posiadanie minimum 12 kart"));
}
if(!in_array($parts[1], array('mały','średni','duży','ogromny'))){
die($m->info("Witaj. Ta komenda umożliwi Ci otwarcie sejfu, w którym znajduje się wiele bardzo pożytecznych rzeczy np. Spreje, tarcze, tarcze elektryczne, puste Pokebolle, oraz niespodzianki np. resety /kolo, /poke, /kradnij, /kosci, /kostka lub /moneta albo resety wszystkich gier. Aby otworzyć jeden z sejfów, wymagane jest posiadanie odpowiedniej liczby kart. Aby otworzyć mały sejf, wpisz/sejf maly wymagane jest posiadanie minimum 2 kart. Aby otworzyć sejf sredni, wpisz /sejf sredni, wymagane jest posiadanie minimum 5 kart. Aby otworzyć duży sejf, wpisz /sejf duży, wymagane jest posiadanie minimum 9 kart. Aby otworzyć ogromny sejf, wpisz /sejf ogromny, wymagane jest posiadanie minimum 12 kart"));
}
$czassejf = (time()+$safe_s);
$db->query("update `chan` set `sejf` = {$czassejf} where `numer` = {$from} and `kanal` = '{$kanal}'");
if($parts[1] == 'mały' || $parts[1] == 'maly'){
if($ukan['karta'] < 2){
die($m->info("Nie posiadasz 2 kart!"));
}
$db->query("update `chan` set `karta` = karta - 2 where `numer` = '{$from}' and `kanal` = '{$kanal}'");
$poke = rand(1,4);
$tarcza = rand(1,4);
$tarcza2 = rand(1,4);
$sprej = rand(1,4);
$m->addmsg("$niczek Postanowił otworzyć mały sejf, w którym czekały na niego:\r\n$poke pustych pokebolli, $tarcza tarcz antypoke, $tarcza2 elektrycznych tarcz antypoke, $sprej sprejów\r\nGratulacje!", $dos);
$db->query("update `chan` set `tarcza` = tarcza + $tarcza, `tarcza2` = tarcza2 + $tarcza2, `poke` = poke + $poke, `sprej` = sprej + $sprej where `numer` = '{$from}' and `kanal` = '{$kanal}'");
}
if($parts[1] == 'średni' || $parts[1] == 'sredni'){
if($ukan['karta'] < 5){
die($m->info("Nie posiadasz 5 kart!"));
}
$db->query("update `chan` set `karta` = karta - 5 where `numer` = '{$from}' and `kanal` = '{$kanal}'");
$poke = rand(1,10);
$tarcza = rand(1,10);
$tarcza2 = rand(1,10);
$sprej = rand(1,10);
$rs = rand(1,6);
if($rs == 1){
$co = "reset /kolo";
$baza = "kolo";
}
if($rs == 2){
$co = "reset /poke";
$baza = "poke3";
}
if($rs == 3){
$co = "reset /kradnij";
$baza = "kieszonkowiec";
}
if($rs == 4){
$co = "reset /kostka";
$baza = "kostka";
}
if($rs == 5){
$co = "reset /kosci";
$baza = "kosci";
}
if($rs == 6){
$co = "reset /moneta";
$baza = "moneta";
}
$m->addmsg("$niczek Postanowił otworzyć średni sejf, w którym czekały na niego:\r\n$poke pustych pokebolli, $tarcza tarcz antypoke, $tarcza2 elektrycznych tarcz antypoke, $sprej sprejów oraz $co\r\nGratulacje!", $dos);
$db->query("update `chan` set `tarcza` = tarcza + $tarcza, `tarcza2` = tarcza2 + $tarcza2, `poke` = poke + $poke, `sprej` = sprej + $sprej, `$baza` = 0 where `numer` = '{$from}' and `kanal` = '{$kanal}'");
}
if($parts[1] == 'duży' || $parts[1] == 'duzy'){
if($ukan['karta'] < 9){
die($m->info("Nie posiadasz 9 kart!"));
}
$db->query("update `chan` set `karta` = karta - 9 where `numer` = '{$from}' and `kanal` = '{$kanal}'");
$poke = rand(1,15);
$tarcza = rand(1,15);
$tarcza2 = rand(1,15);
$sprej = rand(1,15);
$z = rand(1,15000);
$kaska = ceil($z/1000)*1000;
$rs = rand(1,6);
if($rs == 1){
$co = "reset /kolo";
$baza = "kolo";
}
if($rs == 2){
$co = "reset /poke";
$baza = "poke3";
}
if($rs == 3){
$co = "reset /kradnij";
$baza = "kieszonkowiec";
}
if($rs == 4){
$co = "reset /kostka";
$baza = "kostka";
}
if($rs == 5){
$co = "reset /kosci";
$baza = "kosci";
}
if($rs == 6){
$co = "reset /moneta";
$baza = "moneta";
}
$m->addmsg("$niczek Postanowił otworzyć duży sejf, w którym czekały na niego:\r\n$poke pustych pokebolli, $tarcza tarcz antypoke, $tarcza2 elektrycznych tarcz antypoke, $sprej sprejów, $zl zł oraz $co\r\nGratulacje!", $dos);
$db->query("update `chan` set `tarcza` = tarcza + {$tarcza}, `tarcza2` = tarcza2 + {$tarcza2}, `poke` = poke + {$poke}, `sprej` = sprej + {$sprej}, `$baza` = 0, `zl` = zl + {$zl} where `numer` = '{$from}' and `kanal` = '{$kanal}'");
}
if($parts[1] == 'ogromny'){
if($ukan['karta'] < 12){
die($m->info("Nie posiadasz 12 kart!"));
}
$db->query("update `chan` set `karta` = karta - 12 where `numer` = '{$from}' and `kanal` = '{$kanal}'");
$poke = rand(1,30);
$tarcza = rand(1,30);
$tarcza2 = rand(1,30);
$sprej = rand(1,30);
$z = rand(1,70000);
$zl = ceil($z/1000)*1000;
$rs = rand(1,9);
if($rs == 1){
$co = "reset /kolo";
$baza = "kolo";
}
if($rs == 2){
$co = "reset /poke";
$baza = "poke3";
}
if($rs == 3){
$co = "reset /kradnij";
$baza = "kieszonkowiec";
}
if($rs == 4){
$co = "reset /kostka";
$baza = "kostka";
}
if($rs == 5){
$co = "reset /kosci";
$baza = "kosci";
}
if($rs == 6){
$co = "reset /moneta";
$baza = "moneta";
}
if($rs == 7){
$co = "reset wszystkich gier";
$db->query("update `chan` set `kostka` = 0, `kosci` = 0, `moneta` = 0, `poke3` = 0, `kolo` = 0, `okradanie` = 0, `sejf` = 0, `kieszonkowiec` = 0 where `numer` = $from and `kanal` = '$kanal'");
}
if($rs == 8){
$co = "reset sejf";
$baza = "sejf";
}
if($rs == 9){
$co = "reset /okradniij";
$baza = "okradanie";
}
$szczescie = rand(0,50);
if($szczescie > 40){
$mtarcza = rand(1,3);
$mpoke = rand(1,3);
}else{
$mtarcza = 0;
$mpoke = 0;
}
$m->addmsg("$niczek Postanowił otworzyć ogromny sejf, w którym czekały na niego:\r\n$poke pustych pokebolli, $tarcza tarcz antypoke, $tarcza2 elektrycznych tarcz antypoke, $sprej sprejów, $zl zł, $szczescie% szczęścia, co się wiąże z tym, że dostaje $mtarcza magicznych tarcz, $mpoke magicznych pokebolli oraz $co\r\nGratulacje!", $dos);
$db->query("update `chan` set `tarcza` = tarcza + $tarcza, `tarcza2` = tarcza2 + $tarcza2, `poke` = poke + $poke, `sprej` = sprej + $sprej, `$baza` = 0, `zl` = zl + $zl, `mtarcza` = mtarcza + $mtarcza, `mpoke` = mpoke + $mpoke where `numer` = '{$from}' and `kanal` = '{$kanal}'");
}