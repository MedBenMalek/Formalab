<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Formateur;
use App\Formation;
use App\Actualite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\ConfirmationFormateur;
use Illuminate\Support\Facades\Validator;
use Session;



class formateursCRUDController extends Controller
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
       $formateurs = Formateur::orderBy('created_at')->get();
       $i = 0;
       return view('administrateur.formateursCRUD.index', compact('formateurs','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pwd = str_random(8);
        $formateurs = Formateur::all();
        return view('administrateur.formateursCRUD.create' , compact('formateurs', 'pwd'));
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
            'name' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|unique:formateurs',
            'password' => 'required|min:6',


            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }


        $formateur = new Formateur();
        $formateur['name'] = $request['name'];
        $formateur['prenom'] = $request['prenom'];
        $formateur['email'] = $request['email'];
        $formateur['password'] = Hash::make($request['password']);

        $formateur['confirmation_token'] = str_replace('/','',bcrypt(str_random(16)));

        //$image = $request->file('image');
        //$imageName = $image->getClientOriginalName();
        //$request->file('image')->move("adm/assets/images/formateur/",$imageName);
        //$formateur->image = $imageName;

        $formateur->save();

        $pwd = $request['password'];
        
        $formateur->notify(new ConfirmationFormateur($pwd));

        session::flash('success','Un nouvelle formateur a été ajouter avec succès');


        return redirect()->route('formateurs.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $formateur = Formateur::find($id);
        return view('administrateur.formateursCRUD.edit', compact('formateur'));
    }

 public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
            'name' => 'required|max:255',
            'prenom' => 'required|max:255',
            'skills' => 'required|max:255',
            'telephone' => 'required|min:8|max:20',
            'adresse' => 'required|max:255',


            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

        $formateur = Formateur::find($id);
        $formateur['name'] = $request['name'];
        $formateur['prenom'] = $request['prenom'];
        $formateur['skills'] = $request['skills'];
        $formateur['telephone'] = $request['telephone'];
        $formateur['adresse'] = $request['adresse'];

        $formateur->save();

        return redirect()->back()->with('success','profile de formateur a été mofidier avec succès');
    }

    public function emailupdate(Request $request, $id)
    {

        $this->validate($request,[
            'email' => 'required|unique:formateurs|min:5',
            'confirmemail'=> 'required|same:email'
            ]);

        $formateur = Formateur::find($id);
        $formateur['email'] = $request['email'];

        $formateur->save();

        return redirect()->back()->with('success','profile de formateur a été mofidier avec succès');
    }

    public function pwdupdate(Request $request, $id)
    {
        $formateur = Formateur::find($id);

        $this->validate($request,[
            'pwd' => 'required|min:6',
            'confirmpwd'=> 'required|same:pwd'
            ]);
        $formateur['password'] = Hash::make($request['pwd']);

        $formateur->save();

        return redirect()->back()->with('success','profile de formateur a été mofidier avec succès');

    }

    public function imgupdate(Request $request, $id)
    {
        $formateur = Formateur::find($id);

        //update image
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();

        //save image
        $request->file('image')->move("adm/assets/images/formateur/",$imageName);
        $formateur->image = $imageName;

        $formateur->save();

        return redirect()->back()->with('success','profile de formateur a été mofidier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_formateur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $formateur = Formateur::find($id);
      $formations = Formation::where('id_formateur',$id)->get();
      $actualites =Actualite::where('id_formateur',$id)->get();
    
      foreach ($formations as $formation){
          $formation->id_formateur = 1;
          $formation->save();
      }

      foreach ($actualites as $actualite){
          $actualite->id_formateur = 1;
          $actualite->save();
      }

        //$imageName = $formateur['image'];
        //unlink('adm/assets/images/formateur/'.$imageName);

        $formateur->delete();

        return redirect()->route('formateurs.index')
                        ->with('success','formateur a été supprimer avec succès');


    }
}
