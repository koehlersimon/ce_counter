<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function() {

        $icons = [
            'ce-counter-icon' => 'EXT:ce_counter/Resources/Public/Icons/ext_icon.svg',
            'ce-counter-record' => 'EXT:ce_counter/Resources/Public/Icons/ce-countdown.svg',
        ];

        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        foreach ($icons as $identifier => $path) {
            $iconRegistry->registerIcon(
                $identifier,
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                ['source' => $path]
            );
        }

    }
);
