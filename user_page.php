<?php

@include 'config.php';
@include 'middleware.php';

session_start();

$search = $_GET['search'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style-user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>


<body>

    <?php
    include('header.php');
    ?>

    <div class="container">
        <h1 class="heading">Search</h1>
        <form action="" method="get">
            <div class="d-flex justify-content-center">
                <input type="text" name="search" placeholder="search images" id="search-box">
                <input type="submit" value="submit" class="btn btn-primary btn-lg">
            </div>
        </form>

        <div class="image-container">
            <?php

            if (isset($search)) {
                $getImages = "SELECT * FROM image WHERE name LIKE '%$search%' OR description LIKE '%$search%' ORDER BY created_at DESC";
                $resGetImages = mysqli_query($conn, $getImages);
            } else {
                $getImages = "SELECT * FROM image ORDER BY created_at DESC";
                $resGetImages = mysqli_query($conn, $getImages);
            }


            while ($data = mysqli_fetch_array($resGetImages)) {
                ?>
            <div class="image" data-title="gambar">
                <img src="<?php echo $data['image']; ?>" alt="" data-toggle="modal"
                    data-target="#modalImage<?php echo $data['id']; ?>">
                <div class="modal fade" id="modalImage<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="modal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal"><?php echo $data['name']; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="<?php echo $data['image']; ?>" alt="">
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-primary" href="<?php echo $data['image']; ?>"
                                    download="<?php echo $data['filename']; ?>"><i class="fa fa-download"></i>
                                    DOWNLOAD</a>
                            </div>
                        </div>
                    </div>
                </div>
                <h3>
                    <?php echo $data['name']; ?>
                </h3>
                <h3>
                    <i class="fa fa-heart"></i>
                    <?php
                        $id = $data['id'];
                        $countLikeByImageID = "SELECT count(*) as total_like FROM likes WHERE image_id = '$id'";
                        $resCountLikeByImageID = mysqli_query($conn, $countLikeByImageID);
                        $countData = mysqli_fetch_assoc($resCountLikeByImageID);
                        echo $countData['total_like'];
                        ?>
                </h3>
                <div class="d-flex justify-content-center">
                    <div class="m-2">
                        <a class="btn btn-primary" href="<?php echo $data['image']; ?>"
                            download="<?php echo $data['filename']; ?>"><i class="fa fa-download"></i></a>
                    </div>
                    <div class="m-2">
                        <form method="post" action="like.php">
                            <input class="d-none" name="image_id" value="<?php echo $data['id']; ?>" />
                            <button class="btn btn-danger" name="submit" type="submit"><i
                                    class="fa fa-thumbs-up danger"></i></button>
                        </form>
                    </div>
                </div>

            </div>
            <?php } ?>
        </div>
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>