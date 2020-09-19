<?php
function url_get_contents ($Url) { if (!function_exists('curl_init')){ die('CURL is not installed!'); } $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $Url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); $output = curl_exec($ch); curl_close($ch); return $output; }

echo url_get_contents("https://www.fctables.com/germany/1-bundesliga/iframe/?type=table&lang_id=2&country=67&template=16&team=&timezone=Pacific/Midway&time=24&po=1&ma=1&wi=1&dr=1&los=1&gf=1&ga=1&gd=1&pts=1&ng=0&form=0&width=100%25&height=100%25font=Verdana&fs=12&lh=22&bg=FFFFFF&fc=333333&logo=1&tlink=1&scfs=22&scfc=333333&scb=1&sclg=1&teamls=80&ths=1&thb=1&thba=FFFFFF&thc=000000&bc=dddddd&hob=f5f5f5&hobc=ebe7e7&lc=333333&sh=0&hfb=0&hbc=388E3C&hfc=FFFFFF");

?>
