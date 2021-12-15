<?php

namespace JTaylor\PluginTest\XePlugin\PluginTest\Plugin;

class Resources
{
    public static function setCpts()
    {
        self::setSupportusRoot();
        self::setDonationOrganization();
        self::setTransaction();
        self::setDonationHistory();
        self::setEvidence();
        self::setRegularDonation();
    }

    public static function setCategory()
    {
        self::setSupportusCategory01();
        self::setSupportusCategory02();
        self::setSupportusCategory03();
    }

    protected static function setSupportusRoot()
    {
        \XeRegister::push('settings/menu', 'supportus_root', [
            'title' => '서폿어스 관리',
            'display' => true,
            'description' => '',
            'ordering' => 2000,
        ]);
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
            'menu_path' => 'supportus_root.',
            'description' => '기부기관관리 정의 문서',
            'labels' => $labels_json_string,
            'use_comment' => 'N',
            'show_admin_comment' => 'N',
            'document_dynamic_field' => [
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Text',
                    'skinId' => 'fieldType/xpressengine@Text/fieldSkin/xpressengine@TextDefault',
                    'id' => 'account',
                    'label' => '계좌',
                    'placeholder' => '계좌를 입력해주세요',
                    'revision' => true, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true,
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/dynamic_factory@SuperRelate',
                    'skinId' => 'fieldType/dynamic_factory@SuperRelate/fieldSkin/dynamic_factory@common',
                    'id' => 'account_id',
                    'label' => '회원',
                    'placeholder' => '회원',
                    'r_instance_id' => 'user',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Address',
                    'skinId' => 'fieldType/xpressengine@Address/fieldSkin/xpressengine@default',
                    'id' => 'address',
                    'label' => '주소',
                    'placeholder' => '주소',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Boolean',
                    'skinId' => 'fieldType/xpressengine@Boolean/fieldSkin/xpressengine@BooleanDefault',
                    'id' => 'approval',
                    'label' => '기관 등록 승인 여부',
                    'placeholder' => '기관 등록 승인 여부',
                    'radioLabelYes' => '승인',
                    'radioLabelNo' => '비승인',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Text',
                    'skinId' => 'fieldType/xpressengine@Text/fieldSkin/xpressengine@TextDefault',
                    'id' => 'bank',
                    'label' => '은행',
                    'placeholder' => '은행',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/dynamic_field_extend@TableEditor',
                    'skinId' => 'fieldType/dynamic_field_extend@TableEditor/fieldSkin/dynamic_field_extend@TableEditorDefault',
                    'id' => 'donate_target',
                    'label' => '기부목적',
                    'placeholder' => '기부목적',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Email',
                    'skinId' => 'fieldType/xpressengine@Email/fieldSkin/xpressengine@EmailDefault',
                    'id' => 'email',
                    'label' => '메일주소',
                    'placeholder' => '메일주소',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/dynamic_field_extend@MediaLibrary',
                    'skinId' => 'fieldType/dynamic_field_extend@MediaLibrary/fieldSkin/dynamic_field_extend@MediaDefault',
                    'id' => 'logo',
                    'label' => '로고',
                    'placeholder' => '로고',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/dynamic_field_extend@map',
                    'skinId' => 'fieldType/dynamic_field_extend@map/fieldSkin/dynamic_field_extend@kakaomap',
                    'id' => 'map',
                    'label' => '지도',
                    'placeholder' => '지도',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@CellPhoneNumber',
                    'skinId' => 'fieldType/xpressengine@CellPhoneNumber/fieldSkin/xpressengine@CellPhoneNumberDefault',
                    'id' => 'phoneNum',
                    'label' => '전화번호',
                    'placeholder' => '전화번호',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Number',
                    'skinId' => 'fieldType/xpressengine@Number/fieldSkin/xpressengine@NumberDefault',
                    'id' => 'serialNum',
                    'label' => '고유번호(사업자등록번호)',
                    'placeholder' => '고유번호(사업자등록번호)',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Url',
                    'skinId' => 'fieldType/xpressengine@Url/fieldSkin/xpressengine@UrlDefault',
                    'id' => 'url',
                    'label' => '기부처 홈페이지url',
                    'placeholder' => '기부처 홈페이지url',
                    'author' => 'any',
                    'skinHrefActivate' => 'off',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
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
     * 거래내역 관리 CPT 생성
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
            'menu_path' => 'supportus_root.',
            'description' => '거래내역관리 정의 문서',
            'labels' => $labels_json_string,
            'use_comment' => 'N',
            'show_admin_comment' => 'N',
            'document_dynamic_field' => [
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/dynamic_field_extend@TableEditor',
                    'skinId' => 'fieldType/dynamic_field_extend@TableEditor/fieldSkin/dynamic_field_extend@TableEditorDefault',
                    'id' => 'donate_target',
                    'label' => '기부목적',
                    'placeholder' => '기부목적',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Number',
                    'skinId' => 'fieldType/xpressengine@Number/fieldSkin/xpressengine@NumberDefault',
                    'id' => 'donation_sum',
                    'label' => '해당 거래 기부금 합',
                    'placeholder' => '해당 거래 기부금 합',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Boolean',
                    'skinId' => 'fieldType/xpressengine@Boolean/fieldSkin/xpressengine@BooleanDefault',
                    'id' => 'evidence',
                    'label' => '증빙완료 여부',
                    'placeholder' => '증빙완료 여부',
                    'radioLabelYes' => '증빙 완료',
                    'radioLabelNo' => '증빙 미완료',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Number',
                    'skinId' => 'fieldType/xpressengine@Number/fieldSkin/xpressengine@NumberDefault',
                    'id' => 'evidence_count',
                    'label' => '증빙자료 개수',
                    'placeholder' => '증빙자료 개수',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/dynamic_field_extend@TableEditor',
                    'skinId' => 'fieldType/dynamic_field_extend@TableEditor/fieldSkin/dynamic_field_extend@TableEditorDefault',
                    'id' => 'idx_list',
                    'label' => 'idx 리스트',
                    'placeholder' => 'idx 리스트',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Number',
                    'skinId' => 'fieldType/xpressengine@Number/fieldSkin/xpressengine@NumberDefault',
                    'id' => 'remaining_evidence',
                    'label' => '남은 증빙 금액',
                    'placeholder' => '남은 증빙 금액',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/dynamic_factory@SuperRelate',
                    'skinId' => 'fieldType/dynamic_factory@SuperRelate/fieldSkin/dynamic_factory@common',
                    'id' => 'target_company',
                    'label' => '기부대상기관',
                    'placeholder' => '기부대상기관',
                    'r_instance_id' => 'supportus_donation_organization',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
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
            'menu_path' => 'supportus_root.',
            'description' => '기부내역관리 정의 문서',
            'labels' => $labels_json_string,
            'use_comment' => 'N',
            'show_admin_comment' => 'N',
            'document_dynamic_field' => [
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Text',
                    'skinId' => 'fieldType/xpressengine@Text/fieldSkin/xpressengine@TextDefault',
                    'id' => 'comment',
                    'label' => '남기고 싶은 말',
                    'placeholder' => '남기고 싶은 말',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/dynamic_field_extend@TableEditor',
                    'skinId' => 'fieldType/dynamic_field_extend@TableEditor/fieldSkin/dynamic_field_extend@TableEditorDefault',
                    'id' => 'donate_target',
                    'label' => '기부목적',
                    'placeholder' => '기부목적',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Number',
                    'skinId' => 'fieldType/xpressengine@Number/fieldSkin/xpressengine@NumberDefault',
                    'id' => 'donation',
                    'label' => '기부금',
                    'placeholder' => '기부금',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Boolean',
                    'skinId' => 'fieldType/xpressengine@Boolean/fieldSkin/xpressengine@BooleanDefault',
                    'id' => 'evidence',
                    'label' => '증빙 완료 여부',
                    'placeholder' => '증빙 완료 여부',
                    'radioLabelYes' => '증빙 완료',
                    'radioLabelNo' => '증빙 미완료',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Number',
                    'skinId' => 'fieldType/xpressengine@Number/fieldSkin/xpressengine@NumberDefault',
                    'id' => 'evidence_count',
                    'label' => '증빙자료 개수',
                    'placeholder' => '증빙자료 개수',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Boolean',
                    'skinId' => 'fieldType/xpressengine@Boolean/fieldSkin/xpressengine@BooleanDefault',
                    'id' => 'get',
                    'label' => '수령 여부',
                    'placeholder' => '수령 여부',
                    'radioLabelYes' => '수령 완료',
                    'radioLabelNo' => '수령 미완료',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Category',
                    'skinId' => 'fieldType/xpressengine@Category/fieldSkin/xpressengine@default',
                    'id' => 'give_type',
                    'label' => '후원 정보를 선택해주세요(정기/일시)',
                    'placeholder' => '후원 정보를 선택해주세요(정기/일시)',
                    'category_id' =>'theme',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Number',
                    'skinId' => 'fieldType/xpressengine@Number/fieldSkin/xpressengine@NumberDefault',
                    'id' => 'idx',
                    'label' => 'idx',
                    'placeholder' => 'idx',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Boolean',
                    'skinId' => 'fieldType/xpressengine@Boolean/fieldSkin/xpressengine@BooleanDefault',
                    'id' => 'receipt',
                    'label' => '영수증 발급 여부',
                    'placeholder' => '영수증 발급 여부',
                    'radioLabelYes' => '발급 완료',
                    'radioLabelNo' => '발급 미완료',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Boolean',
                    'skinId' => 'fieldType/xpressengine@Boolean/fieldSkin/xpressengine@BooleanDefault',
                    'id' => 'refundable',
                    'label' => '환불 가능 여부',
                    'placeholder' => '환불 가능 여부',
                    'radioLabelYes' => '가능',
                    'radioLabelNo' => '불가능',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/dynamic_factory@SuperRelate',
                    'skinId' => 'fieldType/dynamic_factory@SuperRelate/fieldSkin/dynamic_factory@common',
                    'id' => 'target_company',
                    'label' => '기부대상기관',
                    'placeholder' => '기부대상기관',
                    'r_instance_id' => 'supportus_donation_organization',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/dynamic_factory@SuperRelate',
                    'skinId' => 'fieldType/dynamic_factory@SuperRelate/fieldSkin/dynamic_factory@common',
                    'id' => 'target_user',
                    'label' => '기부자 이름',
                    'placeholder' => '기부자 이름',
                    'r_instance_id' => 'user',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
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
            'menu_path' => 'supportus_root.',
            'description' => '증빙자료관리 정의 문서',
            'labels' => $labels_json_string,
            'use_comment' => 'N',
            'show_admin_comment' => 'N',
            'document_dynamic_field' => [
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Boolean',
                    'skinId' => 'fieldType/xpressengine@Boolean/fieldSkin/xpressengine@BooleanDefault',
                    'id' => 'approval',
                    'label' => '승인 여부',
                    'placeholder' => '승인 여부',
                    'radioLabelYes' => '승인',
                    'radioLabelNo' => '비승인',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Number',
                    'skinId' => 'fieldType/xpressengine@Number/fieldSkin/xpressengine@NumberDefault',
                    'id' => 'price',
                    'label' => '증빙금액',
                    'placeholder' => '증빙금액',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/dynamic_factory@SuperRelate',
                    'skinId' => 'fieldType/dynamic_factory@SuperRelate/fieldSkin/dynamic_factory@common',
                    'id' => 'transaction',
                    'label' => '증빙 대상 거래',
                    'placeholder' => '증빙 대상 거래',
                    'r_instance_id' => 'supportus_transaction',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
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
            'menu_path' => 'supportus_root.',
            'description' => '정기후원관리 정의 문서',
            'labels' => $labels_json_string,
            'use_comment' => 'N',
            'show_admin_comment' => 'N',
            'document_dynamic_field' => [
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/dynamic_field_extend@TableEditor',
                    'skinId' => 'fieldType/dynamic_field_extend@TableEditor/fieldSkin/dynamic_field_extend@TableEditorDefault',
                    'id' => 'donate_target',
                    'label' => '기부목적',
                    'placeholder' => '기부목적',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Number',
                    'skinId' => 'fieldType/xpressengine@Number/fieldSkin/xpressengine@NumberDefault',
                    'id' => 'donation',
                    'label' => '기부금',
                    'placeholder' => '기부금',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/xpressengine@Boolean',
                    'skinId' => 'fieldType/xpressengine@Boolean/fieldSkin/xpressengine@BooleanDefault',
                    'id' => 'payment',
                    'label' => '금월 결제 여부',
                    'placeholder' => '금월 결제 여부',
                    'radioLabelYes' => '예',
                    'radioLabelNo' => '아니오',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/dynamic_factory@SuperRelate',
                    'skinId' => 'fieldType/dynamic_factory@SuperRelate/fieldSkin/dynamic_factory@common',
                    'id' => 'target_company',
                    'label' => '기부대상기관',
                    'placeholder' => '기부대상기관',
                    'r_instance_id' => 'supportus_donation_organization',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
                [
                    'group' => 'documents_' . $cpt_id,
                    'typeId' => 'fieldType/dynamic_factory@SuperRelate',
                    'skinId' => 'fieldType/dynamic_factory@SuperRelate/fieldSkin/dynamic_factory@common',
                    'id' => 'target_user',
                    'label' => '기부자이름',
                    'placeholder' => '기부자이름',
                    'r_instance_id' => 'user',
                    'author' => 'any',
                    'revision' => false, 'use' => true, 'required' => true, 'sortable' => true, 'searchable' => true
                ],
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
     * 기부테마 카테고리 생성
     */
    protected static function setSupportusCategory01()
    {
        $category_items = [
            ['word' => '교육'],
            ['word' => '의료'],
            ['word' => '문화예술'],
            ['word' => '장학'],
            ['word' => '인식 및 정책개선'],
            ['word' => '인식'],
            ['word' => '생계 및 기초생활'],
            ['word' => '글로벌'],
            ['word' => '주거'],
            ['word' => '보호']
        ];

        $category_id = 'supportus_category_01';

        $category = [
            'slug' => $category_id,
            'name' => '기부 테마',
            'template' => 'multi_select',
            'cpt_ids' => ['supportus_donation_organization','supportus_donation_history'],  // 이 카테고리를 사용하는 CPT_ID 들을 저장
            'items' => $category_items
        ];

        \XeRegister::push('df_category', $category_id, $category);   // 슬러그를 Key 로 저장
    }

    /**
     * 기부대상 카테고리 생성
     */
    protected static function setSupportusCategory02()
    {
        $category_items = [
            ['word' => '동물'],
            ['word' => '아동,청소년'],
            ['word' => '여성'],
            ['word' => '어르신'],
            ['word' => '우리사회'],
            ['word' => '환경']
        ];

        $category_id = 'supportus_category_02';

        $category = [
            'slug' => $category_id,
            'name' => '기부 대상',
            'template' => 'multi_select',
            'cpt_ids' => ['supportus_donation_organization','supportus_donation_history'],  // 이 카테고리를 사용하는 CPT_ID 들을 저장
            'items' => $category_items
        ];

        \XeRegister::push('df_category', $category_id, $category);   // 슬러그를 Key 로 저장
    }

    /**
     * 그룹유형 카테고리 생성
     */
    protected static function setSupportusCategory03()
    {
        $category_items = [
            ['word' => '법정기부금단체'],
            ['word' => '당연지정기부금단체'],
            ['word' => '법정지정기부금단체'],
            ['word' => '기부금대상민간단체']
        ];

        $category_id = 'supportus_category_03';

        $category = [
            'slug' => $category_id,
            'name' => '그룹 유형',
            'template' => 'single_select',
            'cpt_ids' => ['supportus_donation_organization'],  // 이 카테고리를 사용하는 CPT_ID 들을 저장
            'items' => $category_items
        ];

        \XeRegister::push('df_category', $category_id, $category);   // 슬러그를 Key 로 저장
    }

}
