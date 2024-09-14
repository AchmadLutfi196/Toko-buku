const express = require('express');
const bodyParser = require('body-parser');
const jwt = require('jsonwebtoken');
const path = require('path');
const app = express();

app.use(bodyParser.json());
app.use(express.static(path.join(__dirname, 'public')));

const users = {
    'user@example.com': { password: 'password123', name: 'John Doe', email: 'user@example.com' }
};

const SECRET_KEY = 'SECRET_KEY';

app.post('/api/login', (req, res) => {
    const { email, password } = req.body;
    const user = users[email];
    if (user && user.password === password) {
        const token = jwt.sign({ id: email }, SECRET_KEY, { expiresIn: '1h' });
        res.json({ token });
    } else {
        res.status(401).send('Email atau password salah');
    }
});

function verifyToken(req, res, next) {
    const token = req.headers['authorization'];
    if (!token) return res.status(403).send('Token tidak disediakan.');

    jwt.verify(token, SECRET_KEY, (err, decoded) => {
        if (err) return res.status(500).send('Token tidak valid.');
        req.userId = decoded.id;
        next();
    });
}

app.get('/api/profile', verifyToken, (req, res) => {
    const user = users[req.userId];
    if (user) {
        res.json({ name: user.name, email: user.email });
    } else {
        res.status(404).send('Pengguna tidak ditemukan');
    }
});

// Rute untuk mengarahkan ke halaman home setelah login
app.get('/home', verifyToken, (req, res) => {
    // Di sini Anda bisa mengirimkan halaman home yang sesuai
    res.sendFile(path.join(__dirname, 'home.php'));
});

// Rute default untuk mengirimkan file index.html
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'home.php'));
});

// Middleware untuk menyajikan file statis dari direktori 'public'
app.use(express.static(path.join(__dirname, 'public')));

app.listen(3000, () => {
    console.log('Server berjalan pada port 3000');
});
