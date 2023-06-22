const Datastore = require('nedb');

const db = new Datastore({
    filename: 'data.json',
    autoload: true,
});

module.exports = db;