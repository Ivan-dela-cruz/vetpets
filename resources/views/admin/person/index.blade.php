@extends('admin.base.base')
@section('titulo')
    Noticias
@endsection
@section('noti')
    active
@endsection
@section('scripts')
    <script src="{{asset('admin/plugins/ajax/post.js')}}" type="text/javascript"></script>
@endsection
@section('notiPublicadas')
    active
@endsection
@section('username')
    Auth
@endsection
@section('mainEncabezado')
    Noticias publicadas
@endsection
@section('niveles')
    <li class="breadcrumb-item"><a class="text-dark" href="#">Principal</a></li>
    <li class="breadcrumb-item"><a class="text-dark" href="#">Noticias</a></li>
    <li class="breadcrumb-item"><a class="" href="#">Publicadas</a></li>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Lista</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                           placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                        <a href="{{route('persona.create')}}"
                                           class="create-modalcat btn btn-info btn-sm mx-2">
                                            <i class="fa fa-plus nav-icon"></i>
                                            Añadir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="table" class="table m-0 table-bordered table-responsive">
                                    <thead class="text-black-50 text-xl-center">
                                    <th width="10px">N</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Cedula</th>
                                    <th>Celular</th>
                                    <th>Correo</th>
                                    <th>Provincia</th>
                                    <th>Canton</th>
                                    <th>Direccion</th>
                                    <th>Estado</th>
                                    <th colspan="2">Acciones</th>


                                    </thead>
                                    <tbody>
                                    {{ csrf_field() }}
                                    <?php  $no = 1; ?>
                                    @foreach( $people as $person )
                                        <tr class="cat{{$person->id}}">

                                            <td>{{$person->id}}</td>
                                            <td>{{$person->name_people}}</td>
                                            <td>{{$person->surname_people}}</td>
                                            <td>{{$person->ci_people}}</td>
                                            <td>{{$person->mobile_people}}</td>
                                            <td>{{$person->email_people}}</td>
                                            <td>{{$person->province_people}}</td>
                                            <td>{{$person->canton_people}}</td>
                                            <td>{{$person->address_people}}</td>
                                            <td>{{$person->status_people}}</td>

                                            <td width="10px">
                                                <a href="#" class="edit-modal-cat btn btn-warning btn-sm"
                                                   data-id-cat="{{$person->id}}"
                                                   data-name-cat="{{$person->name_people}}"
                                                   data-body-cat="{{$person->ci_people}}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </td>
                                            <td width="10px">
                                                <a href="#" class="delete-modal-cat btn btn-success btn-sm"
                                                   data-id-cat="{{$person->id}}"
                                                   data-name-cat="{{$person->name_people}}"
                                                   data-body-cat="{{$person->_people}}">
                                                    <i class="fa fa-check-circle"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{$people->render()}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Modal Form Edit and Delete Post --}}
    <div id="myModal-cat" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title-cat"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="modal">

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id-cat-edit" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Nombre</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="name-cat-edit">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="bodycat">Contenido</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="body-cat-edit"
                                       placeholder="etiqueta-url" required>
                            </div>
                        </div>
                    </form>
                    {{-- Form Delete Post --}}
                    <div class="deleteContent">
                        <label class="text-danger" for="">Esta seguro en eliminar</label> <span
                                class="name-cat-delete"></span>?
                        <span class="hidden id-cat-delete"></span>
                    </div>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer_action_button" class="glyphicon"></span>
                    </button>

                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon"></span>cancelar
                    </button>

                </div>
            </div>
        </div>
    </div>
@endsection