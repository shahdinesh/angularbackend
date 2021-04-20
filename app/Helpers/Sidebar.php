<?php

namespace App\Helpers;

class Sidebar
{
    private function _get_sidebar_data()
    {
        return [
            [
                'icon' => 'fa fa-tachometer',
                'title' => __('Dashboard'),
                'url' => route('dashboard'),
            ],
            [
                'icon' => 'ion-images',
                'title' => __('Role'),
                'child' => [
                    [
                        'icon' => 'ion-clipboard',
                        'title' => __('List'),
                        'url' => route('roles.list'),
                    ],
                    [
                        'icon' => 'ti-pencil-alt',
                        'title' => __('Add'),
                        'url' => route('roles.add'),
                    ],
                ],
            ],
            [
                'icon' => 'ti-pencil-alt',
                'title' => __('School'),
                'url' => route('schools.list'),
            ],
            [
                'icon' => 'ion-university',
                'title' => __('User'),
                'url' => route('users.list'),
            ],
        ];
    }

    public function plotSidebar($sidebar_data = NULL)
    {
        $sidebar_data = $sidebar_data ?: $this->_get_sidebar_data();
        $current_url = url()->current();

        foreach ($sidebar_data as $data) {
            $has_child = (isset($data['child']) && $data['child']);
            $data['url'] = (isset($data['url'])) ? $data['url'] : '#';

            /*
            -- permission check
            if ($data['slug'] && !(\Auth::user()->can($data['slug'])))
                continue;
            elseif ($has_child) {
                $has_permission = FALSE;
                foreach ($data['child'] as $child) {
                    if (\Auth::user()->can($child['slug'])) {
                        $has_permission = TRUE;
                        break;
                    }
                }

                if (!$has_permission)
                    continue;
            }
            */

            $urls = ($has_child) ? array_column($data['child'], 'url') : [$data['url']];
            $is_active = ($current_url == $data['url']) ? "class='active-link'" : (in_array($current_url, $urls) ? "class='active'" : '');

            $a_data = "href='{$data['url']}'";
            echo "<li $is_active>
	            <a $a_data >
                    <i class='{$data['icon']}'></i>
                    <span class='menu-title'>{$data['title']}</span>";
            echo ($has_child) ? "<i class='arrow'></i>" : "";
            echo "</a>";

            if ($has_child) {
                $ul_data = $is_active ? 'in' : '';
                echo "<ul class='collapse $ul_data'>";
                $this->plotSidebar($data['child']);
                echo "</ul>";
            }
            echo "</li>";
            echo "<li class='list-divider'></li>";
	    }
	}
}