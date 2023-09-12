const express = require('express');
const bodyParser = require('body-parser');
const nodemailer = require('nodemailer');
const helmet = require('helmet');
const cors = require('cors');
const app = express();
const port = process.env.PORT || 4000;

// Middleware to parse JSON request bodies
app.use(bodyParser.json());

app.use(
  helmet.contentSecurityPolicy({
    directives: {
      defaultSrc: ["'self'"], // Allow resources from the same origin
      styleSrc: ["'self'", "'unsafe-inline'", 'https://fonts.googleapis.com'],
      scriptSrc: ["'self'", 'https://kit.fontawesome.com'],
      fontSrc: ['https://fonts.gstatic.com'],
      imgSrc: ["'self'", 'data:'],
      frameSrc: ["'self'", 'http://localhost'], // Allow iframes from localhost
    },
  })
);

const sendEmailRouter = require('./routes/sendEmail');
app.use('/send-email', sendEmailRouter);

// Handle POST requests to /send-email
app.post('/send-email', (req, res) => {
  const { email } = req.body; // Assuming your email input field has a "name" attribute of "email"

  if (!email) {
    return res.status(400).json({ message: 'Email address is missing.' });
  }

  // Create a Nodemailer transporter and send the email
  const transporter = nodemailer.createTransport({
    // Your email configuration options here
  });

  const mailOptions = {
    from: 'your@email.com',
    to: email,
    subject: 'Gas Price Notification',
    text: 'This is a notification about gas price fluctuations.',
  };

  transporter.sendMail(mailOptions, (error, info) => {
    if (error) {
      console.error('Error sending email:', error);
      return res.status(500).json({ message: 'Email could not be sent.' });
    }

    return res.json({ message: 'Email sent successfully.' });
  });
});

// Start the server
app.listen(4000, () => {
  console.log('Server is running on port 4000');
});