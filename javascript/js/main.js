// selecting elements to replace with content
const city = document.getElementById("city");
const temp = document.getElementById("temp");

document.addEventListener("DOMContentLoaded", () => {
    // adding default values to the elements so they aren't empty at any given moment.
    city.innerHTML = "? ";
    temp.innerHTML = "--°";
});