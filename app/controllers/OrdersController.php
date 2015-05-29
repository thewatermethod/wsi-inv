<?php

class OrdersController extends BaseController {

	
	public function getIndex()
	{
		
		function setThirtyDaysAgo(){
			$thirtyDaysAgo = new DateTime();
			$thirtyDaysAgo->modify('-1 month');
			$thirtyDaysAgo = $thirtyDaysAgo->format('Y-m-d H:i:s');

			return $thirtyDaysAgo;
		}

		$date = setThirtyDaysAgo();		

		$params = array(
			'complex_filter' => array( 
				array( 'key' => 'created_at', 'value' => 
					array( 'key' => 'from', 'value' => $date )
				)
			)
		);

		$orders = Magento::salesOrderList($params)->getCollection();
		
		$orderIds = array();


		foreach( $orders as $order){
			
			$param = $order->getIncrementId();
			$itemsOrdered = Magento::salesOrderInfo($param)->items();

			array_push( $orderIds, $itemsOrdered );
		}

		return View::make('orders')->with( 'orders' , $orderIds );	
	}



}
