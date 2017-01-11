<?php
if(!$parts[1]){
die($m->info('Podaj komendę!'));
}
$q=$db->query('select * from `komendy` where `komenda` = \''.$parts[1].'\' OR `alias` = \''.$parts[1].'\'');
if($q->num_rows == 0){
die($m->info('Brak komendy '.$parts[1].'! sprawdź listę dostępnych komend wpisując /pomoc'));
}
$r=$q->fetch_assoc();
$komenda = $r['komenda'];
$alias = $r['alias'];
$stafff = $r['staff'];
$id = $r['id'];
$opis = $r['opis'];
if($alias == '/'){
$alias = "BRAK DANYCH";
}
$informacja = "Komenda dostępna od staffu: {$stafff}\r\nKomenda o id {$id} {$komenda} alias: {$alias} opis: {$opis}";
$m->info("Informacje o komendzie: {$parts[1]}: {$informacja}");
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>