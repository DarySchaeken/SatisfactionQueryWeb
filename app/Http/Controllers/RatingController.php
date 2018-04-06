<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function create($location_id)
    {
        $location = \App\Location::find($location_id);
        return view("add-rating", ['location' => $location]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(['score' => 'required', 'comment' => 'required', 'location_id' => 'required']);
        $rating = new \App\Rating($data);
        $rating->save();
        return redirect('locations') -> with('token',$rating->updated_at);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $token = $_GET['token'];
        $rating = Rating::all()->where('updated_at', $token)->first();
        if($rating == null){
            return view('token-not-found');
        } else {
            $location = \App\Location::find($rating->location_id);
            return view('edit-rating',['rating' => $rating, 'location' => $location]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        var_dump($request);
        var_dump($id);
        $rating = Rating::find($id);
        $rating->comment = $request['comment'];
        $rating->score = $request['score'];
        $rating->save();
        return redirect('locations') -> with('token',$rating->updated_at);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ratings = Rating::all()->where('location_id', $id);
        foreach ($ratings as $rating) {
            $rating->delete();
        }
        return redirect()->route('locations.edit', [$id]);
    }

    public function destroy_id($id)
    {
      $rating = Rating::find($id);
      $loc_id = $rating->location_id;
      $rating->delete();
      if(Auth::check()){
          return redirect()->route('locations.edit', [$loc_id]);
      } else {
          return redirect('locations');
      }
    }
}
