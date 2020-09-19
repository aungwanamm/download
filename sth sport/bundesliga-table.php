<?php
function url_get_contents ($Url) { if (!function_exists('curl_init')){ die('CURL is not installed!'); } $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $Url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); $output = curl_exec($ch); curl_close($ch); return $output; }

echo url_get_contents("https://www.fctables.com/germany/1-bundesliga/iframe/?type=league-scores&lang_id=2&country=67&template=16&team=&timezone=Indian/Cocos&time=12&width=100%25&height=100%25&font=Times+new+roman&fs=12&lh=28&bg=FFFFFF&fc=000000&logo=1&tlink=1&scoreb=ff0000&scorefc=FFFFFF&sgdcoreb=388E3C&sgdcorefc=FFFFFF&sh=0&hfb=1&hbc=0000000&hfc=FFFFFF");

?>
