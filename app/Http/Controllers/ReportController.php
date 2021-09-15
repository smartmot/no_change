<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Invoice;
use App\Models\Report\DailyExpense;
use App\Models\Report\DailyIncome;
use App\Models\Report\DailyNetIncome;
use App\Models\Report\MonthlyExpense;
use App\Models\Report\MonthlyIncome;
use App\Models\Report\MonthlyNetIncome;
use App\Models\Report\YearlyExpense;
use App\Models\Report\YearlyIncome;
use App\Models\Report\YearlyNetIncome;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function expense(Request $request){
        $itm_sql = "select sum(stocks.qty) as qty from invoice_items inner join stocks on invoice_items.id = stocks.item_id where stocks.type = 'stock_in' and invoice_items.invoice_id = invoices.id";
        $total_sql = "select SUM((stocks.qty*invoice_items.unit_price)) as total from invoice_items inner join stocks on invoice_items.id = stocks.item_id where stocks.type = 'stock_in' and invoice_items.invoice_id = invoices.id";
        $paid = "select SUM(paid) as paid from invoice_payments where invoice_payments.invoice_id = invoices.id";
        switch ($request->get("filter")){
            case "all":
                $invoices = DB::table("invoices")
                    ->selectRaw("*, ($itm_sql) as qty, ($total_sql) as total, ($paid) as paid, (($total_sql)-($paid)) as due")
                    ->orderBy("date", "DESC")
                    ->get()
                    ->toArray();
                return response($invoices);
                break;
            case "day":
                $invoices = DailyExpense::query()
                    ->selectRaw("date, COUNT(id) as no")
                    ->groupBy("date")
                    ->get()
                    ->toArray();
                return response($invoices);
                break;
            case "month":
                $invoices = MonthlyExpense::query()
                    ->selectRaw("DATE_FORMAT(date, '%Y-%m') as month, COUNT(id) no")
                    ->groupBy("month")
                    ->get()->toArray();
                return response($invoices);
                break;
            case "year":
                $invoices = YearlyExpense::query()
                    ->selectRaw("YEAR(date) year, COUNT(id) no")
                    ->groupBy("year")
                    ->get()->toArray();
                return response($invoices);
                break;
            default:return response([]);
            break;
        }
    }

    public function income(Request $request){
        switch ($request->get("filter")){
            case "all":
                $sales = Sale::query()
                    ->get()->toArray();
                return response($sales);
                break;
            case "day":
                $sales = DailyIncome::query()
                    ->selectRaw("COUNT(id) no, date")
                    ->groupBy("date")
                    ->get()->toArray();
                return response($sales);
                break;
            case "month":
                $sales = MonthlyIncome::query()
                    ->selectRaw("COUNT(id) no, DATE_FORMAT(date, '%Y-%m') month")
                    ->groupBy("month")
                    ->get()->toArray();
                return response($sales);
                break;
            case "year":
                $sales = YearlyIncome::query()
                    ->selectRaw("COUNT(id) no, YEAR(date) year")
                    ->groupBy("year")
                    ->get()->toArray();
                return response($sales);
                break;
            default:return response([]);
            break;
        }
    }

    public function net(Request $request){
        switch ($request->get("filter")){
            case "day":
                $net_incomes = DailyNetIncome::query()
                    ->get()->toArray();
                return response($net_incomes);
                break;
            case "month":
                $net_incomes = MonthlyNetIncome::query()
                    ->selectRaw("DATE_FORMAT(date, '%Y-%m') month, COUNT(id) num")
                    ->groupBy("month")
                    ->get()->toArray();
                return response($net_incomes);
                break;
            case "year":
                $net_incomes = YearlyNetIncome::query()
                    ->selectRaw("YEAR(date) year, COUNT(id) num")
                    ->groupBy("year")
                    ->get()->toArray();
                return response($net_incomes);
                break;
            default:return response([]);
                break;
        }
    }
}
