<?php
include('../process.php');
$sen = $_SESSION['name'];
$rec = $_SESSION['rece'];
$check = ucwords($_SESSION['name']);
$i = 0;
$query = mysqli_query($mysqli, "select * from msg where user='$sen' && teacher='$rec' || user='$rec' && teacher='$sen' order by 1 ASC ") or die($mysqli->error);
$date = date('Y/m/d');
if (mysqli_num_rows($query) > 0) {
    while ($data = mysqli_fetch_array($query)) {
        $id = $data['id'];
        $u = ucwords($data['user']);
        $m = $data['msg'];
        $i++;
?>


        <?php if ($u == $check) : ?>
            <a class="mr-3 scroll" style="text-decoration:none; color:#222;">
                <br>
                <small style="font-size: x-small;float:right;margin-top:-15px;">You - <?php echo $date ?></small>
                <p class="text-right mt-3"><span style="padding:10px;border-radius:5rem;background-color:#a3a3a3;color:white;" id="<?php echo $i ?>" value="<?php echo $id ?>"><?php echo $m ?></span></p>
            </a>
        <?php else : ?>
            <a class="ml-3 scroll" style="text-decoration:none; color:#222;">
                <br>
                <small style="font-size: x-small;"><?php echo $u ?> - <?php echo $date ?></small>
                <p class="text-left mt-3"><span style="padding:10px;border-radius:5rem;background-color:#8cb6ff;color:white;" id="<?php echo $i ?>" value="<?php echo $id ?>"><?php echo $m ?></span></p>
            </a>
        <?php endif; ?>
        <script>
            $("#<?php echo $i ?>").click(function() {
                var id = $("#<?php echo $i ?>").attr("value");
                if (confirm('Do you want to delete ?') == true) {
                    $.get("ajax/del.php", {
                        id: id
                    }, function(data) {});
                }
            });
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php }
} else { ?>
    <center>
        <p class="lead">Please Refresh the Page</p>
    </center>
    <div class="row justify-content-center">
        <img src="./img/found.png" width="250" alt="">
    </div>
<?php } ?>