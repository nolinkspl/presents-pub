<?php
/**
 * @var \App\Models\Gift $gift
 */
?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <title>Ehrmann</title>
</head>

<body class="main__page second__page">
<header class="header lock-padding">
    <figure class="logo">
        <picture>
            <source srcset="{{ asset('img/logo_ehrmann.webp') }}" type="image/webp">
            <img src="{{ asset('img/logo_ehrmann.png') }}" alt="logo"></picture>
    </figure>
    <picture>
        <source srcset="{{ asset('img/bg_header.webp') }}" type="image/webp">
        <img class="layer layer__header" src="{{ asset('img/bg_header.png') }}" alt="layer"></picture>
</header>
<main class="main wrapper lock-padding">
    <section class="holiday">
        <div class="container">
            <figure class="holiday__main-text">
                <picture>
                    <source srcset="{{ asset('img/text1.webp') }}" type="image/webp">
                    <img src="{{ asset('img/text1.png') }}" alt="C праздником"></picture>
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
                             alt="circle"></picture>
                    <picture>
                        <source srcset="{{ asset('img/hend.webp') }}" type="image/webp">
                        <img class="holiday__block-img holiday__hand" src="{{ asset('img/hend.png') }}" alt="hend">
                    </picture>
                </div>
            </div>
            <div class="holiday__block holiday__block-month">
                <picture>
                    <source srcset="{{ asset('img/lenta.webp') }}" type="image/webp">
                    <img class="holiday__block-img holiday__month" src="{{ asset('img/lenta.png') }}" alt="month">
                </picture>
            </div>
        </div>
    </section>
    <section class="contact">
        <div class="container">
            <div class="form-group row">
                <div class="bg-light border rounded gift_code"
                    style="background: white;
                           border-radius: 5px;
                           max-height: 800px;
                           line-height: 70px;
                           max-width: 600px;
                           text-align: center;
                           margin: 0 auto;
                           overflow: hidden;
                    ">
                    {!! $gift->getHtmlPic()  !!}
                </div>
            </div>
            <div class="contact__block">
                <div class="contact__text">
                    <p>
                        {!! $gift->getType()->description !!}
                    </p>
                    <br><br>
                    <div class="form-group"><h4>"Промокод и инструкция отправлены Вам на электронную почту"</h4></div>
                </div>
            </div>

        </div>
    </section>


</main>
<footer class="footer lock-padding">
    <picture>
        <source srcset="{{ asset('img/bg_footer.webp') }}" type="image/webp">
        <img class="layer layer__footer" src="{{ asset('img/bg_footer.png') }}" alt="layer"></picture>
</footer>
<script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
