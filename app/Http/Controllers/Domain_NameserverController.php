<?php

namespace App\Http\Controllers;

use App\Models\Domain_Nameserver as Domain_Nameserver;
use App\Http\Resources\Domain_Nameserver as Domain_NameserverResource;
use Illuminate\Http\Request;

class Domain_NameserverController extends Controller
{
    public function index(){
        $domain_nameservers = Domain_Nameserver::all()->sortBy('name');
        return Domain_NameserverResource::collection($domain_nameservers);
      }
    
      public function show($id){
        $domain_Nameserver = Domain_Nameserver::findOrFail( $id );
        return new Domain_NameserverResource( $domain_Nameserver );
      }
    
      public function store(Request $request){
        $domain_Nameserver = new Domain_Nameserver;
        $domain_Nameserver->name = $request->input('name');
        $domain_Nameserver->createdAt = $request->input('created_at');
    
        if( $domain_Nameserver->save() ){
          return new Domain_NameserverResource( $domain_Nameserver );
        }
      }
    
       public function update(Request $request){
        $domain_Nameserver = Domain_Nameserver::findOrFail( $request->id );
        $domain_Nameserver->name = $request->input('name');
        $domain_Nameserver->createdAt = $request->input('created_at');
    
        if( $domain_Nameserver->save() ){
          return new Domain_NameserverResource( $domain_Nameserver );
        }
      } 
    
      public function destroy($id){
        $domain_Nameserver = Domain_Nameserver::findOrFail( $id );
        if( $domain_Nameserver->delete() ){
          return new Domain_NameserverResource( $domain_Nameserver );
        }
    
      }
}
