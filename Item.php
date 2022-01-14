<?php

/**
 * Item
 * @author Valeriy Filipovich <filipovich.valeriy@gmail.com>
 * @version 1.0
 */
final class Item
{
    /**
     * @var integer $id ID
     */
    private $id;

    /**
     * @var string $name Name
     */
    private $name;

    /**
     * @var integer $status Status
     */
    private $status;

    /**
     * @var boolean $changed Changed
     */
    private $changed;

    /**
     * @var boolean $isInitialized isInitialized
     */
    private $isInitialized = false;

    public function __construct($id)
    {
        echo "Конструктор<br>";
        $this->id = $id;
        $this->init();
    }

    /**
     * Class initialization function
     */
    private function init()
    {
        if($this->isInitialized === false) {
            $this->name = getObjectNameById($this->id);
            $this->status = getObjectStatusById($this->id);
            $this->isInitialized = true;
        }
    }

    public function __set($property, $value)
    {
        if ($property === 'id') {
            echo 'Error - ID cannot be changed';
        }

        if ($property === 'name') {
            if (gettype($value) === 'string') {
                $this->$property = $value;
            } else {
                echo 'Error - wrong data type';
            }
        }

        if ($property === 'status') {
            if (gettype($value) === 'integer') {
                $this->$property = $value;
            } else {
                echo 'Error - wrong data type';
            }
        }

        if ($property === 'changed') {
            if (gettype($value) === 'boolean') {
                $this->$property = $value;
            } else {
                echo 'Error - wrong data type';
            }
        }

        $this->save();
    }

    public function __get($property)
    {
        return $this->$property;
    }

    /**
     * Save data function
     */
    public function save()
    {
        updateObjectName($this->name, $this->id);
        updateObjectStatus($this->status, $this->id);
    }
}
