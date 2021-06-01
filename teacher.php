<?php
include('process.php');
if (!$_SESSION['name']) {
  header('location: login.php');
} else {
?>
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

    <div class="menu">
      <ul>
        <li>
          <span onmouseenter="hoverEnter(0)">
            <i class="fas fa-user"></i>
          </span>
        </li>
        <li>
          <span onmouseenter="hoverEnter(1)">
            <i class="fas fa-users"></i>
          </span>
        </li>
        <li>
          <span onmouseenter="hoverEnter(2)">
            <?php $results =  $mysqli->query("SELECT * FROM request WHERE teacher = '" . $_SESSION['name'] . "' && status = 0 && obtain = 'no'") or die($mysqli->error); ?>
            <?php $number = mysqli_num_rows($results) ?>
            <?php if ($number <= 0) : ?>
              <i class="fas fa-bell"></i>
            <?php else : ?>
              <p style="padding: 2px;background-color:red;border-radius:50%;color:white;height:25px;width:25px;font-size:small;position:absolute;text-align:center;margin-top: -30px;margin-right:50px;"><?php echo $number; ?></p>
              <i class="fas fa-bell"></i>
            <?php endif; ?>
          </span>
        </li>
        <li>
          <span onmouseenter="hoverEnter(3)">
            <?php $results =  $mysqli->query("SELECT * FROM msg WHERE teacher = '" . $_SESSION['name'] . "'") or die($mysqli->error); ?>
            <?php $number = mysqli_num_rows($results) ?>
            <?php if ($number <= 0) : ?>
              <i class="fas fa-comments"></i>
            <?php else : ?>
              <p style="padding: 4px;background-color:#45b2ff;border-radius:50%;color:white;height:35px;width:35px;font-size:large;position:absolute;text-align:center;margin-top: -45px;margin-right:50px;"><i class="fas fa-sms"></i></i></p>
              <i class="fas fa-comments"></i>
            <?php endif; ?>
          </span>
        </li>
        <li>
          <span onmouseenter="hoverEnter(4)">
            <i class="fas fa-book"></i>
          </span>
        </li>
        <li>
          <span onmouseenter="hoverEnter(5)">
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
                        <a style="text-decoration: none;color:white;" data-toggle="modal" data-target="#edit" class="btn btn-info mt-3">Edit <i class="fas fa-edit"></i></a>
                        <a style="text-decoration: none;color:white;" data-toggle="modal" data-target="#pass" class="btn btn-info mt-3">Change Password <i class="fas fa-user-edit"></i></a>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="pass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Manage Accout</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <small class="text-success">Redirect to login after changing password</small>
              <form action="process.php" method="post">
                <div class="form-group mt-2">
                  <input type="password" name="pass" placeholder="Enter new password" class="form-control" id="pass">
                </div>
                <div class="form-group mt-2">
                  <input type="password" name="rpass" placeholder="Confirm Password" class="form-control" id="pass">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="password" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>





      <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="process.php" method="post">
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="address" name="address" placeholder="address" class="form-control" value="<?php echo $name ?>" id="address">
                </div>
                <div class="form-group">
                  <label for="contact">Contact Number</label>
                  <input type="contact" name="contact" placeholder="number" class="form-control" id="number">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="update" class="btn btn-primary">Update Changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div id="screen_1" class="screen">

        <h2>Your Students</h2>
        <table class="table table-hover mt-5" style="border: 1px solid #ebebeb;">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Subject</th>
              <th scope="col">Session</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <?php $result = $mysqli->query("SELECT * FROM request WHERE teacher='" . $_SESSION['name'] . "' && status = 1 && obtain='yes'") or die($mysqli->error); ?>
          <tbody id="myTable">
            <?php while ($row = mysqli_fetch_array($result)) : ?>
              <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['subjects'] ?></td>
                <td><a href="chatstudent.php" style="text-decoration: none;" class="btn btn-secondary btn-lg">Initiate Class <i class="fas fa-comments"></i></a></td>
                <td><a href="process.php?dropstud=<?= $row['name'] ?>" class="btn btn-outline-danger btn-lg">Report/Drop <i class="fas fa-ban"></i></a></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>

      </div>

      <style>
        .table-hover>tbody>tr:hover {
          background-color: #f0f0f0;
        }
      </style>

      <div id="screen_2" class="screen">
        <h2>New Student Request</h2>
        <div class="row justify-content-center mt-5">

          <table class="table">

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
                      <?php if ($row['obtain'] == 'yes') : ?>
                        <button class="btn btn-primary btn-lg mr-3" disabled>New Student Accepted <i class="fas fa-user-check"></i></button>
                      <?php else : ?>
                        <a href="process.php?accept=<?= $row['id'] ?>&&name=<?= $row['name'] ?>" class="btn btn-primary btn-sm mr-3">Accept <i class="fas fa-user-check"></i></a>
                        <a href="process.php?refuse=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Refuse <i class="fas fa-ban"></i></a>
                      <?php endif; ?>
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
        <h2>Announcements/Tasks & Assignments</h2>

        <style>
          .message {
            transition: 0.9s;
          }

          .message:hover {
            transform: scale(0.9);
          }
        </style>
        <div class="row justify-content-center mt-5">
          <div class="card message" style="width: 18rem;height:5rem;position:absolute;background-color:#a3cbff;">
            <a href="chatstudent.php" class="message" style="position: relative; margin-top:30px;color:white;border:none;background-color:transparent;font-size:large;margin-left:75px;text-decoration:none;">Message Now <i class="far fa-comments"></i></a>
          </div>
        </div>

      </div>
      <div id="screen_4" class="screen">



        <h2>Posted Course(s)</h2>
        <div class="row mt-4">
          <?php $results =  $mysqli->query("SELECT * FROM teacherinfo WHERE name = '" . $_SESSION['name'] . "' ") or die($mysqli->error); ?>
          <?php $number = mysqli_num_rows($results) ?>
          <?php if ($number <= 0) : ?>
            <img src="./img/found.png" width="600" alt="">
            <p>No Courses Found!</p>
          <?php else : ?>
            <div class="row">
              <?php while ($row = mysqli_fetch_array($results)) : ?>
                <div class="col-md-3 mt-3 ml-5" id="items">
                  <div class="card" style="width:230px;height:230px;" id="box">
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

                        <br><br><small class="text-dark"><i class="fas fa-chalkboard-teacher"></i> &nbsp;</small><small><?php echo $row['name'] ?></small>
                        <br>
                        <center>
                          <a href="process.php?dropcourse=<?= $row['subjects'] ?>" class="btn btn-danger btn-sm mt-3">Drop Course... <i class="fas fa-user-clock"></i></a>
                        </center>
                    </div>
                    </form>
                  </div>
                </div>
            </div>
          <?php endwhile; ?>
        </div>

      <?php endif; ?>

      </div>
      <div id="screen_5" class="screen">
        <div class="row justify-content-center mt-5">
          <div class="card message" style="width: 18rem;height:5rem;position:absolute;background-color:#bfbfbf;margin-top:10rem;">
            <a href="process.php?logoutT" class="message" style="position: relative; margin-top:30px;color:white;border:none;background-color:transparent;font-size:large;margin-left:100px;text-decoration:none;">Log Out <i class="fas fa-sign-out-alt"></i></a>
          </div>
        </div>
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
<?php } ?>