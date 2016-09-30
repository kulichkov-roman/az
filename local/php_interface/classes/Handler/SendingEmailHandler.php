<?php

/**
 * Class SendingEmailHandler
 */
class SendingEmailHandler
{
    public static function SendFeedbackForm(&$arFields)
    {
        $environment = \YT\Environment\EnvironmentManager::getInstance();

        if($arFields["IBLOCK_ID"] == $environment->get('feedbackIBlockId'))
        {
            $bpe = new \CIBlockPropertyEnum;

            $arOrder = array(
                'property_id'=>'ASC',
                'VALUE'=>'ASC'
            );

            $arFilter = array(
                'IBLOCK_ID' => $environment->get('feedbackIBlockId'),
                'CODE' => $environment->get('feedbackSubjectTreatmentPropCode')
            );

            $rsPropertyEnums = $bpe->GetList(
                $arOrder,
                $arFilter
            );

            $arTypeEnum = array();
            while($arItem = $rsPropertyEnums->GetNext())
            {
                $arTypeEnum['SUBJECT_TREATMENT'][$arItem['ID']] = $arItem;
            }

            $propId = $arFields['PROPERTY_VALUES'][$environment->get('feedbackSubjectTreatmentPropId')];

            $arEventFields = array(
                'NAME' => $arFields['NAME'],
                'PHONE' => $arFields['PROPERTY_VALUES'][$environment->get('feedbackPhonePropId')] <> '' ? $arFields['PROPERTY_VALUES'][$environment->get('feedbackPhonePropId')] : '-',
                'EMAIL' => $arFields['PROPERTY_VALUES'][$environment->get('feedbackEmailPropId')] <> '' ? $arFields['PROPERTY_VALUES'][$environment->get('feedbackEmailPropId')] : '-',
                'PREVIEW_TEXT' => $arFields['PREVIEW_TEXT'] <> '' ? $arFields['PREVIEW_TEXT'] : '-',
                'SUBJECT_TREATMENT' => $arTypeEnum[$environment->get('feedbackSubjectTreatmentPropCode')][$arFields['PROPERTY_VALUES'][$environment->get('feedbackSubjectTreatmentPropId')][0]]['VALUE']
            );

            \CEvent::Send('FEEDBACK_SENT', SITE_ID, $arEventFields);
        }

        if($arFields["IBLOCK_ID"] == $environment->get('subscribeIBlockId'))
        {
            $arEventFields = array(
                'NAME' => $arFields['NAME'],
            );

            \CEvent::Send('SUBSCRIBE_SENT', SITE_ID, $arEventFields);
        }
    }
}
?>