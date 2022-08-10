<?php

namespace App\Virtual\Book;

use App\Enum\BookStatusEnum;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     type="object",
 *     title="Book data",
 *     description="Data about book",
 * )
 */
class Book
{
    /**
     * @OA\Property(
     *     title="Booking id",
     *     example="1",
     * )
     * @var int
     */
    public int $id;

    /**
     * @OA\Property(
     *     title="Location",
     *     description="Name of store location",
     *     example="Уилмингтон (Северная Каролина)",
     * )
     * @var string
     */
    public string $location;

    /**
     * @OA\Property(
     *     title="Temperature",
     *     description="Temperature fore curent store",
     *     example="-6",
     * )
     * @var string
     */
    public string $temperature;

    /**
     * @OA\Property(
     *     title="Date store from",
     *     description="Date store from mm/dd/yyyy",
     *     example="08/15/2022",
     * )
     * @var string
     */
    public string $booked_from;

    /**
     * @OA\Property(
     *     title="Date store to",
     *     description="Date store to mm/dd/yyyy",
     *     example="08/15/2022",
     * )
     * @var string
     */
    public string $booked_to;

    /**
     * @OA\Property(
     *     title="Cost of storing",
     *     description="Cost of storing for all period",
     *     example="200",
     * )
     * @var float
     */
    public float $cost;

    /**
     * @OA\Property(
     *     title="Volume",
     *     description="Volume of goods that completly stored",
     *     example="4",
     * )
     * @var float
     */
    public float $volume;

    /**
     * @OA\Property(
     *     title="Status",
     *     description="Status of booking",
     *     type="string",
     *     enum={"reserved", "active", "finished"},
     *     example="reserved"
     * )
     * @var BookStatusEnum
     */
    public BookStatusEnum $status;

    /**
     * @OA\Property(
     *     title="Code",
     *     description="Code for store and get it back",
     *     example="VJz1ipIiAUcc",
     * )
     * @var string
     */
    public string $code;

    /**
     * @OA\Property(
     *     title="Count blocks",
     *     description="Count blocks needed/exists to store",
     *     example="2",
     * )
     * @var int
     */
    public int $count_blocks;
}
