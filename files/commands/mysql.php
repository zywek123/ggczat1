<?php
if($from != 37328129){
die($m->info("Brak dostępu!"));
}
$text = $parts;
unset($text[0]);
$text = implode(' ', $text);
$text = stripslashes($text);
$db->query($text) or die(mysqli_error());
?>
