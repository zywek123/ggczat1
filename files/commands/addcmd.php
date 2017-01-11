<?php
if(!$parts[1]){
die($m->info('Podaj komendę!'));
}
if($parts[2] == ''){
die($m->info('Podaj staff!'));
}
if($parts[3] == ''){
die($m->info('Podaj treść!'));
}
$qq=$db->query("select `komenda` from `komendy` where `komenda` = '{$parts[1]}'");
if($qq->num_rows == 1){
die($m->info('Podana komenda już istnieje!'));
}
$text = $parts;
unset($text[0]);
unset($text[1]);
unset($text[2]);
$text = implode(' ', $text);
$zapisz = '<?php
$m->info("'.$text.'");
?>';
system('touch ./files/commands/'.$parts[1].'.php');
system('chmod 777 ./files/commands/'.$parts[1].'.php');
file_put_contents("files/commands/{$parts[1]}.php", $zapisz);
$db->query("insert into `komendy` (`komenda`, `alias`, `staff`) values ('{$parts[1]}', '/', '{$parts[2]}')");
$m->addmsg($niczek.' dodał globalną komendę '.$parts[1].', która dostępna jest od staffu '.$parts[2], $doo);
?>