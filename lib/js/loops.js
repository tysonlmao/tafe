// // interate over an array
// let data = ["apple", "banana", "orange", "lemon", "pineapple"]; // idk lol

// for (var x = 0; x < data.length; x++) {
//     console.log(data[x]);
// }


let twitter = [
    { tweet: "burnt hair", likes: 69 },
    { tweet: "you up?", likes: 420 },
    { tweet: "The new CEO of Twitter is amazing", likes: 69420 }
];

for (var i = 0; i < twitter.length; i++) {
    document.write('<h2>' + twitter[i].tweet + '</h2>');
    document.write('<p>' + twitter[i].likes + ' likes' + '</p>');
}