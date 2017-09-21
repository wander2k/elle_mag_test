<?php
require_once 'MemberUpdatePage.php';
//use Page¥MemberUpdate as UpdatePage;

$I = new AcceptanceTester($scenario);
$baseUrl = 'https://www.elle.co.jp';

$page = new MemberUpdatePage($baseUrl, $I);

$page->loginToMemberPage();
$page->unCheckEllemagEllemail();
$page->registerMailOnElle();

$page->loginToMemberPage();
$page->validateEllemailSelection(true);

