<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CategoriaController extends Controller
{
    private $token="b02426262cc38ff6d8b45769bca408fd";
    private $domainname="http://34.125.207.192/moodle";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $functionname="core_course_get_categories";
       $serverurl=$this->domainname.'/webservice/rest/server.php'.'?wstoken='.$this->token.'&wsfunction='.$functionname.'&moodlewsrestformat=json';

       $categorias=Http::get($serverurl);
       return view('admin.categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $functionname="core_course_get_categories";
        $serverurl=$this->domainname.'/webservice/rest/server.php'.'?wstoken='.$this->token.'&wsfunction='.$functionname.'&moodlewsrestformat=json';

        $categorias=Http::get($serverurl);
        return view('admin.categorias.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'scategoria'=>'required',
            'idnumber'=>'required',
            'description'=>'required',
        ]);

        $name= $request->input('name');
        $parent=$request->input('scategoria');
        $idnumber=$request->input('idnumber');
        $description=$request->input('description');
        $descriptionformat= 1;
        $functionname= 'core_course_create_categories';
        $serverurl=$this->domainname . '/webservice/rest/server.php'
        . '?wstoken=' . $this->token
        . '&wsfunction='.$functionname
        .'&moodlewsrestformat=json'
        .'&categories[0][name]='.$name
        .'&categories[0][parent]='.$parent
        .'&categories[0][idnumber]='.$idnumber
        .'&categories[0][description]='.$description
        .'&categories[0][descriptionformat]='.$descriptionformat;

        $createcategory=Http::get($serverurl);

        return redirect()->route('admin.categorias.index')->with('info','se creo la categoria');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $functionname="core_course_get_categories";
        $serverurl=$this->domainname . '/webservice/rest/server.php'
        . '?wstoken=' . $this->token
        . '&wsfunction='.$functionname
        .'&moodlewsrestformat=json';
        $serverurl2=$this->domainname . '/webservice/rest/server.php'
        . '?wstoken=' . $this->token
        . '&wsfunction='.$functionname
        .'&moodlewsrestformat=json&addsubcategories=0&criteria[0][key]=id&criteria[0][value]='.$id;

        $categorias=Http::get($serverurl);
        $ecategoria=Http::get($serverurl2);

        return view('admin.categorias.edit',compact('categorias','ecategoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'scategoria'=>'required',
            'idnumber'=>'required',
            'description'=>'required',
        ]);

        $id= $request->input('id');
        $name= $request->input('name');
        $idnumber=$request->input('idnumber');
        $parent=$request->input('scategoria');
        $description=$request->input('description');
        $descriptionformat= 1;
        $functionname="core_course_update_categories";
        $serverurl=$this->domainname . '/webservice/rest/server.php'
        . '?wstoken=' . $this->token
        . '&wsfunction='.$functionname
        .'&moodlewsrestformat=json'
        .'&categories[0][id]='.$id
        .'&categories[0][name]='.$name
        .'&categories[0][idnumber]='.$idnumber
        .'&categories[0][parent]='.$parent
        .'&categories[0][description]='.$description
        .'&categories[0][descriptionformat]='.$descriptionformat;

        $ucategorias=Http::get($serverurl);

        return redirect()->route('admin.categorias.index')->with('info','se actualizó la categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function veliminar($id)
    {
        $functionname="core_course_get_categories";
        //listado de categorias
        $serverurl=$this->domainname . '/webservice/rest/server.php'
        . '?wstoken=' . $this->token
        . '&wsfunction='.$functionname
        .'&moodlewsrestformat=json';
        //categoria especifica sin subcategorias
        $serverurl2=$this->domainname . '/webservice/rest/server.php'
        . '?wstoken=' . $this->token
        . '&wsfunction='.$functionname
        .'&moodlewsrestformat=json&addsubcategories=0&criteria[0][key]=id&criteria[0][value]='.$id;
        //categoria especifica con subcategoria
        $serverurl2=$this->domainname . '/webservice/rest/server.php'
        . '?wstoken=' . $this->token
        . '&wsfunction='.$functionname
        .'&moodlewsrestformat=json&addsubcategories=0&criteria[0][key]=id&criteria[0][value]='.$id;

        $categorias=Http::get($serverurl);
        $ecategoria=Http::get($serverurl2);
       // $scategoria=Http::get($serverurl3);

        return view('admin.categorias.veliminar',compact('categorias','ecategoria'));
    }
}
