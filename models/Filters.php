<?php
class Filters extends Model{
	public function getFilters($filters){
		$products = new Products();
		$brands = new Brands();
		$array = array(
			'searchTerm' => '',
			'brands' => array(),
			'slider0' => 0,
			'slider1' => 0,
			'maxSlider' => 1000,
			'stars' => array(
				'0' => 0,
				'1' => 0,
				'2' => 0,
				'3' => 0,
				'4' => 0,
				'5' => 0
			),
			'sale' => 0,
			'options' => array()
		);
		if(isset($filters['searchTerm'])){
			$array['searchTerm'] = $filters['searchTerm'];
		}
		//Filtro de marcas
		$array['brands'] = $brands->getList();
		$brand_products = $products->getListOfBrands($filters);
		//Caso queira entender a fundo, volte na aula "Implementação do filtro (2/5)"
		foreach($array['brands'] as $bkey => $bitem){
			$array['brands'][$bkey]['count'] = '0';
			foreach($brand_products as $bproduct){
				if($bproduct['id_brand'] == $bitem['id']){
					$array['brands'][$bkey]['count'] = $bproduct['c'];
				}
			}
			if($array['brands'][$bkey]['count'] == '0'){
				unset($array['brands'][$bkey]);
			}
		}
		//Filtro de preço
		if(isset($filters['slider0'])){
			$array['slider0'] = $filters['slider0'];
		}
		if(isset($filters['slider1'])){
			$array['slider1'] = $filters['slider1'];
		}
		$array['maxSlider'] = $products->getMaxPrice($filters);
		if($array['slider1'] == 0){
			$array['slider1'] = $array['maxSlider'];
		}

		//Filtro de estrelas
		$star_products = $products->getListOfStars($filters);
		foreach($array['stars'] as $skey => $sitem){
			foreach($star_products as $sproduct){
				if($sproduct['rating'] == $skey){
					$array['stars'][$skey] = $sproduct['c'];
				}
			}
		}
		// Filtro de promoções
		$array['sale'] = $products->getSaleCount($filters);

		// Filtro das opções
		$array['options'] = $products->getAvailableOptions($filters);
		return $array;
	}
}