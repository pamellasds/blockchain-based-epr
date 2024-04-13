@extends('layouts.app')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $("#idPatient").mask("000.000.000-00");
        });
</script>

    <div class="container">

        @if (!empty($message))
            <div class="alert alert-success">
                <h4><i class="fas fa-th"></i>    {{ $message }}</h4>
                <h6>Você tem permissão de acesso até seu paciente decidir realizar as alterações de permissão.</h6>  
            </div>
        @endif

        <!-- Registro Diagnóstico -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar de Diagnóstico') }}</div>

                    <div class="card-body">
                        <form action="/send-register-diagnostic" method="POST">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="idPatient"
                                        class="col-form-label text-left">{{ __('CPF do Paciente') }}</label>
                                    <input id="idPatient" type="text"
                                        class="form-control @error('idPatient') is-invalid @enderror" id="idPatient" name="idPatient"
                                        value="{{ old('idPatient') }}" required autocomplete="idPatient" autofocus>
                                    <br>
                                    <a class="btn btn-outline-primary" id='checkPatient' name="checkPatient">Checar
                                        Paciente</a>
                                    @error('idPatient')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <br>
                            <div class='col-md-10' id='dados' style="display: none">
                                <div class="row">
                                    <label class="col-form-label text-left">{{ __('Nome:  ') }}</label>
                                    <label id="nome" class="col-form-label text-left" style="margin-left: 5%"></label>
                                </div>
                            </div>
                            <br>

                            <p><strong>Testes</strong></p>

                            <div class="input_fields_wrap">
                                <br>
                                <ol id="list">
                                    <li class="list_var">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <input class="form-control" type="text" name="diagnosticName_0"
                                                    placeholder="Nome" list="Nome">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input class="form-control coa" type="text" name="diagnosticValue_0"
                                                    id="diagnosticValue_0" placeholder="Valor">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <input class="form-control coa" type="text" name="diagnosticInt_0"
                                                    id="diagnosticInt_0" placeholder="Interpretação">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <button class="list_del btn btn-danger" id='Dell'><i
                                                        class="fa fa-times-circle"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                                <button type="button" value="Add" id='Add'
                                    class="list_add btn btn-outline-primary">ADICIONAR NOVO TESTE</button>
                                <br><br>


                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Registrar Diagnóstico') }}
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection('content')

@section('custom-content-footer')
    <script>
        $('#list').addInputArea({
            maximum: 5
        });

        $("#checkPatient").click(async function() {
            cpf = document.getElementById('idPatient').value;
            response = await fetch('http://localhost:8000/api/get-patient?cpf=' + cpf);
            response = await response.json();

            if (response.patient != null) {
                document.getElementById("nome").textContent = response.patient.nome;
                document.getElementById("dados").style.display = "block";
            } else {
                alert('CPF não encontrado para esse paciente!')
            }

        });

    </script>
@endsection('custom-content-footer')
