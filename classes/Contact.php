<?php
class Contact
{
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $content;

    function __construct($user){
        if (is_string($user["firstName"]) && is_string($user["lastName"])
            && is_string($user["email"]) && is_string($user["content"])
            && strlen($user["firstName"]) > 0 && strlen($user["firstName"]) <= 255
            && strlen($user["lastName"]) > 0 && strlen($user["lastName"]) <= 255
            && strlen($user["content"]) > 0 && strlen($user["content"]) <= 255) {
                $this->firstName = htmlspecialchars($user["firstName"]);
                $this->lastName = htmlspecialchars($user["lastName"]);
                $this->content = htmlspecialchars($user["content"]);
            try {
                $this->email = $this->checkEmail($user["email"]);
            } catch (Exception $e) {
                http_response_code(406);
                echo json_encode(array("message" => "incorrect email format"));
                echo "Connection error" . $e->getMessage();
                exit;
            }
        }
        else {
            http_response_code(406);
            echo json_encode(array("message" => "string size should be between 0 and 255"));
            exit;
        }
    }


    private function checkEmail($data) : string
    {
        if (filter_var($data, FILTER_VALIDATE_EMAIL) && strlen($data) <= 255) {
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