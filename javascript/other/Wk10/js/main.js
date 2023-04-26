const searchBox = document.getElementById("searchBox");
const searchButton = document.getElementById("searchButton");

const key = "35778376-7226660d82cea3a88ec5337dd";
// dont put these here oh my god
let page = 1;

async function getStuff(query) {
    const res = await fetch(`https://pixabay.com/api/?key=${key}&q=${query}&page=${page}`);
    let data = await res.json();
    console.log(data);
    displayData(data);
}

window.addEventListener('load', function () {
    let localLast = localStorage.getItem('last');
    if (!localLast) return;
    getStuff(localLast);
});


searchButton.addEventListener("click", () => {
    localStorage.setItem('last', searchBox.value);
    getStuff(searchBox.value);
});

// displaying the data on the page after search
const results = document.getElementById("results");
function displayData(data) {
    results.innerHTML = "";
    console.log(data);
    if (!data.hits) {
        console.error("something went wrong");
        return "error";
    }
    for (let i = 0; i < data.hits.length; i++) {

        const header = document.createElement('h2');
        const div = document.createElement('div');

        // header.innerHTML = data.hits[i].user;
        div.appendChild(header);
        results.appendChild(div);

        const image = document.createElement('img');
        image.src = data.hits[i].previewURL;
        div.appendChild(image);

        div.className = 'col';
    }
}

const previous = document.getElementById("previous");
previous.addEventListener("click", () => {
    //  need error handling here if < 0;
    if (page > 1) {
        getStuff(searchBox.value);
    }
});

const next = document.getElementById("next");
next.addEventListener("click", () => {
    page++;
    getStuff(searchBox.value);
});