<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use \App\User;

class CadastrarGestorTest extends DuskTestCase
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
            ->type('nome', 'gestor1')
            ->type('email','gestor1@gestor')
            ->type('formacao','formado no senai')
            ->type('cpf', '00011821437')
            ->type('telefone', '00092789698')
            ->type('endereco', 'rua central 55 pe')
            ->type('sexo', 'M')
            ->type('descricao', 'apenas uma descrição')
            ->press('Cadastrar')
            ->pause(3000)
            ->assertSee('Lista de Gestores')
            ->pause(5000);
        });
    }
}
