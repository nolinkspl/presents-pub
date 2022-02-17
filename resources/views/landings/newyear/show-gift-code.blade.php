<?php
/**
 * @var \App\Models\Gift $gift
 */
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
		<link href="{{ asset("/css/app.css") }}" rel="stylesheet" />
        <title>С праздником!</title>
	</head>
	<body>
		<main class="main">
			<section class="hero">
				<div class="hero__decoration"></div>
				<div class="hero-wrapper">
					<img class="hero-wrapper__bg" src="{{ asset("/img/img__substrate.png") }}" alt="Подложка" />
					<img class="hero-wrapper__border" src="{{ asset("/img/img__border.png") }}" alt="Граница всей формы" />
					<img class="hero__logo" src="{{ asset("/img/img__logo.png") }}" alt="Логотип Ehrmann" />
					<div class="hero-wrapper__inner">
						<h3 class="hero__title">С праздником!</h3>
						<div class="content">
                            <div class="form-group title_gift_code m-m-md"> Код вашего подарка: </div>
                            <div class="form-group row">
                                <div class="bg-light border rounded gift_code">
                                    {{ $gift->getCode() }}
                                </div>
                            </div>
                            <div class="form-group gift_description">
                                {!! $gift->getType()->description !!}
                            </div>
                            <div class="form-group text-light sended_to_email">
                                Промокод и инструкция отправлены Вам на электронную почту
                            </div>
                        </div>
					</div>
                </div>
			</section>
        </main>

    </body>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/choose-gift.js') }}"></script>
    <script>
        @if (isset($error) && !empty($error))
            $.notify('{{$error}}');
        @endif
    </script>
</html>
