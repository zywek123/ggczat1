<?php
$q=$db->query('select `numer` from `userzy`');
$wszyscy=$q->num_rows;
$w=$db->query('select `numer` from `userzy` where `ban` = 1');
$zbanowani=$w->num_rows;
$zbanowanip = round($zbanowani/$wszyscy*100, 2).'%';
$e=$db->query('select `numer` from `userzy` where `online` = 1');
$zalogowani=$e->num_rows;
$zalogowanip = round($zalogowani/$wszyscy*100, 2).'%';
$r=$db->query('select `numer` from `userzy` where `zgoda` = \'tak\'');
$zgodatak=$r->num_rows;
$zgodatakp = round($zgodatak/$wszyscy*100, 2).'%';
$t=$db->query('select `numer` from `userzy` where `zgoda` = \'nie\'');
$zgodanie=$t->num_rows;
$zgodaniep = round($zgodanie/$wszyscy*100, 2).'%';
$ca=$db->query('select `numer` from `userzy` where `ban` = 1');
$zbanowani=$ca->num_rows;
$czas1 = (time()-3600);
$y=$db->query('select `numer` from `userzy` where `czas` >= '.$czas1);
$aktywnigodzina=$y->num_rows;
$czas2 = (time()-86400);
$u=$db->query('select `numer` from `userzy` where `czas` >= '.$czas2);
$aktywnidzien=$u->num_rows;
$i=$db->query('select SUM(`znaki`) as `znaczki` from `userzy`');
while($tab1=$i->fetch_assoc()){
$znaki = $tab1['znaczki'];
}
$o=$db->query('select SUM(`wyrazy`) as `slowa` from `userzy`');
while($tab2=$o->fetch_assoc()){
$wyrazy = $tab2['slowa'];
}
$pp=$db->query('select SUM(`wiadomosci`) as `msg` from `userzy`');
while($tab3=$pp->fetch_assoc()){
$wiadomosci = $tab3['msg'];
}
$m->info("Informacje o czacie:\r\nMamy już $wszyscy zarejestrowanych użytkowników.\r\nAktualnie na czacie przebywa $zalogowani osób co stanowi $zalogowanip wszystkich użytkowników czatu.\r\nZgodę na otrzymywanie globali ma włączoną tylko $zgodatak osób, a wyłączoną aż $zgodanie osób. :(\r\nNiestety dotychczas zbanowaliśmy aż $zbanowani osób.\r\nPrzez ostatnie 60 minut aktywnych było tylko $aktywnigodzina osób, a przez ostatni dzień tylko $aktywnidzien osób.\r\nNa czacie napisaliśmy tylko $znaki znaków, $wyrazy słów oraz $wiadomosci wiadomości.");
$time = time();
$czasonline = time()-$user['czas'];
$db->query('update `userzy` set `czasonline` = czasonline + '.$czasonline.', `czas` = '.$time.' where `numer` = '.$from);
?>