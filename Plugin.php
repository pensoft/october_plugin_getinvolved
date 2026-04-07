<?php namespace Pensoft\GetInvolved;

use Backend;
use Pensoft\Accordions\Controllers\Accordions;
use Pensoft\Accordions\Models\Category;
use Pensoft\GetInvolved\Components\Form;
use System\Classes\PluginBase;

/**
 * GetInvolved Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'Get Involved',
            'description' => 'No description provided yet...',
            'author'      => 'Pensoft',
            'icon'        => 'icon-external-link-square'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     */
    public function register(): void
    {

    }

    /**
     * Boot method, called right before the request route.
     */
    public function boot(): void
    {
        \Event::listen('backend.menu.extendItems', function($navigationManager) {
            $user = \BackendAuth::getUser(); // get the logged in user
            if(!$user->is_superuser){
                $navigationManager->removeMainMenuItem('October.System', 'system');
                $navigationManager->removeMainMenuItem('Pensoft.Cardprofiles', 'profile-cards');
                $navigationManager->removeMainMenuItem('Pensoft.Calendar', 'main-menu-item');
                $navigationManager->removeMainMenuItem('Pensoft.Accordions', 'main-menu-item');
                $navigationManager->removeMainMenuItem('Pensoft.Partners', 'main-menu-item');
                $navigationManager->removeMainMenuItem('Pensoft.Media', 'media-center');
                $navigationManager->removeMainMenuItem('Pensoft.Articles', 'main-menu-item');
                $navigationManager->removeMainMenuItem('Pensoft.Library', 'main-menu-item');
                $navigationManager->removeMainMenuItem('Pensoft.Jumbotron', 'main-menu-item');
            }
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     */
    public function registerComponents(): array
    {
        return [
            Form::class => 'get_involved_form',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     */
    public function registerPermissions(): array
    {

        return [
            'pensoft.getinvolved.all' => [
                'tab' => 'GetInvolved',
                'label' => 'Permission GetInvolved'
            ],
        ];
    }
}