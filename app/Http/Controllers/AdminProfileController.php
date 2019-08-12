<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class AdminProfileController extends Controller
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
    public function profile(Request $request, $id)
    {
       $admin = Admin::find($id);
       return view('administrateur.profile', compact('admin'));
    }



    public function edit(Request $request, $id)
    {

      $this->validate($request,[
          'name' => 'required|max:255',
          'prenom' => 'max:255',
          ]);


        $admin = Admin::find($id);
        $admin['name'] = $request['name'];
        $admin['prenom'] = $request['prenom'];

        $admin->save();

        return redirect()->back()->with('success','votre profile a été modifier avec succès!');
    }

    public function emailedit(Request $request, $id)
    {

        $this->validate($request,[
            'oldemail' => 'required|same:hiddenmail',
            'email' => 'required|unique:admins|min:5',
            'confirmemail'=> 'required|same:email'
            ]);

        $admin = Admin::find($id);
        $admin['email'] = $request['email'];

        $admin->save();

        return redirect()->back()->with('success','votre email a été modifier avec succès!');
    }

    public function pwdedit(Request $request, $id)
    {
        $admin = Admin::find($id);
        if (Hash::check($request['oldpwd'], $admin['password'])){

        $this->validate($request,[
            'pwd' => 'required|min:6',
            'confirmpwd'=> 'required|same:pwd'
            ]);
        $admin['password'] = Hash::make($request['pwd']);

        $admin->save();

        return redirect()->back()->with('success','votre mot de passe a été modifier avec succès!');

        } else {

            return redirect('/admin')->with('oups','Mot de passe incorrect!');
        }
    }

    public function imgedit(Request $request, $id)
    {

      $this->validate($request,[
          'image' => 'required|mimes:jpeg,png|max:10240',
          ]);


        $admin = Admin::find($id);



        //update image
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();

        //save image
        $request->file('image')->move("adm/assets/images/admin/",$imageName);
        $admin->image = $imageName;

        $admin->save();

        return redirect()->back()->with('success','votre image a été modifier avec succès!');
    }

    public function reseaux(Request $request, $id)
    {

      $this->validate($request,[
          'facebook' => 'max:255',
          'twitter' => 'max:255',
          'linkedin' => 'max:255',
          'googleplus' => 'max:255',
          ]);


        $admin = Admin::find($id);

        $admin['facebook'] = $request['facebook'];
        $admin['twitter'] = $request['twitter'];
        $admin['linkedin'] = $request['linkedin'];
        $admin['googleplus'] = $request['googleplus'];

        $admin->save();

        return redirect()->back()->with('success','votre profile a été modifier avec succès!');
    }

}
