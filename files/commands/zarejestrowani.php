<?php
$q=$db->query('select `id`,`nick`,`numer`,`staff` from `userzy` order by `id` asc');
if($q->num_rows == 0){
die($m->info("Nie ma nikogo zarejestrowanego!"));
}
while($r=$q->fetch_assoc()){
$lista .= "{$r['id']} {$main->nick($r['nick'], $r['staff'])}\r\n";
}
$m->info("Lista zarejestrowanych:\r\n{$lista}");
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>