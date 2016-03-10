<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login RPG</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('includes/css/login.css')?>">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Humanos vs Orcs</a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            </ul>
            <form id="signin" class="navbar-form navbar-right" role="form" target="_self" action="admin" method="post">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="email" type="text" class="form-control" name="login" value="" placeholder="Email Address">
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control" name="senha" value="" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>

        </div>
    </div>
</nav>
<div class="container">
     <div class="col-md-12" style="margin-top: 50px">
         <h3>Selecione os Lutadores</h3>
         <div class="form-inline">
             <div class="form-group">
                 <label for="exampleInputName2">Humano :</label>
                 <select class="form-control" id="selHumano"><?php echo $options_h?></select>
             </div>&nbsp;&nbsp;&nbsp;&nbsp;
             <div class="form-group">
                 <label for="exampleInputEmail2">Orc</label>
                 <select class="form-control" id="selOrc"><?php echo $options_o?></select>
             </div>
             <button class="btn btn-default" id="btnLuta">Lutar</button>
         </div><br><br>
    </div>
    <hr>
    <div  class="col-md-12 back">
        <img src="<?php echo base_url('includes/img/Hero_m.png')?>" class="pull-left" style="padding-top: 30%;padding-left: 50px">
        <img src="<?php echo base_url('includes/img/Orc.png')?>" class="pull-right" style="padding-top: 30%;padding-right: 50px">
        <div class="alert alert-info" role="alert"></div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="<?php echo base_url('includes/js/login.js')?>" crossorigin="anonymous"></script>
</body>
</html>