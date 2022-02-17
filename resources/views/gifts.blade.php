<?php
/**
 * @var \App\Models\GiftCategory[] $giftCategories
 * @var \App\Models\Invite $invite
 * @var int[] $giftCountsByTypes
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
	<title>New Year 2022</title>
</head>
<body class="body-wrap">

	<div class="inner-page">

		<a href="#" class="logo"></a>

		<div class="xtree">

		</div>

		<div class="sform sform-1">
			<div class="sform-logo">
                <img src="{{ asset('img/yandex.png') }}" alt="">
			</div>
			<div class="sform-close">

			</div>
			<div class="sform-inner">
				<div class="sform-inner__logo">
					<img src="{{ asset('img/yandex-plus.png') }}" alt="">
				</div>
				<div class="sform-inner__text">
					Новогодний плейлист, сотни фильмов на любой вкус, кешбэк на поездки, еду, отели, и многое другое! С Яндекс. <br>Плюс вы получите бонусы на весь год!
				</div>
			</div>
            @if ($giftCountsByTypes[$invite->is_vip ? "yandex_vip":"yandex"] > 0)
                <form class="sform-form"
                      action="{{ route('receive-gift', ['code' => $invite->code]) }}"
                      method="POST">
                    <label>
                        <input type="email" name="email" placeholder="@MailForm" class="sform-form__input">
                    </label>
                    <input type="hidden"
                           name="gift_type_id"
                           value="{{ $invite->is_vip ? '7':'1' }}"
                           class="sform-form__input" >
                    <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">
                    <button class="sform-form__btn"></button>
                </form>
                <div class="sform-hint">
                    Выберите подарок, введите почту, на которую <br>Вам будет отправлен код активации.
                </div>
            @else
                @include('layouts.out-of-gifts')
            @endif

		</div>

		<div class="sform sform-2">
			<div class="sform-logo">
                <img src="{{ asset('img/mvideo.png') }}" alt="">
			</div>
			<div class="sform-close">

			</div>
			<div class="sform-inner">
				<div class="sform-inner__logo">
                    <img src="{{ asset('img/mvideo-plus.png') }}" alt="">
				</div>
				<div class="sform-inner__text">
					Порадуйте себя или  <br>своих близких. <br>В Мвидео вы легко сможете <br>выбрать новый полезный гаджет!
				</div>
			</div>
            @if ($giftCountsByTypes[$invite->is_vip ? "mvideo_vip":"mvideo"] > 0)
                <form class="sform-form"
                      action="{{ route('receive-gift', ['code' => $invite->code]) }}"
                      method="POST">
                    <label>
                        <input type="email" name="email" placeholder="@MailForm" class="sform-form__input">
                    </label>
                    <input type="hidden"
                           name="gift_type_id"
                           value="{{ $invite->is_vip ? '8':'2' }}"
                           class="sform-form__input" >
                    <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">
                    <button class="sform-form__btn"></button>
                </form>
                <div class="sform-hint">
                    Выберите подарок, введите почту, на которую <br>Вам будет отправлен код активации.
                </div>
            @else
                @include('layouts.out-of-gifts')
            @endif
		</div>

		<div class="sform sform-3">
			<div class="sform-logo">
                <img src="{{ asset('img/amedia.png') }}" alt="">
			</div>
			<div class="sform-close">

			</div>
			<div class="sform-inner">
				<div class="sform-inner__logo">
                    <img src="{{ asset('img/amedia-plus.png') }}" alt="">
				</div>
				<div class="sform-inner__text">
					Достать любимый зимний плед <br>и наконец-то пересмотреть  <br>все фильмы и сериалы, которые <br>вы так давно откладывали!

				</div>
			</div>
            @if ($giftCountsByTypes["amedia"] > 0)
                <form class="sform-form"
                      action="{{ route('receive-gift', ['code' => $invite->code]) }}"
                      method="POST">
                    <label>
                        <input type="email" name="email" placeholder="@MailForm" class="sform-form__input">
                    </label>
                    <input type="hidden"
                           name="gift_type_id"
                           value="3"
                           class="sform-form__input" >
                    <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">
                    <button class="sform-form__btn"></button>
                </form>
                <div class="sform-hint">
                    Выберите подарок, введите почту, на которую <br>Вам будет отправлен код активации.
                </div>
            @else
                @include('layouts.out-of-gifts')
            @endif
		</div>

		<div class="sform sform-4">
			<div class="sform-logo">
                <img src="{{ asset('img/lamoda.png') }}" alt="">
			</div>
			<div class="sform-close">

			</div>
			<div class="sform-inner">
				<div class="sform-inner__logo">
                    <img src="{{ asset('img/lamoda-plus.png') }}" alt="">
				</div>
				<div class="sform-inner__text">
					Найдите себе новый образ – <br>порадуйте себя с Lamoda в новом году.
				</div>
			</div>
            @if ($giftCountsByTypes[$invite->is_vip ? "lamoda_vip":"lamoda"] > 0)
                <form class="sform-form"
                      action="{{ route('receive-gift', ['code' => $invite->code]) }}"
                      method="POST">
                    <label>
                        <input type="email" name="email" placeholder="@MailForm" class="sform-form__input">
                    </label>
                    <input type="hidden"
                           name="gift_type_id"
                           value="{{ $invite->is_vip ? '10':'4' }}"
                           class="sform-form__input" >
                    <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">
                    <button class="sform-form__btn"></button>
                </form>
                <div class="sform-hint">
                    Выберите подарок, введите почту, на которую <br>Вам будет отправлен код активации.
                </div>
            @else
                @include('layouts.out-of-gifts')
            @endif
		</div>

		<div class="sform sform-5">
			<div class="sform-logo">
                <img src="{{ asset('img/tasty.png') }}" alt="">
			</div>
			<div class="sform-close">

			</div>
			<div class="sform-inner">
				<div class="sform-inner__logo">
                    <img src="{{ asset('img/tasty-plus.png') }}" alt="">
				</div>
				<div class="sform-inner__text">
					С чашечкой ароматного кофе  <br>за праздничным столом  <br>еще уютнее и теплее.
				</div>
			</div>
            @if ($giftCountsByTypes[$invite->is_vip ? "tasty_vip":"tasty"] > 0)
                <form class="sform-form"
                      action="{{ route('receive-gift', ['code' => $invite->code]) }}"
                      method="POST">
                    <label>
                        <input type="email" name="email" placeholder="@MailForm" class="sform-form__input">
                    </label>
                    <input type="hidden"
                           name="gift_type_id"
                           value="{{ $invite->is_vip ? '11':'5' }}"
                           class="sform-form__input" >
                    <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">
                    <button class="sform-form__btn"></button>
                </form>
                <div class="sform-hint">
                    Выберите подарок, введите почту, на которую <br>Вам будет отправлен код активации.
                </div>
            @else
                @include('layouts.out-of-gifts')
            @endif
		</div>

		<div class="sform sform-6">
			<div class="sform-logo">
                <img src="{{ asset('img/ticket.png') }}" alt="">
			</div>
			<div class="sform-close">

			</div>
			<div class="sform-inner">
				<div class="sform-inner__logo">
                    <img src="{{ asset('img/ticket-plus.png') }}" alt="">
				</div>
				<div class="sform-inner__text">
					Вперед за яркими впечатлениями! <br>Любимый концерт или фестиваль, <br>Тысячи событий на ваш выбор <br>с Ticketland.ru.
				</div>
			</div>
            @if ($giftCountsByTypes[$invite->is_vip ? "ticket_vip":"ticket"] > 0)
                <form class="sform-form"
                      action="{{ route('receive-gift', ['code' => $invite->code]) }}"
                      method="POST">
                    <label>
                        <input type="email" name="email" placeholder="@MailForm" class="sform-form__input">
                    </label>
                    <input type="hidden"
                           name="gift_type_id"
                           value="{{ $invite->is_vip ? '12':'6' }}"
                           class="sform-form__input" >
                    <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">
                    <button class="sform-form__btn"></button>
                </form>
                <div class="sform-hint">
                    Выберите подарок, введите почту, на которую <br>Вам будет отправлен код активации.
                </div>
            @else
                @include('layouts.out-of-gifts')
            @endif
		</div>

		<div class="line">
			<div class="line-sock line-sock-1"></div>
			<div class="line-sock line-sock-2"></div>
			<div class="line-sock line-sock-3"></div>
			<div class="line-sock line-sock-4"></div>
			<div class="line-sock line-sock-5"></div>
			<div class="line-sock line-sock-6"></div>
		</div>

		<div class="santa">
			<h1 class="santa-header">С новым 2022 годом!</h1>
			<p class="santa-text">
				Пусть в новом году у вас на все найдется время. Остановитесь и почувствуйте то, чего действительно хочется. <br>Кликайте на носочек и выбирайте подарок!
			</p>
		</div>

		<a href="mailto:help@newyear-ehrmann.ru" class="help">help@newyear-ehrmann.ru</a>
	</div>

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/choose-gift.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
