<?php

namespace App\Http\Controllers;

use App\Models\InvoiceItems;
use App\Models\Invoices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Invoices::latest()->get();
        $invoices = $results->unique(['invoice_number']);
        $userDuplicates = $results->diff($invoices);
        // return $invoices;

        return view('admin.invoices')->with(['invoices' => $invoices]);
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
        $request->validate([
            'user_id' => 'required|max:255',
            'vendor_contact' => 'required',
        ]);
        Invoices::create($request->all());
        return redirect()->route('invoices.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoices $invoices, $id)
    {
        $results = InvoiceItems::where('invoiceID', '=', $id)->latest()->get();
        $items = $results->unique(['created_at']);

        return view('admin.invoice_item')->with(['items' => $items]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoices $invoices, $id)
    {
    //   return $invoice = Invoices::find($id)->get();
      $invoice = Invoices::whereId($id)->first();
        return view('admin.edit_invoices')->with(['invoice' => $invoice]);;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoices $invoices, $id)
    {
        // return $request;

      $post = Invoices::find($id);
      $post->update($request->all());
      return redirect()->route('invoices.index')
        ->with('success', 'Invoice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoices $invoices, $id)
    {
        DB::table('invoices')->where('id', $id)->delete();
        return redirect()->route('invoices.index');
    }
}
