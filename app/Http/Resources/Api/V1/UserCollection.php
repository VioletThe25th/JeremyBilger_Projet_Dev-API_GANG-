<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    // Permet de wrapper le retour dans un attribut user au lieu de data
    // public static $wrap = 'user';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return [
        //     'data' => $this->collection,
        //     'test' => 'test'
        // ];

        return $this->collection;
    }
}
