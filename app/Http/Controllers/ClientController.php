<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function clients()
    {
        return ClientResource::collection(Client::all());
    }

    public function create(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'cpf' => 'required|unique:clients',
            'email' => 'required',
            'phone' => 'required',
            'street' => 'required',
            'uf' => 'required',
        ]);

        Client::create($attributes);
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $attributes = $request->all();
        $client->update($attributes);
    }

    public function show($id)
    {
        return new ClientResource(Client::find($id));
    }

    public function delete($id)
    {
        $client = Client::find($id);
        $client->delete();
    }
}