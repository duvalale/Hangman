<?php
/**
 * Created by PhpStorm.
 * User: alexandraduval
 * Date: 01/03/2017
 * Time: 11:32
 */

namespace AppBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     * @var
     * @Assert\NotBlank()
     */
    protected $subject;

    /**
     * @var
     * @Assert\NotBlank()
     */
    protected $message;

    /**
     * @var
     * @Assert\NotBlank()
     */
    protected $email;

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }


}