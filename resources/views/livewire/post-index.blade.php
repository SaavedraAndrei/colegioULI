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
            <a href="{{route('ingresos.create')}}" class="btn btn-primary">Registrar ingreso</a>
        </div>
 
        <div class="card-header">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                </div>
                <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el número de recibo del ingreso">    
            </div>
        </div>

        @if ($ingresos->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Número de Recibo</th>
                            <th>DNI Alumno</th>
                            <th>Tipo</th>
                            <th>Fecha</th>
                            <th>Pago</th>
                            <th>ID Usuario</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($ingresos as $ingreso)
                            <tr>
                                <td>{{$ingreso->id}}</td>
                                <td>{{$ingreso->NumRecibo}}</td>
                                <td>{{$ingreso->dni}}</td>
                                <td>{{$ingreso->Tipo}}</td>
                                <td>{{$ingreso->created_at}}</td>
                                <td>{{$ingreso->pago}}</td>
                                <td>{{$ingreso->idPersonal}}</td>

                                <td width="10px">
                                    <a class="btn btn-primary" href="{{route('factura', ['id' => $ingreso->id ])}}">Factura</a>
                                </td>
                                

                                @if ($id == 1)
                                    <td width="10px">
                                        <form action="{{route('ingresos.destroy', $ingreso->id, $ingreso->dni, $ingreso->pago)}}" method="POST">
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
                {{$ingresos->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningún registro con ese número de recibo</strong>    
            </div>
        @endif
            
    </div>

</div>
