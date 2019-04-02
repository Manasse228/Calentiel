<?php


class Prototype{


    protected $name;
    protected $image;
    protected $time;
    protected $end_time;
    protected $color;
    protected $location;
    protected $description;

    /**
     * Prototype constructor.
     * @param $name
     * @param $image
     * @param $time
     * @param $end_time
     * @param $color
     * @param $location
     * @param $description
     */
    public function __construct($name, $image, $time, $end_time, $color, $location, $description)
    {
        $this->name = $name;
        $this->image = $image;
        $this->time = $time;
        $this->end_time = $end_time;
        $this->color = $color;
        $this->location = $location;
        $this->description = $description;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getImage()
    {
        return $this->image;
    }


    public function setImage($image)
    {
        $this->image = $image;
    }


    public function getTime()
    {
        return $this->time;
    }


    public function setTime($time)
    {
        $this->time = $time;
    }


    public function getEndTime()
    {
        return $this->end_time;
    }


    public function setEndTime($end_time)
    {
        $this->end_time = $end_time;
    }


    public function getColor()
    {
        return $this->color;
    }


    public function setColor($color)
    {
        $this->color = $color;
    }


    public function getLocation()
    {
        return $this->location;
    }


    public function setLocation($location)
    {
        $this->location = $location;
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description)
    {
        $this->description = $description;
    }





}