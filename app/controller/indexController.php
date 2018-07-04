<?php

    function especIp($t1, $t2, $t3, $t4, $mascara){
        $ip =  $t1.".".$t2.".".$t3.".".$t4."/".$mascara;

        $mascaras = ['24' => 0, '25' => 128, '26' => 192, '27' => 224, '28' => 240, '29' => 248, '30' => 252, '31' =>254, '32' => 255];
        $mascaraF = "255.255.255.".$mascaras[$mascara];


        $int = 256 - $mascaras[$mascara];
        $sub = 256 / $int;
        $hosts = $int - 2;

        $redeIp = (int) $t4 / $int;

        $endRed = $int * $redeIp;
        $host1 = $endRed+1;
        $ultHost = $endRed + $hosts;
        $bdc = $ultHost + 1;


        if ($t1 == '10'){
            $classe = 'privada';
        }
        elseif ($t1 == '127'){
            $classe = 'localhost';
        }
        elseif ($t1 == '192' and $t2 == '168'){
            $classe = 'privada';
        }
        elseif ($t1 == '169' and $t2 == '254'){
            $classe = 'privada';
        }
        elseif ($t1 == '172' and $t2 >=16 and $t2 <= 31){
            $classe = 'privada';
        }
        else{$classe = 'publico';}


        $resposta = ['qtd_sub' => $sub, 'qtd_end' => $int, 'hosts' => $hosts, 'p_host' => $host1, 'u_host' => $ultHost, 'bdc' => $bdc, 'masc' => $mascaraF, 'classe' => $classe];


        return $resposta;



    }





if (!isset($_GET['rota'])){
    include_once "../views/index.php";
}

if (isset($_GET['rota']) and $_GET['rota'] == 'calcular') {
    $ip = especIp($_GET['1'], $_GET['2'],$_GET['3'],$_GET['4'],$_GET['mascara']);
    echo "<h2> Quantidade de Sub-Redes: ".$ip['qtd_sub']."</h2>";
    echo "<h2> Quantidade de Endereços em uma Sub-Rede: ".$ip['qtd_end']."</h2>";
    echo "<h2> Quantidade de Hosts em uma Sub-Rede: ".$ip['hosts']."</h2>";
    echo "<h2> Primeiro Host da Rede do Ip: ".$ip['p_host']."</h2>";
    echo "<h2> Ultimo Host da Rede do Ip: ".$ip['u_host']."</h2>";
    echo "<h2> Endereço de Broadcast da Sub-Rede do Ip: ".$ip['bdc']."</h2>";
    echo "<h2> Máscara de Rede: ".$ip['masc']."</h2>";
    echo "<h2> Classe do Ip: ".$ip['classe']."</h2>";
}