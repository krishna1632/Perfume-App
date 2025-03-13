<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('permission:view users', only: ['index']),
            new Middleware('permission:edit users', only: ['edit']),
            new Middleware('permission:delete users', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('name', 'ASC')->paginate(10);
        return view('user.list', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::with('roles')->findOrFail($id);
        $roles = Role::orderBy('name', 'ASC')->get();
        $hasRoles = $users->roles->pluck('id');
        return view('user.edit', compact('users', 'roles', 'hasRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female,other',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'roles' => 'array', // Ensure roles is an array
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
        ];

        // Handle profile picture upload
        if ($request->hasFile('profile_pic')) {
            $profilePic = $request->file('profile_pic');
            $profilePicName = time() . '.' . $profilePic->getClientOriginalExtension();
            $profilePic->storeAs('public/profile_pics', $profilePicName);
            $data['profile_pic'] = 'profile_pics/' . $profilePicName;
        }

        $users->update($data);

        // Sync roles only if the user is Superadmin or Admin
        if (auth()->user()->hasAnyRole(['Superadmin', 'Admin'])) {
            $users->roles()->detach(); // Remove old roles
            if ($request->has('roles')) {
                $users->syncRoles($request->roles);
            }
        }

        // Redirect based on role
        if (auth()->user()->hasAnyRole(['Superadmin', 'Admin'])) {
            return redirect()->route('user.list')->with('success', 'User updated successfully.');
        }

        return redirect()->route('userprofile.index')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user.list')->with('error', 'User not found.');
        }

        $user->delete();

        // Redirect based on role
        if (auth()->user()->hasAnyRole(['Superadmin', 'Admin'])) {
            return redirect()->route('user.list')->with('success', 'User deleted successfully.');
        }

        return redirect('/')->with('success', 'Your account has been deleted successfully.');
    }
}
