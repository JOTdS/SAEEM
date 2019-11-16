<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use \App\User;
use Tests\DuskTestCase;

class CadastroAlunoCpfInvalidoTest extends DuskTestCase
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
            ->type('email', 'aluno@aluno')
            ->type('filiacao', 'filiacao_aluno')
            ->type('cpf', '888777999558')
            ->type('telefone', '123456789')
            ->type('endereco', 'Teste de endereço')
            ->type('descricao', 'teste de descrição')
            ->type('sexo', 'F')
            ->pause(3000)
            ->press('Cadastrar')
            ->assertSee('O cpf deve ser definido com 11 caracteres');
        });
    }
}
