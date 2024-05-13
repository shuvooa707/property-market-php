<?php

namespace App\Service;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;

class CompanyService
{
    /**
     * @args void
     * @param int $paginate
     * @return array|Collection
     */
    public function getActiveProperties($paginate = -1)
    {
        if ($paginate > 0) {
            $properties = Property::where([
                "status" => "public"
            ])->paginate($paginate);
        } else {
            $properties = Property::where([
                "status" => "public"
            ])->get();
        }

        return $properties;
    }

    /**
     * @args void
     * @return array|Collection
     */
    public function getProperties($paginate = -1)
    {
        if ($paginate > 0) {
            $properties = Property::paginate($paginate);
        } else {
            $properties = Property::get();
        }

        return $properties;
    }
}