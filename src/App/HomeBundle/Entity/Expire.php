<?php

namespace App\HomeBundle\Entity;

/**
 * Expire
 */
class Expire
{
    /**
     * @var integer
     */
    private $user;

    /**
     * @var integer
     */
    private $package;

    /**
     * @var string
     */
    private $interest;

    /**
     * @var string
     */
    private $enddate;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set user
     *
     * @param integer $user
     *
     * @return Expire
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set package
     *
     * @param integer $package
     *
     * @return Expire
     */
    public function setPackage($package)
    {
        $this->package = $package;

        return $this;
    }

    /**
     * Get package
     *
     * @return integer
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * Set interest
     *
     * @param string $interest
     *
     * @return Expire
     */
    public function setInterest($interest)
    {
        $this->interest = $interest;

        return $this;
    }

    /**
     * Get interest
     *
     * @return string
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * Set enddate
     *
     * @param string $enddate
     *
     * @return Expire
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return string
     */
    public function getEnddate()
    {
        return $this->enddate;
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
     * @var string
     */
    private $currentdate;


    /**
     * Set currentdate
     *
     * @param string $currentdate
     *
     * @return Expire
     */
    public function setCurrentdate($currentdate)
    {
        $this->currentdate = $currentdate;

        return $this;
    }

    /**
     * Get currentdate
     *
     * @return string
     */
    public function getCurrentdate()
    {
        return $this->currentdate;
    }
    /**
     * @var string
     */
    private $expiredate;


    /**
     * Set expiredate
     *
     * @param string $expiredate
     *
     * @return Expire
     */
    public function setExpiredate($expiredate)
    {
        $this->expiredate = $expiredate;

        return $this;
    }

    /**
     * Get expiredate
     *
     * @return string
     */
    public function getExpiredate()
    {
        return $this->expiredate;
    }
    /**
     * @var integer
     */
    private $status;


    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Expire
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }
}
