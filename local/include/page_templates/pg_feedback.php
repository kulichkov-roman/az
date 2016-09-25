<div class="content-text">
    <?
    $APPLICATION->IncludeComponent('bitrix:main.include', '',
        Array(
            'AREA_FILE_SHOW' => 'file',
            'PATH' => '/local/include/page_templates/pg_feedback_text.php',
            'EDIT_TEMPLATE' => ''
        ),
        false
    );
    ?>
</div>
<div class="contact-form-wrapper">
    <?
    $APPLICATION->IncludeComponent('bitrix:main.include', '',
        Array(
            'AREA_FILE_SHOW' => 'file',
            'PATH' => '/local/include/page_templates/pg_feedback_form.php',
            'EDIT_TEMPLATE' => ''
        ),
        false
    );
    ?>
</div>