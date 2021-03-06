@extends('layouts.app')


@section('content')

<div class="container">
			@if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
	
	<div class="row">
		<h2> Listado de contratos</h2>
		<div>
			<form class="navbar-form navbar-left" role='search' action="">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Buscar contratos" name="search" size="50" maxlength="30"/>
				</div>
				<button type="submit" class="btn btn-info">
					<span >Buscar</span>
				</button>
				<a href="{{ route('createContract') }}" type="submit" class="btn btn-info">
					<span >Crear Nuevo Contrato</span>
				</a>
			</form>
		</div>
			<table class="table">
			    <thead>
			        <tr>
			            <th class="text-center">#</th>
			            <th>Código del Contrato</th>
			            <th>Servicio</th>
			            <th>Entidad</th>
			            <th class="text-right">Categoria general</th>
			            <th class="text-right">Categoria especifica</th>
			            <th class="text-right">Tipo</th>
			            <th class="text-right">Acciones</th>
			        </tr>
			    </thead>
			    <tbody>
			   
					@foreach($contracts as $key => $value) 
			        <tr>
			            <td class="text-center">{{ $key+1 }}</td>
			            <td>{{ $value->code }}</td>
			            <td>{{ $value->name }}</td>
			            <td>{{ $value->nameEntity }}</td>  
			            <td class="text-right">
		                	{{ !empty($categorizations[$value->general_category_id]->name)? $categorizations[$value->general_category_id]->name : 'otros' }}</td>
			            <td class="text-right">{{ !empty($categorizations[$value->specific_category_id]->name)? $categorizations[$value->specific_category_id]->name : 'otros' }}</td>
			            <td class="text-right">{{ !empty($typeContracts[$value->type_id]->name)? $typeContracts[$value->type_id]->name : 'otros' }}</td>
						<td class="td-actions text-right">
			                <form method="post" action="{{ url('/'.$value->contract_id) }}"> 
				            	{{ csrf_field() }}   
				            	{{ method_field('DELETE') }} 
								<a href="{{ url('/'.$value->contract_id.'/management') }}"  type="button" rel="tooltip" title="Ver contrato" class="btn btn-info btn-simple btn-xs">
									<i class="fa fa-user">Gestionar contrato</i>
								</a>
				                <a href="{{ url('/'.$value->contract_id.'/edit-contract') }}" type="button" rel="tooltip" title="Editar contrato" class="btn btn-success btn-simple btn-xs">
				                    <i class="fa fa-edit">Editar</i>
				                </a>
				                <button type="submit" rel="tooltip" title="Eliminar contrato" class="btn btn-danger btn-simple btn-xs">
				                    <i class="fa fa-times">Eliminar</i>
				                </button>
				             </form>

			            </td>
			        </tr>
			      	@endforeach
			       
			    </tbody>
			</table>

	
	</div>

	<div class="row">
	  <div class="col-md-4">{{ $contracts->links() }}</div>
	  <div class="col-md-4 text-left"></div>
	  <div class="col-md-3"></div>
	  
	</div>

</div>
@include('includes.footer')
@endsection
