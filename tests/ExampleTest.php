<?php

namespace Click\Elemental\Tests;

class ElementalTest extends TestCase
{
    public function test_routes_exists()
    {
        $this->assertRouteExists('elemental.app');
        $this->assertRouteExists('elemental.app.asset');
    }

    public function test_app_response()
    {
        $this->get(route('elemental.app'))
            ->assertHeader('Content-Type', 'text/html; charset=UTF-8')
            ->assertSee('Elemental');
    }
}
