<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Models\Admin\Customer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


    //     SELECT 
    //     SUM(IF(month = 'Jan', total, 0)) AS 'Jan',
    //     SUM(IF(month = 'Feb', total, 0)) AS 'Feb',
    //     SUM(IF(month = 'Mar', total, 0)) AS 'Mar',
    //     SUM(IF(month = 'Apr', total, 0)) AS 'Apr',
    //     SUM(IF(month = 'May', total, 0)) AS 'May',
    //     SUM(IF(month = 'Jun', total, 0)) AS 'Jun',
    //     SUM(IF(month = 'Jul', total, 0)) AS 'Jul',
    //     SUM(IF(month = 'Aug', total, 0)) AS 'Aug',
    //     SUM(IF(month = 'Sep', total, 0)) AS 'Sep',
    //     SUM(IF(month = 'Oct', total, 0)) AS 'Oct',
    //     SUM(IF(month = 'Nov', total, 0)) AS 'Nov',
    //     SUM(IF(month = 'Dec', total, 0)) AS 'Dec',
    //     SUM(total) AS total_yearly
    //     FROM (
    // SELECT DATE_FORMAT(date, "%b") AS month, SUM(total_price) as total
    // FROM cart
    // WHERE date <= NOW() and date >= Date_add(Now(),interval - 12 month)
    // GROUP BY DATE_FORMAT(date, "%m-%Y")) as sub


        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }else{
            return view('admin.login');
        }
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        $email=$request->post('email');
        $password=$request->post('password');

        // $result=Admin::where(['email'=>$email,'password'=>$password])->get();
        $result=Admin::where(['email'=>$email])->first();
        if($result){
            if(Hash::check($request->post('password'),$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');
            }else{
                $request->session()->flash('error','Please enter correct password');
                return redirect('admin');
            }
        }else{
            $request->session()->flash('error','Please enter valid login details');
            return redirect('admin');
        }
    }

    public function dashboard()
    {
        $data['customers']= Customer::count();
        $data['items_sold'] =  DB::table('orders_details')->sum('qty');
        $data['orders_total_amount']=  DB::table('orders')->sum('total_amt');
        $data['items_sold_this_week']=  DB::table('orders')
        ->join('orders_details','orders.id', 'orders_details.orders_id')
        ->whereBetween('orders.added_on', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->sum('orders_details.qty');

        $data['earn_by_items'] = DB::table('orders_details')
                                ->join('orders', 'orders_details.orders_id', 'orders.id')
                                ->join('products', 'orders_details.product_id', 'products.id')
                                ->get();

        $data['yealy'] = DB::table('orders')->select(DB::raw("(COUNT(total_amt)) as count"),DB::raw("MONTHNAME(added_on) as monthname"))
        ->whereYear('added_on', date('Y'))
        ->groupBy('monthname')
        ->get();

        // dd($data);  
        return view('admin.dashboard', compact('data'));
    }


    public function authReset(){
        Admin::find(1)->update(['password'=> Hash::make('Nadine1234')]);

        return redirect('/admin');
    }
    

}
