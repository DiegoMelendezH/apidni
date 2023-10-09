<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .cuadrado_dni {
            width: 560px;
            height: 300px;
            background-color: transparent;
            border-radius: 15px;
            border: 2px solid black;
            margin-left: 15px;
            position: relative;
            top: 150px;
        }
        .cuadrado_int_dni{
          width: 550px;
          height: 290px;
          margin-left: 3px;
          position: sticky;
          margin-top: 3px;
          border-radius: 15px;
          background: #00B3DE;
        }
        .rectangulo_supe{
          width: 550px;
          height: 30px;
          background: #6D9AAB;
          position: relative;
          border-top-right-radius: 15px;
          border-top-left-radius: 15px;
        }
        .cuadrado_img{
          width: 120px;
          height: 130px;
          background: white;
          position: relative;
          top: 5px;
          left: 8px;
          float: left;
        }
        .cuadrado_infor{
          width: 170px;
          height: 130px;
          position: relative;
          top: 5px;
          left: 15px;
          float: left;
        }
        .cuadrado_emisi{
          width: 120px;
          height: 130px;
          position: relative;
          top: 5px;
          right: 10px;
          float: right;
        }
        .rectangulo_final{
          width: 490px;
          height: 109px;
          border-bottom-left-radius: 15px;
          border-bottom-right-radius: 15px;
          position: relative;
          top: 20px;
          clear: both;
        }
        .supe_text_1{
          font-size: 13px;
          font-weight: bold;
          color: #670000;
          position: relative;
          left: 5px;
          top: 5px;
        }
        .supe_text_2{
          font-size: 10px;
          font-weight: bold;
          color: #670000;
          position: relative;
          left: 150px;
          top: -35px;
        }
        .supe_text_3{
          font-size: 13px;
          font-weight: bold;
          color: #670000;
          position: relative;
          left: 150px;
          top: -55px;
        }
        .espaciado {
            margin-left: 8px; /* Ajusta este valor según tu preferencia */
        }
        .supe_text_dni{
          font-size: 13px;
          font-weight: bold;
          color: red;
          position: relative;
          left: 450px;
          top: -95px;
        }
        .supe_text_slash{
          font-size: 18px;
          font-weight: bold;
          position: relative;
          left: 515px;
          top: -135px;
        }
        .supe_text_cod{
          font-size: 13px;
          font-weight: bold;
          color: red;
          position: relative;
          left: 527px;
          top: -173px;
        }
        .text_info_Dni_1{
          font-size: 12px;
        }
        .text_info_Dni_2{
          font-size: 12px;
          position: relative;
          top: -20px;
        }
        .text_info_Dni_3{
          font-size: 12px;
          position: relative;
          top: -40px;
        }
        .text_info_Dni_4{
          font-size: 12px;
        }
        .text_dni_ape_pa{
          font-size: 13px;
          font-weight: bold;
          position: relative;
          top: -19px;
        }
        .text_dni_ape_ma{
          font-size: 13px;
          font-weight: bold;
          position: relative;
          top: -39px;
        }
        .text_dni_nom{
          font-size: 13px;
          font-weight: bold;
          position: relative;
          top: -60px;
        }
        .emision_1{
          width: 120px;
          height: 35px;
          border: 1px solid black;
        }
        .emision_2{
          width: 120px;
          height: 35px;
          border: 1px solid black;
        }
        .emision_3{
          width: 120px;
          height: 35px;
          border: 1px solid black;
        }
        .tex_emision_fecha{
          font-size: 10px;
          text-align: center;
        }
        .fecha_emision{
          font-size: 12px;
          position: relative;
          text-align: center;
          top: -14px;
        }
        .text_final_1{
          font-size: 19px;
          position: relative;
          top: 15px;
          left: 7px;
          font-weight: 500;
        }
        .text_final_2{
          font-size: 19px;
          position: relative;
          left: 7px;
          font-weight: 500;
        }
        .text_final_3{
          font-size: 19px;
          position: relative;
          top: -15px;
          left: 7px;
          font-weight: 500;
        }
    </style>
  </head>
  <body>

    <div class="container-fluid">
      <div class="row">
      <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se ha enviado el formulario

    // Obtener el DNI del formulario
    $dni = $_POST["dni"];

    // Llamar a la función de consulta
    $resultado = consultarDNI($dni);

    // Mostrar resultados
    echo "<div id='alert' class='col-12 z-3 position-absolute p-5 mt-2 rounded-3'>";
    if (is_array($resultado)) {
        // Mostrar información del DNI
        print_r($resultado);
    } else {
        // Mostrar mensaje de error
        echo "<pre>";
        if (is_object($resultado)) {
            // Mostrar información específica del DNI
            echo "<div class='alert alert-success' role='alert'>";
            echo "Consulta exitosa de <span>{$dni}</span>, Ley de protección de datos personales N° 29733.";
            echo "</div>";
            echo "<script>";
            echo "setTimeout(function() { document.getElementById('alert').style.display = 'none'; }, 6000);";
            echo "</script>";
            // ... Puedes imprimir más información según sea necesario
        } else {
            // Mostrar mensaje de error
            echo $resultado;
        }
        echo "</pre>";
    }
    echo "</div>";
}

function consultarDNI($dni) {
    // Validar que el DNI tenga 8 dígitos y sea numérico
    if (!is_numeric($dni) || strlen($dni) !== 8) {
        return "El DNI debe tener 8 dígitos y ser numérico.";
    }

    // URL de la API
    $url = "https://dniruc.apisperu.com/api/v1/dni/{$dni}?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6IjEzMjgyMDZAc2VuYXRpLnBlIn0.GuUxUrQWeY6P9H-0zvVkKH59Wo80HwZ5OR-VfuuQ_E4";

    // Realizar la solicitud HTTP
    $response = file_get_contents($url);

    // Verificar si la solicitud fue exitosa
    if ($response === false) {
        return "Error al realizar la solicitud.";
    }

    // Decodificar la respuesta JSON
    $data = json_decode($response);

    // Verificar si la respuesta contiene información válida
    if (isset($data->success) && $data->success === true) {
        return $data;
    } else {
        return "Error en la respuesta de la API: " . $data->message;
    }
}
?>
        <div class="col-12" style="background: #004370;">
          <div class="container">
            <div class="row">
              <div class="col-4 ">
                <img src="reniec.png" class="m-auto">
              </div>
              <div class="col-6">
                <div class="col-9">
                  <p class="text-white" style="font-weight: bold; font-size: 25px; position: relative;top: 15px;">Consulta De Registro De Identidad</p>
                  <p class="text-white">Servicio en Linea</p>
                </div>
              </div>
              <div class="col-2 text-center">
                  <div class="text-white" id="hora" style="font-size: 25px; font-weight: bold; position: relative; top: 25px;"></div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-6">
            <div class="cuadrado_dni">
              <div class="cuadrado_int_dni">
                <div class="rectangulo_supe">
                  <p class="supe_text_1">REPUBLICA DEL PERU</p>
                  <p class="supe_text_2">REGISTRO NACIONAL DE INDENTIFICACION Y ESTADO CIVIL</p>
                  <p class="supe_text_3">DOCUMENTO NACIONAL DE INDETIDAD <span class="espaciado">DNI</span></p>

                  <p class="supe_text_dni"><?php echo isset($resultado) && is_object($resultado) ?  $resultado->dni : '12345678'; ?></p>
                  <p class="supe_text_slash">-</p>
                  <p class="supe_text_cod"><?php echo isset($resultado) && is_object($resultado) ?  $resultado->codVerifica : '1'; ?></p>
                </div>
                <div class="cuadrado_img">
                  <img src="user.png" style="width: 100%; height: auto;">
                </div>
                <div class="cuadrado_infor">
                  <p class="text_info_Dni_1">Primer Apellido</p>
                  <p class="text_dni_ape_pa"><?php echo isset($resultado) && is_object($resultado) ?  $resultado->apellidoPaterno : 'N/A'; ?></p>
                  <p class="text_info_Dni_2">Segundo Apellido</p>
                  <p class="text_dni_ape_ma"><?php echo isset($resultado) && is_object($resultado) ?  $resultado->apellidoMaterno : 'N/A'; ?></p>
                  <p class="text_info_Dni_3">Pre Nombres</p>
                  <p class="text_dni_nom"><?php echo isset($resultado) && is_object($resultado) ? $resultado->nombres : 'N/A'; ?></p>
                </div>
                <div class="cuadrado_emisi">
                  <div class="emision_1">
                    <p class="tex_emision_fecha">Fecha de inscipción</p>
                    <p class="fecha_emision">05 03 2004</p>
                  </div>
                  <div class="emision_2">
                    <p class="tex_emision_fecha">Fecha de emisión</p>
                    <p class="fecha_emision">07 04 2010</p>
                  </div>
                  <div class="emision_3">
                    <p class="tex_emision_fecha">Fecha Caducidad</p>
                    <p class="fecha_emision">07 04 2018</p>
                  </div>
                </div>
                <div class="rectangulo_final">
                  <p class="text_final_1">I&lt;PER<span><?php echo isset($resultado) && is_object($resultado) ?  $resultado->dni : '12345678'; ?></span>&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;</p>
                  <p class="text_final_2">5902235M0907143PER&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;</p>
                  <p class="text_final_3"><span><?php echo isset($resultado) && is_object($resultado) ?  $resultado->apellidoPaterno : 'N/A'; ?></span>&lt;&lt;<span><?php echo isset($resultado) && is_object($resultado) ?  $resultado->apellidoMaterno : 'N/A'; ?></span>&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;</p>
                </div>
              </div>
            </div>
        </div>
        <div class="col-6" style="background: #004370;">
          <div class="col-12" style="display: flex; justify-content: center; align-items: center; height: 82vh;">

            <form method="post" action="">
              <p class="text-center text-white" style="font-size: 25px;font-weight: bold;">Consulta De Dni</p>
              <input class="form-control" placeholder="Número de DNI" type="text" name="dni" pattern="\d{8}" title="Debe contener exactamente 8 dígitos" required>
              <div style="display: flex; justify-content: center; align-items: center; margin-top: 15px;">
                  <button class="btn btn-light" type="submit">Consultar</button>
              </div>
            </form>

            

          </div>
        </div>
        
      </div>
    </div>

    <!---<div class="cuadrado_dni">
      <div class="cuadrado_int_dni">
        <div class="rectangulo_supe">
          <p class="supe_text_1">REPUBLICA DEL PERU</p>
          <p class="supe_text_2">REGISTRO NACIONAL DE INDENTIFICACION Y ESTADO CIVIL</p>
          <p class="supe_text_3">DOCUMENTO NACIONAL DE INDETIDAD <span class="espaciado">DNI</span></p>

          <p class="supe_text_dni">74638239</p>
          <p class="supe_text_slash">-</p>
          <p class="supe_text_cod">6</p>
        </div>
        <div class="cuadrado_img">
          <img src="user.png" style="width: 100%; height: auto;">
        </div>
        <div class="cuadrado_infor">
          <p class="text_info_Dni_1">Primer Apellido</p>
          <p class="text_dni_ape_pa">CASTRO</p>
          <p class="text_info_Dni_2">Segundo Apellido</p>
          <p class="text_dni_ape_ma">RAMOS</p>
          <p class="text_info_Dni_3">Pre Nombres</p>
          <p class="text_dni_nom">RENE ALEJANDRO</p>
        </div>
        <div class="cuadrado_emisi">
          <div class="emision_1">
            <p class="tex_emision_fecha">Fecha de inscipción</p>
            <p class="fecha_emision">05 03 2004</p>
          </div>
          <div class="emision_2">
            <p class="tex_emision_fecha">Fecha de emisión</p>
            <p class="fecha_emision">07 04 2010</p>
          </div>
          <div class="emision_3">
            <p class="tex_emision_fecha">Fecha Caducidad</p>
            <p class="fecha_emision">07 04 2018</p>
          </div>
        </div>
        <div class="rectangulo_final">
          <p class="text_final_1">I&lt;PER<span>74638239</span>&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;</p>
          <p class="text_final_2">5902235M0907143PER&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;</p>
          <p class="text_final_3"><span>CASTRO</span>&lt;&lt;<span>RENE</span>&lt;<span>ALEJANDRO</span>&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;</p>
        </div>
      </div>
    </div>--->

    <script>
    function mostrarHora() {
        const ahora = new Date();
        const horas = ahora.getHours();
        const minutos = ahora.getMinutes();
        const segundos = ahora.getSeconds();

        const horaFormateada = `${agregarCero(horas)}:${agregarCero(minutos)}:${agregarCero(segundos)}`;

        document.getElementById('hora').innerText = horaFormateada;
    }

    function agregarCero(numero) {
        return numero < 10 ? `0${numero}` : numero;
    }

    // Mostrar la hora actual al cargar la página y actualizar cada segundo
    mostrarHora();
    setInterval(mostrarHora, 1000);
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>