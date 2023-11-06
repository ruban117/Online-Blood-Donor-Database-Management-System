<style>
    .foot{
        height:100px;
        background-color:#000000;
        display:flex;
        align-items:center;
        justify-content:space-evenly;
        flex-direction:column;
        top:70px;
        position:relative;
    }

    .foot2{
        height:100px;
        background-color:#000000;
        display:flex;
        top:70px;
        position:relative;
        align-items:center;
        justify-content:center;
    }
    .foot2 a{
        text-decoration:none;
        color:#ffffff;
        font-size:20px;
        margin-left:20px;

    }
    @media only screen and (max-width: 425px) and (min-width: 200px) {
        .foot2 a{
            font-size:12px;
            margin-left:20px;
        }
    }
        .stylish-underline {
        position: relative; /* Allows us to position the underline relative to the heading */
        color: #ffffff; /* Customize the text color */
        font-size: 35px; /* Customize the font size */
        text-align: center;
        font-weight: bold;
        top: 10px;
    }
    .foot3{
        display:flex;
        align-items:center;
        justify-content:center;
        top:50px;
        position:relative;
        height:100px;
        background:#000000;
    }
    .foot3 a{
        text-decoration:none;
        font-size:35px;
        color:#ffffff;
    }
    #left{
        margin-left:25px;
    }
    .foot-4{
        height:100px;
        background-color:#000000;
        top:50px;
        position:relative;
    }
    /* Create the underline effect using a pseudo-element */
    .stylish-underline::after {
        content: ''; /* Required for pseudo-elements */
        position: absolute; /* Position the underline absolutely */
        bottom: -3px; /* Position it slightly below the text */
        top: 50px;
        left: 8px; /* Start from the left edge of the heading */
        width: 95%; /* Make it span the full width of the heading */
        height: 2px; /* Customize the underline's thickness */
        background-color: #ffffff;
        font-weight: bold;
    }
    
</style>

<div class="foot">
    <h1 class="stylish-underline">Spread The Red</h1>
</div>
<div class="foot2">
    <a href="../Home Page/home.php">Home</a>
    <a href="../About Us/aboutus.php">About Us</a>
    <a href="../Contact Us/contact.php">Contact Us</a>
    <a href="#">Privacy Policy</a>
    <a href="#">Terms & Conditions</a>
</div>
<div class="foot3">
    <h1 class="stylish-underline">Social Links</h1>
</div>

<div class="foot3">
    <a href="#"><i class="fa-brands fa-facebook"></i></a>
    <a href="#"id="left"><i class="fa-brands fa-linkedin"></i></a>
</div>

<div class="foot-4">
    <p style="text-align:center;color:#ffffff;font-size:20px;">Copyright © @2023 Spread The Red All Rights Reserved</p>
</div>
