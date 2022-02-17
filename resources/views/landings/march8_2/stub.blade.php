<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset("landings/march8_2/css/style.min.css") }}">
    <link rel="shortcut icon" href="{{ asset("landings/march8_2/img/logo_ehrmann.png") }}"
          type="image/x-icon">
    <title>8 Марта</title>
</head>

<body class="main__page">
<header class="header lock-padding">
    <div class="container">
        <div class="header__block">
{{--            <figure class="logo">--}}
{{--                <picture>--}}
{{--                    <source--}}
{{--                        srcset="{{ asset("landings/march8_2/img/logo_ehrmann.webp") }}"--}}
{{--                        type="image/webp">--}}
{{--                    <img src="{{ asset("landings/march8_2/img/logo_ehrmann.png") }}"--}}
{{--                         alt="logo"></picture>--}}
{{--            </figure>--}}
        </div>
    </div>
</header>
<main class="main wrapper lock-padding">
    <section class="holiday">
        <div class="container">
            <figure class="holiday__main-text">
                <picture>
                    <source srcset="{{ asset("landings/march8_2/img/text1.webp") }}"
                            type="image/webp">
                    <img src="{{ asset("landings/march8_2/img/text1.png") }}"
                         alt="C праздником"></picture>
            </figure>
            <div class="holiday__block">
                <div class="holiday__block-image">
                    <picture>
                        <source srcset="{{ asset("landings/march8_2/img/8fl.webp") }}"
                                type="image/webp">
                        <img class="holiday__block-img holiday__eight"
                             src="{{ asset("landings/march8_2/img/8fl.png") }}"
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
                    <p>Выберите категорию, подарок и введите электронную почту, на которую
                        Вам будет отправлен код
                        активации.</p>
                    <p>Если вы не можете воспользоваться подарком, то его можно отдать
                        своим друзьям или родным.</p>

                </div>
                <form action="#">
                    <div class="contact__buttons">

                        <label class="contact__btn">
                            <picture>
                                <source
                                    srcset="{{ asset("landings/march8_2/img/sport.webp") }}"
                                    type="image/webp">
                                <img class="contact__img"
                                     src="{{ asset("landings/march8_2/img/sport.png") }}"
                                     alt="btn"></picture>
                            <picture>
                                <source
                                    srcset="{{ asset("landings/march8_2/img/sport-active.webp") }}"
                                    type="image/webp">
                                <img class="contact__img-active" id="panel-1"
                                     src="{{ asset("landings/march8_2/img/sport-active.png") }}"
                                     alt="btn"></picture>
                            <span class="popup__tray">
									<picture><source
                                            srcset="{{ asset("landings/march8_2/img/sport-popup.webp") }}"
                                            type="image/webp"><img
                                            src="{{ asset("landings/march8_2/img/sport-popup.png") }}"
                                            alt="sport"></picture>
									<span>Сертификат на покупку<br>
										в интернет-магазине</span>
								</span>
                            <span class="triagle"></span>
                            <input type="radio" id="item1" name="item-one">
                        </label>

                        <label class="contact__btn">
                            <picture>
                                <source
                                    srcset="{{ asset("landings/march8_2/img/ozon.webp") }}"
                                    type="image/webp">
                                <img class="contact__img"
                                     src="{{ asset("landings/march8_2/img/ozon.png") }}"
                                     alt="btn"></picture>
                            <picture>
                                <source
                                    srcset="{{ asset("landings/march8_2/img/ozon-active.webp") }}"
                                    type="image/webp">
                                <img class="contact__img-active" id="panel-2"
                                     src="{{ asset("landings/march8_2/img/ozon-active.png") }}"
                                     alt="btn"></picture>
                            <span class="popup__tray">
									<picture><source
                                            srcset="{{ asset("landings/march8_2/img/ozon-popup.webp") }}"
                                            type="image/webp"><img
                                            src="{{ asset("landings/march8_2/img/ozon-popup.png") }}"
                                            alt="ozon"></picture>
									<span>Сертификат на покупку<br>
										в интернет-магазине</span>
								</span>
                            <span class="triagle"></span>
                            <input type="radio" id="item2" name="item-one">
                        </label>

                        <label class="contact__btn">
                            <picture>
                                <source
                                    srcset="{{ asset("landings/march8_2/img/magnit.webp") }}"
                                    type="image/webp">
                                <img class="contact__img"
                                     src="{{ asset("landings/march8_2/img/magnit.png") }}"
                                     alt="btn"></picture>
                            <picture>
                                <source
                                    srcset="{{ asset("landings/march8_2/img/magnit-active.webp") }}"
                                    type="image/webp">
                                <img class="contact__img-active" id="panel-3"
                                     src="{{ asset("landings/march8_2/img/magnit-active.png") }}"
                                     alt="btn"></picture>
                            <span class="popup__tray">
									<picture><source
                                            srcset="{{ asset("landings/march8_2/img/magnit-popup.webp") }}"
                                            type="image/webp"><img
                                            src="{{ asset("landings/march8_2/img/magnit-popup.png") }}"
                                            alt="magnit"></picture>
									<span>Сертификат на покупку<br>
										в интернет-магазине</span>
								</span>
                            <span class="triagle"></span>
                            <input type="radio" id="item3" name="item-one">
                        </label>

                    </div>

                    <div class="contact__form">
                        <div class="mail__send">
                            <label>
                                <input type="email" name="email" id="1"
                                       placeholder="@MailForm">
                            </label>
                            <button class="mail__submit" type="submit">
                                <picture>
                                    <source
                                        srcset="{{ asset("landings/march8_2/img/btn.webp") }}"
                                        type="image/webp">
                                    <img
                                        src="{{ asset("landings/march8_2/img/btn.png") }}"
                                        alt="button"></picture>
                            </button>
                        </div>
                        <div class="after__form-text">
                            <p>Выберите подарок, введите почту, на которую Вам будет
                                отправлен код активации.</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


</main>
<footer class="footer lock-padding"></footer>
<script src="{{ asset("landings/march8_2/js/script.js") }}"></script>
</body>

</html>
