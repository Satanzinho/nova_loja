<?php
class Filters extends Model{
	public function getFilters($filters){
		$products = new Products();
		$brands = new Brands();
		$array = array(
			'brands' => array(),
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
		//Filtro de marcas
		$array['brands'] = $brands->getList();
		$brand_products = $products->getListOfBrands();
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
		$array['maxSlider'] = $products->getMaxPrice($filters);

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