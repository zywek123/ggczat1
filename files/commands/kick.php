<?php
if(!$parts[1]){
die($m->info('Podaj nick użytkownika!'));
}
if($parts[2] == ''){
die($m->info('Podaj powód kicka!'));
}
$text = $parts;
unset($text[0]);
unset($text[1]);
$text = implode(' ', $text);
$q=$db->query('select `numer`,`staff`,`nick`,`online` from `userzy` where `nick` like \''.$parts[1].'%\'');
if($q->num_rows == 0){
die($m->info('Podany użytkownik nie istnieje!'));
}
$r=$q->fetch_assoc();
$numer = $r['numer'];
$jegostaf = $r['staff'];
$inf = gg($numer);
$plc = $inf->gender[0];
if($plc == 1){ $jaki = "zalogowana"; $cosiestalo = "Została wyrzucona"; $stalo = "Zostałaś wyrzucona"; $kogo = 'jej';
}else if($plc == 2){ $jaki = "zalogowany"; $cosiestalo = "Został wyrzucony"; $stalo = "Zostałeś wyrzucony"; $kogo = 'go'; }
if($r['online'] == 0){
die($m->info($parts[1].' nie jest '.$jaki.'!'));
}else
if(!$b2r3 && $user['staff'] <= $jegostaf){
die($m->info($parts[1].' ma większy lub taki sam staff jak Ty, więc nie możesz '.$kogo.' wyrzucić!'));
}
if(in_array($numer, $b2r3)){
die($m->info("Nie możesz wyrzucić właściciela skryptu lub czatu!"));
}
$db->query('update `userzy` set `online` = 0, `kicki` = kicki + 1 where `nick` like \''.$parts[1].'%\'');
$m->addmsg('<'.$parts[1].'> '.$cosiestalo.' z powodu '.$text.' przez '.$niczek, $doo);
$m->addmsg($stalo.' z czatu przez '.$niczek.' z powodu '.$text.' :(', $numer);
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>