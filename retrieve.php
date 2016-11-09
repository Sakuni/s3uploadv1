<?php

include('s3_config.php');
/**
 * Created by IntelliJ IDEA.
 * User: Sakuni.Manamendra
 * Date: 11/8/2016
 * Time: 4:52 PM
 */

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $link = mysqli_connect("localhost", "root", "", "form");

// Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $email = mysqli_real_escape_string($link, $_POST['email1']);

    $qry = "SELECT img_id FROM user_form WHERE email = '$email'";

    if(mysqli_query($link, $qry)){

        $retrieve = mysqli_query($link, $qry);
        $result = mysqli_fetch_all($retrieve);
        //   print_r($result);
        if($result==null){
            echo "No user registered for the email   ".$email; exit;
        }
        //echo "Records retrieved successfully.";
        echo "\n"."Records retrieved for ".$email;

        for($j = 0; $j < count($result); $j++) {
            $all_img[] = implode(',', $result[$j]);
        }

        foreach ($all_img as $aa) {
            //print "<br/>\n".$aa;
            $furl = "http://imageupload-1234.s3.amazonaws.com/".$aa;
            echo "<br /><a href=\"$furl\">$aa</a>";
        }
    } else{
        echo "ERROR: Could not able to execute $qry. " . mysqli_error($link);

    }

    mysqli_close($link);

// Get the contents of our bucket
//    $bucket_contents = $s3->getBucket($bucket);
//    echo ""."<br />"."<br />"."View All images in the bucket";
//    foreach ($bucket_contents as $file){
//        $fname = $file['name'];
//        $furl = "http://imageupload-1234.s3.amazonaws.com/".$fname;
//
//        //output a link to the file
//        echo "<br /><a href=\"$furl\">$fname</a>";
//    }
}

?>