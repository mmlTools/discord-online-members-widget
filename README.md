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
// Returns server invite url
GetInviteLink()

// Returns server id
GetServerId()

// Returns server name
GetServerName()

// Returns total online and idle members
GetTotalActiveMembers()

// Returns members list array
GetMembersList($status = null)

// Returns members list rendered html
RenderMembersList($results = 10, $status = null, $rand = true)

// Returns the whole json data to use it wherever you want
GetData()
```