<?php
$czas = time();
$q=$db->query('select `numer` from `userzy` where `numer` = '.$from.' and `wejscie` > '.$czas);
if($q->num_rows == 1){
$czekaj = $user['wejscie']-time();
die($m->info('Aby wyjść musisz odczekać jeszcze '.$main->czas($czekaj)));
}
$text = $parts;
unset($text[0]);
$text = implode(' ', $text);
$q=$db->query('select `numer` from `userzy` where `online` = 1 and not `numer` = '.$from.' and `zw` = 0');
while($n=$q->fetch_assoc())
$do[] = $n['numer'];
$czas2 = (time()+60);
$db->query('update `userzy` set `online` = 0, `wyjscie` = '.$czas2.' where `numer` = '.$from);
$licz = $main->liczZalogowanych($nr);
if($plec == 1){ $cozrobil = 'wylogowała'; $cosiestalo = 'wylogowałaś';
}else if($plec == 2){ $cozrobil = 'wylogował'; $cosiestalo = 'wylogowałeś'; }
$m->addmsg("$niczek $cozrobil się! :( $text\r\n$licz", $do);
$m->info($cosiestalo.' się z czatu :( Zapraszamy ponownie.');
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>