<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Jabatan;
use App\Models\PangkatGolongan;
use App\Models\UnitKerja;
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
        if(!isset($level)){
            $user = User::all();
        }else{
            $user = User::where('level', $level)->get();
        }
        return UserDataTable::set($user, $level);
    }

    public function create($level)
    {
        $jabatan = $level == User::$penilai ? ['' => 'Pilih jabatan'] + Jabatan::pluck('nama', 'id')->toArray() : [];
        $unit_kerja = ['' => 'Pilih Unit Kerja'] + UnitKerja::pluck('nama', 'id')->toArray();
        $pangkat_golongan = $level == User::$penilai ? ['' => 'Pilih Pangkat Golongan'] + PangkatGolongan::pluck('nama', 'id')->toArray() : [];

        $data = [
            'jabatan' => $jabatan,
            'unit_kerja' => $unit_kerja,
            'pangkat_golongan' => $pangkat_golongan,
            'level' => $level,
        ];

        return view('user.'.$level.'.create', $data);
    }

    public function store(UserRequest $request, $level)
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
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan ' . $level . ' !');
        }

        return redirect()->route('user.index', $level)->with('success', 'Berhasil menambahkan data ' . $level);
    }


    public function edit($level, User $user)
    {
        $jabatan = $level == User::$penilai ? ['' => 'Pilih jabatan'] + Jabatan::pluck('nama', 'id')->toArray() : [];
        $unit_kerja = ['' => 'Pilih Unit Kerja'] + UnitKerja::pluck('nama', 'id')->toArray();
        $pangkat_golongan = $level == User::$penilai ? ['' => 'Pilih Pangkat Golongan'] + PangkatGolongan::pluck('nama', 'id')->toArray() : [];

        $data = [
            'user' => $user,
            'jabatan' => $jabatan,
            'unit_kerja' => $unit_kerja,
            'pangkat_golongan' => $pangkat_golongan,
            'level' => $level,
        ];

        return view('user.'.$level.'.edit', $data);
    }

    public function update(UserRequest $request, $level, User $user)
    {
        try {
            $data = $request->validated();
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
            }else{
                unset($data['password']);
            }

            $user->update($data);
            $user = $user->refresh();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah ' . $level . ' !');
        }

        return redirect()->route('user.index', $level)->with('success', 'Berhasil mengubah data ' . $level);
    }

    public function show($level, User $user)
    {
        return view('user.'.$level.'.show', compact('user', 'level'));
    }

    public function destroy($level, User $user)
    {
        if(Auth::user()->level == User::$admin && (Auth::id() == $user->id || User::where('level', User::$admin)->count() == 1)){
            return response(['code' => 0, 'message' => 'Tidak bisa menghapus admin yang sedang login atau admin yang cuma ada 1!']);
        }

        if(Auth::user()->level != User::$admin){
            return response(['code' => 0, 'message' => 'Gagal menghapus user, anda bukan admin']);
        }

        $user->load('penilaiSkp');
        $user->load('kontrakSkp');
        
        if($user->penilaiSkp()->exists() || $user->kontrakSkp()->exists()){
            return response(['code' => 0, 'message' => 'Gagal menghapus user, data user masih digunakan di nilai skp']);
        }

        try {
            $user->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus user']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus user']);
    }

    public function editProfile($level, User $user)
    {
        return view('user.'.$level.'.profile', compact('user', 'level'));
    }

    public function updateProfile($level, User $user, ProfileRequest $request)
    {
        if (Auth::id() != $user->id) {
            abort(403);
        }

        try {
            $data = $request->validated();
            unset($data['level']);

            if ($request->password) {
                $data['password'] = bcrypt($request->password);
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
