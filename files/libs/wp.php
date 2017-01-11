<?php
class weather
  {
private $url = 'http://pogoda.wp.pl/weathertopapp.json?a=0&cid='.$parts[1];
private $cache;
private $recent;
private $validity;
private $dane;
public function __construct() {
$this->cache = dirname(__FILE__).'/pogoda_cache.txt';
$this->recent = TRUE;
$this->validity = '-8 hours';
}
private function pobierzPlik() {
if( ( !file_exists($this->cache) AND !is_writable(dirname($this->cache)) ) OR ( file_exists($this->cache) AND !(is_writable($this->cache)) ) ) {
$this->cache = NULL;
}
elseif( @filemtime($this->cache) < strtotime($this->validity) ) {
$this->recent = FALSE;
}
if(!$this->cache OR !$this->recent) {
$wynik = file_get_contents($this->url, 0, stream_context_create(array(
'http' => array(
'header' => 'Referer: http://pogoda.wp.pl/',
'user_agent' => 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)',))));
if($wynik === FALSE) {
throw new Exception('Nie uda³o siê pobraæ pogody');
}
if($this->cache) {
file_put_contents($this->cache, $wynik);
}
}
else
{
$wynik = file_get_contents($this->cache);
}
return $wynik;
}

private function pobierzDane() {
if(!$this->dane) {
$wynik = json_decode($this->pobierzPlik(), TRUE);
if(!is_array($wynik) || !isset($wynik['prognoza']) || !isset($wynik['prognoza'][0])) {
var_dump($wynik);
throw new Exception('B³êdny format danych pogodowych');
}

$this->dane = $wynik;
}

return $this->dane;
}

public function informacje() {
$dane = $this->pobierzDane();
return $dane;
}

public function prognoza($dzien = 0) {
$dane = $this->pobierzDane();
return $dane['prognoza'][$dzien];
}
}
}