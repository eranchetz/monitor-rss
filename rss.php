 <?php  
header("Content-Type: application/rss+xml; charset=UTF-8");
 
$xml = new SimpleXMLElement('<rss/>');
$xml->addAttribute("version", "2.0");
$mydate = date(DATE_RFC2822);

$element = array(
        "title" => $mydate,
        "description" => "Monitor" .  $mydate,
        "link" => "http://rumble.me",
        "pubDate" => $mydate
    )


$entries = array(
    array(
        "title" => $mydate,
        "description" => "Monitor" .  $mydate,
        "link" => "http://rumble.me",
        "pubDate" => $mydate
    )
);


$channel = $xml->addChild("channel");
 
$channel->addChild("title", "Your feed title");
$channel->addChild("link", "Your website's uri");
$channel->addChild("description", "Describe your feed");
$channel->addChild("language", "en-us");



foreach ($entries as $entry) {
    $item = $channel->addChild("item");
 
    $item->addChild("title", $entry['title']);
    $item->addChild("link", $entry['link']);
    $item->addChild("description", $entry['description']);
    $item->addChild("pubDate", $entry['pubDate']);
}

echo $xml->asXML();

array_push($entries, $element)

?>
