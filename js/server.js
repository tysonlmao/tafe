const express = require('express');
const app = express();

app.use('/', express.static('public'));

app.get('/api/launches', async (req, res) => {
    try {
        const data = await fetch('https://api.spacexdata.com/v3/launches/next');
        const json = await data.json();
        res.send(json);
    } catch (error) {
        res.send(error);
    }

});

app.listen(3000, () => { console.log('Server is running on port 3000'); });