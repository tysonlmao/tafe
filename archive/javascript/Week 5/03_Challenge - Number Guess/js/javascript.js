//* Challenge - Guess the Number
//Write a application that lets a user guess a number between 1 and 10.
//If they guess wrong tell them if they guessed too high or too low.
//If they guess correctly tell them how many guesses it took them.

//! Pseudo code
//1. Generate a random number between 1 and 10
//2. Create a variable to store the number of guesses made
//3. Find the button in the DOM and load it into a variable
//4. Find the text box in the DOM and load it into a variable
//5. Add an event listener to the button
const body = document.querySelector("body");
const submit = document.getElementById("submitguess");
const guessField = document.getElementById("guessField");
const random = Math.floor(Math.random() * 11);
let guesses = 0;
submit.addEventListener("click", () => {
    function doStuff() {
        guesses++;
        let guess = guessField.value;
        if (guess == random) {
            body.style.backgroundColor = "green";
            alert(`gratz, you took ${guesses} guesses`);
        } else if (guess < random) {
            alert("pick a higher number");
        } else if (guess > random) {
            alert("pick a lower number");
        }
    }
    doStuff();
});
//6. Create a function that will be called every time the button is clicked
//7. Access the value from the text box and load it into a variable
//8. Check if the value from the text box is equal to the random number
//9. If it is, display a message saying the user guessed correctly and how many guesses it took them
//10. Else if the value from the text box is greater than the random number, display a message saying the user guessed too high
//11. Else the value from the text box is less than the random number, display a message saying the user guessed too low
//12. Increment the number of guesses made by 1 every guess
//14. Test the application


