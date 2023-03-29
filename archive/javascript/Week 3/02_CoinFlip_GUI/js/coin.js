const tails = document.getElementById("tails");
const heads = document.getElementById("heads");
const result = document.getElementById("result");

tails.addEventListener("click", () => {
    coinFlip("tails");
});

heads.addEventListener("click", () => {
    coinFlip("heads");
});


function coinFlip(coin) {
    let x = Math.floor(Math.random() * 2);
    let y;

    if (x == 0) {
        result.innerHTML = "Tails";
        y = "tails";
    } else {
        result.innerHTML = "Heads";
        y = "heads";
    }
    if (coin == y) {
        result.innerHTML = "you won... " + y;
    } else {
        result.innerHTML = "you lose... " + y;
    }
    console.log(x);
}