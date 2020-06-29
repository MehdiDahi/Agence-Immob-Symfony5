<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Property;

class Contact {

    /**
     *
     * @var string|null 
     * @Assert\NotBlank()
     * @Assert\Length(min = 2, max = 100)
     */
    private $firstName;

    /**
     *
     * @var string|null 
     * @Assert\NotBlank()
     * @Assert\Length(min = 2, max = 100)
     */
    private $lastName;

    /**
     *
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(pattern = "/[0-9]{10}/")
     */
    private $phone;

    /**
     *
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     *
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min = 10)
     */
    private $message;

    /**
     *
     * @var Property|null
     */
    private $property;

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setMessage($message) {
        $this->message = $message;
        return $this;
    }

    public function getProperty() {
        return $this->property;
    }

    public function setProperty(Property $property) {
        $this->property = $property;
        return $this;
    }

}
