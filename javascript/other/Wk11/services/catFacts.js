import { APIURL } from "../config.js";

export async function search() {
    const res = await fetch(APIURL);
    const json = await res.json();
    console.log(json);
    return json;
}