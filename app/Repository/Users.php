<?php

namespace App\Repository;

use App\User;
use Illuminate\Support\Facades\Cache;

class Users {

    CONST CACHE_KEY = 'USERS';

    public function all($orderBy = 'id')
    {
        $key = "all.{$orderBy}";
        $cacheKey = $this->getCacheKey($key);

        return Cache::remember($cacheKey, now()->addMinute(60), function () use($orderBy) {
            return User::orderBy($orderBy)->get();
        });
    }

    public function get($id)
    {
        $key = "get.{$id}";
        $cacheKey = $this->getCacheKey($key);

        return Cache::remember($cacheKey, now()->addMinute(30), function () use($id) {
            return User::find($id);
        });
    }

    public function getCacheKey($key)
    {
        $key = strtoupper($key);
        return self::CACHE_KEY . ".$key";
    }
}
