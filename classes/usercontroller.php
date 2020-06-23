<?php

class UserController extends Users
{

    public function getAllUsers()
    {
        $names = $this->getRegisteredUsers();
        return $names;
    }
    public function getUsers($id)
    {
        $users = $this->showUsers($id);
        foreach ($users as $user) {
            $names = $user['user_name'];
        }

        return $names;
    }

    public function getNewUsers()
    {
        $newUsers = $this->newUsers();
        return $newUsers;
    }

    public function searchRes($search)
    {
        $result = $this->searchUser($search);
        return $result;
    }

    public function createUser($name, $email, $password, $role, $dateRegistered)
    {
        $this->saveUser($name, $email, $password, $role, $dateRegistered);
    }

    public function getDuplicateEmail($email)
    {
        $results = $this->getEmail($email);
        return $results['user_email'];
    }

    public function checkEmail($email, $id)
    {
        $results = $this->getEmailBeforeUpdate($email, $id);
        return $results;
    }

    public function getAuthUser($email)
    {
        $results = $this->getEmail($email);
        return $results;
    }


    public function checkPassword($is)
    {
        $results = $this->getPassword($is);
        return $results;
    }

    public function delete($id)
    {
        $this->deleteUser($id);
    }

    public function deleteUserPost($id)
    {
        $this->deletePost($id);
    }

    public function update($name, $email, $id)
    {
        $this->updateUser($name, $email, $id);
    }

    public function updateUserPass($password, $id)
    {
        $this->updatePassword($password, $id);
    }
}