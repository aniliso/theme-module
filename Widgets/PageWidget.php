<?php  namespace Modules\Theme\Widgets;


use Modules\Page\Repositories\PageRepository;

class PageWidget
{
    private $page;

    public function __construct(PageRepository $page)
    {
        $this->page = $page;
    }

    public function children($slug = '')
    {
        if($page = $this->page->findBySlug($slug))
        {
            if(isset($page->children)) {
                $children = $page->children()->orderBy('position', 'ASC')->get();
                return view('widgets.page.children', compact('children'));
            }
        }
        return false;
    }
}