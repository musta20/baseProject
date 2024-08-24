<?php

namespace App\Http\Controllers;

use App\Models\Category as category;
use App\Models\Clients as clients;
use App\Models\Message as message;
use App\Models\Order as order;
use App\Models\Report as report;
use App\Models\Services as services;
use App\Models\Tasks as tasks;
use Carbon\Carbon;

class AdminController extends Controller
{
    public $allnumber;
    public $orderWeek = [];
    public $orderWeekConplete = [];
    public $orderWeekOnProsses = [];
    public $orderWeekDelevred = [];

    public $taskWeekdone = [];
    public $taskrWeek = [];
    public $alltaskrWeek = [];

    public function index()
    {

        $orderData = order::whereBetween(
            'created_at',
            [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
        )->get()->groupBy(function ($element) {
            return Carbon::parse($element->created_at)->format('w');
        });

        foreach ($orderData as $key) {
            array_push($this->orderWeek, count($key));
        }

        $ordertaskData = Tasks::whereBetween(
            'created_at',
            [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
        )->get()->groupBy(function ($element) {
            return Carbon::parse($element->created_at)->format('w');
        });

        foreach ($ordertaskData as $key) {
            array_push($this->alltaskrWeek, count($key));
        }

        $this->orderWeekConplete = $this->getDataWeek(2);
        $this->orderWeekOnProsses = $this->getDataWeek(1);
        $this->orderWeekDelevred = $this->getDataWeek(3);

        $this->taskrWeek = $this->getTaskDataWeek(0);
        $this->taskWeekdone = $this->getTaskDataWeek(1);

        $this->allnumber = [
            //  'orderWeek' => $orderWeek,
            'order' => count(order::get()),
            'services' => count(services::get()),
            'cat' => count(category::get()),
            'msg' => count(message::get()),
            'report' => count(Report::get()),
            'clent' => count(clients::get()),
        ];

        return view('admin.index', [
            'allnumber' => $this->allnumber,
            'orderWeek' => $this->orderWeek,
            'orderWeekConplete' => $this->orderWeekConplete,
            'orderWeekOnProsses' => $this->orderWeekOnProsses,
            'orderWeekDelevred' => $this->orderWeekDelevred,
            'taskrWeek' => $this->taskrWeek,
            'taskWeekdone' => $this->taskWeekdone,
            'alltaskrWeek' => $this->alltaskrWeek,

        ]);
    }

    public function getDataWeek($type)
    {
        $count = [];
        $orderData = order::where('status', $type)->whereBetween(
            'created_at',
            [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
        )->get()->groupBy(function ($element) {
            return Carbon::parse($element->created_at)->format('w');
        });

        foreach ($orderData as $key) {
            array_push($count, count($key));
        }

        return $count;
    }

    public function getTaskDataWeek($type)
    {
        $count = [];
        $orderData = Tasks::where('isdone', $type)->whereBetween(
            'created_at',
            [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
        )->get()->groupBy(function ($element) {
            return Carbon::parse($element->created_at)->format('w');
        });

        foreach ($orderData as $key) {
            array_push($count, count($key));
        }

        return $count;
    }
}
