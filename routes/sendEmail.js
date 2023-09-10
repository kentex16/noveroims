// routes/sendEmail.js

const express = require('express');
const router = express.Router();

// Define a POST route for sending emails
router.post('/', (req, res) => {
   // Your email sending logic goes here
   res.json({ message: 'Email sent successfully' });
});

// Handle GET requests as well (if needed)
router.get('/', (req, res) => {
   // Handle GET requests here (e.g., render a form)
   res.send('GET request to /send-email');
});

module.exports = router;