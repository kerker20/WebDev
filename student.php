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
          <i class="fas fa-chalkboard-teacher"></i>
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
              <Strong>Welcome <span><?php echo $_SESSION['name'] ?></span></Strong>
            </h1>
            <br>
            <p>Start learning across the world through technology. No matter where you are, we are reaching you out with education.</p>
            <br><br>
          </div>
        </div>
      </div>
    </div>
    <div id="screen_1" class="screen">
      <form class="form-inline">
        <input class="form-control mr-sm-2" id="myInput" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <h2>Start to Find Your Teachers</h2>
      <div class="row mt-4">
        <?php $result = $mysqli->query("Select * from teacherinfo") ?>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
          <div class="col-md-3 mt-3 ml-5" id="items">
            <div class="card" style="width:230px;height:300px;" id="box">
              <div class="card-body" id="subjects">
                <form action="process.php" method="post">
                  <input type="hidden" name="name" value="<?php echo $_SESSION['name'] ?>">
                  <h6 class="mb-4"><?php echo $row['subjects']; ?> <i class="fas fa-book"></i></h6>
                  <input type="hidden" name="subjects" value="<?php echo $row['subjects']; ?>">
                  <small>payment per hour: <span style="padding: 5px;background-color:rgba(209, 209, 209);color:white;border-radius:50%;">₱&nbsp;<?php echo $row['payment'] ?></span></small><br><br>
                  <input type="hidden" name="payment" value="<?php echo $row['payment']; ?>">
                  <?php if ($row['subjects']  == "History") : ?>
                    <small class="text-muted">The whole series of past events connected something.</small>
                  <?php elseif ($row['subjects']  == "Math") : ?>
                    <small class="text-muted">Math is fun and challenging! Enjoy solving with us!</small>
                  <?php elseif ($row['subjects']  == "Earth and Life Sciences") : ?>
                    <small class="text-muted">Come and Explore the mystery of the Earth and Across!</small>
                  <?php elseif ($row['subjects']  == "Algebra") : ?>
                    <small class="text-muted">Let us play with algebra, various equations and steps!</small>
                  <?php elseif ($row['subjects']  == "Chemistry") : ?>
                    <small class="text-muted">We are happy to see you, working with artificial sunbstances!</small>
                  <?php elseif ($row['subjects']  == "Physics") : ?>
                    <small class="text-muted">Let us follow the steps of the famous scientist.</small>
                  <?php elseif ($row['subjects']  == "Programming") : ?>
                    <small class="text-muted">Learn how computer works and lets your own ideal systems!</small>
                  <?php elseif ($row['subjects']  == "English Communication") : ?>
                    <small class="text-muted">Lets be better to communicate with the universal language!</small>
                  <?php elseif ($row['subjects']  == "Fitnness") : ?>
                    <small class="text-muted">You are healthy with guiding exercises. You can be anyone you like!</small>
                  <?php elseif ($row['subjects']  == "Literature") : ?>
                    <small class="text-muted">Awesome stories around the world in your hands!</small>
                  <?php elseif ($row['subjects']  == "Statistics") : ?>
                    <small class="text-muted">Compute statistically and deepin your understanding abount population!</small>
                  <?php elseif ($row['subjects']  == "Entrepreneurship") : ?>
                    <small class="text-muted">We are happy to engage business with you!</small>
                  <?php endif; ?>

                  <br><br><small class="text-dark"><i class="fas fa-chalkboard-teacher"></i> &nbsp;</small><small><?php echo $row['name'] ?></small>
                  <input type="hidden" name="teacher" value="<?php echo $row['name'] ?>">
                  <?php if ($row['type'] == "one on one") : ?>
                    <br><small class="text-success"><i class="fas fa-user"></i> </small><small><?php echo $row['type'] ?></small>
                    <input type="hidden" name="type" value="<?php echo $row['type'] ?>">
                  <?php elseif ($row['type'] == "group class") : ?>
                    <br><small class="text-success"><i class="fas fa-users"></i> </small><small name="type"><?php echo $row['type'] ?></small>
                    <input type="hidden" name="type" value="<?php echo $row['type'] ?>">
                  <?php endif; ?>
                  <br><small class="text-success"><i class="fas fa-street-view"></i> </small><small name="address"><?php echo $row['address'] ?></small>
                  <input type="hidden" name="address" value="<?php echo $row['address'] ?>">
                  <div class="card-footer bg-transparent">
                    <?php $obtain = $mysqli->query("Select obtain from request where name='" . $_SESSION['name'] . "'"); ?>
                    <button class="btn btn-primary btn-sm mt-2" type="submit" name="request">Request Teacher <i class="fas fa-chalkboard-teacher"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php endwhile; ?>



      </div>
    </div>


    <div id="screen_2" class="screen">
      <h2>Your Archives</h2>

    </div>


    <div id="screen_3" class="screen">
      <h2>All Courses</h2>
      <div class="row mt-4">
        <?php $result = $mysqli->query("Select * from studentrequest") ?>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
          <div class="col-md-3 mt-3 ml-5" id="items">
            <div class="card" style="width:230px;height:250px;" id="box">
              <div class="card-body" id="subjects">
                <form action="process.php" method="post">
                  <h6 class="mb-3"><?php echo $row['subjects']; ?> <i class="fas fa-book"></i></h6>
                  <center> <small style="font-size: x-small;font-weight:100px;" class="text-success">2020 - 2021</small></center>
                  <?php if ($row['subjects']  == "History") : ?>
                    <small class="text-muted">The whole series of past events connected something.</small>
                  <?php elseif ($row['subjects']  == "Math") : ?>
                    <small class="text-muted">Math is fun and challenging! Enjoy solving with us!</small>
                  <?php elseif ($row['subjects']  == "Earth and Life Sciences") : ?>
                    <small class="text-muted">Come and Explore the mystery of the Earth and Across!</small>
                  <?php elseif ($row['subjects']  == "Algebra") : ?>
                    <small class="text-muted">Let us play with algebra, various equations and steps!</small>
                  <?php elseif ($row['subjects']  == "Chemistry") : ?>
                    <small class="text-muted">We are happy to see you, working with artificial sunbstances!</small>
                  <?php elseif ($row['subjects']  == "Physics") : ?>
                    <small class="text-muted">Let us follow the steps of the famous scientist.</small>
                  <?php elseif ($row['subjects']  == "Programming") : ?>
                    <small class="text-muted">Learn how computer works and lets your own ideal systems!</small>
                  <?php elseif ($row['subjects']  == "English Communication") : ?>
                    <small class="text-muted">Lets be better to communicate English!</small>
                  <?php elseif ($row['subjects']  == "Fitnness") : ?>
                    <small class="text-muted">You are healthy with guiding exercises. You can be anyone you like!</small>
                  <?php elseif ($row['subjects']  == "Literature") : ?>
                    <small class="text-muted">Awesome stories around the world in your hands!</small>
                  <?php elseif ($row['subjects']  == "Statistics") : ?>
                    <small class="text-muted">Compute statistically and deepin your understanding abount population!</small>
                  <?php elseif ($row['subjects']  == "Entrepreneurship") : ?>
                    <small class="text-muted">We are happy to engage business with you!</small>
                  <?php endif; ?>

                  <br><br><small class="text-dark"><i class="fas fa-chalkboard-teacher"></i> &nbsp;</small><small><?php echo $row['teacher'] ?></small>
                  <input type="hidden" name="teacher" value="<?php echo $row['name'] ?>">
                  <?php if ($row['type'] == "one on one") : ?>
                    <br><small class="text-success"><i class="fas fa-user"></i> </small><small><?php echo $row['type'] ?></small>
                    <input type="hidden" name="type" value="<?php echo $row['type'] ?>">
                  <?php elseif ($row['type'] == "group class") : ?>
                    <br><small class="text-success"><i class="fas fa-users"></i> </small><small name="type"><?php echo $row['type'] ?></small>
                    <input type="hidden" name="type" value="<?php echo $row['type'] ?>">
                  <?php endif; ?>
                  <div class="card-footer bg-transparent">
                    <a class="mt-2" type="submit" name="request" href="#" style="font-size: smaller;">Check Course <i class="far fa-eye"></i></i></a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php endwhile; ?>



      </div>
    </div>
    <div id="screen_4" class="screen">
      <p> <a class="btn btn-secondary btn-lg" href="process.php?logout">Logout <i class="fas fa-sign-out-alt"></i></a></p>
    </div>
  </div>









  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#items #box").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

</body>

</html>