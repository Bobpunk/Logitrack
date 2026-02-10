<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntregaRequest;
use App\Models\Entrega;
use Illuminate\Http\Request;
use App\Http\Resources\EntregaResource; 

class EntregaController extends Controller
{
    
    public function index(Request $request)
    {
        
       // metodo antigo return EntregaResource::collection(Entrega::all());

       return EntregaResource::collection($request->user()->entregas);
    }

    
    public function show($id)
    {
        $entrega = Entrega::findOrFail($id); 
        return new EntregaResource($entrega);
    }

  
    public function store(EntregaRequest $request)
    {
       /* $novaEntrega = Entrega::create($request->all());
        return new EntregaResource($novaEntrega);*/ // metodo antigo

        $novaEntrega = $request->user()->entregas()->create($request->validated());
        return new EntregaResource($novaEntrega);
    }

    
    public function update(EntregaRequest $request, $id)
    {
            $entrega = $request->user()->entregas()->findOrFail($id);
            $entrega->update($request->validated());
            return new EntregaResource($entrega);
    }

    
    public function destroy(Request $request,$id)
    {
       $entrega = $request->user()->entregas()->findOrFail($id);
       $entrega->delete();
       return response()->noContent();
    }
}