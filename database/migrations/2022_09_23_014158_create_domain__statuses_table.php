<?php

use App\Models\Domain;
use App\Models\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain__statuses', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('domain_id');
            $table->foreignIdFor(Status::class, 'status_id');
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
        Schema::dropIfExists('domain__statuses');
    }
}
