<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\BookingRequest;
use App\Models\Block;
use App\Models\Booking;
use App\Models\Location;
use App\Traits\APIResponse;
use Carbon\Carbon;
use DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class BookingController extends ApiController
{
    use APIResponse;

    public function index()
    {
        //
    }
    /**
     * @OA\Post(
     *     path="/book",
     *     operationId="bookingCreate",
     *     tags={"Booking"},
     *     summary="Бронирование",
     *     security={
     *       {"bearerAuth": {}},
     *     },
     *     @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  ref="#/components/schemas/BookPostResponse"
     *              )
     *          )
     *     ),
     *     @OA\Response(
     *          response="422",
     *          description="Something went wrong",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  ref="#/components/schemas/BookPostErrorResponse"
     *              )
     *          )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *          required={"location", "volume", "temperature", "date_from", "date_to"},
     *          @OA\Property(property="location", type="integer", example="1"),
     *          @OA\Property(property="volume", type="string", example="4.00"),
     *          @OA\Property(property="temperature", type="integer", example="-4"),
     *          @OA\Property(property="date_from", type="string", example="08/15/2022"),
     *          @OA\Property(property="date_to", type="string", example="08/25/2022"),
     *         )
     *      )
     * )
     * @return JsonResponse
     */
    public function store(BookingRequest $request)
    {
        $validated = $request->validated();
        $location = Location::find($validated['location']);
        $dateFrom = Carbon::createFromFormat('m/d/Y', $validated['date_from'], $location->time_zone)
            ->startOfDay()
            ->setTimezone('UTC')
        ;
        $dateTo = Carbon::createFromFormat('m/d/Y', $validated['date_to'], $location->time_zone)
            ->endOfDay()
            ->setTimezone('UTC')
        ;
        $volume = $validated['volume'];
        $temperature = $validated['temperature'];
        $temperatureFrom = $temperature - 2;
        $temperatureTo = $temperature + 2;
        if ($temperatureTo > 0) {
            $temperatureTo = 0;
        }

        $blocks = DB::table('blocks', 'b')
            ->select(DB::raw('b.*'))
            ->leftJoin('whs as w', 'b.wh_id', 'w.id')
            ->where('empty', '=', 1)
            ->whereBetween('w.temperature', [$temperatureFrom, $temperatureTo])
            ->orderBy('volume')
        ;
        if ($blocks->count() == 0) {
            return $this->sendError('All blocks are full', 200);
        }
        $days = $dateTo->diffInDays($dateFrom) ?? 1;

        $book = Booking::create([
            'user_id' => auth()->user()->id,
            'location_id' => $location->id,
            'temperature' => $temperature,
            'booked_from' => $dateFrom,
            'booked_to' => $dateTo,
        ]);
        /** @var Block $block */
        $volumeRented = 0;
        $price = 0;
        foreach ($blocks->lazy() as $block) {
            Block::find($block->id)->update(['booking_id' => $book->id, 'empty' => 0]);
            $volumeRented += $block->volume;
            $price += $block->price;
            if ($volumeRented >= $volume) {
                break;
            }
        }
        $price = $price * $days;
        $book->update(['price' => $price, 'volume' => $volumeRented]);

        return $this->sendResponse(
            [
                'id' => $book->id,
                'location' => $location->name,
                'temperature' => $book->temperature,
                'booked_from' => $book->booked_from->format('m/d/Y'),
                'booked_to' => $book->booked_to->format('m/d/Y'),
                'cost' => $book->price,
                'volume' => $book->volume,
                'status' => $book->status,
                'code' => $book->code,
                'count_blocks' => $book->blocks()->count()
            ],
            'You successfully rented fridges'
        );
    }


    public function show(Booking $booking)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Booking $booking)
    {
        //
    }
}
