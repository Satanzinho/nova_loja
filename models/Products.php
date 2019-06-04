<?php
class Products extends Model {
	public function getList($offset = 0, $limit = 3){
		$array = array();
		//entenda melhor subcares na aula "Criando a home 1"
		$sql = "SELECT *, (select brands.name from brands where brands.id = products.id_brand) as brand_name, (select categories.name from categories where id = products.id_category) as category_name FROM products LIMIT $offset, $limit";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
			foreach($array as $key => $item){
				$array[$key]['images'] = $this->getImagesByProductId($item['id']);
			}
		}
		return $array;
	}
	public function getTotal(){
		$sql = "SELECT COUNT(*) as c FROM products";
		$sql = $this->db->query($sql);
		$sql = $sql->fetch();
		return $sql['c'];
	}
	public function getImagesByProductId($id){
		$array = array();
		$sql = "SELECT * FROM products_images WHERE id_product = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}
}