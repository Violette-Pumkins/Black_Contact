<?php
    class Contact
    {
        //initialise chaque variable de ma table
        private Int $IDCONTACT;
        private String $ADRESSEMAILCON;
        private String $NOMCON;
        /**
        * @param Int $IDCONTACT;
        * @param String $ADRESSEMAILCON;
        * @param String $NOMCON;
        * @return void
        */
        public function __construct(Int $IDCONTACT, String $ADRESSEMAILCON, String $NOMCON){
            $this->setIDCONTACT($IDCONTACT);
            $this->setADRESSEMAILCON($ADRESSEMAILCON);
            $this->setNOMCON($NOMCON);
        }
         //getters
        public function getIDCONTACT():Int
        {
            return $this->IDCONTACT;
        }
        public function getADRESSEMAILCON():string
        {
            return $this->ADRESSEMAILCON;
        }
        public function getNOMCON():string
        {
            return $this->NOMCON;
        }
        
        //setters
        public function setIDCONTACT(Int $IDCONTACT)
        {
            $this->IDCONTACT=$IDCONTACT;
        }
        public function setADRESSEMAILCON(String $ADRESSEMAILCON)
        {
            $this->ADRESSEMAILCON=$ADRESSEMAILCON;
        }
        public function setNOMCON(String $NOMCON)
        {
            $this->NOMCON=$NOMCON;
        }
    }

?>