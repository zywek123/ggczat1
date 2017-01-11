<?php
if(!$parts[1]){
die($m->info('Podaj nick użytkownika!'));
}
if(!$parts[2]){
die($m->info('Podaj czas bana!'));
}
if(!$parts[3]){
die($m->info('Podaj typ czasu!'));
}
if(!in_array($parts[3], array('d','m','y','h','i','s','ff'))){
die($m->info("Dostępne czasy abna to: d - dni, m - miesiące, y - lata, h - godziny, i - minuty, -s - sekundy,  -ff - na zawsze"));
}
if($parts[3] == 'i') {
$czasg = mktime(date('H')+$godziny,date('i')+$parts[2],date('s'),date('m'),date('d')+$dni,date('Y')+$lata);
 }
  if($parts[3] == 'h'){
 $czasg = mktime(date('H')+$parts[2],date('i')+$minuty,date('s'),date('m')+$miesiace,date('d')+$dni,date('Y')+$lata);
 }
  if($parts[3] == 'd'){
 $czasg = mktime(date('H')+$godziny,date('i')+$minuty,date('s'),date('m')+$miesiace,date('d')+$parts[2],date('Y')+$lata);
 }
 if($parts[3] == 'y')  {
 $czasg = mktime(date('H')+$godziny,date('i')+$minuty,date('s'),date('m'),date('d')+$dni,date('Y')+$parts[2]);
 }
 if($parts[3] == 'm'){
 $czasg = mktime(date('h')+$godziny,date('i')+$minuty,date('s'),date('m')+$parts[2],date('d')+$dni,date('Y')+$lata);
  }
  $qq=$db->query('select `nick`,`numer`,`staff` from `userzy` where `nick` like \''.$parts[1].'%\'');
if($qq->num_rows == 0){
die($m->info('Podany użytkownik nie istnieje!'));
}
$r=$qq->fetch_assoc();
$numer = $r['numer'];
$jegostaf = $r['staff'];
$info = gg($numer);
$plc = $info->gender[0];
if($plc == 1) $Komu = 'jej';
if($plc == 2) $komu = 'mu';
if($plec == 1){ $corobil = 'próbowała'; $komu2 = 'jej';
}else if($plec == 2){ $corobil = 'próbował'; $komu2 = 'mu'; }
if(!$b2r3 && $user['staff'] <= $jegostaf){
die($m->info($parts[1].' ma większy lub taki sam staff jak Ty, więc nie możesz dać '.$komu.' bana!'));
}
if(in_array($numer, $b2r3)){
$m->addmsg($niczek.' '.$corobil.' cię zbanować ale '.$komu2.' się to nie udało :d hahaha!', $numer);
die($m->info("Nie możesz dawać bana właścicielowi skryptu lub czatu!"));
}
$text = $parts;
unset($text[0]);
unset($text[1]);
unset($text[2]);
unset($text[3]);
$text = implode(' ', $text);
$czasbana = date("d-m-Y G:i:s", $czasg);
if($plec == 1) $cozrobil = "zbanowała";
if($plec == 2) $cozrobil = "zbanował";
$m->addmsg($niczek.' '.$cozrobil.' użytkownika '.$parts[1].' do dnia: '.$czasbana.' z powodu '.$text, $doo);
$gginf = gg($numer);
$ggplec = $gginf->gender[0];
if($ggplec == 1) $cosiestalo = "Zostałaś zbanowana";
if($ggplec == 2) $cosiestalo = "Zostałeś zbanowany";
$m->addmsg($cosiestalo.' przez '.$niczek.' z powodu '.$text.' Twój ban potrwa do dnia: '.$czasbana, $numer);
$db->query('update `userzy` set `ban` = 1, `powod` = \''.$text.'\', `kto` = \''.$niczek.'\', `czasban` = '.$czasg.', `online` = 0 where `nick` like \''.$parts[1].'%\'');
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>