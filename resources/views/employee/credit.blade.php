<x-layout>
    <div class="py-5 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="border border-3 border-primary"></div>
                    <div class="card bg-white">
                        <div class="card-body p-5">
                            <form class="mb-3 mt-md-4" method="POST" action="">
                                @csrf
                                <h3 class="mb-2 fw-bold">Credit Employee
                                </h3>

                                <div class="mb-3">
                                    <label for="salary" class="form-label fw-bold">Amount</label>
                                    <input type="number" value="{{ old('amount') }}" name="amount" class="form-control" id="email"
                                        placeholder="amount">
                                    @error('amount')
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
