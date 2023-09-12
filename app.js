const express = require('express');
const path = require('path');
const cors = require('cors');
const bodyParser = require('body-parser'); // Import body-parser middleware
const app = express();

// Middleware for serving static files from the "public" directory
app.use(express.static(path.join(__dirname, 'public')));

// Enable CORS to allow requests from different origins
app.use(cors());

// Parse JSON request bodies
app.use(bodyParser.json());

// Define a POST route for sending emails
app.post('/send-email', (req, res) => {
   const email = req.body.email; // Retrieve the email address from the request body

   // Replace the following code with your email sending logic
   // For demonstration purposes, we'll just send a success message
   res.json({ message: 'Email sent successfully to ' + email });
});

const port = process.env.PORT || 3000;
app.listen(port, () => {
   console.log(`Server is running on port ${port}`);
});
