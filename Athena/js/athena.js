const images = [
    "ATHENA.jpg",
    "athena.png",
    "ATHENASPRITE67.png"
];

let currentIndex = 0;
const imgElement = document.getElementById("athenaImage");

function nextImage() {
    currentIndex = (currentIndex + 1) % images.length;
    imgElement.src = images[currentIndex];
}

function prevImage() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    imgElement.src = images[currentIndex];
}
