<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\loginController;

use App\customer;

class UserAddController extends Controller
{
    public function UserAdd(){
        return view('admin/user/user-add');
    }



    public function UserList()
    { 
    //Truy vấn toàn bộ dữ liệu trong bảng customer
        $customer = DB::table('customer')->get();
        return view('admin/user/user-list')->with(['customer' => $customer]);
    }
    
    public function capnhat_thongthin(Request $request)
    {
    //Truy vấn toàn bộ dữ liệu trong bảng customer
    $user = $request->username;
    $pass = $request->password;
    $kh = customer::where('Customername', $user)->where('customerpass', $pass)->first();
        if($kh){
            return redirect()->action('loginController@getLogin_1');
        }else{
            $customer = DB::table('customer')->get();
            return redirect()->back();
        }
        
    }

    //delete
    public function delete_customer($user)
    {
        $member = DB::table('customer')
            ->where("Customername", $user)
            ->delete();
        return redirect()->action('UserAddController@UserList');
    }
  
    //process - Form update
    public function update($Customername){
        $customer_info = DB::table('customer')
            -> where('Customername',$Customername) 
            ->first();
            return view('frontend/thong_tin/chinhsuathongtin', ['customer_info' => $customer_info]);
    }
  
    public function updateProcess(Request $request, $customer)
    {
        $Name = $request->input('username');
        $Pass = $request->input('password');
        $Email = $request->input('email');
        $Phone = $request->input('phone');
        $Address = $request->input('address');
        $customer_info = DB::table('customer')
            ->where('Customername', $customer)
            ->update(['Customername' => $Name, 'customerpass' => $Pass, 'Customeremail' => $Email, 'Customerphone' =>$Phone, 'Customeraddress' => $Address]);
        return redirect()->action('UserAddController@capnhat_thongthin');
    }
}
