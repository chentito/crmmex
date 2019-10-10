<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\http\Controllers\crmmex\Utils\UtilsController AS Utils;
use App\http\Controllers\crmmex\Clientes\ClientesController AS Clientes;

class nombreEstadoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
      $this->assertTrue( true );

      $this->assertEquals( Utils::nombreEstado( 1 ) , 'AGUASCALIENTES' );

      $response = $this->withHeaders([
        'Accept' => 'application/json',
        'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImI5OGZmMzVlOGI2MjMyZWE3YzA1NjA2YjcwNTcwMDQ1ZmI0YmI3MTVjMDQ1YjRmMWVmY2Y0NTYzZWMyMDRmZTFjM2U3NTQyYzNkYzJhNTNlIn0.eyJhdWQiOiI2IiwianRpIjoiYjk4ZmYzNWU4YjYyMzJlYTdjMDU2MDZiNzA1NzAwNDVmYjRiYjcxNWMwNDViNGYxZWZjZjQ1NjNlYzIwNGZlMWMzZTc1NDJjM2RjMmE1M2UiLCJpYXQiOjE1NzA3MzEyMTYsIm5iZiI6MTU3MDczMTIxNiwiZXhwIjoxNjAyMzUzNjE2LCJzdWIiOiIyMiIsInNjb3BlcyI6W119.f2f0a1TaZWDu85FFq65YA0Bimt-9TY2wo8udoINLhSEx03A5InCX4JzrCQihaYM7CN-RvEFZUARX-vPBVN0vQlRj0qFrgb-dfiYFXjSuAj3ndZCP1oTkhzlTuVIwK-LdKZAwmwbMTnSsMgL4HoR-a3FyBUeG9iMcnTKJzC1aGo3VynMxycmuOp0czOh0y-cTIelaZHl9V_QW9Fmhr9h9yYAAmDO0IUwWamJJ5kcC3M4BNN6KmnNWyspa_j-YO_1tKYx6ZHpVoYO81UqIvcBhfyITUjrhzLQzrBSN9MHtMztA7QzLqAKIiyGR1BTLpzcSQSNxmCVM76qMxmNuGlbjt-3yqsNkoBpLJbsf7Uq9OKlK14H3aTff5aaOukrzdIi-_f0dAL2ejHMfX1ov4SB8SXmBWDZIOzEBNTMWTf7T0EAPIlL4UsDRI5uT5KUVd-0qBUDh032fsdfKUebzeSS1esgo8EzcliAoWhBIBG4EDV8QSz7TBwMtUfxTvB-ssbLGLr7HkkU9pHArNuBHED3U9_EBV52KLxlni4azBbuaYMZEXsbTy3kEzUZYxxAVByHVyStJqNaBKBZJjiU7dVNqdd-vVNzw-FZGyku54eU3rXIulQo7IdXKoEa3noXtfadmsNPdTyP_KJJnH926jWGDyp-AB1ws8nVc9h9Kfz8X4DI',
        ])->json( 'GET' , '/api/listadoClientes' );
      $response->assertStatus(200);

      $response = $this->json( 'GET' , '/enviaPropuesta/5' );
      $response->assertSuccessful()->assertJson([ 'Enviado correctamente' ]);

    }

}
