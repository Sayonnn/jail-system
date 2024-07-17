<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loviefy</title>

    <!-- Swiper css -->
    <link rel = "stylesheet" href = "css/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel = "stylesheet" href = "css/style.css">
    <script src = "https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous">

    </script>
</head>
<body>
    <!-- navigation section -->
    <header class="menu-container">
        <span class="logo">SAYON</span>

        <nav class="menus">
            <i class="fa-solid fa-house" id = "active" ><a href = "#homeContainer" class ="active" id="CloseRegister" onclick = "CloseRegistration()">Home</a></i>
            <i class="fa-solid fa-star" ><a href = "#ServiceContainer">Service</a></i>
            <i class="fa-brands fa-safari"><a href = "#portfolio">Explore</a></i>
            <i class="fa-solid fa-gear"><a href = "#About">About</a></i>
            <i class="fa-regular fa-registered"><a href = "/Login.php" id ="OpenRegister" >Logout</a></i>
            <script>       
                $(document).ready(function(){
                    $("#OpenRegister").click(function(){
                        document.getElementById("Registration").style.display = "Block";
                        $("#Reg").fadeIn("slow");
                    });
                });
            </script>
        </nav>

    </header>

    <!-- home content section -->
    <section id = "homeContainer"class="homeContainer">
        <div class="PrimaryInfo">
            <div class="Information">
                <h3>Hi, Welcome!</h3>
                <h1>I'am Laud Zion Cascalla</h1>
                <h3>a future <span>Frontend Devoloper/Programmer</span></h3>
                <p>Hope you like my Website, most of my works are exhibited here especially those for clients. Dont forget to contact or Email me for future services, Thank you!</p>
            </div>
            <div class="socialIcons">
                <a href="" class="Facebook"><i class="fa-brands fa-facebook"></i></a>
                <a href="" class="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="" class="Twitter"><i class="fa-brands fa-twitter"></i></a>
                <a href="" class="Email"><i class="fa-solid fa-envelope"></i></a>
            </div>
            <div class = "explore">
                <a href ="#portfolio" class = "btnExplore">Explore</a>
            </div>
        </div>
        <div class="myImage">
            <img src ="Images/6.jpg">
        </div>
    </section>

    


    <!-- explore portfolio here -->
    <section class="workContainer" id="portfolio">
        <h2>Sample works</h2>

        <div class="workBox">
            <div class="work">
                <img src="Images/assorted.jpg" alt="">
                <div class="workInformation">
                    <h3>Web Development</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
 
            </div>
            <div class="work">
                <img src="Images/coupte.jpg" alt="">
                <div class="workInformation">
                    <h3>Web Development</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>

            </div>
            <div class="work">
                <img src="Images/bouquet.jpg" alt="">
                <div class="workInformation">
                    <h3>Web Development</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
 
            </div>
            <div class="work">
                <img src="Images/bul.jpg" alt="">
                <div class="workInformation">
                    <h3>Web Development</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
  
            </div>
            <div class="work">
                <img src="Images/herat.jpg" alt="">
                <div class="workInformation">
                    <h3>Web Development</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
          
            </div>
            <div class="work">
                <img src="Images/mama.png" alt="">
                <div class="workInformation">
                    <h3>Web Development</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
        
            </div>
        </div>
    </section>
  

  <!-- about -->
  <section class="about" id="About">
        <div class="me">
            <h3 class="name">Laud Zion Cascalla</h3>
            <h3 class="name">Bachelor of Science in Information technology</h3>
        </div>
        <div class="aboutInfo">
            <div class="Title">Do you like my website?</div>
            <div class="stars">
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <p class="aboutParagraph">
                Hi! I'm Laud Zion Cascalla from Batangas State University Lipa, Thanks for appreciating my website. This webpage was created to show and exhibit my freelancing works and services in order for you to view such affordable and quality works. Hope to work with you one day and help you and your business grow, Enjoy and Godbless.
            </p>
        </div>
    </section>

<!-- footer -->
<footer class="footer">
    <a href="#homeContainer" class="back">Explore</a>
    <h4><i class="fa-regular fa-copyright"></i>2023 Laud Zion Cascalla | All Rights Reserved</h4>
    </footer>
    <script src = "js/swiper-bundle.min.js"></script>
    <script src = "js/romantiko.js"></script>
</body>
</html>