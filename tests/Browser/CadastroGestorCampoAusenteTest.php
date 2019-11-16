<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use \App\User;
use Tests\DuskTestCase;

class CadastroGestorCampoAusenteTest extends DuskTestCase
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
            ->visit('/gestor/cadastrar')
            ->pause(1000)
            ->type('nome', 'gestor3')
            ->type('email','gestor3@gestor')
            ->type('formacao','artes')
            ->type('cpf', '15935785268')
            ->type('telefone', '')
            ->type('endereco', 'rua joaquim nabuco')
            ->type('sexo', 'M')
            ->type('descricao', 'asfasfasfasfasfa')
            ->pause(3000)
            ->press('Cadastrar')
            ->assertSee('O Campo telefone é obrigatório');
        });
    }
}
