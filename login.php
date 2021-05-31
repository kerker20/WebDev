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
    <link rel="stylesheet" href="./css/style.css">
    <style>
        input:focus,
        input.form-control:focus {
            border: 2px rgba(145, 135, 238, 1) solid;
            outline: none !important;
            outline-width: 0 !important;
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
        }
    </style>



    <script>
        $(function() {

            $("#login").click(function() {
                var email = $("#email").val();
                var pass = $("#pass").val();

                if (email == "" && pass == "") {

                    alert("Please Fill Up the Field...");
                } else if (email == "") {

                    alert("Please Enter Email...");
                } else if (pass == "") {

                    alert("Please Enter Password...");
                } else {

                    $.get("ajax/login.php", {
                        email: email,
                        pass: pass
                    }, function(data) {

                        $("#response").html(data);
                    });

                    $("#email").val("");
                    $("#pass").val("");
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


        <div class="container ml-5" style="margin-top: 100px;position:fixed;">

            <div class="row justify-content-center mt-5">
                <div class="card-group">
                    <div class="card bg-transparent login-image">
                        <img src="./img/login.gif" class="card-img-top" alt="..." style="max-width: 350px;">
                    </div>
                    <div class="container" style="max-width: 300px;">

                        <h5 class="card-title text-primary">Login<span>
                                <ion-icon size="large" name="person-circle-outline"></ion-icon>
                            </span></h5><br>
                        <p class="card-title">Your partner Tech-chers</p>
                        <p class="card-text text-muted">Engage yourself in modern learning platform.</p>
                        <fieldset>
                            <div class="form-group">
                                <input required="" class="form-control" placeholder="Email" id="email" type="text" />
                            </div>
                            <div class="form-group">
                                <input required="" class="form-control" placeholder="Password" id="pass" value="" type="password" />
                            </div>
                            <hr />
                            <p align="center">
                                <button type="submit" class="btn btn-primary" id="login">login <ion-icon name="log-in-outline"></ion-icon></button>
                            </p>
                            <hr />
                            <div class="container">
                                <div class="alert alert-danger" id="err" role="alert" style="display:none;font-size:small;">
                                    Please Fill Up The Fields!
                                </div>
                            </div>
                            <center>
                                <p style="color: #888; margin: 0px 0px 0px 0px;">Don't have an account yet?</p>
                                <a style="text-decoration:none;" href="register.php">Create an account</a>
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