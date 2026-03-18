<?php
include('../processphp/config.php');

$user_id = $_POST["id"];



    $targetDir = "../main/production/uploads/"; // Directory to store uploaded images
    $targetFile = $targetDir . basename($_FILES["signature"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["signature"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["signature"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["signature"]["tmp_name"], $targetFile)) {
            $signaturePath = $targetDir . $_FILES["signature"]["name"];
            $signaturePath2 = 'uploads/' . $_FILES["signature"]["name"];

            // Update the user's signature path in the denr_users table using PDO
            $sql = "UPDATE denr_users SET uploadSignature = :signaturePath WHERE user_id = :user_id";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':signaturePath', $signaturePath2);
            $stmt->bindParam(':user_id', $user_id);

            if ($stmt->execute()) {
                // Alert after successful upload and update
                echo "<script>alert('File uploaded successfully.');</script>";
                echo "<script>history.back();</script>";

            } else {
                echo "Error updating record.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File validation failed. Please check file type, size, etc.";
    }

?>

