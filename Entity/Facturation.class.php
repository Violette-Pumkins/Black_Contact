<?php
    class Facturation
    {
        //initialise chaque variable de ma table
        private Int $IDFAT;
        private Datetime $DATEFACT;
        /**
        * @param Int $IDFAT;
        * @param Datetime $DATEFACT;
        * @return void
        */
        public function __construct(Int $IDFAT, Datetime $DATEFACT){
            $this->setIDFAT($IDFAT);
            $this->setDATEFACT($DATEFACT);
        }
         //getters
        public function getIDFAT():Int
        {
            return $this->IDFAT;
        }
        public function getDATEFACT():Datetime
        {
            return $this->DATEFACT;
        }
        
        //setters
        public function setIDFAT(Int $IDFAT)
        {
            $this->IDFAT=$IDFAT;
        }
        public function setDATEFACT(Datetime $DATEFACT)
        {
            $this->DATEFACT=$DATEFACT;
        }
    }

?>