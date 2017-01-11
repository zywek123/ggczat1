<?php
   $q = $db->query('select `odpowiedz` from `ankieta`');
	$i = 1;
    while($r = $q->fetch_assoc())
    {
	$ankietodp .= $r['odpowiedz'];
	$ankiet .= $i.'. '.$ankietodp."\r\n";
	$i++;
    $lista = unserialize(gzinflate(file_get_contents('files/ankieta.gzd')));
	if(!$parts[1])
       die($m->info('Aby zagłosować w ankiecie wpisz '.$parts[0].' numer_odpowiedzi. Pytanie: '.$lista."\r\nDo wyboru masz następujące odpowiedzi: {$ankiet}"));
	   }
	    $q = $db->query('select `numer` from `userzy` where `numer`= '.$from.' and `ankieta` = 1');
    if($plec == 1) $cozrobilo = "brałaś";
if($plec == 2) $cozrobilo = "brałeś";
	if($q->num_rows != 0){
  die($m->info('Ty już '.$cozrobilo.' udział w tej ankiecie!'));}
$q = $db->query('select `odpowiedz`,`ileodpowiedzi` from `ankieta` where `id` = '.$parts[1]);
if($q->num_rows == 0){
  die($m->info('Nie ma takiej odpowiedzi!'));
  }else{
  $db->query('update `ankieta` set `ileodpowiedzi` = ileodpowiedzi + 1 where `id` = '.$parts[1]);
  $db->query('update `userzy` set `ankieta` = 1 where `numer` = '.$from);
$m->info('Twój głos został zapisany. Aby dowiedzieć się jakie są wyniki tej ankiety wpisz /wyniki');
	}
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>