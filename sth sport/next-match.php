<?php
function url_get_contents ($Url) { if (!function_exists('curl_init')){ die('CURL is not installed!'); } $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $Url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); $output = curl_exec($ch); curl_close($ch); return $output; }

$team=$_GET["team"];
$id=0;
if($team=="chelsea"){
    $id=18266;
}else if($team=="liverpool"){
    $id=189071;
}else if($team=="arsenal"){
    $id=180231;
}else if($team=="manchester-united"){
    $id=189577;
}else if($team=="manchester-city"){
    $id=189570;
}

if($id!==0){
echo url_get_contents("https://www.fctables.com/teams/".$team."-".$id."/iframe/?type=team-next-match&lang_id=2&country=67&template=10&team=".$id."&timezone=Indian/Cocos&time=12&width=100%&height=100%&font=Times+new+roman&fs=12&lh=20&bg=FFFFFF&fc=388E3C&logo=1&tlink=1&scfs=22&scfc=000000&scb=1&sclg=1&teamls=60&sh=1&hfb=1&hbc=388E3C&hfc=FFFFFF");
}
?>
