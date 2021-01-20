<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <h4 class="display-4">Header</h4> -->
    <style>
       body {
           margin-left: 20px;
       }
    </style>
</head>
<body>
<header>

<nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div class="container">
                <a href="<?php  $_SERVER["DOCUMENT_ROOT"];?>/HospitalWebApp/app/Home.php" class="navbar-brand">Hospital Web App</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex flex-sm-row-reverse">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php  $_SERVER["DOCUMENT_ROOT"];?>/HospitalWebApp/app/Reteta/index.php">Reteta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php  $_SERVER["DOCUMENT_ROOT"];?>/HospitalWebApp/app/Pacient/index.php">Pacient</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php  $_SERVER["DOCUMENT_ROOT"];?>/HospitalWebApp/app/Medicament/index.php">Medicament</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php  $_SERVER["DOCUMENT_ROOT"];?>/HospitalWebApp/app/Diagnostic/index.php">Diagnostic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php  $_SERVER["DOCUMENT_ROOT"];?>/HospitalWebApp/app/Medic/index.php">Medic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php  $_SERVER["DOCUMENT_ROOT"];?>/HospitalWebApp/app/Tratament/index.php">Tratament</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</header>
