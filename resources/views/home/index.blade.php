@extends('layouts.app')

@section('title', "Sam's App 1 - Home Page")
@section('content')
<div class="container justify-content-center">
    <div class="row justify-content-center">
        <div class="col col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>{{$acct->handle}}'s Dashboard</h4>
                </div>
                <div class="card-body">
                    <restaurant-editor> </restaurant-editor>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()