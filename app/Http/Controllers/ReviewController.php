<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getrating($id){
        $data = Review::all()->where('dealer_id', $id)->where('published', '1');
        
        if (count($data)>0){
            return ReviewResource::collection($data);
        }
        else return Null;
    }

    public function setrating(Request $request){        
        $Review  = new Review; 
        $Review->company_id = $request->post('company_id');
        $Review->author = $request->post('author');
        $Review->rating = $request->post('rating');
        $Review->text = $request->post('text');
        $Review->title = $request->post('title');
        if ($request->post('rating')>=0 && $request->post('rating')<=3) {
            $Review->type=0;
        }
        else  $Review->type = 1;       
        $Review->save();
        return response()->json($Review, 201);
    }
    public function getReviews($id)
    {
         
    //return response(->toArray(), Response::HTTP_OK);
   // return Review::all()->where('dealer_id', $id)->where('published', '1')->json();
    return ReviewResource::collection(Review::all()->where('dealer_id', $id)->where('published', '1'));
    }

    public function getlatestReviews($limit=5)
    {        
        return ReviewResource::collection(Review::all()->where('deleted_at', '=','')->where('published', '1')->sortByDesc('created_at')->get());
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
