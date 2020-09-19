<?php

$html=file_get_contents("http://www.blogger.com/feeds/8849054409140758789/posts/default/1134547001646551443");
$html=str_replace("&lt;","<",$html);
$html=str_replace("&gt;",">",$html);
$html=str_replace("&sol;","/",$html);
//echo $html;
$counter=-1;
$links=array();
$output=array(
    'date'=>'',
    'matches'=>array()
    );
$mat=array();
$even=false;

$regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
if(preg_match_all("/$regexp/siU", $html, $matches, PREG_SET_ORDER)) { 
    foreach($matches as $match) { // 
    $links[]=$match[2];// = link address
    //echo $match[2]."\n";
    //echo $match[3];// = link text
    }
}

$dom = new domDocument;
@$dom->loadHTML($html);
$dom->preserveWhiteSpace = true;
$tables = $dom->getElementsByTagName('table');
//$xpath = new DOMXPath($dom);
//$ch=false;
if(!empty($tables)){
$rows = $tables->item(0)->getElementsByTagName('tr');
foreach ($rows as $row) {
$cols = $row->getElementsByTagName('td');

foreach ($cols as $col) {
    //echo 'value = ' . $col->nodeValue;
    if($counter==-1){
        $output['date']=$col->nodeValue;
        $counter++;
        $even=true;
        continue 2;
    }else{
        if(strpos($col->nodeValue,"WATCH")!==false){
        $mat['link']=$links[$counter];
        }else if(strpos($col->nodeValue,"Competition")!==false){
        $mat['competition']=str_replace("Competition: ","",$col->nodeValue);
        }else{
        $mat['vs']=$col->nodeValue;
        }
    }
    

//if($xpath->evaluate('count(./a)', $col) > 0) { 
    // check if an anchor exists 
//echo ' | link = ' . $xpath->evaluate('string(./a/@href)', $col); // if there is, then echo the href value
//echo $col->getAttribute("href");

//}

//echo '<br/>';
}//each col


if(!$even){
            array_push($output['matches'],$mat);
    $counter++;

}
$even=!$even;


//$data=$cols[0]->textContent;
//echo $data;
//$data=$cols[1]->textContent;
//echo $data;
//$link=(string)(new SimpleXMLElement($data))['href'];
//preg_match('/href=(["\'])([^\1]*)\1/i', $data, $m);
//echo $m[1] . "\n";
//echo (string)$cols[3];
}//each row
}//if !empty
//}else{
    //echo $html;
//}

//$start=strpos($html,"<table");
//$end=strpos($html,"/table>")+7;
//$table=substr($html,$start,$end);
//echo "table<br>";
//echo $table;
echo json_encode($output);
?>
