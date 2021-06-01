<?php
include('process.php');
if (!$_SESSION['name']) {
    header('location: adminlogin.php');
} else {
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,100&display=swap" rel="stylesheet">
        <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
        <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">

        <script>
            document.getElementsByTagName("html")[0].className += " js";
        </script>
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Admin Page</title>
    </head>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .caption {
            font-size: 30px;
            font-weight: bold;
            margin: 25px;
            text-align: center;
        }

        .tr {
            display: flex;
        }

        .td {
            width: 20%;
            border: 1px solid gray;
            padding: 10px;
        }

        .th {
            display: flex;
            background: #7E909A;
            color: white;
        }

        .tr:nth-of-type(even) {
            background: gray;
        }

        @media (max-width: 600px),
        (max-device-width: 600px) {
            .th {
                display: none;
            }

            .tr {
                display: block;
                margin-bottom: 25px;
                background: transparent !important;
            }

            .td {
                background: #484848;
                display: flex;
                width: 90%;
                margin: auto;
            }

            .td:before {
                font-weight: bold;
                display: block;
                width: 50%;
            }


        }

        @media (max-device-width: 600px) {
            .table {
                font-size: 2rem;
            }

            .td {
                padding: 20px;
            }
        }
    </style>

    <body>
        <header class="cd-main-header js-cd-main-header">
            <div class="cd-logo-wrapper">
                <a href="#0" class="cd-logo"><img src="assets/img/cd-logo.svg" alt="Logo"></a>
            </div>

            <div class="cd-search js-cd-search">
                <form>
                    <input class="reset" type="search" placeholder="Search...">
                </form>
            </div>

            <button class="reset cd-nav-trigger js-cd-nav-trigger" aria-label="Toggle menu"><span></span></button>

            <ul class="cd-nav__list js-cd-nav__list">
                <li class="cd-side__item cd-side__item--has-children cd-side__item--notifications js-cd-item--has-children">
                    <a href="#0"><span class="cd-count">3</span></a>
                </li>

                <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">

                    <a href="#0">
                        <img src="https://image.shutterstock.com/image-illustration/anime-looking-beautyfull-sakura-260nw-1880559073.jpg" alt="avatar">
                        <span>Account</span>
                    </a>

                    <ul class="cd-nav__sub-list">


                        <li class="cd-nav__sub-item"><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </header> <!-- .cd-main-header -->

        <main class="cd-main-content">
            <nav class="cd-side-nav js-cd-side-nav">
                <ul class="cd-side__list js-cd-side__list">
                    <li class="cd-side__label"><span>Main</span></li>
                    <li class="cd-side__item cd-side__item--has-children cd-side__item--dashboard cd-side__item--selected js-cd-item--has-children">
                        <a href="admin.php">Dashboard</a>
                    </li>
                    <!-- <li class="cd-side__item cd-side__item--has-children cd-side__item--notifications js-cd-item--has-children">
          <a href="#0">Notifications <span class="cd-count">3</span></a>  
        </li> -->
                </ul>
                <ul class="cd-side__list js-cd-side__list">
                    <li class="cd-side__label"><span>Secondary</span></li>
                    <li class="cd-side__item cd-side__item--has-children cd-side__item--users js-cd-item--has-children">
                        <a href="#0">Users</a>
                        <ul class="cd-side__sub-list">
                            <li class="cd-side__sub-item"><a href="adminteachers.php">Tutors</a></li>
                        </ul>
                    </li>
                </ul>

            </nav>
            <div class="cd-content-wrapper">



                <div class="app-main__outer" id="one">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-home icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>Data Dashboard
                                        <div class="page-title-subheading">Manage and Organize your data effeciently here.
                                            Helps your customer connect
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="container">
                            <div class="row justify-content-center">

                                <div class="card" style="width: 40rem;">
                                    <div class="card-body">
                                        <table class="table table-hover" style="overflow-y: scroll;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Teachers</th>
                                                    <th scope="col">Subjects</th>
                                                    <th scope="col">Student</th>
                                                    <th scope="col">status</th>
                                                    <!-- <th scope="col">Details</th> -->
                                                </tr>
                                            </thead>
                                            <?php $result = $mysqli->query("SELECT * FROM request GROUP BY name, teacher, subjects;") or die($mysqli->error); ?>
                                            <tbody style="overflow-y: scroll;">
                                                <?php while ($row = mysqli_fetch_array($result)) : ?>
                                                    <tr>
                                                        <td><small><?php echo $row['teacher'] ?></small></td>
                                                        <td><small><?php echo $row['subjects'] ?></small></td>
                                                        <td><small><?php echo $row['name'] ?></small></td>
                                                        <td><small><?php echo $row['type'] ?></small></td>
                                                        <!-- <td><button class="btn" id="details"><i class="far fa-eye"></i></button></td> -->
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <br>
                        <a href="detailsteacher.php" class="btn" id="details"><small>Show more details</small> &nbsp;<i class="far fa-eye"></i></a>


                        <script src="assets/js/util.js"></script>
                        <script src="assets/js/menu-aim.js"></script>
                        <script src="assets/js/main.js"></script>
                        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
                        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
                        <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>

                    </div>
        </main>

    </body>

    </html>
<?php } ?>