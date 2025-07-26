<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Users List</title>
</head>
<body>
  <h1>Users</h1>
  <ul id="users-list"></ul>

  <script>
    fetch('https://jsonplaceholder.typicode.com/users')
      .then(response => response.json())
      .then(users => {
        const list = document.getElementById('users-list');
        users.forEach(user => {
          const li = document.createElement('li');
          li.textContent = `${user.name} (${user.email})`;
          list.appendChild(li);
        });
      })
      .catch(error => console.error('Error fetching users:', error));
  </script>
</body>
</html>
<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1") {
    $data = [
        "data" => [
            "message" => "wrong try to get data"
        ],
        "connection" => false,
        "message" => "wrong"
    ];
    echo json_encode($data);
} else {
    $data = [
        "data" => [
            [
                "name" => "abboud",
                "age" => 30,
                "city" => "new york"
            ],
            [
                "name" => "abdallah",
                "age" => 94,
                "city" => "egypt"
            ]
        ],
        "connection" => true,
        "message" => "data retrieved successfully"
    ];
    echo json_encode($data);
}
