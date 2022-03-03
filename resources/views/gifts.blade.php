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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Время удовольствий</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/media.css') }}">
</head>
<body>
<main id="gift">

    <div class="gift_item item_img">
        <img src="{{ asset('img/product.png') }}" alt="">
    </div>
    <div class="gift_item item_form">
        <div class="block">
            <h1>С ЗАБОТОЙ И ЛЮБОВЬЮ</h1>
            <strong>Мы подготовили для Вас подарки, <br>чтобы каждая нашла что-то по душе.</strong>
            <div class="modal item-modal-1">
                <div class="close"><img src="{{ asset('img/close.png') }}" alt=""></div>
                <img src="{{ asset('img/modal-lamoda.png') }}" alt="">
                <p>Создай новый образ в Lamoda.</p>
                @if ($giftCountsByTypes['lamoda'] > 0)
                    @include('layouts.email-form', ['invite' => $invite, 'giftTypeId' => 1])
                @else
                    @include('layouts.out-of-gifts')
                @endif
            </div>
            <div class="modal item-modal-2">
                <div class="close"><img src="{{ asset('img/close.png') }}" alt=""></div>
                <img src="{{ asset('img/modal-Mvideo.png') }}" alt="">
                <p>Выбери новый гаджет в Мвидео. </p>
                @if ($giftCountsByTypes['mvideo'] > 0)
                    @include('layouts.email-form', ['invite' => $invite, 'giftTypeId' => 2])
                @else
                    @include('layouts.out-of-gifts')
                @endif
            </div>
            <div class="modal item-modal-3">
                <div class="close"><img src="{{ asset('img/close.png') }}" alt=""></div>
                <img src="{{ asset('img/modal-Лэтуаль.png') }}" alt="">
                <p> Стань ещё привлекательнее с подарками от Л’Этуаль. </p>
                @if ($giftCountsByTypes['letual'] > 0)
                    @include('layouts.email-form', ['invite' => $invite, 'giftTypeId' => 3])
                @else
                    @include('layouts.out-of-gifts')
                @endif
            </div>
            <ul>
                <li class="modal-trigget" data-modal="1"><img src="{{ asset('img/lamoda.png') }}" alt=""></li>
                <li class="modal-trigget" data-modal="2"><img src="{{ asset('img/mvideo.png') }}" alt=""></li>
                <li class="modal-trigget" data-modal="3"><img src="{{ asset('img/Лэтуаль.png') }}" alt=""></li>
            </ul>
            <p>Выберите подарок.</p>
        </div>
    </div>
</main>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
