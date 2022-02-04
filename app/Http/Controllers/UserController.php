<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request as FacadesRequest;

class UserController extends Controller
{

    public function index($level)
    {
        return view('user.'.$level.'.index', compact('level'));
    }

    public function datatable($level)
    {
        if(isset($level)){
            $user = User::all();
        }else{
            $user = User::where('level', $level)->get();
        }
        return UserDataTable::set($user, $level);
    }

    public function create($level)
    {
        return view('user.'.$level.'.create', compact('level'));
    }

    public function store(Request $request, $level)
    {
        try {
            $data = $request->all();
            if($request['foto']){
                $base_64_foto = json_decode($request['foto'], true);
                $upload_image = uploadFile($base_64_foto, 'foto_profil');
                if ($upload_image === 0) {
                    return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
                }
                $data['foto'] = $upload_image;
            }

            $data['level'] = $level;
            $data['password'] = bcrypt($request->password);
            $user = User::create($data);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan ' . $this->getFeedback($user->level) . ' !');
        }

        return redirect()->route($this->getFeedback($user->level, 'english') . '.index')->with('success', 'Berhasil menambahkan data ' . $this->getFeedback($user->level));
    }


    public function edit($level, User $user)
    {
        return view('user.'.$level.'.edit', compact('user', 'level'));
    }

    public function update(Request $request, $level, User $user)
    {
        try {
            $data = $request->all();
            unset($data['level']);

            if($request['foto']){
                $base_64_foto = json_decode($request['foto'], true);
                $upload_image = uploadFile($base_64_foto, 'foto_profil');
                if ($upload_image === 0) {
                    return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
                }
                $user->foto = $upload_image;
            }

            if($request->password){
                $data['password'] = bcrypt($request->password);
            }

            $user->update($data);
            $user = $user->refresh();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah ' . $this->getFeedback($user->level) . ' !');
        }

        return redirect()->route($this->getFeedback($user->level, 'english') . '.index')->with('success', 'Berhasil mengubah data ' . $this->getFeedback($user->level));
    }

    public function show($level, User $user)
    {
        return view('user.'.$level.'.show', compact('user', 'level'));
    }

    public function destroy($level, User $user)
    {
        try {
            $user->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus user']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus user']);
    }

    private function getFeedback($level, $lang = null)
    {
        if ($level == 'admin') {
            return 'admin';
        }

        if ($level == 'penilai') {
            return 'penilai';
        }

        if ($level == 'kontrak') {
            if ($lang == 'english') {
                return 'kontrak';
            }
            return 'kontrak';
        }
    }

    public function editProfile(User $user)
    {
        return view('profile.edit', [$user]);
    }

    public function updateProfile(User $user, Request $request)
    {
        if (Auth::id() != $user->id) {
            abort(403);
        }

        try {
            $data = $request->all();
            unset($data['level']);

            if ($data['password']) {
                $data['password'] = bcrypt($data['password']);
            } else {
                unset($data['password']);
            }

            $user->update($data);
            $user = $user->refresh();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah profil ' . $user->name);
        }

        return redirect()->back()->with('success', 'Berhasil mengubah profil ' . $user->name);
    }
}
