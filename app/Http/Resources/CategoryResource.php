<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;


class CategoryResource extends JsonResource
{
    /**
     * @var mixed
     */
    private $name;
    private $id;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "name"=>$this->name
        ];

    }
    public function index()
    {
        return  CategoryResource::collection(Category::all());
    }

}
