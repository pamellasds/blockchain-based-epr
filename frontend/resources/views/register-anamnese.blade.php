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

        <!-- Registro Anamnese -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar Anamnese') }}</div>

                    <div class="card-body">
                        <form action="/send-register-anamnese" method="POST">
                            @csrf

                            <p><strong>Identificação</strong></9>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="idPatient"
                                        class="col-form-label text-left">{{ __('CPF do Paciente') }}</label>
                                    <input id="idPatient" type="text"
                                        class="form-control @error('idPatient') is-invalid @enderror" name="idPatient"
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

                            <p><strong>História Doença Atual (HDA)</strong></p>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="anwser1" class="col-form-label text-left">{{ __('Qual a principal queixa?') }}</label>
                                    <input id="anwser1" type="text" class="form-control @error('anwser1') is-invalid @enderror" name="anwser1">
                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="anwser2" class="col-form-label text-left">{{ __('Início dos sintomas e duração da queixa') }}</label>
                                    <input id="anwser2" type="text" class="form-control @error('anwser2') is-invalid @enderror" name="anwser2">
                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="anwser3" class="col-form-label text-left">{{ __('Localização da dor') }}</label>
                                    <input id="anwser3" type="text" class="form-control @error('anwser3') is-invalid @enderror" name="anwser3">
                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <p><strong>História Patológica Regressa</strong></p>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="anwser4" class="col-form-label text-left">{{ __('Está em tratamento médico com algum remédio?') }}</label>
                                    <input id="anwser4" type="text" class="form-control @error('anwser4') is-invalid @enderror" name="anwser4">
                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="anwser5" class="col-form-label text-left">{{ __('Tem alguma alergia?') }}</label>
                                    <input id="anwser5" type="text" class="form-control @error('cpf') is-invalid @enderror" name="anwser5">
                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="anwser6" class="col-form-label text-left">{{ __('Cirurgia recente?') }}</label>
                                    <input id="anwser6" type="text" class="form-control @error('anwser6') is-invalid @enderror" name="anwser6">
                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="anwser7" class="col-form-label text-left">{{ __('Alterações cardíacas (Cardiopatias)?') }}</label>
                                    <input id="anwser7" type="text" class="form-control @error('anwser7') is-invalid @enderror" name="anwser7">
                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="anwser8" class="col-form-label text-left">{{ __('Hipertensão?') }}</label>
                                    <input id="anwser8" type="text" class="form-control @error('anwser8') is-invalid @enderror" name="anwser8">
                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="anwser9" class="col-form-label text-left">{{ __('Diabetes?') }}</label>
                                    <input id="anwser9" type="text" class="form-control @error('anwser9') is-invalid @enderror" name="anwser9">
                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <p><strong>História Social</strong></p>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="anwser10" class="col-form-label text-left">{{ __('É fumante? Especificar quantidade/dia e anos:') }}</label>
                                    <input id="anwser10" type="text" class="form-control @error('anwser10') is-invalid @enderror" name="anwser10">
                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="anwser11" class="col-form-label text-left">{{ __('Realiza exercícios físicos? Quantas vezes por semana?') }}</label>
                                    <input id="anwser11" type="text" class="form-control @error('anwser11') is-invalid @enderror" name="anwser11">
                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="anwser12" class="col-form-label text-left">{{ __('Ingere álcool? Com que frequência?') }}</label>
                                    <input id="anwser12" type="text" class="form-control @error('anwser12') is-invalid @enderror" name="anwser12">
                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <p><strong>História Familiar</strong></p>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="anwser13" class="col-form-label text-left">{{ __('Há alguma doença de base familiar? Especifique.') }}</label>
                                    <input id="anwser13" type="text" class="form-control @error('anwser13') is-invalid @enderror" name="anwser13">
                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="anwser14" class="col-form-label text-left">{{ __('Foi feito tratamento? Se sim, especifique.') }}</label>
                                    <input id="anwser14" type="text" class="form-control @error('anwser14') is-invalid @enderror" name="anwser14">
                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar Anamnese') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
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
@endsection('content')
