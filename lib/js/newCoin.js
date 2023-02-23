document.getElementById("tails").addEventListener("click", coinFlip);
document.getElementById("heads").addEventListener("click", coinFlip);
const resultOutput = document.getElementById("result");

function coinFlip(el) {
    let coin = el.target.value;
    let random = Math.floor(Math.random() * 2);
    // like developer n' stuff
    let y;

    if (random == 0) {
        resultOutput.innerHTML = "Tails";
        y = "Tails";
    } else {
        resultOutput.innerHTML = "Heads";
        y = "Heads";
    }
    if (coin == y) {
        result.innerHTML = "you won... " + y;
    } else {
        result.innerHTML = "you lose... " + y;
    }
}