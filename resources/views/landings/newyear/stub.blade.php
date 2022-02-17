<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="{{ asset("landings/newyear/css/main.css") }}"/>
    <title>С новым годом!</title>
</head>
<body>
<main class="main">
    <section class="hero">
        <div class="hero__decoration"></div>
        <img class="hero__snow" src="{{ asset("landings/newyear/img/gif__snow.gif") }}"
             alt="Анимация падения снега"/>
        <div class="hero-wrapper">
            <img class="hero-wrapper__line"
                 src="{{ asset("landings/newyear/img/img__border-decor.png") }}"
                 alt="Граница для формы"/>
            <img class="hero-wrapper__bg"
                 src="{{ asset("landings/newyear/img/img__substrate.png") }}"
                 alt="Подложка"/>
            <img class="hero-wrapper__border"
                 src="{{ asset("landings/newyear/img/img__border.png") }}"
                 alt="Граница всей формы"/>
{{--            <img class="hero__logo" src="{{ asset("landings/newyear/img/img__logo.png") }}"--}}
{{--                 alt="Логотип Ehrmann"/>--}}
            <div class="hero-wrapper__inner">
                <h1 class="hero__title">С наступающим Новым Годом!</h1>
                <div class="hero__main-img">
                    <img class="hero__main-img-border"
                         src="{{ asset("landings/newyear/img/img__main-border.png") }}"
                         alt="Граница"/>
                    <img
                        class="hero__main-img-img"
                        src="{{ asset("landings/newyear/img/img__main.png") }}"
                        alt="Изображение новогодних подарков"
                    />
                </div>
                <form class="hero__form form">
                    <div class="form__radio-group">
                        <label class="hero__radio">
                            <input class="hero__radio-orig" type="radio" name="service"/>
                            <span class="hero__radio-notif okko">
										<span class="hero__radio-notif-content">
											<img
                                                src="{{ asset("landings/newyear/img/img__okko-notif.png") }}"
                                                alt="Подсказка Okko"/>
										</span>
									</span>
                            <span class="hero__radio-fake">
										<img class="unchecked"
                                             src="{{ asset("landings/newyear/img/img__okko.png") }}"
                                             alt="Логотип Okko"/>
										<img class="checked"
                                             src="{{ asset("landings/newyear/img/img__okko--checked.png") }}"
                                             alt="Логотип Okko"/>
									</span>
                        </label>
                        <label class="hero__radio">
                            <input class="hero__radio-orig" type="radio" name="service"/>
                            <span class="hero__radio-notif meditation">
										<span class="hero__radio-notif-content">
											<img
                                                src="{{ asset("landings/newyear/img/img__meditaion-notif.png") }}"
                                                alt="Подсказка Медитация"/>
										</span>
									</span>
                            <span class="hero__radio-fake">
										<img
                                            src="{{ asset("landings/newyear/img/img__meditation.png") }}"
                                            alt="Логотип Медитация"/>
										<img class="checked"
                                             src="{{ asset("landings/newyear/img/img__meditation--checked.png") }}"
                                             alt="Логотип Медитация"/>
									</span>
                        </label>
                        <label class="hero__radio">
                            <input class="hero__radio-orig" type="radio" name="service"/>
                            <span class="hero__radio-notif yandex">
										<span class="hero__radio-notif-content">
											<img
                                                src="{{ asset("landings/newyear/img/img__yandex-notif.png") }}"
                                                alt="Подсказка Яндекс"/>
										</span>
									</span>
                            <span class="hero__radio-fake">
										<img
                                            src="{{ asset("landings/newyear/img/img__yandex-plus.png") }}"
                                            alt="Логотип Яндекс"/>
										<img class="checked"
                                             src="{{ asset("landings/newyear/img/img__yandex-plus--checked.png") }}"
                                             alt="Логотип Яндекс"/>
									</span>
                        </label>
                        <label class="hero__radio">
                            <input class="hero__radio-orig" type="radio" name="service"/>
                            <span class="hero__radio-notif litres">
										<span class="hero__radio-notif-content">
											<img
                                                src="{{ asset("landings/newyear/img/img__litres-notif.png") }}"
                                                alt="Подсказка ЛитРес"/>
										</span>
									</span>
                            <span class="hero__radio-fake">
										<img
                                            src="{{ asset("landings/newyear/img/img__litres.png") }}"
                                            alt="Логотип ЛитРес"/>
										<img class="checked"
                                             src="{{ asset("landings/newyear/img/img__litres--checked.png") }}"
                                             alt="Логотип ЛитРес"/>
									</span>
                        </label>
                        <label class="hero__radio">
                            <input class="hero__radio-orig" type="radio" name="service"/>
                            <span class="hero__radio-notif arzamas">
										<span class="hero__radio-notif-content">
											<img
                                                src="{{ asset("landings/newyear/img/img__arzamas-notif.png") }}"
                                                alt="Подсказка Арзамас"/>
										</span>
									</span>
                            <span class="hero__radio-fake">
										<img
                                            src="{{ asset("landings/newyear/img/img__arzamas.png") }}"
                                            alt="Логотип Арзамас"/>
										<div class="checked"></div>
									</span>
                        </label>
                    </div>
                    <div class="form__group">
                        <input type="email"/>
                        <button type="submit">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                x="0px"
                                y="0px"
                                width="123.97px"
                                height="123.97px"
                                viewBox="0 0 123.97 123.97"
                                style="enable-background: new 0 0 123.97 123.97"
                                xml:space="preserve"
                            >
										<g>
                                            <path
                                                d="M27.961,99.367c-5.8,5.8-5.7,15.3,0.5,20.899c5.8,5.301,14.8,4.801,20.3-0.8l47.3-47.3c2.8-2.8,4.2-6.5,4.2-10.2
		s-1.4-7.399-4.2-10.2l-47.2-47.3c-5.5-5.5-14.6-6.1-20.3-0.8c-6.1,5.6-6.3,15.1-0.5,20.9l30.2,30.399c3.9,3.9,3.9,10.2,0,14.101
		L27.961,99.367z"
                                            />
                                        </g>
									</svg>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                x="0px"
                                y="0px"
                                width="123.97px"
                                height="123.97px"
                                viewBox="0 0 123.97 123.97"
                                style="enable-background: new 0 0 123.97 123.97"
                                xml:space="preserve"
                            >
										<g>
                                            <path
                                                d="M27.961,99.367c-5.8,5.8-5.7,15.3,0.5,20.899c5.8,5.301,14.8,4.801,20.3-0.8l47.3-47.3c2.8-2.8,4.2-6.5,4.2-10.2
		s-1.4-7.399-4.2-10.2l-47.2-47.3c-5.5-5.5-14.6-6.1-20.3-0.8c-6.1,5.6-6.3,15.1-0.5,20.9l30.2,30.399c3.9,3.9,3.9,10.2,0,14.101
		L27.961,99.367z"
                                            />
                                        </g>
									</svg>
                        </button>
                    </div>
                </form>
                <h2 class="hero__subtitle">
                    Выберите подарок, введите почту, на которую Вам будет отправлен код
                    активации.
                </h2>
            </div>
        </div>
    </section>
</main>
</body>
</html>
