<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Image;

class Product extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Product';

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
            BelongsTo::make('Store', 'stores', 'App\Nova\Store'),
            Text::make('Name','name')->rules('required'),
            Text::make('Slug','slug')->rules('required')->hideFromIndex(),
            Text::make('Sku','sku')->rules('required')->hideFromIndex(),
            Text::make('Sku','sku')->rules('required')->hideFromIndex(),
            Textarea::make('Description','description')->rules('required')->hideFromIndex(),
            Number::make('Price','price')->rules('required'),
            Image::make('Prduct Image','product_image') 
                ->disk('uploads')
                ->path('uploads/images')
                ->rules('required')
                ->hideFromIndex(),
            Image::make('Thumbnail Image','thumbnailimage') 
                ->disk('uploads')
                ->path('uploads/images/thumbnail')
                ->rules('required')
                ->hideFromIndex(),
            Boolean::make('Status','status')
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
