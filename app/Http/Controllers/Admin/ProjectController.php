<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationProjectRequest;
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
    public function store(ValidationProjectRequest $request):RedirectResponse
    {
        $data = $request->validated(); 

        $data["slug"] = $this->generateSlug($data["title"]);


        $data["language"] = explode(",", $data["language"]);

        //creo l'istanza di Project, fill per assegnare i dati all'istanza
        //save per salvarli nel database

        $project = Project::create($data);

        return redirect()->route("admin.projects.show", $project->slug);
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
     * @param string $slug
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(ValidationProjectRequest $request, string $slug):RedirectResponse
    {
        $project = Project::where("slug", $slug)->firstorFail();

        $data = $request->validated(); 

        if($data["title"] !== $project->title){
            $data["slug"] = $this->generateSlug($data["title"]);
        }

        $data["language"] = explode(",", $data["language"]);

        $project->update($data);

        return redirect()->route("admin.projects.show", $project->slug);

    }

    //DESTROY 

    /**
     * Remove the specified resource from storage.
     * @param string $slug
     * @return RedirectResponse
     */
    public function destroy(string $slug):RedirectResponse
    {
        $project = Project::where("slug", $slug)->firstorFail();
        $project->delete();

        return redirect()->route("admin.projects.index");
    }

    // FUNZIONE PER OTTIMIZZARE LE GENERAZIONE DI SLUG

    protected function generateSlug($title){
        $counter = 0;

        do {
            $slug = Str::slug($title) . ($counter > 0 ? "-" . $counter : "");

            $alreadyExists = Project::where("slug", $slug)->first();

            $counter++;
            
        } while ($alreadyExists); 

        return $data["slug"] = $slug;
    }
}