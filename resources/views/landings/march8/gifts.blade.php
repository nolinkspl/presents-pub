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
    <link rel="stylesheet" href="{{ asset('march8/css/style.min.css') }}">
    <title>Ehrmann</title>
</head>

<body class="main__page">
<header class="header lock-padding">
    <div class="container">
        <div class="header__block">
            <figure class="logo">
                <picture>
                    <source srcset="{{ asset('march8/img/logo_ehrmann.webp') }}" type="image/webp">
                    <img src="{{ asset('march8/img/logo_ehrmann.png') }}" alt="logo"></picture>
            </figure>
        </div>
    </div>
</header>
<main class="main wrapper lock-padding">
    <section class="holiday">
        <div class="container">
            <figure class="holiday__main-text">
                <picture>
                    <source srcset="{{ asset('march8/img/text1.webp') }}" type="image/webp">
                    <img src="{{ asset('march8/img/text1.png') }}" alt="C праздником"></picture>
            </figure>
            <div class="holiday__block">
                <div class="holiday__block-image">
                    <picture>
                        <source srcset="{{ asset('march8/img/8fl.webp') }}" type="image/webp">
                        <img class="holiday__block-img holiday__eight" src="{{ asset('march8/img/8fl.png') }}"
                             alt="eight"></picture>
                </div>
            </div>
        </div>
    </section>
    <section class="contact">
        <div class="container">
            <div class="contact__block">
                <h2 class="contact__title">
                    Желаем вам женского счастья, любви
                    и благополучия. Процветания, успехов
                    и здоровья Вам и вашим близким.
                </h2>
                <div class="contact__text">
                    <p>Выберите категорию, подарок и введите электронную почту, на которую Вам будет отправлен код
                        активации.</p>
                    <p>Если вы не можете воспользоваться подарком, то его можно отдать своим друзьям или родным.</p>
                </div>
                <div class="contact__buttons">

                    <a href="#popup1" class="contact__btn">
                        <picture>
                            <source srcset="{{ asset('march8/img/beauti-mar.webp') }}" type="image/webp">
                            <img class="contact__img" src="{{ asset('march8/img/beauti-mar.png') }}" alt="btn">
                        </picture>
                        <picture>
                            <source srcset="{{ asset('march8/img/beauti-mar-active.webp') }}" type="image/webp">
                            <img class="contact__img-active" id="panel-1"
                                 src="{{ asset('march8/img/beauti-mar-active.png') }}" alt="btn">
                        </picture>
                        <div class="popup__tray">
                            <p>БЬЮТИ-МАРАФОН</p>
                        </div>
                    </a>

                    <a href="#popup2" class="contact__btn">
                        <picture>
                            <source srcset="{{ asset('march8/img/shop-tur.webp') }}" type="image/webp">
                            <img class="contact__img" src="{{ asset('march8/img/shop-tur.png') }}" alt="btn"></picture>
                        <picture>
                            <source srcset="{{ asset('march8/img/shop-tur-active.webp') }}" type="image/webp">
                            <img class="contact__img-active" id="panel-2"
                                 src="{{ asset('march8/img/shop-tur-active.png') }}" alt="btn">
                        </picture>
                        <div class="popup__tray">
                            <p>ШОПИНГ ТУР</p>
                        </div>
                    </a>

                    <a href="#popup3" class="contact__btn">
                        <picture>
                            <source srcset="{{ asset('march8/img/famely.webp') }}" type="image/webp">
                            <img class="contact__img" src="{{ asset('march8/img/famely.png') }}" alt="btn"></picture>
                        <picture>
                            <source srcset="{{ asset('march8/img/famely-active.webp') }}" type="image/webp">
                            <img class="contact__img-active" id="panel-3"
                                 src="{{ asset('march8/img/famely-active.png') }}" alt="btn">
                        </picture>
                        <div class="popup__tray">
                            <p>СЕМЕЙНЫЙ ДОСУГ</p>
                        </div>
                    </a>
                    <a href="#popup4" class="contact__btn">
                        <picture>
                            <source srcset="{{ asset('march8/img/tree.webp') }}" type="image/webp">
                            <img class="contact__img" src="{{ asset('march8/img/tree.png') }}" alt="btn"></picture>
                        <picture>
                            <source srcset="{{ asset('march8/img/tree-active.webp') }}" type="image/webp">
                            <img class="contact__img-active" id="panel-3"
                                 src="{{ asset('march8/img/tree-active.png') }}" alt="btn">
                        </picture>
                        <div class="popup__tray">
                            <p>ПОСАДИ ДЕРЕВО</p>
                        </div>
                    </a>

                </div>

            </div>
        </div>

        <div id="popup1" class="popup trio">
            <div class="popup__body">
                <div class="popup__content">
                    <a href="#header" class="popup__close close-popup">
                        <picture>
                            <source srcset="{{ asset('march8/img/close.webp') }}" type="image/webp">
                            <img src="{{ asset('march8/img/close.png') }}" alt="close"></picture>
                    </a>
                    <div class="contact__title form-title">БЬЮТИ-МАРАФОН</div>
                    <div class="contact__form-sertificate">
                        <label for="item1" class="sertificate__item js-gift-choice"
                               data-item-id="9"
                               data-item-count="{{ $giftCountsByTypes['letual'] }}">
								<span class="sertificate__item-text">
									Сертификат<br> на покупки<br> в магазин косметики
								</span>
                            <input type="radio" id="item1" name="item-one">
                            <span class="sertificate__item-image">
                                <picture><source srcset="{{ asset('march8/img/letual.webp') }}" type="image/webp"><img
                                        src="{{ asset('march8/img/letual.png') }}" alt="latual"></picture>
                            </span>
                        </label>
                        <label for="item2" class="sertificate__item js-gift-choice"
                               data-item-id="17"
                               data-item-count="{{ $giftCountsByTypes['meditation'] }}">
								<span class="sertificate__item-text">
									Годовая подписка<br> на 60+ уроков<br> с Иреной Понарошку
								</span>
                            <input type="radio" id="item2" name="item-one">
                            <span class="sertificate__item-image">
									<picture><source srcset="{{ asset('march8/img/iren.webp') }}" type="image/webp"><img
                                            src="{{ asset('march8/img/iren.png') }}" alt="iren"></picture>
								</span>
                        </label>
                        <label for="item3" class="sertificate__item js-gift-choice"
                               data-item-id="7"
                               data-item-count="{{ $giftCountsByTypes['tayray'] }}">
								<span class="sertificate__item-text">
									Сертификат<br> на посещение салона<br> тайского массажа
								</span>
                            <input type="radio" id="item3" name="item-one">
                            <span class="sertificate__item-image">
									<picture><source srcset="{{ asset('march8/img/tayray.webp') }}"
                                                     type="image/webp"><img
                                            src="{{ asset('march8/img/tayray.png') }}" alt="tayray"></picture>
								</span>
                        </label>
                    </div>
                    <form class="mail__send js-gift-choosing-form"
                          action="{{ route('receive-gift', ['code' => $invite->code]) }}"
                          method="POST">
                        <label>
                            <input type="email" name="email" id="1" placeholder="@MailForm" required>
                        </label>
                        <input type="hidden" name="gift_type_id">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="mail__submit" type="submit">
                            <picture>
                                <source srcset="{{ asset('march8/img/btn.webp') }}" type="image/webp">
                                <img src="{{ asset('march8/img/btn.png') }}" alt="button"></picture>
                        </button>
                    </form>
                    <div class="after__form-text">
                        <p>Выберите подарок, введите почту, на которую Вам будет отправлен код активации.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="popup2" class="popup trio">
            <div class="popup__body">
                <div class="popup__content">
                    <a href="#header" class="popup__close close-popup">
                        <picture>
                            <source srcset="{{ asset('march8/img/close.webp') }}" type="image/webp">
                            <img src="{{ asset('march8/img/close.png') }}" alt="close"></picture>
                    </a>
                    <div class="contact__title form-title">ШОПИНГ ТУР</div>
                    <div class="contact__form-sertificate">
                        <label for="item4" class="sertificate__item js-gift-choice"
                               data-item-id="1"
                               data-item-count="{{ $giftCountsByTypes['lamoda'] }}">
								<span class="sertificate__item-text">
									Сертификат на покупки<br> в интернет-магазине<br> одежды и обуви
								</span>
                            <input type="radio" id="item4" name="item-two">
                            <span class="sertificate__item-image">
									<picture><source srcset="{{ asset('march8/img/lamoda.webp') }}"
                                                     type="image/webp"><img
                                            src="{{ asset('march8/img/lamoda.png') }}" alt="lamoda"></picture>
								</span>
                        </label>
                        <label for="item5" class="sertificate__item js-gift-choice"
                               data-item-id="3"
                               data-item-count="{{ $giftCountsByTypes['defile'] }}">
								<span class="sertificate__item-text">
									Сертификат<br> на покупку<br> женского белья
								</span>
                            <input type="radio" id="item5" name="item-two">
                            <span class="sertificate__item-image">
									<picture><source srcset="{{ asset('march8/img/defile.webp') }}"
                                                     type="image/webp"><img
                                            src="{{ asset('march8/img/defile.png') }}" alt="defile"></picture>
								</span>
                        </label>
                        <label for="item6" class="sertificate__item js-gift-choice"
                               data-item-id="13"
                               data-item-count="{{ $giftCountsByTypes['ozon'] }}">
								<span class="sertificate__item-text">
									Сертификат<br> на покупку<br> в интернет-магазине
								</span>
                            <input type="radio" id="item6" name="item-two">
                            <span class="sertificate__item-image">
									<picture><source srcset="{{ asset('march8/img/ozon.webp') }}" type="image/webp"><img
                                            src="{{ asset('march8/img/ozon.png') }}" alt="ozon"></picture>
								</span>
                        </label>
                    </div>
                    <form class="mail__send js-gift-choosing-form"
                          action="{{ route('receive-gift', ['code' => $invite->code]) }}"
                          method="POST">
                        <label>
                            <input type="email" name="email" id="2" placeholder="@MailForm" required>
                        </label>
                        <input type="hidden" name="gift_type_id">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="mail__submit" type="submit">
                            <picture>
                                <source srcset="{{ asset('march8/img/btn.webp') }}" type="image/webp">
                                <img src="{{ asset('march8/img/btn.png') }}" alt="button"></picture>
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
                            <source srcset="{{ asset('march8/img/close.webp') }}" type="image/webp">
                            <img src="{{ asset('march8/img/close.png') }}" alt="close"></picture>
                    </a>
                    <div class="contact__title form-title">СЕМЕЙНЫЙ ДОСУГ</div>
                    <div class="contact__form-sertificate">
                        <label for="item7" class="sertificate__item js-gift-choice"
                               data-item-id="11"
                               data-item-count="{{ $giftCountsByTypes['karo'] }}">
								<span class="sertificate__item-text">
									Сертификат<br> на посещение<br> сети кинотеатров
								</span>
                            <input type="radio" id="item7" name="item-three">
                            <span class="sertificate__item-image">
									<picture><source srcset="{{ asset('march8/img/kapo.webp') }}" type="image/webp"><img
                                            src="{{ asset('march8/img/kapo.png') }}" alt="kapo"></picture>
								</span>
                        </label>
                        <label for="item8" class="sertificate__item js-gift-choice"
                               data-item-id="15"
                               data-item-count="{{ $giftCountsByTypes['yandex'] }}">
								<span class="sertificate__item-text">
									Подписка<br> на 6 месяцев
								</span>
                            <input type="radio" id="item8" name="item-three">
                            <span class="sertificate__item-image">
									<picture><source srcset="{{ asset('march8/img/yandex.webp') }}"
                                                     type="image/webp"><img
                                            src="{{ asset('march8/img/yandex.png') }}" alt="yandex"></picture>
								</span>
                        </label>
                        <label for="item9" class="sertificate__item js-gift-choice"
                               data-item-id="16"
                               data-item-count="{{ $giftCountsByTypes['litres'] }}">
								<span class="sertificate__item-text">
									Подарочная карта<br> на лучшие книги
								</span>
                            <input type="radio" id="item9" name="item-three">
                            <span class="sertificate__item-image">
									<picture><source srcset="{{ asset('march8/img/litres.webp') }}"
                                                     type="image/webp"><img
                                            src="{{ asset('march8/img/litres.png') }}" alt="litres"></picture>
								</span>
                        </label>
                        <label for="item10" class="sertificate__item js-gift-choice"
                               data-item-id="5"
                               data-item-count="{{ $giftCountsByTypes['ticketland'] }}">
								<span class="sertificate__item-text">
									Сертификат<br> на покупку билетов<br> на мероприяти
								</span>
                            <input type="radio" id="item10" name="item-three">
                            <span class="sertificate__item-image">
									<picture><source srcset="{{ asset('march8/img/ticketland.webp') }}"
                                                     type="image/webp"><img
                                            src="{{ asset('march8/img/ticketland.png') }}" alt="ticketland"></picture>
								</span>
                        </label>
                    </div>
                    <form class="mail__send js-gift-choosing-form"
                          action="{{ route('receive-gift', ['code' => $invite->code]) }}"
                          method="POST">
                        <label>
                            <input type="email" name="email" id="3" placeholder="@MailForm" required>
                        </label>
                        <input type="hidden" name="gift_type_id">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="mail__submit" type="submit">
                            <picture>
                                <source srcset="{{ asset('march8/img/btn.webp') }}" type="image/webp">
                                <img src="{{ asset('march8/img/btn.png') }}" alt="button"></picture>
                        </button>
                    </form>
                    <div class="after__form-text">
                        <p>Выберите подарок, введите почту, на которую Вам будет отправлен код активации.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="popup4" class="popup single">
            <div class="popup__body">
                <div class="popup__content">
                    <a href="#header" class="popup__close close-popup">
                        <picture>
                            <source srcset="{{ asset('march8/img/close.webp') }}" type="image/webp">
                            <img src="{{ asset('march8/img/close.png') }}" alt="close"></picture>
                    </a>
                    <div class="contact__title form-title">ПОСАДИ ДЕРЕВО</div>
                    <div class="contact__form-sertificate">
                        <label for="item11" class="sertificate__item js-gift-choice"
                               data-item-id="19"
                               data-item-count="{{ $giftCountsByTypes['tree'] }}">
								<span class="sertificate__item-text">
									Посади свое дерево - <br>
									сделай вклад в экологию
								</span>
                            <input type="radio" id="item11" name="item-four">
                            <span class="sertificate__item-image">
                                <picture>
                                    <source srcset="{{ asset('march8/img/tree-popup.webp') }}"
                                            type="image/webp">
                                    <img src="{{ asset('march8/img/tree-popup.png') }}" alt="tree">
                                </picture>
								</span>
                        </label>
                    </div>
                    <form class="mail__send js-gift-choosing-form"
                          action="{{ route('receive-gift', ['code' => $invite->code]) }}"
                          method="POST">
                        <label>
                            <input type="email" name="email" id="4" placeholder="@MailForm" required>
                        </label>
                        <input type="hidden" name="gift_type_id" value="19">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="mail__submit" type="submit">
                            <picture>
                                <source srcset="{{ asset('march8/img/btn.webp') }}" type="image/webp">
                                <img src="{{ asset('march8/img/btn.png') }}" alt="button"></picture>
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
<footer class="footer lock-padding"></footer>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('march8/js/script.js') }}"></script>
<script src="{{ asset('js/choose-gift.js') }}"></script>
<script>
    @if (isset($error) && !empty($error))
        $.notify('{{$error}}');
    @endif
</script>
</body>

</html>
