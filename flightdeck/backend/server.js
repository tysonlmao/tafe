const express = require('express');
const axios = require('axios');
const NodeCache = require("node-cache");

const app = express();
const cache = new NodeCache();

app.use((req, res, next) => {
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
    res.setHeader('Access-Control-Allow-Headers', 'Content-Type');
    next();
});

app.get('/', async (req, res) => {
    try {
        const data = { "message": "spaceX wants to go to mars - which is a barren dessert rock with no nandos ->so no one actually cares" };
        res.send(data);
    } catch (error) {
        res.status(500).json({ error: "you broke it." });
    }
});

// const refreshInterval = 1000; // 1 second
const refreshInterval = 60 * 60 * 1000; // an hour

app.get('/api/launches/', async (req, res) => {
    const cachedData = cache.get("bunny");
    if (cachedData) {
        return res.json(cachedData);
    }

    try {
        const { data } = await axios.get('https://ll.thespacedevs.com/2.2.0/launch/upcoming/?mode=list&hide_recent_previous=true');

        // cache fetched data
        cache.set("bunny", data);

        // send response
        res.send(data);
    } catch (error) {
        res.status(500).json({ error: "you broke it." });
    }
});

// Function to refresh the data at a defined interval
const refreshData = async () => {
    try {
        const { data } = await axios.get('https://ll.thespacedevs.com/2.2.0/launch/upcoming/?mode=list&hide_recent_previous=true');

        // cache refreshed data
        cache.set("bunny", data);

        console.log("Data refreshed successfully.");
    } catch (error) {
        console.error("Error refreshing data:", error);
    }
};

// Schedule data refresh at the defined interval
setInterval(refreshData, refreshInterval);

let port = 1000;
// open express server
app.listen(port, () => { console.log(`Server is running on port ${port}`); });