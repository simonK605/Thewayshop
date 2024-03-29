<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Models
use App\Models\Team;

class TeamController extends Controller
{
    public $data;
    public $img;

    public function setData($data){
        $this->data = $data;
    }

    public function __construct(){
        $data = Team::paginate(10);
        $this->setData($data);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.team.team', ['data' => $this->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('img')->store('team');
        Team::insert([
            'name_en' => $request->nameEn,
            'name_ru' => $request->nameRu,
            'position_en' => $request->positionEn,
            'position_ru' => $request->positionRu,
            'img' => $path,
            'description_en' => $request->descriptionEn,
            'description_ru' => $request->descriptionRu,
        ]);
        return redirect(route('team.index'));
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
        $item = Team::findorFail($id);
        return view('admin.team.update', [
            'item' => $item,
        ]);
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
        $img = $request->imgHid;
        if(!empty($request->img)){
            Storage::delete($request->imgHid);
            $img = $request->file('img')->store('team');
        }
        $item = Team::findorFail($id);
        $item->update([
            'name_en' => $request->nameEn,
            'name_ru' => $request->nameRu,
            'position_en' => $request->positionEn,
            'position_ru' => $request->positionRu,
            'img' => $img,
            'description_en' => $request->descriptionEn,
            'description_ru' => $request->descriptionRu
        ]);
        return redirect(route('team.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Team::findorFail($id);
        $img = $item->img;
        $item->delete();
        Storage::delete($img);
        return redirect(route('team.index'));
    }
}
