// routes/sendEmail.js

const express = require('express');
const router = express.Router();

// Define a POST route for sending emails
router.post('/send-email', (req, res) => {
   // Your email sending logic goes here
   res.json({ message: 'Email sent successfully' });
});

module.exports = router;
