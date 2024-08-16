<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use DB;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Customers::latest()->get();
        $customers = $results->unique(['email']);
        $userDuplicates = $results->diff($customers);
        // return $customers;

        return view('admin.customers
        ')->with(['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();

        Customers::create($request->all());
        return redirect()->route('customers.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customers $customers, $id)
    {
    //   return $invoice = Customers::find($id)->get();
      $customers = Customers::whereId($id)->first();
        return view('admin.edit_customer_details')->with(['customers' => $customers]);;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customers $customers, $id)
    {
        // return $request;

      $post = Customers::find($id);
      $post->update($request->all());
      return redirect()->route('customers.index')
        ->with('success', 'Invoice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customers $customers, $id)
    {
        DB::table('customers')->where('id', $id)->delete();
        return redirect()->route('customers.index');
    }
}
