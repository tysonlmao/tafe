//!Cheat Sheet
//The following is a simple reference/reminder of the core concepts you should be aware of

//? Example Comments
//Two forward slashes are used to create Single Line Comment
/*
A forward slashes & star are used to to create Multiline Comment 
*/

//? BASIC DATA TYPES
//When programming we work with different types of data. We call these data types
10; //Integers - We call whole numbers Integers
25.5; //Float - We call numbers with decimal points floats
"This is a string"; // You can use double quotes to create a string
'string' // You can use use single quotes to create a string
	`sting`; // You can use a backtick(the key above Tab) to create strings
true  // Boolean data types are true or false
[1, 2, 3, 4, 5, 6, 7, 8, 9]; //Arrays are used to hold collections of data
{ propertyName: "string"; } //JavaScript Objects can store properties and methods
null; //empty
undefined; //no value assigned empty

//? JAVASCRIPT OBJECTS, METHODS & PROPERTIES
//* Example Objects
//We organize code into objects. Almost everything in JavaScript is a Object
console.log("Output this to the console"); //console Object- Holds all the code to interact with the browser console
document.write("<h1>This is a header</h1>"); // document - Holds all the code for interacting with the html document.
//* Example Methods
console.log("Output this string to the console"); //Log - Outputs the string to the console 
//* Example Properties
document.URL; //URL stores the URL/address of the HTML document


//?Variables
//Variables are used to store data in memory
let variableName2 = 'string'; //let - declares a variable that can have its value changed
const variableName3 = 'string'; //const - value can not be changed
var variableName1 = 'string'; //var - var is the original way to declare a variable and it is similar to let


//?Operators
console.log(2 + 2); //addition
console.log(5 - 10); //subtraction
console.log(2 * 6); //devision 
console.log(5 / 2); //Multiplication
console.log(21 % 5); //Modulus Operator - remainder = 1
console.log(count += 1); // increments count by 1
console.log(count += 3); // increments count by 3
console.log(count -= 2); //decrement count by 2
console.log(count++); // increments count by 1
console.log(count--); //decrement count by 1
console.log(27 == 27); //equal - returns true
console.log("wave" == "Wave"); //equal - returns false
console.log("wave" != "Wave"); //not equal - returns true
console.log(20 > 10); //greater than - returns true
console.log(30 < 30); //less - returns false
console.log(20 >= 10); //greater than or equal to - returns true
console.log(30 <= 30); //less than or equal to  - returns false
console.log(2 == 2 && 4 > 10); // && = and (returns false - 4 is not greater than 10)
console.log(1 >= 2 || 40 > 10); // || = or (returns true)
console.log(2 != 2); // The != not equal (returns false)
let example = true;
console.log(!example); // The ! means not (returns false - What is not true? false)


//? If Statement
/*
If/Conditional statements let us make decisions in our code
*/
//*If statement
var age = 22;
if (age < 18) {
	console.log("Age is less than 18");
} else if (age < 30) {
	console.log("Age is less than 30");
} else if (age < 40) {
	console.log("Age is less than 30");
} else {
	console.log("Age is greater than 18");
}
//* Ternary Operators
//Ternary operators allow you to create simple if statements
let isMember = true;
isMember ? '$2.00' : '$10.00'; // if isMember is true they only pay $2:00 else $10:00


//?Functions
//Functions Group code together and allows us to reuse code
//This function has two Parameters
function simpleAdd(numberOne, numberTwo) {
	//The arguments passed in the parameters are added together
	var answer = numberOne + numberTwo;
	return answer; //Returns answer to the function call

}
//A function will not run until it is called
simpleAdd(5, 5); //This function passes two arguments. - Returns 10

//?Arrow Functions / Function Expressions
//Arrow function are a short hand way to write a function
//param => expression
//(param) => expression
//(param1, paramN) => expression
//Also note that function expressions are not hoisted. (Functions assigned to variables)

const simpleAdd2 = (numberOne, numberTwo) => {
	var answer = numberOne + numberTwo;
	return answer;
};


//?Objects
//Objects are used to group code together
var movie =
{
	title: 'Toy Story',
	description: 'Toy Story is a 1995 American computer-animated movie',
	url: 'https://en.wikipedia.org/wiki/Toy_Story',
	printDetails: function () {
		//we can access the properties of a object in side of its self using the "this" keyword
		//Think "this" object. 
		//"this.title" = this object's title
		console.log(this.title + ' : ' + this.description);
	}
};

console.log(movie); //Outputs the object to the console - Take a look!
movie.title = 'Toy Story 2'; //Update a value in the object
console.log(movie.URL); //access the the data in the url property
movie.printDetails(); //call a function in a object


//? Arrays 
// Everything added to an array gets assigned a key
var emotions = ['😃 Zero', '🤪 One', '🤬 Two', '😱 Three', '🫣 Four'];
//We use the key to access values in the array
console.log(emotions[0]); //Outputs '😃 Zero'
emotions[1] = '😢 One'; //Update a value in an array
console.log(emotions[1]); //Outputs '😢 One
console.log(emotions.length); //Holds the length of the array


//? Loops
//Loops repeat code multiple times
//*For Loop - Repeats a set number of times
for (var i = 0; i < 5; i++) {
	//Every time the loop run it will increment i until i is not longer less then 5
	console.log(i);
}
//*While Loop - Repeats well a condition is met
var i = 0;
while (i < 10) {
	console.log("i is = to " + i);

	i++;
}
//*For In - Used to loop over arrays
const numbers = [45, 4, 9, 16, 25];
for (let x in numbers) {
	console.log(numbers[x]);
}

//? DOM & Events
//We use the DOM to manipulate and interact with the HTML page
const myDiv = document.getElementById("myDiv");
console.log(myDiv); //Stores a reference to the HTML element/object
console.log(myDiv.innerHTML); //We cna then use properties and methods that are attached to all DOM object to manipulate the DOM
const myButton = document.getElementById("myButton"); //Find the button with the id of myButton
//We can add event listeners to html elements. In this case a click event
myButton.addEventListener("click", function () {
	console.log("click");
});