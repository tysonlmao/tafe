const searchInput = document.getElementById("searchInput");
const search = document.getElementById("search");

search.addEventListener("click", function () {
    const query = searchInput.value;
    getMovie(query);
});

const apiKey = "822774b4";
async function getMovie(query) {
    try {
        const res = await fetch(`https://www.omdbapi.com/?apikey=${apiKey}&t=${query}`);
        const json = await res.json();
        console.log(json); // debug
        showData(json);
    } catch (error) {
        console.error(error);
    }
}

const movieCover = document.getElementById("movieCover");
const movieTitle = document.getElementById("movieTitle");
const movieDescritpion = document.getElementById("movieDescritpion");
const movieRelease = document.getElementById("movieRelease");
const alertError = document.getElementById("error-alert");
alertError.style.display = "none";

function showData(json) {
    if (json.Error) {
        alertError.innerHTML = json.Error;
        alertError.style.display = "block";
        return;
    }
    movieCover.src = json.Poster;
    movieTitle.innerHTML = json.Title;
    movieDescritpion.innerHTML = json.Plot;
    movieRelease.innerHTML = json.Released;
}