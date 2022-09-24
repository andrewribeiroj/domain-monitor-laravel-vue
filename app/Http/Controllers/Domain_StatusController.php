<?php

namespace App\Http\Controllers;

use App\Models\Domain_Status as Domain_Status;
use App\Http\Resources\Domain_Status as Domain_StatusResource;
use Illuminate\Http\Request;

class Domain_StatusController extends Controller
{
    public function index(){
        $domain_statuses = Domain_Status::all()->sortBy('name');
        return Domain_StatusResource::collection($domain_statuses);
      }
    
      public function show($id){
        $domain_status = Domain_Status::findOrFail( $id );
        return new Domain_StatusResource( $domain_status );
      }
    
      public function store(Request $request){
        $domain_status = new Domain_Status;
        $domain_status->name = $request->input('name');
        $domain_status->createdAt = $request->input('created_at');
    
        if( $domain_status->save() ){
          return new Domain_StatusResource( $domain_status );
        }
      }
    
       public function update(Request $request){
        $domain_status = Domain_Status::findOrFail( $request->id );
        $domain_status->name = $request->input('name');
        $domain_status->createdAt = $request->input('created_at');
    
        if( $domain_status->save() ){
          return new Domain_StatusResource( $domain_status );
        }
      } 
    
      public function destroy($id){
        $domain_status = Domain_Status::findOrFail( $id );
        if( $domain_status->delete() ){
          return new Domain_StatusResource( $domain_status );
        }
    
      }
}
