<?php

namespace App\Virtual\Book;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     title="Book data fridge storring fail response",
 *     description="Response data after unsuccess storring",
 * )
 */
class BookErrorResponse
{
    /**
     * @OA\Property(
     *     title="Erros",
     *     description="All errors after request",
     *     @OA\Schema(
     *          ref="#/components/schemas/BookErrorsResponse"
     *     )
     * )
     * @var BookErrorsResponse
     */
    public BookErrorsResponse $errors;
}
