<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Contract;
use App\Entity;
use App\Service;

class ContractController extends Controller
{
   	public $arrayServiceEntity = array(); //array
	

	public function index(){
	
		//return("aute".auth()->user()->id); print id user
	
		//$contracts = Contract::all();
		//$contracts = Contract::paginate(5);
		$contracts = DB::table('contracts')
		->join('services','services.service_id', '=' , 'contracts.service_id')
		->join('entities','entities.entity_id', '=' , 'contracts.entity_id')
		->select('contracts.contract_id','contracts.code','services.name','entities.name as nameEntity','contracts.general_category_id','contracts.specific_category_id', 'contracts.type_id')
		->paginate(5);
		//return view('contract.index')->with(compact('contracts'));
		return view('contract.index',  array(
							'contracts' => $contracts
						));

	}

    public function createContract(){

    	$services = Service::orderBy('name')->get(); 
    	$entities = Entity::orderBy('name')->get(); 

    	return view('contract.createContract')->with(compact('services','entities'));

    }

    public function saveContract(Request $request){
    	//Validad formulario
    /*	$validateData = $this->validate($request, [
    			
    			'servicio' => 'required',
    			'entidad' => 'required',
    			'cate_general' => 'required',
				'cate_especifica' => 'required',
				'tipo' => 'required'

    	]);
	*/

		$contract = new Contract();
    	$user = \Auth::user();
    	//$contract-> user_id = $user->id;
    	$contract->code = $request->input('codigo');
    	$contract->general_category_id = $request->cate_general;
    	$contract->specific_category_id = $request->cate_especifica;
		$contract->type_id = $request->tipo;
		$contract->entity_id = $request->entidad;
    	$contract->service_id = $request->servicio;
    	
    	
    	$contract->save(); 

    	return redirect()->route('listContract')->with(array(
    		'message' => 'El contrato se ha creado correctamente!!'
    	));
    }


	public function editContract($id){

		//return "Mostrar aquí el form de edicion para el producto con id $id";

		$contracts = Contract::find($id);
		//dd($contracts);

    	$services = Service::orderBy('name')->get(); 
    	$entities = Entity::orderBy('name')->get(); 
    	return view('contract.editContract')->with(compact('contracts','services','entities'));

    }

    public function updateContract(Request $request, $id){
    	//Validad formulario
	    /*	$validateData = $this->validate($request, [
	    			
	    			'servicio' => 'required',
	    			'entidad' => 'required',
	    			'cate_general' => 'required',
					'cate_especifica' => 'required',
					'tipo' => 'required'

	    	]);
		*/
	
		$contract = Contract::find($id);
    	$contract->code = $request->input('codigo');
    	$contract->general_category_id = $request->cate_general;
    	$contract->specific_category_id = $request->cate_especifica;
		$contract->type_id = $request->tipo;
		$contract->entity_id = $request->entidad;
    	$contract->service_id = $request->servicio;
    	$contract->save();  // update 

    	return redirect()->route('listContract')->with(array(
    		'message' => 'El contrato se modifico correctamente!!'
    	));
    }

//eliminación fisica
	public function destroyContract($id){
    
		$contract = Contract::find($id);
		//$deletedRows = App\Flight::where('active', 0)->delete();
		$contract->delete(); //DELETE
		
    	return back()->with(array(
    		'message' => 'El contrato fue eliminado correctamente!!'
    	));
    }


}
