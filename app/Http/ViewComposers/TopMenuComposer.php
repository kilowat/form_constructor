<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TopMenuComposer
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $menuItems = [
            [
                'text' => 'Формы',
                'link' => '/',
                'selected' => false,
            ],
            [
                'text' => 'Группы инпутов',
                'link' => route('inputGroup.index'),
                'selected' => false,
            ],
            [
                'text' => 'Инпуты',
                'link' => route('input.index'),
                'selected' => false,
            ],
            [
                'text' => 'Справочник options',
                'link' => '#',
                'selected' => false,
            ]

        ];

        $curUri = $this->request->getPathInfo();

        foreach ($menuItems as &$item){
            $plink = parse_url($item['link']);
            if(!empty($plink) && key_exists('path', $plink)){
                if($curUri === $plink['path']){
                    $item['selected'] = true;
                }
            }
        }

        $view->with(['menuItems' => $menuItems]);
    }
}