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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('includes/css/jquery.bootgrid.css')?>">
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
            <ul class="nav navbar-nav pull-right">
                <li><a href="../login">Voltar</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <?php
        if($erro != '' || !isset($erro)){
            echo '<p class="bg-danger">'.$erro.'</p>';
        }
    ?>
    <form class="form-horizontal" action="crud_lutador?op=A" method="post">
        <input name="id" id="id" type="hidden" value="">
        <fieldset>

            <!-- Form Name -->
            <legend>Incluir Novo Personagem</legend>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">Selecione a Ra&ccedil;a</label>
                <div class="col-md-4">
                    <select id="raca" name="raca" class="form-control">
                        <option value="HUMANO">Humano</option>
                        <option value="ORC">Orc</option>
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Nome do Personagem</label>
                <div class="col-md-4">
                    <input id="nome" name="nome" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                <div class="col-md-8">
                    <input type="submit" value="Gravar" class="btn btn-success">
                    <input type="reset" value="Cancelar" class="btn btn-danger">
                </div>
            </div>

        </fieldset>
    </form>

    <hr>
    <table id="grid" class="table table-condensed table-hover table-striped">
        <thead>
        <tr>
            <th data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
            <th data-column-id="nome">Nome</th>
            <th data-column-id="raca">Ra&ccedil;a</th>
            <th data-column-id="link" data-formatter="link"></th>
        </tr>
        </thead>
        <tbody>
        <?php echo $table ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="<?php echo base_url('includes/js/jquery.bootgrid.js')?>"></script>
<script src="<?php echo base_url('includes/js/admin.js')?>" crossorigin="anonymous"></script>
</body>
</html>