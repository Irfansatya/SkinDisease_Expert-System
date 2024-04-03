<?php

@include 'config.php';
@include 'middleware.php';


$uploadSuccess = 1;
$folderUpload = "images";
$imageFile = (object) @$_FILES['image'];
$fileUpload = "{$folderUpload}/{$imageFile->name}";
$imageFileType = strtolower(pathinfo($fileUpload, PATHINFO_EXTENSION));

if (!is_dir($folderUpload)) {
    mkdir($folderUpload, 0777, $rekursif = true);
}


$imageFile = (object) @$_FILES['image'];

if ($imageFile->size > 1000 * 2000) {
    $error[] = 'File must be lower than 1MB!';
    $uploadSuccess = 0;
}

$allowFileType = array("jpg", "jpeg", "png", "gif");
$isValidFileType = in_array($imageFileType, $allowFileType);
if (!$isValidFileType) {
    $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
    $uploadSuccess = 0;
}

if ($uploadSuccess == 1) {
    $randName = uniqid("IMAGE_");
    $newFilename = "{$randName}.{$imageFileType}";
    $newFileUpload = "{$folderUpload}/{$newFilename}";
    $resUploadFile = move_uploaded_file($imageFile->tmp_name, $newFileUpload);
    if ($resUploadFile) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $filename = $newFilename;
        $fileSize = $imageFile->size;
        $image = $newFileUpload;
        $insertImage = "INSERT INTO image(name, description, filename, file_size, image) VALUES('$name','$description','$filename',$fileSize,'$image')";
        mysqli_query($conn, $insertImage);
    }
}
mysqli_close($conn);
?>