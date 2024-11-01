document.querySelectorAll('.product-item').forEach(item => {
    const stockAmount = parseInt(item.querySelector('.stock-amount').textContent);
    const stockMessage = document.createElement('p');
    stockMessage.className = 'stock-message';
    stockMessage.textContent = 'Agotado';

    if (stockAmount === 0) {
        item.classList.add('out-of-stock');
        item.appendChild(stockMessage);
    }
});