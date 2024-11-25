<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order; 
use View;
use Session;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    //
	
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
         $orders = Order::all();

        // load the view and pass the orders
        return \View::make('orders.index')
            ->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (/views/orders/create.blade.php)
        return View::make('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'cust_id'       => 'required',
            'address'      => 'required',
            'city'      => 'required',
            'phn_no'      => 'required',
            'items' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('api/orders/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $order = new Order;
            $order->cust_id       = Input::get('cust_id');
            $order->address      = Input::get('address');
            $order->city      = Input::get('city');
            $order->phn_no      = Input::get('phn_no');
            $order->items = Input::get('items');
            $order->save();

            // redirect
            Session::flash('message', 'Successfully created order!');
            return Redirect::to('orders');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    
        // get the order
        $order = Order::find($id);

        // show the view and pass the order to it
        return View::make('orders.show')
            ->with('order', $order);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
		$order = Order::find($id);

        // show the edit form and pass the order
        return View::make('orders.edit')
            ->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
         // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'cust_id'       => 'required',
            'address'      => 'required',
            'items' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('orders/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $order = Order::find($id);
            $order->cust_id      = Input::get('cust_id');
            $order->address    = Input::get('address');
            $order->city    = Input::get('city');
            $order->phn_no    = Input::get('phn_no');
            $order->items = Input::get('items');
            $order->save();

            // redirect
            Session::flash('message', 'Successfully updated order!');
            return Redirect::to('api/orders');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
		 // delete
        $order = Order::find($id);
        $order->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the order!');
        return Redirect::to('api/orders');
    }

}
