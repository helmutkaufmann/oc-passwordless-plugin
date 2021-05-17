<?php namespace Mercator\Passwordless;

use System\Classes\PluginBase;


class Plugin extends PluginBase
{

    /**
     * Component details
     * @return array
     */
    public function componentDetails()
    {
        return [
            'name'        => 'mercator.passwordless::lang.plugin.name',
            'description' => 'mercator.passwordless::lang.plugin.description',
            'icon'        => 'wn-icon-key',
            'homepage'    => 'https://github.com/mercator/wn-passwordless-plugin'
        ];
    }

    /**
     * Registers components
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Mercator\Passwordless\Components\Account' => 'passwordlessAccount'
        ];
    }

    /**
     * Registers mail templates
     * @return array
     */
    public function registerMailTemplates()
    {
        return [
            'mercator.passwordless::mail.login' => 'Passwordless login'
        ];
    }

    public function registerSchedule($schedule)
    {
        $schedule->call(function () {
            \Mercator\Passwordless\Models\Token::clearExpired();
        })->daily();
    }
}
