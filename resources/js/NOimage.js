const slideContainers = document.querySelectorAll('.swiper-slide');

// Loop through each container and check if the image is not available (contains "Noimage2.png")
slideContainers.forEach((container) => {
    const image = container.querySelector('img');
    if (image && image.getAttribute('src').includes('Noimage2.png')) {
        container.remove();
    }
});