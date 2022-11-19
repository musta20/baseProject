<?php

namespace App\View\Components;

use App\Models\category;
use App\Models\clients;
use App\Models\message;
use App\Models\order;
use App\Models\Report;
use App\Models\services;
use App\Models\Tasks;
use Carbon\Carbon;
use Illuminate\View\Component;

class AdminContent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $allnumber;
    public $orderWeek = [];
    public $orderWeekConplete = [];
    public $orderWeekOnProsses = [];
    public $orderWeekDelevred = [];

    public $taskWeekdone = [];
    public $taskrWeek = [];
    public $alltaskrWeek = [];

    public function __construct()
    {


        $orderData = order::whereBetween('created_at',[Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
        )->get()->groupBy(function ($element) {
            return Carbon::parse($element->created_at)->format('w');
        });

        foreach ($orderData as $key) {
            array_push($this->orderWeek, count($key));
        }

        $ordertaskData = Tasks::whereBetween('created_at',[Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
        )->get()->groupBy(function ($element) {
            return Carbon::parse($element->created_at)->format('w');
        });

        foreach ($ordertaskData as $key) {
            array_push($this->alltaskrWeek , count($key));
        }


         $this->orderWeekConplete = $this->getDataWeek(2);
         $this->orderWeekOnProsses = $this->getDataWeek(1);
         $this->orderWeekDelevred =  $this->getDataWeek(3);
        

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
    }

    public function getDataWeek($type)
    {
        $count =[];
        $orderData = order::where('status',$type)->whereBetween('created_at',[Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
        )->get()->groupBy(function ($element) {
            return Carbon::parse($element->created_at)->format('w');
        });

        foreach ($orderData as $key) {
            array_push($count , count($key));
        }
       return  $count;
    }


    public function getTaskDataWeek($type)
    {
        $count =[];
        $orderData = Tasks::where('isdone',$type)->whereBetween('created_at',[Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
        )->get()->groupBy(function ($element) {
            return Carbon::parse($element->created_at)->format('w');
        });

        foreach ($orderData as $key) {
            array_push($count , count($key));
        }
       return  $count;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-content');
    }
}
