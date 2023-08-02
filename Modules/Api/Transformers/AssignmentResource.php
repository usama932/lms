<?php

namespace Modules\Api\Transformers;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        // dd(@$this->course->instructor->instructor->designation);
        $dateTime = Carbon::parse($this->deadline);
        return [
            'id' => @$this->id,
            "title" => @$this->title,
            "details" => @$this->details,
            "note" => @$this->note,
            "course_title" => @$this->course->title,
            "marks" => @$this->marks,
            "deadline_date" => showDate(@$this->deadline),
            "deadline_time" => $dateTime->format('H:iA'),
            "status" => @$this->submit()->value('is_submitted') == 11 ? 'Submitted' : (date('Y-m-d H:i:s') > @$this->deadline ? 'Expired' : 'Not Submitted'),
            "instructor" =>[
                "name" =>  @$this->course->instructor->name,
                "image" =>  showImage(@$this->course->instructor->image->original, 'default-1.jpeg'),
                "designation" =>  @$this->course->instructor->instructor->designation,
            ],
        ];
    }
}
