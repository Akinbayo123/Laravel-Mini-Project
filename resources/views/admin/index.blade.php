<x-layout>
    <div class="container-fluid mt-5 px-4">
<div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-sm-6 mb-5">
                <div class="service card-effect ">
                    <div class="iconbox">
                        <i class='fa fa-add'></i>
                    </div>
                    <h4 class="mt-4 mb-2">New Employee</h4>
                    <p class="mb-4">You can add new employee</p>
                    <a href="{{ route('show') }}" class="btn1 text-decoration-none btn-primary">Add Employee</a>
                </div>
            </div>
        
         @if ($wallet->wallet_status != 0)
                <div class="col-lg-5 col-sm-6 mb-5 ms-auto">
                    <div class="service card-effect p-4">
                        <h4 class="mt-4 mb-3">Wallet</h4>
                        <div class="balance">
                            <h5>Available Balance</h5>
                            <p class="amount">${{ $wallet->balance }}</p>
                        </div>
                        <div class="last-credited">
                            <h5>Last Credited</h5>
                            <p class="date">{{ $wallet->last_credited ? $wallet->last_credited->toDateString():'Not yet credited' }}</p>
                        </div>
                        <button class="btn btn-success">Withdraw</button>
                    </div>
                </div>
                @else
                <div class="col-lg-5 col-sm-6 mb-5 ms-auto">
                    <div class="service card-effect p-4">
                        <h4 class="mt-4 mb-3">Wallet</h4>
                        <p>Wallet Not Yet Activated</p>
                        <form action="{{ route('activate', $wallet->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-success">Active Wallet</button>
                        </form>
                    </div>
                </div>
                @endif
        </div>
    </div>

        <div class=" mr-4 px-4 bg-light">

            <div class="table-responsive">
                <table class="table">
                    <table class="table caption-top">
                        <caption class="h2 fw-bold">Employees</caption>
                        <thead>

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Usertype</th>
                                <th scope="col">Location</th>
                                <th scope="col">Salary</th>
                                <th scope="col">Wallet</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->role }}</td>
                                    <td>{{ $employee->user_type=="1" ? "Admin" : "Employee" }}</td>
                                    <td>{{ $employee->location }}</td>
                                    <td>${{ $employee->salary }}</td>

                                    <td class="">
                                        <div class="d-flex">

                                            <div>
                                                <a class="btn btn-primary"
                                                    href="{{ route('credit_show', $employee->id) }}"style="margin-right:10px;">Credit</a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="">
                                        <div class="d-flex">

                                            <div>
                                                <a class="btn btn-primary"
                                                    href="{{ route('edit', $employee->id) }}" style="margin-right:10px;"><i class="fa fa-edit"></i></a>
                                            </div>

                                            <form action="{{ route('delete', $employee->id) }}" method="post"
                                                onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        No record
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </table>
                {!! $employees->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>

        </div>

    </div>
</x-layout>
