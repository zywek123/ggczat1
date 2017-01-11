<?php
$ktarcza = 200*$ukan['rabat']/100;
$kelektryczna = 900*$ukan['rabat']/100;
$kpoke = 300*$ukan['rabat']/100;
$ksprej = 450*$ukan['rabat']/100;
$kkarta = 2500*$ukan['rabat']/100;
if(!$parts[1]){
die($m->info("Witaj w komendzie, która umożliwia Ci sprzedanie jakiegoś zabezpieczenia przeciw kieszonkowcom lub tarcz antypokebollowych i elektrycznych tarcz antypokebollowych, pustych pokebolli. Wpisz /sprzedaj tarcza ilość tarcz jeśli chcesz sprzedać tarcze antypokebollową tarcza2 liczba jeśli chcesz sprzedać elektryczną tarczę antypokebollową sprej jeśli chceszsprzedać spreje przeciw kieszonkowcom, poke liczba jeśli chcesz sprzedać puste pokebolle do łapania w nie użytkowników lub kart, do otwierania sejfów"));
}
if(!in_array($parts[1], array('poke', 'tarcza', 'tarcza2', 'sprej', 'karta'))){
die($m->info("Witaj w komendzie, która umożliwia Ci sprzedanie jakiegoś zabezpieczenia przeciw kieszonkowcom lub tarcz antypokebollowych i elektrycznych tarcz antypokebollowych, pustych pokebolli. Wpisz /sprzedaj tarcza ilość tarcz jeśli chcesz sprzedać tarcze antypokebollową tarcza2 liczba jeśli chcesz sprzedać elektryczną tarczę antypokebollową sprej jeśli chceszsprzedać spreje przeciw kieszonkowcom, poke liczba jeśli chcesz sprzedać puste pokebolle do łapania w nie użytkowników lub kart, do otwierania sejfow"));
}
if($parts[2] < 0){
die($m->info("Liczba to znaki z zakresu 0-9!"));
}
if($parts[1] == 'tarcza'){
$mkoszt = floor(200+$ktarcza)*$parts[2];
$koszt1 = floor(200+$ktarcza)*1;
if(!$parts[2]){
die($m->info("Podaj liczbę tarcz! Koszt sprzedania jednej tarczy antypokebollowej to: $koszt1 zł"));
}
if($ukan['tarcza'] < $parts[2]){
die($m->info("Nie posiadasz tyle tarcz!"));
}
$db->query("update `chan` set `tarcza` = tarcza - {$parts[2]}, `zl` = zl + {$mkoszt} where `numer` = '{$from}' and `kanal` = '{$kanal}'");
$m->addmsg("{$niczek} Sprzedał {$parts[2]} Tarcz antypokebollowych za {$mkoszt} zł", $dos);
}
if($parts[1] == 'tarcza2'){
$mkoszt = floor(900+$kelektryczna)*$parts[2];
$koszt1 = floor(900+$kelektryczna)*1;
if(!$parts[2]){
die($m->info("Podaj liczbę tarcz! Koszt sprzedania jednej elektrycznej tarczy antypokebollowej to: $koszt1 zł"));
}
if($ukan['tarcza2'] < $parts[2]){
die($m->info("Nie posiadasz tyle tarcz!"));
}
$db->query("update `chan` set `tarcza2` = tarcza2 - {$parts[2]}, `zl` = zl + {$mkoszt} where `numer` = '{$from}' and `kanal` = '{$kanal}'");
$m->addmsg("{$niczek} Sprzedał {$parts[2]} elektrycznych tarcz antypokebollowych za {$mkoszt} zł", $dos);
}
if($parts[1] == 'sprej'){
$mkoszt = floor(450+$ksprej)*$parts[2];
$koszt1 = floor(450+$ksprej)*1;
if(!$parts[2]){
die($m->info("Podaj liczbę sprejów! Koszt sprzedania jednego spreju to: $koszt1 zł"));
}
if($ukan['sprej'] < $parts[2]){
die($m->info("Nie posiadasz tyle sprejów!"));
}
$db->query("update `chan` set `sprej` = sprej - {$parts[2]}, `zl` = zl + {$mkoszt} where `numer` = '{$from}' and `kanal` = '{$kanal}'");
$m->addmsg("{$niczek} Sprzedał {$parts[2]} sprejów przeciw kieszonkowcom za {$mkoszt} zł", $dos);
}
if($parts[1] == 'poke'){
$mkoszt = floor(300+$kpoke)*$parts[2];
$koszt1 = floor(300+$kpoke)*1;
if(!$parts[2]){
die($m->info("Podaj liczbę pustych pokebolli! Koszt sprzedania jednego pustego pokebolla to: $koszt1 zł"));
}
if($ukan['poke'] < $parts[2]){
die($m->info("Nie posiadasz tyle poków!"));
}
$db->query("update `chan` set `poke` = poke - {$parts[2]}, `zl` = zl + {$mkoszt} where `numer` = '{$from}' and `kanal` = '{$kanal}'");
$m->addmsg("{$niczek} Sprzedał {$parts[2]} pustych pokebolli za {$mkoszt} zł", $dos);
}
if($parts[1] == 'karta'){
$mkoszt = floor(2500+$kkarta)*$parts[2];
$koszt1 = floor(2500+$kkarta)*1;
if(!$parts[2]){
die($m->info("Podaj liczbę kart! Koszt sprzedania jednej karty to: $koszt1 zł"));
}
if($ukan['karta'] < $parts[2]){
die($m->info("Nie posiadasz tyle kart!"));
}
$db->query("update `chan` set `karta` = karta - {$parts[2]}, `zl` = zl + {$mkoszt} where `numer` = '{$from}' and `kanal` = '{$kanal}'");
$m->addmsg("{$niczek} Sprzedał {$parts[2]} kart za {$mkoszt} zł", $dos);
}
?>