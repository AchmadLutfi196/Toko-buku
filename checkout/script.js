function applyVoucher() {
    // Implement voucher application logic here
    alert('Voucher applied!');
}

function processPayment() {
    const shippingCost = document.querySelector('input[name="shipping"]:checked').value;
    const totalPayment = 95000 + parseInt(shippingCost);
    document.getElementById('shipping-cost').innerText = shippingCost;
    document.getElementById('total-payment').innerText = totalPayment;

    alert('Payment processed! Total Payment: Rp. ' + totalPayment);
}
