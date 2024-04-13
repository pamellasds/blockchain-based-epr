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

<!-- Registro Medicação -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Medicação') }}</div>

                <div class="card-body">
                    <form action="/send-register-medication" method="POST">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="idPatient" class="col-form-label text-left">{{ __('CPF do Paciente') }}</label>
                                <input id="idPatient" type="text" class="form-control @error('idPatient') is-invalid @enderror" name="idPatient" value="{{ old('idPatient') }}" required autocomplete="idPatient" autofocus>
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

                        <p><strong>Medicação</strong></9>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="remedio" class="col-form-label text-left">{{ __('Remédio') }}</label>
                                <input id="remedio" type="text" class="form-control @error('remedio') is-invalid @enderror" name="remedio" value="{{ old('remedio') }}" required autocomplete="remedio" autofocus>
                                @error('remedio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="metodo" class="col-form-label text-left">{{ __('Método') }}</label>
                                <input id="metodo" type="text" class="form-control @error('metodo') is-invalid @enderror" name="metodo" value="{{ old('metodo') }}" required autocomplete="metodo" autofocus>
                                @error('metodo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="dose" class="col-form-label text-left">{{ __('Dose') }}</label>
                                <input id="dose" type="text" class="form-control @error('dose') is-invalid @enderror" name="dose" value="{{ old('dose') }}" required autocomplete="dose" autofocus>
                                @error('dose')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="observacao" class="col-form-label text-left">{{ __('Observação') }}</label>
                                <textarea id="observacao" type="text" class="form-control @error('observacao') is-invalid @enderror" name="observacao" value="{{ old('observacao') }}" required autocomplete="observacao" autofocus> </textarea>
                                @error('observacao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                         <br/><br/>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar Medicação') }}
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
        $("#checkPatient").click(async function() {
            cpf = document.getElementById('idPatient').value;
            console.log('http://localhost:8000/api/get-patient?cpf=' + cpf)
            response = await fetch('http://localhost:8000/api/get-patient?cpf=' + cpf);
            response = await response.json();
            console.log(response.patient);

            if (response.patient != null) {
                document.getElementById("nome").textContent = response.patient.nome;
                document.getElementById("dados").style.display = "block";
            } else {
                alert('CPF não encontrado para esse paciente!')
            }

        });

    </script>
@endsection('custom-content-footer')
