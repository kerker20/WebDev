<!DOCTYPE html>
<html lang="en">

<head>
    <title>MyPrivateTutor</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/style1.css" />
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="./js/map.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

</head>

<body>



    <section id="div" style="display: block;">

        <nav class="navbar navbar-expand-lg navbar-light p-4 box--transparent-1 ">
            <a class="navbar-brand" href="../public/index.html" style="margin-left: 50px"><strong>MyPrivateTutor</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="margin-left:30%">
                    <li class="nav-item active">
                        <a class="nav-link text-dark" href="#">Help<span></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="admin.php">Admin</a>
                    </li>
                    &nbsp;&nbsp;
                    <li class="nav-item">
                        <a href="login.php"><button class="btn btn-outline-secondary" style="font-size: large" type="submit">
                                Become a Tutor
                            </button></a>
                    </li>
                    &nbsp;&nbsp;
                    <li class="nav-item">
                        <a href="studentlogin.php"><button id="btn" class="btn btn-secondary" style="margin-right: 200px; font-size: large" type="submit">
                                Request a Tutor
                            </button></a>
                    </li>
                </ul>
            </div>
        </nav>
        <br>

        <div class="container">
            <div class="row">
                <div class="col-lg-6" style="margin-top: 11%">
                    <h1>
                        <strong>Find the best tutor in the Philippines</strong>
                    </h1>
                    <br>
                    <p>
                        Crack exams, learn new skills, improve grades with the help of great teachers. Post your learning needs and let qualified tutors get in touch with you.
                    </p>
                    <br />
                    <a href="studentlogin.php"><button id="btn" class="btn btn-secondary btn-lg" style="margin-right: 200px; font-size: large;" type="submit">
                            Start Learning Now!
                        </button></a>
                </div>
                <div class="col-lg-6">
                    <img src="./img/teach.gif" width="600px" style="margin-top: 6%;" alt="Responsive image" />
                </div>
            </div>
        </div>
        <br /><br /><br />
        <div class="container" style="margin-top: 10%;">
            <center>
                <h3><strong>How it works for students/parents?</strong></h3>
            </center>
        </div>
        <br /><br />
        <div class="container">
            <div class="row justify-content-center">
                <section id="Hover_con">
                    <div class="container">
                        <div class="row">
                            <div class="hover_content_block col-sm-4" style="background-image: url()">
                                <div class="overlay-darker"></div>
                                <div class="overlay"></div>
                                <div class="Hover_con_text">
                                    <img src="./img/loupe.png" class="img-fluid" alt="Responsive image" style="width: 70px" />
                                    <p class="lead mt-4">Post your learning needs</p>
                                    <p id="p">
                                        Post your tutor requirements. Our experts will analyze it and make it live on our job board.
                                    </p>
                                    <br />
                                </div>
                            </div>
                            <div class="hover_content_block col-sm-4">
                                <div class="overlay-darker"></div>
                                <div class="overlay"></div>
                                <div class="Hover_con_text">
                                    <img src="./img/checklist.png" class="img-fluid" alt="Responsive image" style="width: 75px" />
                                    <p class="lead mt-4">Get up to 10 tutor applications</p>
                                    <p id="p">
                                        You'll receive the ten best tutors applications in your account within 48 hours closely matching to your requirements.
                                    </p>
                                </div>
                            </div>
                            <div class="hover_content_block col-sm-4" style="background-image: url()">
                                <div class="overlay-darker"></div>
                                <div class="overlay"></div>
                                <div class="Hover_con_text">
                                    <img src="./img/handshake.png" class="img-fluid" alt="Responsive image" style="width: 95px" />
                                    <p class="lead mt-4">Select tutors & start learning</p>
                                    <p id="p">
                                        Choose the best tutor applications. Request the selected Tutors for trial sessions before hiring for regular classes. Give us your feedback.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <br /><br /><br />

        <br />

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="./img/1.gif" width="600px" alt="Responsive image" />
                </div>
                <div class="col-lg-5 ml-auto" style="margin-top: 18%">
                    <h1>
                        <strong>Teach what you love</strong>
                    </h1>
                    <p>Join other professionals who earn doing what they love.</p>
                    <br />
                    <a href="login.php" id="btn" class="btn btn-secondary btn-lg" style="text-decoration: none;">
                        Become a Tutor
                    </a>
                </div>
            </div>
        </div>



        <div id="map-container-google-3" class="z-depth-1-half map-container-3">
            <iframe src="https://maps.google.com/maps?ll=10.3746488,123.9192077&q=Talamban Road&t=&z=11&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>undefined<a href="undefined">undefined</a>undefined
        </div>

        </iframe>
        </div>

        <footer class="new_footer_area bg_color">
            <div class="new_footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="f_widget company_widget wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                                <h3 class="f-title f_600 t_color f_size_18">Get in Touch</h3>
                                <p>Don’t miss any updates from our Tutor Hunt Website!</p>
                                <form action="#" class="f_subscribe_two mailchimp" method="post" novalidate="true" _lpchecked="1">
                                    <input type="text" name="EMAIL" class="form-control memail" placeholder="Email">
                                    <button class="btn btn-secondary mt-5" type="submit">Subscribe</button>
                                    <p class="mchimp-errmessage" style="display: none;"></p>
                                    <p class="mchimp-sucmessage" style="display: none;"></p>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                                <h3 class="f-title f_600 t_color f_size_18">Partner Company</h3>
                                <ul class="list-unstyled f_list">
                                    <li><a href="#">Clees Choice</a></li>
                                    <li><a href="#">KerkerGym</a></li>
                                    <li><a href="#">ShelleyCollection</a></li>
                                    <li><a href="#">Dimagool</a></li>
                                    <li><a href="#">Chanel</a></li>
                                    <li><a href="#">GMA</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                                <h3 class="f-title f_600 t_color f_size_18">Help</h3>
                                <ul class="list-unstyled f_list">
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Term &amp; conditions</a></li>
                                    <li><a href="#">Reporting</a></li>
                                    <li><a href="#">Documentation</a></li>
                                    <li><a href="#">Support Policy</a></li>
                                    <li><a href="#">Privacy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                                <h3 class="f-title f_600 t_color f_size_18">Team Solutions</h3>
                                <div class="f_social_icon">
                                    <a href="#" class="fa fa-facebook"></a>
                                    <a href="#" class="fa fa-twitter"></a>
                                    <a href="#" class="fa fa-linkedin"></a>
                                    <a href="#" class="fa fa-pinterest"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_bg">
                    <div class="footer_bg_one"> </div>
                    <div class="footer_bg_two"></div>
                </div>
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-7">
                        <small class="mb-0 f_400">© 2021 All rights Reserved.</small>
                    </div>
                    <div class="col-lg-6 col-sm-5 text-right">
                        <small>Made with <i class="icon_heart"></i>Love by <a href="#">Kerwien,Leslie,Jesselle & Elizabeth</a></small>
                    </div>
                </div>
            </div>
        </footer>
        </div>
    </section>
</body>

</html>