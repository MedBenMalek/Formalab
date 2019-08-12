<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Formateur;
use App\Formation;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Session;

class FormateurController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('formateur.indexFormateur');
    }

    public function profile(Request $request, $id)
    {
        $formateur = Formateur::find($id);
        return view('formateur.profile' , compact('formateur'));
    }

    public function edit(Request $request, $id)
    {

      $this->validate($request,[
          'name' => 'required|max:255',
          'prenom' => 'max:255',
          'skills' => 'max:255',
          'telephone' => 'max:255',
          'adresse' => 'max:255',
          ]);

        $formateur = Formateur::find($id);
        $formateur['name'] = $request['name'];
        $formateur['prenom'] = $request['prenom'];
        $formateur['skills'] = $request['skills'];
        $formateur['telephone'] = $request['telephone'];
        $formateur['adresse'] = $request['adresse'];

        $formateur->save();

        return redirect()->back()->with('success','votre profile a été modifier avec succès!');
    }

    public function infoedit(Request $request, $id)
    {
      $this->validate($request,[
          'presentation' => 'required',
          'experience' => 'required',
          'competence' => 'required',
          ]);

        $formateur = Formateur::find($id);
        $formateur['presentation'] = $request['presentation'];
        $formateur['experience'] = $request['experience'];
        $formateur['competence'] = $request['competence'];

        $formateur->save();

        return redirect()->back()->with('success','votre profile a été modifier avec succès!');
    }

    public function emailedit(Request $request, $id)
    {

        $this->validate($request,[
            'oldemail' => 'required|same:hiddenmail',
            'email' => 'required|unique:formateurs|min:5',
            'confirmemail'=> 'required|same:email'
            ]);

        $formateur = Formateur::find($id);
        $formateur['email'] = $request['email'];

        $formateur->save();

        return redirect()->back()->with('success','votre email a été modifier avec succès!');
    }

    public function pwdedit(Request $request, $id)
    {

        $formateur = Formateur::find($id);
        if (Hash::check($request['oldpwd'], $formateur['password'])){

        $this->validate($request,[
            'pwd' => 'required|min:6',
            'confirmpwd'=> 'required|same:pwd'
            ]);
        $formateur['password'] = Hash::make($request['pwd']);

        $formateur->save();

        return redirect()->back()->with('success','votre mot de passe a été modifier avec succès!');

        } else {

            return redirect('/formateur')->with('oups','mot de passe incorrect!');
        }

    }

    public function imgedit(Request $request, $id)
    {

      $this->validate($request,[
          'image' => 'required|mimes:jpeg,png|max:10240',
          ]);


        $formateur = Formateur::find($id);

        //update image
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();

        //save image
        $request->file('image')->move("adm/assets/images/formateur/",$imageName);
        $formateur->image = $imageName;

        $formateur->save();

        return redirect()->back()->with('success','votre image a été modifier avec succès!');
    }

    public function reseaux(Request $request, $id)
    {
        $formateur = Formateur::find($id);

        $formateur['facebook'] = $request['facebook'];
        $formateur['twitter'] = $request['twitter'];
        $formateur['linkedin'] = $request['linkedin'];
        $formateur['googleplus'] = $request['googleplus'];

        $formateur->save();

        return redirect()->back()->with('success','votre profile a été modifier avec succès!');
    }

    public function calendrierformateur(){

        $id =  Auth::user()->id;

        $data = Formation::where('id_formateur', '=' , $id)->get(['title', 'start','url', 'color']);

        return Response()->json($data);
    }

}
