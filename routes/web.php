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
    $board->addBalls(20);
    $board->dropAllBalls();

    $containers = (array) null;
    for ($i = 0; $i < $board->getAmountOfContainers(); $i++) {
        $containers[(0+$i)*2] = (int) null;
    }

    foreach ($board->getBalls() as $ball) {
        $containers[$ball->getX()]++;
    }

    return view('home', [
        'containers' => $containers
    ]);
});
