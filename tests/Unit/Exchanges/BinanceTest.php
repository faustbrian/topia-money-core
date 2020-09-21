<?php

use KodeKeep\TopiaMoney\DTO\Rate;
use KodeKeep\TopiaMoney\DTO\Symbol;
use KodeKeep\TopiaMoney\Exchanges\Binance;

it('can fetch all symbols', function () {
    $subject = new Binance();

    expect($response = $subject->symbols())->toBeArray();
    expect($response[0])->toBeInstanceOf(Symbol::class);
});

it('can fetch the historical rates for the given symbol', function () {
    $subject = new Binance();

    expect($response = $subject->historical(new Symbol(['symbol' => 'HOTETH'])))->toBeArray();
    expect($response[0])->toBeInstanceOf(Rate::class);
});

it('can fetch the current rate for the given symbol', function () {
    $subject = new Binance();

    expect($subject->rate(new Symbol(['symbol' => 'HOTETH'])))->toBeInstanceOf(Rate::class);
});