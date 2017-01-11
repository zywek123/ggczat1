<?php
if(!$parts[1]){
die($m->info("Podaj czego ranking TOP 10 chcesz zobaczyć\r\nznaki - top wg znaków\r\nsłowa - TOP wg słów\r\nwiadomości - TOP wg wiadomości\r\nzł - TOP wg zł\r\ndodatki - TOP wg dodatków\r\nexp - top wg doświadczenia\r\nonline - TOP wg czasu przesiedzianego na czacie"));
}
if(!in_array($parts[1], array('znaki', 'słowa', 'slowa', 'wiadomości', 'wiadomosci', 'zl', 'zł', 'dodatki', 'exp', 'online'))){
die($m->info("Podaj czego ranking TOP 10 chcesz zobaczyć\r\nznaki - top wg znaków\r\nsłowa - TOP wg słów\r\nwiadomości - TOP wg wiadomości\r\nzł - TOP wg zł\r\ndodatki - TOP wg dodatków\r\nexp - top wg doświadczenia\r\nonline - TOP wg czasu przesiedzianego na czacie"));
}
if($parts[1] == 'znaki'){
$q=$db->query('select `nick`,`znaki`,`staff` from `userzy` where `znaki` > 0 order by `znaki` desc limit 20');
$miejsce=0;
$a2=$db->query('select `znaki` from `userzy` where `znaki` > 0');
$strony=ceil($a2->num_rows/20);
while($zn=$q->fetch_assoc()){
$miejsce++;
$t .= "{$miejsce}. {$main->nick($zn['nick'], $zn['staff'])} {$zn['znaki']} znaków.\r\n";
}
$m->info("Lista TOP wg wypisanych znaków\r\nstrona 1 z $strony: $t");
}
if($parts[1] == 'słowa' || $parts[1] == 'slowa'){
$a=$db->query('select `wyrazy`,`nick`,`staff` from `userzy` where `wyrazy` > 0 order by `wyrazy` desc limit 20');
$miejsce2=0;
$a2=$db->query('select `wyrazy` from `userzy` where `wyrazy` > 0');
$strony=ceil($a2->num_rows/20);
while($s=$a->fetch_assoc()){
$miejsce2++;
$t2 .= "{$miejsce2}. {$main->nick($s['nick'], $s['staff'])} {$s['wyrazy']} słów.\r\n";
}
$m->info("Lista TOP wg napisanych słów\r\nstrona 1 z $strony: $t2");
}
if($parts[1] == 'wiadomości' || $parts[1] == 'wiadomosci'){
$d=$db->query('select `wiadomosci`,`nick`,`staff` from `userzy` where `wiadomosci` > 0 order by `wiadomosci` desc limit 20');
$miejsce3=0;
$a2=$db->query('select `wiadomosci` from `userzy` where `wiadomosci` > 0');
$strony=ceil($a2->num_rows/20);
while($w=$d->fetch_assoc()){
$miejsce3++;
$t3 .= "{$miejsce3}. {$main->nick($w['nick'], $w['staff'])} {$w['wiadomosci']} wiadomości.\r\n";
}
$m->info("Lista TOP wg wysłanych wiadomości\r\nstrona 1 z $strony: $t3");
}
if($parts[1] == 'zl' || $parts[1] == 'zł'){
$q=$db->query('select `nick`,`staff`,`zl` from `userzy` where `zl` > 0 order by `zl` desc limit 20');
$i=0;
$a2=$db->query('select `zl` from `userzy` where `zl` > 0');
$strony=ceil($a2->num_rows/20);
while($r=$q->fetch_assoc()){
$i++;
$zll = $r['zl'];
$zl = floor($zll);
$topek .= "{$i}. {$main->nick($r['nick'], $r['staff'])} {$zl} zł\r\n";
}
$m->info("Lista TOP wg posiadanych zł\r\nstrona 1 z $strony: $topek");
}
if($parts[1] == 'dodatki'){
$a=$db->query("select `nick`,`staff`,`mssv`,`tarcza`,`tarcza2`,`poke`,`poke2`,`sprej`,`karta` from `userzy` where `mssv` > 0 order by `mssv` desc limit 20");
$i=0;
$a2=$db->query('select `mssv` from `userzy` where `mssv` > 0');
$strony=ceil($a2->num_rows/20);
while($ra=$a->fetch_assoc()){
$i++;
$miej .= $i.". {$main->nick($ra['nick'], $ra['staff'])} mssv: {$ra['mssv']} tarcze: {$ra['tarcza']} elektryczne tarcze: {$ra['tarcza2']} puste poke: {$ra['poke']} pełne poke: {$ra['poke2']} spreje: {$ra['sprej']} karty: {$ra['karta']}\r\n";
}
$m->info("lista TOP wg Dodatków\r\nstrona 1 z $strony: $miej");
}
if($parts[1] == 'exp'){
$q=$db->query('select `exp`,`xp`,`lvl`,`nick`,`staff` from `userzy` where `lvl` > 0 order by `lvl` desc limit 20');
$i=0;
$a2=$db->query('select `lvl` from `userzy` where `lvl` > 0');
$strony=ceil($a2->num_rows/20);
while($r=$q->fetch_assoc()){
$i++;
$expp .= "$i. ".$main->nick($r['nick'], $r['staff'])." Poziom: {$r['lvl']} doświadczenie: {$r['xp']}/{$r['exp']}\r\n";
}
$m->info("Lista TOP wg posiadanego doświadczenia\r\nstrona 1 z $strony: $expp");
}
if($parts[1] == 'online'){
$czas = time();
$q=$db->query('select `czasonline`,`numer`,`nick` from `userzy` where `czasonline` > 0 order by `czasonline` desc limit 20');
$i=0;
$a2=$db->query('select `czasonline` from `userzy` where `czasonline` > 0');
$strony=ceil($a2->num_rows/20);
while($r=$q->fetch_assoc()){
$i++;
$top .= $i.". {$main->nick($r['nick'], $r['staff'])} {$main->czas($r['czasonline'])}\r\n";
}
$m->info("Lista TOP wg czasu przesiedzianego na czacie\r\nstrona 1 z $strony: $top");
}
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>