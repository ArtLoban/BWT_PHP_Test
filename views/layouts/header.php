<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Погода в ZP</title>
		<link href="/template/css/bootstrap.css" rel="stylesheet">
		<link href="/template/css/main.css" rel="stylesheet">
	</head>
	
	<body>
		<div class="page-wrapper">

            <header>
                <div class="header">
                    <nav class="navbar navbar-default navbar-static-top">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="site-header text-center">
                                    <a>Погода в Запорожье сегодня</a>
                                </div>
                            </div>

                            <div id="navbar" class="navbar-collapse collapse">
                                <?php if(isset($_SESSION['user'])): ?>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="/">Главная</a></li>
                                        <li><a href="/feedback/post">Оставить отзыв</a></li>
                                        <li><a href="/feedback/list/page-1">Обратная связь</a></li>
                                        <li><a href="/user/logout">Выход</a></li>                                    </ul>
                                <?php endif; ?>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </header>