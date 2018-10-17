<?php

namespace App\HomeBundle\Entity;

/**
 * State
 */
class State
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
     * @return State
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
     * @var \App\HomeBundle\Entity\Country
     */
    private $country;


    /**
     * Set country
     *
     * @param \App\HomeBundle\Entity\Country $country
     *
     * @return State
     */
    public function setCountry(\App\HomeBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \App\HomeBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }
}
