// public/home.js
function handleLogin() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    fetch('/api/login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email: username, password })
    })
    .then(response => response.json())
    .then(data => {
        if (data.token) {
            localStorage.setItem('token', data.token);
            // Redirect to home page
            window.location.href = '/home';
        } else {
            alert('Login gagal!');
        }
    })
    .catch(error => console.error('Error:', error));
}

// Function to fetch profile details
function fetchProfile() {
    const token = localStorage.getItem('token');
    if (token) {
        fetch('/api/profile', {
            headers: { 'Authorization': token }
        })
        .then(response => response.json())
        .then(profile => {
            document.getElementById('login-form').classList.add('hidden');
            document.getElementById('profile').classList.remove('hidden');
            document.getElementById('profile-name').innerText = 'Nama: ' + profile.name;
            document.getElementById('profile-email').innerText = 'Email: ' + profile.email;
        })
        .catch(error => console.error('Error fetching profile:', error));
    }
}

// Check if already logged in
if (localStorage.getItem('token')) {
    fetchProfile();
}
// public/home.js
document.addEventListener('DOMContentLoaded', function() {
    const token = localStorage.getItem('token');
    const loginLogoutBtn = document.getElementById('loginLogoutBtn');

    if (token) {
        // Jika sudah login
        loginLogoutBtn.innerHTML = 'Logout';
        loginLogoutBtn.addEventListener('click', handleLogout);
    } else {
        // Jika belum login
        loginLogoutBtn.innerHTML = 'Login';
        loginLogoutBtn.href = 'login.php'; // Menuju ke halaman login
    }
});

function handleLogout() {
    localStorage.removeItem('token');
    window.location.href = '/'; // Anda bisa mengarahkan ke halaman login atau halaman lain yang sesuai
}


