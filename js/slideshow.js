

let index = 0;
let check = 0;
let placeImg = document.querySelector("img");
let numbers = document.querySelector("#number");




const imgArr = [
    "./images/anh8.jpg",
    "./images/anh9.jpg",
    "./images/anh10.jpg",
    "./images/anh11.jpg",
    "./images/anh12.jpg",
    "./images/anh13.jpg",
    "./images/anh14.jpg",
    "./images/anh15.jpg",
    "./images/anh16.jpg",
    "./images/anh17.jpg",
    "./images/anh18.jpg",
    "./images/anh19.jpg",
    "./images/anh20.jpg",
    "./images/anh21.jpg",
    "./images/anh22.jpg",
    "./images/anh23.jpg",
    "./images/anh24.jpg",
    "./images/anh25.jpg",
    "./images/anh26.jpg",
    "./images/anh27.jpg",
];

function prev() {
    index = index == 0 ? index = imgArr.length - 1 : --index;
    placeImg.src = imgArr[index];
    numbers.innerText = `${index + 1}/20`
}

function next() {
    index = index == imgArr.length - 1 ? 0 : ++index;
    placeImg.src = imgArr[index];
    numbers.innerText = `${index + 1}/20`
}