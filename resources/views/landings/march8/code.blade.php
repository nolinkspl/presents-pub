<?php
/**
 * @var \App\Models\Gift $gift
 */

$type = $gift->getType();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('march8/css/style.min.css') }}">
    <title>Ehrmann</title>
</head>

<body class="main__page second__page">
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
                        <img class="holiday__block-img holiday__eight"
                             src="{{ asset('march8/img/8fl.png') }}"
                             alt="eight"></picture>
                </div>
            </div>
        </div>
    </section>
    <section class="contact">
        <div class="container">

            <div class="contact__block">
                <div class="contact__text">
                    <p>
                        {!! $gift->getPicContent() === null ? $type->description_head : '' !!}
                    </p>
                    <div class="form-group row">
                        <div class="bg-light border rounded gift_code"
                             style="background: white;
                                   border-radius: 5px;
                                   max-height: 600px;
                                   line-height: 70px;
                                   max-width: 400px;
                                   text-align: center;
                                   margin: 0 auto;
                                   overflow: hidden;
                                   color: #2d3748;
                        ">
                            {!! $type->name === 'tree' ? '' : $gift->getHtmlPic()  !!}
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        {!! $gift->getType()->description !!}
                    </div>
                    <br>
                    @if ($type->name !== 'tree')
                    <div class="form-group">
                        <h4>Промокод и инструкция отправлены Вам на электронную почту</h4>
                    </div>
                    @endif
                </div>
                <picture>
                    <source srcset="{{ asset('march8/img/bant.webp') }}" type="image/webp">
                    <img class="bunt" src="{{ asset('march8/img/bant.png') }}" alt="bunt"></picture>
            </div>
        </div>
    </section>
</main>
<footer class="footer lock-padding"></footer>
<script src="{{ asset('march8/js/script.js') }}"></script>
</body>

</html>
