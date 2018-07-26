<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $board = new \App\Classes\GaltonBoard();
    $board->addBalls(10);
    $board->dropAllBalls();
//    dd($board->getBalls());

    $containers = (array) null;
    for ($i = 0; $i < $board->getAmountOfContainers(); $i++) {
        $containers[0+(2*$i)] = (int) null;
    }

    foreach ($board->getBalls() as $ball) {
        if (!isset($containers[$ball->getX()])) {
            $containers[$ball->getX()] = (int) null;
        }
        $containers[$ball->getX()]++;
    }

    return view('home', [
        'containers' => $containers
    ]);
});
