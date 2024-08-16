<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Invoices;
use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
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

        return view('admin.payments')->with(['invoices' => $invoices]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Payments $payments, $id)
    {
        $invoice = Invoices::whereId($id)->first();
        $supplier = Customers::whereId($invoice->user_id)->first();

        return view('admin.pmt_recipt')->with([
            'supplier' => $supplier,
            'invoice' => $invoice
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payments $payments, $id)
    {
        $invoice = Invoices::whereId($id)->first();
        $supplier = Customers::whereId($invoice->user_id)->first();

        $invoice->status = "paid";

        if ($invoice->save()) {
            return view('congratspayment')->with([
                'supplier' => $supplier,
                'invoice' => $invoice
            ]);

            //->with(AlertController::SendAlert());
        } else {
            return back()->with(AlertController::SendAlert('error', "sorr an error occured!"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payments $payments)
    {
        //
    }
}
