<?php

class Pagination
{

    private $max = 10; // max page links
    private $index = 'page'; // key for GET (number page)
    private $current_page; // current page
    private $total; // total count of record
    private $limit; // limit records on page

    /**
     * @param type $total <p>total count of record</p>
     * @param type $currentPage <p>num of current page</p>
     * @param type $limit <p>limit records on page</p>
     * @param type $index <p>key for url</p>
     */
    public function __construct($total, $currentPage, $limit, $index)
    {
        # total records
        $this->total = $total;

        # setting total records on page
        $this->limit = $limit;

        # setting key in url
        $this->index = $index;

        # setting count pages
        $this->amount = $this->amount();
        
        # setting num of current page
        $this->setCurrentPage($currentPage);
    }

    /**
     *  for output links
     * @return HTML-code for navigation links
     */
    public function get()
    {
        # for record links
        $links = null;

        # getting limit for cycle
        $limits = $this->limits();
        
        $html = '<ul class="pagination">';
        # generate links
        for ($page = $limits[0]; $page <= $limits[1]; $page++) {
            # if current is current page, we can't link and adding class active
            if ($page == $this->current_page) {
                $links .= '<li class="active"><a href="#">' . $page . '</a></li>';
            } else {
                # else generate links
                $links .= $this->generateHtml($page);
            }
        }

        # If links wasn't creating
        if (!is_null($links)) {
            # IF current page not first
            if ($this->current_page > 1)
            # Generate link "first"
                $links = $this->generateHtml(1, '&lt;') . $links;

            # If current page not first
            if ($this->current_page < $this->amount)
            # Generate link "last"
                $links .= $this->generateHtml($this->amount, '&gt;');
        }

        $html .= $links . '</ul>';

        # return html
        return $html;
    }

    /**
     * For generation HTML-code link
     * @param integer $page - number of page
     * 
     * @return
     */
    private function generateHtml($page, $text = null)
    {
        # If link text not found
        if (!$text)
        # Indicate where text is num of page
            $text = $page;

        $currentURI = rtrim($_SERVER['REQUEST_URI'], '/') . '/';
        $currentURI = preg_replace('~/[0-9]+~', '', $currentURI);
        # Generating HTML code link and return it
        return
                '<li><a href="/page/'  . $page . '">' . $text . '</a></li>';
    }

    /**
     *  for getting where should starting
     * 
     * @return array with begin and end counting  
     */
    private function limits()
    {
        # Founding left links (for active links will be on the center)
        $left = $this->current_page - round($this->max / 2);
        
        # Found begin counting
        $start = $left > 0 ? $left : 1;

        # If we have at least $this->max pages
        if ($start + $this->max <= $this->amount) {
        # Setting end of cycle before $this->max mages or just minimum
            $end = $start > 1 ? $start + $this->max : $this->max;
        } else {
            # End - total count pages
            $end = $this->amount;

            # Begin - minus $this->max from end
            $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
        }

        # return
        return
                array($start, $end);
    }

    /**
     * for setting current pages
     * 
     * @return
     */
    private function setCurrentPage($currentPage)
    {
        # getting num of page
        $this->current_page = $currentPage;

        # if current page > 0
        if ($this->current_page > 0) {
            # if current page < total count pages
            if ($this->current_page > $this->amount)
            # setting page on last
                $this->current_page = $this->amount;
        } else
        # setting page on first
            $this->current_page = 1;
    }

    /** 
     * @return count of pages
     */
    public function amount()
    {
        return ceil($this->total / $this->limit);
    }

}
