<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Aquí obtienes todos los usuarios de la base de datos
        $users = User::all();
        // Y los pasas a la vista, incluyendo la variable $users
        return view('user.index', ['users' => $users]);
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // No es necesario si usas un modal en la página de index
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'cedula' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'usuario' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
 
        User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'cedula' => $request->cedula,
            'codigo' => $request->codigo,
            'usuario' => $request->usuario,
            'email' => $request->email,
            'oficina' => $request->oficina,
            'password' => Hash::make($request->password),
        ]);
 
        return Redirect::route('users.index')->with('status', 'user-created');
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
        // Retornamos la vista de edición, pasando el usuario que queremos editar
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validamos los datos. La regla 'unique' debe ignorar el usuario actual.
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'cedula' => ['required', 'string', 'max:255', 'unique:users,cedula,'.$user->id],
            'usuario' => ['required', 'string', 'max:255', 'unique:users,usuario,'.$user->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'oficina' => ['nullable', 'string', 'max:255'],
            'codigo' => ['nullable', 'string', 'max:255'],
        ]);

        // Si se proporciona una nueva contraseña, la validamos y la actualizamos.
        if ($request->filled('password')) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $validated['password'] = Hash::make($request->password);
        }

        $user->update($validated);

        return Redirect::route('users.index')->with('status', 'user-updated');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // No eliminamos al usuario, solo cambiamos su estado
        $user->is_active = !$user->is_active;
        $user->save();

        $status = $user->is_active ? 'user-activated' : 'user-deactivated';
        $message = $user->is_active ? 'Usuario activado exitosamente.' : 'Usuario desactivado exitosamente.';

        // Redirigimos con un mensaje de estado y un mensaje específico
        return Redirect::route('users.index')->with('status', $status)->with('message', $message);
    }
}
