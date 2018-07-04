<!doctype html>
<html lang="pt-br">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/css.css">

    <script>
        $(document).ready(function(){
          $('#bt').click(function () {
              var t1 = $('#1').val();
              var t2 = $('#2').val();
              var t3 = $('#3').val();
              var t4 = $('#4').val();
              var masc = $('#masc').val();
              var rota = "calcular";

              $.get("indexController.php", {1 : t1, 2: t2, 3: t3, 4: t4, 'mascara': masc,'rota': rota }, function (data) {
                  $('#resultado').append(data);
              })

          })
        });
    </script>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div>
        <form id="form">
            <input maxlength="3" id="1" type="text" required name="trinca1">.
            <input maxlength="3" id="2" type="text" required name="trinca2">.
            <input maxlength="3" id="3" type="text" required name="trinca3">.
            <input maxlength="3" id="4" type="text" required name="trinca4">/
            <input maxlength="2" id="masc" type="text" required name="mascara">
            <input type="button" id="bt" value="Enviar">
        </form>
    </div>
    <div id="resultado">

    </div>

</body>
</html>