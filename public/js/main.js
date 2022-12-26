$(document).ready(function() {
	var width = $(window).width();

	$(".modal-close").click(function(e){
        e.preventDefault();
        $(".modal").hide();
    })
});


$(document).ready(function () {
    $('form').fadeOut();
    $('.sportmaster, .mama_lama').click(function(){
        $('.sportmaster').fadeIn('slow');
        $('#auth').fadeIn('slow');
        $('.congratulation p').fadeOut('slow');
        $('#auth_2').fadeOut('slow');
        $('#auth_3').fadeOut('slow');
        $('#auth_4').fadeOut('slow');
    });

    $('.grand, .lamoda').click(function(){
        $('#auth').fadeOut('slow');
        $('.congratulation p').fadeOut('slow');
        $('#auth_2').fadeIn('slow');
        $('#auth_3').fadeOut('slow');
        $('#auth_4').fadeOut('slow');
    });

    $('.topstrech, .epica').click(function(){
        $('#auth').fadeOut('slow');
        $('.congratulation p').fadeOut('slow');
        $('#auth_2').fadeOut('slow');
        $('#auth_3').fadeIn('slow');
        $('#auth_4').fadeOut('slow');

    });

    $('.epica2, .letoile_block').click(function(){
        $('#auth').fadeOut('slow');
        $('.congratulation p').fadeOut('slow');
        $('#auth_2').fadeOut('slow');
        $('#auth_3').fadeOut('slow');
        $('#auth_4').fadeIn('slow');
    });

    $('.close').click(function(){
        $('form').fadeOut('slow');
        $('.congratulation p').fadeIn('slow');
    })









});


$(document).ready(function sayHi() {

    function sayHi() {
        $('.sportmaster').fadeIn(1000);
        $('.lamoda').fadeIn(1000);
        $('.topstrech').fadeIn(1000);
        $('.letoile').fadeIn(1000);

    }

    setTimeout(sayHi, 12000);



});








$(document).ready(function sayLi() {
    function sayLi() {

        // конфети

        var duration = 15 * 300;
        var animationEnd = Date.now() + duration;
        var defaults = { startVelocity: 30, spread: 560, ticks: 60, zIndex: 1 };

        function randomInRange(min, max) {
            return Math.random() * (max - min) + min;
        }

        var interval = setInterval(function() {
            var timeLeft = animationEnd - Date.now();

            if (timeLeft <= 0) {
                return clearInterval(interval);
            }

            var particleCount = 50 * (timeLeft / duration);
            // since particles fall down, start a bit higher than random
            confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 } }));
            confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 } }));
        }, 650);

    }


    setTimeout(sayLi, 10000);


});






// Снег


// Массив для хранения объектов Snowflake
var snowflakes = [];

// Глобальные переменные для размера окна браузера
var browserWidth;
var browserHeight;

// Указываем количество снежинок, которые должны быть видимыми
var numberOfSnowflakes = 50;

// Флаг для сброса положения снежинок
var resetPosition = false;

// Устанавливаем параметр enableAnimations
var enableAnimations = false;
var reduceMotionQuery = matchMedia("(prefers-reduced-motion)");

// Изменяем значение enableAnimations
function setAccessibilityState() {
    if (reduceMotionQuery.matches) {
        enableAnimations = false;
    } else {
        enableAnimations = true;
    }
}
setAccessibilityState();

reduceMotionQuery.addListener(setAccessibilityState);

//
// Все начинается здесь...
//
function setup() {
    if (enableAnimations) {
        window.addEventListener("DOMContentLoaded", generateSnowflakes, false);
        window.addEventListener("resize", setResetFlag, false);
    }
}
setup();

//
// Конструктор объекта Snowflake
//
function Snowflake(element, speed, xPos, yPos) {
    // устанавливаем начальные свойства снежинки
    this.element = element;
    this.speed = speed;
    this.xPos = xPos;
    this.yPos = yPos;
    this.scale = 1;

    // объявляем переменные, используемые для движения снежинки
    this.counter = 0;
    this.sign = Math.random() < 0.5 ? 1 : -1;

    // устанавливаем значения начальной непрозрачности и размера снежинки
    this.element.style.opacity = (1);
}

//
// Функция, ответственная за перемещение снежинки
//
Snowflake.prototype.update = function () {
    // используем тригонометрию, чтобы определить позицию x и y
    this.counter += this.speed / 5000;
    this.xPos += this.sign * this.speed * Math.cos(this.counter) / 40;
    this.yPos += Math.sin(this.counter) / 40 + this.speed / 30;
    this.scale = .5 + Math.abs(10 * Math.cos(this.counter) / 20);

    // устанавливаем позицию снежинки
    setTransform(Math.round(this.xPos), Math.round(this.yPos), this.scale, this.element);

    // если снежинка опустится ниже окна браузера, переместим ее обратно наверх
    if (this.yPos > browserHeight) {
        this.yPos = -50;
    }
}

//
// Эффективный способ установить положение и размер снежинки
//
function setTransform(xPos, yPos, scale, el) {
    el.style.transform = `translate3d(${xPos}px, ${yPos}px, 0) scale(${scale}, ${scale})`;
}

//
// Функция, ответственная за создание снежинки
//
function generateSnowflakes() {

    // получаем элемент снежинки из DOM и сохраняем его
    var originalSnowflake = document.querySelector(".snowflake");

    // получаем доступ к контейнеру родителя элемента снежинки
    var snowflakeContainer = originalSnowflake.parentNode;
    snowflakeContainer.style.display = "block";

    // получаем размер окна браузера
    browserWidth = document.documentElement.clientWidth;
    browserHeight = document.documentElement.clientHeight;

    // создаем снежинку
    for (var i = 0; i < numberOfSnowflakes; i++) {

        // клонируем индивидуальную снежинку и добавляем ее в snowflakeContainer
        var snowflakeClone = originalSnowflake.cloneNode(true);
        snowflakeContainer.appendChild(snowflakeClone);

        // устанавливаем начальную позицию и свойства для оригинальной снежинки
        var initialXPos = getPosition(50, browserWidth);
        var initialYPos = getPosition(50, browserHeight);
        var speed = 5 + Math.random() * 40;

        // создаем объект Snowflake
        var snowflakeObject = new Snowflake(snowflakeClone,
            speed,
            initialXPos,
            initialYPos);
        snowflakes.push(snowflakeObject);
    }

    // убираем снежинку, так как больше не нужно, чтобы она была видимой
    snowflakeContainer.removeChild(originalSnowflake);

    moveSnowflakes();
}

//
// Отвечает за перемещение каждой снежинки, вызывая функцию обновления
//
function moveSnowflakes() {

    if (enableAnimations) {
        for (var i = 0; i < snowflakes.length; i++) {
            var snowflake = snowflakes[i];
            snowflake.update();
        }
    }

    // Сбрасывает значения позиций всех снежинок до установки нового значения
    if (resetPosition) {
        browserWidth = document.documentElement.clientWidth;
        browserHeight = document.documentElement.clientHeight;

        for (var i = 0; i < snowflakes.length; i++) {
            var snowflake = snowflakes[i];

            snowflake.xPos = getPosition(50, browserWidth);
            snowflake.yPos = getPosition(50, browserHeight);
        }

        resetPosition = false;
    }

    requestAnimationFrame(moveSnowflakes);
}

//

function getPosition(offset, size) {
    return Math.round(-1 * offset + Math.random() * (size + 2 * offset));
}

//
// Сброс позиций всех снежинок
//
function setResetFlag(e) {
    resetPosition = true;
}






// конфети


//   function r(min, max) {
//     return Math.random() * (max - min) + min;
// }

// /*confetti({
//     angle: r(55, 125),
//     spread: r(50, 70),
//     particleCount: r(50, 100)
// });*/
// let i = 0;
// setInterval(function(){
//   confetti({
//   particleCount: 100,
//   spread: 70,
//   origin: { y: 0.6 }
// });
// }, 2000)


