<?php
namespace Concrete\Package\CommunityStoreToolbarButtons;

use Package;

class Controller extends Package
{
    protected $pkgHandle = 'community_store_toolbar_buttons';
    protected $appVersionRequired = '5.7.5';
    protected $pkgVersion = '0.2';

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
        $installed = \Package::getInstalledHandles();
        if(!(is_array($installed) && in_array('community_store',$installed)) ) {
            throw new ErrorException(t('This package requires that Community Store be installed'));
        } else {
            parent::install();
        }
    }

    public function on_start()
    {
        $menuHelper = \Core::make('helper/concrete/ui/menu');

        // Button to orders
        $ordersIcon = array(
            'icon' => 'shopping-cart',
            'label' => '&nbsp' . t('Orders'),
            'position' => 'right',
            'href' => \URL::to('/dashboard/store/orders'),
            'linkAttributes' => array('title'=>t('Orders'))
        );

        $menuHelper->addPageHeaderMenuItem('community_store_toolbar_buttons', 'community_store_toolbar_buttons', $ordersIcon);

        // Button to all products
        $productsIcon = array(
            'icon' => 'list-alt',
            'label' => '&nbsp' . t('Products'),
            'position' => 'right',
            'href' => \URL::to('/dashboard/store/products'),
            'linkAttributes' => array('title'=>t('Products'))
        );

        $menuHelper->addPageHeaderMenuItem('community_store_toolbar_buttons', 'community_store_toolbar_buttons', $productsIcon);

        // Button to direct product editing
        $productIcon = array(
            'icon' => 'gift',
            'label' => '&nbsp' . t('Edit Product'),
            'position' => 'left',
            'linkAttributes' => array('title'=>t('Edit Product'))
        );

        $menuHelper->addPageHeaderMenuItem('community_store_toolbar_buttons', 'community_store_toolbar_buttons', $productIcon);

    }
}
