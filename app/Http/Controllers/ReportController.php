<?php

namespace App\Http\Controllers;

use App\OrderEntry;
use App\Product;
use Illuminate\Http\Request;

class ReportController extends Controller
{
	public function getReportByProduct(Request $request, Product $product){
		$orderEntry = OrderEntry::with(['product', 'order'])->whereBetween('updated_at', [$request->startDate, $request->endDate])->where('product_id', $product->id)->get()->sortBy('created_at');
		$report = [];
		$report['order_entry'] = $orderEntry;
		$report['product_name'] = $product->name;
		$report['product_price'] = $product->price;
		$report['total_sold'] = $orderEntry->sum('quantity');
		$report['total_amount'] = $orderEntry->sum('price');
		return $report;
	}
}
