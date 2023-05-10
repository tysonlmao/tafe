document.addEventListener("DOMContentLoaded", () => {

    // get data from expressjs server
    async function getData() {
        const x = await fetch("http://localhost:3000/api/launches");
        const data = await x.json();
        return data;
    }

    async function listLaunches() {
        let data = await getData();
        console.log(data);

        const list = document.getElementById("launches");
        for (let i = 0; i < data.results.length; i++) {
            // list launches in list
            console.log(data.results[i].slug);
            list.innerHTML = `
                <p>${data.results[i].pad}</h2>
                <h2>${data.results[i].mission}</h2>
                <p>${data.results[i].slug}</p>
                
            `;
        }
    }
    listLaunches();
});