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
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
	<title>Promo</title>
</head>
<body>

	<div class="modal" id="modal1">
		<div class="modal-inner">
			<a href="#" class="modal-close">
			</a>
			<div class="modal-logo">
				<img src="{{ asset('img/gift1-logo.png') }}" alt="">
			</div>
			<h2 class="modal-header">Ваши личные рекорды с подарками от Спортмастер</h2>
            @if ($giftCountsByTypes['sportmaster'] > 0)
			<form action="{{ route('receive-gift', ['code' => $invite->code]) }}"
                  method="POST"
                  class="modal-form">
                <label>
                    <input type="email" name="email" class="modal-form__inp" placeholder="your@mail.ru">
                </label>
                <input type="hidden"
                       name="gift_type_id"
                       value="1"
                       class="sform-form__input" >
                <input type="hidden"
                       name="_token"
                       value="{{ csrf_token() }}">
				<button class="modal-form__btn"></button>
			</form>
			<p class="modal-hint">Введите почту, на которую Вам будет отправлен код активации.</p>
            @else
                @include('layouts.out-of-gifts')
            @endif
		</div>
	</div>
	<div class="modal" id="modal2">
		<div class="modal-inner">
			<a href="#" class="modal-close">

			</a>
			<div class="modal-logo">
				<img src="{{ asset('img/gift2-logo.png') }}" alt="">
			</div>
			<h2 class="modal-header">Порадуйте себя новым гаджетом</h2>
            @if ($giftCountsByTypes['mvideo'] > 0)
			<form action="{{ route('receive-gift', ['code' => $invite->code]) }}"
                  method="POST"
                  class="modal-form">
                <label>
                    <input type="email" name="email" class="modal-form__inp" placeholder="your@mail.ru">
                </label>
                <input type="hidden"
                       name="gift_type_id"
                       value="2"
                       class="sform-form__input" >
                <input type="hidden"
                       name="_token"
                       value="{{ csrf_token() }}">
				<button class="modal-form__btn"></button>
			</form>
			<p class="modal-hint">Введите почту, на которую Вам будет отправлен код активации.</p>
            @else
                @include('layouts.out-of-gifts')
            @endif
		</div>
	</div>
	<main class="gift">
		<a href="mail:help@ehrmann-feb23.ru" class="mail">help@ehrmann-feb23.ru</a>
		<div class="gift-logo">
			<img src="{{ asset('img/logo.png') }}" alt="">
		</div>
		<div class="gift-line1">
			<img src="{{ asset('img/text1.png') }} " alt="">
		</div>
		<div class="gift-line2">
			<img src="{{ asset('img/text2.png') }} " alt="">
		</div>
		<div class="gift-inner">
			<div class="gift-inner__img">
				<img class="gift-img1" src="{{ asset('img/main-img1.png') }}" alt="">
			</div>
			<div class="gift-inner__main">
				<h1 class="gift-header">Еще больше побед с мощными подарками для тебя!</h1>
				<div class="gift-logos">
					<a href="#" class="gift-link" id="gift-link1">
						<img src="{{ asset('img/gift1.png') }}" alt="">
					</a>
					<a href="#" class="gift-link" id="gift-link2">
						<img src="{{ asset('img/gift2.png') }}" alt="">
					</a>
				</div>
				<div class="gift-separator"></div>
				<p class="gift-hint">Выберите подарок.</p>
			</div>
			<div class="gift-inner__img">
				<img class="gift-img2" src="{{ asset('img/main-img2.png') }}" alt="">
			</div>
		</div>
	</main>

	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
</html>
