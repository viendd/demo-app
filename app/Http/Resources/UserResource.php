<?php
namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'phone' => $this->phone,
            'type' => $this->type,
            'name_type' => User::typeUsers()[$this->type]
        ];
    }
}
