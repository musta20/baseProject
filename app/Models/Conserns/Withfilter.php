<?php
namespace App\Models\Conserns;

use App\Enums\Sorting;
use App\Enums\PublishStatus;
use Illuminate\Support\Facades\DB;
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


        $relation = request()->query()['rel'] ?? null;
        
        $orderType = request()->query()['orderType'] ?? null;

        $filed = request()->query()['filed'] ?? null;

        $value = request()->query()['value'] ?? null;

        $searchTerm = request()->query()['search'] ?? null;

        
        $realTable =  $this->filterByRelation[request('realTable')] ?? null;

        if ($relation && $realTable) {

            $query->whereHas($realTable, function ($query) use ($relation) {

                $query->where('id', $relation);

            });

        }
        if ($searchTerm) {

            $query = DB::table(self::getTable())->where(function ($query) use ($searchTerm) {
                foreach (self::$searchField as $columnName) {
                    $query->orWhere($columnName, 'like', "%{$searchTerm}%");
                }
            });
        }


        switch ($orderType) {
            case Sorting::EQULE->value:
                $query->where($filed, $value);
                break;
            case Sorting::DESC->value:
                $query->orderBy($filed, 'desc');
                break;
            case Sorting::ASC->value:
                $query->orderBy($filed);
                break;
            case Sorting::NEWEST->value:
                $query->orderBy($filed, 'desc');
                break;
            case Sorting::OlDEST->value:
                $query->orderBy($filed);
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