<!DOCTYPE html>
<html lang="en">

<head>
    <title>MyPrivateTutor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@50;400&display=swap" rel="stylesheet">
    <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">

    <script>
        $(function() {
            $("#signup").click(function() {
                //to get the values of the input feilds
                var name = $("#name").val();
                var email = $("#email").val();
                var pass = $("#pass").val();
                var pass1 = $("#pass1").val();
                if (name == "" && email == "" && pass == "" && pass1 == "") {
                    // to say when email and password feilds are empty	
                    alert("Please Fill Both Feilds...");
                } else {

                    // to send data via ajax to other page
                    $.get("ajax/register.php", {
                        name: name,
                        email: email,
                        pass: pass,
                        pass1: pass1
                    }, function(data) {
                        //to show the response of the other page
                        $("#response").html(data);
                    });
                    // to make the email and pass feilds empty
                    $("#name").val("");
                    $("#email").val("");
                    $("#pass").val("");
                    $("#pass1").val("");
                }
            });
        });
    </script>


</head>

<body>



    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js">
    </script>

    <?php
    include('process.php');
    ?>

    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <a href="home.php"><i class="fas fa-chalkboard-teacher"></i></a>
                                        MyPrivateTutor
                                    </div>
                                    <div class="widget-subheading">
                                        Learn Anywhere you want
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container" style="margin-top: 50px;position:fixed;">

            <div class="row justify-content-center mt-5">
                <div class="card-group">
                    <div class="card bg-transparent" style="margin-left: 100px;height:fit-content;margin-top:40px;">
                        <img src="./img/register.gif" class="card-img-top" alt="..." style="max-width: 450px;">
                    </div>
                    <div class="container" style="max-width: 300px;">

                        <h5 class="card-title text-secondary">Signup<span>
                                <i class="fas fa-chalkboard-teacher"></i>
                            </span></h5><br>
                        <p class="card-text">Your partner Tech-chers</p>
                        <fieldset>
                            <div class="form-group">
                                <input required="" class="form-control" placeholder="Fullname" id="name" type="text" />
                            </div>
                            <div class="form-group">
                                <input required="" class="form-control" placeholder="Email" id="email" value="" type="email" />
                            </div>
                            <div class="form-group">
                                <input required="" class="form-control" placeholder="Password" id="pass" value="" type="password" />
                            </div>
                            <div class="form-group">
                                <input required="" class="form-control" placeholder="Confirm Password" id="pass1" value="" type="password" />
                            </div>
                            <hr />
                            <p align="center">
                                <button type="submit" class="btn btn-secondary" id="signup">Signup <i class="fas fa-sign-in-alt"></i></button>
                            </p>
                            <hr />
                            <div class="container">
                                <div class="alert alert-danger" id="err" role="alert" style="display:none;font-size:small;">
                                    Please Fill Up The Fields!
                                </div>
                            </div>
                            <center>
                                <p style="color: #888; margin: 0px 0px 0px 0px;">Already have an account?</p>
                                <a style="text-decoration:none;" href="login.php" class="text-success">Login</a>
                                <div id="response"></div>
                            </center>
                        </fieldset>

                    </div>
                </div>

            </div>


            <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

        </div>





</body>

</html>