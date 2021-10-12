<div>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @elseif (session('danger'))
        <div class="alert alert-danger">
            <strong>{{session('danger')}}</strong>
        </div>
    @endif


    <div class="card">

        <div class="card-header">
            <a href="{{route('alumnos.create')}}" class="btn btn-primary">Registrar alumno</a>
        </div>

        <div class="card-header">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                </div>
                <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el Apellido Paterno del Alumno">
            </div>
        </div>

        @if ($alumnos->count())
            <div class="card-body">


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Género</th>
                            <th>Nivel</th>
                            <th>Sección</th>
                            <th>Estado</th>
                            <th>Monto Pagado</th>
                            <th>B1</th>
                            <th>B2</th>
                            <th>B3</th>
                            <th>B4</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($alumnos as $alumno)
                            <tr>
                                <td>{{$alumno->dni}}</td>
                                <td>{{$alumno->Nombres}}</td>
                                <td>{{$alumno->ApellPaterno}}</td>
                                <td>{{$alumno->ApellMaterno}}</td>
                                <td>{{$alumno->genero}}</td>
                                <td>{{$alumno->nivel}}</td>
                                <td>{{$alumno->seccion}}</td>
                                <td>{{$alumno->estado}}</td>
                                <td>{{$alumno->montoPagado}}</td>
                                <td>{{$alumno->b1}}</td>
                                <td>{{$alumno->b2}}</td>
                                <td>{{$alumno->b3}}</td>
                                <td>{{$alumno->b4}}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{route('alumnos.edit', $alumno->id)}}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$alumnos->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningún registro con ese número de recibo</strong>    
            </div>
        @endif
            
    </div>
</div>
