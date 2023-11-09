<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\BigQuestion;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     * 
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');
        factory(BigQuestion::class)->create();
        $response->assertSee('東京の難読地名クイズ');

    }
}
