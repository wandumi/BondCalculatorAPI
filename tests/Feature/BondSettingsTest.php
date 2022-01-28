<?php

it('has bondsettings page', function () {
    $response = $this->get('bondsettings');

    $response->assertStatus(200);
});
 
