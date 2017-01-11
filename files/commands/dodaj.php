<?php
if(!$parts[1]){
die($m->info('Podaj swój nick!'));
}
$zabronione = array("\n","\r\n",'@','"','#','$','%','^','^^','&','*','(',')','_','+','<','<3','>','?');
$parts[1] = str_replace($zabronione, '', $parts[1]);
$strl = strlen($parts[1]);
if($strl < 3 || $strl >20){
 die($m->info('Nick musi zawierać od 3 do 20 znaków!'));
 }
$q=$db->query('select `numer` from `userzy` where `nick` = \''.$parts[1].'\'');
if($q->num_rows == 1){
die($m->info('Podany nick jest już zajęty! :( spróbuj wymyślić inny'));
}
$q=$db->query('select `numer` from `userzy` where `numer` = '.$from);
if($q->num_rows == 1){
if($plec == 1) $jaki = 'zarejestrowana';
if($plec == 2) $jaki = 'zarejestrowany';
die($m->info('Ty jesteś już '.$jaki.'!'));
}
$db->query('insert into `userzy` (`numer`, `nick`, `exp`) values ('.$from.', \''.$parts[1].'\', 100)');
if($plec == 1){ $cozrobil = 'zarejestrowała się'; $cozrobiles = 'zarejestrowałaś się';
}else if($plec == 2){ $cozrobil = 'zarejestrował się'; $cozrobiles = 'zarejestrowałeś się'; }
$m->info('Hura! '.$cozrobiles.' na czacie jako: '.$parts[1].' Teraz możesz się zalogować. Wpisz /j by to zrobić');
$q=$db->query('select `numer` from `userzy` where `online` = 1');
while($n=$q->fetch_assoc())
$do[] = $n['numer'];
$m->addmsg('Hura! '.$parts[1].' właśnie '.$cozrobil.' na czacie! :)', $do);
?>