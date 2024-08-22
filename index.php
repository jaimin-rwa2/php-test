<?php
require "users.php";



$user = new User("jaimin", "jaimin123", "jaimin@gmail.com", 24);
$user_table = new UserTable();

// to create a new user
// $result = $user_table->create_user($user);


// to print all the users
// $result = $user_table->get_users();
// $user_data = [];
// while($user = mysqli_fetch_assoc($result)){
//     $user_data[] = $user;  // stored in the form of array
// }
// echo json_encode($user_data, JSON_PRETTY_PRINT);


// to print single  user
$result = $user_table->get_users(2);
echo var_dump($result);


?>  