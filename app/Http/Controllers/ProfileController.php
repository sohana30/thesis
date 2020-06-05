<?php

namespace App\Http\Controllers;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }

    public function show($id)
    {
        $contacts = Profile::all()->where('id', '=', $id);
        return view('profile', compact('profile'));
    }

    public function editInfo(Request $request, $id)
    {
    	
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension();
            $dbPath = "/image/".$file->getClientOriginalName().'_'.time().'.'.$fileExtension;

            $file->move(public_path('/image/'), $dbPath);
            DB::table('profile')->where('id', '=', $id)->update([
                    'image' => $dbPath
                ]);

        }
            $updatefName = $request->fName;
            $updatelName = $request->lName;
            $updateGender = $request->gender;
            $updatepNumber = $request->pNumber;
           
            $updateEmail = $request->email;
            
            $updateProgram = $request->program;
            $updateCountry = $request->country;
            $updateAbout = $request->about;

            DB::table('profile')
            	->where('id', '=', $id)
                ->update([
                    'fName' => $updatefName,
                    'lName' => $updatelName,
                    'gender' => $updateGender,
                    'pNumber' => $updatepNumber,
                   
                    'email' => $updateEmail,
                    
                    'program' => $updateProgram,
                    'country' => $updateCountry,
                    'about' => $updateAbout,
                ]);
            
        return back();

        // $contacts = App\Contacts::find($id);

        // $contacts->fName = $request->fName;
        // dd($contacts);
        // $flight->save();
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'file' => 'string|max:255, mimes:png|jpg|gif|size:2048',
            'fName' => 'string|max:64|required',
            'lName' => 'string|max:32|required',
            'gender' => 'required|string',
            'pNumber' => 'required',
            
            'email' => 'string|min:12|max:64|required',
            
            'job' => 'string|required',
            'city' => 'string|required',
            'about' => 'text'
        ]);
    }

    public function store(Request $request)
    {
        $data=new Profile();
        $data['user_id']=Auth::user()->id;

        $file = $request->file('image');
        if ($file){
            $fileExtension = $file->getClientOriginalExtension();
            $dbPath = "/image/" . $file->getClientOriginalName() . '_' . time() . '.' . $fileExtension;
            $file->move(public_path('/image/'), $dbPath);
            $data['image']=$dbPath;
        }

        $data['fName']=$request->input('fName');
        $data['lName']=$request->input('lName');

        $data['gender']=$request->input('gender');

        $data['pNumber']=$request->input('pNumber');
      

        $data['email']=$request->input('email');
        

        $data['program']=$request->input('program');
        $data['country']=$request->input('country');
        $data['about']=$request->input('about');

        $message = 'There is some error...';
        if($request->user()->profiles()->save($data)){
            $message = 'Student details has been successfully added!';
        }

        return redirect('home')->with(['success' => $message]);
    }


    
    
}
