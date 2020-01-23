<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class Review extends JsonResource
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
            'company_id' => $this->company_id,
            'author' => $this->author,
            'rating' => $this->rating,
            'text' => $this->text,
            'created_at' => $this->created_at,
            'email' => $this->email,
            //'tell' => $this->email,
            //'created_at' => $this->created_at,
        ];
    }
}