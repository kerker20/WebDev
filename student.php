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
            <i class="fas fa-chalkboard-teacher"></i>
          </span>
        </li>
        <li>
          <span onmouseenter="hoverEnter(2)">
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
          <span onmouseenter="hoverEnter(3)">
            <?php $results =  $mysqli->query("SELECT * FROM request WHERE name = '" . $_SESSION['name'] . "' && status = 1 && obtain = 'yes'") or die($mysqli->error); ?>
            <?php $number = mysqli_num_rows($results) ?>
            <?php if ($number <= 0) : ?>
              <i class="fas fa-book"></i>
            <?php else : ?>
              <p style="padding: 2px;background-color:red;border-radius:50%;color:white;height:25px;width:25px;font-size:small;position:absolute;text-align:center;margin-top: -30px;margin-right:50px;"><?php echo $number; ?></p>
              <i class="fas fa-book"></i>
            <?php endif; ?>
          </span>
        </li>
        <li>
          <span onmouseenter="hoverEnter(4)">
            <?php $results =  $mysqli->query("SELECT * FROM request WHERE name = '" . $_SESSION['name'] . "' && status = 0 && obtain = 'no'") or die($mysqli->error); ?>
            <?php $number = mysqli_num_rows($results) ?>
            <?php if ($number <= 0) : ?>
              <i class="fas fa-clock"></i>
            <?php else : ?>
              <p style="padding: 2px;background-color:red;border-radius:50%;color:white;height:25px;width:25px;font-size:small;position:absolute;text-align:center;margin-top: -30px;margin-right:50px;"><?php echo $number; ?></p>
              <i class="fas fa-clock"></i>
            <?php endif; ?>
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
        <div class="card message" style="width: 10rem;height:3rem;position:absolute;background-color:#bfbfbf;margin-top:6rem;margin-left:40rem;">
          <a href="studentReq.php" class="message" style="position: relative;color:white;border:none;background-color:transparent;font-size:small;margin-left:30px;text-decoration:none;margin-top:13px;">View Request <i class="fas fa-sign-out-alt"></i></a>
        </div>
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
            <a href="chat.php" class="message" style="position: relative; margin-top:30px;color:white;border:none;background-color:transparent;font-size:large;margin-left:75px;text-decoration:none;">Message Now <i class="far fa-comments"></i></a>
          </div>
        </div>
      </div>


      <div id="screen_3" class="screen">
        <h2>All Courses</h2>
        <div class="row mt-4">
          <?php $results =  $mysqli->query("SELECT * FROM request WHERE name = '" . $_SESSION['name'] . "' && status = 1 && obtain = 'yes'") or die($mysqli->error); ?>
          <?php $number = mysqli_num_rows($results) ?>
          <?php if ($number <= 0) : ?>
            <img src="./img/found.png" width="600" alt="">
            <p>No Courses Found!</p>
          <?php else : ?>

            <?php while ($row = mysqli_fetch_array($results)) : ?>
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
                        <a class="mt-2" type="submit" name="request" href="#" style="font-size: smaller;" data-toggle="modal" data-target="#courseInfo">Check Course <i class="far fa-eye"></i></i></a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>

        </div>
      </div>
      <div id="screen_4" class="screen">





        <h2>Pending Course(s)</h2>
        <div class="row mt-4">
          <?php $results =  $mysqli->query("SELECT * FROM request WHERE name = '" . $_SESSION['name'] . "' && status = 0 && obtain = 'no'") or die($mysqli->error); ?>
          <?php $number = mysqli_num_rows($results) ?>
          <?php if ($number <= 0) : ?>
            <img src="./img/found.png" width="600" alt="">
            <p>No Courses Found!</p>
          <?php else : ?>

            <?php while ($row = mysqli_fetch_array($results)) : ?>
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
                        <button class="btn btn-danger btn-sm" disabled>Pending... <i class="fas fa-user-clock"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>

          <?php endif; ?>

        </div>



      </div>
      <div id="screen_5" class="screen">
        <div class="row justify-content-center mt-5">
          <div class="card message" style="width: 18rem;height:5rem;position:absolute;background-color:#bfbfbf;margin-top:10rem;">
            <a href="process.php?logout" class="message" style="position: relative; margin-top:30px;color:white;border:none;background-color:transparent;font-size:large;margin-left:100px;text-decoration:none;">Log Out <i class="fas fa-sign-out-alt"></i></a>
          </div>
        </div>
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
<?php } ?>