<?php

namespace App\Http\Controllers\Admin; // <- se spostato a mano aggiungere Admin nel namespace

use App\Http\Controllers\Controller; // <----- a aggiungere se il controller lo abbiamo spostato a mano

use App\Http\Requests\ProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use GuzzleHttp\Psr7\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();

        $new_project = new Project();
        //$new_project->name = $form_data['name'];
        $new_project->slug = Project::generateSlug($form_data['name']);
        //$new_project->cover_image = $form_data['cover_image'];
        //$new_project->client_name = $form_data['client_name'];
        //$new_project->summary = $form_data['summary'];
        $new_project->fill($form_data);
        $new_project->save();
        //dd($new_project);

        return redirect()->route('admin.projects.show', $new_project);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();

        if($form_data['name'] != $project->name){
            $form_data['slug'] = Project::generateSlug($form_data['name']);
        }else{
            $form_data['slug'] = $project->slug;
        }

        $project->update($form_data);

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('deleted',"The Project $project->name has been correctly deleted");
    }
}
