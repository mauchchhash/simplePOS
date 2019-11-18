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
		$orders =  Order::whereBetween('updated_at', [$request->startDate, $request->endDate])->get();
		$report = [];
		$report['orders'] = $orders;
		$report['total_revenue'] = $orders->sum('total_amount');
		return $report;
	}
}
