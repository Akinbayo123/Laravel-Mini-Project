<x-layout>
   
    

    <div class="py-5 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-8 me-auto">
                    <div class="border border-3"></div>
                    <div class="card bg-white">
                        <div class="card-body p-3">
                            <form class="mb-3 mt-md-4" method="POST" action="{{ route('update_details',auth()->user()->id) }}">
                                @csrf
                                <h3 class="mb-2 h4 fw-bold">Update Details
                                </h3>

                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Email</label>
                                    <input type="text" value="{{ auth()->user()->email }}" name="email" class="form-control" id="email"
                                        placeholder="Email">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                               
                                <div class="mb-3">
                                    <label for="location" class="form-label fw-bold">Name</label>
                                    <input type="text" value="{{ auth()->user()->name }}" name="name" class="form-control" id="location"
                                        placeholder="Password">
                                    @error('location')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                               
                                <div class="">
                                    <button class="btn btn-outline-dark" type="submit">Update</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>


    <div class="py-3 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-8 me-auto">
                    <div class="border border-3"></div>
                    <div class="card bg-white">
                        <div class="card-body p-3">
                            <form class="mb-3 mt-md-4" method="POST" action="{{ route('password_update',auth()->user()->id) }}">
                                @csrf
                                <h3 class="mb-2 h4 fw-bold">Update Password
                                </h3>

                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Current Password</label>
                                    <input type="password" value="{{ old('password') }}" name="current_password" class="form-control" id="current_password"
                                        placeholder="Current Password">
                                    @error('current_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                               
                                <div class="mb-3">
                                    <label for="location" class="form-label fw-bold">New Password</label>
                                    <input type="password" value="{{ old('password') }}" name="password" class="form-control" id="location"
                                        placeholder="New Password">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="location" class="form-label fw-bold">Confirm Password</label>
                                    <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control" id="location"
                                        placeholder="Confirm Password">
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                               
                                <div class="">
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
