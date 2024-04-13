@extends('layouts.app')
@section('content')

    <div class="container">


        <style>
            h2,
            h4,
            h6 {
                margin: 0;
                padding: 0;
                display: inline-block;
            }

            .tracking {

                background-color: #fefefe;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                width: 40%;

                padding: 1rem;
                border-radius: 5px;
                box-shadow: 0 2rem 6rem rgba(0, 0, 0, 0.3);
                color: #2c3e50;
                font-family: 'Montserrat', sans-serif;
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

            /* The Modal (background) */
            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                padding-top: 100px;
                /* Location of the box */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.4);
                /* Black w/ opacity */
            }

            /* Modal Content */
            .modal-content {
                background-color: #fefefe;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
            }

            /* The Close Button */
            .close {
                color: #aaaaaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }

        </style>

        @if (!empty($message))
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @endif

        <div class="row" style="margin-top: 6%;margin-bottom: 6%;">
            <div class="col">
                <fieldset>
                    @if (Auth::user()->type === 1)
                        <legend>
                            <p>Search for Doctors</p>
                        </legend>
                    @elseif(Auth::user()->type === 2)
                        <legend>
                            <p>Search for Gratuate Students</p>
                        </legend>
                    @elseif(Auth::user()->type === 3)
                        <legend>
                            <p>Search for Specialization Student</p>
                        </legend>
                    @endif

                    <table cellspacing="10">
                        <tr>
                            <label style="font-size: 150%" for="text">identifier: </label>
                            <form method="post" action="get-search">
                                @csrf
                                <input id="identifier" type="text" name="identifier">
                                <input id="search" type="submit" value="search">
                            </form>
                            <form method="post" action="get-search-all">
                                @csrf
                                <input id="all" type="submit" value="all">
                            </form>
                        </tr>
                    </table>

                </fieldset>
            </div>

            @if (!empty($results))
                @if (Auth::user()->type === 1)
                    <table id="example" class="display" style="margin-top: 6%;width:100%">
                        <thead>
                            <tr>
                                <th>Identifier</th>
                                <th>University Degree</th>
                                <th>Specialty Certificate</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{ $result->Identifier }}</td>
                                    <td>{{ $result->UniversityDegree }}</td>
                                    @if ($result->SpecialtyCertificate == 'null')
                                        <td></td>
                                    @else
                                        <td>{{ $result->SpecialtyCertificate }}</td>
                                    @endif
                                    <td>
                                        <a id="myBtn" class="btn btn-success" target="_Blank" title="See">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="user?id={{ $result->Identifier }}" class="btn btn-success" target="_Blank"
                                            title="See">
                                            <i class="fas fa-user"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @elseif(Auth::user()->type === 2)
                    <table id="example" class="display" style="margin-top: 6%;width:100%">
                        <thead>
                            <tr>
                                <th>Identifier</th>
                                <th>Date</th>
                                <th>University Degree</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{ $result->Identifier }}</td>
                                    <td>{{ $result->date }}</td>
                                    <td>{{ $result->UniversityDegree }}</td>
                                    <td>
                                        <a href="user?id={{ $result->Identifier }}" class="btn btn-success" target="_Blank"
                                            title="See">
                                            <i class="fas fa-user"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @elseif(Auth::user()->type === 3)
                    <table id="example" class="display" style="margin-top: 6%;width:100%">
                        <thead>
                            <tr>
                                <th>Identifier</th>
                                <th>Date</th>
                                <th>Specialty Certificate</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{ $result->Identifier }}</td>
                                    <td>{{ $result->date }}</td>
                                    @if ($result->SpecialtyCertificate == 'null')
                                        <td></td>
                                    @else
                                        <td>{{ $result->SpecialtyCertificate }}</td>
                                    @endif
                                    <td>
                                        <a href="user?id={{ $result->Identifier }}" class="btn btn-success" target="_Blank"
                                            title="See">
                                            <i class="fas fa-user"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            @endif
        </div>
    </div>

    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div>
            <section class="tracking" style="height: 110%; margin-left: 10%">
                <span class="close">&times;</span>
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
                        <span class="order-track-status-dot"></span>
                    </div>
                    <div class="order-track-text">
                        <p class="order-track-text-stat">RCM speciality register created </p>
                        <span class="order-track-text-sub">Regional Concil of Medicine of Ceará</span>
                        <br>
                        <span class="order-track-text-sub">14/05/2014</span>
                    </div>
                </div>
                <br>
            </section>


        </div>

    </div>

@endsection

@section('custom-content-footer')

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "lengthMenu": "Mostrando _MENU_ Planos por página",
                    "zeroRecords": "Nada encontrado - desculpe",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(Filtrando de um total de _MAX_ registro(s))",
                    "search": "Buscar",
                    "paginate": {
                        "first": "Primeiro",
                        "last": "Último",
                        "next": "Próximo",
                        "previous": "Anterior"
                    },
                }
            });
        });

    </script>
@endsection
