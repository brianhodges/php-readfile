<?php

class Team {
    public $name;
    public $super_bowl_wins;

    function __construct($arg1,$arg2) {
        $this->name = $arg1;
        $this->super_bowl_wins = (int)$arg2;
    }
}

?>