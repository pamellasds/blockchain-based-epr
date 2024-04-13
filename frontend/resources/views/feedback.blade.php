@extends('layouts.app')

@section('content')
    <div class="container">

        @if (!empty($message))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <div class="row" style="margin-top: 6%;">
            <div class="col">
                <form method="post" action="register-feedback">
                    @csrf
                    <div class="form-group row">
                        <legend>
                            <p>Send Feedback</p>
                        </legend>
                    </div>
                    <div class="form-group row">
                        <input type="text" id="title" name="title" class="form-control mb-2 mr-sm-2" placeholder="Title">
                    </div>

                    <div class="form-group row">
                        <textarea type="text" id="text" name="text" class="form-control mb-2 mr-sm-2"
                            placeholder="Text"></textarea>
                    </div>

                    <div class="form-group row">
                        <input type="submit" id="send" class="btn btn-success mb-2" value="send">
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
