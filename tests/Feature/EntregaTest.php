<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;
use App\Models\User;

class EntregaTest extends TestCase
{
    //Isso é para resetar o banco de memoria durante cada teste

    use RefreshDatabase;

    //teste 1 criar entrega sem token

    public function test_entrega_sem_token() {

        //tentar fazer post sem enviar o token
        $response = $this->postJson('/api/entregas',[
            'destino' => 'Rua teste',
            'status' => 'pendente'
        ]);

        //aqui verifica se foi barrado (401 não autorizado)
        $response->assertStatus(401);
    }

    //teste 2 usuario logado irá conseguir criar.

    public function test_entrega_com_token(){

        //cria um usuario falso
        $user= User::factory()->create();

        // finge que é esse usuario que faz o actingAs(faz o post)

        $response = $this->actingAs($user)->postJson('/api/entregas',[
            'destino' => 'Av Paulista, 1000',
            'status' => 'pendente'
        ]);

        // verificação se foi um sucesso
        $response->assertStatus(201);

        //conferir se realmente gravou no db
        $this->assertDatabaseHas('entregas',[
            'destino' => 'Av Paulista, 1000'
        ]);
    }
        
    
}
