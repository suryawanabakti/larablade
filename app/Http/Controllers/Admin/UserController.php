<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = User::query();
        if ($request->name) {
            $query->where('name', 'LIKE', "%{$request->name}%");
        }
        if ($request->email) {
            $query->where('email', 'LIKE', "%{$request->email}%");
        }
        if ($request->role) {
            $query->role($request->role);
        }
        if ($request->gender) {
            $query->where('gender', $request->gender);
        }
        $users = $query->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $years = array_combine(range(date("Y"), 1910), range(date("Y"), 1910));
        return view('admin.users.create', compact('years'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $day =  $request->user["day"];
        $month = $request->user["month"];
        $year = $request->user["year"];

        $dateOfBirth = Carbon::createFromDate("$year-$month-$day")->format('Y-m-d');

        if ($request->photo) {
            $photo = $request->file('photo')->store('user/photo');
        }

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "gender" => $request->gender,
            "date_of_birth" => $dateOfBirth,
            "password" => Hash::make($request->password),
            "photo" => $photo ?? null
        ]);

        $user->assignRole($request->role);

        alert()->success('Berhasil', 'berhasil tambah user ' . $request->name);
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        activity()->withProperties($user)->log('Telah menghapus user ' . $user->name);
        alert()->success('Berhasil', 'berhasil hapus user ' . $user->name);
        return back();
    }

    public function export()
    {
        return "export";
    }
}
