<x-layout>
    <div class="py-5 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="border border-3 border-primary"></div>
                    <div class="card bg-white">
                        <div class="card-body p-5">
                            @if ($wallet->wallet_status != 0)
                                <h4 class="text-center">Available Balance: ${{ $wallet->balance }}</h4>
                                <h5 class="mt-5">Date Last Created: </h5>
                            @else
                                <p>Wallet Not Yet Activated</p>
                                <form action="{{ route('activate', $wallet->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success">Active Wallet</button>
                                </form>
                            @endif



                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>





</x-layout>
