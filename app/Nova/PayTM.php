<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;

class PayTM extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\PayTM';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

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
            Text::make('Mid','mid')->rules('required')->hideFromIndex(),
            Text::make('Website','website')->rules('required')->hideFromIndex(),
            Text::make('Industry Type','industrytype')->rules('required')->hideFromIndex(),
            Text::make('Channel ID','channelid')->rules('required'),
            Text::make('Order ID','orderid')->rules('required'),
            Text::make('Customer ID','custid')->rules('required')->hideFromIndex(),
            Text::make('Mobile Number','mobileno')->rules('required')->hideFromIndex(),
            Text::make('Email','email')->rules('required', 'email')->hideFromIndex(),
            Text::make('Amount','amt')->rules('required'),
            Text::make('Callback URL','callbackurl')->rules('required', 'url')->hideFromIndex(),
            Text::make('URL','url')->rules('required', 'url')->hideFromIndex(),
            Text::make('Checksum','checksum')->rules('required')->hideFromIndex(),
            Text::make('Request','request')->rules('required')->hideFromIndex(),
            Text::make('Response','response')->rules('required')->hideFromIndex(),

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
