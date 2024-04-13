@extends('layouts.app')

@section('content')

<style>
    .containerOverlay {
      position: relative;
      max-width: 120px;
    }
    
    .overlay {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      opacity: 0;
      transition: .3s ease;
      background-color: transparent;
    }
    
    .containerOverlay:hover .overlay {
      opacity: 1;
    }
    
    .containerOverlay:hover .image {
      filter: brightness(40%);
    }
    
    .iconOverlay {
      color: white;
      font-size: 20px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      text-align: center;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear() - 18;
            if(dd<10)
                dd = '0' + dd;
            if(mm<10)
                mm = '0' + mm;

            var dezoito_anos_atras = yyyy + '-' + mm + '-' + dd;
            document.getElementById("birth_day").setAttribute("max", dezoito_anos_atras);
        });

        jQuery(function($) {
            $("#cpf").mask("000.000.000-00");
            $("#rg").mask("0#");
            $("#cep").mask("00.000-000");
            $("#telephone").mask("(00) 90000-0000");
            $("#agency").mask("0000");
            $("#account").mask("0000000000-00");
            $("#nome").keypress(function(event) {
                var character = String.fromCharCode(event.keyCode);
                return /[a-zA-Z, ,-]/g.test(character);
            });
            $("#cpf").blur(function() {
                var cpf = document.getElementById("cpf").value;
                if (!validarCPF(cpf)) {
                    $('#cpf').css('border-color', 'red');
                    $('#cpf').css('border-width', '2');
                } else {
                    $('#cpf').css('border-color', '#CED4DA');
                    $('#cpf').css('border-width', '1');
                }
            });
            validarCPF = (cpf) => {
                cpfreplace = cpf.replace(/[^\d]+/g, '');
                if (cpf == '') return false;
                if (cpfreplace.length != 11 ||
                    cpfreplace == "00000000000" ||
                    cpfreplace == "11111111111" ||
                    cpfreplace == "22222222222" ||
                    cpfreplace == "33333333333" ||
                    cpfreplace == "44444444444" ||
                    cpfreplace == "55555555555" ||
                    cpfreplace == "66666666666" ||
                    cpfreplace == "77777777777" ||
                    cpfreplace == "88888888888" ||
                    cpfreplace == "99999999999")
                    return false;
                add = 0;
                for (i = 0; i < 9; i++)
                    add += parseInt(cpfreplace.charAt(i)) * (10 - i);
                rev = 11 - (add % 11);
                if (rev == 10 || rev == 11)
                    rev = 0;
                if (rev != parseInt(cpfreplace.charAt(9)))
                    return false;
                add = 0;
                for (i = 0; i < 10; i++)
                    add += parseInt(cpfreplace.charAt(i)) * (11 - i);
                rev = 11 - (add % 11);
                if (rev == 10 || rev == 11)
                    rev = 0;
                if (rev != parseInt(cpfreplace.charAt(10)))
                    return false;
                return true;
            }
        });
    </script>

@if(Auth::guest())
    <?php
        header("Location: login/");
        exit();
    ?>
@endif

<div class="container">
    @if(session('mensagem'))
        <div class="alert alert-success">
            <p>{{session('mensagem')}}</p>
        </div>
    @elseif(session('mensagem2'))
        <div class="alert alert-danger">
            <p>{{session('mensagem2')}}</p>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    <h3>My Account</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="container abaConteudo">
                        <form method="post" action="edit-perfil">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="nome"><strong>Name</strong></label>
                                    <input type="text" required name="name" id="name" class="form-control"
                                        value="{{ $auth->name ?? old('name') }}" placeholder="Nome">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="email"><strong>E-mail</strong></label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        value="{{ $auth->email ?? old('email')}}" disabled>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="identifier"><strong>Indetifier</strong></label>
                                    <input type="text" required name="identifier" id="identifier" {{$auth->identifier != ''?'readonly="true"':''}} class="form-control"
                                        value="{{$auth->identifier ?? old('identifier')}}" placeholder="Identifier">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="birth_day"><strong>Birth Day</strong></label>
                                    <input type="date" required name="birth_day" id="birth_day" class="form-control"
                                        value="{{ $auth->birth_day ?? old('birth_day') }}" placeholder="Birth Day">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="gender"><strong>Gender</strong></label>
                                    <select class="form-control" required name="gender" id="gender">
                                        <option selected disabled value="">Selecione</option>
                                        <option {{ $auth->gender == '0' ? 'selected' : '' }} value="0">Male</option>
                                        <option {{ $auth->gender == '1' ? 'selected' : '' }} value="1">Female</option>
                                        <option {{ $auth->gender == '2' ? 'selected' : '' }} value="2">Other</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cep"><strong>Postal Code</strong></label>
                                    <input type="text" name="cep" id="cep" class="form-control" value="{{ $auth->postal_code ?? old('cep') }}"
                                        placeholder="Postal Code">
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="city"><strong>City</strong></label>
                                    <input type="text" name="city" id="city" class="form-control" value="{{ $auth->city ?? old('city') }}"
                                    placeholder="City">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="uf"><strong>State</strong></label>
                                    <input type="text" name="state" id="state" class="form-control" value="{{ $auth->state ?? old('uf') }}"
                                    placeholder="State">
                                </div>
                            </div>

                            <div class="form-row">
                                <button class="btn btn-primary">Concluir</button>
                            </div>    
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function openFileUpload(){
        $('#fotoPerfil').click();
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
              
              if (input.files[0].size/1024 < 2048){
                  $('#thumb').attr('src', e.target.result);
                  $('#thumb').show(500);
                  $('#previaThumb').show(500);
                } else {
                  $('#previaThumb').hide();
                  $('#fotoPerfil').val("");
                }
              }
            reader.readAsDataURL(input.files[0]);
        }
      }

      function cancelarUploadFoto() {
        $("#previaThumb").hide(500);
        $('#fotoPerfil').val("");
      }
</script>
@endsection