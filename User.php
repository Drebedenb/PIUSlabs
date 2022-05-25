<?php

use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Validation;

class User
{
    private DateTime $creationDate;

    private function printErrors($violations)
    {
        foreach ($violations as $violation) {
            echo $violation->getMessage() . '<br>';
        }
    }

    public function __construct($id, $name, $email, $password)
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate($id, [
            new NotBlank(),
            new Positive()
        ]);
        if (count($violations) == 0) {
            $this->id = $id;
        } else {
            $this->printErrors($violations);
        }


        $violations = $validator->validate($name, [
            new NotBlank(),
            new Length(['min' => 2, 'max' => 20])
        ]);
        if (count($violations) == 0) {
            $this->name = $name;
        } else {
            $this->printErrors($violations);
        }

        $violations = $validator->validate($email, [
            new NotBlank(),
            new Email(),
        ]);
        if (count($violations) == 0) {
            $this->email = $email;
        } else {
            $this->printErrors($violations);
        }

        $violations = $validator->validate($password, [
            new NotBlank(),
            new Length(['min' => 2, 'max' => 20]),
        ]);
        if (count($violations) == 0) {
            $this->password = $password;
        } else {
            $this->printErrors($violations);
        }

        $this->creationDate = new DateTime();

    }

    public function getDate()
    {
        return $this->creationDate;
    }
}