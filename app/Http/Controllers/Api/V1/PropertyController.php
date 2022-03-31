<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends ApiController
{
    public function index() 
    {
        $properties = Property::paginate(10);

        return $this->sendResponse('Property found', $properties);
    }

    public function filter(Request $request)
    {
        $query = Property::query();

        $query->when($request->id, function($query) use ($request) {
            $query->where('id', $request->id);
        });

        $query->when($request->name, function($query) use ($request) {
            $query->orWhere('name', 'like', "%{$request->name}%");
        });

        $query->when($request->features, function($query) use ($request) {
            $query->orWhereHas('features', function($query) use ($request) {
                $query->WhereIn('features.id', $request->features);
            });
        });

        if ( !$properties = $query->get() ) {
            return $this->sendError('Property not found');
        }

        return $this->sendResponse('Property found', $properties);
    }
}
