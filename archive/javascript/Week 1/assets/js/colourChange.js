const box = document.querySelector(".box")

box.addEventListener("mousemove", function (e) {
    x = e.offsetX;
    y = e.offsetY;

    box.style.backgroundColor = `rgb(${x}, ${y}, ${x-y})`
});