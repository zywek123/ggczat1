<?php
$text = $parts;
unset($text[0]);
include("files/libs/simplehtmldom.php");
if(!isset($text[1]))
	die($m->info("Podaj tytuł piosenki!"));
elseif(!in_array('-', $text))
	die($m->info("Podaj wykonawcę i tytuł!")); 
else{
	$text = implode(' ', $text);
	$tag = explode(' - ', $text);
	
	$tag[0] = strtolower($tag[0]);
	$tag[1] = strtolower($tag[1]);
	
	$tab = array('.', ',', ' ');
	$auth = str_replace($tab, '_', $tag[0]);
	$tit = str_replace($tab, '_', $tag[1]);
	$html = file_get_html('http://www.tekstowo.pl/piosenka,'.$auth.','.$tit.'.html');
	
	foreach($html->find('div.song-text') as $key => $element) {
		$pa = $element->plaintext;
		$pi = str_replace('&nbsp;', '', $pa);
		$piosenka = str_replace('Poznaj historię zmian tego tekstu', '', $pi);
		$tekst = substr($piosenka, 85);
		$tekst = trim($tekst);
		$table = str_split($tekst, 3999);
		$part1 = substr($tekst, 0, 3999);
		$part2 = substr($tekst, 3999);
		foreach($table as $part)
			die($m->info("tekst piosenki: $auth - $tit\r\n".$part));
		}
	die($m->info('Podany utwór nie istnieje w bazie!'));
	break;
	}
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>