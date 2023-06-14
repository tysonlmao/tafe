const url = "https://ll.thespacedevs.com/2.2.0/launch";
import axios from "axios";

let cache = {};
let cacheLifetime = 15 * 60 * 1000; // 15 minutes

export default async function (req, res) {
    const { lid } = req.query;
    if (cache[lid] && (Date.now() - cache[lid].timestamp < cacheLifetime)) {
        // if data good, send
        res.send(cache[lid].data);
    } else {
        // Fetch new data
        try {
            // Notice the change here:
            const { data } = await axios.get(`${url}/${lid}`);
            // cache data
            cache[lid] = {
                data: data,
                timestamp: Date.now()
            };
            // send res
            res.send(data);
        } catch (error) {
            res.status(500).json({ error: "you broke it.", error });
        }
    }
}
