function fadeOut(el) {
    let opacity = 1;
    let timer = setInterval(function () {
        if (opacity <= 0.05) {
            clearInterval(timer);
            document.querySelector(el).style.display = "none";
        }

        document.querySelector(el).style.opacity = opacity;
        opacity -= opacity * 0.05;

    }, 10);

}

window.onload = function () {
    setTimeout(() => fadeOut('.preloader'), 1000);
}

