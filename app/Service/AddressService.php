<?php

namespace App\Service;

use App\Models\Address;
use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;

class AddressService
{
    /**
     * @args void
     * @param int $paginate
     * @return array|Collection
     */
    public function getActiveAddress($paginate = -1)
    {
        if ($paginate > 0) {
            $address = Address::where([
                "status" => "public"
            ])->paginate($paginate);
        } else {
            $address = Address::where([
                "status" => "public"
            ])->get();
        }

        return $address;
    }

    /**
     * @args void
     * @return array|Collection
     */
    public function getAddress($paginate = -1)
    {
        if ($paginate > 0) {
            $address = Address::paginate($paginate);
        } else {
            $address = Address::get();
        }

        return $address;
    }
}