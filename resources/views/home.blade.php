@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <center><div class="panel-heading">Listado de Usuarios</div></center>

                <div class="panel-body">
                    

                <table class="table table-striped task-table">
                            <thead>
                                <th>id</th>
                                <th>nombre</th>
                                <th>Contraseña</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>

                                <th>Email</th>
                            
                            </thead>

                            <tbody>
                            <tr>
                            @foreach($usuarios as $user)
                            
                            <td> <br>
                                    <span class="small">
                                    {{$user->id}}
                            </span></td>


                            <td> <br>
                                    <span class="small">
                                    {{$user->name}}
                            </span></td>

                            <td> <br>
                                    <span class="small">
                                    ************
                            </span></td>



                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <td> <br>
                                    <span class="small">
                                    {{$user->email}}
                            </span></td>




                            <td><br>
                                        <form 
                                        action="{{ url('usuario/delete/' . $user->id) }}"
                                        method="POST"
                                        >
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button onclick="return confirm('¿Seguro que quieres eliminarlo?')"
                                            class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <a 
                                            href="{{
                                             url('usuario/edit/' . $user->id)
                                             }}"
                                            class="btn btn-warning btn-sm" 
                                            ><i class="fa fa-edit"></i></a>
                                        </form>
                            </td>

                            </tr>
                            @endforeach
                            
                            </tbody>
                </table>
                <center> {{ $usuarios->render() }} </center>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
