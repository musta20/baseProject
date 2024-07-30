<?php

namespace App\Http\Controllers\Api;

use App\Enums\CommentStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Clients;
use Illuminate\Http\JsonResponse;

class ClientsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $clients = Clients::RequestPaginate();

        return response()->json([
            'clients' => $clients,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Clients $client): JsonResponse
    {
        return response()->json($client);
    }

    /**
     * Get the options for editing a client.
     */
    public function editOptions(Clients $client): JsonResponse
    {
        $statusOptions = CommentStatus::cases();

        return response()->json([
            'statusOptions' => $statusOptions,
            'client' => $client,
        ]);
    }

    /**
     * Update the specified client resource in storage.
     */
    public function update(UpdateClientRequest $request, Clients $client): JsonResponse
    {
        $client->status = $request->status;
        $client->save();

        return response()->json([
            'message' => 'Client updated successfully',
            'client' => $client,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clients $client): JsonResponse
    {
        $client->delete();

        return response()->json([
            'message' => 'Client deleted successfully',
        ]);
    }
}
