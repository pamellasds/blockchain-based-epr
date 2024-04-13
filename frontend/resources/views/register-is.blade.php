@extends('layouts.app')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $("#cnpj").mask("00.000.000/0000-00");
            $("#cep").mask("00.000-000");
            $("#telefone").mask("+55 (00) 00000-0000");
        });
</script>

<!-- Instituição de Saúde -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar Instituição de Saúde') }}</div>

                <div class="card-body">
                    <form method="POST" action="send-register-is">
                        @csrf

                        <p><strong>Dados da Instituição</strong></9>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="name" class="col-form-label text-left">{{ __('Nome') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                                <label for="cnpj" class="col-form-label text-left">{{ __('CNPJ') }}</label>
                                <input id="cnpj" type="text" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" value="{{ old('cnpj') }}" required autocomplete="cnpj" autofocus>
                                @error('cnpj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="numero-registro" class="col-form-label text-left">{{ __('Nº de Reg. no Conselho') }}</label>
                                <input id="numero-registro" type="text" class="form-control @error('numero-registro') is-invalid @enderror" name="numero-registro" value="{{ old('numero-registro') }}" required autocomplete="numero-registro" autofocus>
                                @error('numero-registro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="data-registro" class="col-form-label text-left">{{ __('Data de Registro') }}</label>
                                <input id="data-registro" type="date" class="form-control @error('data-registro') is-invalid @enderror" name="data-registro" value="{{ old('data-registro') }}" required autocomplete="data-registro" autofocus>
                                @error('data-registro')
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


                        <p><strong>Dados do Responsável</strong></9>

                        <div class="form-group row">
                            <div class="col-md-8">
                                <label for="profissao" class="col-form-label text-left">{{ __('Nome') }}</label>
                                <input id="profissao" type="text" class="form-control @error('profissao') is-invalid @enderror" name="profissao" value="{{ old('profissao') }}" required autocomplete="profissao" autofocus>
                                @error('profissao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="cpf" class="col-form-label text-left">{{ __('CPF') }}</label>
                                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>
                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- INPUTS SENHA -->


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

