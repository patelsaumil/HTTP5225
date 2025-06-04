<?php
function getUsers() {
    $url = "https://jsonplaceholder.typicode.com/users";
    $data = file_get_contents($url);
    return json_decode($data, true);
}

$users = getUsers();

for ($i = 0; $i < count($users); $i++) {
    $id = $users[$i]['id'];
    $name = $users[$i]['name'];
    $email = $users[$i]['email'];
    $city = $users[$i]['address']['city'];

    echo "ID: $id (Type: " . gettype($id) . ")\n";
    echo "Name: $name (Type: " . gettype($name) . ")\n";
    echo "Email: $email (Type: " . gettype($email) . ")\n";
    echo "City: $city (Type: " . gettype($city) . ")\n";
    echo "------------------\n";
}
?>
