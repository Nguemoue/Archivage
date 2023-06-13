<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Connection;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    public function index()
    {
    	$connections = Connection::query()->with("profile")->get();
    	return view("superAdmin.connection.list",['connections' =>$connections]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Connection $connection)
    {
    }

    public function edit(Connection $connection)
    {
    }

    public function update(Request $request, Connection $connection)
    {
    }

    public function destroy(Connection $connection)
    {
    }
}
