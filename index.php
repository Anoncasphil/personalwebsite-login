<?php
// Start the session
session_start();

// Check if the user is logged in, if not, redirect to login page
if (!isset($_SESSION["users"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhilStudio</title>

    <!-- ICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="assets/images/icon.png" type="image/png">
    <!-- PROGRESS BAR -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="portfolio.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="resume.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <a href="#" class="logo"><span>PHIL</span>STUDIO</a>

            <i class='bx bx-menu' id="menu-icon"></i>
    
            <nav class="navigationbar">
                <a href="#home" class="active">HOME</a>
                <a href="#about">ABOUT</a>
                <a href="#skills">SKILLS</a>
                <a href="#services">SERVICES</a>
                <a href="#contact">CONTACT</a>
                <a href="#logout" class="btn" id="logout">LOGOUT</a>
            </nav>
        </header>

        <section class="home" id="home">
            <div class="home-content">
                <p><span>STUDENT DEVELOPER</span></p>
                <h1>Antoine Philipp Ochea</h1>
                <div class="social-media">
                    <a href="https://www.facebook.com/profile.php?id=100011146696544"><i class='bx bxl-facebook' ></i></a>
                    <a href="https://github.com/Anoncasphil"><i class='bx bxl-github'></i></i></a>
                    <a href="https://www.instagram.com/anoncasphil/"><i class='bx bxl-instagram' ></i></a>
                    <a href="https://www.linkedin.com/in/antoinephil/"><i class='bx bxl-linkedin-square' ></i></a>
                </div>
                <a href="#" class="btn" id="resumeBtn">Resume</a>
            </div>
        </section>

        <section class="about" id="about">
            <div class="about-img">
                <img src="assets/images/about.png" alt=""> 
            </div>
        
            <div class="about-content">
                <h2 class="heading">About <span>Me</span></h2>
                <p>Hello! I'm Antoine Philipp Ochea, a dedicated student with a 
                    passion for crafting innovative solutions through code. Currently 
                    pursuing Bachelor of Science in Information Technology at National University Fairview, 
                    I thrive on the challenges
                    presented by the ever-evolving world of programming.<br><br> </p>
    
                    <p>As a student developer, I am always eager to learn and adapt to new 
                        technologies, and I am enthusiastic about contributing to the exciting 
                        developments in the world of software engineering. If you share a passion
                         for coding or have any collaborative projects in mind, I'd love to connect 
                         and explore the possibilities together! <br><br><br></p>
                
            </div>
        </section>

        <section class="skills" id="skills">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="heading text-center">My <span>Skills</span></h2>
                    <br>
        
                    <!-- Technical Skills -->
                    <div style="display: flex;" class="row">
                        <div class="col-md-6">
                            <h3 class="text-center"><span>Technical</span> Skills <br><br><br></h3>
                            <div class="first"></div>
                            <!-- First Column - Skills -->
                            <div class="skill-container">
                                <h4>Communication</h4>
                                <div class="progress skill-bar">
                                    <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
        
                                <h4>Management</h4>
                                <div class="progress skill-bar">
                                    <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
        
                                <h4>Team Work</h4>
                                <div class="progress skill-bar">
                                    <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
        
                            <!-- Second Column - Skills -->
                            <div class="skill-container">
                                <h4>Creativity</h4>
                                <div class="progress skill-bar">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
        
                                <h4>Design</h4>
                                <div class="progress skill-bar">
                                    <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
        
                                <h4>Digital Skills</h4>
                                <div class="progress skill-bar">
                                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
        
                        <!-- Programming Skills -->
                        <div class="col-md-6">
    <h3 class="text-center"><span>Programming</span> Skills</h3>
    <div class="row">
        <div class="col-6">
            <div class="card mb-3 text-center" style="background-color: var(--second-bg-color); border-radius: 20px;" >
                <div class="card-body">
                    <i class="fab fa-html5 fa-4x mb-3" style="color: var(--main-color);"></i>
                    <h4 class="card-title" style="color: white;">HTML</h4>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mb-3 text-center" style="background-color: var(--second-bg-color); border-radius: 20px;">
                <div class="card-body">
                    <i class="fab fa-css3-alt fa-4x mb-3" style="color: var(--main-color);"></i>
                    <h4 class="card-title" style="color: white;">CSS</h4>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mb-3 text-center" style="background-color: var(--second-bg-color); border-radius: 20px;">
                <div class="card-body">
                    <i class="fab fa-js fa-4x mb-3" style="color: var(--main-color);"></i>
                    <h4 class="card-title" style="color: white;">JavaScript</h4>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mb-3 text-center" style="background-color: var(--second-bg-color); border-radius: 20px;">
                <div class="card-body">
                    <i class="fab fa-python fa-4x mb-3" style="color: var(--main-color);"></i>
                    <h4 class="card-title" style="color: white;">Python</h4>
                </div>
            </div>
        </div>
        <!-- Add more programming languages here -->
        <div class="col-6">
            <div class="card mb-3 text-center" style="background-color: var(--second-bg-color); border-radius: 20px;">
                <div class="card-body">
                    <i class="fab fa-java fa-4x mb-3" style="color: var(--main-color);"></i>
                    <h4 class="card-title" style="color: white;">Java</h4>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mb-3 text-center" style="background-color: var(--second-bg-color); border-radius: 20px;">
                <div class="card-body">
                    <i class="fab fa-php fa-4x mb-3" style="color: var(--main-color);"></i>
                    <h4 class="card-title" style="color: white;">PHP</h4>
                </div>
            </div>
        </div>
    </div>
</div>


                    </div>
                </div>
            </div>
        </section>

        <!-- Uncomment the portfolio section if needed -->
        <!-- <section class="portfolio" id="portfolio">
            Portfolio section content -->
        <!-- </section> -->

        <section class="services" id="services">
            <h2 class="heading">My <span>Services<br><br><br></span></h2>
        <div class="services-container">
        <div class="service-box">
            <i class='bx bx-edit'></i>
            <h3>Video Editing<br><br></h3>
            <p>We specialize in transforming raw video footage into polished, 
                captivating stories. Our skilled team of editors employs cutting-edge 
                techniques to enhance visuals, refine timing, and add dynamic elements to 
                ensure your videos leave a lasting impact.</p>
                <a href="#contact" class="btn" onclick="fillMessage('Video Editing')">Contact</a>
        </div>

        <div class="service-box">
            <i class='bx bxs-paint-roll' ></i>
            <h3>Graphics Design<br><br></h3>
            <p>We specialize in crafting unique and memorable designs tailored to your 
                individual or business needs. From eye-catching logos that define your 
                brand identity to precise background removal that elevates your visuals.
                Let us transform your ideas.
            </p>
            <a href="#contact" class="btn" onclick="fillMessage('Graphics Design')">Contact</a>
        </div>

        
            <div class="service-box">
                <i class='bx bxs-package'></i>
                <h3>Logo Making <br><br></h3>
                <p>Our talented designers are dedicated to crafting logos that not only 
                    reflect the essence of your brand but also leave a lasting impression.<br><br><br></p>
                    <a href="#contact" class="btn" onclick="fillMessage('Logo Making')">Contact</a>
            </div>

            <div class="service-box">
                <i class='bx bx-home-alt-2'></i>
                <h3>Background Removal <br><br></h3>
                <p>Need a clean and professional touch to your visuals? Our Background Removal
                     service ensures your images are crisp, clear, and free from distractions.
                      When you're in need of refined 
                      visuals with background removal, trust us to bring your vision to life. </p>
  
                      <a href="#contact" class="btn" onclick="fillMessage('Background Removal')">Contact</a>
            </div>

        </div>
        </section>

        <section class="contact" id="contact">
            <div class="contact-container">
                <div class="content">
                  <div class="left-side">
                    <div class="address details">
                        <i class='bx bxs-building-house'></i>
                      <div class="topic">Address</div>
                      <div class="text-one">Regalado St.</div>
                      <div class="text-two">Quezon City, Philippines</div>
                    </div>
                    <div class="phone details">
                        <i class='bx bx-phone' ></i>
                      <div class="topic">Phone</div>
                      <div class="text-one">+639693213556</div>
                      <div class="text-two">+639166272458</div>
                    </div>
                    <div class="email details">
                        <i class='bx bx-envelope' ></i>
                      <div class="topic">Email</div>
                      <div class="text-one">antoineochea0321@gmail.com</div>
                      <div class="text-two">antoineochea20@gmail.com</div>
                    </div>
                  </div>
                  <div class="right-side">
                    <div class="topic-text"><br>Send a message<br><br></div>
                    <p>If you have any work from me or any types of quries related to my services that I offer, 
                    you can send me a message from here. It's my pleasure to help you.<br><br><br></p>
                    <?php include 'retrieve_user.php'; ?>
                    <form id="emailForm" action="javascript:void(0);" method="post">
    <div class="input-box">
        <input type="text" name="name" placeholder="Enter your name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" readonly>
    </div>
    <div class="input-box">
        <input type="email" name="email" placeholder="Enter your email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" readonly>
    </div>
    <div class="input-box message-box">
        <textarea name="message" placeholder="Enter your message"></textarea>
    </div>
    <div class="button">
    <button type="submit" id="sendBtn" class="btn">Send Now</button>
</div>
</form>

                </div>
                </div>
              </div>
              
        </section>
    </div>

<!-- The Modal for Sending Email -->
<div id="emailModal" class="modal">
  <div class="modal-content" id="sending">
    <span class="close">&times;</span>
    <p>Sending Email...</p>
  </div>
</div>

<div id="successModal" class="modal">
  <div class="modal-content" id="success">
    <span class="close">&times;</span>
    <p>Email Sent Successfully!</p>
  </div>
</div>

<div id="notificationModal" class="notification-modal">
    <span class="close-notification">&times;</span>
    <p>Email sent successfully!</p>
</div>

<div id="resumeModal" class="resumemodal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <img src="assets/images/resume.jpg" alt="Resume" class="resume-image">
  </div>
</div>

    <footer>
        <p>Copyright © 2024 Antoine Philipp Ochea. All Rights Reserved. </p>
    </footer>

    <script src="assets/js/script.js?v=<?php echo time(); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
