<?php

namespace App\HomeBundle\Entity;

/**
 * City
 */
class City
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return City
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var \App\HomeBundle\Entity\State
     */
    private $state;


    /**
     * Set state
     *
     * @param \App\HomeBundle\Entity\State $state
     *
     * @return City
     */
    public function setState(\App\HomeBundle\Entity\State $state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \App\HomeBundle\Entity\State
     */
    public function getState()
    {
        return $this->state;
    }
}
