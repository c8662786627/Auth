<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function signUpPage()
    {
        //
        $binding = [
            'title'=>'註冊',
        ];
        return view('auth\signUp',$binding);
    }
    public function signUpProcess()
    {
        //
        $input = request()->all();
        $rules =[
        'nickname'=>'required|max:50',
        'email'=>'required|max:150|email',
        'password'=>'required|same:password_confirmation|min:6',
        'password_confirmation'=>'required|min:6',
        'type'=>'required|in:G,A',
       ];

       $validator = Validator::make($input,$rules);
       if($validator->fails()){
       return redirect('/user/auth/sign-up')->withErrors($validator)->withInput();
        //return response($validator->errors());
       }

       $email = request()->input('email');
       //檢查email使否存在
       $user = User::where('email', $email)->first();

       if ($user) {
           return redirect('/user/auth/sign-up')->withErrors(['email' => '該信箱已被註冊過了！'])->withInput();
       } else {
            //創建用戶
            $user = new User;
            $user->name = request()->input('nickname');
            $user->email = request()->input('email');
            $user->password = bcrypt(request()->input('password'));
            $user->type = request()->input('type');
            $user->save();
       }

      

       return response()->json(true);
       //return redirect('login')->with('success', '註冊成功請重新登入！');
    }
    public function signInPage()
    {
        //
        $binding = [
            'title'=>'登入',
        ];
        return view('auth\signIn',$binding);
    }
    public function signInProcess(){
        
        $input = request()->validate([
            'email'=>'required|email|max:150',
            'password'=>'required|min:6',
        ]);
       
    
        $user = User::where('email',$input['email'])->firstorFail();

        if(Auth::attempt($input)){

           session()->put('user_id',$user->user_id);
           
           //return response()->json(true);
           //登入成功就導回造訪頁面，沒有就導向首頁
           return redirect()->intended('/');
        }else{
            $error=[
                'msg'=>'登入失敗',
            ];
            return redirect('user/auth/sign-in')->withErrors($error)->withInput();
        };
    }
    public function signout(){
        session()->forget('user_id');
        return redirect('user/auth/sign-in');
    }
    public function getCSRFToken(){
        return csrf_token();
    }
}
