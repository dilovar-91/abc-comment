<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Review;
use App\Models\Blog;
use Spatie\SchemaOrg\Schema;
use SEO;
use SEOMeta;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');        
        $type = $request->input('type');      
        $page = $request->input('page');  
        $city_id = $request->input('city_id');
        $metro_id = $request->input('metro_id');
        $companies = Company::title($search)->city($city_id)->metro($metro_id)->with('metro', 'city')       
        ->withCount(['reviews as avg_rating' => function($query) {
        $query->select(DB::raw('avg(rating)'));
        $query->where('published', '=', 1);
    }])
    ->withCount(['reviews as review_count' => function($query) {
        $query->where('published', 1);    
    }])             
    ->paginate(12);    
        SEO::setDescription("Отзывы, рейтинги салонов");
        SEOMeta::addKeyword(["Отзывы, официальные дилеры, дилеры, обман"]);            
        $searchbar = true;
        return view('search', compact('companies', 'type', 'search', 'city_id'));
    }

    public function show($id){
          
        //$company = Company::whereNull('companies.deleted_at')->with('reviews', 'reviews.company_id', '=', 'companies.id')->where('reviews.published', 1)->select('companies.*', DB::raw('CAST(AVG(rating) as UNSIGNED) as rating_average'))->groupBy('id')->orderBy('rating_average', 'DESC')->findorfail($id);
        //$company = Company::whereNull('companies.deleted_at')->with('reviews')->select('companies.*', DB::raw('CAST(AVG(rating) as UNSIGNED) as rating_average'))->groupBy('id')->orderBy('rating_average', 'DESC')->findorfail($id);
        $company = Company::whereNull('deleted_at')->findorfail($id);
       
        if (isset ($company)) {
            SEO::setDescription('Отзывы, обзоры о '. $company->title );
            SEOMeta::addKeyword([$company->keywords]);
            SEO::opengraph()->addProperty('type', 'review');
            $reviews = Review::all()->where('company_id', $id)->where('published', '1')->sortByDesc('created_at');
            $avg_rating = $company->reviews()->where('published', 1)->avg('rating');             
            $localBusiness = Schema::localBusiness()
                ->name("Отзывы ". $company->title)
                ->email($company->email)
                ->address($company->adress)
                ->telephone($company->tell)
                ->aggregateRating($company->rating_average)
                ->priceRange("120000 - 2 200000")
                ->image(url('/images/company/' .$company->pictures[0]))
                ->contactPoint(Schema::contactPoint('ContactPoint')->contactType('customer service ')->areaServed('RU')->url($company->website))
                ->openingHoursSpecification(Schema::openingHoursSpecification('openingHoursSpecification')->dayOfWeek(["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"] )->opens("09:00")->closes("21:00")
                    );            
            return view('company.detail', compact('company', 'reviews', 'localBusiness', 'avg_rating'));
        }

        else abort(404);
        
    }


    
}
