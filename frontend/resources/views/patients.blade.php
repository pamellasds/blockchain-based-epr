@extends('layouts.app')

@section('content')

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
                        <th>Nome do Paciente</th>
                        <th>Último Registro</th>
                        <th>Informações do Paciente</th>
                        {{-- <th>Registros</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registers as $register)
                        <tr>
                            <td>{{ $register->nome }}</th>
                            <td>{{ $register->created_at }}</th>
                            <td>
                                <a type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal_{{ $register->id }}" title="Informações">
                                    <i class="fa fa-info"></i>
                                </a>
                            </td>
                            {{-- <td>
                                <a type="button" class="btn btn-secondary" data-toggle="modal" data-target="#registers"
                                    title="Registros">
                                    <i class="fa fa-group"></i>
                                </a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nome do Paciente</th>
                        <th>Último Registro</th>
                        <th>Informações do Paciente</th>
                        {{-- <th>Registros</th> --}}
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
                    "lengthMenu": "Mostrando _MENU_ Pacientes por página",
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

    @foreach ($registers as $register)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal_{{ $register->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informações do Paciente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email"><strong>Nome</strong></label>
                                <input type="text" name="nome" id="nome" class="form-control"
                                    value="{{ $register->nome }}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email"><strong>CPF</strong></label>
                                <input type="text" name="nome" id="nome" class="form-control" value="{{ $register->cpf }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email"><strong>Gênero</strong></label>
                                @if ($register->gender == 1)
                                    <input type="text" name="nome" id="nome" class="form-control" value="Maculino" disabled>
                                @else
                                    <input type="text" name="nome" id="nome" class="form-control" value="Feminino" disabled>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email"><strong>Nascimento</strong></label>
                                <input type="text" name="nome" id="nome" class="form-control"
                                    value="{{ $register->birthDate }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email"><strong>Estado</strong></label>
                                <input type="text" name="nome" id="nome" class="form-control"
                                    value="{{ $register->addressState }}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email"><strong>Cidade</strong></label>
                                <input type="text" name="nome" id="nome" class="form-control"
                                    value="{{ $register->addressCity }}" disabled>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <label for="email"><strong>CEP</strong></label>
                                    <input type="text" name="nome" id="nome" class="form-control"
                                        value="{{ $register->addressCEP }}" disabled>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal LIBERAR/NEGAR ACESSO -->
    <div class="modal fade" id="registers" tabindex="-1" role="dialog" aria-labelledby="registersLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registersLabel">{nome_do_paciente}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            {tipo_registro} - {data}
                            <button type="button" class="btn btn-success btn-lg pull-right"><i
                                    class="fa fa-file"></i></button>
                        </li>
                        <li class="list-group-item">
                            {tipo_registro} - {data}
                            <button type="button" class="btn btn-success btn-lg pull-right"><i
                                    class="fa fa-file"></i></button>
                        </li>
                        <li class="list-group-item">
                            {tipo_registro} - {data}
                            <button type="button" class="btn btn-success btn-lg pull-right"><i
                                    class="fa fa-file"></i></button>
                        </li>
                        <li class="list-group-item">
                            {tipo_registro} - {data}
                            <button type="button" class="btn btn-success btn-lg pull-right"><i
                                    class="fa fa-file"></i></button>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
        </div>
    </div>


@endsection
