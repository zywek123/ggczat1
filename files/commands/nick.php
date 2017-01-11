<?php
if(!$parts[1]){
die($m->info('Podaj stary nick!'));
}
if($parts[2] == ''){
die($m->info('Podaj nowy nick!'));
}
if(preg_match('/[^0-9a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]/', $parts[2])){
die($m->info('Nick może zawierać tylko znaki Polskie oraz a-z A-Z 0-9 !'));
}
$strl = strlen($parts[2]);
if($strl < 3 || $strl >20){
die($m->info('Nick musi zawierać od 3 do 20 znaków!'));
 }
$q=$db->query('select `nick` from `userzy` where `nick` = \''.$parts[1].'\'');
if($q->num_rows == 0){
die($m->info('Podany użytkownik nie istnieje!'));
}
 $qq=$db->query('select `nick` from `userzy` where `nick` = \''.$parts[2].'\'');
if($qq->num_rows == 1){
die($m->info('Nicku '.$parts[1].' używa już jakaś osoba! wymyśl inny nick!'));
}
 $db->query('update `userzy` set `nick` = \''.$parts[2].'\' where `nick` = \''.$parts[1].'\'');
if($plec == 1) $cozrobil = "zmieniła";
if($plec == 2) $cozrobil = "zmienił";
 $m->addmsg($niczek.' '.$cozrobil.' nick użytkownikowi '.$parts[1].' na '.$parts[2].'!', $doo);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>