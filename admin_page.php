<?php

@include 'config.php';
@include 'middleware.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>


<body>

    <?php
    include('header.php');
    ?>

    <div class="container">

        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modalUpload">
                    Upload Gambar
                </button>

                <div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true" width="100%">
                    <div class="form-container">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Upload Gambar</h4>
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                </div>
                                <form action="upload_image.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <?php
                                        if (isset($error)) {
                                            foreach ($error as $error) {
                                                echo '<span class="error-msg">' . $error . '</span>';
                                            }
                                        }
                                        ?>
                                        <input type="text" name="name" required placeholder="Enter image name">
                                        <input type="text" name="description" required
                                            placeholder="Enter image description">
                                        <input type="file" name="image">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="image-container">
            <?php

            $getImages = "SELECT * FROM image ORDER BY created_at DESC";
            $resGetImages = mysqli_query($conn, $getImages);

            while ($data = mysqli_fetch_array($resGetImages)) {
                ?>
            <div class="image" data-title="ayaka">
                <img src="<?php echo $data['image']; ?>" alt="">
                <h3>
                    <?php echo $data['name']; ?>
                </h3>
            </div>
            <?php } ?>
        </div>
    </div>
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>