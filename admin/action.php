<?php

  require_once 'function.php';
  require_once 'util.php';

  $db = new Database;
  $util = new Util;

  // Handle Add New User Ajax Request
  if (isset($_POST['add'])) {
    $name = $util->testInput($_POST['name']);
    $office_id = $util->testInput($_POST['office_id']);
    $contact_no = $util->testInput($_POST['contact_no']);
    $username = $util->testInput($_POST['username']);
    $password = $util->testInput($_POST['password']);
    $user_role_id = $util->testInput($_POST['Rolw_id2']);


    if ($db->insert($name, $office_id, $contact_no, $username, $password, $user_role_id)) {
      echo $util->showMessage('success', 'User successfully Added!');
    } else {
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }

  // Handle Fetch All Users Ajax Request
  if (isset($_GET['read'])) {
    $users = $db->read();
    $output = '';
    if ($users) {
      foreach ($users as $row) {
        $output .= '<tr>
                      <td>' . $row['user_id'] . '</td>
                      <td>' . $row['name'] . '</td>
                      <td>' . $row['office_name'] . '</td>
                      <td>' . $row['contact_no'] . '</td>
                      <td>' . $row['username'] . '</td>
                      <td>' . $row['role'] . '</td>
                      <td>
                        <a href="#" user_id="' . $row['user_id'] . '" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-toggle="modal" data-target="#editUserModal">Edit</a>

                        <a href="#" user_id="' . $row['user_id'] . '" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink">Delete</a>
                      </td>
                    </tr>';
      }
      echo $output;
    } else {
      echo '<tr>
              <td colspan="6">No Users Found in the Database!</td>
            </tr>';
    }
  }

  // Handle Edit User Ajax Request
  if (isset($_GET['edit'])) {
    $user_id = $_GET['user_id'];

    $user_id = $db->readOne($user_id);
    echo json_encode($user_id);
  }

  // Handle Update User Ajax Request
  if (isset($_POST['update'])) {
    $user_id = $util->testInput($_POST['user_id']);
    $name = $util->testInput($_POST['name']);
    $office_id = $util->testInput($_POST['office_id']);
    $contact_no = $util->testInput($_POST['contact_no']);
    $username = $util->testInput($_POST['username']);
    $password = $util->testInput($_POST['password']);
    $user_role_id = $util->testInput($_POST['Rolw_id2']);

    if ($db->update($name, $office_id, $contact_no, $username, $password, $user_role_id)) {
      echo $util->showMessage('success', 'User updated successfully!');
    } else {
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }

  // Handle Delete User Ajax Request
  if (isset($_GET['delete'])) {
    $user_id = $_GET['user_id'];
    if ($db->delete($user_id)) {
      echo $util->showMessage('info', 'User deleted successfully!');
    } else {
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }

?>