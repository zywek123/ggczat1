<?php
if(!$parts[1]){
die($m->info('Podaj nick użytkownika!'));
}
$q=$db->query('select `nick`,`numer`,`staff` from `userzy` where `nick` = \''.$parts[1].'\' and `ban` = 1');
if($q->num_rows == 0){
die($m->info('Podany użytkownik nie posiada bana!'));
}
$rr=$q->fetch_assoc();
$nr = $rr['numer'];
$inf = gg($nr);
$plc = $inf->gender[0];
$db->query('update `userzy` set `ban` = 0, `czasban` = 0, `powod` = \'\', `kto` = \'\' where `nick` = \''.$parts[1].'\'');
if($plc == 1){ $jaki = 'została odbanowana'; $cosiestalo = 'zostałaś odbanowana';
}else if($plc == 2){ $jaki = 'został odbanowany'; $cosiestalo = 'zostałeś odbanowany'; }
$m->addmsg($parts[1].' '.$jaki.' przez '.$niczek.'!', $doo);
$m->addmsg($parts[1].' '.$cosiestalo.' przez '.$niczek.' mamy nadzieje, że się poprawisz!', $txaat);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>