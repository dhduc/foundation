<?php
/**
 * Search form
 */
?>
<ul class="menu">
    <li>
        <form action="<?php echo esc_url(home_url('/')); ?>" id="searchform" method="get">
            <input type="search" onfocus="if (this.value == 'Search') {this.value = '';}"
                   onblur="if (this.value == '')  {this.value = 'Search';}" id="s" name="s"
                   value="Search"/>
        </form>
    </li>
    <li>
        <button type="button" class="button radius" id="btn-submit"><i class="fa fa-fw fa-search"></i>Search</button>
    </li>
</ul>