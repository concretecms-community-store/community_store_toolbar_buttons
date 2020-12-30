<?php
namespace Concrete\Package\CommunityStoreToolbarButtons;

use Concrete\Core\Package\Package;

class Controller extends Package
{
    protected $pkgHandle = 'community_store_toolbar_buttons';
    protected $appVersionRequired = '8.0';
    protected $pkgVersion = '1.0';
    protected $packageDependencies = ['community_store'=>'2.0'];

    public function getPackageDescription()
    {
        return t("Adds Community Store shortcut buttons to the toolbar");
    }

    public function getPackageName()
    {
        return t("Community Store Toolbar Buttons");
    }

    public function install()
    {
        parent::install();
    }

    public function on_start()
    {
        $menuHelper = \Core::make('helper/concrete/ui/menu');

        // Button to orders
        $ordersIcon = array(
            'icon' => 'shopping-cart',
            'label' => '&nbsp;' . t('Orders'),
            'position' => 'right',
            'href' => \URL::to('/dashboard/store/orders'),
            'linkAttributes' => array('title'=>t('Orders'))
        );

        $menuHelper->addPageHeaderMenuItem('community_store_toolbar_buttons', 'community_store_toolbar_buttons', $ordersIcon);

        // Button to all products
        $productsIcon = array(
            'icon' => 'list-alt',
            'label' => '&nbsp;' . t('Products'),
            'position' => 'right',
            'href' => \URL::to('/dashboard/store/products'),
            'linkAttributes' => array('title'=>t('Products'))
        );

        $menuHelper->addPageHeaderMenuItem('community_store_toolbar_buttons', 'community_store_toolbar_buttons', $productsIcon);

        // Button to direct product editing
        $productIcon = array(
            'icon' => 'gift',
            'label' => '&nbsp;' . t('Edit Product'),
            'position' => 'left',
            'linkAttributes' => array('title'=>t('Edit Product'))
        );

        $menuHelper->addPageHeaderMenuItem('community_store_toolbar_buttons', 'community_store_toolbar_buttons', $productIcon);

    }
}
