export default function handler(req, res) {
    try {
        const data = { "message": "spaceX wants to go to mars - which is a barren dessert rock with no nandos ->so no one actually cares" };
        res.send(data);
    } catch (error) {
        res.status(500).json({ error: "you broke it.", error });
    }
}