<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Adauga Pacient</h4>



<div class="row">
    <div class="col-md-4">
        <form action="add.php" method="POST">
        <input type="hidden" name="action" value="add">
            <div class="form-group">
                <label for = "cnp" class="control-label"></label>
                <textarea class="form-control" id="cnp" name = "cnp" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for = "nume" class="control-label"></label>
                <textarea class="form-control" id="nume" name = "nume" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for = "prenume" class="control-label"></label>
                <textarea class="form-control" id="prenume" name = "prenume" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for = "tipAsigurare" class="control-label"></label>
                <textarea class="form-control" id="tipAsigurare" name = "tipAsigurare" rows="3"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Adauga" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>

