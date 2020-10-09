<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsTo;

class Attribute extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Attribute';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'attribute_label';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Attribute Set', 'attributesetrelation', 'App\Nova\Attributeset'),
            Text::make('Attribute Code','attribute_code')->rules('required'),
            Text::make('Attribute Label','attribute_label')->rules('required')->hideFromIndex(),
            Text::make('Input Type','input_type')->rules('required')->hideFromIndex(),
            Text::make('Input Value','input_value')->rules('required')->hideFromIndex(),
            Boolean::make('Required','required')->hideFromIndex(),
            Boolean::make('Visible','visible')->hideFromIndex(),
            Boolean::make('Searchable','searchable')->hideFromIndex(),
            Boolean::make('Filterable','filterable')->hideFromIndex(),
            Boolean::make('Comparable','comparable')->hideFromIndex(),
            Boolean::make('Variation','variation')->hideFromIndex(),
            Text::make('validation','validation')->rules('required')->hideFromIndex(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
