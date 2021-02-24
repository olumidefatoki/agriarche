<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function getReport()
    {
        $genericReport =  DB::select('SELECT 
                                        (SELECT FORMAT(IFNULL(COUNT(id) , 0), 0) FROM aggregator ) no_of_influencer,
                                        (SELECT FORMAT(IFNULL(COUNT(id) , 0), 0) FROM logistics_company ) no_of_logCom,
                                        (SELECT FORMAT(IFNULL(COUNT(id) , 0), 0) FROM processor ) no_of_processor,                                      
                                        (SELECT FORMAT(IFNULL(COUNT(id) , 0), 0) FROM logistics 
                                            WHERE WEEK(created_at) = WEEK(NOW()) ) dispatch_truck_week, 
                                        (SELECT FORMAT(IFNULL(COUNT(id) , 0), 0) FROM logistics 
                                           WHERE MONTH(created_at) = MONTH(NOW()) ) dispatch_truck_month,
                                        (SELECT FORMAT(IFNULL(COUNT(id) , 0), 0) FROM logistics 
                                           WHERE DATE(created_at) = DATE_ADD(date(now()),INTERVAL -1 DAY)) dispatch_truck_yesterday,
                                        (SELECT FORMAT(IFNULL(COUNT(id) , 0), 0) FROM delivery 
                                            WHERE status_id = 8 AND WEEK(created_at) = WEEK(NOW()) ) delivered_truck_week, 
                                        (SELECT FORMAT(IFNULL(COUNT(id) , 0), 0) FROM delivery 
                                           WHERE status_id = 8 AND MONTH(created_at) = MONTH(NOW()) ) delivered_truck_month,
                                        (SELECT FORMAT(IFNULL(COUNT(id) , 0), 0) FROM delivery 
                                           WHERE status_id = 8 AND  DATE(created_at) = DATE_ADD(date(now()),INTERVAL -1 DAY)) delivered_truck_yesterday,  
                                        (SELECT FORMAT(IFNULL(SUM(quantity_of_bags_accepted) , 0), 0) FROM delivery 
                                            WHERE status_id = 8 AND WEEK(created_at) = WEEK(NOW()) ) delivered_volume_week, 
                                        (SELECT FORMAT(IFNULL(SUM(quantity_of_bags_accepted) , 0), 0) FROM delivery 
                                           WHERE status_id = 8 AND MONTH(created_at) = MONTH(NOW()) ) delivered_volume_month,
                                        (SELECT FORMAT(IFNULL(SUM(quantity_of_bags_accepted) , 0), 0) FROM delivery 
                                           WHERE status_id = 8 AND  DATE(created_at) = DATE_ADD(date(now()),INTERVAL -1 DAY)) delivered_volume_yesterday,  
                                        (SELECT FORMAT(IFNULL(SUM(quantity_of_bags_accepted * order_price) , 0), 0) FROM delivery 
                                            WHERE status_id = 8 AND WEEK(created_at) = WEEK(NOW()) ) delivered_value_week, 
                                        (SELECT FORMAT(IFNULL(SUM(quantity_of_bags_accepted * order_price) , 0), 0) FROM delivery 
                                           WHERE status_id = 8 AND MONTH(created_at) = MONTH(NOW()) ) delivered_value_month,
                                        (SELECT FORMAT(IFNULL(SUM(quantity_of_bags_accepted * order_price) , 0), 0) FROM delivery 
                                           WHERE status_id = 8 AND  DATE(created_at) = DATE_ADD(date(now()),INTERVAL -1 DAY)) delivered_value_yesterday                       
                                    ');

        $dashboardReport = array('generic' => $genericReport);
        echo json_encode($dashboardReport);

        // (SELECT st.name, COUNT(st.id) num FROM logistics log 
        // inner join status st on st.id = log.status_id  
        // where month(log.created_at) = month(now()) group by st.name ) logisitics_month_report,
    }
}
