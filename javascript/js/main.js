/**
 * do your worst.
 * @author tysonlmao
 * @since 1.0.0
 * @see https://tysonlmao.dev/fish
 * */

const API_KEY = "";
// need to find a solution to hide 

async function getStats(user) {
    try {

        // Query the mojang api to convert a displayname into a uuid
        const mojangRes = await fetch(`https://api.ashcon.app/mojang/v2/user/${username}`, {
            mode: 'cors'
        });

        if (!mojangRes.ok) {
            throw new Error(`Error getting a uuid for ${user}: ${mojangRes.status}`);
        }

        const mojangData = await mojangRes.json();
        const uuid = mojangData.uuid;

        // Contact the Hypixel API with the UUID provided
        const hypixelRes = await fetch(`https://api.hypixel.net/player?key=${API_KEY}&uuid=${uuid}`);
    } catch {
        console.error(`Failed to retrieve stats for ${user}`);
    }
}