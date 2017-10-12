<?php
require_once 'MemberUpdatePage.php';
require_once 'ElleMobileMainPage.php';
//use Page¥MemberUpdate as UpdatePage;

$I = new AcceptanceTester($scenario);
$baseUrl = 'https://www.elle.co.jp';

$page = new MemberUpdatePage($baseUrl, $I);

$page->loginToMemberPage();
$page->unCheckEllemagEllemail();
//$page->registerMailOnElle();

$I->resizeWindow(414, 700);
$mobileEllePage = new ElleMobileMainPage('http://m.elle.co.jp', $I);
$mobileEllePage->registerMailOnElle();

$I->maximizeWindow();
$page->loginToMemberPage();
$page->validateEllemailSelection(true);

