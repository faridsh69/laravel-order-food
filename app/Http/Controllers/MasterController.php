<?php

namespace App\Http\Controllers;
use App\Notifications\ForgetPassword;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function getCheckout()
    {   
        $bank = [
            'terminalCode' => 111111,
            'merchantCode' => 111111,
            'redirectAddress' => "http://www.artimazh.com/getresult.php",
            'invoiceDate' => date("Y/m/d H:i:s"),
            'timeStamp' => date("Y/m/d H:i:s"),
            'action' => "1003",
            'invoiceNumber' => 1,
            'amount' => 1000,
            'result' => 1,
            ];
        $data = "#". $bank['merchantCode'] ."#". $bank['terminalCode'] ."#". $bank['invoiceNumber'] ."#". 
            $bank['invoiceDate'] ."#". $bank['amount'] ."#". $bank['redirectAddress'] ."#". 
            $bank['action'] ."#". $bank['timeStamp'] ."#";
        $data = sha1($data,true);
        require_once("bank\RSAProcessor.class.php"); 
        // $processor = new RSAProcessor("certificate.xml",RSAKeyType::XMLFile);
        // $data =  $processor->sign($data); // امضاي ديجيتال 
        $bank['result'] = base64_encode($data);
        return view('checkout')->withBank($bank);
    }

    public function getRestaurant($id,$title)
    {   
        return view('restaurant');
    }

    public function postRestaurantManage(Request $request)
    {
        \Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'time' => 'required',
            'off' => 'required|numeric',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required|numeric',
            'peyk_in' => 'required|numeric',
            'peyk_out' => 'required|numeric',
            'minimum_price' => 'required|numeric',
            'restaurant_image' => 'image|mimes:jpeg,jpg,bmp,png,gif|max:4000',
        ])->validate();
        \App\Models\Restaurant::updateOrCreate(['user_id' => \Auth::id()],[
            'name' => $request['name'],
            'address' => $request['address'],
            'time' => $request['time'],
            'off' => $request['off'],
            'city_id' => $request['city_id'],
            'phone' => $request['phone'],
            'peyk_in' => $request['peyk_in'],
            'peyk_out' => $request['peyk_out'],
            'minimum_price' => $request['minimum_price'],
        ]);
        $request->session()->flash('alert-success', 'اطلاعات رستوران شما با موفقیت ثبت شد.');

        return redirect()->back();
    }

    public function getRestaurantManage()
    {
        $restaurant = \App\Models\Restaurant::where('user_id',\Auth::id())->first();
        if($restaurant == null)
        {
        $restaurant = (object)['name' =>'', 'address' => '', 'time' => '', 'off' => '', 'phone' => '', 'user_id' => '', 'type' => '', 'city_id' => '', 'peyk_in' => '', 'peyk_out' => '', 'minimum_price' => '']; 
        }
        $cities = \App\Models\City::select('id','name')->get();

        return view('restaurant.manage')->withRestaurant($restaurant)->withCities($cities);
    }

    public function getRestouransCity()
    {
        $cities = \App\Models\City::select('id','name')->get();
        
        return $cities;
    }

    public function getRestouransInfo()
    {
        $restaurants = \App\Models\Restaurant::get();

        return $restaurants;
    }

    public function getHome() 
    {
        \Meta::set('title','شیک فوود');

    	return view('home');
    }

    public function getLog()
    {
        $logFile = file(storage_path().'/logs/laravel.log');
        $logFile = collect($logFile)->reverse();
        \Log::info('first log!');

        \Meta::set('title','log');
        return view('admin.log')->withLog($logFile);
    }
   
    public function getVerificateId($id)
    {
        dd('ایمیل شما تایید شد.');
    }

    public function getLanguage($language)
    {
        session()->put('locale', $language);
        
        return redirect()->back();
    }
}
