<?php
class Users extends Model{
	public function emailExists($email){
		$sql = "SELECT * FROM users WHERE email = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function validate($email, $pass){
		$uid = '';
		$sql = "SELECT * FROM users WHERE email = :email AND password = :pass";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":pass", $pass);
		$sql->execute();
		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			$uid = $sql['id'];
		}
		return $uid;
	}
	public function createUser($name, $email, $pass){
		$sql = "INSERT INTO users SET name = :name, email = :email, password = :pass";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":name", $name);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":pass", $pass);
		$sql->execute();

		return $this->db->lastInsertId();
	}
}