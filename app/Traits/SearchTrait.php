<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait  SearchTrait
{
    use UploadTrait;

    public function scopeSearch($query, $request)
    {
        $query
            ->when($request->q != null, function ($q) use ($request) {
                $q->whereLike(static::searchAttributes, $request->q);
            })
            ->when($request->created_at_min != null, function ($q) use ($request) {
                $q->WhereDate('created_at', '>=', $request->created_at_min);
            })
            ->when($request->created_at_max != null, function ($q) use ($request) {
                $q->WhereDate('created_at', '<=', $request->created_at_max);
            });

        $searchArrayExcept = $request->except(['q', 'order', 'created_at_min', 'created_at_max', '_', 'page', 'status']);

        foreach ($searchArrayExcept as $key => $value) {
            if ($value != null) {
                $query->Where($key, $value);
            }
        }

        return $query->orderBy('created_at', strtoupper($request->order) == "ASC" ? "ASC" : 'DESC');
    }
}
