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
            <a href="{{route('egresos.create')}}" class="btn btn-primary">Registrar Egreso</a>
        </div>
 
        <div class="card-header">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                </div>
                <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el número de recibo del egreso">    
            </div>
        </div>

        @if ($egresos->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Número de Recibo</th>
                            <th>DNI Personal</th>
                            <th>Fecha</th>
                            <th>Pago</th>
                            <th>ID Usuario</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($egresos as $egreso)
                            <tr>
                                <td>{{$egreso->id}}</td>
                                <td>{{$egreso->NumRecibo}}</td>
                                <td>{{$egreso->dniPersonal}}</td>
                                <td>{{$egreso->created_at}}</td>
                                <td>{{$egreso->pago}}</td>
                                <td>{{$egreso->idPersonal}}</td>

                                <td width="10px">
                                    <a class="btn btn-primary" href="{{route('facturaeg', ['id' => $egreso->id ])}}">Factura</a>
                                </td>


                                @if ($id == 1)
                                    <td width="10px">
                                        <form action="{{route('egresos.destroy', $egreso->id, $egreso->dniPersonal, $egreso->pago)}}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <button class="btn btn-danger" type="submit">Eliminar</button>
                                        </form>
                                    </td>
                                @endif
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$egresos->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningún registro con ese número de recibo</strong>    
            </div>
        @endif
    </div>
</div>
