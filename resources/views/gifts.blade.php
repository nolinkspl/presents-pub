<?php
/**
 * @var \App\Models\GiftCategory[] $giftCategories
 * @var \App\Models\Invite $invite
 * @var int[] $giftCountsByTypes
 * @var \App\Models\GiftType[] $giftTypesByName
 */
?>
    <!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">

</head>
<body>
<div class="test">
    <img src="img/flashlight.png" alt="">
</div>
<div class="test2">
    <img src="img/flashlight.png" alt="">
</div>
<div class="test3">
    <img src="img/flashlight.png" alt="">
</div>
<div class="logo_img">
    <img class="logo" src="{{ asset('img/logo.png') }}">
</div>
<div class="product">
    <div class="container">
        <div class="main_product">
            <!-- <ul class="logo_img_icon">
                <li><img class="sportmaster" src="img/sportmaster.png"></li>
                <li><img class="lamoda" src="img/lamoda.png"></li>
                <li><img class="topstrech" src="img/topstrech.png"></li>
                <li><img class="letoile" src="img/letoile.png"></li>
            </ul> -->
            <ul class="img_prod">
                <li>
                    <div class="sportmaster_block">
                        <img class="sportmaster" src="{{ asset('img/sportmaster.png') }}">
                    </div>
                    <img class="mama_lama" src="{{ asset('img/mama_lama1.png') }}" alt="">
                </li>
                <li>
                    <div class="lamoda_block">
                        <img class="lamoda" src="{{ asset('img/lamoda.png') }}">
                    </div>
                    <img class="grand" src="{{ asset('img/grand1.png') }}" alt="">
                </li>
                <li>
                    <div class="topstrech_block">
                        <img class="topstrech" src="{{ asset('img/topstrech.png') }}">
                    </div>
                    <img class="epica" src="{{ asset('img/epica1.png') }}" alt="">
                </li>
                <li>
                    <div class="letoile_block">
                        <img class="letoile" src="{{ asset('img/letoile.png') }}">
                    </div>
                    <img class="epica2" src="{{ asset('img/epica22.png') }}" alt="">
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="conveer_img">
    <img src="{{ asset('img/conveer.png') }}">
</div>
<div class="conveer_img_mobile">
    <img src="{{ asset('img/polosa.png') }}">
</div>
<div class="congratulation">
    <p>Время <br>удовольствий</p>
</div>


    <form id="auth"
          action="{{route('receive-gift', $invite->getCode())}}"
          method="POST"
          class="form js-gift-choosing-form">
        <img class="snow" src="{{ asset('img/snow.png') }}">
        <div class="main_form">
            <div class="txt_close">
                <p class="sport_master_text">Спортмастер</p>
                <img class="close" src="{{ asset('img/close.png') }}">
            </div>
            <div class="block_form">
                <div class="img_text">
                    <div class="image_choise">
                        <a href="https://www.sportmaster.ru/" target="blank"><img class="sport_img"
                                                                                  src="{{ asset('img/sport.png') }}"></a>
                    </div>
                    <p class="sport_txt">Ваши личные рекорды с подарками  от Спортмастер</p>
                </div>
                @if ($giftCountsByTypes['sport'] > 0)
                <div class="send">
                    <input required type="email" class="txt" name="email" placeholder="Укажите e-mail"></p>
                    <!-- <input class="mail_send" type="submit" form="auth" value=">>"> -->
                    <button type="submit" class="mail_send">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="white" width="26px">
                            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z"/>
                        </svg>
                    </button>
                </div>
                <input type="hidden"
                       name="gift_type_id"
                       value="{{ $giftTypesByName['sport']->id }}"
                       class="sform-form__input">
                <input type="hidden"
                       name="_token"
                       value="{{ csrf_token() }}">
                <div class="choose_gift">
                    <p align="right">Выберите подарок, введите почту, на которую <br>Вам будет отправлен код активации.
                    </p>
                </div>
                @else
                    @include('layouts.out-of-gifts')
                @endif
            </div>
        </div>
    </form>




    <form id="auth_2"
          action="{{route('receive-gift', $invite->getCode())}}"
          method="POST"
          class="form js-gift-choosing-form">
        <img class="snow" src="{{ asset('img/snow.png') }}">
        <div class="main_form">
            <div class="txt_close">
                <p class="sport_master_text">Lamoda</p>
                <img class="close" src="{{ asset('img/close.png') }}">
            </div>
            <div class="block_form">
                <div class="img_text">
                    <div class="image_choise">
                        <a href="https://www.lamoda.ru/" target="blank"><img class="lamoda_img"
                                                                             src="{{ asset('img/logo-lamoda.png') }}"></a>
                    </div>
                    <p class="lamoda_txt">Подарки, которые точно понравятся</p>
                </div>
                @if ($giftCountsByTypes['lamoda'] > 0)
                <div class="send">
                    <input required type="email" type="text" class="txt" name="email" placeholder="Укажите e-mail"></p>
                    <!-- <input class="mail_send" type="submit" form="auth" value=">>"> -->
                    <button class="mail_send">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="white" width="26px">
                            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z"/>
                        </svg>
                    </button>
                </div>
                <input type="hidden"
                       name="gift_type_id"
                       value="{{ $giftTypesByName['lamoda']->id }}"
                       class="sform-form__input">
                <input type="hidden"
                       name="_token"
                       value="{{ csrf_token() }}">
                <div class="choose_gift">
                    <p align="right">Выберите подарок, введите почту, на которую <br>Вам будет отправлен код активации.
                    </p>
                </div>
                @else
                    @include('layouts.out-of-gifts')
                @endif
            </div>
        </div>
    </form>




    <form id="auth_3"
          action="{{route('receive-gift', $invite->getCode())}}"
          method="POST"
          class="form js-gift-choosing-form">
        <img class="snow" src="{{ asset('img/snow.png') }}">
        <div class="main_form">
            <div class="txt_close">
                <p class="sport_master_text">TOPSTRETCHING</p>
                <img class="close" src="{{ asset('img/close.png') }}">
            </div>
            <div class="block_form">
                <div class="img_text">
                    <div class="image_choise_3">
                        <a href="https://topstretching.com/" target="blank"><img class="top-strech"
                                                                                 src="{{ asset('img/top-strech.png') }}"></a>
                    </div>
                    <p class="top-strech_txt">Все форматы авторских он-лайн курсов от топ тренеров</p>
                </div>
                @if ($giftCountsByTypes['top-strech'] > 0)
                <div class="send">
                    <input required type="email" type="text" class="txt" name="email" placeholder="Укажите e-mail"></p>
                    <!-- <input class="mail_send" type="submit" form="auth" value=">>"> -->
                    <button class="mail_send">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="white" width="26px">
                            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z"/>
                        </svg>
                    </button>
                </div>
                <input type="hidden"
                       name="gift_type_id"
                       value="{{ $giftTypesByName['top-strech']->id }}"
                       class="sform-form__input">
                <input type="hidden"
                       name="_token"
                       value="{{ csrf_token() }}">
                <div class="choose_gift">
                    <p align="right">Выберите подарок, введите почту, на которую <br>Вам будет отправлен код активации.
                    </p>
                </div>
                @else
                    @include('layouts.out-of-gifts')
                @endif
            </div>
        </div>
    </form>



    <form id="auth_4"
          action="{{route('receive-gift', $invite->getCode())}}"
          method="POST"
          class="form js-gift-choosing-form">
        <img class="snow" src="{{ asset('img/snow.png') }}">
        <div class="main_form">
            <div class="txt_close">
                <p class="sport_master_text">Л'ЭТУАЛЬ</p>
                <img class="close" src="{{ asset('img/close.png') }}">
            </div>
            <div class="block_form">
                <div class="img_text">
                    <div class="image_choise_4">
                        <a href="https://www.letu.ru/" target="blank"><img class="le_toile"
                                                                           src="{{ asset('img/l-etoile.png') }}"></a>
                    </div>
                    <p class="le_toile_txt">Стань еще привлекательнее с подарками от Л'Этуаль</p>
                </div>
                @if ($giftCountsByTypes['l-etoile'] > 0)
                <div class="send">
                    <input required type="email" class="txt" name="email" placeholder="Укажите e-mail"></p>
                    <!-- <input class="mail_send" type="submit" form="auth" value=">>"> -->
                    <button type="submit" class="mail_send">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="white" width="26px">
                            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z"/>
                        </svg>
                    </button>
                </div>
                <input type="hidden"
                       name="gift_type_id"
                       value="{{ $giftTypesByName['l-etoile']->id }}"
                       class="sform-form__input">
                <input type="hidden"
                       name="_token"
                       value="{{ csrf_token() }}">
                <div class="choose_gift">
                    <p align="right">Выберите подарок, введите почту, на которую <br>Вам будет отправлен код активации.
                    </p>
                </div>
                @else
                    @include('layouts.out-of-gifts')
                @endif

            </div>
        </div>
    </form>

<script src="{{ asset('assets/js/jquery-3.6.2.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/notify.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
</body>
</html>
