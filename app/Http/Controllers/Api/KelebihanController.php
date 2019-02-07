<?php

namespace App\Http\Controllers\Api;

use App\Kelebihan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KelebihanCollection;
use App\Http\Resources\KelebihanItem;

class KelebihanController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return new KelebihanCollection(Kelebihan::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Kelebihan::rules(false));
        if (!Kelebihan::create($request->all())) {
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
     * @param  \App\Kelebihan  $kelebihan
     * @return \Illuminate\Http\Response
     */
    public function show(Kelebihan $kelebihan)
    {
        return new KelebihanItem($kelebihan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelebihan  $kelebihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelebihan $kelebihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelebihan  $kelebihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelebihan $kelebihan)
    {
        $this->validate($request, Kelebihan::rules(true, $kelebihan->id));
        if (!$kelebihan->update($request->all())) {
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
     * @param  \App\Kelebihan  $kelebihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelebihan $kelebihan)
    {
        if ($kelebihan->delete()) {
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
