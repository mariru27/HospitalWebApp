<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Adauga Diagnostic</h4>


<div class="row">
    <div class="col-md-4">
        <form action="add.php" method="get">
        <input type="hidden" name="action" value="add">
            <div class="form-group">
                <label for = "denumire" class="control-label">Denumire</label>
                <input class="form-control" type="text" id="denumire" name = "denumire" rows="3"> 
            </div>
            <div class="form-group">
                <label for = "tip" class="control-label">Tip</label>
                <input class="form-control" type="text" id="tip" name = "tip" rows="3">
            </div>
            <div class="form-group">
                <input type="submit" value="Adauga" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>