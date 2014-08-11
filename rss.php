 <?php  
header("Content-Type: application/rss+xml; charset=UTF-8");
 
$xml = new SimpleXMLElement('<rss/>');
$xml->addAttribute("version", "2.0");


$entries = array(
    array(
        "title" => "My first test entry",
        "description" => "This is the first article's description",
        "link" => "http://leolabs.org/my-first-article-url"
    ),
    array(
        "title" => "My second test entry",
        "description" => "This is the second article's description",
        "link" => "http://leolabs.org/my-second-article-url"
    ),
    array(
        "title" => "My third test entry",
        "description" => "This is the third article's description",
        "link" => "http://leolabs.org/my-third-article-url"
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
}

echo $xml->asXML();


?>
