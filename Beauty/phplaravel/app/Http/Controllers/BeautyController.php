<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostRequest2;
use App\Http\Requests\CosmeRequest;
use App\Http\Requests\PassRequest;
use App\Models\User;
use App\Models\Cosme;
use App\Models\Review;
use App\Models\Like;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class BeautyController extends Controller
{
    public function index() {

        $cosme = Cosme::select('users.id as user_id','name','cosme','images','cosmes.id as cosme_id')
                    ->join('users', 'cosmes.user_id', 'users.id')
                    ->get();

        if(Auth::user()){
            $like_cosme = Like::select('cosme_id')
                        ->where('user_id',Auth::user()->id)
                        ->get()
                        ->pluck('cosme_id')
                        ->toArray();

            return view('beauty.index', compact('cosme','like_cosme'));
        }else{
            return view('beauty.index', compact('cosme'));
        }
    }

    public function search() {
        
        return view('beauty.search');
    }

    public function result(Request $request) {

        $cosme = Cosme::select('users.id as user_id','name','cosme','images','cosmes.id as cosme_id')
                        ->join('users', 'cosmes.user_id', 'users.id')
                        ->where('category' , $request->category)
                        ->get();
        
        return  response()->json($cosme);
    }

    public function register() {
        
        return view('beauty.register');
    }

    public function confirm(PostRequest $request){
        $err=empty($error) ?'':$error;

        if($err){
            return view('beauty.register',['message' => $request->message]);
        } else {
            $inputs = $request->input();
            return view('beauty.confirm', ['inputs' => $inputs,]);
        }
    }

    public function complete(Request $request) {

        try{
            User::create(array_merge($request->all(),
                ['password' => Hash::make($request->password)]
            ));
            return view('beauty.complete');
        }catch(\Throwable $th){
            return $th;
        }
    }

    public function login() {
        
        return view('beauty.login');
    }

    public function authenticate(Request $request) {

        $credentials = $request->validate([
            'acount'=> ['required'],
            'password'=>['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return view('beauty.user');
        }else{
        }

        return back()->withErrors([
            'acount' => 'IDかパスワードが間違っています。',
        ]);
    }

    public function user() {

        
        if(auth()->user()->role ==1){
            $auth=auth()->user()->id;
            $get=Cosme::where('user_id', $auth)->get();
            return view('beauty.user', compact('get'));

        }else{
            $auth=auth()->user()->id;
            $get=Review::select('reviews.id as r_id','cosmes.id as c_id','reviews.body as r_body','cosme')
                        ->join('cosmes','reviews.cosme_id','cosmes.id')
                        ->where('reviews.user_id', $auth)
                        ->get();
            $like = Like::select('likes.id as l_id','likes.user_id','likes.cosme_id','users.id as u_id','name','cosmes.id as c_id','cosme','images')
                        ->join('users','likes.user_id','users.id')
                        ->join('cosmes','likes.cosme_id','cosmes.id')
                        ->where('likes.user_id',$auth)
                        ->get();
            return view('beauty.user', compact('get','like'));
        }
        
    }

    public function regicosme() {
        
        return view('beauty.regicosme');
    }

    public function cosmecomp(CosmeRequest $request){
        $err=empty($error) ?'':$error;

        if($err){
            return view('beauty.regicosme',['message' => $request->message]);
        } else {
            $cosme = new Cosme;
            $inputs =$request;
            $cosme->new = $inputs->new;
            $cosme->user_id = $inputs->user_id;
            $cosme->cosme = $inputs->cosme;
            $cosme->price = $inputs->price;
            $cosme->category = $inputs->category;
            $cosme->body = $inputs->body;

            $dir = 'img';
            $file_name = $request->file('images')->getClientOriginalName();
            $request->file('images')->storeAs('public/' . $dir, $file_name);
            $cosme->images = 'storage/' . $dir . '/' . $file_name;

            $cosme->save();
            
            return view('beauty.cosmecomp');
        }
    }

    public function edit($id) {

        $post = User::find($id);
        
        return view('beauty.edit', ['post' => $post,]);
    }

    public function editcomp(PostRequest2 $request) {

        $err=empty($error) ?'':$error;

        if($err){
            return view('beauty.edit',['message' => $request->message]);
        } else {
            
            if($file_name = $request->file('image')){
                $user = User::find($request->id);

                $dir = 'img';
                $file_name = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('public/' . $dir, $file_name);
                $request->image = 'storage/' . $dir . '/' . $file_name;

                $user->update([
                    'name' => $request->name, 
                    'acount' => $request->acount, 
                    'email' => $request->email,
                    'body' => $request->body,
                    'image' => $request->image]);
            }else {
                $user = User::find($request->id);

                $user->update([
                    'name' => $request->name, 
                    'acount' => $request->acount, 
                    'email' => $request->email,
                    'body' => $request->body,
                    'image' => ""]);
            }
        
        return view('beauty.complete');
        }
    }

    public function delete($id) {

        $user = User::find($id);
        $user->delete();
        
        return redirect("/index");
    }

    protected function logout(Request $request) {
        Auth::logout();
        return redirect('index');
    }

    public function cosme($id) {

        $cosme = Cosme::select('users.id as user_id','new','name','cosme','category','images','price','cosmes.body as c_body','cosmes.id as cosme_id')
                    ->join('users', 'cosmes.user_id', 'users.id')
                    ->where('cosmes.id', $id)
                    ->get();

        $review=Review::where('cosme_id', $id)->get();

        $like = NULL;
        if(Auth::user()){
            $like =Like::where('user_id',Auth::user()->id)
                        ->where('cosme_id', $id)
                        ->get()
                        ->first();
            return view('beauty.cosme',['cosme' => $cosme, 'review' => $review, 'like'=>$like]);
        }else{
            return view('beauty.cosme',['cosme' => $cosme, 'review' => $review]);
        }

        return view('beauty.cosme',['cosme' => $cosme, 'review' => $review, 'like'=>$like]);
    }

    public function review($id) {

        $cosme = Cosme::find($id);
        
        return view('beauty.review',['cosme' => $cosme,]);
    }

    public function comp(Request $request){

        $err = $request->validate([
            'body'=> ['required']
        ]);

        $review = new Review;
        $inputs =$request;
        $review->user_id = $inputs->user_id;
        $review->cosme_id = $inputs->cosme_id;
        $review->body = $inputs->body;

        $review->save();
        
        return view('beauty.comp');
    }

    public function cosme2($id) {

        $cosme = Cosme::find($id);

        return view('beauty.cosme2',['cosme' => $cosme,]);
    }

    public function editcosme($id) {

        $post = Cosme::find($id);
        
        return view('beauty.editcosme',['post' => $post,]);
    }

    public function cosmecomp2(CosmeRequest $request) {

        $err=empty($error) ?'':$error;

        if($err){
            return view('beauty.editcosme',['message' => $request->message]);
        } else {
            $cosme = Cosme::find($request->id);

            $cosme->update([
                'new' => $request->new, 
                'cosme' => $request->cosme, 
                'price' => $request->price,
                'category' => $request->category,
                'body' => $request->body
            ]);
        }
        
        return view('beauty.cosmecomp2');
    }

    public function deletecosme($id) {

        $cosme = Cosme::find($id);
        $cosme->delete();
        
        return redirect("/user");
    }

    public function delreview($id) {

        $review = Review::find($id);
        $review->delete();
        
        return redirect("/user");
    }

    public function pass() {
        
        return view('beauty.pass');
    }

    public function passcomp(PassRequest $request) {

        $err=empty($error) ?'':$error;

        if($err){
            return view('beauty.pass',['message' => $request->message]);
        } else {

        $user = User::where('email',$request['email'])->first();

        $user->fill([
            'password' => Hash::make($request['password'])
        ])->save();
        
        return view('beauty.passcomp');
        }
    }

    public function like(Request $request) {
        $like_num = $request->like;
        if($like_num == 0){
            $like = Like::where('user_id',$request->user_id)
                        ->where('cosme_id',$request->cosme_id)
                        ->get()
                        ->first();
            $like->delete();
            return true ;
        }else{
            $like = new Like;
            $like->user_id = $request->user_id;
            $like->cosme_id = $request->cosme_id;
            $like->save();
            return true ;
        }
    }

    public function like2(Request $request) {

        $like = Like::where('id',$request->l_id)
                    ->get()
                    ->first();
        $like->delete();
        return true ;
    }

}
