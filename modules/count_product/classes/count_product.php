<?php
class CountProduct extends Module
{
    public function __construct()
    {
        $this->name = 'CountProduct';
        $this->tab = 'front_office_features';
        $this->version = '1.0';
        $this->author = 'keiko';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.5', 'max' => '1.6');
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('CountProduct');
        $this->description = $this->l('Count Product');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('MYMODULE_NAME')) {
            $this->warning = $this->l('No name provided');
        }
    }
    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        if (!parent::install() ||
        !$this->registerHook('leftColumn') ||
        !$this->registerHook('header') ||
        !Configuration::updateValue('MYMODULE_NAME', 'my friend')
    ) {
        return false;
    }

    return true;
}
public function uninstall()
{
    if (!parent::uninstall() ||
    !Configuration::deleteByName('MYMODULE_NAME')
) {
    return false;
}

return true;
}
}
