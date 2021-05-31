<?php
    class Catpart
    {
        //initialise chaque variable de ma table
        private Int $IDCATPART;
        private String $LIBCATPART;
        /**
        * @param Int $IDCATPART;
        * @param String $LIBCATPART;
        * @return void
        */
        public function __construct(Int $IDCATPART,String $LIBCATPART){
            $this->setIDCATPART($IDCATPART);
            $this->setLIBCATPART($LIBCATPART);
        }
         //getters
        public function getIDCATPART():Int
        {
            return $this->IDCATPART;
        }
        public function getLIBCATPART():string
        {
            return $this->LIBCATPART;
        }
        
        //setters
        public function setIDCATPART(Int $IDCATPART)
        {
            $this->IDCATPART=$IDCATPART;
        }
        public function setLIBCATPART(String $LIBCATPART)
        {
            $this->LIBCATPART=$LIBCATPART;
        }
    }

?>