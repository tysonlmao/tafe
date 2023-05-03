import { APIURL } from "./config.js";
import { search } from "./services/catFacts.js";

const divFacts = document.getElementById("divFacts");
window.addEventListener("load", () => {
	const searchResult = search();
	displayResults(searchResult);
});

function displayResults(json) {
	for (let i = 0; i < json.data.length; i++) {

		const h2 = document.createElement("h2");
		const p = document.createElement("p");

		h2.innerHTML = json.data[i].fact;
		p.innerHTML = json.data[i].length;

		divFacts.appendChild(h2);
		divFacts.appendChild(p);
	}
}