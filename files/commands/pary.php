<?php
$q=$db->query('select `osoba1`,`osoba2` from `pary` where `slub` = 1');
if($q->num_rows == 0){
die($m->info('Nie ma tu żadnych związków!'));
}
$i = 0;
while($r=$q->fetch_assoc()){
$osoba1 = $r['osoba1'];
$osoba2 = $r['osoba2'];
$i++;
$lista .= "{$i}. {$osoba1} i {$osoba2}\r\n";
}
$m->info("Lista czatowych związków:\r\n{$lista}");
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>