<?php

function addUser($book) {
  global $db;

  $query = "INSERT INTO systemUser (first_name, last_name, emailAddress, password) "."VALUES (?, ?, ?, ?);";

  $statement = $db->prepare($query);
  $statement->bind_param('ssss', $systemUser['first_name'], $systemUser['last_name'], $systemUser['emailAddress'], $systemUser['password']);
  $statement->execute();
}

function getUser($first_name) {
  global $db;

  $query = "SELECT * FROM systemUser WHERE first_name = ?;";

  $statement = $db->prepare($query);
  $statement->bind_param('s', $first_name);
  $statement->execute();

  $data = array();

  $results = $statement->get_result();
  $row = $results->fetch_assoc();

  return $row;
}

function getUsers() {
  global $db;

  $query = "SELECT * FROM systemUser ORDER BY last_name ASC, first_name ASC;";

  $statement = $db->prepare($query);
  if (! empty($params)) {
    $statement->bind_param(str_repeat('s', count($params)), ...$params);
  }
  $statement->execute();

  $data = array();

  $results = $statement->get_result();
  while ($row = $results->fetch_assoc()) {
    $data[$row['first_name']] = $_SERVER['REQUEST_URI'].'/'.$row['first_name'];
  }

  return $data;
}

function removeUser($isbn) {
  global $db;

  $query = "DELETE FROM systemUser WHERE first_name = ?;";

  $statement = $db->prepare($query);
  $statement->bind_param('s', $isbn);
  $statement->execute();
}


//open database connection
$db = new mysqli("localhost", "student", "CompSci364", "budget");

header('Content-Type: application/json');
switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
    if (isset($_REQUEST['first_name']) && 0 < strlen($_REQUEST['first_name'])) {
      $data = getUser($_REQUEST['first_name']);
      if (! isset($data)) {
        http_response_code(404);
        die();
      }
    } else {
      $data = getUsers();
    }

    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    break;

  case 'POST':
    $systemUser = json_decode(file_get_contents('php://input'), true);

    // insert the book
    addUser($systemUser);

    http_response_code(201);

    // retrieve the book's record
    $systemUser = getUser($systemUser['first_name']);
    echo json_encode($systemUser, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    break;

  case 'PATCH':
    // TODO
    break;

  case 'PUT':
    // TODO
    break;

  case 'DELETE':
    if (isset($_REQUEST['first_name']) && 0 < strlen($_REQUEST['first_name'])) {
      $data = removeUser($_REQUEST['first_name']);
    }

    http_response_code(204);
    die();

    break;
}
