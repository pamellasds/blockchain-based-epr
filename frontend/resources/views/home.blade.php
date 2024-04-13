@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body" style="font-size: 120%">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('Olá! Seja bem-vindo!!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--
    <section class="tracking" style="height: 120%">
        <div class="order-track-step">
            <div class="order-track-status">
                <span class="order-track-status-dot"></span>
                <span class="order-track-status-line"></span>
            </div>
            <div class="order-track-text">
                <p class="order-track-text-stat">Diploma add by HEI</p>
                <span class="order-track-text-sub">UECE</span>
                <br>
                <span class="order-track-text-sub">1st November, 2019</span>
            </div>
        </div>
        <div class="order-track-step">
            <div class="order-track-status">
                <span class="order-track-status-dot"></span>
                <span class="order-track-status-line"></span>
            </div>
            <div class="order-track-text">
                <p class="order-track-text-stat"> RCM register created (1st registration)</p>
                <span class="order-track-text-sub">CREMEC</span>
                <br>
                <span class="order-track-text-sub">1st November, 2019</span>
            </div>
        </div>
        <div class="order-track-step">
            <div class="order-track-status">
                <span class="order-track-status-dot"></span>
                <span class="order-track-status-line"></span>
            </div>
            <div class="order-track-text">
                <p class="order-track-text-stat"> Speciality Register add by SE</p>
            </div>
        </div>
    </section>
-->


@endsection
