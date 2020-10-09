<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\HasMany;

class Store extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Store';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

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
            BelongsTo::make('User', 'users', 'App\Nova\User'),
            Text::make('Name', 'name')->rules('required'),
            Text::make('Slug', 'slug')->rules('required')->hideFromIndex(),
            Boolean::make('Status', 'status')->rules('required')->hideFromIndex(),
            Textarea::make('Description', 'description')->rules('required')->hideFromIndex(),
            Textarea::make('Keywords', 'keywords')->rules('required')->hideFromIndex(),
            Image::make('Store Logo','storelogo') 
                ->disk('uploads')
                ->path('storeimage/logo')
                ->rules('required')
                ->hideFromIndex(),
            Image::make('Store Image','storeimage') 
                ->disk('uploads')
                ->path('storeimage')
                ->rules('required')
                ->hideFromIndex(),
            Textarea::make('Address', 'address')->rules('required')->hideFromIndex(),
            HasMany::make('Product', 'products', 'App\Nova\Product')

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
