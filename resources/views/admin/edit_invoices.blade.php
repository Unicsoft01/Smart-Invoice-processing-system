<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Invoice <i>No: {{ $invoice->invoice_number }}</i></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('invoices.index') }}">Invoices</a></li>
                            <li class="breadcrumb-item active">Edit Invoice <b>No: {{ $invoice->invoice_number }}</b>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Invoices from: <span class="text-primary">
                                    {{ $invoice->user_id }}</span></h3>
                            </div>
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <div class="col-12">
                                    {{-- {{ $invoice  }} --}}
                                    <form method="post" action="{{ route('invoices.update', $invoice->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="vendorname">Vendor Name:</label>
                                                <input type="text" class="form-control" id="vendorname"
                                                    placeholder="Enter invoice vendor" value="{{ $invoice->user_id }}" name="user_id">
                                            </div>
                                            <div class="form-group">
                                                <label for="vendorphone">Vendor Phone:</label>
                                                <input type="number" class="form-control" id="vendorphone"
                                                    placeholder="Enter vendor contact" value="{{ $invoice->vendor_contact }}" name="vendor_contact">
                                            </div>
                                            <div class="form-group">
                                                <label for="vendorphone">Invoice Id:</label>
                                                <input type="text" class="form-control" id="vendorphone"
                                                    placeholder="Enter invoice Tracking number" value="{{ $invoice->invoice_number }}" name="invoice_number">
                                            </div>
                                            <div class="form-group">
                                                <label for="vendorphone">Total Amount:</label>
                                                <input type="number" class="form-control" id="vendorphone"
                                                    placeholder="Enter total Amount" value="{{ $invoice->amount }}" name="amount">
                                            </div>
                                            <div class="form-group">
                                                <label for="vendorphone">Payment status:</label>
                                                <select value="{{ $invoice->status }}" name="status" id="">
                                                    <option value="Paid">Paid</option>
                                                    <option value="Unpaid">Not yet paid</option>
                                                </select>
                                            </div>
            
                                            {{-- <div class="form-group">
                                                <label for="vendorphone">Date on Innvoice</label>
                                                <input type="date" class="form-control" value="{{ $invoice->date_raised }}" name="date_raised">
                                            </div> --}}
                                        </div>
                                        <!-- /.card-body -->
                                        {{-- </div> --}}
                                        <div class="mb-3 float-right">
                                            <button type="submit" class="btn btn-primary">Submit Details</button>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- modal and extra --}}
</x-app-layout>
