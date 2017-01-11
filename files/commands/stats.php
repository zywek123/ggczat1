<?php
if($plec == 1){ $cosiestalo1 = 'napisałaś'; $cosiestalo2 = 'wysłałaś'; $cosiestalo3 = 'zostałaś'; $cosiestalo4 = 'weszłaś'; $jaki = 'wyrzucona'; $cosiestalo5 = 'spędziłaś';
}else if($plec == 2){ $cosiestalo1 = 'napisałeś'; $cosiestalo2 = 'wysłałeś'; $cosiestalo3 = 'zostałeś'; $cosiestalo4 = 'wszedłeś'; $jaki = 'wyrzucony'; $cosiestalo5 = 'spędziłeś'; }
$query=$db->query('select count(*)+1 from `userzy` where `znaki` > '.$user['znaki']);
$miejsce1=$query->fetch_row();
$que=$db->query('select count(*)+1 from `userzy` where `wyrazy` > '.$user['wyrazy']);
$miejsce2=$que->fetch_row();
$qu=$db->query('select count(*)+1 from `userzy` where `wiadomosci` > '.$user['wiadomosci']);
$miejsce3=$qu->fetch_row();
$q=$db->query('select count(*)+1 from `userzy` where `czasonline` > '.$user['czasonline']);
$miejsce4=$q->fetch_row();
$m->info("Twoje statystyki:\r\nNa czacie $cosiestalo1 łącznie {$user['znaki']} znaków i znajdujesz się obecnie na {$miejsce1[0]} miejscu w top wg znaków\r\n{$user['wyrazy']} słów i znajdujesz się obecnie na {$miejsce2[0]} miejscu w top wg słów\r\n$cosiestalo2 {$user['wiadomosci']} wiadomości i znajdujesz się obecnie na {$miejsce3[0]} miejscu w top wg wiadomości\r\nNa czacie $cosiestalo5 już {$main->czas($user['czasonline'])} co Ci daje {$miejsce4[0]} miejsce w top wg czasu przesiedzianego na czacie\r\n$cosiestalo3 $jaki {$user['kicki']} razy\r\n$cosiestalo4 na czat już {$user['wejscia']} razy\r\nDodatki:\r\nPokebolle:\r\nPuste: {$user['poke']}\r\nMagiczne: {$user['mpoke']}\r\nPełne: {$user['poke2']}\r\nZabezpieczenia:\r\nTarcze: {$user['tarcza']}\r\nElektryczne: {$user['tarcza2']}\r\nMagiczne: {$user['mtarcza']}\r\nSpreje: {$user['sprej']}");
?>