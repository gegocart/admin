<?php

namespace App\Nova\Metrics;

use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Value;
use App\Models\User;
use App\Models\Usergroup;
use App\Models\Transaction;

class TotalSellerBalance extends Value
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        $usergroup = 'App\Models\Usergroup'::where('name','admin')->pluck('id')->toArray();
        $user = 'App\Models\User'::whereIn('usergroup_id', $usergroup)->pluck('id')->toArray();
        $transaction=Transaction::where('user_id',$user)->where('status','completed')
        ->orderby('id','desc')->first();
        //$amount=$transaction->balance_after;
        return $this->result($transaction->balance_after);
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            30 => '30 Days',
            60 => '60 Days',
            365 => '365 Days',
            'MTD' => 'Month To Date',
            'QTD' => 'Quarter To Date',
            'YTD' => 'Year To Date',
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'total-seller-balance';
    }
}
