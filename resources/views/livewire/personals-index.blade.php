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
            <a href="{{route('personals.create')}}" class="btn btn-primary">Registrar nuevo personal</a>
        </div>

        <div class="card-header">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                </div>
                <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el Apellido Paterno del Personal">
            </div>
        </div>

        @if ($personals->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Monto Pagado</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($personals as $personal)
                            <tr>
                                <td>{{$personal->dni}}</td>
                                <td>{{$personal->Nombres}}</td>
                                <td>{{$personal->ApellPaterno}}</td>
                                <td>{{$personal->ApellMaterno}}</td>
                                <td>{{$personal->Tipo}}</td>
                                <td>{{$personal->estado}}</td>
                                <td>{{$personal->montoPagado}}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{route('personals.edit', $personal->id)}}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$personals->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningún registro con ese apellido</strong>    
            </div>
        @endif
            
    </div>
</div>
