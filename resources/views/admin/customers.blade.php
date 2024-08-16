<x-app-layout>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Customers</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Customers</li>
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
                                <h3 class="card-title">Customers Table</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        {{-- <input type="text" name="table_search" class="form-control float-right"
                                              placeholder="Search"> --}}

                                        <div class="input-group-append">
                                            <button type="button" data-toggle="modal" data-target="#modal-default"
                                                class="btn btn-primary btn-sm px-2 rounded">
                                                Add New Customer <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap">
                                    @if (count($customers) > 0)
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Customer Name</th>
                                                <th>Hotline</th>
                                                <th>Email</th>
                                                <th>Account Number</th>
                                                <th>Bank Name</th>
                                                <th>Address</th>
                                                <th>Created At</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customers as $person => $customer)
                                                <tr>
                                                    <td>{{ $person + 1 }}</td>
                                                    <td>{{ $customer->customerName }}</td>
                                                    <td>{{ $customer->vendor_contact }}</td>
                                                    <td>{{ $customer->email }}</td>
                                                    <td><span
                                                            class="text-success">{{ $customer->account_number }}</span>
                                                    </td>
                                                    <td class="text-success">{{ $customer->bank_name }}</td>
                                                    <td>{{ $customer->address }}</td>
                                                    <td>{{ $customer->created_at->format('d-m-Y') }}</td>
                                                    <td>
                                                        <form action="{{ route('customers.destroy', $customer->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>


                                                        <a href="{{ route('customers.edit', $customer->id) }}"
                                                            class="btn btn-default btn-sm">
                                                            <i class="fas fa-edit"></i></a>
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
                    <h4 class="modal-title">Add New Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                       
                        <form method="post" action="{{ route('customers.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="vendorname">Vendor Name:</label>
                                    <input type="text" class="form-control" id="vendorname"
                                        placeholder="Enter Customer name" name="customerName">
                                </div>
                                <div class="form-group">
                                    <label for="vendorphone">Cutomer Phone:</label>
                                    <input type="number" class="form-control" id="vendorphone"
                                        placeholder="Enter vendor contact" name="vendor_contact">
                                </div>
                                <div class="form-group">
                                    <label for="vendorphone">Email:</label>
                                    <input type="email" class="form-control" id="vendorphone"
                                        placeholder="Enter Customer Email Address" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="vendorphone">Customer Account Number:</label>
                                    <input type="number" class="form-control" id="vendorphone"
                                        placeholder="Enter Account number" name="account_number">
                                </div>

                                <div class="form-group">
                                    <label for="vendorphone">Bank name:</label>
                                    <input type="text" class="form-control" id="vendorphone"
                                        placeholder="Enter Customer bank nname" name="bank_name">
                                </div>
                                <div class="form-group">
                                    <label for="vendorphone">Customer Address:</label>
                                    <input type="text" class="form-control" id="vendorphone"
                                        placeholder="Enter Address" name="address">
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
