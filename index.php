<?php
require_once 'DiscordWidget/src/DiscordWidgetParser.php';
$widget = new \src\DiscordWidgetParser('https://discord.com/api/guilds/334821910988718092/widget.json');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Discord widget demo</title>
    <style type="text/css">
        html{
            height: 100%;
            width: 100%;
        }
        body{
            background: url(DiscordWidget/src/img/bg.jpg);
            background-position: center top;
            background-size: cover;
            font-family: sans-serif;
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }
        .container{
            display: flex;
            height: 100%;
            width: 100%;
            align-content: center;
            align-items: center;
            justify-content: center;
        }
    </style>
    <link rel="stylesheet" href="DiscordWidget/src/css/style.css">
</head>
<body>
    <div class="container">
        <div id="DiscordWidget" class="content-box">
            <div class="header">
                <span><?= $widget->GetServerName() ?></span>
                <span>Users online - <?= count($widget->GetMembers()) ?> -</span>
            </div>
            <div class="content">
                <?php foreach (array_rand($widget->GetMembers(), 5) as $i): $user = $widget->GetMembers()[$i]?>
                    <div class="discord-member">
                        <div class="discord-avatar" style="background: url('<?= $user->avatar_url ?>') no-repeat"></div>
                        <div class="discord-username"><?= $user->username ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="widget-footer">
                <a href="<?= $widget->GetInviteLink() ?>" target="_blank" class="discord-btn">Join now on our discord channel</a>
            </div>
        </div>
    </div>
</body>
</html>