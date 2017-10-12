<?php
require_once 'MemberUpdatePage.php';
//use Page¥MemberUpdate as UpdatePage;

$I = new AcceptanceTester($scenario);
$baseUrl = 'https://www.elle.co.jp';

$page = new MemberUpdatePage($baseUrl, $I);

$page->loginToMemberPage();
$page->unCheckEllemagGourmetmail();
$page->registerMailOnEllegourmet();

$page->loginToMemberPage();
$page->validateGourmetmailSelection(true);

