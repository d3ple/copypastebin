<?php


namespace App\BusinessLogic;

use App\Paste;
use Carbon\Carbon;
use Illuminate\Support\Str;


class PasteService
{

    public function setExpirationTime($json)
    {
        $expirationObj = json_decode($json);
        $timeUnit = $expirationObj[0]->unit;
        $time = $expirationObj[0]->time;

        switch ($timeUnit) {
            case "min":
                return Carbon::now()->addMinutes($time);
                break;
            case "hour":
                return Carbon::now()->addHours($time);
                break;
            case "day":
                return Carbon::now()->addMinutes($time);
                break;
            case "week":
                return Carbon::now()->addWeeks($time);
                break;
            case "month":
                return Carbon::now()->addMonths($time);
                break;
            case "year":
                return Carbon::now()->addYears($time);
                break;
            default:
                return Carbon::create(0);
        }
    }


    public function createUrl()
    {
        $randomUrl = Str::random(12);
        while (Paste::where('url', $randomUrl)->first()) {
            $randomUrl = Str::random(12);
        }
        return $randomUrl;
    }


    public function setUserId()
    {
        return auth()->user() ? auth()->user()->id : 0;
    }


}