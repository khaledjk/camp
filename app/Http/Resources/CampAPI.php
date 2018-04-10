<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CampAPI extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         return [
        'id' => $this->id,
        'food' => $this->food,
        'activities' => $this->activities,
        'learn' => $this->learn,
        'period_active' => $this->period_active,
        'period_sleep' => $this->period_sleep,
        'daily_date' => $this->daily_date,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
    ];
    }
}
