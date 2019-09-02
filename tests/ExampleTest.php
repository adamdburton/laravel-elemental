<?php

namespace Click\Elemental\Tests;

class ElementalTest extends TestCase
{
    public function test_route_exists()
    {
        $this->assertRouteExists('elemental.app');
    }

    public function test_response()
    {
        $this->get(route('elemental.app'))
            ->assertHeader('Content-Type', 'text/html; charset=UTF-8')
            ->assertSee('Elemental');
    }
}
