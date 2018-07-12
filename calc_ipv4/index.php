<?php include 'app/classes/calculo.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
     <link rel="stylesheet" href="uni.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <title>Cálculo de máscara de sub-rede IPv4</title>

</head>
<body id="sugar">

    <section >
        <h1 id="bee" >Calcular máscara de sub-rede IPv4</h1>

    <!-- Formulário Verde p pegar ip-->
    <form method="POST">
        <b id="moon" >IP/CIDR</b> (Ex.: 192.168.0.1/24) <br>
        <input id="star" type="text" name="ip" value="<?php echo @$_POST['ip'];?>">
        <input id="constellation"  type="submit" value="Calcular">
    </form>
<?php
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && ! empty( $_POST['ip'] ) ) {
    $ip = new calculoIp( $_POST['ip'] );
    
    if( $ip->valida_end() ) {
        echo '<h2>Configurações de rede para <span style="color:gray;">' . $_POST['ip'] . '</span> </h2>';
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
   </section>
</body>
</html>