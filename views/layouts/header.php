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
							<div class="row vertical-align">
								<div class="col-md-6">
                                    <div class="title">
                                        <h1 class="text-center text-success ">Погода в Запорожье сегодня</h1>
                                    </div>
								</div>
                                    <?php if(isset($_SESSION['user'])): ?>
                                        <div class="col-md-6">
                                            <div class="navbar-right">
                                                <ul class="nav nav-pills ">
                                                        <li><a href="/">Главная</a></li>
                                                        <li><a href="/feedback/post">Оставить отзыв</a></li>
                                                        <li><a href="/feedback/list/page-1">Обратная связь</a></li>
                                                        <li><a href="/user/logout">Выход</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endif; ?>
							</div>
						</div>
					</nav>
				</div>
			</header>