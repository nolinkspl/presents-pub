<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href = {{ asset("/css/bootstrap.min.css") }} rel="stylesheet" />
        <link href= {{ asset("/css/show-gift.css") }} rel="stylesheet" />
        <title>С наступающим Новым Годом!</title>

        <!-- Styles -->
        <style>

        </style>
	</head>
	<body>
		<main class="main">
			<section class="hero">
				<div class="hero__decoration"></div>
				<div class="hero-wrapper">
					<div class="hero-wrapper__inner">
						<h3 class="hero__title">С наступающим Новым Годом!</h3>
						<div class="hero__main-img flex-center position-ref" >
							<div class="content">
                                <h5>
                                    Код вашего подарка: <h4>{{ $gift->getCode() }}</h4>
                                </h5>
                                <br>
                                <div width="100">
                                    {!! $gift->getType()->description !!}
                                </div>
                            </div>
						</div>
                    </div>
                    <img class="hero__logo" src="{{ asset("/img/img__logo.png") }}" alt="Логотип Ehrmann" />
                </div>
			</section>
        </main>
    </body>
</html>
