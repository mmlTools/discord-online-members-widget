# Discord online members list widget
This is a simple widget that reads data from the JSON widget url provided by discord for your server, you can use the results to ceate personalized widgets or just use it as raw.

## How to use ?
- Include the php class and create an instance of the widget
```php
<?php
require_once 'DiscordWidget/src/DiscordWidgetParser.php';
$widget = new \src\DiscordWidgetParser('YOUR DISCORD WIDGET JSON URL');
?>
```
- Use the functions inside as follows
```php
// Returns an auto generated invite link, usable for join buttons
public function GetInviteLink()

// Returns your server id
public function GetServerId()

// Returns your server name, good in case you print it and change the name afterward
public function GetServerName()

//Returns an ojbect of members, you can parse the status, onlin or idle
public function GetMembers($status = null)

// Returns the whole data from the url
public function GetData()
```