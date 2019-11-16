<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use \App\User;

class CadastroAlunoEmailInvalidoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
            ->visit('/aluno/cadastrar')
            ->assertSee('Cadastrar')
            ->type('nome', 'aluno')
            ->type('email', 'A@A')
            ->type('filiacao', 'filiacao_aluno')
            ->type('cpf', '88877799956')
            ->type('telefone', '123456789')
            ->type('endereco', 'Teste de endereço')
            ->type('descricao', 'teste de descrição')
            ->type('sexo', 'F')
            ->pause(3000)
            ->press('Cadastrar')
            ->assertSee('O email é muito pequeno (min 4 caracteres)');
        });
    }
}
