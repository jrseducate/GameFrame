<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdToPasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $schema = Schema::connection('gamedev');
        if($schema->hasTable('password_resets') && !$schema->hasColumn('password_resets', 'id'))
        {
            $schema->table('password_resets', function(Blueprint $table)
            {
                $table->bigIncrements('id')->first();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $schema = Schema::connection('gamedev');
        if($schema->hasTable('password_resets') && $schema->hasColumn('password_resets', 'id'))
        {
            $schema->table('password_resets', function(Blueprint $table)
            {
                $table->dropColumn('id');
            });
        }
    }
}
