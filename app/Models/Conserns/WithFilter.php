<?php

namespace App\Models\Conserns;

use App\Enums\PublishStatus;
use App\Enums\Sorting;
use Illuminate\Database\Eloquent\Collection;

trait WithFilter
{
    protected string $defaultSimpleView = 'components.filter';

    public static function showFilter($view = null, $relType = null, $relName = null, ?Collection $realData = null)
    {

        return view($view ?: 'components.filter', [
            'filterFiled' => self::$filterFiled,
            'realData' => $realData,
            'relName' => $relName,
            'relType' => $relType,
        ]);
    }

    public static function showCustomFilter($filterFiled = null, $view = null, $relType = null, $relName = null, ?Collection $realData = null)
    {

        return view($view ?: 'components.filter', [
            'filterFiled' => $filterFiled ?? self::$filterFiled,
            'realData' => $realData,
            'relName' => $relName,
            'relType' => $relType,
        ]);
    }

    public static function scopeRequestPaginate($query)
    {

        $request = request();
        $itemsPerPage = $request->itemsPerPage ?? 10;

        $request->validate([
            'itemsPerPage' => 'nullable|integer|min:2|max:100',
        ]);

        return $query->paginate($itemsPerPage);
    }

    public function scopeFilter($query)
    {

        $relation = request()->query()['rel'] ?? null;
        $relationId = request()->query()['id'] ?? null;

        $orderType = request()->query()['orderType'] ?? null;

        $filed = request()->query()['filed'] ?? null;

        $value = request()->query()['value'] ?? null;

        $searchTerm = request()->query()['search'] ?? null;

        if ($relation) {
            $query->whereHas($relation, function ($query) use ($relationId) {

                $query->where('id', $relationId);

            });

        }

        if ($searchTerm) {

            $query->where(function ($query) use ($searchTerm) {
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
