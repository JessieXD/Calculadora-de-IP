<?php

class calculoIp
{
    public $endereco;
    public $barra;
    public $endereco_completo;

    public function __construct( $endereco_completo ) {
        $this->endereco_completo = $endereco_completo;
        $this->valida_end();
    }

    public function valida_end() {

        $comparativo = '/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\/[0-9]{1,2}$/';

        if ( ! preg_match( $comparativo, $this->endereco_completo ) ) {
            return false;
        }
        $endereco = explode( '/', $this->endereco_completo );
        $this->barra = (int) $endereco[1];
        $this->endereco = $endereco[0];
        if ( $this->barra > 32 ) {
            return false;
        }
        foreach( explode( '.', $this->endereco ) as $trinca ) {
            $trinca = (int) $trinca;
            if ( $trinca > 255 || $trinca < 0 ) {
                return false;
            }
        }

        return true;
    }

    public function endereco_completo() { 
        return ( $this->endereco_completo ); 
    }

    public function endereco() { 
        return ( $this->endereco ); 
    }

    public function barramento() {
        return ( $this->barra );
    }

    public function mascara() {
        if ( $this->barramento() == 0 ) {
            return '0.0.0.0';
        }

        return ( 
            long2ip( //gera endereço do "tipo ip"
                ip2long("255.255.255.255") << ( 32 - $this->barra )
            )
        );
    }
    public function rede() {
        if ( $this->barramento() == 0 ) {
            return '0.0.0.0';
        }

        return (
            long2ip(
                ( ip2long( $this->endereco ) ) & ( ip2long( $this->mascara() ) )
            )
        );
    }
    public function broadcast() {
        if ( $this->barramento() == 0 ) {
            return '255.255.255.255';
        }
        
        return (
            long2ip( ip2long($this->rede() ) | ( ~ ( ip2long( $this->mascara() ) ) ) )
        );
    }
    public function total_ips() {
        return( pow(2, ( 32 - $this->barramento() ) ) );
    }

    public function ips_rede() {
        if ( $this->barramento() == 32 ) {
            return 0;
        } elseif ( $this->barramento() == 31 ) {
            return 0;
        }
        
        return( abs( $this->total_ips() - 2 ) );
    }
    public function primeiro_ip() {
        if ( $this->barramento() == 32 ) {
            return null;
        } elseif ( $this->barramento() == 31 ) {
            return null;
        } elseif ( $this->barramento() == 0 ) {
            return '0.0.0.1';
        }
        
        return (
            long2ip( ip2long( $this->rede() ) | 1 )
        );
    }

    public function ultimo_ip() {
        if ( $this->barramento() == 32 ) {
            return null;
        } elseif ( $this->barramento() == 31 ) {
            return null;
        }
    
        return (
            long2ip( ip2long( $this->rede() ) | ( ( ~ ( ip2long( $this->mascara() ) ) ) - 1 ) )
        );
    }
}

