@extends('layouts.app')

@section('content')
    <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">Registered User</h4>
                                </div>
                                <div class="card-body table-body">
                                    <table class="table">
                                        <thead class="text-warning">
                                        <th>UserID</th>
                                        <th>BandID</th>
                                        <th>RFID</th>
                                        <th>Team</th>
                                        <th>Checkout</th>
                                        </thead>
                                        <tbody>
                                        @foreach($eventChecks as $eventCheck => $ec)
                                            <tr>
                                                <td>{{$ec->UserID}}</td>
                                                <td>{{$ec->BandID}}</td>
                                                <td>{{$ec->RFID}}</td>
                                                <td>{{$ec->Team}}</td>
                                                <td>{{$ec->Checkout}}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
