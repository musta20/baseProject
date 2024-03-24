<?php
namespace App\Models\Conserns;

use App\Enums\Sorting;
use App\Enums\PublishStatus;
use Illuminate\Support\Facades\View;
use InvalidArgumentException;

trait Withfilter{


   // protected array $filterFiled= [];

    protected array $relationName = [];

    protected string $defaultSimpleView  = 'components.filter';


    public static function ShowFilter($view = null)
    {
        return view($view ?: "components.filter", [
            'filterFiled' => self::$filterFiled
        ]);
    }


    public function scopeFilter($query)    
    {


        $relation = request('rel');
        
        $orderType = request('orderType');

        $filed = request('filed'); 

        $realTable =  $this->filterByRelation[request('realTable')] ?? null;

        if ($relation && $realTable) {

            $query->whereHas($realTable, function ($query) use ($relation) {

                $query->where('id', $relation);

            });

        }


        switch ($orderType) {
            case Sorting::DESC->value:
                $query->orderBy($filed, 'desc');
                break;
            case Sorting::ASC->value:
                $query->orderBy($filed);
                break;
            case Sorting::NEWEST->value:
                $query->orderBy('created_at', 'desc');
                break;
            case Sorting::OlDEST->value:
                $query->orderBy('created_at');
                break;
        }

        return $query;
    }   

    public function scopeOrderByType($query, $orderType, $isAdmin)
    {

        if ($orderType['categoryId']) {

            $query->whereHas('categories', function ($query) use ($orderType) {
                $query->where('id', $orderType['categoryId']);
            });
        }

        if ($isAdmin) {
            
            switch ($orderType['sortType']) {
                case PublishStatus::PUBLISHED->value:
                    $query->where('status', PublishStatus::PUBLISHED->value);
                    break;
                case PublishStatus::DRAFT->value:
                    $query->where('status', PublishStatus::DRAFT->value);
                    break;
                case PublishStatus::CREATED->value:
                    $query->where('status', PublishStatus::CREATED->value);
                    break;
            }
        }

        switch ($orderType['sortType']) {
            case Sorting::AVG_COUSTMER->value:
                $query->orderBy('rating', 'desc');
                break;
            case Sorting::BEST_SELLING->value:
                $query->orderBy('order_count', 'desc');
                break;
            case Sorting::NEWEST->value:
                $query->orderBy('created_at', 'desc');
                break;
            case Sorting::HIGHT_TO_LOW->value:
                $query->orderBy('price', 'desc');
                break;
            case Sorting::LOW_TO_HIGHT->value:
                $query->orderBy('price');
                break;
        }

        return $query;
    }






}



?>