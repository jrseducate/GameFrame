<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsAdminToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $schema = Schema::connection('gamedev');
        if($schema->hasTable('users') && !$schema->hasColumn('users', 'is_admin'))
        {
            $schema->table('users', function(Blueprint $table)
            {
                $table->boolean('is_admin')->default(0)->after('id');
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
        if($schema->hasTable('users') && $schema->hasColumn('users', 'is_admin'))
        {
            $schema->table('users', function(Blueprint $table)
            {
                $table->dropColumn('is_admin');
            });
        }
    }
}
