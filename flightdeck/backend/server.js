/**
 * do your worst
 * @since 1.0.0
 * @author tysonlmao
 * @see https://tysonlmao.dev/fish
 */

const express = require('express');
const app = express();

app.use('/', express.static('public'));

app.use((req, res, next) => {
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
    res.setHeader('Access-Control-Allow-Headers', 'Content-Type');
    next();
});

app.get('/api/launches', async (req, res) => {
    try {
        const data = await fetch('https://ll.thespacedevs.com/2.2.0/launch/upcoming/?mode=list&hide_recent_previous=true');
        const json = await data.json();
        res.send(json);
    } catch (error) {
        res.send(error);
    }
});

// open express server
app.listen(1000, () => { console.log('Server is running on port 3000'); });