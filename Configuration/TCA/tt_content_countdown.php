<?php
defined('TYPO3_MODE') or die();

call_user_func(function () {
	$frontendLanguageFilePrefix = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
		'tt_content',
		'CType',
		[
			'Countdown',
			'ce_counter',
			'ce-counter-icon'
		],
		'header',
		'after'
	);

	// New palette header
	$GLOBALS['TCA']['tt_content']['palettes']['header'] = array(
		'showitem' => 'header, header_layout, header_position','canNotCollapse' => 1
	);

	$GLOBALS['TCA']['tt_content']['palettes']['countdown'] = array(
		'showitem' => 'counter_time, counter_direction','canNotCollapse' => 1
	);

	$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['ce_counter'] = 'ce-counter-record';
	$GLOBALS['TCA']['tt_content']['types']['ce_counter'] = [
		'showitem' => '
			--palette--;' . $frontendLanguageFilePrefix . 'palette.general;general,
			--palette--;;header,
			subheader,
			--palette--;LLL:EXT:ce_counter/Resources/Private/Language/locallang_db.xlf:counter_settings;countdown,
			--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
			--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
			--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
			--palette--;;language,
			--div--;' . $frontendLanguageFilePrefix . 'tabs.access,
			hidden;' . $frontendLanguageFilePrefix . 'field.default.hidden,
			--palette--;' . $frontendLanguageFilePrefix . 'palette.access;access,
			--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
			rowDescription,
		'
	];

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', [

		'counter_time' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:ce_counter/Resources/Private/Language/locallang_db.xlf:counter_time',
			'description' => 'LLL:EXT:ce_counter/Resources/Private/Language/locallang_db.xlf:counter_time.description',
			'config' => [
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'eval' => 'datetime',
				'range' => [
					'upper' => strtotime('+10 years', time()),
					'lower' => time(),
				],
			],
		],
		'counter_direction' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:ce_counter/Resources/Private/Language/locallang_db.xlf:counter_direction',
			'description' => 'LLL:EXT:ce_counter/Resources/Private/Language/locallang_db.xlf:counter_direction.description',
			'config' => [
			'type' => 'select',
			'renderType' => 'selectSingle',
			'default' => 0,
			'items' => [
				['LLL:EXT:ce_counter/Resources/Private/Language/locallang_db.xlf:counter_direction.down', 0],
				['LLL:EXT:ce_counter/Resources/Private/Language/locallang_db.xlf:counter_direction.up', 1],
			],
			],
		],

	]);

});
