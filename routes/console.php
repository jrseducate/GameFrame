<?php

use App\Handlers\DBCloneHandler;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

$defaultConnection  = Cache::get('dbo_default_connection', \DB::getName());

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command("dbc:clear {connection=0}", function($connection) use($defaultConnection)
{
    $connection = ($connection == '0') ? $defaultConnection : $connection;

    if(is_null(getDatabaseFromConnection($connection)))
    {
        $this->warn("Failed to find connection '$connection'");
        return;
    }

    DBCloneHandler::clear($this, $connection);
});
Artisan::command("dbc:default {connection}", function($connection) use($defaultConnection)
{
    if(is_null(getDatabaseFromConnection($connection)))
    {
        $this->warn("Failed to find connection '$connection'");
        return;
    }

    \Cache::forever('dbo_default_connection', $connection);
});
Artisan::command("dbc:commit {connection=0}", function($connection) use($defaultConnection)
{
    $connection = ($connection == '0') ? $defaultConnection : $connection;

    if(is_null(getDatabaseFromConnection($connection)))
    {
        $this->warn("Failed to find connection '$connection'");
        return;
    }

    DBCloneHandler::commit($this, $connection);
});
Artisan::command("dbc:update {connection=0}", function($connection) use($defaultConnection)
{
    $connection = ($connection == '0') ? $defaultConnection : $connection;

    if(is_null(getDatabaseFromConnection($connection)))
    {
        $this->warn("Failed to find connection '$connection'");
        return;
    }

    DBCloneHandler::update($this, $connection);
});