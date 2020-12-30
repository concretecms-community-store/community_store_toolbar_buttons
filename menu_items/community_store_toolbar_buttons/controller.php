<?php

namespace Concrete\Package\CommunityStoreToolbarButtons\MenuItem\CommunityStoreToolbarButtons;

use Concrete\Core\Page\Page;
use Concrete\Package\CommunityStore\Src\CommunityStore\Product\Product as StoreProduct;

class Controller extends \Concrete\Core\Application\UserInterface\Menu\Item\Controller
{
    public function displayItem()
    {
        // check permissions
        $canView = false;
        $p = Page::getByPath('/dashboard/store/products');

        $cpc = new \Concrete\Core\Permission\Checker($p);

        if ($cpc->canViewPage()) {
            $canView = true;
        }

        return $canView;
    }

    public function getMenuItemLinkElement()
    {
        $a = parent::getMenuItemLinkElement();
        $page = Page::getCurrentPage();

        // if we haven't set a url, it must be dynamic
        if ($page && !$page->isAdminArea()) {
            if ($a->getAttribute('href') == '#') {
                if ($page && !$page->isAdminArea()) {
                    $product = StoreProduct::getByCollectionID($page->getCollectionID());
                    if ($product) {
                        $a->href = \URL::to('/dashboard/store/products/edit/' . $product->getID());
                        return $a;
                    } else {
                        return '';
                    }
                }
            }

            return $a;
        }
    }
}
