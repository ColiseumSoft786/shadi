<?php

namespace App\HomeBundle\Entity;

/**
 * Caste
 */
class Caste
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
     * @return Caste
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
     * @var \App\HomeBundle\Entity\Religion
     */
    private $religion;


    /**
     * Set religion
     *
     * @param \App\HomeBundle\Entity\Religion $religion
     *
     * @return Caste
     */
    public function setReligion(\App\HomeBundle\Entity\Religion $religion = null)
    {
        $this->religion = $religion;

        return $this;
    }

    /**
     * Get religion
     *
     * @return \App\HomeBundle\Entity\Religion
     */
    public function getReligion()
    {
        return $this->religion;
    }
}
