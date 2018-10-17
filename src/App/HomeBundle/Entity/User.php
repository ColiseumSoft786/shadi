<?php

namespace App\HomeBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \App\HomeBundle\Entity\Admin
     */
    private $admin;

    /**
     * @var \App\HomeBundle\Entity\Caste
     */
    private $caste;

    /**
     * @var \App\HomeBundle\Entity\City
     */
    private $city;

    /**
     * @var \App\HomeBundle\Entity\Country
     */
    private $country;

    /**
     * @var \App\HomeBundle\Entity\Education
     */
    private $education;

    /**
     * @var \App\HomeBundle\Entity\Ocupation
     */
    private $ocupation;

    /**
     * @var \App\HomeBundle\Entity\Religion
     */
    private $religion;

    /**
     * @var \App\HomeBundle\Entity\State
     */
    private $state;


    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
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
     * Set admin
     *
     * @param \App\HomeBundle\Entity\Admin $admin
     *
     * @return User
     */
    public function setAdmin(\App\HomeBundle\Entity\Admin $admin = null)
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get admin
     *
     * @return \App\HomeBundle\Entity\Admin
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set caste
     *
     * @param \App\HomeBundle\Entity\Caste $caste
     *
     * @return User
     */
    public function setCaste(\App\HomeBundle\Entity\Caste $caste = null)
    {
        $this->caste = $caste;

        return $this;
    }

    /**
     * Get caste
     *
     * @return \App\HomeBundle\Entity\Caste
     */
    public function getCaste()
    {
        return $this->caste;
    }

    /**
     * Set city
     *
     * @param \App\HomeBundle\Entity\City $city
     *
     * @return User
     */
    public function setCity(\App\HomeBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \App\HomeBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param \App\HomeBundle\Entity\Country $country
     *
     * @return User
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

    /**
     * Set education
     *
     * @param \App\HomeBundle\Entity\Education $education
     *
     * @return User
     */
    public function setEducation(\App\HomeBundle\Entity\Education $education = null)
    {
        $this->education = $education;

        return $this;
    }

    /**
     * Get education
     *
     * @return \App\HomeBundle\Entity\Education
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Set ocupation
     *
     * @param \App\HomeBundle\Entity\Ocupation $ocupation
     *
     * @return User
     */
    public function setOcupation(\App\HomeBundle\Entity\Ocupation $ocupation = null)
    {
        $this->ocupation = $ocupation;

        return $this;
    }

    /**
     * Get ocupation
     *
     * @return \App\HomeBundle\Entity\Ocupation
     */
    public function getOcupation()
    {
        return $this->ocupation;
    }

    /**
     * Set religion
     *
     * @param \App\HomeBundle\Entity\Religion $religion
     *
     * @return User
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

    /**
     * Set state
     *
     * @param \App\HomeBundle\Entity\State $state
     *
     * @return User
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
    /**
     * @var \App\HomeBundle\Entity\Subadmin
     */
    private $subadmin;


    /**
     * Set subadmin
     *
     * @param \App\HomeBundle\Entity\Subadmin $subadmin
     *
     * @return User
     */
    public function setSubadmin(\App\HomeBundle\Entity\Subadmin $subadmin = null)
    {
        $this->subadmin = $subadmin;

        return $this;
    }

    /**
     * Get subadmin
     *
     * @return \App\HomeBundle\Entity\Subadmin
     */
    public function getSubadmin()
    {
        return $this->subadmin;
    }
}
