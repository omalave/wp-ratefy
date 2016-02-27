<?php
/*
Plugin Name: Custom List Table Example
Plugin URI: http://www.mattvanandel.com/
Description: A highly documented plugin that demonstrates how to create custom List Tables using official WordPress APIs.
Version: 1.4.1
Author: Matt van Andel
Author URI: http://www.mattvanandel.com
License: GPL2
*/
/*  Copyright 2015  Matthew Van Andel  (email : matt@mattvanandel.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


if(!class_exists('WP_List_Table')){
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Wp_Ratefy_Public_Display extends WP_List_Table {

    function __construct(){
        global $status, $page;
                
        //Set parent defaults
        parent::__construct( array(
            'singular'  => 'Review',     //singular name of the listed records
            'plural'    => 'Reviews',    //plural name of the listed records
            'ajax'      => false        //does this table support ajax?
        ) );
        
    }

    function column_default($item, $column_name){
        switch($column_name){
            case 'id_review':
            case 'reviewer_name':
            case 'reviewer_email':
            case 'reviewer_comment':
            case 'reviewer_rating':
                return $item[$column_name];
            case 'action':
                return $this->get_approve_link($item['id_review']);
            default:
                return print_r($item,true); //Show the whole array for troubleshooting purposes
        }
    }

    function column_reviewer_name($item){
        
        //Build row actions
        $actions = array(
            'delete'    => sprintf('<a href="?page=%s&action=%s&review=%s">Delete</a>',$_REQUEST['page'],'delete',$item['id_review']),
        );
        
        //Return the title contents
        return sprintf('%1$s <span style="color:silver">(id:%2$s)</span>%3$s',
            /*$1%s*/ $item['reviewer_name'],
            /*$2%s*/ $item['id_review'],
            /*$3%s*/ $this->row_actions($actions)
        );
    }

    function get_approve_link( $id ) {

        return "<a href='?page=".$_REQUEST['page']."&action=approve&review=".$id."'>Approve</a>";
    }

    function column_cb($item){
        return sprintf(
            '<input type="checkbox" name="%1$s[]" value="%2$s" />',
            /*$1%s*/ $this->_args['singular'],  //Let's simply repurpose the table's singular label ("movie")
            /*$2%s*/ $item['id_review']                //The value of the checkbox should be the record's id
        );
    }

    function get_columns(){
        $columns = array(
            'cb'               => '<input type="checkbox" />', //Render a checkbox instead of text
            'reviewer_name'    => 'Name',
            'reviewer_email'   => 'Comment',
            'reviewer_comment' => 'Rate',
            'action' => 'Action'
        );
        return $columns;
    }

    function get_sortable_columns() {
        $sortable_columns = array(
            'reviewer_name'  => array('reviewer_name',true),
            'reviewer_email' => array('reviewer_email',false)
        );
        return $sortable_columns;
    }

    function get_bulk_actions() {
        $actions = array(
            'delete'    => 'Delete',
            'approve'    => 'Approve'
        );
        return $actions;
    }

    function process_bulk_action() {
        
        //Detect when a bulk action is being triggered...
        if( 'delete'===$this->current_action() ) {
            wp_die('Items deleted (or they would be if we had items to delete)!');
        }
        
        //Detect when a bulk action is being triggered...
        if( 'approve'===$this->current_action() ) {
            wp_die('Items approved (or they would be if we had items to approve)!');
        }

    }

    /**
     * Retrieve reviews data from the database
     *
     * @param int $per_page
     * @param int $page_number
     *
     * @return mixed
     */
    public static function get_reviews( $per_page = 5, $page_number = 1 ) {

      global $wpdb;

      $sql = "SELECT * FROM {$wpdb->prefix}ratefy_data";

      if ( ! empty( $_REQUEST['orderby'] ) ) {
        $sql .= ' ORDER BY ' . esc_sql( $_REQUEST['orderby'] );
        $sql .= ! empty( $_REQUEST['order'] ) ? ' ' . esc_sql( $_REQUEST['order'] ) : ' ASC';
      }

      $sql .= " LIMIT $per_page";
      $sql .= ' OFFSET ' . ( $page_number - 1 ) * $per_page;


      $result = $wpdb->get_results( $sql, 'ARRAY_A' );
      $result = array_merge($result,$result,$result,$result,$result,$result);
      return $result;

    }

    function prepare_items($search = NULL) {
        global $wpdb; //This is used only if making any database queries

        /**
         * First, lets decide how many records per page to show
         */
        $per_page = 5;
        
        
        /**
         * REQUIRED. Now we need to define our column headers. This includes a complete
         * array of columns to be displayed (slugs & titles), a list of columns
         * to keep hidden, and a list of columns that are sortable. Each of these
         * can be defined in another method (as we've done here) before being
         * used to build the value for our _column_headers property.
         */
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        
        
        /**
         * REQUIRED. Finally, we build an array to be used by the class for column 
         * headers. The $this->_column_headers property takes an array which contains
         * 3 other arrays. One for all columns, one for hidden columns, and one
         * for sortable columns.
         */
        $this->_column_headers = array($columns, $hidden, $sortable);
        
        
        /**
         * Optional. You can handle your bulk actions however you see fit. In this
         * case, we'll handle them within our package just to keep things clean.
         */
        $this->process_bulk_action();


        /* If the value is not NULL, do a search for it. */
        if( $search != NULL ){

            // Trim Search Term
            $search = trim($search);

            /* Notice how you can search multiple columns for your search term easily, and return one data set */
            $data = $wpdb->get_results($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."ratefy_data WHERE `reviewer_name` LIKE '%%%s%%'", $search, $search), ARRAY_A);

        } else {
            $data = $this->get_reviews();  
        }      
        
        /**
         * REQUIRED for pagination. Let's figure out what page the user is currently 
         * looking at. We'll need this later, so you should always include it in 
         * your own package classes.
         */
        $current_page = $this->get_pagenum();
        
        /**
         * REQUIRED for pagination. Let's check how many items are in our data array. 
         * In real-world use, this would be the total number of items in your database, 
         * without filtering. We'll need this later, so you should always include it 
         * in your own package classes.
         */
        $total_items = count($data);
        
        
        /**
         * The WP_List_Table class does not handle pagination for us, so we need
         * to ensure that the data is trimmed to only the current page. We can use
         * array_slice() to 
         */
        $data = array_slice($data,(($current_page-1)*$per_page),$per_page);
        
        
        
        /**
         * REQUIRED. Now we can add our *sorted* data to the items property, where 
         * it can be used by the rest of the class.
         */
        $this->items = $data;
        
        
        /**
         * REQUIRED. We also have to register our pagination options & calculations.
         */
        $this->set_pagination_args( array(
            'total_items' => $total_items,                  //WE have to calculate the total number of items
            'per_page'    => $per_page,                     //WE have to determine how many items to show on a page
            'total_pages' => ceil($total_items/$per_page)   //WE have to calculate the total number of pages
        ) );
    }


}

function tt_render_list_page(){
    
    //Create an instance of our package class...
    $testListTable = new Wp_Ratefy_Public_Display();
    //Fetch, prepare, sort, and filter our data...

        //Fetch, prepare, sort, and filter our data...
        if( isset($_GET['s']) ){
                $testListTable->prepare_items($_GET['s']);
        } else {
                $testListTable->prepare_items();
        }    


    ?>
    <div class="wrap">
        
        <div id="icon-users" class="icon32"><br/></div>
        <h2>WP Ratefy</h2>
                
        <!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
        <form id="movies-filter" method="get">
            <!-- For plugins, we also need to ensure that the form posts back to our current page -->
            <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
            <!-- Now we can render the completed list table -->
            <?php $testListTable->search_box('search', 'search_id'); ?>
            <?php $testListTable->display() ?>
        </form>
        
    </div>
    <?php
}

tt_render_list_page();