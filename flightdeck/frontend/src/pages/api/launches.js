const url = "https://ll.thespacedevs.com/2.2.0/launch/upcoming/?search=SpaceX&mode=list";
import axios from "axios";

export default async function handler(req, res) {
    try {
        const { data } = await axios.get(url);
        // send response
        res.send(data);
    } catch (error) {
        res.status(500).json({ error: "you broke it.", error });
    }
}