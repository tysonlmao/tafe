// let calcVal1 = document.getElementById("calcVal1");
// let calcVal2 = document.getElementById("calcVal2");
// let add = document.getElementById("add");

// let result = document.getElementById("result");

// add.addEventListener("click", function () {
//     result.innerHTML = Number(calcVal1.value) + Number(calcVal2.value);
// });


const age = document.getElementById("age");
const wearingShoes = document.getElementById("wearingShoes");
const owner = document.getElementById("owner");
const celebrity = document.getElementById("celebrity");
const angryFriend = document.getElementById("angryFriend");
const drunk = document.getElementById("drunk");

const check = document.getElementById("check");
check.addEventListener("click", () => {
    console.log(age);
    console.log(wearingShoes.checked);
    console.log(owner.checked);
    console.log(celebrity.checked);
    console.log(angryFriend.checked);
    console.log(drunk.checked);

    if (Number(age.value) >= 21 && !drunk.checked && wearingShoes.checked && !angryFriend.checked || owner.checked || celebrity.checked) {
        console.log('Welcome to the club.');
    }
    else if (angryFriend) {
        console.log('come back when you have calmed down');
    } else {
        console.log('go away');
    }
});