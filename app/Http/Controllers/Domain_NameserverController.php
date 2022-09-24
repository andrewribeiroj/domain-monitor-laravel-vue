<?php

namespace App\Http\Controllers;

use App\Models\Domain_nameserver as Domain_nameserver;
use App\Http\Resources\Domain_nameserver as Domain_nameserverResource;
use Illuminate\Http\Request;

class Domain_nameserverController extends Controller
{
    public function index(){
        $domain_nameservers = Domain_nameserver::all()->sortBy('name');
        return Domain_nameserverResource::collection($domain_nameservers);
      }
    
      public function show($id){
        $domain_nameserver = Domain_nameserver::findOrFail( $id );
        return new Domain_nameserverResource( $domain_nameserver );
      }
    
      public function store(Request $request){
        $domain_nameserver = new Domain_nameserver;
        $domain_nameserver->domain_id = $request->input('domain_id');
        $domain_nameserver->nameserver_id = $request->input('nameserver_id');
    
        if( $domain_nameserver->save() ){
          return new Domain_nameserverResource( $domain_nameserver );
        }
      }
    
       public function update(Request $request){
        $domain_nameserver = Domain_nameserver::findOrFail( $request->id );
        $domain_nameserver->domain_id = $request->input('domain_id');
        $domain_nameserver->nameserver_id = $request->input('nameserver_id');
    
        if( $domain_nameserver->save() ){
          return new Domain_nameserverResource( $domain_nameserver );
        }
      } 
    
      public function destroy($id){
        $domain_nameserver = Domain_nameserver::findOrFail( $id );
        if( $domain_nameserver->delete() ){
          return new Domain_nameserverResource( $domain_nameserver );
        }
    
      }
}
