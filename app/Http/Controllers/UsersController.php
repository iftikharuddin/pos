<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use View;

use Auth;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
	public function __construct()
    {
        $this->middleware('isAdmin',['except' => ['show', 'edit']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->password = bcrypt(Input::get('password'));
		$user->save();		
		return Redirect::to('/users')->with('message', 'User Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$user = Auth::user();
        return view('user.profile')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$user = User::find($id);
        return view('user.update')->with('userToUpdate',$user);
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
        $user = User::find($id);
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->password = bcrypt(Input::get('password'));
		$user->save();		
		return Redirect::to('/users')->with('message', 'User Updated');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find(Input::get('id'));
		if($user){
			$user->delete();
			return Redirect::to('/users');
		}
    }
}
