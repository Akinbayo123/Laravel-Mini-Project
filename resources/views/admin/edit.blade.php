<x-layout>
    <div class="py-5 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="border border-3 border-primary"></div>
                    <div class="card bg-white">
                        <div class="card-body p-5">
                            <form class="mb-3 mt-md-4" method="POST" action="{{ route('update',$employee->id) }}">
                                @csrf
                                @method('PUT')
                                <h3 class="mb-2 fw-bold">Edit Employee
                                </h3>

                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Name</label>
                                    <input type="text" value="{{ $employee->name }}" name="name" class="form-control" id="email"
                                        placeholder="Name of employee">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Email</label>
                                    <input type="email" value="{{ $employee->email }}" name="email" class="form-control" id="email"
                                        placeholder="Email">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label fw-bold">Role</label>
                                    <select name="role" class="form-control" id="">
                                        <option value="Manager"@selected($employee->role == "Manager")>Manager</option>
                                        <option value="Secretary"@selected($employee->role == "Secretary")>Secretary</option>
                                        <option value="Accountant"@selected($employee->role == "Accountant")>Accountant</option>
                                        <option value="Analyst"@selected($employee->role == "Analyst")>Analyst</option>
                                        <option value="Developer"@selected($employee->role == "Developer")>Developer</option>
                                    </select>
                                    @error('role')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label fw-bold">Usertype</label>
                                    <select name="user_type" class="form-control" id="">
                                        <option value="1"@selected($employee->user_type== "1")>Admin</option>
                                        <option value="0"@selected($employee->user_type == "0")>Employee</option>    
                                    </select>
                                    @error('role')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="location" class="form-label fw-bold">Location</label>
                                    <input type="text"value="{{ $employee->location }}" name="location" class="form-control" id="location"
                                        placeholder="location">
                                    @error('location')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="salary" class="form-label fw-bold">Salary</label>
                                    <input type="number" value="{{ $employee->salary }}"  name="salary" class="form-control" id="email"
                                        placeholder="salary">
                                    @error('salary')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="salary" class="form-label fw-bold">Password</label>
                                    <input type="password" value="{{ old('password') }}" name="password" class="form-control" id="password"
                                        placeholder="Password">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label fw-bold">Confirm Password</label>
                                    <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control" id="password"
                                        placeholder="Password Confirmation">
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-outline-dark" type="submit">Update</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





</x-layout>
