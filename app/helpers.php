<?php

use Money\Money;
use Money\Formatter\IntlMoneyFormatter;
use Illuminate\Support\Facades\Storage;
use App\Lib\File\Avatar\AvatarUploader;

function avatar(string $name)
{
    return config('site.avatar.path').$name;
}

function avatar_path(string $name)
{
    return (config('site.avatar.disk') === 'public' || config('site.avatar.disk') === 'local') ? AvatarUploader::disk()->path($path) : AvatarUploader::disk()->url($path);
}

function avatar_url(string $name)
{
    return AvatarUploader::disk()->url(config('site.avatar.path').$name);
}

function display_money(Money $money)
{
    return str_replace('NGN', '₦', app(IntlMoneyFormatter::class)->format($money) );
}

function fullname($user)
{
    return $user->firstname.' '.$user->middlename.' '.$user->lastname;
}

function request_info($request)
{
    $text = "Return interest only";

    if ($request->type === 'capital') {
        
        $text = "Capital Only";

    } else if ($request->type === 'everything'){
        
        $text = "Capital And Interest";

    } else if ($request->type === 'invest_all'){
        
        $text = "Invest Capital And Interest";

    } else if ($request->type === 'add_fund'){
        
        $text = "Add fund to Capital only";

    } else if ($request->type === 'add_fund_take_interest'){
        
        $text = "Add Fund To Capital, Take interest";

    } else if ($request->type === 'take_from_capital'){
        
        $text = "Take From Capital Only";

    } else if ($request->type === 'take_from_capital_to_interest'){
        
        $text = "Take From Capital To Interest";

    } else if ($request->type === 'explained'){
        
        $text = "Explained Request";

    }

    return $text;
    
}


function date_interval_percent($start, $end, $now)
{
    $total = $end->diffInHours($start);
    $current = ( $end->greaterThan($now) > 0 )? $total - $end->diffInHours($now) : $total;

    return (int) (($current/$total) * 100);
}

function date_interval_theme($start, $end, $now)
{
    $percent = date_interval_percent($start, $end, $now);

    $theme = 'primary';

    if ( $percent >= 75 ){
        $theme = 'danger';
    }else if ( $percent >= 50 ){
        $theme = 'warning';
    }else if ( $percent >= 25 ){
        $theme = 'info';
    }

    return $theme;
}

function fac_shuffle($array)
{
    shuffle($array);
    return $array[0];
}