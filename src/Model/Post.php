<?php

namespace Danil\Model;


class Post
{
    private $id;
    private $photo;
    private $description;

    /**
     * Post constructor.
     * @param $id
     * @param $photo
     * @param $description
     */
    public function __construct($id = '', $photo = '', $description = '')
    {
        $this->id = $id;
        $this->photo = $photo;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }




}