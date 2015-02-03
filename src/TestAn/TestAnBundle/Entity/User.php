<?php

namespace TestAn\TestAnBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validation\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @author User
 */
class User implements UserInterface{
    
    /**
     * @var integer
     * @ORM\Column(type="integer", unique=true, name="id")
     * @ORM\id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     * @ORM\Column(type="string", nullable=false, name="login")
     * @NotBlank()
     * @Regex("/^[a-zA-Z0-9_]+$/")
     */
    private $login;
    
    /**
     * @ORM\ManyToOne(targetEntity="Groups",inversedBy="users")
     * @ORM\JoinColumn(name="groupId", referencedColumnName="id")
     */
    private $group;
    
    /**
     * @var string
     * @Email()
     * @ORM\Column(name="email", type="string")
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(name="password", type="string")
     */
    private $password;
    
    /**
     *@ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;
    
    function __construct() {
        $this->isActive = true;
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
     * Set login
     *
     * @param \String $login
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return \String 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set email
     *
     * @param string $email
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
     * Set group
     *
     * @param \TestAn\TestAnBundle\Entity\Groups $group
     * @return User
     */
    public function setGroup(\TestAn\TestAnBundle\Entity\Groups $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \TestAn\TestAnBundle\Entity\Groups 
     */
    public function getGroup()
    {
        return $this->group;
    }
    
    public function eraseCredentials()
    {}

    public function getPassword() {
        
        return $this->password;
        
    }

    public function getRoles() {
        
        return array('ROLE_USER');
    }

    public function getSalt() {
        
        return null;
        
    }

    public function getUsername() {
        
        return $this->login;
        
    }


    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
}
