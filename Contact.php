<?php

class Contact
{
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $content;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }


}