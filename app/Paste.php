<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Paste extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'title', 'data', 'syntax', 'access_type', 'user_id', 'expiration_time'
    ];


    public function scopePublic($query)
    {
        return $query->where('access_type', "public");
    }

    public function scopeTitleContains($query, $search)
    {
        return $query->where('title', 'LIKE', '%' . $search . '%');
    }


    public function scopeDataContains($query, $search)
    {
        return $query->where('data', 'LIKE', '%' . $search . '%');
    }


    public function getRecentPublicPastes()
    {
        return $this->public()->latest()->take(10)->get();
    }


    public function getRecentPastesOfCurrentUser()
    {
        if (auth()->user()) {
            $curUserId = auth()->user()->id;
            $pastesOfUser = $this->where('user_id', $curUserId)->latest()->take(10)->get();
            return $pastesOfUser;
        }
    }


    public function scopeAllOfCurrentUser($query)
    {
        if (auth()->user()) {
            $curUserId = auth()->user()->id;
            return $query->where('user_id', $curUserId);
        }
    }


    public function isExpired($paste)
    {
        if ($paste->expiration_time == Carbon::create(0)) {
            return false;
        } else if (Carbon::now()->diffInSeconds($paste->expiration_time, false) >= 0) {
            return false;
        } else return true;
    }


    public function isPrivate($paste)
    {
        if ($paste->access_type == 'private') {
            if (auth()->user() && $paste->user_id == auth()->user()->id) {
                return false;
            } else return true;
        }
    }





}
