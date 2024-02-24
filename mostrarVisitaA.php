<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./estilos.css" rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            
            $("#reloj").animate({
                top: 900
            }, 2000);

            var x = setInterval(iniciarContador, 1000);
            let fechaA = new Date().getFullYear();
            $("#bottom_text").html("Para el inicio de las visitas " + fechaA);
            function iniciarContador() {
                //Declaramos las fechas
                let fechaFinal = new Date("May 20 2024 15:00").getTime();
                let now = new Date().getTime();
                //Hacemos la resta
                var diffTime = fechaFinal - now;

                // Time calculations for days, hours, minutes and seconds

                var months = Math.floor(diffTime / (1000 * 60 * 60 * 24 * 30));
                var days = Math.floor((diffTime % (1000 * 60 * 60 * 24 * 30)) / (1000 * 60 * 60 * 24));
                var hours = Math.floor((diffTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((diffTime % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((diffTime % (1000 * 60)) / 1000);

                seconds = seconds < 10 ? "0" + seconds : seconds

                $("#contador-mo").html(months + " meses")
                $("#contador-d").html(days + "d.")
                $("#contador-h").html(hours + "h.")
                $("#contador-m").html(minutes + "m.")
                $("#contador-s").html(seconds + "s.")

            }
        });
    </script>


</head>

<body class="fondo">

    <div class="container-fluid">
        <div id="reloj" class='container'>
            <div class="text-center">Faltan</div>
            <div class='row justify-content-center text-center text-white'>
                <div class="col-sm  text-center reloj" id="contador-mo"></div>
                <div class="col-sm text-center reloj" id="contador-d"></div>
                <div class="col-sm text-center reloj" id="contador-h"></div>
                <div class="col-sm text-center reloj" id="contador-m"></div>
                <div class="col-sm text-center reloj" id="contador-s"></div>
            </div>
            <div id="bottom_text" class="row justify-content-center text-center">Para el inicio de las visitas</div>
        </div>

    </div>
    <?php


    ?>

</body>

</html>