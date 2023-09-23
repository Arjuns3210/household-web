<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="bootstrap.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>24/7 Household Services</title>

</head>
<body>
    <section class="header">
        <nav>
            <a href="index.php"><img src="images/247logo.jpeg" alt="logo" height="100px" width="150px"></a>
            <div class="nav-links" id="navlinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <!-- <li><a href="index.php">Home</a></li> -->
                    <!-- <li><a href="">Services</a></li> -->
                    <li><a href="loginas.php">Login</a></li>
                    <li><a href="userregister.php">User Register</a></li>
                    <li><a href="providerregister.php">Service Provider Register</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                </ul>

            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>24/7 Household Services</h1>
            <p>HIRE THE BEST MAID AND RELAX!<br> HIRE THE BEST BABBY CARE AND RELAX!</p>
            <a href="" class="hero-btn">Visit Us To Know More</a>
        </div>

    </section>
    <!-- Services -->
    <section class="service">
        <h1>SERVICES WE OFFER</h1>
        <div class="row">
            <div class="service-col">
                <h3>HOUSEMAIDS</h3>
                <p>Enjoy The Comforts Of Not Having To Do Domestic Chores, Hire A Trained, Trustworthy And Hygienic Maid.</p>
            </div>
            <div class="service-col">
                <h3>COOK</h3>
                <p>Relish The Food Prepared By Our Experienced Hygienic Cook.</p>
            </div>
            <div class="service-col">
                <h3>BABY SITTERS</h3>
                <p>Now Your Child Will Have His / Her Own Personal Babysitter To Pamper And Take Care Of Him / Her When You’re Busy.</p>
            </div>
            <div class="service-col">
                <h3>ELDERLY CARE</h3>
                <p>An Elderly Care Attendant To Take Special Care And Support Your Elders As Good As You Would Do.</p>
            </div>

        </div>        
    </section>

    <!-- why use 24/7 services -->
    <section class="facilities">
        <h1>WHY USE 24/7 HOUSEHOLD SERVICES ?</h1>
        <div class="row1">
            <div class="facilities-col">
                <h3>QUICK & EASY</h3>
                <p>No Need To Wait For Maid To Come For Interview. Search – View Profile – Select</p>
            </div>
            <div class="facilities-col">
                <h3>SAFE & RELIABLE</h3>
                <p>Your Safety Is Our First Priority. We Do A Thorough Backgro</p>
            </div>
            <div class="facilities-col">
                <h3>MULTIPLE OPTIONS</h3>
                <p>Watch As Many Profiles As You Want. Select Only The One You Find Best</p>
            </div>
            <div class="facilities-col">
                <h3>SERVICE</h3>
                <p>We Are Not Just Another Maid Agency. We Have Strong Ethics And Customers Comes First!</p>
            </div>
        </div>
    </section>
    
    <!-- testimonials -->
    <section class="testimonials">
        <h1>WHY OUR CLIENTS LOVE US?</h1>
        <div class="row">
            <div class="testimonials-col">
                <img src="images/client1.jpeg">
                <div>
                    <p> Am A Very Particular Person When It Comes To Things Like Punctuality, Neatness And Cleanliness. The Maid To Clean Crews Have Never Disappointed Me In Any One Of Those Areas. The Women Arrive On Time And Literally Whiz Through My House. How They Can Accomplish So Much So Quickly, I’ll Never Know. When The Crews Leave, My House Is Not Just Spotless. It Is Antiseptic. I Love It! Their Trustworthiness And Professionalism Are Rare Gems In The Business World These Days.</p>
                    <h3>Cristine Ber</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
            </div>
            <div class="testimonials-col">
                <img src="images/client2.jpeg">
                <div>
                    <p>They Are Always Pleasant And Have Always Taken Such Pride In Their Work. We Have Always Found Them Reliable And Flexible Whenever We Required Extra Work, Or Rescheduling. Ms. Bermudez’s, The Owner Of Maid To Clean, Professionalism And Fairness Towards Her Competent Staff And Clients Is The Key To The Success Of Her Company. It Is Always Nice To Come Home To A Sparking Clean Home The Day Maid To Clean Has Been Here.</p>
                    <h3>David Byer</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- call to action -->
    <section class="cta">
        <h1>READY TO HIRE A MAID ?</h1>
        <a href="contactus.php" class="hero-btn">CONTACT US</a>
    </section>

    <!-- footer -->
    <section class="footer">
        <h4>About Us</h4>
        <p>We Are Building An Unique Technology Company<br>
            Our Vision Is To Be The India’s Largest Aggregator For Domestic Maid Bureaus;<br> To Build A Place Where Anyone Can Come To Discover And Hire Any Domestic Help They Want.</p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-linkedin"></i>
        </div>
    </section>












    <!-- javascript for toggle menu -->
    <script>
        var navlinks=document.getElementById("navlinks");
        function showMenu(){
            navlinks.style.right="0";
        }
        function hideMenu(){
            navlinks.style.right="-200px";
        }
    </script>
    
</body>
</html>