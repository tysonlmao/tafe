/**
 * do your worst
 * @since 1.0.0
 * @author tysonlmao
 */

const express = require('express');
const app = express();

app.use((req, res, next) => {
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
    res.setHeader('Access-Control-Allow-Headers', 'Content-Type');
    next();
});

app.get('/', async (req, res) => {
    try {
        const data = { "message": "what the fuck is oatmeal?" };
        res.send(data);
    } catch {
        res.send(error);
    }
});

/* spaceX wants to go to mars - which is a barren dessert rock with no nandos ->so no one actually cares */
app.get('/api/launches', async (req, res) => {
    try {
        const data = await fetch('https://ll.thespacedevs.com/2.2.0/launch/upcoming/?mode=list&hide_recent_previous=true');
        const json = await data.json();
        res.send(json);
    } catch (error) {
        res.send(error);
    }
});

let port = 1000;
// open express server
app.listen(port, () => { console.log(`Server is running on port ${port}`); });