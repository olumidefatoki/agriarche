<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getFarmerInfluencerPricingReport()
    {
        $pricingReport = DB::select('SELECT c.name commodity, pro.name processor,p.price, count(p.id)  FROM pricing p 
                        INNER JOIN processor_order po ON p.processor_order_id = po.id
                        INNER JOIN processor pro ON pro.id = po.id 
                        INNER JOIN commodity c on c.id = po.commodity_id
                        GROUP BY c.name, pro.name,p.price');
        return view('report.pricing', array('pricingReports' => $pricingReport));
    }
}
