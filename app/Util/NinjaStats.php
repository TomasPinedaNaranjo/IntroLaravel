<?php

namespace App\Util;

use App\Models\Ninja;

class NinjaStats
{
    public static function getStats()
    {
        $stats = Ninja::select('aldea', \DB::raw('count(*) as total'), \DB::raw('sum(chakra) as total_chakra'))
            ->groupBy('aldea')
            ->get();

        $totalChakra = Ninja::sum('chakra');

        return [
            'stats' => $stats,
            'totalChakra' => $totalChakra,
        ];
    }
}
