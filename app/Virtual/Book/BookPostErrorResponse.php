<?php

namespace App\Virtual\Book;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     title="Book fridge storring fail response",
 *     description="Response after unsuccess storring",
 * )
 */
class BookPostErrorResponse
{
    /**
     * @OA\Property(
     *     title="Status",
     *     description="Request status",
     *     example="false",
     * )
     * @var bool
     */
    public bool $success;

    /**
     * @OA\Property(
     *     title="Response data",
     *     description="Data after success store",
     *     @OA\Schema(
     *          ref="#/components/schemas/BookErrorResponse"
     *     )
     * )
     * @var BookErrorResponse
     */
    public BookErrorResponse $data;

    /**
     * @OA\Property(
     *     title="Message",
     *     description="Message about response",
     *     example="Validation error",
     * )
     * @var string
     */
    public string $message;
}
