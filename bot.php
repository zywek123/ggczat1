<?php
$timeexec = explode(" ",microtime());
$timefrom = $timeexec[1]+$timeexec[0];
$from = $_GET['from'];
$bot = $_GET['to'];
if(!isset($RAW_POST_DATA)){
$message = $GLOBALS['HTTP_RAW_POST_DATA'];
}else{
$message = $RAW_POST_DATA;
}
$message = addslashes($message);
$parts = explode(' ', $message);
$c = count($parts);
for($i=0;$i<$c;++$i){
$domena="aero|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|ac|ad|ae|af|ag|ai|al|am|an|ao|aq|ar|as|at|au|aw|ax|az|ba|bb|bd|be|bf|bg|bh|bi|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|cr|cu|cv|cx|cy|cz|cz|de|dj|dk|dm|do|dz|ec|ee|eg|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gg|gh|gi|gl|gm|gn|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|im|in|io|iq|ir|is|it|je|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mk|ml|mn|mn|mo|mp|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nc|ne|nf|ng|ni|nl|no|np|nr|nu|nz|nom|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|ps|pt|pw|py|qa|re|ra|rs|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tl|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw|arpa";
if(preg_match('/((http|ft)p(s)?:\/\/)?([a-z0-9\-\_\.]+)?[a-z0-9]\.('.$domena.')([a-z0-9\-\_\/\.\:]+)?/i',$parts[$i]) OR preg_match('/((htt|ft)p(s)?:\/\/)?\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}([a-z0-9\-\_\/\.\:]+)?/',$parts[$i])){
include('files/tnij.php');
$parts[$i] = tnij($parts[$i]);
}
}
include('files/configs.php');
include('files/functions.php');
set_error_handler('exception_error_handler');
$main = new nicki();
$m = new Messages();
if(!preg_match('/^91\.197\.15\.[0-9]{1,3}$/', $_SERVER['REMOTE_ADDR'])){
	die('ze skryptu mozna korzystac wylacznie z poziomu gg');
}
	$user = $main->userdata($from);
$zwroc = $main->zwroc	($from);
$stf = $user['staff'];
$licz = $main->liczZalogowanych($nr);
$dos = $main->onlinenumbers(0);
$doo = $main->onlinenumbers(1);
$info = gg($from);
$plec = $info->gender[0];
$city = $info->city;
$birth = explode('T', $info->birth);
$q = $db->query('SELECT `numer1`,`numer2`,`slub` FROM `pary` WHERE `numer1` = '.$from.' OR `numer2` = '.$from.' LIMIT 1');
$xx = $q->fetch_assoc();
$czy = $xx['slub'];
if($czy == 1){
$slub = '<3';
$niczek = $slub.' '.$main->nick($user['nick'], $user['staff']);
}
if($czy == 0){
$slub = '';
$niczek = $main->nick($user['nick'], $user['staff']);
}
$czasb = $_SERVER['REQUEST_TIME'];
$q=$db->query('select `powod`,`kto`,`czasban`,`ban` from `userzy` where `numer` = '.$from.' and `ban` = 1 and `czasban` > '.$czasb);
if($q->num_rows == 1){
$r=$q->fetch_assoc();
$powod = $r['powod'];
$kto = $r['kto'];
$czass = $r['czasban'];
$czasban = date("d-m-Y G:i:s", $czass);
if($plec == 1){ $jaki = 'zbanowana'; $otrzymales = 'otrzymałaś';
}else if($plec == 2){ $jaki = 'zbanowany'; $otrzymales = 'otrzymałeś'; }
die($m->info('Jesteś '.$jaki.' i nie masz prawa korzystać z czatu ban potrwa do dnia: '.$czasban.' powód bana: '.$powod.' Bana '.$otrzymales.' od '.$kto));
}
$q=$db->query('select `numer` from `userzy` where `numer` = '.$from.' and `ban` = 1 and `czasban` <= '.$czasb);
if($q->num_rows == 1){
$db->query('update `userzy` set `ban` = 0, `powod` = \'\', `kto` = \'\', `czasban` = 0 where `numer` = '.$from.' and `czasban` > '.$czasb);
$m->addmsg('Użytkownikowi '.$niczek.' Skończył się ban!', $doo);
die($m->info('Twój ban już się skończył mamy nadzieje, że poprawisz Swoje zachowanie'));
}
if(!$user){
if($plec == 1) $jaki = 'zarejestrowana';
if($plec == 2) $jaki = 'zarejestrowany';
if(!in_array($parts[0], array('/dodaj', '.dodaj')))
die($m->info('Niestety nie jesteś '.$jaki.'! :( Możesz temu zaradzić. ;) Wystarczy, że wpiszesz /dodaj ... a w miejsce kropek wwstawisz swój nick'));
}
if($user['online'] == 0){
if($plec == 1) $jaki = 'zalogowana';
if($plec == 2) $jaki = 'zalogowany';
if(!in_array($parts[0], array('/join', '.join', '/j', '.j', '/dodaj', '.dodaj', '/sjoin', '/sj', '.sjoin', '.sj')))
die($m->info('Nie jesteś '.$jaki.'! Aby się zalogować, wpisz koniecznie /join lub /j'));
}
$replace = preg_replace('/[^0-9]/', '', $message);
	$liczba = strlen($replace);
	if($liczba > 20)
		die($m->info('Limit cyfr w wiadomosci zostal przekroczony!'));
	elseif($liczba > 6){
		for($num = 0; $num < $liczba-5; ++$num){
			$wyraz = substr($replace, $num, 8);
			if($p->isBot($wyraz)){
			$db->query('update `userzy` set `ban` = 1, `online` = 0, `powod` = \'reklama\', `kto` = \'AntyReklamiaaRZ\', `czasban` = 2147483647 where `numer` = '.$from);
			$m->addmsg($niczek.' zareklamował inny czat z tego powodu dostaje bana :(', $doo);
if($plec == 1) $cosiestalo = 'zostałaś zbanowana';
if($plec == 2) $cosiestalo = 'zostałeś zbanowany';
				die($m->info($cosiestalo.' za reklame innego czatu!'));
				}
				}
}
if($parts[0] == '.' || $parts[0] == '/'){
die($m->info('Podaj treść komendy!'));
}
if(!$message){
die($m->info('Podaj treść wiadomości do wysłania!'));
}
if(strpos($message,'.') === 0 || strpos($message,'/') === 0){
if(!($komn = strpos($message, ' '))){
$komn = strlen($message);
}
$kom=substr($message,1,$komn-1);
$q=$db->query('select `komenda`,`staff`,`koszt` from `komendy` where `komenda` = \''.$kom.'\' or `alias` = \''.$kom.'\'');
$asv=$q->fetch_assoc();
$komenda = $asv['komenda'];
$staff = $asv['staff'];
$koszt = $asv['koszt'];
if($user)
if($stf < $staff){
$brakstaff = $staff-$stf;
die($m->info('niestety Nie posiadasz wystarczających uprawnień do wykonania tej komendy! Brakuje ci jeszcze '.$brakstaff.' staffu'));
}
$zl = floor($user['zl']);
if($zl < $koszt){
die($m->info('Nie posiadasz wystarczającej liczby zł!'));
}
if(!$komenda){
$as=$db->query('select `text` from `komendy2` where `komenda` = \''.$kom.'\'');
if($as->num_rows == 0){
die($m->info('Niestety na tym czacie nie ma komendy '.$kom.'! Aby uzyskac spis komend, których możesz użyć, wpisz /pomoc'));
}
$e=$as->fetch_assoc();
$text = $e['text'];
$m->info($text);
}else{
$timeexec = explode(" ",microtime());
$timeto = $timeexec[1]+$timeexec[0];
$roundby = round($timeto-$timefrom,5);
include('files/commands/'.$komenda.'.php');
}
die;
}
$time = $_SERVER['REQUEST_TIME'];
$czasonline = $_SERVER['REQUEST_TIME']-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
$parts = implode(' ', $parts);
if($user['zw'] == 1){
die($m->info('Jesteś w trybie zw. Aby pisać, musisz z niego powrócić. Wpisz /jj'));
}
$strl = strlen($parts);
$strw = str_word_count($parts);
$strzl = $strl*0.001;
if($strl >= $maxlength)
die($m->info('Maksymalna długość wiadomości do wysłania to 500 znaków! Twoja wiadomość ma aż '.$strl.'!'));
$czass91 = $_SERVER['REQUEST_TIME'];
$db->query('update `userzy` set `czas` = '.$czass91.', `wiadomosci` = wiadomosci + 1, `wyrazy` = wyrazy + '.$strw.', `znaki` = znaki + '.$strl.', `xp` = xp + '.$strl.', `zl` = zl + '.$strzl.' where `numer` = '.$from);
$qq=$db->query('select `numer` from `userzy` where `online` = 1');
if($qq->num_rows == 1){
die($m->info('Nie możesz pisać ponieważ nie ma na czacie nikogo prócz Ciebie!'));
}
$q=$db->query('select `numer` from `userzy` where `online` = 1 and not `numer` = '.$from.' and `zw` = 0');
while($n=$q->fetch_assoc())
$do[] = $n['numer'];
$cz = $user['czas'];
$time_mkd = ($_SERVER['REQUEST_TIME']-2);
if($cz > $time_mkd){
die($m->info('Odczekaj 2 sekundy zanim wyslesz następną wiadomość!'));
}
if($stf == 101 and $from == 37328129){
$a=255; $b=64; $c=64;
	 }
	  
	 if($stf == 100)  {
	$a=155; $b=139; $c=255;
	 }
 if($stf > 50 && $stf < 100 ){
	$a=139; $b=58; $c=58; 
	 }
  if($stf > 39 && $stf < 51 )
 	{
	$a=205; $b=133; $c=63;
	 }
 if($stf > 29 && $stf < 40 ){
	$a=154; $b=205; $c=50;
	 }
 if($stf > 19 && $stf < 30 ){
	$a=154; $b=205; $c=65;
	 }
 if($stf > 10 && $stf <20 ){
	$a=112; $b=128; $c=144; 
	 }
if($stf > 1 && $stf <11 ){
	$a=220; $b=20; $c=60;
	 }
 if($stf == 0   ){
	   $a=0; $b=0; $c=0;
} 
$mbs->addText($niczek,FORMAT_ITALIC_TEXT,$a ,$b, $c)->setRecipients($do)->addBBcode(': [b]'.$parts.'[/b]')->setRecipients($do);
    $p->push($mbs);
	 $mbs->clear();	 
	 $mbs->addText($niczek,FORMAT_ITALIC_TEXT,$a ,$b, $c)->setRecipients($zwroc)->addBBcode(': [b]'.$parts.'[/b]')->setRecipients($zwroc);
     $p->push($mbs);
	 	$mbs->clear();
$f=$db->query('select `numer` from `userzy` where `zw` = 1 and `bufor` = \'tak\' and `online` = 1');
if($f->num_rows != 0){
while($g=$f->fetch_assoc()){
$do4c = $g['numer'];
$db->query('insert into `bufor` (`nick`,`text`,`do`) values (\''.$niczek.'\',\''.$parts.'\','.$do4c.')');
		}
		}
		if($user['xp'] >= $user['exp']){
$xpm = $user['exp']*2;
$db->query('update `userzy` set `lvl` = lvl + 1, `exp` = '.$xpm.', `zl` = zl + '.$zllvl.' where `numer` = '.$from);
$kx = $user['lvl']+1;
if($plec == 1) $cozrobil = 'awansowała';
if($plec == 2) $cozrobil = 'awansował';
$m->addmsg($niczek.' '.$cozrobil.' na '.$kx.' poziom!', $dos);
}
   $db->query('insert into `logi` (`numer`,`nick`,`text`,`czas`) values ('.$from.',\''.$niczek.'\',\''.$parts.'\','.$_SERVER['REQUEST_TIME'].')');
$db->close();
?>
