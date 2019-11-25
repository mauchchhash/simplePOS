<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use JavaScript;

class POSController extends Controller
{
	public function index(){
		JavaScript::put([
			'products' => Product::all(),
			'foo' => 'bar'
		]);
		$products = Product::all();
		return view('order', compact('products'));
	}

	public function showReport(){
		JavaScript::put([
			'products' => Product::all(),
			'foo' => 'bar'
		]);
		$products = Product::all();
		return view('welcome', compact('products'));
	}

	public function getReport(Request $request){
		// $orders =  Order::whereBetween('updated_at', [$request->startDate, $request->endDate])->get()->sortBy('created_at');
		$orders =  Order::all();
		$orders = $orders->whereBetween('updated_at', [$request->startDate, $request->endDate])->sortBy('created_at');
		$cnt = 1;
		foreach($orders as $order){
			$order['index'] = $cnt;
			$cnt++;
		}
		$report = [];
		$report['orders'] = $orders;
		$report['total_revenue'] = $orders->sum('total_amount');
		$report['its_size'] = $cnt-1;
		return $report;
	}
}
