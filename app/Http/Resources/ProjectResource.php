<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'due_date' => $this->due_date?->format('Y-m-d'),
            'image_path' => $this->image_path,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d'),
            'creatrd_by' => new UserResource($this->createdBy),
            'updated_by' => new UserResource($this->updatedBy)
            // Conditionally include relationships
            // 'tasks' => TaskResource::collection(
            //     $this->whenLoaded('tasks')
            // ),

            // Computed or custom fields
            //'is_overdue' => $this->due_date?->isPast() ?? false,
        ];
    }
}
