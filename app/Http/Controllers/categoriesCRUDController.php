<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categorie;
use App\Formation;
use Illuminate\Support\Facades\Validator;
use Session;

class categoriesCRUDController extends Controller
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
       $categories = categorie::orderBy('created_at')->get();
       $i = 0;
       return view('administrateur.categoriesCRUD.index', compact('categories','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('administrateur.categoriesCRUD.create' , compact('categories'));
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
            'titre_categorie' => 'required|max:255',
            'description_categorie' => 'required',
            'image' => 'mimes:jpeg,png|max:10240'

            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

        $categorie = new Categorie();

        $categorie['titre_categorie'] = $request['titre_categorie'];
        $categorie['description_categorie'] = $request['description_categorie'];


        $image = $request->file('image_categorie');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->file('image_categorie')->move("adm/assets/images/categorie/",$imageName);
        $categorie->image_categorie = $imageName;


        $categorie->save();

        session::flash('success','Votre categorie a été crée avec succès');

        return redirect()->route('categories.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id_categorie)
    {
        $categorie = categorie::find($id_categorie);
        return view('administrateur.categoriesCRUD.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_categorie)
    {

         $validator = Validator::make($request->all(),
            [
            'titre_categorie' => 'required|max:255',
            'description_categorie' => 'required',
            'image' => 'mimes:jpeg,png|max:10240'

            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

        $categorie = Categorie::find($id_categorie);
        $categorie['titre_categorie'] = $request['titre_categorie'];
        $categorie['description_categorie'] = $request['description_categorie'];

        if(!empty($request['image_categorie'])){

            //delete image
            $imageName = $categorie['image_categorie'];
            unlink('adm/assets/images/categorie/'.$imageName);

            //update image
            $image = $request->file('image_categorie');
            $imageName = time().'.'.$image->getClientOriginalExtension();

            $request->file('image_categorie')->move("adm/assets/images/categorie/",$imageName);
            $categorie->image_categorie = $imageName;

        }
            $categorie->save();

            session::flash('success','Votre categorie a été modifier avec succès');

            return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_categorie)
    {

        $formations = Formation::get();
        $categorie = Categorie::find($id_categorie);
        $test = 'non';
        foreach ($formations as $formation){
          if ($formation->id_categorie == $id_categorie){
            $test = 'oui';
            return back()->with('oups','vous ne pouver pas supprimer cette categorie car elle possède encore des formations');
          }
        }
        if ($test == 'non'){
            $imageName = $categorie['image_categorie'];
            unlink('adm/assets/images/categorie/'.$imageName);
            $categorie->delete();

            return redirect()->route('categories.index')
            				->with('success','Votre categorie a été supprimer avec succès');
        }
    }
}
