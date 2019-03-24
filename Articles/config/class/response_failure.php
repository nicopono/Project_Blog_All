

<?php


class ResponseFailure extends Response
{
   


        function __construct($success, $message){

        $this->success = $success;      
        $this->message = $message;
          

        }


}
?>