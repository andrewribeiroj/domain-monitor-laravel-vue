<?php

namespace App\Http\Controllers;

use App\Models\Nameserver as Nameserver;
use App\Http\Resources\Nameserver as NameserverResource;
use Illuminate\Http\Request;

class NameserverController extends Controller
{
    public function index(){
        $nameservers = Nameserver::all()->sortBy('name');
        return NameserverResource::collection($nameservers);
      }
    
      public function show($id){
        $nameserver = Nameserver::findOrFail( $id );
        return new NameserverResource( $nameserver );
      }
    
      public function store(Request $request){
        $nameserver = new Nameserver;
        $nameserver->name = $request->input('name');
        $nameserver->createdAt = $request->input('created_at');
    
        if( $nameserver->save() ){
          return new NameserverResource( $nameserver );
        }
      }
    
       public function update(Request $request){
        $nameserver = Nameserver::findOrFail( $request->id );
        $nameserver->name = $request->input('name');
        $nameserver->createdAt = $request->input('created_at');
    
        if( $nameserver->save() ){
          return new NameserverResource( $nameserver );
        }
      } 
    
      public function destroy($id){
        $nameserver = Nameserver::findOrFail( $id );
        if( $nameserver->delete() ){
          return new NameserverResource( $nameserver );
        }
    
      }
}
