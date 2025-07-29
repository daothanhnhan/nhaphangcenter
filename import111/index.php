<?php

/*
Developer: Ehtesham Mehmood
Site:      PHPCodify.com
Script:    Import Excel to MySQL using PHP and Bootstrap
File:      index.php
*/

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Import Excel to MySQL using PHP and Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body style="padding-top:50px;">

<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Import Excel to MySQL</h3>
                </div>
                <div class="panel-body">

                    <form method="post" action="import.php" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                              <input type="file" name="file"/>
                            </div>
                        <input class="btn btn-success" type="submit" name="submit_file" value="Submit"/>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
