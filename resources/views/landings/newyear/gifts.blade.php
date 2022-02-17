<?php
    /**
     * @var \App\Models\GiftCategory[] $giftCategories
     */
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="{{ asset("/css/app.css") }}" rel="stylesheet" />
        <link href="{{ asset("/css/bootstrap.min.css") }}" rel="stylesheet" />
		<title>С наступающим Новым Годом!</title>
	</head>
	<body>
		<main class="main">
			<section class="hero">
				<div class="hero__decoration"></div>
				<div class="hero-wrapper">
					<img class="hero-wrapper__line" src= "{{ asset("/img/img__border-decor.png") }}" alt="Граница для формы" />
					<img class="hero-wrapper__bg" src="{{ asset("/img/img__substrate.png") }}" alt="Подложка" />
					<img class="hero-wrapper__border" src="{{ asset("/img/img__border.png") }}" alt="Граница всей формы" />
					<img class="hero__logo" src="{{ asset("/img/img__logo.png") }}" alt="Логотип Ehrmann" />
					<div class="hero-wrapper__inner">
						<h1 class="hero__title">С праздником!</h1>
						<div class="hero__main-img">
                            <div class="row">
                                @foreach ($giftCategories as $category)
                                    <div class="col-md-{{floor(count($giftCategories))}}">
                                        {{ $category->name }}
                                        <button class="js-category-item"
                                                data-modal-id="modal-gift-category-{{$category->id}}"
                                        >
                                            Open
                                        </button>
                                    </div>
                                @endforeach
                            </div>
						</div>
                    </div>
				</div>
			</section>
        </main>

        @foreach($giftCategories as $category)
            @include('popups.gift-popup', [
                'giftTypes' => $category->giftTypes(),
                'modalTrigger' => "modal-gift-category-{$category->id}",
            ])
        @endforeach

        @include('popups.gift-not-chosen-popup')
        @include('popups.out-of-gifts-popup')

    </body>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/notify.min.js') }}"></script>
    <script src="{{ asset('js/choose-gift.js') }}"></script>
    <script>
        @if (isset($error) && !empty($error))
            $.notify('{{$error}}');
        @endif
    </script>
</html>
