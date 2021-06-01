<?php
include('process.php');
if (!$_SESSION['name1']) {
    header('location: login.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Messenger</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    </head>

    <body onload="content_load()">

        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js">
        </script>


        <nav class="navbar navbar-dark bg-dark p-3">
            <form class="form-inline">
                <a href="teacher.php">
                    <ion-icon size="large" name="log-out-outline" style="color:white;"></ion-icon>
                </a>
            </form>
        </nav>

        <style>
            .contents::-webkit-scrollbar {
                display: none;
            }

            .contents {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>


        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="card contents" style="width: 30rem;height:20rem;overflow-y: scroll;">
                    <div class="card-body contents card-lg" id="body" align="center" style="overflow-y: scroll;">

                    </div>
                    <div id="response"></div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="card" style="width: 25rem;">
                    <textarea class="form-control" id="msg" rows="3" placeholder="Enter your message..." style="resize:none;"></textarea>
                </div>
            </div>
        </div>
        <button style="margin-left:35.5%;" type='submit' class='btn btn-info btn-sm mt-3' id='send'>Send <i class="fas fa-paper-plane"></i></button>
        <style>
            #body {
                overflow-y: scroll;
            }
        </style>


        <?php $_SESSION['rece'] = $_GET['users'];
        ?>
        <script>
            $(function() {
                $("#send").click(function() {

                    var msg = $("#msg").val();
                    var rece = "<?php echo $_GET['users']; ?>";
                    if (msg == "") {

                        alert("Please Enter Message...");
                    } else {

                        $.get("./ajax/studentmessage.php", {
                            msg: msg,
                            rece: rece
                        }, function(data) {

                            $("#response").html(data);
                            location.reload();
                        });
                        $("#msg").val("");
                    }
                });
            });

            function content_load() {
                $(function() {
                    $.get("ajax/studentmsg.php", function(data) {
                        $(".contents").html(data);

                    });
                });
            }
            setInterval(function() {
                content_load()
            }, 1000);
        </script>

        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            const chatMessages = document.querySelector('.contents');
            chatMessages.scrollTop = chatMessages.scrollHeight;
        </script>
    </body>

    </html>
<?php } ?>