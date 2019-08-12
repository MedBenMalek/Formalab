<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actualite;
use App\Admin;
use App\Formateur;
use Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use Purifier;

class actualitesCRUDController extends Controller
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
    public function index()
    {
        $actualites = Actualite::with('formateur' ,'admin')->where('etat','active')->orderBy('created_at')->get();

        $i = 0;
        return view('administrateur.actualitesCRUD.index', compact('actualites','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actualites = Actualite::all();
        return view('administrateur.actualitesCRUD.create' , compact('actualites'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(),
            [
            'titre_actualite' => 'required|max:255',
            'description_actualite' => 'required',
            'image' => 'mimes:jpeg,png|max:10240'

            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $actualite = new Actualite();

        $actualite['titre_actualite'] = $request['titre_actualite'];
        $actualite['description_actualite'] = Purifier::clean($request['description_actualite']);
        $actualite['id_admin'] = Auth::user()->id;


        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->file('image')->move("adm/assets/images/actualite/",$imageName);
        $actualite->image = $imageName;


        $actualite->save();

        session::flash('success','Votre actualité a été crée avec succès');


        return redirect()->route('actualites.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_actualite
     * @return \Illuminate\Http\Response
     */
    public function edit($id_actualite)
    {
        $actualite = Actualite::find($id_actualite);
        return view('administrateur.actualitesCRUD.edit', compact('actualite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_actualite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_actualite)
    {
        $validator = Validator::make($request->all(),
            [
            'titre_actualite' => 'required|max:255',
            'description_actualite' => 'required',
            'image' => 'mimes:jpeg,png|max:10240'

            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

        $actualite = Actualite::find($id_actualite);
        $actualite['titre_actualite'] = $request['titre_actualite'];
        $actualite['description_actualite'] = Purifier::clean($request['description_actualite']);

        if(!empty($request['image'])){

            //delete image
            $imageName = $actualite['image'];
            unlink('adm/assets/images/actualite/'.$imageName);

            //update image
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();

            $request->file('image')->move("adm/assets/images/actualite/",$imageName);
            $actualite->image = $imageName;

            }

            $actualite->save();
            session::flash('success','Votre actualité a été modifier avec succès');
            return redirect()->route('actualites.index');
    }

    public function archive()
    {
        $actualites = Actualite::with('formateur' ,'admin')->where('etat','archiver')->orderBy('id_actualite','DESC')->get();

        $i = 0;
        return view('administrateur.actualitesCRUD.archive', compact('actualites','i'));
    }

    public function archiver($id)
    {
        $actualites = Actualite::find($id);
        $actualites['etat'] = 'archiver';
        $actualites->save();

        return back()->with('success','Votre actualité a été archiver avec succès');
    }

    public function activer($id)
    {
        $actualites = Actualite::find($id);
        $actualites['etat'] = 'active';
        $actualites->save();

        return back()->with('success','Votre actualité a été activer avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_actualite
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_actualite)
    {

      	$actualite = Actualite::find($id_actualite);
        $imageName = $actualite['image'];
        unlink('adm/assets/images/actualite/'.$imageName);

        $actualite->delete();

        return redirect()->route('actualites.index')
                        ->with('success','Votre actualité a été supprimer avec succès');
    }
}
