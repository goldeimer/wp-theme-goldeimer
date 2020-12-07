<?php

declare(strict_types=1);

namespace Goldeimer\WordPress\WpTheme;

use Goldeimer\PhpUtil\Traits\Singleton;

final class WpCustomizeHeaderFlag extends WpCustomize
{
    use Singleton;

    private const CLASS_NAME = 'goldeimer-header-flag-link';

    private $sectionHandle;
    private $settingHandleFlagImage;
    private $settingHandleIsEnabled;
    private $settingHandleTargetUrl;

    private $flagImage;
    private $targetUrl;

    public function __construct()
    {
        parent::__construct();

        $this->sectionHandle = self::handle('flag');
        $this->settingHandleFlagImage = self::handle('flag', 'flagImage');
        $this->settingHandleIsEnabled = self::handle('flag', 'isEnabled');
        $this->settingHandleTargetUrl = self::handle('flag', 'targetUrl');

        if (!$this->isEnabled()) {
            return;
        }

        $this->flagImage = \get_theme_mod($this->settingHandleFlagImage);
        $this->targetUrl = \get_theme_mod($this->settingHandleTargetUrl);

        if (empty($this->flagImage) || empty($this->targetUrl)) {
            return;
        }

        \add_action(
            'wp_footer',
            [$this, 'wpFooter']
        );

        \add_action(
            'wp_head',
            [$this, 'wpHead']
        );
    }

    public function wpFooter(): void
    {
        echo '<a class="' . self::CLASS_NAME . '"'
             . ' href="' . $this->targetUrl . '"'
             . ' target="_blank"></a>';
    }

    public function wpHead(): void
    {
        echo '<style type="text/css">'
                . 'a.' . self::CLASS_NAME . ' {'
                    . 'background-image: url("' . $this->flagImage . '");'
                . '}'
            . '</style>';
    }

    public function settings(
        \WP_Customize_Manager $wp_customize
    ): void {
        $wp_customize->add_section(
            $this->sectionHandle,
            [
                'title' => __('Header Flag'),
                'priority' => 99
            ]
        );

        /// ----- isEnabled

        $wp_customize->add_setting(
            $this->settingHandleIsEnabled,
            [
                'default'   => false,
                'transport' => 'refresh'
            ]
        );

        $wp_customize->add_control(
            $this->settingHandleIsEnabled,
            [
                'label' => __('Is header flag enabled?'),
                'section' => $this->sectionHandle,
                'type' => 'checkbox'
            ]
        );

        /// ----- targetUrl

        $wp_customize->add_setting(
            $this->settingHandleTargetUrl,
            [
                'default'   => '',
                'transport' => 'refresh'
            ]
        );

        $wp_customize->add_control(
            $this->settingHandleTargetUrl,
            [
                'label' => __('Target URL'),
                'section' => $this->sectionHandle,
                'type' => 'url'
            ]
        );

        /// ----- image

        $wp_customize->add_setting(
            $this->settingHandleFlagImage,
            [
                'default'   => '',
                'transport' => 'refresh'
            ]
        );

        $wp_customize->add_control(
            new \WP_Customize_Image_Control(
                $wp_customize,
                $this->settingHandleFlagImage,
                [
                    'label' => __('Flag image (ideal aspect ratio 4:3)'),
                    'section' => $this->sectionHandle
                ]
            )
        );
    }

    private function isEnabled(): bool
    {
        return boolval(
            \get_theme_mod($this->settingHandleIsEnabled)
        );
    }
}
