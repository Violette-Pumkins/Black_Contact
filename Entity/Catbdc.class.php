<?php
    class Catbdc
    {
        //initialise chaque variable de ma table
        private Int $IDCATBDC;
        private String $LIBCATBDC;
        private Int $REPET;
        /**
        * @param Int $IDCATBDC;
        * @param String $LIBCATBDC;
        * @param Int $REPET;
        * @return void
        */
        public function __construct(Int $IDCATBDC,String $LIBCATBDC, Int $REPET){
            $this->setIDCATBDC($IDCATBDC);
            $this->setLIBCATBDC($LIBCATBDC);
            $this->setREPET($REPET);
        }
         //getters
        public function getIDCATBDC():Int
        {
            return $this->IDCATBDC;
        }
        public function getLIBCATBDC():string
        {
            return $this->LIBCATBDC;
        }
        public function getREPET():Int
        {
            return $this->REPET;
        }
        //setters
        public function setIDCATBDC(Int $IDCATBDC)
        {
            $this->IDCATBDC=$IDCATBDC;
        }
        public function setLIBCATBDC(String $LIBCATBDC)
        {
            $this->LIBCATBDC=$LIBCATBDC;
        }
        public function setREPET(Int $REPET)
        {
            $this->REPET=$REPET;
        }
    }

?>