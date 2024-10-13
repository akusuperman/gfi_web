<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'usertype' => 'required|in:user,admin',
            'password' => 'required|string|min:8',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
        ]);

        // Hash password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Simpan data ke database
        try {
            User::create($validatedData);
            return redirect('/dashboard/AddUser')->with('success', 'User berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menambahkan user: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);    

        return view('admin.user.edit')
       ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $formFields = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
                'usertype' => 'required|in:user,admin',
                'alamat' => 'required|string',
                'no_hp' => 'required|string|max:20',
            ]);

            if ($request->filled('password')) {
                $formFields['password'] = Hash::make($request->password);
            }

            $user = User::findOrFail($request->id);
            $user->update($formFields);

            return redirect('/dashboard/AddUser')
                ->with('success', 'User berhasil diubah!');
        } catch (\Throwable $th) {
            return redirect('/dashboard/AddUser')
                ->with('error', 'User gagal diubah: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $user = User::find($request->id);

            $user->delete();

            return redirect('/dashboard/AddUser')
            ->with('success', 'User berhasil dihapus!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect('/dashboard/AddUser')
            ->with('error', 'User gagal dihapus!');
        }
    }
}
