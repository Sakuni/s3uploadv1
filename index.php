<?php


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Upload Files to Amazon S3 PHP</title>
    <link rel='stylesheet' type='text/css' href='bootstrap/dist/css/bootstrap.min.css'>.
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form class="form-horizontal" action="insert.php" method='post' enctype="multipart/form-data">
                <h3>Upload image files to Amazon s3 here</h3><br/>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control col-md-4" name="name" id="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                </div>
                <!--                Submit-->
                <div style='margin:10px'>
                    <input type='file' name='file' class="btn btn-default" required /> <br>
                    <input type='submit' value='Upload Image' class="btn btn-primary"/>
                </div>
            </form>

            <!--                Retrieve-->
            <form class="form-horizontal" action="retrieve.php" method='post' enctype="multipart/form-data">
                <h3>Retrieve image files from Amazon s3 here</h3><br/>
                <div class="form-group">
                    <label for="email1" class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="email1" id="email1" required>
                    </div>
                </div>
                <div style='margin:10px'>
                    <input type='submit' value='Retrieve Images' class="btn btn-primary" name="submit"/>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script src="jquery/dist/jquery.min.js"></script>

</body>
</html>
