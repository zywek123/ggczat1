<?php
include('files/tnij.php');
$a=$db->query("select * from `bufor` where `do` = $from");
$b=$a->num_rows;
while($c=$a->fetch_assoc()){
$msg .= "{$c['nick']}: {$c['text']}";
}
$d=$db->query("select `id` from `bufor` where `do` = $from order by `id` asc limit 1");
$f=$d->fetch_assoc();
$id = $f['id'];
$wyrazy = str_word_count($msg);
$znaki = strlen($msg);
$pass = cpass(10,14);
$auth = substr(sha1(rand(100,900).cpass(3,3).rand(100,900).cpass(3,3)), 0, 10);
$db->query('update `userzy` set `pass` = \''.$pass.'\', `method` = \''.$auth.'\' where `numer` = '.$from);
$url = 'http://'.$_SERVER['HTTP_HOST']."".str_replace('bot.php','bufor.php',$_SERVER['PHP_SELF'])."?act=read&pass=$pass&authorization=$auth&start=$id&limit=$b";
$url2 = 'http://'.$_SERVER['HTTP_HOST']."".str_replace('bot.php','wget.php',$_SERVER['PHP_SELF'])."?pass=$pass&authorization=$auth&start=$id&limit=$b";
$cr = tnij($url);
$cre = tnij($url2);
$m->info("Masz $b nieprzeczytanych wiadomości czyli: $znaki znaków i $wyrazy słów. Wpisz /get aby je ściągnąć lub kliknij jeśli chcesz je czytać w przeglądarce: $cr\r\nJeśli chcesz ściągnąć plik: $cre");
$time = time();
$czasonline = time()-$user['czas'];
$db->query("update `userzy` set `czasonline` = czasonline + '{$czasonline}', `czas` = '{$time}' where `numer` = '{$from}'");
?>
