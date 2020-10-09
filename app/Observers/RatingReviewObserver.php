<?php

namespace App\Observers;

use App\Models\RatingReview;
use App\Models\Product;

class RatingReviewObserver
{
    /**
     * Handle the rating review "created" event.
     *
     * @param  \App\RatingReview  $ratingReview
     * @return void
     */
    public function created(RatingReview $ratingReview)
    {
        $product=Product::where('id',$ratingReview->entity_id)->first();
        $product->ratings=$product->starrating();
        $product->save();
    }

    /**
     * Handle the rating review "updated" event.
     *
     * @param  \App\RatingReview  $ratingReview
     * @return void
     */
    public function updated(RatingReview $ratingReview)
    {
        //
    }

    /**
     * Handle the rating review "deleted" event.
     *
     * @param  \App\RatingReview  $ratingReview
     * @return void
     */
    public function deleted(RatingReview $ratingReview)
    {
        //
    }

    /**
     * Handle the rating review "restored" event.
     *
     * @param  \App\RatingReview  $ratingReview
     * @return void
     */
    public function restored(RatingReview $ratingReview)
    {
        //
    }

    /**
     * Handle the rating review "force deleted" event.
     *
     * @param  \App\RatingReview  $ratingReview
     * @return void
     */
    public function forceDeleted(RatingReview $ratingReview)
    {
        //
    }
}
