<?php

namespace App\Http\Controllers\Api;

use App\Teknologi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeknologiCollection;
use App\Http\Resources\TeknologiItem;

class TeknologiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TeknologiCollection(Teknologi::get());
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
        $this->validate($request, Teknologi::rules(false));
        if (!Teknologi::create($request->all())) {
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
     * @param  \App\Teknologi  $teknologi
     * @return \Illuminate\Http\Response
     */
    public function show(Teknologi $teknologi)
    {
        return new TeknologiItem($teknologi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teknologi  $teknologi
     * @return \Illuminate\Http\Response
     */
    public function edit(Teknologi $teknologi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teknologi  $teknologi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teknologi $teknologi)
    {
        $this->validate($request, Teknologi::rules(true, $teknologi->id));
        if (!$teknologi->update($request->all())) {
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
     * @param  \App\Teknologi  $teknologi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teknologi $teknologi)
    {
        if ($teknologi->delete()) {
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
