<?php
    class Contact
    {
        //initialise chaque variable de ma table
        private Int $IDCONTACT;
        private String $ADRESSEMAILCON;
        private String $NOMCON;
        private Int $IDPART;
        /**
        * @param Int $IDCONTACT;
        * @param String $ADRESSEMAILCON;
        * @param String $NOMCON;
        * @param Int $IDPART;
        * @return void
        */
        public function __construct(Int $IDCONTACT, String $ADRESSEMAILCON, String $NOMCON, Int $IDPART){
            $this->setIDCONTACT($IDCONTACT);
            $this->setADRESSEMAILCON($ADRESSEMAILCON);
            $this->setNOMCON($NOMCON);
            $this->setIDPART($IDPART);
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
        public function getIDPART():Int
        {
            return $this->IDPART;
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
        public function setIDPART(Int $IDPART)
        {
            $this->IDPART=$IDPART;
        }
    }

?>