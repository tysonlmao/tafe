//* Challenge - Random Background Colour using HEX values
//Write some code to change the background colour of the body to a random HEX value every time the button is clicked

//! Pseudo code
//1. Find the button in the DOM and load it into a variable
//2. Find the body in the DOM and load it into a variable
//Note: We also want to display our random HEX value in the DOM
//3. Find the element in the DOM that we want to display our random HEX value in
//? Note: HEX colour values are 6 characters long. They are comprised of the numbers 0-9 and the letters A-F.
//? Note: We want to randomly generate a HEX value. eg. #FF00FF or #56AD35
//4. Create and array storing the numbers 0-9 and the letters A-F. eg [0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F']
//5. Add an event listener to the button
//6. Create a function that will be called every time the button is clicked
//7. Create variable to store the string for our HEX value inside the function eg. let hex = '#'
//8. Create a loop the will repeat 6 times once for each character in the HEX value
//9. Inside the loop generate a random number between 0 and the length of the array
//10. Use the random number to select a value from the array
//11. Add the selected value to the HEX value string variable eg.  hex += hexValues[randomNumber]
//? Note: as the loop repeats 6 times you should end up with a HEX value that is 6 characters long.
//12. Change the background colour of the body to the selected HEX value
//13. Display the HEX value in the DOM

const button = document.getElementById("btn");
const body = document.querySelector("body");

const hexs = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f"];

let hexValueHTML = document.getElementById("hex-value");

button.addEventListener("click", () => {
    // wat
    let hexadecimal = "#";
    for (let i = 0; i < 6; i++) {
        let random = Math.floor(Math.random() * hexs.length);
        hexValueHTML.innerHTML = hexadecimal;
        hexadecimal += hexs[random];
    }
    body.style.backgroundColor = hexadecimal;
});