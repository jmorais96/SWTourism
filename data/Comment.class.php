<?php

class Comment
{
    private $idComments;
    private $idUser;
    private $idActivity;
    private $comment;
    private $dateComment;

    public function __construct($idComments, $idUser, $idActivity, $comment, $dateComment)
    {
        $this->idComments=$idComments;
        $this->idUser=$idUser;
        $this->idActivity=$idActivity;
        $this->comment=$comment;
        $this->dateComment=$dateComment;
    }

    public function getComment()
    {
        return $this->comment;
    }
    
    public function getDate()
    {
        return $this->dateComment;
    }

}