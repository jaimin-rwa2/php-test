<?php
require "config.php";


class User
{

    public $username;
    public $password;
    public $email;
    public $age;

    public function __construct($username, $password, $email, $age)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->age = $age;
    }
}


class UserTable
{

    public $conn;


    public function __construct()
    {
        $this->conn = connect_db();
    }

    public function create_user($user)
    {
        $query = "INSERT INTO user (username, password, email, age) VALUES ('$user->username', '$user->password', '$user->email', '$user->age')";

        if ($this->conn) {
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            return "connection is not established";
        }
    }

    public function get_users()
    {
        $query = "SELECT username, password, email, age FROM user;";

        if ($this->conn) {
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                // $user_data = [];
                // while($user = mysqli_fetch_assoc($result)){
                //     $user_data[] = $user;  // stored in the form of array
                // }
                return $result;
            } else {
                return false;
            }
        } else {
            return "connection is not established";
        }
    }

    public function get_user_by_id($id)
    {
        if ($this->conn) {
            $query = "SELECT username, password, email, age FROM user where id = $id;";
            $result = mysqli_query($this->conn, $query);

            if ($result) {
                return $result;
            } else {
                return false;
            }
        } else {
            return "connection is not established";
        }
    }

    public function update_user_by_id($id, $username = null, $password = null, $email = null, $age = null)
    {

        $user_data = $this->get_user_by_id($this->conn, $id);

        if ($username == null) {
            $username = $user_data['username'];
        }
        if ($password == null) {
            $password = $user_data['password'];
        }
        if ($email == null) {
            $email = $user_data['email'];
        }
        if ($age == null) {
            $age = $user_data['age'];
        }

        $query = "UPDATE user SET username='$username', password='$password', email='$email', age=$age  where id = $id;";


        if ($this->conn) {
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return $result;
            } else {
                return false;
            }
        } else {
            return "connection is not established";
        }
    }
}
