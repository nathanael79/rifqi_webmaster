<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Resident;

class ClassController extends Controller
{
    public function classes(Kelas $kelas){
        $kelas = Kelas::all();
        return response()->json($kelas);
        // return fractal()
        //     ->collection($kelas)
        //     ->transformWith(new KelasTransformer)
        //     ->toArray();
    }

    public function classDetail(Kelas $kelas, $user_id){    	
    	$user = User::find($user_id);
    	$resident = Resident::where(['user_id'=> $user->id])->first();
    	if(is_null($resident)){
	        return response()->json('this user has no class');
    	}
    	else{
	    	$resident = Resident::where(['user_id'=> $user->id])->get();
	    	$class_id = Resident::select(['class_id'])->where('user_id', $user->id)->get();
	    	$kelas = Kelas::whereIn('id', $class_id)->get();
	    	$params = [
	    		'user' => $user->name,
	    		'kelas' => $kelas
	    	];
	        return response()->json($params);
	    // 	if ($user->role==1) {
		   //      $class_id = Resident::select('class_id')->where('user_id',$user->id)->get();
	   	// 		$kelas = select('id')->where('id',$class_id)->first();
		   //      $resident = Resident::select('user_id')->where('class_id',$kelas->id)->get();
		   //      $user2 = User::whereIn(['id'=>$resident])
		   //      	->where('role', 2)
		   //      	->get();

		   //      $params = [
		   //      	'kelas' => $kelas,
		   //      	'mentor' => $user,
		   //      	'user' => $user2
		   //      ];
		   //      return response()->json($params);
		        
	    // 	}
	    // 	else {
		   //      return response()->json($kelas);
	    // 	}

    	}
    }


    // public function register(Request $request, User $user){
    // 	$this->validate($request, [
    // 		'name'		=> 'required',
    // 		'email'		=> 'required|email|unique:users',
    // 		'password'	=> 'required|min:6',

    // 	]);

    // 	$user = $user->create([
    //         'name'      => $request->name,
    //         'email'     => $request->email,
    //         'password'	=> sha1($request->password),
    //         'role'		=> 1,
    //     ]);

    //     $params = [
    //         'code' => '201',
    //         'description' => 'New Mentor Created',
    //         'message' => 'Register Success!',
    //     	'data' => $user
    //     ];

    // 	return response()->json($params, 201);
    // }

    // public function login(Request $request, User $user){
    // 	$email = $request->input('email');
    // 	$password = sha1($request->password);

    // 	$activeUser=User::where(['email'=>$email])->get()->first();
    // 	if(is_null($activeUser)){
    //         $params = [
    //             'code' => '404',
    //             'description' => 'Email Not Found',
    //             'message' => 'Email is not Found!',
    //             'data' => $email
    //         ];
    //         return response()->json($params, 404);
    // 	}

    // 	if($activeUser->password != $password){
    //         $params = [
    //             'code' => '401',
    //             'description' => 'Unauthorized',
    //             'message' => 'Password is Wrong!',
    //             'data' => $password
    //         ];
    //         return response()->json($params, 401);
    // 	}

    // 	$activeUser->save();

    //     $params = [
    //     	'code' => '200',
    //         'description' => 'Authorized',
    //     	'message' => 'Login Success!',
    //     	'data' => $activeUser
    //     ];

    //     return response()->json($params, 200);
    // }
}
