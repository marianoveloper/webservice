<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CategoriaController extends Controller
{
    private $token="b49aa3fe2b78491fe333b252c1e61c20";
    private $domainname="http://34.125.125.16/moodle";

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
       return view('admin.categoria.index',compact('categorias'));
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
        return view('admin.categoria.create',compact('categorias'));
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
        $functionname= 'core_course_create_catefories';
        $serverurl=$this->domainname.'/webservice/rest/server.php'.'?wstoken='.$this->token.'&wsfunction='.$functionname.'&moodlewsrestformat=json'
        .'&categories[0][name]='.$name
        .'categories[0][parent]='.$parent
        .'categories[0][idnumber]='.$idnumber
        .'categories[0][description]='.$description
        .'categories[0][descriptionformat]='.$descriptionformat;

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
        $serverurl=$this->domainname.'/webservice/rest/server.php'.'?wstoken='.$this->token.'&wsfunction='.$functionname.'&moodlewsrestformat=json';

        $serverurl2=$this->domainname.'/webservice/rest/server.php'
        .'?wstoken='.$this->token
        .'&wsfunction='.$functionname
        .'&moodlewsrestformat=json
        &addsubcategories=
        &criteria[0][key]=id&criteria[0][value]='.$id;

        $categorias=Http::get($serverurl);
        $ecategorias=Http::get($serverurl2);

        return view('admin.categorias.edit',compact('categorias','ecategorias'));
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
        //
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
}
