@extends('layouts.app')

@section('content')

<style>
    h2,
    h4,
    h6 {
        margin: 0;
        padding: 0;
        display: inline-block;
    }

    .tracking {
        padding: 1rem;
        border-radius: 5px;
        box-shadow: 0 2rem 6rem rgba(0, 0, 0, 0.3);
        color: #2c3e50;
        font-family: 'Montserrat', sans-serif;
        width: 40rem;
        margin: 2rem auto;
    }

    figure {
        display: flex;
    }

    figure img {
        width: 8rem;
        height: 8rem;
        border-radius: 15%;
        border: 1.5px solid #28B463;
        margin-right: 1.5rem;
        padding: 1rem;
    }

    figure figcaption {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
    }

    figure figcaption h4 {
        font-size: 1.4rem;
        font-weight: 500;
    }

    figure figcaption h6 {
        font-size: 1rem;
        font-weight: 300;
    }

    figure figcaption h2 {
        font-size: 1.6rem;
        font-weight: 500;
    }

    .order-track {
        margin-top: 2rem;
        padding: 0 1rem;
        border-top: 1px dashed #2c3e50;
        padding-top: 2.5rem;
        display: flex;
        flex-direction: column;
    }

    .order-track-step {
        display: flex;
        height: 7rem;
    }

    .order-track-step:last-child {
        overflow: hidden;
        height: 4rem;
    }

    .order-track-step:last-child .order-track-status span:last-of-type {
        display: none;
    }

    .order-track-status {
        margin-right: 1.5rem;
        position: relative;
    }

    .order-track-status-dot {
        display: block;
        width: 2.2rem;
        height: 2.2rem;
        border-radius: 50%;
        background: #28B463;
    }

    .order-track-status-line {
        display: block;
        margin: 0 auto;
        width: 2px;
        height: 7rem;
        background: #28B463;
    }

    .order-track-text-stat {
        font-size: 1.3rem;
        font-weight: 500;
        margin-bottom: 3px;
    }

    .order-track-text-sub {
        font-size: 1rem;
        font-weight: 300;
    }

    .order-track {
        transition: all .3s height 0.3s;
        transform-origin: top center;
    }

</style>

    <div class="container">

        @if (!empty($message))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
        @if (!empty($obj) && !isset($obj->NomeAluno))
            <div class="alert alert-danger">
                {{ 'Id not found' }}
            </div>
        @endif

        <div class="row" style="margin-top: 6%;">
            <div class="col">
                <form method="post" action="get-rcm-spec-data">
                    @csrf
                    <fieldset>
                        <legend>
                            <p>Medical Record</p>
                        </legend>

                        <table cellspacing="10">
                            <tr>
                                <td>
                                    <label for="id">Identifier: </label>
                                </td>
                                <td align="left">
                                    <input id="identifier" type="text" name="identifier">
                                    <input id="btnSubmit" type="submit" value="Search">
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <br><br>

                @if (!empty($message2))
                    <div class="alert alert-success">
                        {{ $message2 }}
                    </div>
                @endif

                @if (!empty($obj) && isset($obj->NomeAluno))
                    <form method="post" action="update-rcm-register">
                        @csrf
                        <fieldset>
                            <table cellspacing="10">
                                <tr>
                                    <td>
                                        <label for="name">Name: </label>
                                    </td>
                                    <td align="left">
                                        <input id="name" readonly type="text" name="name" value="{{ $obj->NomeAluno }}">
                                    </td>
                                </tr>
                                <br><br>
                                <tr>
                                    <td>
                                        <label for="id">Indentifier: </label>
                                    </td>
                                    <td align="left">
                                        <input id="identifier" readonly type="text" name="identifier"
                                            value="{{ $obj->Id }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="UniversityId">Specialty Certificate Id: </label>
                                    </td>
                                    <td align="left">
                                        <input id="specialityId" readonly type="text" name="specialityId"
                                            value="{{ $obj->CodEspecialidade }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="city">City: </label>
                                    </td>
                                    <td align="left">
                                        <input id="city" type="text" name="city">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="state">State: </label>
                                    </td>
                                    <td align="left">
                                        <input id="state" type="text" name="state">
                                    </td>
                                </tr>
                            </table>
                            <input id="btnSubmit" type="submit" value="Add">
                        </fieldset>
                    </form>
                @endif
            </div>
            <div class="col">
                @if (!empty($obj) && isset($obj->NomeAluno))
                    <section class="tracking" style="height: 110%; margin-left: 10%">
                        <div class="order-track-step">
                            <div class="order-track-status">
                                <span class="order-track-status-dot"></span>
                                <span class="order-track-status-line"></span>
                            </div>
                            <div class="order-track-text">
                                <p class="order-track-text-stat">Diploma add by HEI</p>
                                <span class="order-track-text-sub">State University of Ceará</span>
                                <br>
                                <span class="order-track-text-sub">01/31/2010</span>
                            </div>
                        </div>
                        <div class="order-track-step">
                            <div class="order-track-status">
                                <span class="order-track-status-dot"></span>
                                <span class="order-track-status-line" style="background-color: gray"></span>
                            </div>
                            <div class="order-track-text">
                                <p class="order-track-text-stat">RCM register created (1st registration)</p>
                                <span class="order-track-text-sub">Regional Concil of Medicine of Ceará</span>
                                <br>
                                <span class="order-track-text-sub">02/10/2010</span>
                            </div>
                        </div>
                        <div class="order-track-step">
                            <div class="order-track-status">
                                <span class="order-track-status-dot"></span>
                                <span class="order-track-status-line"></span>
                            </div>
                            <div class="order-track-text">
                                <p class="order-track-text-stat">Speciality add by SE</p>
                                <span class="order-track-text-sub">Brazilian Medical Association</span>
                                <br>
                                <span class="order-track-text-sub">05/05/2014</span>
                            </div>
                        </div>
                        <div class="order-track-step">
                            <div class="order-track-status">
                                <span class="order-track-status-dot" style="background-color: gray"></span>
                                <span class="order-track-status-line" style="background-color: gray"></span>
                            </div>
                            <div class="order-track-text">
                                <p class="order-track-text-stat"></p>
                            </div>
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </div>





@endsection
