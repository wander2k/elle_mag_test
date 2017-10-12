<?php
require_once 'MemberUpdatePage.php';
//use Page¥MemberUpdate as UpdatePage;

$I = new AcceptanceTester($scenario);
$baseUrl = 'https://www.elle.co.jp';

$page = new MemberUpdatePage($baseUrl, $I);

$page->loginToMemberPage();
$page->unCheckEllemagMamanmail();
$page->registerMailOnEllemaman();

$page->loginToMemberPage();
$page->validateMamanmailSelection(true);

