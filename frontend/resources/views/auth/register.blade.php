@extends('layouts.app')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $("#cpf").mask("000.000.000-00");
            $("#cep").mask("00.000-000");
            $("#telefone").mask("+55 (00) 00000-0000");
        });
</script>

<!-- PACIENTE -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar Paciente') }}</div>

                <div class="card-body">
                    <form method="POST" action="send-register">
                        @csrf

                        <p><strong>Dados Pessoais</strong></9>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="nome" class="col-form-label text-left">{{ __('Nome') }}</label>
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-left">{{ __('E-mail') }}</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="data-nasc" class="col-form-label text-left">{{ __('Data de Nascimento') }}</label>
                                <input id="data-nasc" type="date" class="form-control @error('data-nasc') is-invalid @enderror" name="data-nasc" value="{{ old('data-nasc') }}" required autocomplete="data-nasc" autofocus>
                                @error('data-nasc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="genero" class="col-form-label text-left">{{ __('Gênero') }}</label>
                                <select class="form-control" required name="genero" id="genero"  @error('genero') is-invalid @enderror" name="genero" value="{{ old('genero') }}" required autocomplete="genero" autofocus>
                                    <option selected disabled value="">Selecione</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Feminino</option>
                                </select>
                                @error('genero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="estado-civil" class="col-form-label text-left">{{ __('Estado Civil') }}</label>
                                <select class="form-control" required name="estado-civil" id="estado-civil"  @error('estado-civil') is-invalid @enderror" name="estado-civil" value="{{ old('estado-civil') }}" required autocomplete="estado-civil" autofocus>
                                    <option selected disabled value="">Selecione</option>
                                    <option value="1">Solteiro(a)</option>
                                    <option value="2">Casado(a)</option>
                                    <option value="3">Outro</option>
                                </select>
                                @error('estado-civil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="cpf" class="col-form-label text-left">{{ __('CPF') }}</label>
                                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>
                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="rg" class="col-form-label text-left">{{ __('RG') }}</label>
                                <input id="rg" type="text" class="form-control @error('rg') is-invalid @enderror" name="rg" value="{{ old('rg') }}" required autocomplete="rg" autofocus>
                                @error('rg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="telefone" class="col-form-label text-left">{{ __('Telefone') }}</label>
                                <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone" autofocus>
                                @error('telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <p><strong>Endereço</strong></9>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="cep" class="col-form-label text-left">{{ __('CEP') }}</label>
                                <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" value="{{ old('cep') }}" required autocomplete="name" autofocus>
                                @error('cep')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="logradouro" class="col-form-label text-left">{{ __('Logradouro') }}</label>
                                <input id="logradouro" type="text" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro" value="{{ old('logradouro') }}" required autocomplete="name" autofocus>
                                @error('logradouro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="numero" class="col-form-label text-left">{{ __('Número') }}</label>
                                <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required autocomplete="numero" autofocus>
                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="bairro" class="col-form-label text-left">{{ __('Bairro') }}</label>
                                <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{ old('bairro') }}" required autocomplete="bairro" autofocus>
                                @error('bairro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="cidade" class="col-form-label text-left">{{ __('Cidade') }}</label>
                                <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade" value="{{ old('cidade') }}" required autocomplete="cidade" autofocus>
                                @error('cidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="estado" class="col-form-label text-left">{{ __('Estado') }}</label>
                                <input id="estado" type="text" class="form-control @error('estado') is-invalid @enderror" name="estado" value="{{ old('estado') }}" required autocomplete="estado" autofocus>
                                @error('estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="pais" class="col-form-label text-left">{{ __('País') }}</label>
                                <input id="pais" type="text" class="form-control @error('pais') is-invalid @enderror" name="pais" value="{{ old('pais') }}" required autocomplete="pais" autofocus>
                                @error('pais')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password" class="col-form-label text-left">{{ __('Senha') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-check row">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                            <label class="form-check-label" for="flexCheckDefault">
                                Eu concordo com a <a href="https://docs.google.com/document/d/1XxtSEMxItSaN0rJsP0YxN1l4xz4-Yf1TO1G8_s4GcKE/edit?usp=sharing" target="_blank">Política de Privacidade</a> e os 
                                <a href="https://docs.google.com/document/d/1XxtSEMxItSaN0rJsP0YxN1l4xz4-Yf1TO1G8_s4GcKE/edit?usp=sharing" target="_blank">Termos de Uso</a>.
                            </label>
                        </div><br/>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-content-footer')
<?php header('Access-Control-Allow-Origin: *'); ?>
    <script>
        $("#cep").focusout(function(){
            cep = $(this).val().replace(/[^\d]+/g,'')
			$.ajax({
				url: 'https://viacep.com.br/ws/'+cep+'/json/unicode/',
				dataType: 'jsonp',
				success: function(resposta){
					$("#logradouro").val(resposta.logradouro);
					$("#complemento").val(resposta.complemento);
					$("#bairro").val(resposta.bairro);
					$("#cidade").val(resposta.localidade);
					$("#estado").val(resposta.uf);
                    $("#pais").val('Brasil');
					$("#numero").focus();
				}
			});
		});

    </script>
@endsection('content')
