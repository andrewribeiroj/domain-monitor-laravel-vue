<?php

namespace App\Http\Controllers;

use App\Http\Resources\JoinDomainData;
use App\Models\Domain as Domain;
use App\Models\Status as Status;
use Illuminate\Http\Request;

class JoinDomainDataController extends Controller
{
    public function index()
    {
        $nameservers = Domain::join('domain__nameservers', 'domain__nameservers.domain_id', '=', 'domains.mongoId')
            ->join('nameservers', 'nameservers.id', '=', 'domain__nameservers.nameserver_id')
            ->get(['domains.id', 'domains.domain', 'nameservers.name', 'domain__nameservers.header_status', 'nameservers.created_at']);

        $statuses = Domain::join('domain__statuses', 'domain__statuses.domain_id', '=', 'domains.mongoId')
            ->join('statuses', 'statuses.id', '=', 'domain__statuses.status_id')
            ->get(['domains.id', 'domains.domain', 'statuses.name', 'domain__statuses.header_status', 'statuses.created_at']);

        $data = [$statuses, $nameservers];

        return $data;
    }

    public function show($id)
    {
        $nameservers = Domain::join('domain__nameservers', 'domain__nameservers.domain_id', '=', 'domains.mongoId')
            ->join('nameservers', 'nameservers.id', '=', 'domain__nameservers.nameserver_id')
            ->where('domains.id', $id)
            ->get(['domains.id', 'domains.domain', 'nameservers.name', 'domain__nameservers.header_status', 'domain__nameservers.created_at']);

        $statuses = Domain::join('domain__statuses', 'domain__statuses.domain_id', '=', 'domains.mongoId')
            ->join('statuses', 'statuses.id', '=', 'domain__statuses.status_id')
            ->where('domains.id', $id)
            ->get(['domains.id', 'domains.domain', 'statuses.name', 'domain__statuses.header_status', 'domain__statuses.created_at']);

        $data = [$statuses, $nameservers];

        return $data;
    }
}

//'domain__nameservers.header_status',
//'domain__statuses.header_status',