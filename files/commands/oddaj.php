<?php
if(!$parts[1]){
die($m->info('Podaj nick osoby, z którą masz ślub, aby jej cos oddać!'));
}
if(!$parts[2]){
die($m->info('Podaj co chcesz oddać użytkownikowi '.$parts[1].'! możesz oddać, puste pokebolle, tarcze, elektryczne tarcze, spreje, karty magiczne pokebolle oraz magiczne tarcze! wpisując odpowiednio '.$parts[0].' poke, sprej, tarcza, tarcz2, mtarcza oraz karta a następnie ilość!'));
}
if(!in_array($parts[2], array('poke','mpoke','tarcza','tarcza2','mtarcza','sprej','karta'))){
die($m->info('Podaj co chcesz oddać użytkownikowi '.$parts[1].'! możesz oddać, puste pokebolle, tarcze, elektryczne tarcze, spreje, karty magiczne pokebolle oraz magiczne tarcze! wpisując odpowiednio '.$parts[0].' poke, sprej, tarcza, tarcz2, mtarcza oraz karta a następnie ilość!'));
}
if(!$parts[3]){
die($m->info('Wpisz '.$parts[0].' '.$parts[1].' '.$parts[2].' liczba!'));
}
if(!preg_replace('/[^0-9]/', '', $parts[3])){
die($m->info("Liczba to znaki z zakresu 0-9!"));
}
$q=$db->query("select `numer` from `chan` where `nick` = '$parts[1]' and `kanal` = '$kanal'");
if($q->num_rows == 0){
die($m->info('Użytkownik '.$parts[1].' nie istnieje!'));
}
$r=$q->fetch_assoc();
$nr = $r['numer'];
$baza = convert_to_nick($nr, $kanal);
if($parts[2] == 'poke'){
if($ukan['poke'] < $parts[3]){
die($m>info('Nie posiadasz '.$parts[3].' pustych pokebolli!'));
}
$db->query("update `chan` set `poke` = poke - $parts[3] where `numer` = $from and `kanal` = '$kanal'");
$co = 'pustych pokebolli';
$db->query("update `chan` set `poke` = poke + $parts[3] where `numer` = $nr and `kanal` = '$kanal'");
}
if($parts[2] == 'sprej'){
if($ukan['sprej'] < $parts[3]){
die($m->info('Nie posiadasz '.$parts[3].' sprejów!'));
}
$db->query("update `chan` set `sprej` = sprej - $parts[3] where `numer` = $from and `kanal` = '$kanal'");
$co = 'sprejów';
$db->query("update `chan` set `sprej` = sprej + $parts[3] where `numer` = $nr and `kanal` = '$kanal'");
}
if($parts[2] == 'karta'){
if($ukan['karta'] < $parts[3]){
die($m->info('Nie posiadasz '.$parts[3].' kart!'));
}
$db->query("update `chan` set `karta` = karta - $parts[3] where `numer` = $from and `kanal` = '$kanal'");
$co = 'kart';
$db->query("update `chan` set `karta` = karta + $parts[3] where `numer` = $nr and `kanal` = '$kanal'");
}
if($parts[2] == 'mpoke'){
if($ukan['mpoke'] < $parts[3]){
die($m->info('Nie posiadasz '.$parts[3].' magicznych pokebolli!'));
}
$db->query("update `chan` set `mpoke` = mpoke - $parts[3] where `numer` = $from and `kanal` = '$kanal'");
$co = 'magicznych pokebolli';
$db->query("update `chan` set `mpoke` = mpoke + $parts[3] where `numer` = $nr and `kanal` = '$kanal'");
}
if($parts[2] == 'mtarcza'){
if($ukan['mtarcza'] < $parts[3]){
die($m->info('Nie posiadasz '.$parts[3].' magicznych tarcz!'));
}
$db->query("update `chan` set `mtarcza` = mtarcza - $parts[3] where `numer` = $from and `kanal` = '$kanal'");
$co = 'magicznych tarcz';
$db->query("update `chan` set `mtarcza` = mtarcza + $parts[3] where `numer` = $nr and `kanal` = '$kanal'");
}
if($parts[2] == 'tarcza'){
if($ukan['tarcza'] < $parts[3]){
die($m->info('Nie posiadasz '.$parts[3].' tarcz!'));
}
$db->query("update `chan` set `tarcza` = tarcza - $parts[3] where `numer` = $from and `kanal` = '$kanal'");
$co = 'tarcz';
$db->query("update `chan` set `tarcza` = tarcza + $parts[3] where `numer` = $nr and `kanal` = '$kanal'");
}
if($parts[2] == 'tarcza2'){
if($ukan['tarcza2'] < $parts[3]){
die($m->info('Nie posiadasz '.$parts[3].' elektrycznych tarcz!'));
}
$db->query("update `chan` set `tarcza2` = tarcza2 - $parts[3] where `numer` = $from and `kanal` = '$kanal'");
$co = 'elektrycznych tarcz';
$db->query("update `chan` set `tarcza2` = tarcza2 + $parts[3] where `numer` = $nr and `kanal` = '$kanal'");
}
$m->addmsg($niczek.' Daje użytkownikowi '.$baza.' '.$parts[3].' '.$co, $dos);
?>