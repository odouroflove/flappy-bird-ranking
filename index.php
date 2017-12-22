<?php require 'login.php';
$_SESSION['codedata'] = md5(time());
 ?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Flappy Bird - Nghia is Game</title>
        <link rel="apple-touch-icon-precomposed" href="data/img/touch-icon-iphone.png"/>
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="data/img/touch-icon-iphone-retina.png"/>
        <link rel="shortcut icon" href="data/img/favicon.ico">
        <link rel="stylesheet" type="text/css" media="screen" href="index.css">
        <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Clumsy Bird">
        <meta charset="UTF-8" />
        <meta name="description" content="Flappy Bird Game"/>
        <meta name="keywords" content="flappybird, flappy, bird, game, html5, melonjs,clone"/>
        <meta name="robots" content="index, follow">
        <meta name="google-site-verification" content="RDZI9SqVaffd48uHfZMv67-YdvviOMe2HuULEYqVgd4" />
        <meta property="og:image" content="assets/img/bg.png" />
        <meta property="og:title" content="Flappy bird - Nghia is Game"/>
        <meta property="og:url" content="https://game.nghia.org/flappybird/"/>
        <meta property="og:site_name" content="Flappy Bird - Nghia is Game"/>

	<style>
	.ads-left {
		width: 150px;
		height: 600px;
		position: fixed;
		left: 0;
		top: 20;
		z-index: 1000;
	}

	.ads-right{
		width: 150px;
		height: 600px;
		position: fixed;
		right: 0;
		top: 20;
		z-index: 1000;
	}
		body {
		  background-color: #e9ebee;
		}
		.profile-picture {
		  border-radius: 100%;
		  width: 32px;
		  height: 32px;
		}
		.readmore {
		  margin-top: 8px;
		}
		</style>
    </head>

    <body>
		
		<?php if(isset($accessToken)): ?>
		<input id="codedata" value="<?php echo $_SESSION['codedata'] ?>" hidden>
		
        <!-- Canvas placeholder -->
        <div id="screen"></div>
		
		<!-- Ranking Redirect -->
		<center><a href="ranking" target="_blank">Bảng xếp hạng</a></center>

        <!-- melonJS Library -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/melonJS-min.js" ></script>
		<script type="text/javascript" src="js/game.js" ></script>
        <script type="text/javascript" src="build/clumsy-min.js" ></script>
		
		<!-- Screens Data -->
        <script type="text/javascript" src="js/screens/play.js" ></script>
        <script type="text/javascript" src="js/screens/title.js" ></script>
		
		<!-- Data Game -->
        <script type="text/javascript" src="data/game/data.js" ></script>
        <script type="text/javascript">
            window.onReady(function onReady() {
                game.onload();
            });
        </script>
		<?php else: ?>
			<center><font color="black">Vui lòng <a href="<?php echo $loginUrl ?>">đăng nhập bằng Facebook</a> để tiếp tục</font></center>
		<?php endif; ?>

    </body>
</html>
