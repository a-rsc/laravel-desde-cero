<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Project;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListProjectsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_all_projects()
    {
        // Illuminate\Foundation\Testing\TestResponse

        // Es recomendable utilizar otra bbdd
        $this->withoutExceptionHandling(); // Laravel no captura las excepciones i nuestra el error

        // $project = Project::create([
        //     'title' => 'Mi nuevo proyecto',
        //     'description' => 'Descripción de mi nuevo proyecto'
        // ]);

        $project = Project::factory()->create();

        // phpunit --filter test_can_see_all_projects
        // dd($project->toArray());

        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);
        $response->assertViewIs('projects.index');
        $response->assertViewHas('projects');
        $response->assertSee($project->title);
    }

    /**
     * A basic feature test example.
     *
     * @test void
     */
    public function can_see_individual_projects()
    {
        $project = Project::factory()->create();
        $project2 = Project::factory()->create();

        $response = $this->get(route('projects.show', $project));

        $response->assertStatus(200);
        $response->assertViewIs('projects.show');

        $response->assertSee($project->title);
        $response->assertDontSee($project2->title);
    }
}
