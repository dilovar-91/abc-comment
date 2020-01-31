<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Blog;
use SEO;
use SEOMeta;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$companies =  Company::whereNull('deleted_at')->where('active', '1')->with('metro')->with('city')->paginate(12); 
        //$companies = $this->getTopRating('desc');
        $type = $request->input('type');        
        $page = $request->input('page');  
        $sort = $request->input('sort');        
        $order = "";
        switch ($sort) {
            case 'rating':
                $order = ['avg_rating', 'desc'];
                break;
            case 'name':
                $order = ['title', 'asc'];
                break;
            case 'name-desc':
                $order = ['title', 'desc'];
                break;
            case 'comments':
                $order = ['review_count', 'desc'];
                break;
            default: $order = ['avg_rating', 'desc'];
        }
        //echo dd($order);
        $articles = Blog::where('published', '1')->paginate(3);
        $companies = Company::with('metro', 'city')
        ->withCount(['reviews as avg_rating' => function($query) {
        $query->select(DB::raw('avg(rating)'));
        $query->where('published', '=', 1);
    }])
    ->withCount(['reviews as review_count' => function($query) {
        $query->where('published', 1);    
    }])
    ->orderBy(...$order)     
    ->paginate(12);    
        SEO::setDescription("Отзывы, рейтинги салонов");
        SEOMeta::addKeyword(["Отзывы, официальные дилеры, дилеры, обман"]);            
        $searchbar = true;        
        return view('index', compact('companies', 'articles', 'type', 'sort'));
        
    }

    public function getTopRating($order='asc'){
        return	$Ratings = \DB::table('companies')
            ->join('reviews', 'companies.id', '=', 'reviews.dealer_id')
            ->join('cities', 'companies.city_id', '=', 'cities.id')
            ->join('metro', 'companies.metro_id', '=', 'metro.id')
            ->select('companies.id')
            ->selectRaw('companies.title')
            ->selectRaw('companies.description')
            ->selectRaw('companies.adress')
            ->selectRaw('companies.tell')
            ->selectRaw('companies.pictures')
            ->selectRaw('companies.website')
            ->selectRaw('companies.email')
            ->selectRaw('metro.name as metro')
            ->selectRaw('cities.name as city')
            ->selectRaw('AVG(reviews.rating) AS average_rating')
                ->where('reviews.published', '1')
            ->groupBy('companies.id')
            ->havingRaw('AVG(reviews.rating) >= ?', [0])
            ->havingRaw('AVG(reviews.rating) <= ?', [5])        
            ->orderBy('average_rating', $order)            
            ->paginate(12);        
        }


    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
    
    public function rules()
    {
        return view('rules');
    }
    
}
