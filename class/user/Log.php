<?php

namespace user;
class Log
{
    private $time;
    private $error;
    private $info;

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

    public function displayLog() {
        return "
            Time: $time
            Error: $error
            Info: $info
        ";
    }
}

?>