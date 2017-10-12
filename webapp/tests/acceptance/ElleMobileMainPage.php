<?php

class ElleMobileMainPage
{
    private $baseUrl = "";
    private $I = null;

    public function __construct($baseUrl, $I)
    {
        $this->baseUrl = $baseUrl;
        $this->I = $I;
    }

    public function registerMailOnElle() {
        $I = $this->I;
        $I->wantTo("Elleトップページへ。");
        $I->amOnUrl($this->baseUrl);
        $I->scrollTo(['css'=>'.mail'], 0, 0);
        $I->wantTo("Register mail.");
        //$I->fillField("#mm_register_mailaddress", "lingkun.li@hearst.co.jp");
        $I->fillField("#right-mm-mailaddress", "lingkun.li@hearst.co.jp");
        //$I->click("#mm_register_form input[type=submit]");
        $I->click("#right-mm-button");
        //$I->scrollTo("#mm_register_thankyou");
        $I->click("#right-mm-thankyou");
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