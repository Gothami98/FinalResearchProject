<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kider - Preschool Website Template</title>
  

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="index.html" class="navbar-brand">
                <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i>PathBloomers</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About Us</a>
                    <a href="classes.html" class="nav-item nav-link">Classes</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="facility.html" class="dropdown-item">School Facilities</a>
                            <a href="team.html" class="dropdown-item">Popular Teachers</a>
                            <a href="call-to-action.html" class="dropdown-item">Become A Teachers</a>
                            <a href="appointment.html" class="dropdown-item">Make Appointment</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                </div>
<!-- Get Started and Login Buttons -->
<button type="button" class="btn btn-primary d-none d-lg-block mx-2" onclick="location.href='fontpage.php'">
    Get Started
</button>
<button type="button" class="btn btn-primary d-none d-lg-block mx-2" onclick="location.href='login.php'">
    Login
</button>


                
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel001.png" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">The Best Kindergarten School For Your Child</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Our kindergarten offers a supportive space for children with special needs to learn and grow. We focus on personalized care and interactive learning.</p>
                                    <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Get Started</a>
                                    <a href="" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel002.png" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">Make A Brighter Future For Your Child</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">With fun activities and adaptive teaching, we help build confidence, creativity, and social skills in every child</p>
                                    <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Get Started</a>
                                    <a href="" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- About the Application Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">About the Application</h1>
            <p>This web application is designed to support the cognitive and intellectual development of children with intellectual disabilities. It offers activity-based learning modules, progress tracking, and bilingual support to enhance learning experiences.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="facility-item">
                    <div class="facility-icon bg-primary">
                        <span class="bg-primary"></span>
                        <i class="fa fa-brain fa-3x text-primary"></i>
                        <span class="bg-primary"></span>
                    </div>
                    <div class="facility-text bg-primary">
                        <h3 class="text-primary mb-3">Activity-Based Learning</h3>
                        <p class="mb-0">Interactive learning modules that focus on cognitive, auditory, and visual skill development.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="facility-item">
                    <div class="facility-icon bg-success">
                        <span class="bg-success"></span>
                        <i class="fa fa-chart-line fa-3x text-success"></i>
                        <span class="bg-success"></span>
                    </div>
                    <div class="facility-text bg-success">
                        <h3 class="text-success mb-3">Progress Tracking</h3>
                        <p class="mb-0">Monitor children's learning progress through detailed reports and analytics.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="facility-item">
                    <div class="facility-icon bg-warning">
                        <span class="bg-warning"></span>
                        <i class="fa fa-file-pdf fa-3x text-warning"></i>
                        <span class="bg-warning"></span>
                    </div>
                    <div class="facility-text bg-warning">
                        <h3 class="text-warning mb-3">Report Generation</h3>
                        <p class="mb-0">Generate PDF reports for parents and educators to evaluate children's development.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="facility-item">
                    <div class="facility-icon bg-info">
                        <span class="bg-info"></span>
                        <i class="fa fa-language fa-3x text-info"></i>
                        <span class="bg-info"></span>
                    </div>
                    <div class="facility-text bg-info">
                        <h3 class="text-info mb-3">Bilingual Support</h3>
                        <p class="mb-0">The application is available in Sinhala and English for accessibility and ease of use.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About the Application End -->



       <!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-4">Empowering Children with Activity-Based Learning</h1>
                <p>This web application is designed to monitor and support the cognitive development of children with intellectual disabilities through structured learning activities.</p>
                <p class="mb-4">Our platform provides interactive tools to help children improve auditory and visual skills, spatial understanding, pre-reading, and pre-math concepts. With bilingual support and detailed progress tracking, caregivers and educators can effectively monitor and enhance children's development.</p>
                <div class="row g-4 align-items-center">
                    <div class="col-sm-6">
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="">Learn More</a>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <!-- <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 45px; height: 45px;">
                            <div class="ms-3">
                                <h6 class="text-primary mb-1">A.A.G.M. Monarawila</h6>
                                <small>Project Developer</small>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                <div class="row">
                    <div class="col-12 text-center">
                        <img class="img-fluid w-75 rounded-circle bg-light p-3" src="img/classes-1.jpg" alt="">
                    </div>
                    <div class="col-6 text-start" style="margin-top: -150px;">
                        <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/classes-2.jpg" alt="">
                    </div>
                    <div class="col-6 text-end" style="margin-top: -150px;">
                        <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/about-3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- How It Works Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded">
            <div class="row g-0">
                <!-- Image Collage (Now Aligned) -->
                <div class="col-lg-6 wow fadeIn d-flex align-items-center" data-wow-delay="0.1s">
                    <img class="img-fluid w-100 rounded" src="img/classes-4.jpg" alt="" >

                    <!-- <div class="row g-3">
                        <div class="col-6">
                            <img class="img-fluid w-100 rounded" src="img/classes-1.jpg" alt="" style="object-fit: cover; height: 250px;">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid w-100 rounded" src="img/classes-2.jpg" alt="" style="object-fit: cover; height: 250px;">
                        </div>
                        <div class="col-12">
                            <img class="img-fluid w-100 rounded" src="img/classes-3.jpg" alt="" style="object-fit: cover; height: 250px;">
                        </div>
                    </div> -->
                </div>

                <!-- Timeline Section -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 d-flex flex-column justify-content-center p-5">
                        <h1 class="mb-4">How It Works</h1>
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-icon bg-primary text-white">
                                    <i class="fa fa-user-plus"></i>
                                </div>
                                <div class="timeline-content">
                                    <h4>Step 1: Register</h4>
                                    <p>Sign up as a parent, teacher, or admin to access the platform.</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-icon bg-success text-white">
                                    <i class="fa fa-child"></i>
                                </div>
                                <div class="timeline-content">
                                    <h4>Step 2: Create Child Profile</h4>
                                    <p>Add child details to personalize the learning experience.</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-icon bg-warning text-white">
                                    <i class="fa fa-book"></i>
                                </div>
                                <div class="timeline-content">
                                    <h4>Step 3: Select Activities</h4>
                                    <p>Choose activity-based learning modules designed for cognitive growth.</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-icon bg-danger text-white">
                                    <i class="fa fa-chart-line"></i>
                                </div>
                                <div class="timeline-content">
                                    <h4>Step 4: Track Progress</h4>
                                    <p>Monitor the child's learning and development with detailed reports.</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-icon bg-info text-white">
                                    <i class="fa fa-file-pdf"></i>
                                </div>
                                <div class="timeline-content">
                                    <h4>Step 5: Generate Reports</h4>
                                    <p>Download progress reports in PDF format for review.</p>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-4" href="">Get Started Now <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- How It Works End -->






        <!-- Key Features Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Key Features</h1>
            <p>This web application provides essential tools to support children with intellectual disabilities through activity-based learning and progress tracking.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="classes-item text-center p-4 bg-light rounded">
                    <div class="icon mb-3">
                        <i class="fa fa-brain fa-3x text-primary"></i>
                    </div>
                    <h3 class="text-primary mb-3">Activity-Based Learning</h3>
                    <p>Engaging learning modules focusing on cognitive, auditory, and visual development.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="classes-item text-center p-4 bg-light rounded">
                    <div class="icon mb-3">
                        <i class="fa fa-chart-line fa-3x text-success"></i>
                    </div>
                    <h3 class="text-success mb-3">Progress Tracking</h3>
                    <p>Monitor children's learning activities and analyze their development with visual progress reports.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="classes-item text-center p-4 bg-light rounded">
                    <div class="icon mb-3">
                        <i class="fa fa-language fa-3x text-warning"></i>
                    </div>
                    <h3 class="text-warning mb-3">Bilingual Support</h3>
                    <p>The application is available in both Sinhala and English for accessibility and ease of use.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="classes-item text-center p-4 bg-light rounded">
                    <div class="icon mb-3">
                        <i class="fa fa-file-pdf fa-3x text-danger"></i>
                    </div>
                    <h3 class="text-danger mb-3">Report Generation</h3>
                    <p>Generate detailed PDF reports to review children's progress and share with caregivers or educators.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                <div class="classes-item text-center p-4 bg-light rounded">
                    <div class="icon mb-3">
                        <i class="fa fa-user-shield fa-3x text-info"></i>
                    </div>
                    <h3 class="text-info mb-3">Secure User Management</h3>
                    <p>Admin, parents, and teachers can securely register, log in, and manage user profiles.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="1.1s">
                <div class="classes-item text-center p-4 bg-light rounded">
                    <div class="icon mb-3">
                        <i class="fa fa-desktop fa-3x text-secondary"></i>
                    </div>
                    <h3 class="text-secondary mb-3">Interactive Dashboard</h3>
                    <p>Easily navigate through user-friendly dashboards for activity tracking and monitoring.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">What Our Users Say!</h1>
            <p>Hear from parents, teachers, and caregivers who have benefited from our activity-based learning platform.</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item bg-light rounded p-5">
                <p class="fs-5">"This platform has been a game-changer for my child. The activities are engaging, and the progress tracking helps me see improvements in real time!"</p>
                <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 90px; height: 90px;">
                    <div class="ps-3">
                        <h3 class="mb-1">Sarah Fernando</h3>
                        <span>Parent</span>
                    </div>
                    <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-5">
                <p class="fs-5">"As a special education teacher, I find this tool incredibly useful. The bilingual support makes it easy for my students to interact and learn effectively."</p>
                <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 90px; height: 90px;">
                    <div class="ps-3">
                        <h3 class="mb-1">Michael Perera</h3>
                        <span>Special Education Teacher</span>
                    </div>
                    <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-5">
                <p class="fs-5">"The PDF progress reports are a fantastic feature! I can easily track and share my child's development with their teachers and therapists."</p>
                <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 90px; height: 90px;">
                    <div class="ps-3">
                        <h3 class="mb-1">Nishadi Jayawardena</h3>
                        <span>Caregiver</span>
                    </div>
                    <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->



    

       <!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Photo Gallery -->
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Photo Gallery</h3>
                <div class="row g-2">
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/classes-1.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/classes-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/classes-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/classes-4.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/classes-5.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/classes-6.jpg" alt="">
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Quick Links</h3>
                <a class="btn btn-link text-white-50" href="">Home</a>
                <a class="btn btn-link text-white-50" href="">About Us</a>
                <a class="btn btn-link text-white-50" href="">Contact</a>
                <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                <a class="btn btn-link text-white-50" href="">Terms & Conditions</a>
            </div>

            <!-- Newsletter -->
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Newsletter</h3>
                <p>Stay updated with our latest activities and learning programs. Subscribe now!</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="email" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Subscribe</button>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Get In Touch</h3>
                <p><i class="fa fa-map-marker-alt me-3"></i> Matara, Sri Lanka</p>
                <p><i class="fa fa-phone-alt me-3"></i> +94 77 123 4567</p>
                <p><i class="fa fa-envelope me-3"></i> info@yourwebsite.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">PathBloomers</a>, All Rights Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="">Home</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FAQs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>