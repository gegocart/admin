<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Number;

class Transaction extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Transaction';

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
            BelongsTo::make('user'),
            BelongsTo::make('Order'),
            BelongsTo::make('productvariation'),
            Select::make('Type')->options([
                'credit' => 'Credit',
                'debit' => 'Debit',
            ]),
             Select::make('Status')->options([
                'pending' => 'Pending',
                'approve' => 'Approve',
            ]),
            Number::make('Amount', 'amount')->rules('required')->hideFromIndex(),
            Textarea::make('Action', 'action')->rules('required')->hideFromIndex(),
            Textarea::make('Request', 'request')->rules('required')->hideFromIndex(),
            Textarea::make('Response', 'response')->rules('required')->hideFromIndex(),
            Textarea::make('Entity Name', 'entity_name')->rules('required')->hideFromIndex(),
            Number::make('Balance Before', 'balance_before')->rules('required')->hideFromIndex(),
            Number::make('Balance After', 'balance_after')->rules('required')->hideFromIndex(),
           

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
