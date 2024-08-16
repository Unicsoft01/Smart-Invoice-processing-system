<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Payments</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Payments</li>
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
                                <h3 class="card-title">Payments Table</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        {{-- <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search"> --}}

                                       
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
                                                    <td>{{ number_format($invoice->amount) }}</td>
                                                    @if ($invoice->status == 'paid')
                                                        <td><span class="text-success">Paid</span></td>
                                                    @else
                                                        <td><span class="text-danger">Unpaid</span></td>
                                                    @endif

                                                    <td>{{ $invoice->created_at->format('d-m-Y') }}</td>

                                                    @if ($invoice->status == 'paid')
                                                        <td>
                                                            <a href="{{ route('payments.edit', $invoice->id) }}"
                                                                class="btn btn-default btn-sm btn-disabled disabled">
                                                                Paid Already

                                                        </td>
                                                    @else
                                                        <td>
                                                            <a href="{{ route('payments.edit', $invoice->id) }}"
                                                                class="btn btn-success btn-sm">
                                                                Pay now</a>

                                                        </td>
                                                    @endif
                                                    <td>
                                                        <a href="{{ route('payments.show', $invoice->id) }}"
                                                            class="btn btn-primary btn-sm">
                                                            Open Recipt
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

    <!-- /.modal-dialog -->
    </div>
</x-app-layout>
