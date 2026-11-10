<?php

test('the cafe detail route renders its detail page', function () {
    $response = $this->get('/Home/1');

    $response->assertOk();
    $response->assertSee('Cafe Detail');
});
