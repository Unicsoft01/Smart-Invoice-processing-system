<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Invoices</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Invoices</li>
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
                                <h3 class="card-title">Invoices Table</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        {{-- <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search"> --}}

                                        <div class="input-group-append">
                                            <button type="button" data-toggle="modal" data-target="#modal-default"
                                                class="btn btn-primary btn-sm px-2 rounded">
                                                Submit New Invoice <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap">
                                    @if (count($invoices) > 0)
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Invoice Number</th>
                                                {{-- <th>Invoice ID</th> --}}
                                                <th>Supplier</th>
                                                <th>Vendor Contact</th>
                                                <th>Worth</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Submitted</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoices as $item => $invoice)
                                                <tr>
                                                    <td>{{ $item + 1 }}</td>
                                                    <td>{{ $invoice->invoice_number }}</td>
                                                    @php
                                                        $supplier = App\Models\Customers::whereId(
                                                            $invoice->user_id,
                                                        )->get();
                                                    @endphp
                                                    @if (count($supplier) > 0)
                                                        @foreach ($supplier as $sup)
                                                            <td>{{ $sup->customerName }}</td>
                                                        @endforeach
                                                    @else
                                                        <td>- - -</td>
                                                    @endif


                                                    {{-- <td>{{ $invoice->user_id }}</td> --}}
                                                    <td>{{ $invoice->vendor_contact }}</td>
                                                    <td>{{ $invoice->amount }}</td>
                                                    @if ($invoice->status == 'paid')
                                                        <td><span class="text-success">Paid</span></td>
                                                    @else
                                                        <td><span class="text-danger">Unpaid</span></td>
                                                    @endif

                                                    <td>{{ $invoice->updated_at->format('d-m-Y') }}</td>
                                                    <td>{{ $invoice->created_at->format('d-m-Y') }}</td>
                                                    <td>
                                                        <form action="{{ route('invoices.destroy', $invoice->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('invoices.edit', $invoice->id) }}"
                                                            class="btn btn-default btn-sm">
                                                            <i class="fas fa-edit"></i></a>

                                                    </td>
                                                    <td>
                                                        <a href="{{ route('invoices.show', $invoice->id) }}"
                                                            class="btn btn-success btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    @else
                                        <h3 class="text-center p-5 text-primary">Nothing to Display, Please Consider
                                            Creating Some data</h3>
                                    @endif

                                </table>
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

    <div class="modal fade" id="modal-default" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Invoices</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12">

                        <form method="post" action="{{ route('invoices.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="vendorname">Vendor Name:</label>
                                    <input type="text" class="form-control" id="vendorname"
                                        placeholder="Enter invoice vendor" name="user_id">
                                </div>
                                <div class="form-group">
                                    <label for="vendorphone">Vendor Phone:</label>
                                    <input type="number" class="form-control" id="vendorphone"
                                        placeholder="Enter vendor contact" name="vendor_contact">
                                </div>
                                <div class="form-group">
                                    <label for="vendorphone">Invoice Id:</label>
                                    <input type="text" class="form-control" id="vendorphone"
                                        placeholder="Enter invoice Tracking number" name="invoice_number">
                                </div>
                                <div class="form-group">
                                    <label for="vendorphone">Total Amount:</label>
                                    <input type="number" class="form-control" id="vendorphone"
                                        placeholder="Enter total Amount" name="amount">
                                </div>
                                <div class="form-group">
                                    <label for="vendorphone">Payment status:</label>
                                    <select name="status" id="">
                                        <option value="Paid">Paid</option>
                                        <option value="Unpaid">Not yet paid</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="vendorphone">Date on Innvoice</label>
                                    <input type="date" class="form-control" name="date_raised">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            {{-- </div> --}}
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Details</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</x-app-layout>
