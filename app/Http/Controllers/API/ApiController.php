<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *     title="Fridge Master API documentation",
 *     version="1.0.0",
 *     description="OpenAPI for Fridge Master service. Make/check booking for store/ed products to fridge",
 *     @OA\Contact(
 *         email="admin@example.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="//www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * @OA\Tag(
 *     name="Booking",
 *     description="Api methods for booking",
 * )
 * @OA\Server(
 *     description="API test local server",
 *     url="//localhost:8000/api"
 * )
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 * )
 */

abstract class ApiController extends Controller
{

}
