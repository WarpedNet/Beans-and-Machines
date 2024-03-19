<?php

namespace user;

class Log // log class
{
    // variables
    private $time;
    private $error;
    private $info;

    // set and get functions
    public function setTime($time)
    {
        $this->time = $time;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setError($error)
    {
        $this->error = $error;
    }

    public function getError()
    {
        return $this->error;
    }

    public function setInfo()
    {
        $this->info = $info;
    }

    public function getInfo()
    {
        return $this->info;
    }

    // display function
    public function displayLog() {
        return "
            Time: $this->time
            Error: $this->error
            Info: $this->info
        ";
    }
}

?>