@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Dashboard</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <a href="http://localhost:8080/proj/public/main">
                <button class="btn-primary btn-lg">POINT OF SALE</button>
                </a>
                 <br>
                 <a href="http://localhost:8080/proj/public/profile/create">
                    <button class="btn-warning btn-lg">CREATE PROFILE</button>
                    </a>


                <br>
                <a href="http://localhost:8080/proj/public/profile">
                    <button class="btn-success btn-lg">CHECK YOUR PROFILE</button>
                    </a>
            </div>
        </div>
    </div>
</div>




@endsection
