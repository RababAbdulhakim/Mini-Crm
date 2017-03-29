<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Customer;
use App\User;
use Illuminate\Support\Facades\Input;
use DB;

class CustomerController extends Controller {

    //
    public function __Construct() {
        
        
    }
    public function index() {
        $customers = Customer::orderBy('id', 'DESC')->get();
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $employees = User::all();

        return view('customer.create' , compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
                'name'=>'required',
                'email'=>'required|email',
                'employee_id'=>'required',
            
        ]);

        $customer = $request->all();
        
        $postcustomer = Customer::create($customer);


        return redirect()->route('customer.index')
                        ->with('success', 'Posts created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

//$posts = Posts::with('comments')->find($id);
        $customers = customer::find($id);

$employee = User::with('customers')->get();
        return view('customer.show', compact('customers','employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $customer = Customer::find($id);
        $employees = User::all();
        return view('customer.edit', compact('customer','employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
        
        ]);

        Customer::find($id)->update($request->all());

        return redirect()->route('customer.index')
                        ->with('success', 'Posts updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Customer::find($id)->delete();
        return redirect()->route('customer.index')
                        ->with('success', 'Posts deleted successfully');
    }

}
