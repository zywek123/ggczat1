<?php
    $q = $db->query('select sum(ileodpowiedzi) as suma from `ankieta`');
    while($a = $q->fetch_assoc())
    {
	$razem = $a['suma'];
    }
	$q = $db->query('select `ileodpowiedzi`,`odpowiedz` from `ankieta`');
	$i = 1;
    while($r = $q->fetch_assoc())
    {
	$ile = $r['ileodpowiedzi'];
@$procent = round($ile/$razem*100, 2);
	$ankiet .= $i.'. '.$r['odpowiedz']." {$ile} Głosów - {$procent}%\r\n";
	$i++;
    }
$ankieta = unserialize(gzinflate(file_get_contents("files/ankieta.gzd")));
	$m->info("pytanie: $ankieta\r\n{$ankiet}\r\nWszystkich głosów: $razem");
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>