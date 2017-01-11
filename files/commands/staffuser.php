<?php
if(!$parts[1]){
die($m->info('Podaj nick użytkownika!'));
}
if($parts[2] == ''){
die($m->info('Podaj staff!'));
}
if(preg_replace('/[^a-zA-Z]/', '', $parts[2])){
die($m->info('Staff musi być tylko liczbą od 0 do 50!'));
}
if($parts[2] < 0 || $parts[2] > 101){
die($m->info('Staff nie może być mniejszy niż 0 i większy niż 100!'));
}
$qq=$db->query('select `numer`,`nick`,`staff` from `userzy` where `nick` = \''.$parts[1].'\'');
if($qq->num_rows == 0){
die($m->info("Podany użytkownik nie istnieje!"));
}
$r=$qq->fetch_assoc();
$numer = $r['numer'];
$jegostaf = $r['staff'];
if(!$b2r3 && $user['staff'] <= $jegostaf){
if($plec == 1) $komu = 'jej';
if($plec == 2) $komu = 'mu';
die($m->info($parts[1].' ma większy lub taki sam staff jak Ty, więc nie możesz zabrać '.$komu.' rangi!'));
}
if(in_array($numer, $b2r3)){
die($m->info("Nie możesz zmieniać staffu właścicielowi skryptu lub czatu!"));
}
$db->query('update `userzy` set `staff` = '.$parts[2].' where `nick` = \''.$parts[1].'\'');
if($parts[2] == 0){
$db->query('update `userzy` set `spy` = 0 where `nick` = \''.$parts[1].'\'');
}
$nick = $main->nick($parts[1], $parts[2]);
if($plec == 1) $cozrobil = 'zmieniła';
if($plec == 2) $cozrobil = 'zmienił';
$m->addmsg($niczek.' '.$cozrobil.' uprawnienia użytkownika '.$nick.' na '.$parts[2], $doo);
$m->addmsg($niczek.' '.$cozrobil.' Ci staff na '.$parts[2].'!', $numer);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>