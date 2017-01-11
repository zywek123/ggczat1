<?php
	if (!$parts[1]){
	die($m->info('Podaj nick osoby, która ma zostać Twoją drugą połówką!'));
}
	$osoba1 = $parts[1];
	$q = $db->query('SELECT `numer` FROM `userzy` WHERE `nick` = \''.$osoba1.'\'');
	while($r = $q->fetch_assoc()){
	$numer1 = $r['numer'];
	$numer2 = $from;
 } 
  if ($from == $numer1){
	die($m->info('Nie możesz wziąć ślubu ze sobą!'));
}
	if($q->num_rows == 0){
	die($m->info('Podany użytkownik nie istnieje!')); 
}
$inf = gg($numer1);
$plc = $inf->gender[0];
if($plec == 1 and $plc == 1){
	die($m->info('nie tolerujemy tu takich związków!'));
}
if($plec == 2 and $plc == 2){
	die($m->info('nie tolerujemy tu takich związków!'));
}
$qqqq = $db->query('SELECT `osoba1` FROM `pary` WHERE `slub` = 1 AND `osoba1` = \''.$osoba1.'\'');
	if($qqqq->num_rows == 1){
	die($m->info('Podana osoba ma już ślub z kimś innym.'));
}
	$qqqqq = $db->query('SELECT `osoba1` FROM `pary` WHERE `slub` = 0 AND `osoba1` = \''.$osoba1.'\'');
	if($qqqqq->num_rows == 1){
	die($m->info('Podana osoba jest zaręczona z kimś innym.'));
}
	$qqq = $db->query('SELECT `numer1`,`numer2` FROM `pary` WHERE `numer2` = '.$from.' OR `numer1` = '.$from);
	if($qqq->num_rows == 1){
	die($m->info('Możesz mieć ślub tylko z jedną osobą!')); 
}
	$qq = $db->query('SELECT `nick`,`numer` FROM `userzy` WHERE `numer` = '.$from);
	while($r = $qq->fetch_assoc())
	$osoba2 = $r['nick'];
	$db->query('INSERT INTO `pary` (`osoba1`, `osoba2`, `numer1`, `numer2`) VALUES (\''.$osoba1.'\', \''.$osoba2.'\', '.$numer1.', '.$numer2.')');
	$m->addmsg("Użytkownik ".$osoba2." chce być w małżeństwie z ".$osoba1."\r\n".$osoba1.". Wpisz /tak albo /nie", $dos);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
	?>