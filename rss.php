 <?php  
 //You can see the content of this page here : http://monitor-rss-prod-rumble.azurewebsites.net/rss.xml
header("Content-Type: application/rss+xml; charset=UTF-8");
 
$xml = new SimpleXMLElement('<rss/>');
$xml->addAttribute("version", "2.0");
$mydate = date(DATE_RFC2822);

// Create connection
$con=mysqli_connect("us-cdbr-azure-east-a.cloudapp.net","b3db07afe6807b","6ac3a450","monitorrssfors5");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM monitorrssfors5.post ORDER BY pubDate DESC LIMIT 30;");



$channel = $xml->addChild("channel");
 
$channel->addChild("title", "Monitor S5 rss");
$channel->addChild("link", "Your website's uri");
$channel->addChild("description", "This feed is used to monitor S5 feed processing");
$channel->addChild("language", "en-us");


while($row = mysqli_fetch_array($result)) {

  $item = $channel->addChild("item");
  $item->addChild("title", $row['title']);
  $item->addChild("link", "http://rumble.me");
  $item->addChild("description", $row['description']);
  $item->addChild("pubDate", $row['description']);
 
}


$xml->asXML('rss.xml');


?>
