<?php
if(!$parts[1]){
die($m->info('Podaj staff!'));
}
if(preg_match('/[^0-9]/', $parts[1])){
die($m->info('Staff to znaki z przedziału 0-9!'));
}
$text = $parts;
unset($text[0]);
unset($text[1]);
$text = implode(' ', $text);
$q=$db->query('select `numer` from `userzy` where `staff` >= '.$parts[1]);
while($n=$q->fetch_assoc())
$do[] = $n['numer'];
$m->addmsg("Globalna wiadomość do użytkowników którzy posiadają globalny staff większy lub równy $parts[1]:\r\n\r\n{$text}\r\n\r\nDostałeś tą wiadomość, ponieważ posiadasz staff na tym czacie.", $do);
$a=$q->num_rows;
$m->info('Doszło do '.$a.' osób :)');
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>