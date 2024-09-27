<?php

    class Fultebol
    {
        public    $jogador;
        public    $time;
        protected $salario;

        function __construct($jog,$tim)
        {
            $this->jogador = $jog;
            $this->time    = $tim;
        }

        function SetSalario($sal)
        {
            if(is_numeric($sal) && $sal > 1500)
            {
                $this->salario = $sal += 1000;
            }
            else
            {
                echo"<br>Salario invalido.";
            }
        }
    
        function GetSalario()
        {
            return $this->salario;
        }
    }

    class bonus extends Fultebol
    {
        public $valor_bonus;

        function __construct($jog,$tim,$val)
        {
            parent::__construct($jog,$val);
            $this->valor_bonus = $val;
        }

        function SetSalario($sal)
        {
            parent::SetSalario($sal);
            if($sal >= 30000)
            {
                echo"<br>O jogador $this->jogador tem o salario de R$ $this->salario e é bem valorizado, tem um bonus de R$ $this->valor_bonus";
            }
            else
            {
                echo"<br>O jogador $this->jogador do time $this->time, seu bonus foi de R$ $this->valor_bonus";
            }
        }
    }
?>