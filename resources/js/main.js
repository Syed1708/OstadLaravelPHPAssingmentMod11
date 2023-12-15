
function updateProductInfo(selectElement) {
    let selectedOption = selectElement.options[selectElement.selectedIndex];
    document.getElementById('price').value = selectedOption.getAttribute('data-price');
    document.getElementById('quantity_available').value = selectedOption.getAttribute('data-quantity');
}
