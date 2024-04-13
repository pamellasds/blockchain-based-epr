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
                        <th>Tipo de Registro</th>
                        <th>Nome Paciente</th>
                        <th>Data de Registro</th>
                        <th>Registro</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registers as $register)
                        <tr>
                            <td>
                                @if ($register->register_type == 1)
                                    Anamnese
                                @elseif ($register->register_type == 2)
                                    Observação
                                @elseif ( $register->register_type == 3)
                                    Diagnóstico
                                @else
                                    Medicação
                                @endif
                            </td>
                            <td>{{ $register->nome }}</td>
                            <td>{{ $register->created_at }}</td>
                            <td>
                                <a id='dwnldLnk_{{ $register->id }}' download='registro-{{ $register->id }}.pdf'
                                    style="display:none;" />
                                <a type="button" class="btn btn-success" name='registroPaciente_{{ $register->id }}'
                                    id='registroPaciente_{{ $register->id }}' title="Registro do Paciente">
                                    <i class="fa fa-file-pdf"></i>
                                </a>
                                <script>
                                    var registro = {!! json_encode($register) !!};
                                    $("#registroPaciente_" + registro.id).click(async function() {
                                        var registro = {!! json_encode($register) !!};
                                        var idUser = registro.id_doctor;
                                        response = await fetch(
                                            'https://medicalrecord-ms.herokuapp.com/read_register/', {
                                                mode: 'cors',
                                                method: "POST",
                                                headers: {
                                                    'Accept': 'application/json',
                                                    'Content-Type': 'application/json'
                                                },
                                                body: JSON.stringify({
                                                    idRegister: registro.id_register,
                                                    idUser: idUser
                                                })
                                            });
                                        response = await response.json();
                                        if (response.success == false) {
                                            alert('Esse usuario não tem mais acesso ao registro');
                                        } else {
                                            var dlnk = document.getElementById('dwnldLnk_' + registro.id);
                                            var pdf = 'data:application/octet-stream;base64,' + response.register.media_base64;
                                            dlnk.href = pdf;
                                            dlnk.click();
                                        }

                                    });

                                </script>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Tipo de Registro</th>
                        <th>Nome Paciente</th>
                        <th>Data de Registro</th>
                        <th>Registro</th>
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
