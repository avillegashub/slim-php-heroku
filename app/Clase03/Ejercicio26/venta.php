<?php

include_once "producto.php";

class Venta 
{
   public $id;
   public $codigoProducto;
   public $idUsuario;
   public $cantidad;

    public function jsonSerialize()
            {
                return get_object_vars($this);
            }


    public function __construct($cP, $i, $c)
    {
           $this->id = Venta::GetNextId()+1;
           $this->codigoProducto = $cP;
           $this->idUsuario = $i;
           $this->cantidad = $c;
    }
    
    static function GetNextId()
    {
       $lista = Venta::CargarListaVentas();
       if( $lista != NULL)
       {
            return (int)$lista[count($lista)-1]["id"];
       }
       return 0;
    }

   
        
    static function GuardarListaVenta($venta)
    {
        $listaVenta = Venta::CargarListaVentas();
        array_push($listaVenta, $venta);
        $miArchivo = fopen("ventas.json", "w");
        fwrite($miArchivo, json_encode($listaVenta));
        fclose($miArchivo);
    }
    
    static function CargarListaVentas()
    {
        if(file_exists("ventas.json"))
        {
            return json_decode(file_get_contents("ventas.json"), true);
        }
        return array();
    }

    static function RealizarVenta($codigo, $id, $cantidad)
    {
        
        $producto = Producto::VerificaCodigo($codigo, Producto::_cargarListado());
        
        if ($producto != NULL)
        {
            $cantidadAux = Producto::_VerificarStock($producto, $cantidad);
            if($cantidadAux == -1 )
            {
                Venta::GuardarListaVenta(new Venta($codigo, $id, $cantidad));
                Producto::ModificarStock($codigo, $cantidad);
                return "Venta Exitosa";
            }else{
                return "No se pudo efectuar la Venta<br/>Stock de Producto :". $cantidadAux;
            }
        }
        else{
            return "Producto no existe";
        }




    }


  
  

}

?>