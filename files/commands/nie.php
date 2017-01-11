<?php
	$q = $db->query('SELECT * FROM `pary` WHERE `numer1` = '.$from);
	if($q->num_rows == 0){
die($m->info('Nikt nie złożył Ci propozycji ślubu :('));
}
	while($r = $q->fetch_assoc()){
$osoba1 = $r['osoba1'];
	$osoba2 = $r['osoba2'];
	$numer2 = $r['numer2'];
	$slub = $r['slub'];
	}
	if($slub == 1){
	die($m->info('Już po ślubie :)'));
}
$db->query('DELETE FROM `pary` WHERE `numer1` = '.$from);
$m->addmsg('Niestety! '.$osoba1.' nie kocha usera '.$osoba2.', więc do ślubu nie doszło :(', $dos);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>