const button = document.getElementById("coin");

coin.addEventListener("click", flip());

function num() {
    let coin = Math.random() * 2;
    coin = Math.floor(coin);

    // returns a random number between 0 and 1
    return coin;
}

function flip() {
    let value = num();
    if (value == 0) {
        // return "Heads"
        console.log("Heads");
    } else {
        // return "Tails"
        console.log("Tails");
    }
}
