// Select the main product image and the image container
const productImageContainer = document.querySelector('.product-image');
const productImage = document.getElementById('product-img');

// Select all the thumbnails
const thumbnails = document.querySelectorAll('.thumbnail');

// Zoom functionality
productImageContainer.addEventListener('mousemove', function (e) {
    const containerRect = productImageContainer.getBoundingClientRect();
    const mouseX = e.clientX - containerRect.left;
    const mouseY = e.clientY - containerRect.top;
    
    const moveX = (mouseX / containerRect.width) * 100;
    const moveY = (mouseY / containerRect.height) * 100;
    
    productImage.style.transformOrigin = `${moveX}% ${moveY}%`;
    productImage.style.transform = 'scale(2)'; // Zoom factor (2x)
});

// Remove the zoom when the mouse leaves the image
productImageContainer.addEventListener('mouseleave', function () {
    productImage.style.transform = 'scale(1)'; // Reset zoom
    productImage.style.transformOrigin = 'center center'; // Reset transform origin
});

// Image switching functionality
thumbnails.forEach(thumbnail => {
    thumbnail.addEventListener('click', function () {
        // Change the main product image source to the thumbnail source
        const newImageSrc = this.getAttribute('data-image');
        productImage.setAttribute('src', newImageSrc);

        // Reset zoom after switching images
        productImage.style.transform = 'scale(1)';
        productImage.style.transformOrigin = 'center center';
    });
});

document.querySelector('.minus').addEventListener('click', function () {
    var quantityInput = document.getElementById('quantity');
    if (quantityInput.value > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
    }
});

document.querySelector('.plus').addEventListener('click', function () {
    var quantityInput = document.getElementById('quantity');
    quantityInput.value = parseInt(quantityInput.value) + 1;
});
