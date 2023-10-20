<?php

namespace App\Controllers;

class Error {
    public function page404(): void
    {
        http_response_code(404);
        echo "Page 404";
    }

}
