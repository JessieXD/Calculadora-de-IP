<?php include 'app/classes/calculoIp.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
     <link rel="stylesheet" href="uni.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <title>Calculadora de Wakanda</title>
    <script>
        $(document).ready(function() {

            $("#constellation").click(function () {


                });
            });
    </script>

</head>
<body id="sugar">
<div id="okoye">
    <section>
        <h1 id="bee">Calculadora de Wakanda</h1>

    <form method="POST" id="ramonda">
        <b id="moon" >IP/CIDR</b> (Ex.: 192.168.0.1/24) <br>
        <input id="star" type="text" name="ip" value="<?php echo $_POST['ip'];?>">
        <input id="constellation"  type="submit" value="Calcular">
    </form>
        <div id="nakia">
        <?php
            if ( $_SERVER['REQUEST_METHOD'] === 'POST' && ! empty( $_POST['ip'] ) ) {
            $ip = new calculoIp( $_POST['ip'] );

            if( $ip->valida_end() ) {
            echo '<h2>Configurações de rede para <span id="fly">' . $_POST['ip'] . '</span> </h2>';
            echo "<pre class='resultado'>";

        echo "<b>Endereço/Rede: </b>" . $ip->endereco_completo() . '<br>';
        "<b>Endereço: </b>" . $ip->endereco() . '<br>
        <b>Prefixo CIDR: </b>/' . $ip->barramento() . '<br>
        <b>Máscara de sub-rede: </b>' . $ip->mascara() . '<br>
        <b>IP da Rede: </b>' . $ip->rede() . '/' . $ip->barramento() . '<br>
        <b>Broadcast da Rede: </b>' . $ip->broadcast() . '<br>
        <b>Primeiro Host: </b>' . $ip->primeiro_ip() . '<br>
        <b>Último Host: </b>' . $ip->ultimo_ip() . '<br>
        <b>Total de IPs:  </b>' . $ip->total_ips() . '<br>
        <b>Hosts: </b>' . $ip->ips_rede().
        "</pre>";
            } else {
            echo 'Endereço IPv4 inválido!';
            }
        }
        ?>

        </div>
   </section>
   </div>
</body>
</html>

<!--                $('#ramonda').submit(function () {
                    $.ajax({
                        url: 'calculoIp.php',
                        type: 'POST',
                        data: $('#ramonda').serialize(),
                        success: function (data) {
                            $('.recebeDados').html(data);
                        }
                    });
                    return false;
                });
?php
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && ! empty( $_POST['ip'] ) ) {
    $ip = new calculoIp( $_POST['ip'] );

    if( $ip->valida_end() ) {
        echo '<h2>Configurações de rede para <span id="fly">' . $_POST['ip'] . '</span> </h2>';
        echo "<pre class='resultado'>";

        echo "<b>Endereço/Rede: </b>" . $ip->endereco_completo() . '<br>';
        echo "<b>Endereço: </b>" . $ip->endereco() . '<br>';
        echo "<b>Prefixo CIDR: </b>/" . $ip->barramento() . '<br>';
        echo "<b>Máscara de sub-rede: </b>" . $ip->mascara() . '<br>';
        echo "<b>IP da Rede: </b>" . $ip->rede() . '/' . $ip->b() . '<br>';
        echo "<b>Broadcast da Rede: </b>" . $ip->broadcast() . '<br>';
        echo "<b>Primeiro Host: </b>" . $ip->primeiro_ip() . '<br>';
        echo "<b>Último Host: </b>" . $ip->ultimo_ip() . '<br>';
        echo "<b>Total de IPs:  </b>" . $ip->total_ips() . '<br>';
        echo "<b>Hosts: </b>" . $ip->ips_rede();
        echo "</pre>";
    } else {
        echo 'Endereço IPv4 inválido!';
    }
}
?>