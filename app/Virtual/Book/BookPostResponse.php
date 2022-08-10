<?php

namespace App\Virtual\Book;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     title="Book fridge storring response",
 *     description="Response after success storring",
 * )
 */
class BookPostResponse
{
    /**
     * @OA\Property(
     *     title="Status",
     *     description="Request status",
     *     example="true",
     * )
     * @var bool
     */
    public bool $success;

    /**
     * @OA\Property(
     *     title="Response data",
     *     description="Data after success store",
     *     @OA\Schema(
     *          ref="#/components/schemas/Book"
     *     )
     * )
     * @var Book
     */
    public Book $data;

    /**
     * @OA\Property(
     *     title="Message",
     *     description="Message about response",
     *     example="You successfully rented fridges",
     * )
     * @var string
     */
    public string $message;
}
