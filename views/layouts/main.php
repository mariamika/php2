<?php ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body>
<header>
    <div class="nav_top">
        <div class="container">
            <div class="logo">
                <a href="/">
                    <img src="/img/logo.png" alt="logo">
                    <div class="logo_text">bran<span>d</span></div>
                </a>
                <a href="/user" class="account">My account <img src="/img/down-arrow.png" alt="down-arrow" width="9"></a>
                <a href="/basket">
                    <div style="float: right; font-size: 20px;
                            color: #f16d7f; font-family: lato-black, sans-serif; font-weight: 400;">
                        <?php echo $amount?>
                        <img src="/img/corzina.png" alt="corzina" class="corzina">
                    </div>
                </a>
            </div>
        </div>
    </div>
</header>
<div class="content" style="display: block"><?=$content?></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
