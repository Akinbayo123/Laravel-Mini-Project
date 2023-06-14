<x-layout>
    <div class="container-fluid mt-5 px-4">

        <div class="container mr-4 px-4 bg-light">

            <div class="table-responsive">
                <table class="table">
                    <table class="table caption-top">
                        <caption class="h2 fw-bold">Employees</caption>
                        <thead>
                            
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Role</th>
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
                                <td>{{ $employee->location }}</td>
                                <td>${{ $employee->salary }}</td>

                                <td class="">
                                    <div class="d-flex">

                                      <div>
                                            <a class="btn btn-primary mx-3" href="{{ route('edit',$employee->id) }}" >Credit Wallet</a>
                                    </div>

                                        <form action="{{ route('delete',$employee->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">View Wallet</button>
                                        </form>

                                    </div>
                                </td>

                                <td class="">
                                    <div class="d-flex">

                                      <div>
                                            <a class="btn btn-primary mx-3" href="{{ route('edit',$employee->id) }}" >Edit</a>
                                    </div>

                                        <form action="{{ route('delete',$employee->id) }}" method="post" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
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
