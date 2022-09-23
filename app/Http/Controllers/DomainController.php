<?php

Namespace App\Http\Controllers;

use App\Models\Domain as Domain;
use App\Http\Resources\Domain as DomainResource;
use Illuminate\Http\Request;

class DomainController extends Controller {

  public function index(){
    $domains = Domain::paginate(15);
    return DomainResource::collection($domains);
  }

  public function show($id){
    $domain = Domain::findOrFail( $id );
    return new DomainResource( $domain );
  }

  public function store(Request $request){
    $domain = new Domain;
    $domain->mongoId = $request->input('mongoId');
    $domain->domain = $request->input('domain');
    $domain->available = $request->input('available');
    $domain->backordered = $request->input('backordered');

    if( $domain->save() ){
      return new DomainResource( $domain );
    }
  }

   public function update(Request $request){
    $domain = Domain::findOrFail( $request->id );
    $domain->mongoId = $request->input('mongoId');
    $domain->domain = $request->input('domain');
    $domain->available = $request->input('available');
    $domain->backordered = $request->input('backordered');

    if( $domain->save() ){
      return new DomainResource( $domain );
    }
  } 

  public function destroy($id){
    $domain = Domain::findOrFail( $id );
    if( $domain->delete() ){
      return new DomainResource( $domain );
    }

  }
}