<?php

class Operario{

    private $_apellido;
    private $_legajo;
    private $_nombre;
    private $_salario;

    function __construct($l, $a, $n)
    {
        $this->_apellido = $a;
        $this->_nombre = $n;
        $this->_legajo = $l;
        $this->_salario = 100000;
    }

    function GetSalario()
    {
        return $this->_salario;
    }
    
    function SetAumentarSalario($p)
    {
        $this->_salario += $this->_salario * $p /100;
    }

    function GetNombreApellido()
    {
        return "$this->_nombre,$this->_apellido";
    }


    function Mostrar()
    {
        $retorno = $this->GetNombreApellido();
        $retorno .= "<br/> Legajo: $this->_legajo <br/>Salario: $this->_salario<br/>";
        return $retorno;
    }

    static function MostrarDos($o)
    {
        return $o->Mostrar();
    }

    public function Equals($operario)
    {
        if($this->GetNombreApellido() == $operario->GetNombreApellido() && $this->_legajo == $operario->_legajo)
                return TRUE;
        return FALSE;
    }

}
    
    class Fabrica
    {
        private $_cantMaxOperarios = 5;
        private $_operarios = array();
        private $_razonSocial;

        function __construct($rS)
        {
            $this->_razonSocial = $rS;
           
        }

        static function Equals($f, $o)
        {
            foreach ($f->_operarios as $key => $value) {
                if($value->Equals($o))
                return TRUE;
            }
            return FALSE;
        }

        function Add($o)
        {
            if($this->_cantMaxOperarios > count($this->_operarios) && !(Fabrica::Equals($this, $o)))
            {
                array_push( $this->_operarios, $o );
                return TRUE;
            }
            return FALSE;
        }

        function Mostrar()
        {
            $retorno = "$this->_razonSocial<br/>Cantidad Maxima de Operarios: $this->_cantMaxOperarios<br/>{$this->MostrarCosto($this)}<br/>";
            $retorno .= $this->MostrarOperarios();
            $retorno .= "<br/>";

            return $retorno;
            
        }

        static function MostrarCosto($f)
        {
            $string = "Total Salarios: ";
            $string .= $f->RetornarCostos();

            return $string;
        }
        
        private function RetornarCostos()
        {
            $monto = 0;
            foreach ($this->_operarios as $key => $value) {
                $monto += $value->GetSalario();
            }
            return $monto;
        }

        private function MostrarOperarios()
        {
            $retorno = "<br/>";
            foreach ($this->_operarios as $key => $value) {
                $retorno .= $value->Mostrar();
            }
            return $retorno;
        }

        function Remove($o)
        {
            if(Fabrica::Equals($this, $o))
            {
                for ($i=0; $i < count($this->_operarios) ; $i++) { 
                    if($this->_operarios[$i]->Equals($o)){

                        unset($this->_operarios[$i] );
                        return TRUE;
                    }
                }

            }
            return FALSE;

        }

        function AumentarSalario($p, $o)
        {
            foreach ($this->_operarios as $key => $value) {
                if($value->Equals($o))
                {
                    $value->SetAumentarSalario($p);
                    break;
                }
            }
        }

    }

    ?>
