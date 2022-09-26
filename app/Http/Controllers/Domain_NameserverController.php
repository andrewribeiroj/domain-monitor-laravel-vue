<?php

namespace App\Http\Controllers;

use App\Models\Domain_Nameserver as Domain_Nameserver;
use App\Http\Resources\Domain_Nameserver as Domain_NameserverResource;
use Illuminate\Http\Request;

class Domain_nameserverController extends Controller
{
    public function index(){
        $domain_nameservers = Domain_Nameserver::all()->sortBy('name');
        return Domain_NameserverResource::collection($domain_nameservers);
      }
    
      public function show($id){
        $domain_nameserver = Domain_Nameserver::findOrFail( $id );
        return new Domain_NameserverResource( $domain_nameserver );
      }
    
      public function store(Request $request){
        $domain_nameserver = new Domain_Nameserver;
        $domain_nameserver->type = $request->input('type');
        $domain_nameserver->domain_id = $request->input('domain_id');
        $domain_nameserver->nameserver_id = $request->input('nameserver_id');
        $domain_nameserver->header_status = $request->input('header_status');
    
        if( $domain_nameserver->save() ){
          return new Domain_NameserverResource( $domain_nameserver );
        }
      }
    
       public function update(Request $request){
        $domain_nameserver = Domain_Nameserver::findOrFail( $request->id );
        $domain_nameserver->type = $request->input('type');
        $domain_nameserver->domain_id = $request->input('domain_id');
        $domain_nameserver->nameserver_id = $request->input('nameserver_id');
        $domain_nameserver->header_status = $request->input('header_status');
    
        if( $domain_nameserver->save() ){
          return new Domain_NameserverResource( $domain_nameserver );
        }
      } 
    
      public function destroy($id){
        $domain_nameserver = Domain_Nameserver::findOrFail( $id );
        if( $domain_nameserver->delete() ){
          return new Domain_NameserverResource( $domain_nameserver );
        }
    
      }
}
