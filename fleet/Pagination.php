<?php

class Pagination {

    private $page = 1;
    private $record = 10;
    private $total;
    private $style;
    private $url;

    public function __construct($url = null, $style = array()) {
        if ($url) $this->url = $url;
        if ($style) $this->style = $style;
        else $this->style = array(
                'blocked' => 'blocked',
                'active' => 'active',
                'paginate' => 'paginate'
            );
    }

    public function total($total) {
        if($total) $this->total = $total;
    }

    public function page($page) {
        if($page) $this->page = $page;
    }
    public function record($record) {
        if($record) $this->record = $record;
    }

    public function pages() {
        return ceil($this->total / $this->record);
    }

    public function start() {
        return $this->record * $this->page - $this->record;
    }

    public function limit() {
        return $this->record * $this->page;
    }

    public function render() {
        if ($this->total) {
            $render = '';
            if ($this->pages() > 1) {
                $render .= '<div class="'.$this->style['paginate'].'">';
                $render .= $this->page > 1 ? $this->_active($this->url . ($this->page - 1), 'previous') : $this->_blocked('previous');
                for ($i =- 3; $i <= 3; $i++) {
                    if ($this->page + $i >= 1 && $this->page + $i <= $this->pages()) {
                        $render .= $i !=0 ? $this->_active($this->url . ($this->page + $i), ($this->page + $i)) : $this->_blocked($this->page + $i);
                    }
                }
                $render .= $this->page < $this->pages() ? $this->_active($this->url . ($this->page + 1), 'next') : $this->_blocked('next');
                $render .= '</div>';
            }
            return $render;
        }
    }

    private function _blocked($name) {
        return "<span class=\"{$this->style['active']}\"> {$name} </span>";
    }

    private function _active($url, $name) {
        return "<a class=\"{$this->style['active']}\" href=\"{$url}\"> {$name} </a>";
    }

}
