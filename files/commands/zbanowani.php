<?php
$q=$db->query('select `nick`,`numer`,`powod`,`kto`,`czasban`,`staff` from `userzy` where `ban` = 1');
if($q->num_rows == 0){
die($m->info("Nie ma nikogo zbanowanego!"));
}
while($r=$q->fetch_assoc()){
$when = $r['czasban']-$_SERVER['REQUEST_TIME'];
$kiedy = $main->czas($when);
$zbanowani .= "{$main->nick($r['nick'], $r['staff'])} powód: {$r['powod']} ban skończy się za {$kiedy} zbanował(a): {$r['kto']}\r\n";
}
$m->info("Lista zbanowanych:\r\n{$zbanowani}");
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>