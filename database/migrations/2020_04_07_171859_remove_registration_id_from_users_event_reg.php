<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveRegistrationIdFromUsersEventReg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::table('users_event_reg', function (Blueprint $table) {
          $table->dropColumn('registration_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users_event_reg', function (Blueprint $table) {
          $table->string('registration_id')->after('id');
      });
    }
}
