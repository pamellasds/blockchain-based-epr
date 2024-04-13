@extends('layouts.app')

@section('content')
    <div class="container">

        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="card-body" style="margin-top: 6%">
            <form method="post" action="edit-user">
                @csrf
                <input type="hidden" name="identifier" id="identifier" value="{{ $database->identifier ?? old('id') }}">
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="email"><strong>Identifier:</strong></label>
                        <input type="text"  value="537.798.110-30" name="identifier" id="identifier" class="form-control" disabled>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="email"><strong>University Degree Id:</strong></label>
                        <input type="text"  value="1234" name="universityDegree" id="universityDegree" class="form-control" disabled>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="email"><strong>Specialty Certificate Id:</strong></label>
                        <input type="text"  value="1234" name="specialtyCertificate" id="specialtyCertificate" class="form-control" disabled>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nome"><strong>Name:</strong></label>
                        <input type="text" required name="name" id="name" class="form-control"
                            value="{{ $database->name ?? old('name') }}" placeholder="Name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="city"><strong>City:</strong></label>
                        <input type="text" name="city" id="city" class="form-control"
                            value="{{ $database->city ?? old('city') }}" placeholder="City">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="uf"><strong>State:</strong></label>
                        <input type="text" name="state" id="state" class="form-control"
                            value="{{ $database->state ?? old('uf') }}" placeholder="State">
                    </div>
                </div>

                <div class="form-row">
                    <a class="btn btn-primary" style="background-color: #00B843; width: 10%" href="/search" >Back</a>
                    <button class="btn btn-primary" style="margin-left: 1%; background-color: #00B843; width: 10%">Edit</button>
                </div>
            </form>
        </div>
    @endsection
