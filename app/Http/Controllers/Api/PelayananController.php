<?php

namespace App\Http\Controllers\Api;

use App\Pelayanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PelayananCollection;
use App\Http\Resources\PelayananItem;

class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PelayananCollection(Pelayanan::get());
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
        $this->validate($request, Pelayanan::rules(false));
        if (!Pelayanan::create($request->all())) {
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
     * @param  \App\Pelayanan  $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelayanan $pelayanan)
    {
        return new PelayananItem($pelayanan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelayanan  $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelayanan $pelayanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelayanan  $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelayanan $pelayanan)
    {
        $this->validate($request, Pelayanan::rules(true, $pelayanan->id));
        if (!$pelayanan->update($request->all())) {
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
     * @param  \App\Pelayanan  $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelayanan $pelayanan)
    {
        if ($pelayanan->delete()) {
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
