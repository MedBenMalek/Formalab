<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Photo;

class photoCRUDController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $photo = Photo::orderBy('created_at')->get();
       return view('administrateur.galerie.index', compact('photo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photo = photo::all();
        return view('administrateur.galerie.create' , compact('photo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validate($request,[
          'image' => 'mimes:jpeg,png|max:10240'
          ]);

        $photo = new Photo();

        if(!empty($request['photo'])){

            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->file('photo')->move("adm/assets/images/galeries/",$imageName);
            $photo->photo = $imageName;
            $photo->save();

        }


        return redirect()->route('galerie.index')
        				->with('success','Image a été ajouter');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_photo)
    {

        $photo = Photo::find($id_photo);
        $imageName = $photo['photo'];
        unlink('adm/assets/images/galeries/'.$imageName);
        $photo->delete();

        return redirect()->back()->with('success','Image a été supprimer');
    }
}
