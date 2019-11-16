<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use \App\User;
use Tests\DuskTestCase;

class CadastroGestorCampoUnicoExistenteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser1, Browser $browser2) {
            $browser1->loginAs(User::find(1))
              ->visit('/gestor/cadastrar')
              //->pause(1000)
              ->type('nome', 'gestor01')
              ->type('email','gestor01@gestor')
              ->type('formacao','fisico')
              ->type('cpf', '00011122233')
              ->type('telefone', '00092789698')
              ->type('endereco', 'rua central 55 pe')
              ->type('sexo', 'M')
              ->type('descricao', 'apenas uma descrição')
              ->press('Cadastrar')
              //->pause(3000)
              ->assertSee('Lista de Gestores');
              //->pause(5000);

            $browser2->loginAs(User::find(2))
            ->visit('/gestor/cadastrar')
            ->pause(1000)
            ->type('nome', 'gestor2')
            ->type('email','gestor2@gestor')
            ->type('formacao','ciencias')
            ->type('cpf', '00011122233')
            ->type('telefone', '11192789698')
            ->type('endereco', 'rua padre cicero')
            ->type('sexo', 'F')
            ->type('descricao', 'adkçaskdçaskdasç')
            ->pause(3000)
            ->press('Cadastrar')
            ->assertSee('O cpf já foi cadastrado');
        });
    }
}
