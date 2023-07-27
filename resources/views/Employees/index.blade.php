<x-layout>
    <div class="container-fluid mt-5  px-4">
        <div class="container">
            <div class="row">
                @if ($wallet->wallet_status != 0)
                <div class="col-lg-5 col-sm-6 mb-5">
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
                <div class="col-lg-5 col-sm-6 mb-5">
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
    </div>
    <div class=" mr-4 px-4 bg-light">

        <div class="table-responsive">
            <table class="table">
                <table class="table caption-top">
                    <caption class="h2 fw-bold">Tasks</caption>
                    <thead>

                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tasks</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th scope="row">1</th>

                            <td>Review the documents</td>
                            <td class="">
                                <div>
                                    <a class="btn btn-primary" href="" style="margin-right:10px;">Submit</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>

                            <td>Review the documents</td>
                            <td class="">
                                <div>
                                    <a class="btn btn-primary" href="" style="margin-right:10px;">Submit</a>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </table>

        </div>

    </div>

    </div>
</x-layout>
