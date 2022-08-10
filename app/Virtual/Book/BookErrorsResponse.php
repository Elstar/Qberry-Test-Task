<?php

namespace App\Virtual\Book;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     title="Book data errors",
 *     description="All errors after book",
 * )
 */
class BookErrorsResponse
{
    /**
     * @OA\Property(
     *     title="Location Erros",
     *     description="All errors about location",
     *     @OA\Items(
     *          type="string"
     *     ),
     *     example={"The selected location is invalid", "The location must be an integer.", "The location field is required."}
     * )
     * @var array
     */
    public array $location;

    /**
     * @OA\Property(
     *     title="Volume Erros",
     *     description="All errors about volume",
     *     @OA\Items(
     *          type="string"
     *     ),
     *     example={"The volume must be greater than 0.", "The volume field is required.", "The volume must be a number."}
     * )
     * @var array
     */
    public array $volume;

    /**
     * @OA\Property(
     *     title="Temperature Erros",
     *     description="All errors about temperature",
     *     @OA\Items(
     *          type="string"
     *     ),
     *     example={"The temperature must be less than 0.", "The temperature field is required.", "The temperature must be a number."}
     * )
     * @var array
     */
    public array $temperature;

    /**
     * @OA\Property(
     *     title="Date from Erros",
     *     description="All errors about date from",
     *     @OA\Items(
     *          type="string"
     *     ),
     *     example={"The date from field is required.", "The date from must be a date after now.", "The date from does not match the format m/d/Y.", "Invalid format"}
     * )
     * @var array
     */
    public array $date_from;

    /**
     * @OA\Property(
     *     title="Date to Erros",
     *     description="All errors about date to",
     *     @OA\Items(
     *          type="string"
     *     ),
     *     example={
     *          "The date from field is required.",
     *          "The date to must be a date after now.",
     *          "The date to does not match the format m/d/Y.",
     *          "Invalid format",
     *          "Range of store can`t be more than 24 days.",
     *          "The date to must be a date after or equal to date from."
     *      }
     * )
     * @var array
     */
    public array $date_to;
}
