<?php
$koszttarcza = 7500*$user['rabat']/100;
$kosztelektryczna = 12500*$user['rabat']/100;
$kosztsprej = 6000*$user['rabat']/100;
$kosztpoke = 5000*$user['rabat']/100;
if(!$parts[1]){
die($m->info('Witaj w komendzie, która umożliwia Ci kupienie jakiegoś zabezpieczenia przeciw kieszonkowcom lub tarcz antypokebollowych i elektrycznych tarcz antypokebollowych, pustych pokebolli. Wpisz /kup tarcza ilość tarcz jeśli chcesz kupić tarcze antypokebollową tarcza2 liczba jeśli chcesz kupić elektryczną tarczę antypokebollową sprej jeśli chceszkupić spreje przeciw kieszonkowcom, poke liczba jeśli chcesz kupić puste pokebolle do łapania w nie użytkowników'));
}
if(!in_array($parts[1], array('poke', 'tarcza', 'tarcza2', 'sprej'))){
die($m->info('Witaj w komendzie, która umożliwia Ci kupienie jakiegoś zabezpieczenia przeciw kieszonkowcom lub tarcz antypokebollowych i elektrycznych tarcz antypokebollowych, pustych pokebolli. Wpisz /kup tarcza ilość tarcz jeśli chcesz kupić tarcze antypokebollową tarcza2 liczba jeśli chcesz kupić elektryczną tarczę antypokebollową sprej jeśli chceszkupić spreje przeciw kieszonkowcom, poke liczba jeśli chcesz kupić puste pokebolle do łapania w nie użytkowników'));
}
if($parts[2] < 0){
die($m->info('nie na minusie! nie wycwanisz się!'));
}
if($parts[1] == 'tarcza'){
$mkoszt = floor(7500-$koszttarcza)*$parts[2];
$koszt1 = floor(7500-$koszttarcza)*1;
if(!$parts[2]){
die($m->info('Podaj liczbę tarcz! Koszt kupienia jednej tarczy antypokebollowej to: '.$koszt1.' zł'));
}
if($user['zl'] < $mkoszt){
die($m->info('Nie posiadasz wystarczającej liczby zł!'));
}
$db->query('update `userzy` set `tarcza` = tarcza + '.$parts[2].', `zl` = zl - '.$mkoszt.' where `numer` = '.$from);
if($plec == 1) $corobi = "kupiłaś";
if($plec == 2) $corobi = "kupiłeś";
$m->info($corobi.' sobie '.$parts[2].' tarcz antypokebollowych za cenę: '.$mkoszt.' zł');
}
if($parts[1] == 'tarcza2'){
$mkoszt = floor(12500-$kosztelektryczna)*$parts[2];
$koszt1 = floor(12500-$kosztelektryczna)*1;
if(!$parts[2]){
die($m->info('Podaj liczbę tarcz! Koszt kupienia jednej elektrycznej tarczy antypokebollowej to: '.$koszt1.' zł'));
}
if($user['zl'] < $mkoszt){
die($m->info('Nie posiadasz wystarczającej liczby zł!'));
}
$db->query('update `userzy` set `tarcza2` = tarcza2 + '.$parts[2].', `zl` = zl - '.$mkoszt.' where `numer` = '.$from);
if($plec == 1) $corobi = "kupiłaś";
if($plec == 2) $corobi = "kupiłeś";
$m->info($corobi.' sobie '.$parts[2].' elektrycznych tarcz antypokebollowych za cenę: '.$mkoszt.' zł');
}
if($parts[1] == 'sprej'){
$mkoszt = floor(6000-$kosztsprej)*$parts[2];
$koszt1 = floor(6000-$kosztsprej)*1;
if(!$parts[2]){
die($m->info('Podaj liczbę sprejów! Koszt kupienia jednego spreju to: '.$koszt1.' zł'));
}
if($user['zl'] < $mkoszt){
die($m->info('Nie posiadasz wystarczającej liczby zł!'));
}
$db->query('update `userzy` set `sprej` = sprej + '.$parts[2].', `zl` = zl - '.$mkoszt.' where `numer` = '.$from);
if($plec == 1) $corobi = "kupiłaś";
if($plec == 2) $corobi = "kupiłeś";
$m->info($corobi.' sobie '.$parts[2].' sprejów przeciw kieszonkowcom za cenę: '.$mkoszt.' zł');
}
if($parts[1] == 'poke'){
$mkoszt = floor(5000-$kosztpoke)*$parts[2];
$koszt1 = floor(5000-$kosztpoke)*1;
if(!$parts[2]){
die($m->info('Podaj liczbę pustych pokebolli! Koszt kupienia jednego pustego pokebolla to: '.$koszt1.' zł'));
}
if($user['zl'] < $mkoszt){
die($m->info('Nie posiadasz wystarczającej liczby zł!'));
}
$db->query('update `userzy` set `poke` = poke + '.$parts[2].', `zl` = zl - '.$mkoszt.' where `numer` = '.$from);
if($plec == 1) $corobi = "kupiłaś";
if($plec == 2) $corobi = "kupiłeś";
$m->info($corobi.' sobie '.$parts[2].' pustych pokebolli za cenę: '.$mkoszt.' zł');
}
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>