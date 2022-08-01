<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;
use App\Models\Movie;



class CustomAuthController extends Controller
{
/*------------Login page------------------- */
    public function login(){
        return view ("pages.login");
    }

    public function loginUser(Request $request){
        $request->validate([                                           
            'email'=>'required|email',                   
            'password'=>'required|max:15'
        ]);
        $user=User::where('email','=',$request->email)->first();       //requesting the registered email
        if($user)
        {
            if(Hash::check($request->password,$user->password))       //requesting password input and check if the entered password matches with registerd password
            {
                $request->session()->put('loginId',$user->id);         //if the condition is true retrieve logged in user id from session and redirects to another page
                return redirect('movieform');
            }
            return back()->with('fail','Enter correct password.');     
        }
        else{
            return back()->with('fail','This email is not registered.');     
        }
    }

/*------------Registration Page------------------- */
    public function registration(){
        return view("pages.registration");
    }

    public function registerUser(Request $request){
        // echo 'Value Added';
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|max:15'
        ]);

        $user=new User();            //requesting the required details for registation
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);     //encrypting the password in db for security
        $result= $user->save();       //saving the requested details in 'user' table

        if($result)                                   //condition if the results are true and validated
        {
            return back()->with('success','Registered Successfully!!');
        }
        else{
            return back()->with('fail','Something went wrong!!');
        }
    }

/*------------Movie Form------------------- */
    public function movieform(){
        return view("pages.movieform");
    }

    public function movierating(Request $request){
        // echo "value added";
        $request->validate([         
            'name'=>'required',
            'date'=>'required'
        ]);

        $movie=new Movie();
        $movie->movie_name=$request->name;  //request inputs from user
        $movie->watched_on=$request->date;
        $movie->rating=$request->stars;
        $result= $movie->save();         //save the inputs from the user to the db
        if($result)
        {
            return back()->with('success','Reviewed Successfully!!');
        }
        else{
            return back()->with('fail','Something went wrong!!');
        }
    }

/*------------Display the details of watched movies------------------- */
    public function watchedmovies(){
        // $date1="2022-07-25";
        // $data2="2022-07-31";
        // Movie::whereBetween('watched_on',[$date1, $data2])->get(['movie_name','watched_on','rating']);
        // $movie = Movie::select('SELECT movie_name,watched_on,rating FROM movies WHERE watched_on >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY;');
        
        $movies=Movie::all()->toArray();   //fetch all the watched movie details from database in the form of array
        return view("pages.watchedmovies", compact("movies"));      
    }

/*------------Search Movie and its details------------------- */    
    public function viewmovies(){
        return view("pages.viewmovies");  
    }
}
