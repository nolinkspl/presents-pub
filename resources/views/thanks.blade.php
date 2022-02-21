<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<title>Promo</title>
</head>
<body>

	<main class="gift">
		<a href="mail:help@ehrmann-feb23.ru" class="mail">help@ehrmann-feb23.ru</a>
		<div class="gift-logo">
			<img src="{{ asset('img/logo.png') }}" alt="">
		</div>
		<div class="gift-line1">
			<img src="{{ asset('img/text1.png') }}" alt="">
		</div>
		<div class="gift-line2">
			<img src="{{ asset('img/text2.png') }}" alt="">
		</div>
		<div class="gift-inner">
			<div class="gift-inner__img">
				<img class="gift-img1" src="{{ asset('img/main-img1.png') }}" alt="">
			</div>
			<div class="gift-inner__main">
				<h1 class="gift-header">Сертификат и инструкция по его использованию отправлены на Ваш адрес электронной почты.<br>
                <br>С праздником!</h1>
			</div>
			<div class="gift-inner__img">
				<img class="gift-img2" src="{{ asset('img/main-img2.png') }}" alt="">
			</div>
		</div>
	</main>

	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
</html>
