<?php

  require_once 'config.php';

  class Database extends Config {
    // Insert User Into Database
    public function insert($name, $office_id, $contact_no, $username, $password, $user_role_id) {
      $sql = 'INSERT INTO denr_users (name, office_id, contact_no, username, password, user_role_id) VALUES (:name, :office_id, :contact_no, :username, :password, :user_role_id)';
      $stmt = $this->conn->prepare($sql);
          $password_hash = password_hash($password, PASSWORD_BCRYPT);

      $stmt->execute([
        'name' => $name,
        'office_id' => $office_id,
        'contact_no' => $contact_no,
        'username' => $username,
        'password' => $password_hash,
        'user_role_id' => $user_role_id

      ]);
      return true;
    }




    // Fetch All Users From Database
    public function read() {

      $sql = 'SELECT `denr_users`.*, `office`.*, `user_role`.*
      FROM `denr_users` 
        LEFT JOIN `office` ON `denr_users`.`office_id` = `office`.`office_id` 
        LEFT JOIN `user_role` ON `denr_users`.`user_role_id` = `user_role`.`user_role_id`';



      // $sql = 'SELECT * FROM denr_users ORDER BY user_id ASC';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    // Fetch Single User From Database
    public function readOne($user_id) {
      $sql = 'SELECT * FROM denr_users WHERE user_id = :user_id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['user_id' => $user_id]);
      $result = $stmt->fetch();
      return $result;
    }

    // Update Single User
    public function update($user_id, $name, $office_id, $contact_no, $username, $password, $user_role_id) {
      $sql = 'UPDATE users SET name = :name, office_id = :office_id, contact_no = :contact_no, username = :username, password = :password, user_role_id = :user_role_id WHERE user_id = :user_id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'name' => $name,
        'office_id' => $office_id,
        'contact_no' => $contact_no,
        'username' => $username,
        'password' => $password,
        'user_role_id' => $user_role_id,
        'user_id' => $user_id
      ]);

      return true;
    }

    // Delete User From Database
    public function delete($user_id) {
      $sql = 'DELETE FROM denr_users WHERE user_id = :user_id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['user_id' => $user_id]);
      return true;
    }
  }

?>