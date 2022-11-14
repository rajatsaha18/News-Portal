<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class CustomerAuthController extends Controller
{
    private $customer;
    private $res;
    private $data;

    public function login()
    {
        return view('website.auth.customer-login');
    }

    public function registration()
    {
        return view('website.auth.customer-registration');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:5|max:12',
        ]);
        $this->customer = new Customer();
        $this->customer->name = $request->name;
        $this->customer->email = $request->email;
        $this->customer->password = Hash::make($request->password);
        $this->res = $this->customer->save();

        if($this->res)
        {
            return back()->with('success', 'yor are register successfully');
        }
        else
        {
            return back()->with('fail', 'something wrong try again');
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);
       $this->customer = Customer::where('email', '=', $request->email)->first();
       if($this->customer)
       {
           if(Hash::check($request->password, $this->customer->password))
           {
               $request->session()->put('loginId', $this->customer->id);
               return redirect('customer-dashboard');
           }
           else
           {
               return back()->with('password was incorrect');
           }
       }
       else
       {
           return back()->with('fail', 'email is invalid');
       }
    }

    public function customerDashboard()
    {
        $this->data = [];
        if(Session::has('loginId'))
        {
            $this->data = Customer::where('id', '=', Session::get('loginId'))->first();
        }
        return view('website.customer-dashboard', ['data' => $this->data]);
    }

    public function customerLogout()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect('/');
        }
    }
}
