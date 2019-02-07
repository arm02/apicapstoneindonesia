<?php

namespace App\Http\Controllers\Api;

use App\About2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\About2Collection;
use App\Http\Resources\About2Item;

class About2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new About2Collection(About2::get());
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
        $this->validate($request, About2::rules(false));
        if (!About2::create($request->all())) {
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
     * @param  \App\About2  $about2
     * @return \Illuminate\Http\Response
     */
    public function show(About2 $about2)
    {
        return new About2Item($about2);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About2  $about2
     * @return \Illuminate\Http\Response
     */
    public function edit(About2 $about2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About2  $about2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About2 $about2)
    {
        $this->validate($request, About2::rules(true, $about2->id));
        if (!$about2->update($request->all())) {
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
     * @param  \App\About2  $about2
     * @return \Illuminate\Http\Response
     */
    public function destroy(About2 $about2)
    {
        if ($about2->delete()) {
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
