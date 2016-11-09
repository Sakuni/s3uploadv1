<?php
header( "refresh:8;url=index.php" );

include('image_check.php');
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/

if($_SERVER['REQUEST_METHOD'] == "POST")
{

    // Insert the images to our bucket
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $tmp = $_FILES['file']['tmp_name'];
    $ext = getExtension($name);

    if(strlen($name) > 0) {
        if(in_array($ext,$valid_formats)) {
            if($size<(1024*1024)) {
                include('s3_config.php');
//Rename image name.
                $actual_image_name = time().".".$ext;
                if($s3->putObjectFile($tmp, $bucket , $actual_image_name, S3::ACL_PUBLIC_READ) )
                {
                    $msg = "S3 Upload Successful.";
                    $s3file='http://'.$bucket.'.s3.amazonaws.com/'.$actual_image_name;
                    echo "<img src='$s3file' style='max-width:400px'/><br/>";
                    echo $msg.'<br/>';
                    echo '<b>S3 File URL:</b>'.$s3file.'<br/>';

                } else
                    $msg = "S3 Upload Fail.";


            } else
                $msg = "Image size Max 1 MB";

        } else
            $msg = "Invalid file, please upload image file.";

    } else
        $msg = "Please select image file.";
//db name form
    $link = mysqli_connect("localhost", "root", "", "form");

// Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

// Escape user inputs for security
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $email = mysqli_real_escape_string($link, $_POST['email']);


// attempt insert query execution table user_form
    $sql = "INSERT INTO user_form (name, email, img_id) VALUES ('$name', '$email','$actual_image_name')";


    if(mysqli_query($link, $sql)){
        echo "Records added to db successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
//print_r($_POST);
// close connection
    mysqli_close($link);

}


?>