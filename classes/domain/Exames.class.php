<?php

    class Exames{
        private $id;
        private $data;
        private $exame;
        private $medico;
        private $laboratorio;
        private $pessoasid;

        public function __construct($data, $exame, $medico, $laboratorio, $pessoasid){
            
            $this->data = $data;
            $this->exame = $exame;
            $this->medico = $medico;
            $this->laboratorio = $laboratorio;
            $this->pessoasid = $pessoasid;            
        }
        
        public function getId()
        {
                return $this->id;
        }
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
        public function getData()
        {
                return $this->data;
        }
        public function setData($data)
        {
                $this->data = $data;

                return $this;
        }
        public function getExame()
        {
                return $this->exame;
        }
        public function setExame($exame)
        {
                $this->exame = $exame;

                return $this;
        }
        public function getMedico()
        {
                return $this->medico;
        }
        public function setMedico($medico)
        {
                $this->medico = $medico;

                return $this;
        }
        public function getLaboratorio()
        {
                return $this->laboratorio;
        }
        public function setLaboratorio($laboratorio)
        {
                $this->laboratorio = $laboratorio;

                return $this;
        }
        public function getPessoasid()
        {
                return $this->pessoasid;
        }
        public function setPessoasid($pessoasid)
        {
                $this->pessoasid = $pessoasid;

                return $this;
        }
    }
