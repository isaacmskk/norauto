const categoryCheckboxes = document.querySelectorAll('.category-checkbox');

categoryCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', updateProducts);
});

function updateProducts() {
    const selectedCategorias = Array.from(categoryCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    const allProducts = document.querySelectorAll('.col-12.col-lg-3');

    if (selectedCategorias.length === 0) {
        allProducts.forEach(product => product.style.display = 'block');
    } else {
        allProducts.forEach(product => product.style.display = 'none');

        selectedCategorias.forEach(categoria => {
            const productsToShow = document.querySelectorAll(`[data-categoria="${categoria}"]`);
            productsToShow.forEach(product => product.style.display = 'block');
        });
    }
}
