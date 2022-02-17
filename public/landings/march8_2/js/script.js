const btns = document.querySelectorAll(".contact__btn");
const first_image = document.querySelectorAll(".contact__img");
const second_image = document.querySelectorAll(".contact__img-active");
const container = document.querySelectorAll(".container");

for (let i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", () => {
        addClassFunc(btns[i], "button--active");
        clearClassFunc(i, btns, "button--active");

        addClassFunc(second_image[i], "image--active");
        clearClassFunc(i, second_image, "image--active");

        addClassFunc(first_image[i], "image--no--active");
        clearClassFunc(i, first_image, "image--no--active");
    });

    btns[i].addEventListener("mouseover", () => {
        addClassFunc(btns[i], "button--active");
        clearClassFunc(i, btns, "button--active");
        //
        // addClassFunc(second_image[i], "image--active");
        // clearClassFunc(i, second_image, "image--active");
        //
        // addClassFunc(first_image[i], "image--no--active");
        // clearClassFunc(i, first_image, "image--no--active");
    });
}
window.addEventListener('click', function (e) {
    for (const button of document.querySelectorAll('.contact__btn')) {
        if (!button.contains(e.target)) {
            button.classList.remove('button--active');
        }
    }
});

function addClassFunc(elem, elemClass) {
    elem.classList.add(elemClass);
}

function clearClassFunc(indx, elems, elemClass) {
    for (let i = 0; i < elems.length; i++) {
        if (i === indx) {
            continue;
        }
        elems[i].classList.remove(elemClass);
    }
}
