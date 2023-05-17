<?php

namespace App\Helpers;

use App\Enums\OrderStatus;
use App\Enums\Translations\OrderStatusTranslation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Helper {

    public static function userDatetime($date) {
        $user = Auth::user();
        if ( $date == null ) {
            return '-';
        }
        return Carbon::parse($date)->timezone($user->timezone);
    }

//    public static $orderStatusClass = [
//        OrderStatus::ORDER_PLACED => 'bg-primary',
//        OrderStatus::IN_PROGRESS => 'bg-secondary',
//        OrderStatus::PACKED => 'bg-warning',
//        OrderStatus::SENT => 'bg-success',
//        OrderStatus::CANCELED => 'bg-danger',
//    ];
//
//    public static function renderOrderStatus($orderStatus)
//    {
//        $name = OrderStatusTranslation::$translations[$orderStatus];
//        $class = self::$orderStatusClass[$orderStatus];
//
//        return '<span class="'. $class .' badge me-2">'.$name.'</span>';
//    }

    public static function renderAnswer($status)
    {
        if ( $status ) {
            return '<span class="bg-success badge me-2">'. __('Yes') .'</span>';
        } else {
            return '<span class="bg-danger badge me-2">'. __('No') .'</span>';
        }
    }

}
