<?php

namespace App\Http\Controllers\Api;

use App\Slideshow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SlideshowCollection;
use App\Http\Resources\SlideshowItem;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SlideshowCollection(Slideshow::get());
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
        $this->validate($request, Slideshow::rules(false));
        if (!Slideshow::create($request->all())) {
            return [
                'message' => 'Bad Request',
                'code' => 400,
            ];
        } else {
            return [
                'message' => 'OK',
                'code' => 200,
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function show(Slideshow $slideshow)
    {
        return new SlideshowItem($slideshow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function edit(Slideshow $slideshow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slideshow $slideshow)
    {
        $this->validate($request, Slideshow::rules(true, $slideshow->id));
        if (!$slideshow->update($request->all())) {
            return [
                'message' => 'Bad Request',
                'code' => 400,
            ];
        } else {
            return [
                'message' => 'OK',
                'code' => 201,
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slideshow $slideshow)
    {
        if ($slideshow->delete()) {
            return [
                'message' => 'OK',
                'code' => 204,
            ];
        } else {
            return [
                'message' => 'Bad Request',
                'code' => 400,
            ];
        }
    }
}
