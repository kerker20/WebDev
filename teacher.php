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

<body>

  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js">
  </script>

  <?php
  include('process.php');
  ?>
  <div class="menu">
    <ul>
      <li>
        <span onmouseenter="hoverEnter(0)">
          <i class="fas fa-user"></i>
        </span>
      </li>
      <li>
        <span onmouseenter="hoverEnter(1)">
          <i class="fas fa-user-graduate"></i>
        </span>
      </li>
      <li>
        <span onmouseenter="hoverEnter(2)">
          <i class="fas fa-bell"></i>
        </span>
      </li>
      <li>
        <span onmouseenter="hoverEnter(3)">
          <i class="fas fa-book"></i>
        </span>
      </li>
      <li>
        <span onmouseenter="hoverEnter(4)">
          <i class="fas fa-sign-out-alt"></i>
        </span>
      </li>
      <span class="goo-index" id="goo-index"></span>
    </ul>
  </div>

  <div class="content-wrapper" style="overflow: scroll;">
    <div id="screen_0" class="screen visible">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <img src="./img/Studying.gif" width="600px" style="margin-top: 15%" alt="Responsive image" style="position: absolute;">
          </div>
          <div class="col-lg-6" style="margin-top:9%;float: right;">
            <h1>
              <Strong>Welcome <?php echo $_SESSION['name'] ?>!</Strong>
            </h1>
            <br>
            <p>Start Teaching children across the world through online. No matter where you are, we are reaching you out with education.</p>
            <br><br>
          </div>
          <div class="row justify-content-center">

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Subjects</th>
                  <th scope="col">Address</th>
                  <th scope="col">Contact Number</th>
                  <th scope="col">Customize</th>
                </tr>
              </thead>
              <tbody id="myTable">

                <?php $result = $mysqli->query("Select * from teacherinfo where name='" . $_SESSION['name'] . "'") ?>
                <?php while ($row = mysqli_fetch_array($result)) : ?>
                  <tr>
                    <td>
                      <p><?php echo $row['name'] ?></p>
                    </td>
                    <td>
                      <p><?php echo $row['subjects'] ?></p>
                    </td>
                    <td>
                      <p><?php echo $row['address'] ?></p>
                    </td>
                    <td>
                      <p><?php echo $row['contact'] ?></p>
                    </td>
                    <td>
                      <a href="../public/studentList.html" class="btn btn-info">Edit <ion-icon name="create-outline"></ion-icon></a>
                    </td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div id="screen_1" class="screen">

      <h2>Your Students</h2>
      <table class="table table-hover mt-5">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Subject</th>
            <th scope="col">Status</th>
            <th scope="col">Session</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody id="myTable">

          <tr>
            <td>
              <p>Juan Enciso</p>

            </td>
            <td>
              <p>Math</p>

            </td>
            <td>
              <button class="btn btn-info btn-sm">Online <ion-icon name="radio-button-on-outline"></ion-icon></button>
            </td>
            <td>
              <a href="../public/studentList.html"><button class="btn btn-success" id="class">Initiate Class</button></a>

            </td>
            <td>
              <a href="../public/studentList.html" class="btn btn-outline-info">Message <ion-icon name="mail-unread-outline"></ion-icon></a>
              <a href="../public/studentList.html" class="btn btn-danger">End Contract <ion-icon name="trash-outline"></ion-icon></a>
            </td>
          </tr>

        </tbody>
      </table>

    </div>


    <div id="screen_2" class="screen">
      <h2>New Student Notifications</h2>
      <div class="row justify-content-center mt-5">

        <table class="table table-hover">

          <tbody id="myTable">

            <?php $result = $mysqli->query("Select * from request where teacher='" . $_SESSION['name'] . "'") ?>
            <?php while ($row = mysqli_fetch_array($result)) : ?>
              <tr>
                <td>
                  <p><?php echo $row['name'] ?></p>
                </td>
                <td>
                  <p><?php echo $row['subjects'] ?></p>
                </td>
                <td>
                  <p><?php echo $row['address'] ?></p>
                </td>
                <td>
                  <p>
                    <a href="process.php?accept=<?= $row['id'] ?>&&name=<?= $row['name'] ?>" class="btn btn-primary btn-sm mr-3">Accept <i class="fas fa-user-check"></i></a>
                    <a href="../public/studentList.html" class="btn btn-danger btn-sm">Refuse <i class="fas fa-ban"></i></a>
                  </p>
                </td>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>



    <div id="screen_3" class="screen">
      <h2>Help Other To Get The Same</h2>

    </div>
    <div id="screen_4" class="screen">
      <p> <a class="btn btn-secondary btn-lg" href="process.php?logout">Logout <i class="fas fa-sign-out-alt"></i></a></p>
    </div>
  </div>
  <script>
    let gooIndex = document.getElementById('goo-index');
    let hoverEnter = index => {
      gooIndex.style.top = 100 * index + 'px';
      let allScreens = document.querySelectorAll('.screen');
      allScreens.forEach(e => {
        e.classList.remove('visible')
      })
      let nowVisible = document.getElementById('screen_' + index);
      nowVisible.classList.add('visible');
    }
  </script>

</body>

</html>