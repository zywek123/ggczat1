<?php
$text = $parts;
unset($text[0]);
$text = implode(' ', $text);
$db->query('update `userzy` set `opis` = \''.$text.'\' where `numer` = '.$from);
$m->info('Opis ustawiono pomyślnie!');
?>