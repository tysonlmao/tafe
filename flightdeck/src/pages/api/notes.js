import db from '../../nedb/db';

export default function handler(req, res) {
    if (req.method === 'POST') {
        const { note } = req.body;
        db.insert({ note }, (err, newNote) => {
            if (err) {
                console.error(error);
                res.status(500).json({ error: "you broke it. Note not sent" });
            } else {
                res.status(200).json(newNote);
            }
        });
    } else {
        db.find({}, (err, notes) => {
            if (err) {
                console.error(err);
                res.status(500).json({ error: 'i failed' });
            } else {
                res.status(200).json(notes);
            }
        });
    }
}