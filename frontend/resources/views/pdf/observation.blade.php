<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificado</title>

    <style type="text/css">
        .upn {
            background: url("img/certificado.png") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body class="upn" style="margin: -6.5%;">
    <div class="row">
        <div class="column">
            <p style="margin-left: 28%; margin-top: 2%;">{{ $idPatient }}</p>
            <p style="margin-left: 28%; margin-top: 2%;">{{ $idUser }}</p>
            <p style="margin-left: 28%; margin-top: 2%;">{{ $periodStart }}</p>
        </div>
    </div>
</body>

</html>
