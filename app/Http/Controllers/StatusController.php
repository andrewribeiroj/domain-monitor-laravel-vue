<?php

namespace App\Http\Controllers;

use App\Models\Status as Status;
use App\Http\Resources\Status as StatusResource;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(){
        $statuses = Status::all()->sortBy('name');
        return StatusResource::collection($statuses);
      }
    
      public function show($id){
        $status = Status::findOrFail( $id );
        return new StatusResource( $status );
      }
    
      public function store(Request $request){
        $status = new Status;
        $status->name = $request->input('name');
        $status->createdAt = $request->input('created_at');
    
        if( $status->save() ){
          return new StatusResource( $status );
        }
      }
    
       public function update(Request $request){
        $status = Status::findOrFail( $request->id );
        $status->name = $request->input('name');
        $status->createdAt = $request->input('created_at');
    
        if( $status->save() ){
          return new StatusResource( $status );
        }
      } 
    
      public function destroy($id){
        $status = Status::findOrFail( $id );
        if( $status->delete() ){
          return new StatusResource( $status );
        }
    
      }
}
