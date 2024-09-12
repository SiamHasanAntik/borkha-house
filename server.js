const express = require('express');
const app = express();
const PORT = 3000;

// Middleware to handle POST data
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

// Serve static files (like HTML, CSS, and JS)
app.use(express.static('public'));

// Route for handling form submission
app.post('/place-order', (req, res) => {
    const order = req.body;
    console.log('Order received:', order);
    res.send('Order placed successfully!');
});

app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
const mongoose = require('mongoose');
mongoose.connect('mongodb://localhost:27017/ordersDB', { useNewUrlParser: true, useUnifiedTopology: true });

const orderSchema = new mongoose.Schema({
    customer_name: String,
    address: String,
    phone: String,
    product: String,
    subtotal: Number,
    shipping: Number,
    total: Number
});

const Order = mongoose.model('Order', orderSchema);

app.post('/place-order', (req, res) => {
    const newOrder = new Order(req.body);
    newOrder.save().then(() => res.send('Order saved successfully!')).catch(err => res.send('Error: ' + err));
});

const mysql = require('mysql');
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'your_database'
});

db.connect((err) => {
    if (err) throw err;
    console.log('Connected to MySQL');
});

app.post('/place-order', (req, res) => {
    const { customer_name, address, phone, product, subtotal, shipping, total } = req.body;
    const sql = 'INSERT INTO orders SET ?';
    const order = { customer_name, address, phone, product, subtotal, shipping, total };
    db.query(sql, order, (err, result) => {
        if (err) throw err;
        res.send('Order saved successfully!');
    });
});
