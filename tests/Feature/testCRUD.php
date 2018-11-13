<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class testCRUD extends TestCase
{

	# RUN IN CONSOLE WITH
	# ./vendor/bin/phpunit

    /**
     * Validate fields example
     *
     * @return void
     */
    public function validateFields()
    {

    	$this->visit('/new')
		->type('test_username','username')
		->type('User Name','names')
		->type('Paternal','paternal_surname')
		->type('Maternal','maternal_surname')
		->type('test@email.com','email')
		->type('daniel','password')
        ->press('Crear Usuario')
        ->seePageIs('/');

    }


}
