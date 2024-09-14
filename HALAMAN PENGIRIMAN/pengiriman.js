document.getElementById('chatForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const message = document.getElementById('message').value;
    alert('Message sent: ' + message);
    document.getElementById('chatForm').reset();
    var myModalEl = document.getElementById('chatModal');
    var modal = bootstrap.Modal.getInstance(myModalEl);
    modal.hide();
});

var map;
var mapInitialized = false;

document.getElementById('mapModal').addEventListener('shown.bs.modal', function () {
    if (!mapInitialized) {
        map = L.map('map').setView([-7.250445, 112.768845], 13); // Replace with your coordinates
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([-7.250445, 112.768845]).addTo(map) // Replace with your coordinates
            .bindPopup('Your order is here.')
            .openPopup();

        mapInitialized = true;
    }
});



document.addEventListener('DOMContentLoaded', function () {
    // Initialize language based on saved preference or default to Bahasa Indonesia
    const savedLanguage = localStorage.getItem('language') || 'id';
    setLanguage(savedLanguage);
    
    // Map Initialization
    const map = L.map('map').setView([-6.2, 106.816666], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
});

function setLanguage(language) {
    // Save language preference
    localStorage.setItem('language', language);
    
    // Update the content based on the selected language
    const elements = document.querySelectorAll('[data-i18n]');
    elements.forEach((element) => {
        const key = element.getAttribute('data-i18n');
        element.textContent = translations[language][key];
    });
    
    // Update the selected flag
    const flagImg = language === 'en' ? 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg/800px-Flag_of_the_United_Kingdom_%283-5%29.svg.png?20230715230526' : 'https://cdn.britannica.com/48/1648-004-A33B72D8/Flag-Indonesia.jpg';
    document.getElementById('selectedFlag').src = flagImg;
}

const translations = {
    en: {
        kategori: {
            fiksi: 'Fiction',
            nonFiksi: 'Non-Fiction',
            sastra: 'Literature',
            anakAnak: 'Children',
            agama: 'Religion',
            hobi: 'Hobbies',
            seniHiburan: 'Art and Entertainment',
            pendidikanReferensi: 'Education and Reference',
            teknologiKomputer: 'Technology and Computer',
            hukumPolitik: 'Law and Politics'
        },
        button: {
            login: 'Login',
            invoice: 'Invoice',
            trackOrder: 'Track order',
            send: 'Send'
        },
        orderID: 'Order ID: 3354654654526',
        courier: 'Courier: Wahyu Pratama',
        orderDate: 'Order date: June 1, 2024',
        estimatedDelivery: 'Estimated delivery: June 5, 2024',
        chatModalTitle: 'Chat with Book Seller',
        label: {
            message: 'Message'
        },
        mapModalTitle: 'Track Order',
        orderStatusTitle: 'Order Status',
        orderConfirmed: 'Order Confirmed',
        shipped: 'Shipped',
        outForDelivery: 'Out for Delivery',
        delivered: 'Delivered',
        paymentTitle: 'Payment',
        shippingAddressTitle: 'Shipping Address'
    },
    id: {
        kategori: {
            fiksi: 'Fiksi',
            nonFiksi: 'Non Fiksi',
            sastra: 'Sastra',
            anakAnak: 'Anak-anak',
            agama: 'Agama',
            hobi: 'Hobi',
            seniHiburan: 'Seni dan Hiburan',
            pendidikanReferensi: 'Pendidikan dan Referensi',
            teknologiKomputer: 'Teknologi dan Komputer',
            hukumPolitik: 'Hukum dan Politik'
        },
        button: {
            login: 'Login',
            invoice: 'Invoice',
            trackOrder: 'Lacak pesanan',
            send: 'Kirim'
        },
        orderID: 'ID Pesanan: 3354654654526',
        courier: 'Kurir: Wahyu Pratama',
        orderDate: 'Tanggal pesanan: 1 Juni, 2024',
        estimatedDelivery: 'Perkiraan pengiriman: 5 Juni, 2024',
        chatModalTitle: 'Chat dengan Penjual Buku',
        label: {
            message: 'Pesan'
        },
        mapModalTitle: 'Lacak Pesanan',
        orderStatusTitle: 'Status Pesanan',
        orderConfirmed: 'Pesanan Dikonfirmasi',
        shipped: 'Dikirim',
        outForDelivery: 'Keluar untuk Pengiriman',
        delivered: 'Terkirim',
        paymentTitle: 'Pembayaran',
        shippingAddressTitle: 'Alamat Pengiriman'
    }
};