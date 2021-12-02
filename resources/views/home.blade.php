@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Available Plans</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-vertical" role="form" method="POST" action="{{ url('/userPlansCreate') }}">
                            @csrf
                            @foreach ($plans as $key => $data)
                            <div class="clearfix">
                                <h3>@strtoupper($data->plans)</h3>
                                <img src="{{ route("images.path", $data->images->file_path) }}" class="img-fluid" width="100%">
                                <div class="clearfix">&nbsp;</div>
                                <p>
                                    Rp. @money($data->price)
                                </p>
                                <p>
                                    {{ $data->description }}
                                </p>
                            </div>
                            <a href="{{ url('/userPlansCreate') }}/{{ $data->id }}" type="button" class="btn btn-primary">
                                <i class="fa fa-btn fa-sign-in"></i> Create This Plan
                            </a>
                            <div class="clearfix">&nbsp;</div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($usersPlannings)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">On Going Current Plans</div>
                    <div class="card-body">
                        <div class="clearfix">
                            <h3>@strtoupper($usersPlannings->plans)</h3>
                            <img src="{{ route("images.path", $usersPlannings->file_path) }}" class="img-fluid" width="100%">
                            <div class="clearfix">&nbsp;</div>
                            <p>
                                Rp. @money($usersPlannings->price)
                            </p>
                            <p>
                                {{ $usersPlannings->description }}
                            </p>
                        </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ route("user.deposit", ["UsersPlanningsId" => $usersPlannings->id]) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Deposit to your plans</label>
                                    <input type="text" class="form-control" name="deposit" id="nominalDeposit" aria-describedby="emailHelp" placeholder="Nominal Deposit">
                                    <small id="emailHelp" class="form-text text-muted">Nominal Deposit.</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Deposit</button>
                            </form>
                        @endif

                        @if ($transactionUserPlans)

                        @include('userTransactions')
                        <div class="clearfix">&nbsp;</div>
                        <div class="title m-b-md">
                            <h4>History Deposit This Plans</h4>
                            <small id="emailHelp" class="form-text text-muted">Total: Rp. @money($total_deposits)</small>
                        </div>

                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Deposit</th>
                                <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $count = 1 @endphp
                            @foreach ($transactionUserPlans as $key => $data)
                                <tr>
                                    <th scope="row">{{ $count++ }}</th>
                                    <td>Rp. @money($data->nominal)</td>
                                    <td>{{ date('d-m-Y, H:i:s', strtotime($data->created_at)) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix">&nbsp;</div>
</div>
@endif
@endsection
