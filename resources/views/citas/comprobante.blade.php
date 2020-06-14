<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COMPROBANTE_CITA</title>
</head>
<style>
    h2{
        text-align: center;
    }

    .fSub {
        text-align: right;
        font-size: 1.2em;
    }

    .cuerpoT {
        text-align: center;
        font-size: 1.3em;
    }

    .cuerpoTN {
        text-align: center;
        font-size: 1.2em;
        font-weight: bold;
    }

    .cuerpoTF {
        text-align: justify;
        font-size: 0.7em;
    }

    .foto2 {
        text-align: center;
    }

    .logo {
        float: left;
    }

    .cabeceras {
        font-size: 0.4em;
        text-align: right;
        position: absolute;
        top: 1px;
        right: 100px;
    }
</style>
<body>
<img src="vendor/adminlte/dist/img/logo.png" alt="Image" class="logo" height="58" width="360">

<div class="text-bold text-right">
    <span style="font-size: 53%; position: absolute; margin-left: 67%"><br>SECRETARIA DE MOVILIDAD<br>DIRECCION GENERAL DE SEGURIDAD VIAL Y SISTEMAS<br>DE MOVILIDAD URBANA SUSTENTABLE</span><br><br>
</div>

<br><br>
<h2>CONSTANCIA DE REGISTRO CITA</h2>
<br>
<p class="cuerpoT"> <strong class="cuerpoTN">CURP:</strong> {{ $cita['curp'] ?? 'S/D' }}</p>
<br>
<p class="cuerpoT"> <strong class="cuerpoTN">PLACA:</strong> {{ $cita['placa'] ?? 'S/D' }}</p>
<br>
<p class="cuerpoT"> <strong class="cuerpoTN">FECHA CITA:</strong> {{ $cita['fecha_cita'] ?? 'S/D' }}</p>
<br><br>
<p class="foto2"><img src="data:image/png;base64,{{$qrcode}}" height="150" width="150" ></p>
</body>
</html>
