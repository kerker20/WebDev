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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    tr:hover {
        background-color: rgba(245, 245, 245);
    }
</style>

<body>
    <?php include_once 'process.php' ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="card" id="alert" style="width: 20rem;position:absolute;margin-top:30rem;display:none;">
                <div class="card-body">
                    <p class="text-success">Your request successfully Canceled! <i class="far fa-thumbs-up"></i></p>
                </div>
            </div>
            <div class="card mt-5" style="width: 60rem;height:fit-content">
                <div class="card-body">
                    <?php $result = $mysqli->query("SELECT * FROM request WHERE name='" . $_SESSION['name'] . "'") ?>

                    <table class="table table-borderless">
                        <thead>
                            <tr class="bg-light">
                                <th scope="col">Teacher</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Payment per Hour</th>
                                <th scope="col">Type of Class</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <td><?php echo $row['teacher'] ?>
                                        <br><small><a href="process.php?cancel=<?= $row['id'] ?>" class="text-secondary" id="cancel">cancel request</a></small>
                                    </td>
                                    <td><?php echo $row['subjects'] ?></td>
                                    <td><?php echo $row['payment'] ?></td>
                                    <td><?php echo $row['type'] ?></td>
                                    <td>
                                        <?php if ($row['status'] == 0) : ?>
                                            <small class="text-danger">Waiting for response... <i class="far fa-clock"></i></small>
                                        <?php else : ?>
                                            <small class="text-success">Your request has been approved!</small>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>



    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</body>

</html>