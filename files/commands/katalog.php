<?php
if(!$parts[1]){
die($m->info('Podaj nick użytkownika!'));
}
$q=$db->query('select `numer` from `userzy` where `nick` = \''.$parts[1].'\'');
if($q->num_rows == 0){
die($m->info('Podany użytkownik nie istnieje!'));
}
$r=$q->fetch_assoc();
$nr = $r['numer'];
$inf = gg($nr);
$plc = $inf->gender[0];
if($plc == 1) $plcc = 'Kobieta';
if($plc == 2) $plcc = 'Mężczyzna';
$birth2 = explode('T', $inf->birth);
$avatar = $inf->avatars->avatar->smallAvatar;
$imie = $inf->name;
$nick = $inf->nick;
$miasto = $inf->city;
$m->info('Informacje o '.$parts[1]."\r\nImie: $imie\r\nNick: $nick\r\nMiejsce zamieszkania: $miasto\r\nPłeć: $plcc\r\nurodziny: {$birth2[0]}");
$mbs->addImage(file_get_contents($avatar), IMG_RAW)->setrecipients($from);
$p->push($mbs);
$mbs->clear();
?>