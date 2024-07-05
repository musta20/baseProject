<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Clients;
use App\Models\Message;
use App\Models\Order;
use App\Models\Report;
use App\Models\Services;
use App\Models\Tasks;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class AdminApiController extends Controller
{
    public function getDashboardData(): JsonResponse
    {
        $orderWeek = $this->getOrderWeekData();
        $taskWeek = $this->getTaskWeekData();

        $dashboardData = [
            'allNumbers' => $this->getAllNumbers(),
            'orderWeek' => $orderWeek,
            'orderWeekComplete' => $this->getDataWeek(2),
            'orderWeekInProcess' => $this->getDataWeek(1),
            'orderWeekDelivered' => $this->getDataWeek(3),
            'taskWeek' => $taskWeek['allTasks'],
            'taskWeekPending' => $taskWeek['pendingTasks'],
            'taskWeekDone' => $taskWeek['completedTasks'],
        ];

        return response()->json($dashboardData);
    }

    private function getAllNumbers(): array
    {
        return [
            'order' => Order::count(),
            'services' => Services::count(),
            'category' => Category::count(),
            'message' => Message::count(),
            'report' => Report::count(),
            'client' => Clients::count(),
        ];
    }

    private function getOrderWeekData(): array
    {
        $startOfWeek = Carbon::now()->subWeek()->startOfWeek();
        $endOfWeek = Carbon::now()->subWeek()->endOfWeek();

        $orderData = Order::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get()
            ->groupBy(function ($element) {
                return Carbon::parse($element->created_at)->format('w');
            });

        return $orderData->map->count()->values()->toArray();
    }

    private function getTaskWeekData(): array
    {
        $startOfWeek = Carbon::now()->subWeek()->startOfWeek();
        $endOfWeek = Carbon::now()->subWeek()->endOfWeek();

        $taskData = Tasks::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get()
            ->groupBy(function ($element) {
                return Carbon::parse($element->created_at)->format('w');
            });

        $allTasks = $taskData->map->count()->values()->toArray();
        $pendingTasks = $this->getTaskDataWeek(0);
        $completedTasks = $this->getTaskDataWeek(1);

        return [
            'allTasks' => $allTasks,
            'pendingTasks' => $pendingTasks,
            'completedTasks' => $completedTasks,
        ];
    }

    private function getDataWeek(int $type): array
    {
        $startOfWeek = Carbon::now()->subWeek()->startOfWeek();
        $endOfWeek = Carbon::now()->subWeek()->endOfWeek();

        $orderData = Order::where('status', $type)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get()
            ->groupBy(function ($element) {
                return Carbon::parse($element->created_at)->format('w');
            });

        return $orderData->map->count()->values()->toArray();
    }

    private function getTaskDataWeek(int $type): array
    {
        $startOfWeek = Carbon::now()->subWeek()->startOfWeek();
        $endOfWeek = Carbon::now()->subWeek()->endOfWeek();

        $taskData = Tasks::where('isdone', $type)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get()
            ->groupBy(function ($element) {
                return Carbon::parse($element->created_at)->format('w');
            });

        return $taskData->map->count()->values()->toArray();
    }
}