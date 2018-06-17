<?php

class SignVideo
{
    public $id;
    public $text;
    public $file;

    function __construct($id, $text, $file)
    {
        $this->id = $id;
        $this->text = $text;
        $this->file = $file;
    }
}