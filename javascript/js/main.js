// selecting elements to replace with content
const city = document.getElementById("city");
const temp = document.getElementById("temp");

document.addEventListener("DOMContentLoaded", () => {
    // adding default values to the elements so they aren't empty at any given moment.
    // city.innerHTML = "? ";
    temp.innerHTML = "--°";
});

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
} else {
    console.error("Geolocation not supported on this browser!");
}

function showPosition(position) {
    const lat = position.coords.latitude;
    const lon = position.coords.longitude;

    // google maps api key
    const apiKey = "AIzaSyA5zdtWFUX5b_K-lNtTneWsMgCd0MzjyHQ";

    const url = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${lon}&result_type=locality&key=${apiKey}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.results && data.results.length > 0 && data.results[0].address_components) {
                const townName = data.results[0].address_components[0].long_name;
                city.innerHTML = townName;
                console.log(townName);
            } else {
                console.error("No results found for the provided location");
            }
        })
        .catch(error => console.error(error));
};
