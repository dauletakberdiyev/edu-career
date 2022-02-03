<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;


class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $response = parent::toArray($request);
        foreach($response['data'] as $key => $value) {
            $response['data'][$key]['created_at'] = Carbon::parse($value['created_at'])->format('d/m/Y');
            $response['data'][$key]['updated_at'] = Carbon::parse($value['updated_at'])->format('d/m/Y');
        }
        
        return $response;
    }
}
