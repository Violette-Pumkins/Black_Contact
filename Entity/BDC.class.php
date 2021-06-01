<?php
    class Bdc
    {
        //initialise chaque variable de ma table
        private Int $IDBDC;
        private Datetime $DATEBDC;
        private String $FORPAGE;
        private Int $PRIXBDC;
        private Int $IDCATBDC;
        private Int $IDPART;
        
        /**
        * @param $IDBDC;
        * @param $DATEBDC;
        * @param $FORPAGE;
        * @param $PRIXBDC;
        * @param $IDCATBDC;
        * @param $IDPART;
        * @return void
        */
        public function __construct(Int $IDBDC, DateTime $DATEBDC, String $FORPAGE, Int $PRIXBDC, Int $IDCATBDC, Int $IDPART){
            $this->setIDBDC($IDBDC);
            $this->setDATEBDC($DATEBDC);
            $this->setFORPAGE($FORPAGE);
            $this->setPRIXBDC($PRIXBDC);
            $this->setIDCATBDC($IDCATBDC);
            $this->setIDPART($IDPART);
        }
         //getters
        public function getIDBDC() :Int
        {
            return $this->IDBDC;
        }
        public function getDATEBDC() :DateTimeInterface
        {
            return $this->DATEBDC;
        }
        public function getFORPAGE() :string
        {
            return $this->FORPAGE;
        }
        public function getPRIXBDC() :Int
        {
            return $this->PRIXBDC;
        }
        public function getIDCATBDC() :Int
        {
            return $this->IDCATBDC;
        }
        public function getIDPART() :Int
        {
            return $this->IDPART;
        }
        //setters
        public function setIDBDC(Int $IDBDC)
        {
            $this->IDBDC=$IDBDC;
        }
        public function setDATEBDC(Datetime $DATEBDC)
        {
            $this->DATEBDC=$DATEBDC;
        }
        public function setFORPAGE(string $FORPAGE)
        {
            $this->FORPAGE=$FORPAGE;
        }
        public function setPRIXBDC(Int $PRIXBDC)
        {
            $this->PRIXBDC=$PRIXBDC;
        }
        public function setIDCATBDC(Int $IDCATBDC)
        {
            $this->IDCATBDC=$IDCATBDC;
        }
        public function setIDPART(Int $IDPART)
        {
            $this->IDPART=$IDPART;
        }
    }

?>