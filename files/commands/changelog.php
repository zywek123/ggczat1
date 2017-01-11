<?php
$q=$db->query("select * from `changes` order by `id` desc limit 3");
$i=0;
while($r=$q->fetch_assoc()){
$i++;
$date = date("d.m.Y G:i", $r['time']);
$changes .= "$I) $date - Ogólna wersja: {$r['version']} wersja skryptu: {$r['engver']} Wersja komend: {$r['cmdver']} zmiany: {$r['description']}\r\n";
}
$m->info("Lista zmian:\r\n$changes");
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>