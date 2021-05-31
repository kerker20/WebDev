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
    <link rel="stylesheet" href="./css/extent.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

</head>

<body onload="content_load()">
    <style>
        #teachers::-webkit-scrollbar {
            display: none;
        }

        #teachers {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card" id="teachers" style="width: 25rem;height:20rem;overflow-y:scroll;">
                <h6 align="center" class="mt-3 text-success">Your Current Teachers</h6>
                <div class="card-body" align="center">
                    <div class="container contents">

                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <script>
        function content_load() {
            $(function() {
                $.get("./ajax/users.php", function(data) {
                    $(".contents").html(data);
                });
            });
        }
        setInterval(function() {
            content_load()
        }, 2000);
    </script>
</body>

</html>