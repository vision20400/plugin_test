<?php
namespace JTaylor\PluginTest\XePlugin\PluginTest\Plugin;

class Resources
{
    public static function setCpts()
    {
        self::setRegularDonation();
    }


    /**
     * 정기후원 관리 CPT 생성
     */
    protected static function setRegularDonation()
    {
        $labels_json_string = '{"title":"제목","new_add":"새로 추가","new_add_cpt":"새 %s 추가","cpt_edit":"Edit %s","new_cpt":"새 %s","cpt_view":"%s 보기","cpt_search":"%s 검색","no_search":"%s을(를) 찾을 수 없음","no_trash":"휴지통에서 %s을(를) 찾을 수 없음","parent_txt":"상위 텍스트","all_cpt":"모든 항목"}';

        // 1. CPT 등록 (사용자 정의 문서)
        // 실제로 DB에 저장되는 정보는 아니며, 항상 불러 올 수 있다.
        $cpt_id = 'supportus_regular_donation';
        $cpt = [
            'cpt_id' => $cpt_id,
            'cpt_name' => '정기후원',
            'menu_name' => '정기후원 관리',
            'menu_order' => '950',
            'menu_path' => 'contents.',
            'description' => '정기후원관리 정의 문서',
            'labels' => $labels_json_string,
            'use_comment' => 'N',
            'show_admin_comment' => 'N',
            'document_dynamic_field' => [
            ]
        ];
        \XeRegister::push('dynamic_factory', $cpt_id, $cpt);

        // 2. Config 생성
        // 아래의 정보로 해당 CPT 의 config 를 DB에 생성한다.

        $config = [
            'documentGroup' => 'documents_' . $cpt_id,
            'listColumns' => ['title', 'writer', 'read_count', 'created_at', 'updated_at'],
            'sortListColumns' => ['title', 'writer', 'assent_count', 'read_count', 'created_at', 'updated_at', 'published_at', 'dissent_count'],
            'formColumns' => ['title', 'content'],
            'sortFormColumns' => ['title', 'content']
        ];
        \XeRegister::push('df_config', $cpt_id, $config);

    }
}
