<?php
namespace JTaylor\PluginTest\XePlugin\PluginTest\Plugin;

class Resources
{
    public static function setCpts()
    {
        self::setDonationOrganization();
        self::setTransaction();
        self::setDonationHistory();
        self::setEvidence();
        self::setRegularDonation();
    }

    /**
     * 기부기관 관리 CPT 생성
     */
    protected static function setDonationOrganization()
    {
        $labels_json_string = '{"title":"제목","new_add":"새로 추가","new_add_cpt":"새 %s 추가","cpt_edit":"Edit %s","new_cpt":"새 %s","cpt_view":"%s 보기","cpt_search":"%s 검색","no_search":"%s을(를) 찾을 수 없음","no_trash":"휴지통에서 %s을(를) 찾을 수 없음","parent_txt":"상위 텍스트","all_cpt":"모든 항목"}';

        // 1. CPT 등록 (사용자 정의 문서)
        // 실제로 DB에 저장되는 정보는 아니며, 항상 불러 올 수 있다.
        $cpt_id = 'supportus_donation_organization';
        $cpt = [
            'cpt_id' => $cpt_id,
            'cpt_name' => '기부기관',
            'menu_name' => '기부기관 관리',
            'menu_order' => '2010',
            'menu_path' => '.',
            'description' => '기부기관관리 정의 문서',
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

    /**
     * 정기후원 관리 CPT 생성
     */
    protected static function setTransaction()
    {
        $labels_json_string = '{"title":"제목","new_add":"새로 추가","new_add_cpt":"새 %s 추가","cpt_edit":"Edit %s","new_cpt":"새 %s","cpt_view":"%s 보기","cpt_search":"%s 검색","no_search":"%s을(를) 찾을 수 없음","no_trash":"휴지통에서 %s을(를) 찾을 수 없음","parent_txt":"상위 텍스트","all_cpt":"모든 항목"}';

        // 1. CPT 등록 (사용자 정의 문서)
        // 실제로 DB에 저장되는 정보는 아니며, 항상 불러 올 수 있다.
        $cpt_id = 'supportus_transaction';
        $cpt = [
            'cpt_id' => $cpt_id,
            'cpt_name' => '거래내역',
            'menu_name' => '거래내역 관리',
            'menu_order' => '2020',
            'menu_path' => '.',
            'description' => '거래내역관리 정의 문서',
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

    /**
     * 기부내역 관리 CPT 생성
     */
    protected static function setDonationHistory()
    {
        $labels_json_string = '{"title":"제목","new_add":"새로 추가","new_add_cpt":"새 %s 추가","cpt_edit":"Edit %s","new_cpt":"새 %s","cpt_view":"%s 보기","cpt_search":"%s 검색","no_search":"%s을(를) 찾을 수 없음","no_trash":"휴지통에서 %s을(를) 찾을 수 없음","parent_txt":"상위 텍스트","all_cpt":"모든 항목"}';

        // 1. CPT 등록 (사용자 정의 문서)
        // 실제로 DB에 저장되는 정보는 아니며, 항상 불러 올 수 있다.
        $cpt_id = 'supportus_donation_history';
        $cpt = [
            'cpt_id' => $cpt_id,
            'cpt_name' => '기부내역',
            'menu_name' => '기부내역 관리',
            'menu_order' => '2030',
            'menu_path' => '.',
            'description' => '기부내역관리 정의 문서',
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

    /**
     * 증빙자료 관리 CPT 생성
     */
    protected static function setEvidence()
    {
        $labels_json_string = '{"title":"제목","new_add":"새로 추가","new_add_cpt":"새 %s 추가","cpt_edit":"Edit %s","new_cpt":"새 %s","cpt_view":"%s 보기","cpt_search":"%s 검색","no_search":"%s을(를) 찾을 수 없음","no_trash":"휴지통에서 %s을(를) 찾을 수 없음","parent_txt":"상위 텍스트","all_cpt":"모든 항목"}';

        // 1. CPT 등록 (사용자 정의 문서)
        // 실제로 DB에 저장되는 정보는 아니며, 항상 불러 올 수 있다.
        $cpt_id = 'supportus_evidence';
        $cpt = [
            'cpt_id' => $cpt_id,
            'cpt_name' => '증빙자료',
            'menu_name' => '증빙자료 관리',
            'menu_order' => '2040',
            'menu_path' => '.',
            'description' => '증빙자료관리 정의 문서',
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
            'menu_order' => '2050',
            'menu_path' => '.',
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
