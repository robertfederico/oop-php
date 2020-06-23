<?php

class UsersView extends Users
{
    public function showUser($fname)
    {
        $results = $this->getUser($fname);
        echo "Name:" . $results[0]['user_firstname'] . ' ' . $results[0]['user_lastname'] . ' ';
        echo "Date of Birth:" . $results[0]['user_dob'];
    }

    public function showAllUser()
    {
        $users = $this->getAllUser();
        return $users;
    }
}