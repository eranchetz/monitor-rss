 <?php  
header("Content-Type: application/rss+xml; charset=UTF-8");
 
$xml = new SimpleXMLElement('<rss/>');
$xml->addAttribute("version", "2.0");
$mydate = date(DATE_RFC2822);



$entries = array(
    array(
        "title" => $mydate,
        "description" => "Monitor" .  $mydate,
        "link" => "http://rumble.me",
        "pubDate" => $mydate
    )
);


$channel = $xml->addChild("channel");
 
$channel->addChild("title", "Monitor S5 rss");
$channel->addChild("link", "Your website's uri");
$channel->addChild("description", "This feed is used to monitor S5 feed processing");
$channel->addChild("language", "en-us");



foreach ($entries as $entry) {
    $item = $channel->addChild("item");
 
    $item->addChild("title", $entry['title']);
    $item->addChild("link", $entry['link']);
    $item->addChild("description", $entry['description']);
    $item->addChild("pubDate", $entry['pubDate']);
}

$xml->asXML(rss.xml);


?>
