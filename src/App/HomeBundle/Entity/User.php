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
    /**
     * @var boolean
     */
    private $approve;

    /**
     * @var string
     */
    private $upic;

    /**
     * @var string
     */
    private $uname;

    /**
     * @var string
     */
    private $uphone;

    /**
     * @var string
     */
    private $ugender;

    /**
     * @var string
     */
    private $umartialstatus;

    /**
     * @var string
     */
    private $uage;

    /**
     * @var string
     */
    private $uheight;

    /**
     * @var string
     */
    private $ujobbusinesstitle;

    /**
     * @var string
     */
    private $ujobbusiness;

    /**
     * @var string
     */
    private $uincome;

    /**
     * @var string
     */
    private $color;

    /**
     * @var string
     */
    private $ubodytype;

    /**
     * @var string
     */
    private $uride;

    /**
     * @var string
     */
    private $bearhijab;

    /**
     * @var string
     */
    private $ubrothers;

    /**
     * @var string
     */
    private $usisters;

    /**
     * @var string
     */
    private $umarriedsisters;

    /**
     * @var string
     */
    private $umarriedbrothers;

    /**
     * @var string
     */
    private $umothertongue;

    /**
     * @var string
     */
    private $uaccommodation;

    /**
     * @var string
     */
    private $uaccommodationstatus;

    /**
     * @var string
     */
    private $uhousesize;

    /**
     * @var string
     */
    private $lpminage;

    /**
     * @var string
     */
    private $lpmaxage;

    /**
     * @var string
     */
    private $lpheight;

    /**
     * @var string
     */
    private $lpmessage;

    /**
     * @var string
     */
    private $key;

    /**
     * @var \App\HomeBundle\Entity\Ocupation
     */
    private $ufatherocupation;

    /**
     * @var \App\HomeBundle\Entity\Ocupation
     */
    private $umotherocupation;

    /**
     * @var \App\HomeBundle\Entity\Caste
     */
    private $lpcaste;

    /**
     * @var \App\HomeBundle\Entity\City
     */
    private $lpcity;

    /**
     * @var \App\HomeBundle\Entity\Country
     */
    private $lpcountry;

    /**
     * @var \App\HomeBundle\Entity\Religion
     */
    private $lpreligion;

    /**
     * @var \App\HomeBundle\Entity\State
     */
    private $lpstate;


    /**
     * Set approve
     *
     * @param boolean $approve
     *
     * @return User
     */
    public function setApprove($approve)
    {
        $this->approve = $approve;

        return $this;
    }

    /**
     * Get approve
     *
     * @return boolean
     */
    public function getApprove()
    {
        return $this->approve;
    }

    /**
     * Set upic
     *
     * @param string $upic
     *
     * @return User
     */
    public function setUpic($upic)
    {
        $this->upic = $upic;

        return $this;
    }

    /**
     * Get upic
     *
     * @return string
     */
    public function getUpic()
    {
        return $this->upic;
    }

    /**
     * Set uname
     *
     * @param string $uname
     *
     * @return User
     */
    public function setUname($uname)
    {
        $this->uname = $uname;

        return $this;
    }

    /**
     * Get uname
     *
     * @return string
     */
    public function getUname()
    {
        return $this->uname;
    }

    /**
     * Set uphone
     *
     * @param string $uphone
     *
     * @return User
     */
    public function setUphone($uphone)
    {
        $this->uphone = $uphone;

        return $this;
    }

    /**
     * Get uphone
     *
     * @return string
     */
    public function getUphone()
    {
        return $this->uphone;
    }

    /**
     * Set ugender
     *
     * @param string $ugender
     *
     * @return User
     */
    public function setUgender($ugender)
    {
        $this->ugender = $ugender;

        return $this;
    }

    /**
     * Get ugender
     *
     * @return string
     */
    public function getUgender()
    {
        return $this->ugender;
    }

    /**
     * Set umartialstatus
     *
     * @param string $umartialstatus
     *
     * @return User
     */
    public function setUmartialstatus($umartialstatus)
    {
        $this->umartialstatus = $umartialstatus;

        return $this;
    }

    /**
     * Get umartialstatus
     *
     * @return string
     */
    public function getUmartialstatus()
    {
        return $this->umartialstatus;
    }

    /**
     * Set uage
     *
     * @param string $uage
     *
     * @return User
     */
    public function setUage($uage)
    {
        $this->uage = $uage;

        return $this;
    }

    /**
     * Get uage
     *
     * @return string
     */
    public function getUage()
    {
        return $this->uage;
    }

    /**
     * Set uheight
     *
     * @param string $uheight
     *
     * @return User
     */
    public function setUheight($uheight)
    {
        $this->uheight = $uheight;

        return $this;
    }

    /**
     * Get uheight
     *
     * @return string
     */
    public function getUheight()
    {
        return $this->uheight;
    }

    /**
     * Set ujobbusinesstitle
     *
     * @param string $ujobbusinesstitle
     *
     * @return User
     */
    public function setUjobbusinesstitle($ujobbusinesstitle)
    {
        $this->ujobbusinesstitle = $ujobbusinesstitle;

        return $this;
    }

    /**
     * Get ujobbusinesstitle
     *
     * @return string
     */
    public function getUjobbusinesstitle()
    {
        return $this->ujobbusinesstitle;
    }

    /**
     * Set ujobbusiness
     *
     * @param string $ujobbusiness
     *
     * @return User
     */
    public function setUjobbusiness($ujobbusiness)
    {
        $this->ujobbusiness = $ujobbusiness;

        return $this;
    }

    /**
     * Get ujobbusiness
     *
     * @return string
     */
    public function getUjobbusiness()
    {
        return $this->ujobbusiness;
    }

    /**
     * Set uincome
     *
     * @param string $uincome
     *
     * @return User
     */
    public function setUincome($uincome)
    {
        $this->uincome = $uincome;

        return $this;
    }

    /**
     * Get uincome
     *
     * @return string
     */
    public function getUincome()
    {
        return $this->uincome;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return User
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set ubodytype
     *
     * @param string $ubodytype
     *
     * @return User
     */
    public function setUbodytype($ubodytype)
    {
        $this->ubodytype = $ubodytype;

        return $this;
    }

    /**
     * Get ubodytype
     *
     * @return string
     */
    public function getUbodytype()
    {
        return $this->ubodytype;
    }

    /**
     * Set uride
     *
     * @param string $uride
     *
     * @return User
     */
    public function setUride($uride)
    {
        $this->uride = $uride;

        return $this;
    }

    /**
     * Get uride
     *
     * @return string
     */
    public function getUride()
    {
        return $this->uride;
    }

    /**
     * Set bearhijab
     *
     * @param string $bearhijab
     *
     * @return User
     */
    public function setBearhijab($bearhijab)
    {
        $this->bearhijab = $bearhijab;

        return $this;
    }

    /**
     * Get bearhijab
     *
     * @return string
     */
    public function getBearhijab()
    {
        return $this->bearhijab;
    }

    /**
     * Set ubrothers
     *
     * @param string $ubrothers
     *
     * @return User
     */
    public function setUbrothers($ubrothers)
    {
        $this->ubrothers = $ubrothers;

        return $this;
    }

    /**
     * Get ubrothers
     *
     * @return string
     */
    public function getUbrothers()
    {
        return $this->ubrothers;
    }

    /**
     * Set usisters
     *
     * @param string $usisters
     *
     * @return User
     */
    public function setUsisters($usisters)
    {
        $this->usisters = $usisters;

        return $this;
    }

    /**
     * Get usisters
     *
     * @return string
     */
    public function getUsisters()
    {
        return $this->usisters;
    }

    /**
     * Set umarriedsisters
     *
     * @param string $umarriedsisters
     *
     * @return User
     */
    public function setUmarriedsisters($umarriedsisters)
    {
        $this->umarriedsisters = $umarriedsisters;

        return $this;
    }

    /**
     * Get umarriedsisters
     *
     * @return string
     */
    public function getUmarriedsisters()
    {
        return $this->umarriedsisters;
    }

    /**
     * Set umarriedbrothers
     *
     * @param string $umarriedbrothers
     *
     * @return User
     */
    public function setUmarriedbrothers($umarriedbrothers)
    {
        $this->umarriedbrothers = $umarriedbrothers;

        return $this;
    }

    /**
     * Get umarriedbrothers
     *
     * @return string
     */
    public function getUmarriedbrothers()
    {
        return $this->umarriedbrothers;
    }

    /**
     * Set umothertongue
     *
     * @param string $umothertongue
     *
     * @return User
     */
    public function setUmothertongue($umothertongue)
    {
        $this->umothertongue = $umothertongue;

        return $this;
    }

    /**
     * Get umothertongue
     *
     * @return string
     */
    public function getUmothertongue()
    {
        return $this->umothertongue;
    }

    /**
     * Set uaccommodation
     *
     * @param string $uaccommodation
     *
     * @return User
     */
    public function setUaccommodation($uaccommodation)
    {
        $this->uaccommodation = $uaccommodation;

        return $this;
    }

    /**
     * Get uaccommodation
     *
     * @return string
     */
    public function getUaccommodation()
    {
        return $this->uaccommodation;
    }

    /**
     * Set uaccommodationstatus
     *
     * @param string $uaccommodationstatus
     *
     * @return User
     */
    public function setUaccommodationstatus($uaccommodationstatus)
    {
        $this->uaccommodationstatus = $uaccommodationstatus;

        return $this;
    }

    /**
     * Get uaccommodationstatus
     *
     * @return string
     */
    public function getUaccommodationstatus()
    {
        return $this->uaccommodationstatus;
    }

    /**
     * Set uhousesize
     *
     * @param string $uhousesize
     *
     * @return User
     */
    public function setUhousesize($uhousesize)
    {
        $this->uhousesize = $uhousesize;

        return $this;
    }

    /**
     * Get uhousesize
     *
     * @return string
     */
    public function getUhousesize()
    {
        return $this->uhousesize;
    }

    /**
     * Set lpminage
     *
     * @param string $lpminage
     *
     * @return User
     */
    public function setLpminage($lpminage)
    {
        $this->lpminage = $lpminage;

        return $this;
    }

    /**
     * Get lpminage
     *
     * @return string
     */
    public function getLpminage()
    {
        return $this->lpminage;
    }

    /**
     * Set lpmaxage
     *
     * @param string $lpmaxage
     *
     * @return User
     */
    public function setLpmaxage($lpmaxage)
    {
        $this->lpmaxage = $lpmaxage;

        return $this;
    }

    /**
     * Get lpmaxage
     *
     * @return string
     */
    public function getLpmaxage()
    {
        return $this->lpmaxage;
    }

    /**
     * Set lpheight
     *
     * @param string $lpheight
     *
     * @return User
     */
    public function setLpheight($lpheight)
    {
        $this->lpheight = $lpheight;

        return $this;
    }

    /**
     * Get lpheight
     *
     * @return string
     */
    public function getLpheight()
    {
        return $this->lpheight;
    }

    /**
     * Set lpmessage
     *
     * @param string $lpmessage
     *
     * @return User
     */
    public function setLpmessage($lpmessage)
    {
        $this->lpmessage = $lpmessage;

        return $this;
    }

    /**
     * Get lpmessage
     *
     * @return string
     */
    public function getLpmessage()
    {
        return $this->lpmessage;
    }

    /**
     * Set key
     *
     * @param string $key
     *
     * @return User
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set ufatherocupation
     *
     * @param \App\HomeBundle\Entity\Ocupation $ufatherocupation
     *
     * @return User
     */
    public function setUfatherocupation(\App\HomeBundle\Entity\Ocupation $ufatherocupation = null)
    {
        $this->ufatherocupation = $ufatherocupation;

        return $this;
    }

    /**
     * Get ufatherocupation
     *
     * @return \App\HomeBundle\Entity\Ocupation
     */
    public function getUfatherocupation()
    {
        return $this->ufatherocupation;
    }

    /**
     * Set umotherocupation
     *
     * @param \App\HomeBundle\Entity\Ocupation $umotherocupation
     *
     * @return User
     */
    public function setUmotherocupation(\App\HomeBundle\Entity\Ocupation $umotherocupation = null)
    {
        $this->umotherocupation = $umotherocupation;

        return $this;
    }

    /**
     * Get umotherocupation
     *
     * @return \App\HomeBundle\Entity\Ocupation
     */
    public function getUmotherocupation()
    {
        return $this->umotherocupation;
    }

    /**
     * Set lpcaste
     *
     * @param \App\HomeBundle\Entity\Caste $lpcaste
     *
     * @return User
     */
    public function setLpcaste(\App\HomeBundle\Entity\Caste $lpcaste = null)
    {
        $this->lpcaste = $lpcaste;

        return $this;
    }

    /**
     * Get lpcaste
     *
     * @return \App\HomeBundle\Entity\Caste
     */
    public function getLpcaste()
    {
        return $this->lpcaste;
    }

    /**
     * Set lpcity
     *
     * @param \App\HomeBundle\Entity\City $lpcity
     *
     * @return User
     */
    public function setLpcity(\App\HomeBundle\Entity\City $lpcity = null)
    {
        $this->lpcity = $lpcity;

        return $this;
    }

    /**
     * Get lpcity
     *
     * @return \App\HomeBundle\Entity\City
     */
    public function getLpcity()
    {
        return $this->lpcity;
    }

    /**
     * Set lpcountry
     *
     * @param \App\HomeBundle\Entity\Country $lpcountry
     *
     * @return User
     */
    public function setLpcountry(\App\HomeBundle\Entity\Country $lpcountry = null)
    {
        $this->lpcountry = $lpcountry;

        return $this;
    }

    /**
     * Get lpcountry
     *
     * @return \App\HomeBundle\Entity\Country
     */
    public function getLpcountry()
    {
        return $this->lpcountry;
    }

    /**
     * Set lpreligion
     *
     * @param \App\HomeBundle\Entity\Religion $lpreligion
     *
     * @return User
     */
    public function setLpreligion(\App\HomeBundle\Entity\Religion $lpreligion = null)
    {
        $this->lpreligion = $lpreligion;

        return $this;
    }

    /**
     * Get lpreligion
     *
     * @return \App\HomeBundle\Entity\Religion
     */
    public function getLpreligion()
    {
        return $this->lpreligion;
    }

    /**
     * Set lpstate
     *
     * @param \App\HomeBundle\Entity\State $lpstate
     *
     * @return User
     */
    public function setLpstate(\App\HomeBundle\Entity\State $lpstate = null)
    {
        $this->lpstate = $lpstate;

        return $this;
    }

    /**
     * Get lpstate
     *
     * @return \App\HomeBundle\Entity\State
     */
    public function getLpstate()
    {
        return $this->lpstate;
    }
    /**
     * @var integer
     */
    private $userid;


    /**
     * Set userid
     *
     * @param integer $userid
     *
     * @return User
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @var string
     */
    private $password;


    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * @var boolean
     */
    private $verifykey;


    /**
     * Set verifykey
     *
     * @param boolean $verifykey
     *
     * @return User
     */
    public function setVerifykey($verifykey)
    {
        $this->verifykey = $verifykey;

        return $this;
    }

    /**
     * Get verifykey
     *
     * @return boolean
     */
    public function getVerifykey()
    {
        return $this->verifykey;
    }
    /**
     * @var boolean
     */
    private $delete;


    /**
     * Set delete
     *
     * @param boolean $delete
     *
     * @return User
     */
    public function setDelete($delete)
    {
        $this->delete = $delete;

        return $this;
    }

    /**
     * Get delete
     *
     * @return boolean
     */
    public function getDelete()
    {
        return $this->delete;
    }
    /**
     * @var string
     */
    private $block;


    /**
     * Set block
     *
     * @param string $block
     *
     * @return User
     */
    public function setBlock($block)
    {
        $this->block = $block;

        return $this;
    }

    /**
     * Get block
     *
     * @return string
     */
    public function getBlock()
    {
        return $this->block;
    }
    /**
     * @var string
     */
    private $startdate;


    /**
     * Set startdate
     *
     * @param string $startdate
     *
     * @return User
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return string
     */
    public function getStartdate()
    {
        return $this->startdate;
    }
    /**
     * @var string
     */
    private $privacy;


    /**
     * Set privacy
     *
     * @param string $privacy
     *
     * @return User
     */
    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy;

        return $this;
    }

    /**
     * Get privacy
     *
     * @return string
     */
    public function getPrivacy()
    {
        return $this->privacy;
    }
}
