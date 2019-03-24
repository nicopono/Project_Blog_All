

<?php


class ResponseSuccess extends Response
{
    public $object;


        function __construct($success, $message, $object){

        // $this->success = $success;       
        // $this->message = $message;
        parent::__construct($success, $message);

        $this->object = $object;    

        }

}

?>