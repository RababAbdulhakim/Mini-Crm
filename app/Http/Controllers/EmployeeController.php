<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Customer;
use App\ActionTypes;
use App\CustomerActions;
use Illuminate\Support\Facades\Input;
use DB;

class EmployeeController extends Controller {

    //
    public function index() {
        $employees = User::orderBy('id', 'DESC')->get();
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('employee.create');
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
            
            
        ]);
        $employee = $request->all();
        $postemployee = User::create($employee);


        return redirect()->route('employee.index')
                        ->with('success', 'Posts created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id) {

        $employees = User::find($id);
        //$customers = Customer::where('employee_id', '=', $id)->get();
        $actiontypes = ActionTypes::all();
 $validators=  $this->validate($request, [
            'action_type_id' => 'required',
            'customer_id' => 'required',
        ]);
 
            $types = new CustomerActions;
            $types->action_type_id = Input::get('action_type_id');
            $types->customer_id = Input::get('customer_id');
            $types->save();
            return back();
            
        $search = \Request::get('action_type');
          //  $posts = ActionTypes::join()where('type','like','%'.$search.'%')
              $customers= DB::table('customer_actions')->
                join('action_types', 'action_types.id', '=', 'customer_actions.action_type_id')->
                join('customers', 'customers.id', '=', 'customer_actions.customer_id')->
                where('type','like','%'.$search.'%')->
                orwhere('customer_actions.action_type_id' , "=" , "")->
                where('customers.user_id' , "=" , $id)->
                get();
              $customer_id = DB::table('customer_actions')->select('customer_id')->get();
            
        //print_r($customers);exit;
//       
        return view('employee.show', compact('employees', 'customers' ,'actiontypes','customer_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $employee = User::find($id);
        return view('employee.edit', compact('employee'));
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

        User::find($id)->update($request->all());

        return redirect()->route('employee.index')
                        ->with('success', 'Posts updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        User::find($id)->delete();
        return redirect()->route('employee.index')
                        ->with('success', 'Employee deleted successfully');
    }
    public function ActionStore(Request $request) {
        
        $validators=  $this->validate($request, [
            'action_type_id' => 'required',
            'customer_id' => 'required',
        ]);
 
            $types = new CustomerActions;
            $types->action_type_id = Input::get('action_type_id');
            $types->customer_id = Input::get('customer_id');
            $types->save();
            return back();
            
        
        }
       
       
    

}
