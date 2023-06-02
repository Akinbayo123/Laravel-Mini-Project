<x-layout>
    <div class="py-5 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="border border-3 border-primary"></div>
                    <div class="card bg-white">
                        <div class="card-body p-5">
                            <form class="mb-3 mt-md-4" method="POST" action="{{ route('create') }}">
                                @csrf
                                <h3 class="mb-2 fw-bold">Create New Employee
                                </h3>

                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Name</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="email"
                                        placeholder="Name of employee">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label fw-bold">Role</label>
                                    <select name="role" class="form-control" id="">
                                        <option value="Manager">Manager</option>
                                        <option value="Secretary">Secretary</option>
                                        <option value="Accountant">Accountant</option>
                                        <option value="Analyst">Analyst</option>
                                        <option value="Developer">Developer</option>

                                    </select>
                                    @error('role')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="location" class="form-label fw-bold">Location</label>
                                    <input type="text" value="{{ old('location') }}" name="location" class="form-control" id="location"
                                        placeholder="location">
                                    @error('location')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="salary" class="form-label fw-bold">Salary</label>
                                    <input type="number" value="{{ old('salary') }}" name="salary" class="form-control" id="email"
                                        placeholder="salary">
                                    @error('salary')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-outline-dark" type="submit">Submit</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





</x-layout>
