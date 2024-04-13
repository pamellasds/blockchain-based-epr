@extends('layouts.app')

@section('content')
    <?php header('Access-Control-Allow-Origin: *'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $(".cpf").mask("000.000.000-00");
        });

    </script>

    <div class="container">

        <!--<style>
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

                                                                                                                    </style>-->

        <div class="container">

            @if (!empty($message))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            <div class="card-body">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tipo de Registro</th>
                            <th>Data de Registro</th>
                            <th>Registro</th>
                            <th>Controle de Acesso</th>
                            <th>Médicos Autorizados</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registros as $registro)
                            <tr>
                                <td>{{ $registro->id }}</td>
                                <td>
                                    @if ($registro->register_type == 1)
                                        Anamnese
                                    @elseif ($registro->register_type == 2)
                                        Observação
                                    @elseif ( $registro->register_type == 3)
                                        Diagnóstico
                                    @else
                                        Medicação
                                    @endif
                                </td>
                                <td>
                                    {{ $registro->created_at }}
                                </td>
                                <td>
                                    <a id='dwnldLnk_{{ $registro->id }}' download='registro-{{ $registro->id }}.pdf'
                                        style="display:none;" />
                                    <a type="button" class="btn btn-primary" name='registroPaciente_{{ $registro->id }}'
                                        id='registroPaciente_{{ $registro->id }}' title="Registro do Paciente">
                                        <i class="fa fa-file-pdf"></i>
                                    </a>
                                    <script>
                                        var registro = {!! json_encode($registro) !!};
                                        $("#registroPaciente_" + registro.id).click(async function() {
                                            var registro = {!! json_encode($registro) !!};
                                            response = await fetch(
                                                'https://medicalrecord-ms.herokuapp.com/read_register/', {
                                                    mode: 'cors',
                                                    method: "POST",
                                                    headers: {
                                                        'Accept': 'application/json',
                                                        'Content-Type': 'application/json'
                                                    },
                                                    body: JSON.stringify({
                                                        idRegister: registro.id,
                                                        idUser: registro.user_patient_id,
                                                        "idTypeUser": 1
                                                    })
                                                });
                                            response = await response.json();
                                            var dlnk = document.getElementById('dwnldLnk_' + registro.id);
                                            var pdf = 'data:application/octet-stream;base64,' + response
                                                .register.media_base64;
                                            dlnk.href = pdf;
                                            dlnk.click();
                                        });

                                    </script>
                                </td>
                                <td>
                                    <a type="button" class="btn btn-success" data-toggle="modal" target="_Blank"
                                        data-target="#exampleModal_{{ $registro->id }}" title="Autorizar">
                                        <i class="fa fa-check"></i> Liberar
                                    </a>
                                    <a type="button" class="btn btn-danger" data-toggle="modal" target="_Blank"
                                        data-target="#denyModal_{{ $registro->id }}" title="Desautorizar">
                                        <i class="fa fa-times"></i> Negar
                                    </a>
                                </td>
                                <td>
                                    <a type="button" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#accessbutton_{{ $registro->id }}" target="_Blank"
                                        title="Médicos Autorizados">
                                        <i class="fa fa-users"></i>
                                    </a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Tipo de Registro</th>
                            <th>Data de Registro</th>
                            <th>Registro</th>
                            <th>Controle de Acesso</th>
                            <th>Médicos Autorizados</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    @endsection('content')


    @section('custom-content-footer')
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    "language": {
                        "lengthMenu": "Mostrando _MENU_ Registros por página",
                        "zeroRecords": "Nenhum registro cadastrado.",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(Filtrando de um total de _MAX_ registro(s))",
                        "search": "Buscar: ",
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

        @foreach ($registros as $registro)
            <!-- Modal LIBERAR -->
            <div class="modal fade" id="exampleModal_{{ $registro->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Autorizar Acesso</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- componente LOADING-->
                            <div id="loadingLib_{{ $registro->id }}" style="display: none;">
                                <div class="loader"> </div>
                                <h5 class="center">Alterando controle de acesso na blockchain...</h5>
                            </div>
                            <div class="col-md-8">
                                <label for="idProfissional"
                                    class="col-form-label text-left">{{ __('CPF do Profissional de Saúde') }}</label>
                                <input id="idProfissional_{{ $registro->id }}" type="text"
                                    class="form-control cpf @error('idProfissional') is-invalid @enderror"
                                    name="idProfissional" value="{{ old('idProfissional') }}" required
                                    autocomplete="idProfissional" autofocus>
                                <br>
                                <a class="btn btn-outline-primary" id='checkProfissional_{{ $registro->id }}'
                                    name="checkProfissional_{{ $registro->id }}">
                                    Checar Profissional
                                </a>
                                <script>
                                    var registro = {!! json_encode($registro) !!};
                                    $("#checkProfissional_" + registro.id).click(async function() {
                                        var registro = {!! json_encode($registro) !!};
                                        cpf = document.getElementById('idProfissional_' + registro.id).value;
                                        response = await fetch(
                                            'http://localhost:8000/api/get-profissional?cpf=' +
                                            cpf);
                                        response = await response.json();
                                        if (response.profissional != null) {
                                            document.getElementById("nome_" + registro.id).textContent =
                                                response.profissional
                                                .nome;
                                            document.getElementById("crm_" + registro.id).textContent = response
                                                .profissional
                                                .qualificationIdentifier;
                                            document.getElementById("dados_" + registro.id).style.display =
                                                "block";
                                        } else {
                                            alert('CPF não encontrado para esse profissional!')
                                        }
                                    });

                                </script>
                            </div>

                            <div class='col-md-10' id='dados_{{ $registro->id }}' style="display: none">
                                <div class="row">
                                    <label class="col-form-label text-left">{{ __('Nome:') }}</label>
                                    <label id="nome_{{ $registro->id }}" class="col-form-label text-left"
                                        style="margin-left: 5%"></label>
                                </div>
                                <div class="row">
                                    <label class="col-form-label text-left">{{ __('CRM:') }}</label>
                                    <label id="crm_{{ $registro->id }}" class="col-form-label text-left"
                                        style="margin-left: 5%"></label>
                                </div>
                            </div>

                            {{-- <div class="col-md-8">
                            <label for="date" class="col-form-label text-left">{{ __('Disponibilizar registro até:') }}</label>
                            <input id="date" type="datetime-local" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>
                        </div> --}}

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button id='autorizar_{{ $registro->id }}' name="autorizar_{{ $registro->id }}"
                                type="button" class="btn btn-primary">Autorizar</button>
                            <script>
                                var registro = {!! json_encode($registro) !!};
                                $("#autorizar_" + registro.id).click(async function() {
                                    var registro = {!! json_encode($registro) !!};
                                    document.getElementById('loadingLib_' + registro.id).style.display =
                                        "block";
                                    document.getElementById('autorizar_{{ $registro->id }}').disabled =
                                        true;
                                    cpf = document.getElementById('idProfissional_' + registro.id).value;
                                    response = await fetch(
                                        'http://localhost:8000/api/get-profissional?cpf=' +
                                        cpf);
                                    response = await response.json();
                                    idUser = response.profissional.user_id;

                                    fetch(
                                        'http://localhost:8000/api/auth-access', {
                                            mode: 'cors',
                                            method: "POST",
                                            headers: {
                                                'Accept': 'application/json',
                                                'Content-Type': 'application/json'
                                            },
                                            body: JSON.stringify({
                                                idRegister: registro.id,
                                                idPatient: registro.pacient_id,
                                                idUser: idUser
                                            })
                                        });

                                    response = await fetch(
                                        'https://medicalrecord-ms.herokuapp.com/allow_access/', {
                                            mode: 'cors',
                                            headers: {
                                                'Accept': 'application/json',
                                                'Content-Type': 'application/json'
                                            },
                                            method: "POST",
                                            body: JSON.stringify({
                                                idRegister: registro.id,
                                                idPatient: registro.pacient_id,
                                                idUser: idUser
                                            })
                                        });
                                    response = await response.json();
                                    if (response.success == true) {
                                        if (alert('Acesso autorizado!')) {} else window.location.reload();
                                        document.getElementById('loading_' + registro.id).style.display =
                                            "none";
                                        document.getElementById('autorizar_' + registro.id)
                                            .disabled = false;
                                    } else {
                                        alert(response.message);
                                        document.getElementById('loadingLib_' + registro.id).style.display =
                                            "none";
                                        document.getElementById('autorizar_' + registro.id)
                                            .disabled = false;
                                    }
                                });

                            </script>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        @foreach ($registros as $registro)
            <!-- Modal NEGAR -->
            <div class="modal fade" id="denyModal_{{ $registro->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Desautorizar Acesso</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- componente LOADING-->
                            <div id="loading_{{ $registro->id }}" style="display: none;">
                                <div class="loader"> </div>
                                <h5 class="center">Alterando controle de acesso na blockchain...</h5>
                            </div>
                            <div class="col-md-8">
                                <label for="idDenyProfissional"
                                    class="col-form-label text-left">{{ __('CPF do Profissional de Saúde') }}</label>
                                <input id="idDenyProfissional{{ $registro->id }}" type="text"
                                    class="form-control cpf @error('idDenyProfissional') is-invalid @enderror"
                                    name="idDenyProfissional" value="{{ old('idDenyProfissional') }}" required
                                    autocomplete="idProfissional" autofocus>
                                <br>
                                <a class="btn btn-outline-primary" id='checkDenyProfissional_{{ $registro->id }}'
                                    name="checkDenyProfissional_{{ $registro->id }}">
                                    Checar Profissional
                                </a>
                                <script>
                                    var registro = {!! json_encode($registro) !!};
                                    $("#checkDenyProfissional_" + registro.id).click(async function() {
                                        var registro = {!! json_encode($registro) !!};
                                        cpf = document.getElementById('idDenyProfissional' + registro.id).value;
                                        response = await fetch(
                                            'http://localhost:8000/api/get-profissional?cpf=' +
                                            cpf);
                                        response = await response.json();
                                        if (response.profissional != null) {
                                            document.getElementById("nomeDeny_" + registro.id).textContent =
                                                response.profissional
                                                .nome;
                                            document.getElementById("crmDeny_" + registro.id).textContent =
                                                response
                                                .profissional
                                                .qualificationIdentifier;
                                            document.getElementById("dadosDeny_" + registro.id).style.display =
                                                "block";
                                        } else {
                                            alert('CPF não encontrado para esse profissional!')
                                        }
                                    });

                                </script>
                            </div>

                            <div class='col-md-10' id='dadosDeny_{{ $registro->id }}' style="display: none">
                                <div class="row">
                                    <label class="col-form-label text-left">{{ __('Nome:') }}</label>
                                    <label id="nomeDeny_{{ $registro->id }}" class="col-form-label text-left"
                                        style="margin-left: 5%"></label>
                                </div>
                                <div class="row">
                                    <label class="col-form-label text-left">{{ __('CRM:') }}</label>
                                    <label id="crmDeny_{{ $registro->id }}" class="col-form-label text-left"
                                        style="margin-left: 5%"></label>
                                </div>
                            </div>

                            {{-- <div class="col-md-8">
                        <label for="date" class="col-form-label text-left">{{ __('Disponibilizar registro até:') }}</label>
                        <input id="date" type="datetime-local" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>
                    </div> --}}

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button id='desautorizar_{{ $registro->id }}' name="autorizar_{{ $registro->id }}"
                                type="button" class="btn btn-primary">Desautorizar</button>
                            <script>
                                var registro = {!! json_encode($registro) !!};
                                $("#desautorizar_" + registro.id).click(async function() {
                                    var registro = {!! json_encode($registro) !!};
                                    var idPatient = {!! json_encode($idPatient) !!};
                                    document.getElementById('loading_' + registro.id).style.display =
                                        "block";
                                    document.getElementById('desautorizar_{{ $registro->id }}').disabled =
                                        true;

                                    cpf = document.getElementById('idDenyProfissional' + registro.id).value;
                                    response = await fetch(
                                        'http://localhost:8000/api/get-profissional?cpf=' +
                                        cpf);
                                    response = await response.json();
                                    idUser = response.profissional.user_id;

                                    fetch(
                                        'http://localhost:8000/api/remove-access', {
                                            mode: 'cors',
                                            method: "POST",
                                            headers: {
                                                'Accept': 'application/json',
                                                'Content-Type': 'application/json'
                                            },
                                            body: JSON.stringify({
                                                idRegister: registro.id,
                                                idPatient: registro.pacient_id,
                                                idUser: idUser
                                            })
                                        });

                                    response = await fetch(
                                        'https://medicalrecord-ms.herokuapp.com/deny_access/', {
                                            mode: 'cors',
                                            headers: {
                                                'Accept': 'application/json',
                                                'Content-Type': 'application/json'
                                            },
                                            method: "POST",
                                            body: JSON.stringify({
                                                idRegister: registro.id,
                                                idPatient: registro.pacient_id,
                                                idUser: idUser
                                            })
                                        });
                                    response = await response.json();
                                    if (response.success == true) {
                                        if (alert('Acesso revogado!')) {} else window.location.reload();
                                        document.getElementById('loading_' + registro.id).style.display =
                                            "none";
                                        document.getElementById('desautorizar_' + registro.id)
                                            .disabled = false;
                                    } else {
                                        alert(response.message);
                                        document.getElementById('loading_' + registro.id).style.display =
                                            "none";
                                        document.getElementById('desautorizar_' + registro.id)
                                            .disabled = false;

                                    }
                                });

                            </script>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        <!-- Modal ACESSOS -->

        @foreach ($registros as $registro)
            <div class="modal fade" id="accessbutton_{{ $registro->id }}" tabindex="-1" role="dialog"
                aria-labelledby="entidadeSaudeLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="entidadeSaudeLabel">Entidades Autorizadas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group">
                                @if (sizeof($registro->acessos) == 0)
                                    <li class="list-group-item">Nenhum médico autorizado</li>
                                @else
                                    @foreach ($registro->acessos as $acesso)
                                        <li class="list-group-item">{{ $acesso->nome }} CPF: {{ $acesso->cpf }}</li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    @endsection
    @section('custom-content-footer')
    @endsection('custom-content-footer')
