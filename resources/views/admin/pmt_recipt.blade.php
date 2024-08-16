<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1>Payments</h1> --}}
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
                    <div class="col-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title text-header">Payment Recipt!</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">


                                    </div>
                                </div>
                            </div>

                            <div class="card-body stable-responsive p-0 text-dark">

                                <h3 class="text-center p-5 text-primary">
                                    @if ($invoice->status === 'paid')
                                        <div class="text-success my-2">
                                            Invoice Cleared!
                                        </div>
                                    @else
                                        <div class="text-danger my-2">
                                            Not yet cleared!
                                        </div>
                                    @endif

                                    <div class="">
                                        <b>Vendor Name:</b> {{ $supplier->customerName }}
                                    </div>
                                    <div class="">
                                        <b>Vendor Account Number:</b> {{ $supplier->account_number }}
                                    </div>
                                    <div class="">
                                        <b>Vendor Bank Name:</b> {{ $supplier->bank_name }}
                                    </div>
                                    <div class="">
                                        <b>Payment For:</b> {{ $invoice->invoice_number }}
                                    </div>
                                    <div class="">
                                        <b>Invoice Date:</b> {{ $invoice->created_at }}
                                    </div>
                                    <div class="">
                                        <b>Invoice Date:</b> NGN{{ number_format($invoice->amount) }}
                                    </div>
                                    <hr>
                                    @if ($invoice->status === 'paid')
                                        <a href="{{ route('payments.index') }}" class="btn btn-info">
                                            Back to Payment page
                                        </a>
                                    @else
                                        <div class="text-danger my-2">
                                            <td>
                                                <a href="{{ route('payments.edit', $invoice->id) }}"
                                                    class="btn btn-success btn-sm btn-md">
                                                    Pay now</a>

                                            </td>
                                        </div>
                                    @endif



                                    {{-- {{ $invoice }}
                                            <hr>
                                            {{ $supplier }}</h3> --}}

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
