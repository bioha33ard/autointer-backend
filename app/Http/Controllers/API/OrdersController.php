<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Telegram\Bot\Laravel\Facades\Telegram;
use Throwable;

class OrdersController extends Controller
{
    protected function getChatId() : array
    {
     return explode(',', ENV('TELEGRAM_CHAT_ID'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Telegram\Bot\Objects\Message
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderRequest $request
     * @return OrderResource|JsonResponse
     */
    public function store(OrderRequest $request): JsonResponse|OrderResource
    {
        try {
            $order = Order::create($request->all());
            foreach ($this->getChatId() as $chat_id) {
                Telegram::sendMessage([
                    'chat_id' => $chat_id,
                    'text' => 'Новый заказ № '. $order->id,
                ]);
                Telegram::sendMessage([
                    'chat_id' => $chat_id,
                    'text' => "
ФИО : {$request->input('full_name')}
Контакты : {$request->input('contacts')}
Модель авто. : {$request->input('model')}
Марка авто. : {$request->input('brand')}
Год выпуска. : {$request->input('year')}
Тип двигателя : {$request->input('engine_type')}
Обьем двигателя :{$request->input('engine_volume')}
КПП : {$request->input('transmission')}
Привод : {$request->input('drive')}
Мощность двигателя: {$request->input('horse_power')}
Кузов : {$request->input('car_body')}
Руль : {$request->input('wheel')}
Качество : {$request->input('quality')}
                                ",
                ]);
            }

            return new OrderResource($order);
        } catch (\Exception $exception) {
            return response()
                ->json(['message' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
