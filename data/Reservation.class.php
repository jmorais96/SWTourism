<?php

class Reservation
{
    private $idUser;
    private $idActivity;
    private $dateReservation;
    private $time;
    private $state;

    public function __construct($idUser, $idActivity, $dateReservation, $time, $state)
    {
        $this->idUser=$idUser;
        $this->idActivity=$idActivity;
        $this->dateReservation=$dateReservation;
        $this->time=$time;
        $this->state=$state;
    }

   
}