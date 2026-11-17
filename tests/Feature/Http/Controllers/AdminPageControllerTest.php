<?php

test('the admin dashboard route renders the dashboard view', function () {
    $response = $this->get(route('admin-page.index'));

    $response->assertOk();
    $response->assertSee('PontiPin admin dashboard');
    $response->assertSee('No cafes yet.');
    $response->assertSee('No reviews yet.');
});
