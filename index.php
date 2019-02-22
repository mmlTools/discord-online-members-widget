<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
/** DISCORD SETTINGS **/
$widget_url = "https://discordapp.com/api/guilds/334821910988718092/widget.json";
$invite_url = "https://discordapp.com/invite/dE662rs";
$members_to_show = 12;
$channel_data = json_decode(file_get_contents($widget_url), true);

echo "<div class=\"script-container\">";
echo "<div class=\"content-box\">";
echo "<div class=\"header\">";
echo "<h3>";
echo "Discord members online ( ".count($channel_data["members"])." )";
echo "</h3>";
echo "</div>";
echo "<div class=\"content\">";
echo "<div class=\"discord-members\">";
foreach ($channel_data["members"] as $key => $member) {
    if ($key >= $members_to_show) break;
    echo "<div class=\"discord-member\">";
    echo "<div class=\"member-box\">";
    echo "<div class='discord-avatar' style='background: url({$member["avatar_url"]}) no-repeat'></div>";
    echo "</div>";
    echo "</div>";
}
echo "</div>";
echo "</div>";
echo "<div class=\"widget-footer\">";
echo "<a href=\"{$invite_url}\" target=\"_blank\" class=\"discord-btn\">Join now on our discord channel</a>";
echo "</div>";
echo "</div>";
echo "</div>";
?>
</body>
</html>