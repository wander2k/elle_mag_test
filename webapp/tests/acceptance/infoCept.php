<?php 
$I->wait(10);
$I->wantTo('Perform actions and see result');
$I->amOnPage('/');
$I->wantTo('Check the title of info page.');
$I->seeInTitle('【ELLE】ファッション・セレブ最新情報｜エル・オンライン');
