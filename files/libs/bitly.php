<?php
abstract class ShortLink {

protected $url;

protected $login;
protected $key;


public function __construct($login='arekk99', $key='R_53c63de89e346a2e82b6ec71836a009a') {

$this->login = $login;
$this->key = $key;

}

public function create($url) {

$this->url = rawurlencode($url);

$_shortlink = $this->getShortLink();

if ($this->checkResult($_shortlink)) {
return $_shortlink;
}

}


protected function checkResult($shortlink) {
return (strpos('_' . $shortlink, $this->page) > 0);
}

public function getShortLink() {
}

}

class BitLy extends ShortLink {

public $page = 'http://bit.ly/';

public function getShortLink() {
return file_get_contents("http://api.bit.ly/v3/shorten?login=" . $this->login . "&apiKey=" . $this->key . "&longUrl=" . $this->url . "&format=txt");
}

}
