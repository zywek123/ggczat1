<?php
function tnij($addr){
return file_get_contents("http://api.bit.ly/v3/shorten?login=arekk99&apiKey=R_53c63de89e346a2e82b6ec71836a009a&longUrl=".rawurlencode($addr)."&format=txt");
}
