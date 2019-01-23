<?php

namespace App\Nova\Lenses;

use App\Nova\Filters\VisitorStatus;
use App\Nova\Filters\VisitorType;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Lenses\Lens;
use Laravel\Nova\Http\Requests\LensRequest;

class TimeIntensiveVisitors extends Lens
{
    /**
     * Get the query builder / paginator for the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\LensRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return mixed
     */
    public static function query(LensRequest $request, $query)
    {
        return $request->withOrdering($request->withFilters(
            $query->select([
            'visitors.id',
            'visitors.name',
            'visitors.email',
            'visitors.status',
            'visitors.type',
            DB::raw('count(notes.id) as Count')
        ])
        ->join('notes', 'visitors.id', '=', 'notes.visitor_id')
        ->orderBy('Count', 'desc')
        ->groupBy('visitors.id', 'visitors.name')
        ));
    }

    /**
     * Get the fields available to the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make('ID', 'id')->sortable(),
            Text::make('Name')->sortable(),
            Select::make('Status')->sortable(),
            Text::make('Type')->sortable(),
            Text::make('Email')->sortable(),
            Number::make('Notes Count', 'Count'),
        ];
    }

    /**
     * Get the filters available for the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new VisitorStatus,
            new VisitorType,
        ];
    }

    /**
     * Get the URI key for the lens.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'time-intensive-visitors';
    }
}
