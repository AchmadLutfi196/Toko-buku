const enContent = {
    testimonialTitle: "TESTIMONIAL",
    writeTestimonialButton: "Write Testimonial",
    testimonials: [
        {name: "Wahyu Pratama", message: "The books I bought at BukuKu.com are of high quality and affordable."},
        {name: "Avita Jasmine", message: "Fast delivery and very helpful customer service. I'm very satisfied!"},
        {name: "Bayu Pratama", message: "The book collection is very complete. I found all the books I was looking for here."},
        {name: "Justin Junior", message: "The story in this book is very inspiring and makes me want to pursue my dreams."},
        {name: "M.Tahir", message: "This book is very heartwarming and made me cry."},
        {name: "Asrillah", message: "This book opened my mind and made me think in new ways."},
        {name: "H.Ahmad", message: "This book changed my life and helped me become a better person."},
        {name: "Ridwan", message: "This book is a must-read for anyone who wants to be successful in life."},
        {name: "Yahya", message: "This book is the best book I've ever read and I will always recommend it to others."},
    ],
    footer: {
        home: "Home",
        rekomendasi: "Recommended Books",
        terbaru: "New Books",
        tentang: "About Us",
        kebijakan: "Policy & Privacy",
        hubungi: "Contact Us",
        bantuan: "Help",
        pembayaranTitle: "Payment Methods",
        pengirimanTitle: "Shipping Methods",
        copyright: "&copy; 2024 Bukuku.com Company. All Rights Reserved."
    }
};

const idContent = {
    testimonialTitle: "TESTIMONIAL",
    writeTestimonialButton: "Tulis Testimonial",
    testimonials: [
        {name: "Wahyu Pratama", message: "Buku yang saya beli di BukuKu.com sangat berkualitas dan harganya terjangkau."},
        {name: "Avita Jasmine", message: "Pengiriman cepat dan layanan pelanggan sangat membantu. Saya sangat puas!"},
        {name: "Bayu Pratama", message: "Koleksi bukunya sangat lengkap. Saya menemukan semua buku yang saya cari di sini."},
        {name: "Justin Junior", message: "Kisah dalam buku ini sangat inspiratif dan membuat saya ingin mengejar mimpi saya."},
        {name: "M.Tahir", message: "Buku ini sangat menyentuh hati dan membuat saya menangis."},
        {name: "Asrillah", message: "Buku ini membuka wawasan saya dan membuat saya berpikir dengan cara baru."},
        {name: "H.Ahmad", message: "Buku ini mengubah hidup saya dan membantu saya menjadi orang yang lebih baik."},
        {name: "Ridwan", message: "Buku ini wajib baca untuk semua orang yang ingin sukses dalam hidup."},
        {name: "Yahya", message: "Buku ini adalah buku terbaik yang pernah saya baca dan saya akan selalu merekomendasikannya kepada orang lain."},
    ],
    footer: {
        home: "Home",
        rekomendasi: "Buku Rekomendasi",
        terbaru: "Buku Terbaru",
        tentang: "Tentang Kami",
        kebijakan: "Kebijakan & Privasi",
        hubungi: "Hubungi Kami",
        bantuan: "Bantuan",
        pembayaranTitle: "Metode Pembayaran",
        pengirimanTitle: "Metode Pengiriman",
        copyright: "&copy; 2024 Bukuku.com Company. All Rights Reserved."
    }
};

function setLanguage(lang) {
    const content = lang === 'en' ? enContent : idContent;
    document.getElementById('testimonialTitle').textContent = content.testimonialTitle;
    document.getElementById('writeTestimonialButton').textContent = content.writeTestimonialButton;
    
    const testimonialContent = document.getElementById('testimonialRow');
    testimonialContent.innerHTML = '';
    content.testimonials.forEach(testimonial => {
        const card = `
            <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-text text-left"><i class="bi bi-person-square"></i> ${testimonial.name}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">${testimonial.message}</p>
                    </div>
                    <img src="https://cdn.gramedia.com/uploads/items/9786024246945_Laut-Bercerita.png" class="card-img-top" alt="Foto ${testimonial.name}">
                </div>
            </div>
        `;
        testimonialContent.insertAdjacentHTML('beforeend', card);
    });

    // Update footer
    document.getElementById('footerHome').textContent = content.footer.home;
    document.getElementById('footerRekomendasi').textContent = content.footer.rekomendasi;
    document.getElementById('footerTerbaru').textContent = content.footer.terbaru;
    document.getElementById('footerTentang').textContent = content.footer.tentang;
    document.getElementById('footerKebijakan').textContent = content.footer.kebijakan;
    document.getElementById('footerHubungi').textContent = content.footer.hubungi;
    document.getElementById('footerBantuan').textContent = content.footer.bantuan;
    document.getElementById('footerPembayaranTitle').textContent = content.footer.pembayaranTitle;
    document.getElementById('footerPengirimanTitle').textContent = content.footer.pengirimanTitle;
    document.getElementById('footerCopyright').innerHTML = content.footer.copyright;

    // Update flag icon
    const selectedFlag = document.getElementById('selectedFlag');
    selectedFlag.src = lang === 'en' ? 'https://www.countryflags.io/us/flat/32.png' : 'https://www.countryflags.io/id/flat/32.png';
}

// Set default language to Bahasa Indonesia
setLanguage('id');