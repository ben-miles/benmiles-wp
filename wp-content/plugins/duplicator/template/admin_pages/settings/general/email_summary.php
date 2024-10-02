<?php

/**
 * Admin Notifications content.
 *
 * Variables
 *
 * @var \Duplicator\Core\Views\TplMng  $tplMng
 * @var array<string, mixed> $tplData
 */

use Duplicator\Installer\Utils\LinkManager;
use Duplicator\Utils\Email\EmailSummary;

defined('ABSPATH') || exit;

$frequency = DUP_Settings::Get('email_summary_frequency');
?>

<h3 class="title"><?php _e('Email Summary', 'duplicator') ?></h3>
<hr size="1" />
<table class="dup-capabilities-selector-wrapper form-table">
    <tr valign="top">
        <th scope="row"><label><?php _e('Frequency', 'duplicator'); ?></label></th>
        <td>
            <select id="email-summary-frequency" name="email_summary_frequency">
                <?php foreach (EmailSummary::getAllFrequencyOptions() as $key => $label) : ?>
                    <option value="<?php echo esc_attr((string) $key); ?>" <?php selected($frequency, $key); ?>>
                        <?php echo esc_html($label); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <p class="description">
                <?php
                $faqUrl = LinkManager::getDocUrl('how-to-disable-email-summaries', 'email_summary', 'how to disable');
                echo sprintf(
                    esc_html_x(
                        'You can view the email summary example %1shere%2s.',
                        '%1s and %2s are the opening and close <a> tags to the summary preview link',
                        'duplicator'
                    ),
                    '<a href="' . EmailSummary::getPreviewLink() . '" target="_blank">',
                    '</a>'
                ) . ' ' . sprintf(
                    esc_html_x(
                        'Learn %1show to disable%2s.',
                        '%1s and %2s are opening and closing link tags to the documentation.',
                        'duplicator'
                    ),
                    '<a href="' . $faqUrl . '" target="_blank" >',
                    '</a>'
                );
                ?>
            </p>
        </td>
    </tr>
</table>
