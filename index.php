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

        <div class="container" style="margin-top: 20px;position:relative;">

            <div class="row justify-content-center mt-5">

                <div class="card" style="width: 35rem;">
                    <div class="card-body">
                        <h5 class="card-title mb-5">Please Fill Up the Fields</h5>



                        <form action="process.php" method="post">
                            <div class="form-group">
                                <input type="hidden" name="username" value="<?php echo $_SESSION['name'] ?>">
                                <label for="subjects"><strong>Specified Subject: </strong></label>
                                <select name="subjects" class="bg-transparent" value="Math" id="room" style="border:none;">
                                    <option value="Math">Math</option>
                                    <option value="Earth and Life Science">Earth and Life Science</option>
                                    <option value="Algebra">Algebra</option>
                                    <option value="Chemistry">Chemistry</option>
                                    <option value="Pyschics">Pyschics</option>
                                    <option value="Programming">Programming</option>
                                    <option value="English Communication">English Communication</option>
                                    <option value="History">History</option>
                                    <option value="Fitnness">Fitnness</option>
                                    <option value="Literature">Literature</option>
                                    <option value="Statistics">Statistics</option>
                                    <option value="Entrepreneurship">Entrepreneurship</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Please select your class type:</strong><br>
                                <br><input type="radio" id="one" name="type" value="one on one">
                                <label for="one">One-One Class</label><br>
                                <input type="radio" id="group" name="type" value="group class">
                                <label for="group">Group Class</label><br>
                                <div class="form-group">
                                    <label for="pay"><strong>Payment per Hour</strong></label>
                                    <input type="number" name="payment" class="form-control" id="pay">
                                </div>
                                <div class="form-group">
                                    <label for="pay"><strong>Address</strong></label>
                                    <input type="address" name="address" class="form-control" id="address">
                                </div>
                                <div class="form-group">
                                    <label for="contact"><strong>Contact Number</strong></label>
                                    <input type="contact" name="contact" class="form-control" id="contact">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Proceed</button>
                        </form>

                    </div>
                </div>

            </div>

        </div>

        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    </div>

</body>

</html>