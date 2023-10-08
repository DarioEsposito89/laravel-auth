<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class ProjectController extends Controller
{

    //CREATE

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create():View
    {
        return view("admin.projects.create");
    }


        /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request):RedirectResponse
    {
        $data = $request->validate([
            "title"=>"required|string",
            "language"=>"required|string",
            "link"=>"required|string",
            "description"=>"required|string",
            "thumb"=>"required|string",
            "release"=>"required|date",
        ]); 

        $counter = 0;

        do {
            $slug = Str::slug($data["title"]) . ($counter > 0 ? "-" . $counter : "");

            $alreadyExists = Project::where("slug", $slug)->first();

            $counter++;
            
        } while ($alreadyExists); 

        $data["slug"] = $slug;


        $data["language"] = explode(",", $data["language"]);

        //creo l'istanza di Project, fill per assegnare i dati all'istanza
        //save per salvarli nel database

        $project = Project::create($data);

        return redirect()->route("admin.projects.show", $project->id);
    }

    //READ

    
    /**
     * Display a listing of the resource.
     * 
     * @return View
     */
    public function index():View
    {
        $projects= Project::all();

        return view("admin.projects.index", compact("projects"));
    }
 

    /**
     * Display the specified resource.
     * @param string $slug
     * @return View
     */
    public function show(string $slug):View
    {
        $project = Project::where("slug", $slug)->first();

        return view("admin.projects.show", compact("project"));
    }


    //UPDATE

    
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return View
     */
    public function edit(int $id):View
    {
        $project = Project::findOrFail($id);

        return view("admin.projects.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request, int $id):RedirectResponse
    {
        $project = Project::findOrFail($id);

        $data = $request->validate([
            "title"=>"required|string",
            "language"=>"required|string",
            "link"=>"required|string",
            "description"=>"required|string",
            "thumb"=>"required|string",
            "release"=>"required|date",
        ]); 

        $data["language"] = explode(",", $data["language"]);

        $project->update($data);

        return redirect()->route("admin.projects.show", $project->id);

    }

    //DESTROY 

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id):RedirectResponse
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route("admin.projects.index");
    }
}
