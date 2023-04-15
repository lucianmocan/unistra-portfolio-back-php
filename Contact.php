<?php
class Contact
{
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $content;

    function __construct($user){
        $this->firstName = htmlspecialchars($user["firstName"]);
        $this->lastName = htmlspecialchars($user["lastName"]);
        try {
            $this->email = $this->checkEmail($user["email"]);
        }
        catch (Exception $e) {
            http_response_code(406);
            echo json_encode(array("message" => "incorrect email format"));
            echo "Connection error" . $e->getMessage();
            exit;
        }
        $this->content = htmlspecialchars($user["content"]);
    }


    private function checkEmail($data) : string
    {
        if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return htmlspecialchars($data);
        }
        else {
            throw new Exception('invalid mail address !');
        }

    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return htmlspecialchars_decode($this->firstName);
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return htmlspecialchars_decode($this->lastName);
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return htmlspecialchars_decode($this->email);
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return htmlspecialchars_decode($this->content);
    }


}