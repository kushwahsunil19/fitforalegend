<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\{Orders,Products,Brands,User,MasterCategories,Categories,Subcategories};
use DB;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {  
       
            $totalOrders = Orders::where('status','ORDERED')->get()->count();
            $pendingOrders = 0; 
            $deliveredOrders = Orders::where('status','DELIVERED')->get()->count(); 
            $canceledOrders = Orders::where('status','CANCELLED')->get()->count();
           
			
            $thisMonthSale = Orders::where('status','DELIVERED')->whereMonth('updated_at', '=', date('m'))->latest()->get()->count(); 
            $thisYearProductSale = Orders::where('status','DELIVERED')->whereYear('updated_at', '=', date('Y'))->latest()->get()->count(); 
             $total = Orders::select( DB::raw('sum(total_amount) as total_earn'))
            ->where('status','DELIVERED')
			->get();
            $totalEarning = $total[0]->total_earn;
            $todayPendingEarning = 0;
             $month = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', date('m'))
			->get();
            $thisMonthEarning = $month[0]->total_month_amount;
             $Year = Orders::select( DB::raw('sum(total_amount) as total_year_amount'))
            ->where('status','DELIVERED')
			->whereYear('updated_at', '=', date('Y'))
			->get();
            $thisYearEarning = $Year[0]->total_year_amount;
            
            $totalProducts = Products::get()->count();  
              $product_sale = Orders::where('status','DELIVERED')
			->whereYear('updated_at', '=', date('Y'))
			->get();
		
            $totalProductSale = 0;  
            $product= Orders::where('status','DELIVERED')->whereDate('updated_at', '=', now())->latest()->get()->count();
            $todayProductOrder = Orders::where('status','ORDERED')->whereDate('updated_at', '=', now())->latest()->get()->count();
            $totalCustomers = User::get()->count();
            $totalMasterCategories = MasterCategories::get()->count();
            $totalCategories = Categories::get()->count();
            $totalSubCategories = Subcategories::get()->count();
            $totalBrands = Brands::get()->count();
            $orders = Orders::with('user')->latest()->limit(10)->get();
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 1)
			->get();
            $janEarning =  isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 2)
			->get();
            $febEarning =  isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 3)
			->get();
            $marEarning = isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 4)
			->get();
            $aprEarning =  isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 5)
			->get();
            $mayEarning =  isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 6)
			->get();
            $junEarning =  isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 7)
			->get();
            $julEarning = isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 8)
			->get();
            $augEarning =  isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 9)
			->get();
            $sepEarning = isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 10)
			->get();
            $octEarning = isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 11)
			->get();
            $novEarning = isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 12)
			->get();
            $decEarning = isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
          
           
        return view('admin::dashboard',compact('totalOrders','pendingOrders','deliveredOrders','canceledOrders','thisMonthSale','thisYearProductSale','totalEarning','todayPendingEarning','thisMonthEarning','thisYearEarning','totalProducts','totalProductSale','todayProductOrder','todayProductOrder','totalCustomers','totalMasterCategories','totalCategories','totalSubCategories','totalBrands','orders','janEarning','febEarning','marEarning','aprEarning','mayEarning','junEarning','julEarning','augEarning','sepEarning','octEarning','novEarning','decEarning'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {   
            $input = $request->all();
             $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 1)
			 ->whereYear('updated_at', '=', $input['year'])
			->get();
            $data['jan'] =  isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 2)
			->whereYear('updated_at', '=', $input['year'])
			->get();
            $data['feb'] =  isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 3)
			->whereYear('updated_at', '=', $input['year'])
			->get();
            $data['mar'] = isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 4)
			->whereYear('updated_at', '=', $input['year'])
			->get();
            $data['apr'] =  isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 5)
			->whereYear('updated_at', '=', $input['year'])
			->get();
            $data['may'] =  isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 6)
			->whereYear('updated_at', '=', $input['year'])
			->get();
            $data['jun'] =  isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 7)
			->whereYear('updated_at', '=', $input['year'])
			->get();
            $data['jul'] = isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 8)
			->whereYear('updated_at', '=', $input['year'])
			->get();
            $data['aug'] =  isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 9)
			->get();
            $data['sep'] = isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 10)
			->whereYear('updated_at', '=', $input['year'])
			->get();
            $data['oct'] = isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 11)
			->whereYear('updated_at', '=', $input['year'])
			->get();
            $data['nov'] = isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
            $m = Orders::select( DB::raw('sum(total_amount) as total_month_amount'))
            ->where('status','DELIVERED')
			->whereMonth('updated_at', '=', 12)
			->whereYear('updated_at', '=', $input['year'])
			->get();
            $data['dec'] = isset($m[0]->total_month_amount)?$m[0]->total_month_amount:0; 
             return response()->json($data);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
