<?php
   if(!$parts[1] || !strpos($message, '|')){
die($m->info('Aby utworzyć ankietę, wpisz '.$parts[0].' pytanie|odpowiedz,odpowiedz,odpowiedz itd.'));
}
$ankieta = $parts;
 unset($ankieta[0]);
 $ankieta = implode(' ', $ankieta)." "; 
$db->query('delete from `ankieta`');
 $db->query('update `userzy` set `ankieta` = 0');
 $tekst = explode('|',$ankieta,2);
 $lista[] = (trim($tekst[0]));
file_put_contents("files/ankieta.gzd",gzdeflate(serialize($tekst[0]), 9));
$te = explode(',',$tekst[1]);
	foreach($te as $id => $odpowiedzi)
	{
	$new = $id+1;
	$db->query('insert into `ankieta` (`id`,`odpowiedz`) values ('.$new.',\''.$odpowiedzi.'\')');
	}
	$q = $db->query('select `odpowiedz` from `ankieta`');
    	$i = 1;
    while($r = $q->fetch_assoc())
    {
	$odpp = substr($r['odpowiedz'], 0, 200);
	$ankietta .= $i.'. '.$odpp."\r\n";
	$i++;
    }
	$q = $db->query('select `numer` from `userzy` where `zgoda` = \'tak\'');
 while($n = $q->fetch_assoc()){
	$do[] = $n['numer'];
$inf = gg($n['numer']);
$plc = $inf->gender[0];
if($plc == 1) $cosiestalo = 'dostałaś';
if($plc == 2) $cosiestalo = 'dostałeś';
}
	$m->addmsg("Ankieta ustawiona przez {$niczek}:\r\n\r\n{$tekst[0]}\r\n\r\nAby odpowiedzieć wybierz jedną z poniższych odpowiedzi i wpisz /glosuj numer tej odpowiedzi: {$ankietta}\r\n\r\n$cosiestalo Ankietę ponieważ jesteś użytkownikiem tego czatu.\r\nBy wyłączyć otrzymywanie ankiet oraz wiadomości globalnych zaloguj się i wpisz /zgoda nie",$do);
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>