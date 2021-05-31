<?php
    class Partenaire
    {
        //initialise chaque variable de ma table
        private Int $IDPART;
        private String $NOMPART;
        private String $ADRESSEPART;
        /**
        * @param Int $IDPART;
        * @param String $NOMPART;
        * @param String $ADRESSEPART;
        * @return void
        */
        public function __construct(Int $IDPART, String $NOMPART, String $ADRESSEPART){
            $this->setIDPART($IDPART);
            $this->setNOMPART($NOMPART);
            $this->setADRESSEPART($ADRESSEPART);
        }
         //getters
        public function getIDPART():Int
        {
            return $this->IDPART;
        }
        public function getNOMPART():string
        {
            return $this->NOMPART;
        }
        public function getADRESSEPART():string
        {
            return $this->ADRESSEPART;
        }
        
        //setters
        public function setIDPART(Int $IDPART)
        {
            $this->IDPART=$IDPART;
        }
        public function setNOMPART(String $NOMPART)
        {
            $this->NOMPART=$NOMPART;
        }
        public function setADRESSEPART(String $ADRESSEPART)
        {
            $this->ADRESSEPART=$ADRESSEPART;
        }
    }

?>