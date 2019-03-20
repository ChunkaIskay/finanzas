@extends('layouts.app')
@section('content')

 <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('scripts/datepicker/css/datepicker.css')}}">
    
    <script src="{{asset('scripts/datepicker/js/bootstrap-datepicker.js')}}"></script>
   
<div class="container">
			@if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
	
	<div class="row">
		<h2> Listado de Comisiones clientes - servicios </h2>
		
			<div class="row">
					<form action="{{ url('/search-commission') }}"  method="post"  enctype="multipart/form-data" class="navbar-form navbar-left" >
						 {{ csrf_field() }}
						<h4></h4>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Buscar clientes-servicios" name="query" size="50" maxlength="45"/>
						</div>

						<button type="submit" class="btn btn-info">
							<span >Buscar</span>
						</button>
					</form>
			</div>
			<br>
			@if(isset($query))
			
				<table class="table">
				    <thead>
				        <tr>
				            <th class="text-center">#</th>
				            <th>Nombre</th>
				            <th>Total Transacciones</th>
				            <th>Total a Facturar Bs.</th>
				            <th>Descripciòn</th>
				            <th class="text-left">Fecha de referencia</th>
				        </tr>
				    </thead>
				    <tbody>  
				 		@foreach($listCommission as $key => $value1) 
				        <tr>
				            <td class="text-center">{{ $key+1 }}</td>
				            <td>{{ $value1['name'] }}</td>
				            <td style="font-family: sans-serif;  font-size:100%;font-style: normal;"><strong>{{ $value1['total_transaction'] }}</strong></td>  
				            <td style="font-family: sans-serif;  font-size:100%;font-style: normal;"><strong>{{ $value1['total_billing'] }}</strong></td>  
				            <td class="text-left">{{ $value1['description'] }}</td>
				             <td class="text-left">{{ $value1['created_at'] }}</td>
				        

				        </tr>
				    @endforeach
				    </tbody>
				</table>
				@else
					<table class="table">
					    <thead>
					        <tr>
					            <th class="text-center">#</th>
					            <th>Nombre</th>
					            <th>Total Transacciones</th>
					            <th>Total a Facturar Bs.</th>
					            <th>Descripciòn</th>
					            <th class="text-left">Fecha de referencia</th>
					        </tr>
					    </thead>
					    <tbody>  
					        <tr>
					            <td class="text-center">&nbsp;</td>
					            <td>&nbsp;</td>
					            <td style="font-family: sans-serif;  font-size:100%;font-style: normal;"><strong>&nbsp;</strong></td>  
					            <td style="font-family: sans-serif;  font-size:100%;font-style: normal;"><strong>&nbsp;</strong></td>  
					            <td class="text-left">&nbsp;</td>
					             <td class="text-left">&nbsp;</td>
					        </tr>
					    </tbody>
					</table>
				@endif	
		
	</div>

	<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-4 text-left"></div>
	  <div class="col-md-3"></div>
	  
	</div>

</div>

<script type="text/javascript">

	$('.datepicker').datepicker({
	format: "dd/mm/yyyy"
});

</script>
@include('includes.footer')
@endsection