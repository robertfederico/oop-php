<?php
// takes care of all the database connection
class Users extends Dbh
{
    // examples
    // public function getAllUser()
    // {
    //     $sql = "SELECT * FROM users ORDER BY users_id DESC";
    //     $stmt = $this->connect()->query($sql);
    //     $names = $stmt->fetchAll();
    //     return $names;
    // }

    // protected function getUser($fname)
    // {
    //     $sql = "SELECT * FROM users WHERE user_firstname = ?";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->execute([$fname]);
    //     $results = $stmt->fetchAll();
    //     return $results;
    // }

    // protected function setUser($fname, $lname, $dob)
    // {
    //     $sql = "INSERT INTO users(user_firstname,user_lastname,user_dob)VALUES(?,?,?)";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->execute([$fname, $lname, $dob]);
    // }

    // protected function delete($id)
    // {
    //     $sql = "DELETE FROM users WHERE users_id = ?";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->execute([$id]);
    // }

    // protected function update($fname, $lname, $dob, $id)
    // {
    //     $sql = "UPDATE users SET user_firstname = ? ,user_lastname = ?,user_dob = ? WHERE users_id = ?";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->execute([$fname, $lname, $dob, $id]);
    // }

    //*/ start here 
    public function getRegisteredUsers()
    {
        $sql = "SELECT * FROM tbl_users WHERE user_role != 'admin'  ORDER BY id DESC";
        $stmt = $this->connect()->query($sql);
        $names = $stmt->fetchAll();
        return $names;
    }

    public function showUsers($id)
    {
        $sql = "SELECT * FROM tbl_users WHERE id =?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $names = $stmt->fetchAll();
        return $names;
    }

    public function newUsers()
    {
        $sql = "SELECT * FROM tbl_users ORDER BY id DESC";
        $stmt = $this->connect()->query($sql);
        $newUsers = $stmt->fetchAll();
        return $newUsers;
    }

    protected function searchUser($search)
    {
        $searchContent = "%" . $search . "%";

        $sql = "SELECT * FROM tbl_users WHERE `user_name` LIKE ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$searchContent]);
        $results = $stmt->fetchAll();
        return $results;
    }

    // public function GetTableData($query)
    // {
    //     $stmt = $this->connect()->query($query);
    //     $results = $stmt->fetchAll();
    //     return $results;
    // }

    protected function saveUser($name, $email, $password, $role, $dateRegistered)
    {
        $sql = "INSERT INTO tbl_users(`user_name`, user_email, user_password, user_role, date_registered)VALUES(?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $email, $password, $role, $dateRegistered]);
    }

    protected function getEmail($email)
    {
        $sql = "SELECT * FROM tbl_users WHERE user_email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $results = $stmt->fetch();
        return $results;
    }

    protected function getPassword($id)
    {
        $sql = "SELECT * FROM tbl_users WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $results = $stmt->fetch();
        return $results;
    }


    protected function updatePassword($password, $id)
    {
        $sql = "UPDATE tbl_users SET `user_password` = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$password, $id]);
    }

    protected function getEmailBeforeUpdate($email, $id)
    {
        $sql = "SELECT * FROM tbl_users WHERE user_email = ? AND id != ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email, $id]);
        $results = $stmt->fetch();
        return $results;
    }


    protected function deleteUser($id)
    {
        $sql = "DELETE FROM tbl_users WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    protected function updateUser($name, $email, $id)
    {
        $sql = "UPDATE tbl_users SET `user_name` = ? ,user_email = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $email, $id]);
    }

    // check if user has post 
    public function hasPost($id)
    {
        $sql = "SELECT * FROM tbl_posts INNER JOIN 
        tbl_users ON tbl_posts.user_id = tbl_users.id 
        WHERE tbl_categories.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function deletePost($id)
    {
        $sql = "DELETE FROM tbl_posts WHERE `user_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}