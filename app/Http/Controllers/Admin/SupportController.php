<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        $comands = [
            (object)['id' => 1, 'comando' => 'InsertarRol(rol_name)', 'descripcion' => 'Permite ingresar un nuevo rol desde el Administrador del sistema.'],
            (object)['id' => 2, 'comando' => 'ModificarRol(id_rol,rol_name)', 'descripcion' => 'Permite la modificación de los roles si es necesario por parte del Administrador.'],
            (object)['id' => 3, 'comando' => 'ObtenerRoles()', 'descripcion' => 'Obtiene todos los roles almacenados y lanza un correo con cada uno de ellos.'],
            // ... Agrega más comandos según sea necesario
            (object)['id' => 32, 'comando' => 'RegistrarEmpresa(nombre_empresa)', 'descripcion' => 'Permite registrar un nueva empresa en el sistema añadiendo el nombre de la empresa.'],
            (object)['id' => 33, 'comando' => 'ModificarEmpresa(id_empresa,nombre_empresa)', 'descripcion' => 'Permite modificar una empresa previamente registrada.'],
            (object)['id' => 34, 'comando' => 'ObtenerEmpresas()', 'descripcion' => 'Permite visualizar todas las empresas previamente registradas.'],
            (object)['id' => 35, 'comando' => 'ObtenerEmpresaId(nro_cuenta)', 'descripcion' => 'Obtiene una unica empresa para visualizar todos sus datos registrados.'],
            (object)['id' => 36, 'comando' => 'reporteitems(fecha_ini,fecha_fin)', 'descripcion' => 'Permite generar un reporte sobre los items pendientes cobrados en un intervalo de tiempo'],
            (object)['id' => 37, 'comando' => 'reporteventas(fecha_ini,fecha_fin)', 'descripcion' => 'Permite generar un reporte de venta de productos en un intervalo de tiempo.'],
        ];
        
        return view('admin.supports.index', compact('comands'));
    }
}
