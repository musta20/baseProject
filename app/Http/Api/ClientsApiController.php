<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Enums\CommentStatus;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Clients;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ClientsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
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
     *
     * @param Clients $client
     * @return JsonResponse
     */
    public function show(Clients $client): JsonResponse
    {
        return response()->json($client);
    }

    /**
     * Get the options for editing a client.
     *
     * @param Clients $client
     * @return JsonResponse
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
     *
     * @param UpdateClientRequest $request
     * @param Clients $client
     * @return JsonResponse
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
     *
     * @param Clients $client
     * @return JsonResponse
     */
    public function destroy(Clients $client): JsonResponse
    {
        $client->delete();

        return response()->json([
            'message' => 'Client deleted successfully',
        ]);
    }
}