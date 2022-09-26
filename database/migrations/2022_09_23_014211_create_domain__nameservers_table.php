<?php

use App\Models\Domain;
use App\Models\Nameserver;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainNameserversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain__nameservers', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('domain_id');
            $table->foreignIdFor(Nameserver::class, 'nameserver_id');
            $table->string('header_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domain__nameservers');
    }
}
