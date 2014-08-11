 <?php  
header("Content-Type: application/rss+xml; charset=UTF-8");
 
$xml = new SimpleXMLElement('<rss/>');
$xml->addAttribute("version", "2.0");
$mydate = date(DATE_RFC2822);

$entries = array(
    array(
        "title" => "Monitor 1",
        "description" => "This is the first article's description",
        "link" => "http://rumble.me",
        "pubDate" => $mydate
    ),
    array(
        "title" => "My second test entry",
        "description" => "This is the second article's description",
        "link" => "http://leolabs.org/my-second-article-url",
        "pubDate" => "date"
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


?>
