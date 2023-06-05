const url = "https://ll.thespacedevs.com/2.2.0/launch/upcoming/?search=SpaceX&mode=list";
import axios from "axios";

// Cache variables
let bunny = null;
let cacheTimestamp = null;
const cacheDuration = 15 * 60 * 1000; // 15 minutes in ms

export default async function handler(req, res) {
    try {
        // Check if the cached data is still valid
        const currentTime = Date.now();
        if (bunny && cacheTimestamp && currentTime - cacheTimestamp < cacheDuration) {
            // if the cache is all good, send data
            res.send(bunny);
            return;
        }

        // fetch new data
        const { data } = await axios.get(url);

        bunny = data;
        cacheTimestamp = currentTime;

        res.send(data);
    } catch (error) {
        res.status(500).json({ error: "you broke it", error });
    }
}
