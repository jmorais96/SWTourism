<?php

class Activity
{
    private $idActivity;
    private $name;
    private $desc;
    private $idAdmin;
    private $location;

    public function __construct($idActivity, $name, $desc, $idAdmin, $location)
    {
        $this->idActivity=$idActivity;
        $this->name=$name;
        $this->desc=$desc;
        $this->idAdmin=$idAdmin;
        $this->location=$location;
    }

    public function getActivity()
    {
        return $this->name;
    }

}