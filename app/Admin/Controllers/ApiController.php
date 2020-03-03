<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Metro;
use App\Models\Company;
class ApiController extends Controller
{
    
    
    public function cities(Request $request)
    {
        $q = $request->get('q');

        return City::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
    }

    public function metro(Request $request)
    {
        $q = $request->get('q');

        return Metro::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
    }

    public function company(Request $request)
    {
        $q = $request->get('q');

        return Company::where('title', 'like', "%$q%")->paginate(null, ['id', 'title as text']);
    }
}
