<?php

namespace App\HomeBundle\Entity;

/**
 * Interest
 */
class Interest
{
    /**
     * @var integer
     */
    private $sendby;

    /**
     * @var boolean
     */
    private $accept;

    /**
     * @var string
     */
    private $date;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \App\HomeBundle\Entity\User
     */
    private $sendto;


    /**
     * Set sendby
     *
     * @param integer $sendby
     *
     * @return Interest
     */
    public function setSendby($sendby)
    {
        $this->sendby = $sendby;

        return $this;
    }

    /**
     * Get sendby
     *
     * @return integer
     */
    public function getSendby()
    {
        return $this->sendby;
    }

    /**
     * Set accept
     *
     * @param boolean $accept
     *
     * @return Interest
     */
    public function setAccept($accept)
    {
        $this->accept = $accept;

        return $this;
    }

    /**
     * Get accept
     *
     * @return boolean
     */
    public function getAccept()
    {
        return $this->accept;
    }

    /**
     * Set date
     *
     * @param string $date
     *
     * @return Interest
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
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
     * Set sendto
     *
     * @param \App\HomeBundle\Entity\User $sendto
     *
     * @return Interest
     */
    public function setSendto(\App\HomeBundle\Entity\User $sendto = null)
    {
        $this->sendto = $sendto;

        return $this;
    }

    /**
     * Get sendto
     *
     * @return \App\HomeBundle\Entity\User
     */
    public function getSendto()
    {
        return $this->sendto;
    }
}
