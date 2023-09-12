<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<html lang="en">
<head>
<title>Homepage</title>
<style>
   .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
   }

   .modal-content {
      background-color: #fff;
      margin: 20% auto;
      padding: 20px;
      border: 1px solid #888;
      border-radius: 5px;
      max-width: 400px;
   }

   .close {
      float: right;
      cursor: pointer;
   }

   /* Add some hover effect to close button */
   .close:hover {
      color: #f00;
   }
        div.header {
    width: 100%;
    padding: 5px 0px;
    text-align: right;
    background: #ffffff; /* Add the background style here */
}

</style>
<link rel="stylesheet" type= "text/css" href="css/login.css">
<script src="https://kit.fontawesome.com/4bc7e518dd.js" crossorigin="anonymous"></script>

<body>
   <div class="header"> 
      <div class="homepageContainer">
         <a href="login.php"> Login</a>
      </div>
      
   </div>
   <div class="banner">
      <div class="homepageContainer">
         <div class="bannerHeader">
            <h1>NOVERO</h1>
            <p> LPG TRADING</p>
         </div>
         <p class="bannerTagLine"> LPG FREE DELIVERY Authorized Dealer !
            Accept any brand of SULA GAS, TOWN GAZ, RAF GAZ
            AND GAS PETRONAS 
         </p>
         <div class ="bannerIcons">
            <a href="https://www.facebook.com/noveroLPG" title="Visit our Facebook page"> <i class="fa-brands fa-facebook"></i></a>
            <a href="#" id="phoneLink" title="Contact us in this Phone Number"> <i class="fa-solid fa-phone"></i></a>
                <div id="phoneDialog" class="dialog">
                    <span class="close-button" onclick="closeDialog()">&times;</span>
                    <p>Contact my Phone Number: 09477326952</p> </div>
            <a href="#" id="payLink" title="Pay in our GCASH"> <i class="fa-solid fa-wallet"></i></a>
            <div id="payDialog" class="dialog">
               <span class="close-button" onclick="closeDialog1()">&times;</span>
               <p>Pay in this GCASH-Irvin Novero 09477326952</p> </div>
         </div>
      </div>
      
   </div>
   <div class ="homepageContainer">
      <div class="homepageFeatures">
         <div class="homepageFeature">
            <span class="featuresIcon"> <img src="images/Sula.png" alt="First Item">
            </span>
            <h3 class="featureTitle"> SULA GAS</h3>
            <p class="featureDescription"> ORDER NOW</p>
         </div>
         <div class="homepageFeature">
            <span class="featuresIcon"> <img src="images/Eco.png" alt="First Item"></span>
            <h3 class="featureTitle"> ECOSAVERS GAS</h3>
            <p class="featureDescription"> ORDER NOW</p>
         </div>
         <div class="homepageFeature">
            <span class="featuresIcon"> <img src="images/Town.png" alt="First Item"></span>
            <h3 class="featureTitle"> TOWN GAZ</h3>
            <p class="featureDescription"> ORDER NOW</p>
         </div>
      </div>
   </div>
   <div class="homepageNotified">
      <div class="homepageContainer">
         <div class="homepageNotifiedContainer">
         <div class="emailForm">
               <h3>Get notified on price rate!</h3>
               <p>Stay informed and never miss a beat on gas price fluctuations. Sign up for our notifications to receive real-time updates on gas price rates, ensuring you're always in the know. With our service, you'll have the advantage of making informed decisions and managing your gas expenses effectively.</p>
               <form id="notificationForm">
                  <div class="formContainer">
                  <input type="text" id="emailInput" placeholder="Enter your Gmail address">
                     <button id="checkButton">Check</button>
                  </div>
               </form>
               <div id="notificationMessage"></div>
            </div>


            <div class="video">
               <iframe src="images/2.mp4" frameborder="0"></iframe>
            </div>
            </div>
         </div>
      </div>
      <div class="socials">
         <div class="homepageContainer">
            <h3 class="socialHeader"> This is our Social Media Accounts </h3>
            <p class="socialText"> Visit us for more info! </p>
            <div class="socialIconsContainer">
               <a href="https://www.facebook.com/noveroLPG" title="Visit our Facebook page"> <i class="fa-brands fa-facebook"></i></a>
            </div>
         </div>
      </div>
<div class="footer">
   <div class="homepageContainer">
      <a href="">Contact</a>
      <a href="">Download</a>
      <a href="">Press</a>
      <a href="">Email</a>
      <a href="">Support</a>
      <a href="">Privacy</a>
   </div>
</div>
<script>
   document.addEventListener("DOMContentLoaded", function() {
      const checkButton = document.getElementById("checkButton");
      const emailInput = document.getElementById("emailInput");
      
      // Function to display a modal with the provided message
      function showModal(message) {
         const modal = document.createElement("div");
         modal.className = "modal";
         modal.innerHTML = `
            <div class="modal-content">
               <span class="close">&times;</span>
               <p>${message}</p>
            </div>
         `;

         document.body.appendChild(modal);

         const closeBtn = modal.querySelector(".close");
         closeBtn.addEventListener("click", function() {
            modal.style.display = "none";
         });

         modal.style.display = "block";
      }

      // Add event listener for the "Check" button
      checkButton.addEventListener("click", function(event) {
         const emailValue = emailInput.value.trim(); // Trim any whitespace

         // Check if the email input is empty
         if (emailValue === "") {
            alert("Please enter an email address.");
            event.preventDefault();
         } else {
            // Show the modal with the provided message
            showModal("PRICE RATE:<br><br>5KG = 300 PESOS<br>11KG = 850 PESOS<br>22KG = 1700 PESOS<br><br>PLEASE STAY TUNED FOR PRICE!");

            event.preventDefault();
         }
      });
   });
</script>

   

</body>
<script>
      
   document.getElementById("phoneLink").addEventListener("click", function () {
       document.getElementById("phoneDialog").style.display = "block";
   });

   function closeDialog() {
       document.getElementById("phoneDialog").style.display = "none";
   }

   document.getElementById("payLink").addEventListener("click", function () {
       document.getElementById("payDialog").style.display = "block";
   });

   function closeDialog1() {
       document.getElementById("payDialog").style.display = "none";
   }
</script>
</html>