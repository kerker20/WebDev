<table class="table table-borderless">
    <div class="row">
        <?php
        include('../process.php');
        $query = mysqli_query($mysqli, "select * from request where teacher = '" . $_SESSION['name'] . "' && status=1 && obtain='yes'");
        while ($data = mysqli_fetch_array($query)) {
            $n = ucwords($data['name']);
            $u = $data['name'];
        ?>
            <tbody style="overflow-y:scroll;height:600px;">
                <tr>
                    <td>
                        <p class="mt-3"><?php echo $n; ?></p>
                    </td>
                    <td>
                        <a style="text-decoration:none;" class="btn btn-outline-info btn-lg" href="studentmessage.php?users=<?php echo $n ?>">Message <i class="far fa-comment-dots"></i></small>
                    </td>
                </tr>
                </a>
            <?php } ?>
    </div>
    </tbody>
</table>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>