<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\Welcom;
use App\Models\education;
use App\Models\exp;
use App\Models\Image;
use App\Models\info;
use App\Models\Language;
use App\Models\level;
use App\Models\Profile;
use App\Models\skill;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class BackController extends Controller
{
    public function usercv(){
        return view('backend.basicinfo');
      }
      public function logout(Request $request)
      {
          Auth::guard('web')->logout();
  
          $request->session()->invalidate();
  
          $request->session()->regenerateToken();
  
          return redirect('/login');
      }

      public function saveinfo(Request $request)
      { 


        info::insert([
          'user_id'=>Auth::user()->id,
          'name'=>$request->name,
          'email'=>$request->email,
          'phone'=>$request->phone,
          'address'=>$request->address,
          'city'=>$request->city,
      ]);

      
      $notif=array(
        'message'=>'basic info inserted successfully',
        'alert-type'=>'success',
                );
        
                return redirect()->route('profile')->with($notif);
      
      
      }

      public function editinfo(){
        $info=info::where('user_id',Auth::user()->id)->first();
        return view('backend.editinfo',compact('info'));
      }

      public function updateinfo(Request $request){
        $id=$request->id;

        info::FindOrFail($id)->update([
          'user_id'=>Auth::user()->id,
          'name'=>$request->name,
          'email'=>$request->email,
          'phone'=>$request->phone,
          'address'=>$request->address,
          'city'=>$request->city,
      ]);
      $notif=array(
'message'=>'basic info updated successfully',
'alert-type'=>'success',
      );

      return redirect()->back()->with($notif);

      }
      public function profile(){
        return view('backend.profile');
      }
      public function saveprofile(Request $request)
      {
        Profile::insert([
            'user_id'=>Auth::user()->id,
            'desc'=>$request->desc,
        ]);
        $notif=array(
'message'=>'profile inserted successfully',
'alert-type'=>'success',
        );

        return redirect()->route('user.skill')->with($notif);
      }

      public function editprofile(){
        $profile=Profile::where('user_id',Auth::user()->id)->first();
        return view('backend.editprofile',compact('profile'));
      }

      public function updateprofile(Request $request){
        $id=$request->id;

        profile::FindOrFail($id)->update([
          'user_id'=>Auth::user()->id,
          'desc'=>$request->desc,

      ]);
      $notif=array(
'message'=>'profileupdated successfully',
'alert-type'=>'success',
      );

      return redirect()->back()->with($notif);


    }

    public function userskill(){
      return view('backend.skill');
    }

    public function saveskill(Request $request)
    {
      skill::insert([
          'user_id'=>Auth::user()->id,
          'skills'=>$request->skill,
      ]);
      $notif=array(
'message'=>'skills inserted successfully',
'alert-type'=>'success',
      );

      return redirect()->route('user.edu')->with($notif);
    }

    public function editskill(){

      $skill=skill::where('user_id',Auth::user()->id)->first();
      $skillname=$skill->skills;
      $skills=explode(',',$skillname);
      return view('backend.editskill',compact('skillname','skill'));
    }

    public function updateskill(Request $request){
      $id=$request->id;
      skill::FindOrFail($id)->update([
        'user_id'=>Auth::user()->id,
        'skills'=>$request->skill,

    ]);
    $notif=array(
'message'=>'profileupdated successfully',
'alert-type'=>'success',
    );

    return redirect()->back()->with($notif);

    }

    public function useredu(){
      $level=level::get();
      return view('backend.useredu',compact('level'));
    }

    public function saveedu(Request $request){
      education::insert([
        'user_id'=>Auth::user()->id,
        'eduname'=>$request->eduname,
        'startdate'=>$request->startdate,
        'enddate'=>$request->enddate,
        'level_id'=>$request->level_id,
        'desc'=>$request->desc,
        'field'=>$request->field,
    ]);
    $notif=array(
'message'=>'eduction inserted successfully',
'alert-type'=>'success',
    );

    return redirect()->back()->with($notif);

    }

    public function editedu(){
      $edu=education::where('user_id',Auth::user()->id)->get();
      return view('backend.editedu',compact('edu'));
    }
    
    
    public function editeducation($id){
      $level=level::get();
      $edu=education::where('id',$id)->first();
      return view('backend.editeducation',compact('edu','level'));
    } 

    public function updateedu(Request $request){
      $id=$request->id;
      education::FindOrFail($id)->update([
        'user_id'=>Auth::user()->id,
        'eduname'=>$request->eduname,
        'startdate'=>$request->startdate,
        'enddate'=>$request->enddate,
        'level_id'=>$request->level_id,
        'desc'=>$request->desc,
        'field'=>$request->field,
    ]);
    $notif=array(
'message'=>'eduction updated successfully',
'alert-type'=>'success',
    );

    return redirect()->route('edit.edu')->with($notif);

    }
    
    public function deleteeducation($id){
      education::FindOrFail($id)->delete();
      $notif=array(
        'message'=>'eduction updated successfully',
        'alert-type'=>'success',
            );
        
            return redirect()->route('edit.edu')->with($notif);


    }

    public function userexp(){
      return view('backend.userexp');
    }
  
    public function saveexp(Request $request){
      exp::insert([
        'user_id'=>Auth::user()->id,
        'exp'=>$request->exp,
        'startdate'=>$request->startdate,
        'enddate'=>$request->enddate,
        'comp_name'=>$request->comp_name,
        'comp_desc'=>$request->comp_desc,
    ]);
    $notif=array(
  'message'=>'experiance inserted successfully',
  'alert-type'=>'success',
    );
  
    return redirect()->back()->with($notif);
  
    }
    public function editexp(){
      $exp=exp::where('user_id',Auth::user()->id)->get();
      return view('backend.editexp',compact('exp'));
    }
  
    public function editexperiance($id){
      $exp=exp::where('id',$id)->first();
      return view('backend.editexperiance',compact('exp'));
    }
  
    public function updateexp(Request $request){
      $id=$request->id;
      exp::FindOrFail($id)->update([
        'user_id'=>Auth::user()->id,
        'exp'=>$request->exp,
        'startdate'=>$request->startdate,
        'enddate'=>$request->enddate,
        'comp_name'=>$request->comp_name,
        'comp_desc'=>$request->comp_desc,
    ]);
    $notif=array(
  'message'=>'experiance updated successfully',
  'alert-type'=>'success',
    );
  
    return redirect()->route('edit.exp')->with($notif);
  
    }
    public function deleteexp($id){
      exp::FindOrFail($id)->delete();
      $notif=array(
        'message'=>'experiance updated successfully',
        'alert-type'=>'success',
            );
        
            return redirect()->route('edit.exp')->with($notif);
  
  
    }

    public function userlanguage(){
      return view('backend.languages');
    }

    public function savelanguage(Request $request){
      Language::insert([
        'user_id'=>Auth::user()->id,
        'language'=>$request->skill,
    ]);
    $notif=array(
'message'=>'languages inserted successfully',
'alert-type'=>'success',
    );

    return redirect()->route('user.image')->with($notif);
    }

    public function editlanguage(){

      $language=Language::where('user_id',Auth::user()->id)->first();
      $languagename=$language->language;
      $languages=explode(',',$languagename);
      return view('backend.editlang',compact('languagename','language'));
      
    }

    public function updatelanguage(Request $request){
      $id=$request->id;
      Language::FindOrFail($id)->update([
        'user_id'=>Auth::user()->id,
        'language'=>$request->language,

    ]);
    $notif=array(
'message'=>'profileupdated successfully',
'alert-type'=>'success',
    );

    return redirect()->back()->with($notif);

    }

    public function userimage(){
      return view('backend.userimage');
    }

    public function saveimage(Request $request){
$filpath=public_path('uploads');
      if($request->file('img')){
        $img=$request->file('img');
        $img_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        
        $img->move($filpath,$img_name);
        $url ='uploads/'.$img_name;
        Image::insert([
          'user_id'=>Auth::user()->id,
          'image'=>$url
      ]);
      $notif=array(
  'message'=>'image inserted successfully',
  'alert-type'=>'success',
      );
  
      return redirect()->back()->with($notif);
      }
      return redirect()->back();
      
    }
    public function editimage(){
      $image=Image::where('user_id',Auth::user()->id)->first();
      return view('backend.editimage',compact('image'));
      
    }

    public function updateimage(Request $request){

      $id=$request->id;
      $old_image=$request->old_image;
      $filpath=public_path('uploads');
            if($request->file('img')){
              $img=$request->file('img');
              $img_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
              $img->move($filpath,$img_name);
              $url ='uploads/'.$img_name;
              if(file_exists($old_image)){
                unlink($old_image);
              }
              Image::FindOrFail($id)->update([ 
                'image'=>$url
            ]);
            $notif=array(
        'message'=>'image updated successfully',
        'alert-type'=>'success',
            );
        
            return redirect()->back()->with($notif);

    }
  }

  public function cv(){
    $image=Image::where('user_id',Auth::user()->id)->first();
    $info=info::where('user_id',Auth::user()->id)->first();
    $profile=Profile::where('user_id',Auth::user()->id)->first();
    $skill=skill::where('user_id',Auth::user()->id)->first();
    $edu=education::where('user_id',Auth::user()->id)->get();
    $exp=exp::where('user_id',Auth::user()->id)->get();
    $language=Language::where('user_id',Auth::user()->id)->first();
    return view('backend.cv',compact('image','info','profile','skill','edu','language','exp'));
  }
  public function downloadcv(){
    $image=Image::where('user_id',Auth::user()->id)->first();
    $info=info::where('user_id',Auth::user()->id)->first();
    $profile=Profile::where('user_id',Auth::user()->id)->first();
    $skill=skill::where('user_id',Auth::user()->id)->first();
    $edu=education::where('user_id',Auth::user()->id)->get();
    $exp=exp::where('user_id',Auth::user()->id)->get();
    $language=Language::where('user_id',Auth::user()->id)->first();
    $pdf = Pdf::loadView('backend.getcv',compact('image','info','profile','skill','edu','language','exp'))->setPaper('a4')->setOption([
      'temdir'=>public_path(),
      'chroot'=>public_path(),
    ]);
    return $pdf->download('cv.pdf');
  }


 
}
