<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados'] = Empleados::paginate(5);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'Nombre' => 'required|string|max:100',
            'ApellidoPaterno' => 'required|string|max:100',
            'ApellidoMaterno' => 'required|string|max:100',
            'Correo' => 'required|email|',
            'Foto' => 'required|max:10000|mimes:jpeg,png,jpg'

        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'Foto.required' => 'La foto es requerida'
        ];

        $this->validate($request, $campos, $mensaje);
        //
        //$datosEmpleado = request()->all(); toma todos los datos
        $datosEmpleado = request()->except('_token'); //recibir todos los datos menos el token
        if ($request->hasFile('Foto')) { //si la foto es un archivo
            $datosEmpleado['Foto'] = $request->file('Foto')->store('upload', 'public'); //guardar la foto 
        };
        Empleados::insert($datosEmpleado); //guardar con los datos de $datosEmpleado
        //return response()->json($datosEmpleado); //convierte los datos de la variable en un json
        return redirect('empleado')->with('mensaje', 'Empelado agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados = Empleados::findOrFail($id);
        return view('empleado.edit', compact('empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Guardar todo menos el token y el método
        $datosEmpleado = request()->except(['_token', '_method']);

        if ($request->hasFile('Foto')) { //Preguntar si el campo foto es un archivo
            $empleados = Empleados::findOrFail($id); //Buscar el id del empleado
            Storage::delete('public/' . $empleados->Foto); //Borrar solo la foto actual
            $datosEmpleado['Foto'] = $request->file('Foto')->store('upload', 'public'); //guardar la nueva foto
        }

        Empleados::where('id', '=', $id)->update($datosEmpleado); //guardar el empleado con los datos de $datosEmpleado
        $empleados = Empleados::findOrFail($id); //Buscar el empleado por id
        return view('empleado.edit', compact('empleados')); //Retornar a la vista edit
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //Esperar el id del modelo
    {
        $empleados = Empleados::findOrFail($id); //Buscar el empleado por id
        if (Storage::delete('public/' . $empleados->Foto)) { //Si la foto se borra
            Empleados::destroy($id); //destruir el registro completo
        }
        return redirect('empleado')->with('mensaje', 'Empleado borrado');
    }
}
