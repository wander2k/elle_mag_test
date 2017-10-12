<?php

class MemberUpdatePage
{
    private $baseUrl = "";
    private $I = null;

    public function __construct($baseUrl, $I)
    {
        $this->baseUrl = $baseUrl;
        $this->I = $I;
    }

    public function loginToMemberPage()
    {
        $I = $this->I;
        $I->wantTo("Go to login page.");
        $I->amOnUrl($this->baseUrl . '/action/login?ReturnUrl=http://www.elle.co.jp/action/update');
        $I->seeElement("#pseudo");
        $I->wantTo("Do login.");
        $I->fillField("UserLogin", "g6003");
        $I->fillField("UserPassword", "hearst");
        $I->click("LoginButton");
        // wait for redirect...
        $I->wait(3);
        $I->amOnUrl($this->baseUrl . "/action/update");

        $I->wantTo("Confirm at member info change page.");
        $I->seeInTitle('会員情報変更｜ハースト婦人画報社');
    }

    // ellemail / gourmetmail / interiormail / mamanmail
    public function unCheckEllemagItem($item_checkbox_name)
    {
        $I = $this->I;
        $I->wantTo("Uncheck mail mag -" . $item_checkbox_name);
        $I->scrollTo(['css'=>'.mailmagItems'], 0, 0);
        $I->uncheckOption($item_checkbox_name);
        $I->wantTo("Submit selection to confirmation page.");
        $I->submitForm("#user_form", []);
        $I->wait(3);
        $I->wantTo("Submit change and confirm.");
        $I->scrollTo("#submitBtn");
        //$I->click('input[type="submit"]');
        $I->click('#submitBtn input[type=submit]');
        //$I->click("Submit");
        //$I->click('//form/*input[@type=submit]');
        //$I->click("この内容で登録する");
        //$I->submitForm("form[name=user_form]", []);
        $I->see("会員情報の変更が完了しました。");
    }

    public function unCheckEllemagEllemail() {
        $this->unCheckEllemagItem("ellemail");
    }
    public function unCheckEllemagGourmetmail() {
        $this->unCheckEllemagItem("gourmetmail");
    }
    public function unCheckEllemagInteriomail() {
        $this->unCheckEllemagItem("interiormail");
    }
    public function unCheckEllemagMamanmail() {
        $this->unCheckEllemagItem("mamanmail");
    }

    public function validateMamanmailSelection($expected)
    {
        $this->validateEllemagItemSelection("mamanmail", $expected);
    }

    public function validateGourmetmailSelection($expected)
    {
        $this->validateEllemagItemSelection("gourmetmail", $expected);
    }

    public function validateInteriormailSelection($expected)
    {
        $this->validateEllemagItemSelection("interiormail", $expected);
    }
    
    public function validateEllemailSelection($expected)
    {
        $this->validateEllemagItemSelection("ellemail", $expected);
    }
    
    // 
    public function validateEllemagItemSelection($itemName, $expected)
    {
        $I = $this->I;
        $I->wantTo("メールマガジン[".$itemName."]の登録確認を行う。");
        $I->scrollTo(['css'=>'.mailmagItems'], 0, 0);
        if ($expected) {
            $I->seeCheckboxIsChecked($itemName);            
        } else {
            $I->dontSeeCheckboxIsChecked($itemName);
        }
    }

    public function registerMailOnElle() {
        $I = $this->I;
        $I->wantTo("Elleトップページへ。");
        $I->amOnUrl($this->baseUrl);
        $I->scrollTo(['css'=>'.mail'], 0, 0);
        $I->wantTo("Register mail.");
        $I->fillField("#right-mm-mailaddress", "lingkun.li@hearst.co.jp");
        $I->click("#right-mm-button");
        $I->scrollTo("#right-mm-thankyou");
        $I->see("ご登録ありがとうございました。");
    }

    public function registerMailOnEllegourmet() {
        $I = $this->I;
        $I->wantTo("Elleグルメトップページへ。");
        $I->amOnUrl($this->baseUrl . "/gourmet");
        $I->scrollTo(['css'=>'.mail'], 0, 0);
        $I->wantTo("Register mail.");
        $I->fillField("#right-mm-mailaddress", "lingkun.li@hearst.co.jp");
        $I->click("#right-mm-button");
        $I->scrollTo("#right-mm-thankyou");
        $I->see("ご登録ありがとうございました。");
    }

    public function registerMailOnElledecor() {
        $I = $this->I;
        $I->wantTo("Elleインテリアトップページへ。");
        $I->amOnUrl($this->baseUrl . "/decor");
        $I->scrollTo(['css'=>'.mail'], 0, 0);
        $I->wantTo("Register mail.");
        $I->fillField("#right-mm-mailaddress", "lingkun.li@hearst.co.jp");
        $I->click("#right-mm-button");
        $I->scrollTo("#right-mm-thankyou");
        $I->see("ご登録ありがとうございました。");
    }

    public function registerMailOnEllemaman() {
        $I = $this->I;
        $I->wantTo("Elle MAMANトップページへ。");
        $I->amOnUrl($this->baseUrl . "/maman");
        $I->scrollTo(['css'=>'.mail'], 0, 0);
        $I->wantTo("Register mail.");
        $I->fillField("#right-mm-mailaddress", "lingkun.li@hearst.co.jp");
        $I->click("#right-mm-button");
        $I->scrollTo("#right-mm-thankyou");
        $I->see("ご登録ありがとうございました。");
    }
    
}
?>