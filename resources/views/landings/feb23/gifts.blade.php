<?php
/**
 * @var \App\Models\GiftCategory[] $giftCategories
 * @var \App\Models\Invite $invite
 * @var int[] $giftCountsByTypes
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <title>Ehrmann</title>
</head>

<body class="main__page">
<header class="header lock-padding">
    <figure class="logo">
        <picture>
            <source srcset=" {{ asset('img/logo_ehrmann.webp') }}" type="image/webp">
            <img src="{{ asset('img/logo_ehrmann.png') }}" alt="logo">
        </picture>
    </figure>
    <picture>
        <source srcset="{{ asset('img/bg_header.webp') }}" type="image/webp">
        <img class="layer layer__header" src="{{ asset('img/bg_header.png') }}" alt="layer">
    </picture>
</header>
<main class="main wrapper lock-padding">
    <section class="holiday">
        <div class="container">
            <figure class="holiday__main-text">
                <picture>
                    <source srcset="{{ asset('img/text1.webp') }}" type="image/webp">
                    <img src="{{ asset('img/text1.png') }}" alt="C праздником">
                </picture>
            </figure>
            <div class="holiday__block">
                <div class="holiday__block-image">
                    <picture>
                        <source srcset="{{ asset('img/23.webp') }}" type="image/webp">
                        <img class="holiday__block-img holiday__number" src="{{ asset('img/23.png') }}" alt="number">
                    </picture>
                    <picture>
                        <source srcset="{{ asset('img/white_circle.webp') }}" type="image/webp">
                        <img class="holiday__block-img holiday__circle" src="{{ asset('img/white_circle.png') }}"
                             alt="circle">
                    </picture>
                    <picture>
                        <source srcset="{{ asset('img/hend.webp') }}" type="image/webp">
                        <img class="holiday__block-img holiday__hand" src="{{ asset('img/hend.png') }}" alt="hend">
                    </picture>
                </div>
            </div>
            <div class="holiday__block holiday__block-month">
                <picture>
                    <source srcset="{{ asset('img/lenta.webp') }}" type="image/webp">
                    <img class="holiday__block-img holiday__month" src="{{ asset('img/lenta.png') }}" alt="month"></picture>
            </div>
        </div>
    </section>
    <section class="contact">
        <div class="container">
            <div class="contact__block">
                <h2 class="contact__title">
                    Мы подготовили для Вас подарки,<br> чтобы каждый нашёл что-то по душе.
                </h2>
                <div class="contact__text">
                    <p>Выберите категорию, подарок и введите электронную почту, на которую Вам будет отправлен код
                        активации.</p>
                    <p>Если вы не можете воспользоваться подарком, то его можно отдать своим друзьям или родным.</p>
                </div>
                <div class="contact__buttons">

                    <a href="#popup1" class="contact__btn">
                        <picture>
                            <source srcset="{{ asset('img/sport-btn.webp') }}" type="image/webp">
                            <img class="contact__img" src="{{ asset('img/sport-btn.png') }}" alt="btn"></picture>
                        <picture>
                            <source srcset="{{ asset('img/sport-btn-active.webp') }}" type="image/webp">
                            <img class="contact__img-active" id="panel-1" src="{{ asset('img/sport-btn-active.png') }}" alt="btn">
                        </picture>
                        <div class="popup__tray">
                            <p>* СПОРТИВНЫМ ФАНАТАМ</p>
                        </div>
                    </a>

                    <a href="#popup2" class="contact__btn">
                        <picture>
                            <source srcset="{{ asset('img/build-btn.webp') }}" type="image/webp">
                            <img class="contact__img" src="{{ asset('img/build-btn.png') }}" alt="btn"></picture>
                        <picture>
                            <source srcset="{{ asset('img/build-btn-active.webp') }}" type="image/webp">
                            <img class="contact__img-active" id="panel-2" src="{{ asset('img/build-btn-active.png') }}" alt="btn">
                        </picture>
                        <div class="popup__tray">
                            <p>* ЛЮБИТЕЛЯМ СТРОИТЬ</p>
                        </div>
                    </a>

                    <a href="#popup3" class="contact__btn">
                        <picture>
                            <source srcset="{{ asset('img/game-btn.webp') }}" type="image/webp">
                            <img class="contact__img" src="{{ asset('img/game-btn.png') }}" alt="btn"></picture>
                        <picture>
                            <source srcset="{{ asset('img/game-btn-active.webp') }}" type="image/webp">
                            <img class="contact__img-active" id="panel-3" src="{{ asset('img/game-btn-active.png') }}"
                                 alt="btn"></picture>
                        <div class="popup__tray">
                            <p>* НАСТОЯЩИМ ГЕЙМЕРАМ</p>
                        </div>
                    </a>

                </div>

            </div>
        </div>

        <div id="popup1" class="popup">
            <div class="popup__body">
                <div class="popup__content">
                    <a href="#header" class="popup__close close-popup">
                        <picture>
                            <source srcset="{{ asset('img/close.webp') }}" type="image/webp') }}">
                            <img src="{{ asset('img/close.png') }}" alt="close"></picture>
                    </a>
                    <div class="contact__title form-title">* СПОРТИВНЫМ ФАНАТАМ</div>
                    <div class="contact__form-sertificate">
                        <label for="item1" class="sertificate__item js-gift-choice1"
                               data-item-id="1"
                               data-item-count="{{ $giftCountsByTypes['sportmaster'] }}">
                            <span class="sertificate__item-text">
                                Сертификат в спортивный магазин для всей семьи
                            </span>
                            <input type="radio" id="item1" name="item-one">
                            <span class="sertificate__item-image">
                                <picture>
                                    <source srcset="{{ asset('img/sport-master.webp') }}" type="image/webp">
                                    <img src="{{ asset('img/sport-master.png') }}" alt="wot"></picture>
                            </span>
                        </label>
                        <label for="item2" class="sertificate__item js-gift-choice1"
                               data-item-id="2"
                               data-item-count="{{ $giftCountsByTypes['ozon'] }}">
                            <span class="sertificate__item-text">
                                Сертификат в Интернет- магазин
                            </span>
                            <input type="radio" id="item2" name="item-one">
                            <span class="sertificate__item-image">
                                <picture>
                                    <source srcset="{{ asset('img/ozon.webp') }}" type="image/webp">
                                    <img src="{{ asset('img/ozon.png') }}" alt="wot"></picture>
                            </span>
                        </label>
                    </div>
                    <form class="mail__send js-gift-choosing-form1"
                          action="{{ route('receive-gift', ['code' => $invite->code]) }}"
                          method="POST">
                        <label>
                            <input type="email" name="email" id="1" placeholder="@MailForm">
                        </label>
                        <input type="hidden" name="gift_type_id" class="js-gift-type-id-input1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="mail__submit" type="submit">
                            <picture>
                                <source srcset="{{ asset('img/btn.webp') }}" type="image/webp">
                                <img src="{{ asset('img/btn.png') }}" alt="button"></picture>
                        </button>
                    </form>
                    <div class="after__form-text">
                        <p>Выберите подарок, введите почту, на которую Вам будет отправлен код активации.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="popup2" class="popup">
            <div class="popup__body">
                <div class="popup__content">
                    <a href="#header" class="popup__close close-popup">
                        <picture>
                            <source srcset="{{ asset('img/close.webp') }}" type="image/webp">
                            <img src="{{ asset('img/close.png') }}" alt="close"></picture>
                    </a>
                    <div class="contact__title form-title">* ЛЮБИТЕЛЯМ СТРОИТЬ</div>
                    <div class="contact__form-sertificate">
                        <label for="item3" class="sertificate__item js-gift-choice2"
                               data-item-id="4"
                               data-item-count="{{ $giftCountsByTypes['ikea'] }}">
                            <span class="sertificate__item-text">
                                Сертификат в магазин, где есть все для создания дома
                            </span>
                            <input type="radio" id="item3" name="item-two">
                            <span class="sertificate__item-image">
                                <picture>
                                    <source srcset="{{ asset('img/ikea.webp') }}" type="image/webp">
                                    <img src="{{ asset('img/ikea.png') }}" alt="ikea"></picture>
                            </span>
                        </label>
                        <label for="item4" class="sertificate__item js-gift-choice2"
                               data-item-id="5"
                               data-item-count="{{ $giftCountsByTypes['220volt'] }}">
                            <span class="sertificate__item-text">
                                Сертификат в сеть магазинов электро-инструмента
                            </span>
                            <input type="radio" id="item4" name="item-two" checked="">
                            <span class="sertificate__item-image">
                                <picture>
                                    <source srcset="{{ asset('img/220.webp') }}" type="image/webp">
                                    <img src="{{ asset('img/220.png') }}" alt="220"></picture>
                            </span>
                        </label>
                    </div>
                    <form class="mail__send js-gift-choosing-form2"
                          action="{{ route('receive-gift', ['code' => $invite->code]) }}"
                          method="POST">
                        <label>
                            <input type="email" name="email" id="2" placeholder="@MailForm">
                        </label>
                        <input type="hidden" name="gift_type_id" class="js-gift-type-id-input2">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="mail__submit" type="submit">
                            <picture>
                                <source srcset="{{ asset('img/btn.webp') }}" type="image/webp">
                                <img src="{{ asset('img/btn.png') }}" alt="button"></picture>
                        </button>
                    </form>
                    <div class="after__form-text">
                        <p>Выберите подарок, введите почту, на которую Вам будет отправлен код активации.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="popup3" class="popup">
            <div class="popup__body">
                <div class="popup__content">
                    <a href="#header" class="popup__close close-popup">
                        <picture>
                            <source srcset="{{ asset('img/close.webp') }}" type="image/webp">
                            <img src="{{ asset('img/close.png') }}" alt="close"></picture>
                    </a>
                    <div class="contact__title form-title">* настоящим геймерам</div>
                    <div class="contact__form-sertificate">
                        <label for="item5" class="sertificate__item js-gift-choice3"
                               data-item-id="6"
                               data-item-count="{{ $giftCountsByTypes['wot'] }}">
                            <span class="sertificate__item-text">
                                Сертификат на золото на Wargaming.net
                            </span>
                            <input type="radio" id="item5" name="item-three">
                            <span class="sertificate__item-image">
                                <picture>
                                    <source srcset="{{ asset('img/wot.webp') }}" type="image/webp">
                                    <img src="{{ asset('img/wot.png') }}" alt="ikea"></picture>
                            </span>
                        </label>
                        <label for="item6" class="sertificate__item js-gift-choice3"
                               data-item-id="7"
                               data-item-count="{{ $giftCountsByTypes['xboxgp'] }}">
                            <span class="sertificate__item-text">
                                Сертификат на подписку на сервис Microsoft Xbox на 6 месяцев
                            </span>
                            <input type="radio" id="item6" name="item-three">
                            <span class="sertificate__item-image">
                                <picture>
                                    <source srcset="{{ asset('img/xbox.webp') }}" type="image/webp">
                                    <img src="{{ asset('img/xbox.png') }}" alt="220"></picture>
                            </span>
                        </label>
                    </div>
                    <form class="mail__send js-gift-choosing-form3"
                          action="{{ route('receive-gift', ['code' => $invite->code]) }}"
                          method="POST">
                        <label>
                            <input type="email" name="email" id="3" placeholder="@MailForm">
                        </label>
                        <input type="hidden" name="gift_type_id" class="js-gift-type-id-input3">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="mail__submit" type="submit">
                            <picture>
                                <source srcset="{{ asset('img/btn.webp') }}" type="image/webp">
                                <img src="{{ asset('img/btn.png') }}" alt="button"></picture>
                        </button>
                    </form>
                    <div class="after__form-text">
                        <p>Выберите подарок, введите почту, на которую Вам будет отправлен код активации.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('popups.gift-not-chosen-popup')
    @include('popups.out-of-gifts-popup')

</main>
<footer class="footer lock-padding">
    <picture>
        <source srcset="{{ asset('img/bg_footer.webp') }}" type="image/webp">
        <img class="layer layer__footer" src="{{ asset('img/bg_footer.png') }}" alt="layer"></picture>
</footer>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/choose-gift.js') }}"></script>
</body>

</html>
