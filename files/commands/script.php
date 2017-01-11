<?php
if(!$parts[1]){
die($m->info('Podaj komendę!'));
}
if($parts[1] == "wlog"){
$cs = explode(" ",microtime());
$csf = $cs[1]+$cs[0];
$q=$db->query('select * from `logi` order by `id` asc');
$i=0;
while($r=$q->fetch_assoc()){
++$i;
$file = "files/logs/wlog-getlog.log";
$czas = date("d.m.y G:i:s", $r['czas']);
$msgg .= "{$r['id']}. {$r['nick']} {$r['numer']} {$r['czas']}: {$r['text']}\r\n";
}
$strll = strlen($msgg);
$strww = str_word_count($msgg);
$obj_k = round($strll/1024,2);
$obj_m = round($obj_k/1024,2);
file_put_contents($file,$msgg);
$cs = explode(" ",microtime());
$cst = $cs[1]+$cs[0];
$csa = round($cst-$csf,5);
$m->addmsg("Wykonuje $parts[0] scr-get $parts[1] pobrane wyniki: $i łączna objętość w znakach i słowach: $strll | $strww\r\nRozmiar pliku: $obj_k kb / $obj_m mb\r\nWygenerowano w $csa s", $doo);
}
if($parts[1] == 'genver'){
$plzawar = $engv+$cmdv;
zapisz('ver.gzd', $plzawar);
$m->addmsg("Wykonuje $parts[0] -scr $parts[1] zapisane wyniki: $plzawar", $doo);
}
if($parts[1] == 'countbuf'){
	$q=$db->query('select * from `bufor`');
	$num=$q->num_rows;
	while($r=$q->fetch_assoc()){
		$znk .= $r['text'];
	}
	$size = strlen($znk);
	$quest=$db->query('select `id` from `bufor` order by `id` asc limit 1');
	$value=$quest->fetch_assoc();
	$startid = $value['id'];
	$quest2=$db->query('select `id` from `bufor` order by `id` desc limit 1');
	$row=$quest2->fetch_assoc();
	$endid = $row['id'];
	$m->addmsg('Obliczanie objętości bufora: wiadomości '.$num.' rozmiar '.$size.' znk STID '.$startid.' EID '.$endid.'', $doo);
}
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
