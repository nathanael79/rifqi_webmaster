<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Resident;
use App\Models\Kelas;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kelas::all();
        $resident = Resident::all();
        $params = [
            'resident' => $resident,
            'data' => $data
        ];
        return view('class.table', $params);
        // $kelas = Kelas::get(['id']);
        // $resident = Resident::whereIn('class_id', $kelas)->get();
        // // $resident = $resident->get('user_id');
        // // $user = User::where(['role'=>1])->get();
        // $user = User::whereIn('id', Resident::get(['user_id']))
        // ->where('role',1)
        // ->get();
        // // $data = User::whereIn('id', Resident::get(['user_id']))->get();
        // $params = [
        //     'kelas' => Kelas::all(),
        //     'resident' => $resident,
        //     'user' => $user

        // ];
        // // dd($params);
        // // return response()->json($params);
        // // return response()->json($user);
        // // return response()->json($resident);
        // // $params = Kelas::all();
        // return view('table.class', compact('params'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'mentor' => 'required'
        ]);
        
        $name = $request->input('name');
        $mentor = $request->get('mentor');

        $kelas = new Kelas;
        $kelas->name = $name;
        $kelas->save();

        $class_id = Kelas::select('id')->where('name',$request->input('name'))->get();
        $user_id = User::select('id')->where('name', $request->get('mentor'))->get();

        $params = [
            'class_id' => $class_id[0]->id,
            'user_id' => $user_id[0]->id
        ];

        $resident = new Resident;
        $resident->class_id = $class_id[0]->id;
        $resident->user_id = $user_id[0]->id;
        $resident->save();
        // dd($params);
        return redirect('class');
        // return response()->json($params);
    }

    public function show($id)
    {
        $data = Kelas::where(['id'=>$id])->first();
        $resident = Resident::where(['class_id'=>$id])->get();
        $params = [
            'data' => $data,
            'resident' => $resident
        ];
        return view('class.show', $params);
        // return response()->json($data);
    }

    public function edit($id)
    {
        $data = Kelas::find($id);
        $resident = Resident::all();
        $user = User::where(['role'=>1])->get();
        $resident2 = Resident::where('class_id', $id)->get();
        $params = [
            'resident' => $resident,
            'resident2' => $resident2,
            'data' => $data,
            'user' => $user
        ];
        // return response()->json($resident2);
        return view('class.edit', $params);
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $mentor = $request->get('mentor');
        $name_first = $request->input('name_first');
        $user = User::select('id')->where('name', $name_first)->first();
        $user2 = User::select('id')->where('name', $mentor)->first();
        $idResident = Resident::select('id')->whereIn('user_id', $user)->first();
        $resident = Resident::where('user_id', $user['id'])->first();

        $this->validate(request(), [
            'name' => 'required',
        ]);

        $kelas->name = $request->get('name');
        // $kelas->save();

        $resident->class_id = $id;
        $resident->user_id = $user2['id'];
        $resident->save();

        return redirect('class')->with('success','Member updated successfully');    
        // dd($user['id']);
        // return response()->json($resident);
    }

    public function destroy($id)
    {
        $data = Kelas::find($id);
        $resident = Resident::select('id')->where(['class_id'=>$data->id])->delete();
        // $resident = Resident::find($resident);
        // $resident->delete();
        $data->delete();
        // return response()->json($resident);
        return redirect('class')->with('success','Member deleted successfully');    
    }



    public function add($id)
    {
        $data = Kelas::find($id);
        $alreadyResident = Resident::select('user_id')->where('class_id',$data->id)->get();
        // $resident = Resident::all();
        $user = User::whereNotIn('id', $alreadyResident)->get();
        // $class_id = Resident::select('user_id')->where('class_id',$resident[0]->class_id)->get();

        $params = [
            'data' => $data,
            // 'resident' => $resident,
            'user' => $user,
            // 'alreadyResident' => $alreadyResident
        ];
        // dd($params);
        return view('class.form2', $params);
        // return response()->json($params);
    }


    public function save(Request $request)
    {
        $id = $request->input('id');
        $user = $request->get('user');

        // $class_id = Kelas::get('id')->where('id', $id);
        $class_id = Kelas::select('id')->where('id',$id)->get();
        $user_id = User::select('id')->where('name', $user)->get();

        $resident = new Resident;
        $resident->class_id = $class_id[0]->id;
        $resident->user_id = $user_id[0]->id;
        $resident->save();

        // $data = Kelas::where(['id'=>$id])->first();
        // $resident = Resident::where(['class_id'=>$id])->get();
        // $params = [
        //     'data' => $data,
        //     'resident' => $resident
        // ];
        // dd($params);
        return redirect('class');
        // return response()->json($params);
    }


    public function deleteUser($id)
    {
        $data = Resident::find($id);
        $id = Kelas::select('id')->where('id', $data->class_id)->get();
        $data->delete();
        return redirect('class');
        // return response()->json($id);
    }

}
