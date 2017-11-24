<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel');

    }

    public function testProductoStore()
    {
        $this->post('/api/produtos/producto', [
            'nombre'      => 'Yogurt',
            'categoria'   => 'Lacteos',
            'cantidad'    => 1,
           
        ])
            ->seeJson([
                'Mensaje' => 'El producto se creo correctamente',
            ]);
    }

    public function testProductoUpdate()
    {
        $this->put('/api/produtos/producto/4', [
            'nombre'      => 'Leche',
            'categoria'   => 'Carne',
            'cantidad'    => 2,
           
        ])
            ->seeJson([
                'Mensaje' => 'El Registro se Actualizo con exito!',
            ]);
    }

    public function testProductoShow()
    {
        $this->get('/api/produtos/producto/4')
            ->seeJson([
                'nombre'      => 'Leche',
                'categoria'   => 'Carne',
                'cantidad'    => 2,
                
            ]);
    }



}
