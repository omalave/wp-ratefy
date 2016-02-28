    <link rel="stylesheet" href="/wp-content/plugins/wp-ratefy/public/html/stylesheet.css">

    <?php $id_post = get_the_ID(); ?>
    <?php
      global $wpdb;
      $sql = 'SELECT * FROM ' . $wpdb->base_prefix . 'ratefy_data WHERE reviewer_postid = "'. $id_post . '"';

      $reviews = $wpdb->get_results($sql);
      $num_rows_data = $wpdb->num_rows;
      //SELECT `id_review`,SUM(`reviewer_rating`) AS service_vote FROM wp_ratefy_data WHERE `reviewer_postid` = 101

      $sql5stars = 'SELECT COUNT(id_review) as votes5 FROM ' . $wpdb->base_prefix . 'ratefy_data WHERE reviewer_postid = '. $id_post . ' AND reviewer_rating = 5';
      $sql5starsVotes = $wpdb->get_results($sql5stars);
      $rate5stars = $sql5starsVotes[0]->votes5;
      $rate5starsx100 = ($rate5stars / $num_rows_data) * 100;

      $sql4stars = 'SELECT COUNT(id_review) as votes4 FROM ' . $wpdb->base_prefix . 'ratefy_data WHERE reviewer_postid = '. $id_post . ' AND reviewer_rating = 4';
      $sql4starsVotes = $wpdb->get_results($sql4stars);
      $rate4stars = $sql4starsVotes[0]->votes4;
      $rate4starsx100 = ($rate4stars / $num_rows_data) * 100;

      $sql3stars = 'SELECT COUNT(id_review) as votes3 FROM ' . $wpdb->base_prefix . 'ratefy_data WHERE reviewer_postid = '. $id_post . ' AND reviewer_rating = 3';
      $sql3starsVotes = $wpdb->get_results($sql3stars);
      $rate3stars = $sql3starsVotes[0]->votes3;
      $rate3starsx100 = ($rate3stars / $num_rows_data) * 100;

      $sql2stars = 'SELECT COUNT(id_review) as votes2 FROM ' . $wpdb->base_prefix . 'ratefy_data WHERE reviewer_postid = '. $id_post . ' AND reviewer_rating = 2';
      $sql2starsVotes = $wpdb->get_results($sql2stars);
      $rate2stars = $sql2starsVotes[0]->votes2;
      $rate2starsx100 = ($rate2stars / $num_rows_data) * 100;

      $sql1stars = 'SELECT COUNT(id_review) as votes1 FROM ' . $wpdb->base_prefix . 'ratefy_data WHERE reviewer_postid = '. $id_post . ' AND reviewer_rating = 1';
      $sql1starsVotes = $wpdb->get_results($sql1stars);
      $rate1stars = $sql1starsVotes[0]->votes1;
      $rate1starsx100 = ($rate1stars / $num_rows_data) * 100;

      $average_weighted = (5*$rate5stars + 4*$rate4stars + 3*$rate3stars + 2*$rate2stars + 1*$rate1stars) / ($rate5stars+$rate4stars+$rate3stars+$rate2stars+$rate1stars);
      $a_w = round($average_weighted);
    ?>

    <?php 

      if ($num_rows_data > 0) {

    ?>
      <div class="row">
          <div class="col-xs-12 col-md-6 col-lg-12">
              <div class="well well-sm">
                  <div class="row">
                      <div class="col-xs-12 col-md-6 text-center">
                          <h1 class="rating-num">
                              <?=$a_w?></h1>
                            <div class="rating">
                              <?php 

                                switch ($a_w) {
                                  case $a_w >= 0 && $a_w <= 1:
                                      echo "<span class='glyphicon glyphicon-star'></span>";
                                      echo "<span class='glyphicon glyphicon-star-empty'></span>";
                                      echo "<span class='glyphicon glyphicon-star-empty'></span>";
                                      echo "<span class='glyphicon glyphicon-star-empty'></span>";
                                      echo "<span class='glyphicon glyphicon-star-empty'></span>";
                                    break;
                                  case $a_w >= 1 && $a_w <= 2:
                                      echo "<span class='glyphicon glyphicon-star'></span>";
                                      echo "<span class='glyphicon glyphicon-star'></span>";
                                      echo "<span class='glyphicon glyphicon-star-empty'></span>";
                                      echo "<span class='glyphicon glyphicon-star-empty'></span>";
                                      echo "<span class='glyphicon glyphicon-star-empty'></span>";
                                    break;  
                                  case $a_w >= 2 && $a_w <= 3:
                                      echo "<span class='glyphicon glyphicon-star'></span>";
                                      echo "<span class='glyphicon glyphicon-star'></span>";
                                      echo "<span class='glyphicon glyphicon-star'></span>";
                                      echo "<span class='glyphicon glyphicon-star-empty'></span>";
                                      echo "<span class='glyphicon glyphicon-star-empty'></span>";
                                    break;
                                  case $a_w >= 3 && $a_w <= 4:
                                      echo "<span class='glyphicon glyphicon-star'></span>";
                                      echo "<span class='glyphicon glyphicon-star'></span>";
                                      echo "<span class='glyphicon glyphicon-star'></span>";
                                      echo "<span class='glyphicon glyphicon-star'></span>";
                                      echo "<span class='glyphicon glyphicon-star-empty'></span>";
                                    break;      
                                  case $a_w >= 4 && $a_w <= 5:
                                      echo "<span class='glyphicon glyphicon-star'></span>";
                                      echo "<span class='glyphicon glyphicon-star'></span>";
                                      echo "<span class='glyphicon glyphicon-star'></span>";
                                      echo "<span class='glyphicon glyphicon-star'></span>";
                                      echo "<span class='glyphicon glyphicon-star'></span>";
                                    break;                                                                                                                                         
                                  default:
                                    # code...
                                    break;
                                }

                              ?>
                          </div>
                          <div>
                              <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?=$num_rows_data;?> total
                          </div>
                      </div>
                      <div class="col-xs-12 col-md-6">
                          <div class="row rating-desc">
                              <div class="col-xs-3 col-md-3 text-right">
                                  <span class="glyphicon glyphicon-star"></span>&nbsp;5
                              </div>
                              <div class="col-xs-8 col-md-9">
                                  <div class="progress progress-striped">
                                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                          aria-valuemin="0" aria-valuemax="100" style="width: <?=round($rate5starsx100, 2)?>%">
                                          <span class="sr-only"><?=round($rate5starsx100, 2)?>%</span>
                                      </div>
                                  </div>
                              </div>
                              <!-- end 5 -->
                              <div class="col-xs-3 col-md-3 text-right">
                                  <span class="glyphicon glyphicon-star"></span>&nbsp;4
                              </div>
                              <div class="col-xs-8 col-md-9">
                                  <div class="progress">
                                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                          aria-valuemin="0" aria-valuemax="100" style="width: <?=round($rate4starsx100, 2)?>%">
                                          <span class="sr-only"><?=round($rate4starsx100, 2)?>%</span>
                                      </div>
                                  </div>
                              </div>
                              <!-- end 4 -->
                              <div class="col-xs-3 col-md-3 text-right">
                                  <span class="glyphicon glyphicon-star"></span>&nbsp;3
                              </div>
                              <div class="col-xs-8 col-md-9">
                                  <div class="progress">
                                      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                          aria-valuemin="0" aria-valuemax="100" style="width: <?=round($rate3starsx100, 2)?>%">
                                          <span class="sr-only"><?=round($rate3starsx100, 2)?>%</span>
                                      </div>
                                  </div>
                              </div>
                              <!-- end 3 -->
                              <div class="col-xs-3 col-md-3 text-right">
                                  <span class="glyphicon glyphicon-star"></span>&nbsp;2
                              </div>
                              <div class="col-xs-8 col-md-9">
                                  <div class="progress">
                                      <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
                                          aria-valuemin="0" aria-valuemax="100" style="width: <?=round($rate2starsx100, 2)?>%">
                                          <span class="sr-only"><?=round($rate2starsx100, 2)?>%</span>
                                      </div>
                                  </div>
                              </div>
                              <!-- end 2 -->
                              <div class="col-xs-3 col-md-3 text-right">
                                  <span class="glyphicon glyphicon-star"></span>&nbsp;1
                              </div>
                              <div class="col-xs-8 col-md-9">
                                  <div class="progress">
                                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                          aria-valuemin="0" aria-valuemax="100" style="width: <?=round($rate1starsx100, 2)?>%">
                                          <span class="sr-only"><?=round($rate1starsx100, 2)?>%</span>
                                      </div>
                                  </div>
                              </div>
                              <!-- end 1 -->
                          </div>
                          <!-- end row -->
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="row">
      <div class="col-lg-12">
      <hr/>

    <?php

      $counter = 0;
      $limit = get_option('how_many_reviews_show');

      foreach ($reviews as $item => $value) {
        if ($counter == $limit) {
          break;
        }
    ?>

    <div class="review-block">
      <div class="row">
        <div class="col-sm-3">
          <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
          <div class="review-block-name"><?=$value->reviewer_name;?></div>
          <div class="review-block-date"><?php echo date('d-m-Y', strtotime($value->reviewer_date));?></div>
        </div>
        <div class="col-sm-9">
        <div class="review-block-rate">

            <?php
              $u_r = $value->reviewer_rating;

              switch ($u_r) {
                case 1:
                  echo "<button type='button' class='btn btn-warning btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-default btn-grey btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-default btn-grey btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-default btn-grey btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-default btn-grey btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  break;
                case 2:
                  echo "<button type='button' class='btn btn-warning btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-warning btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-default btn-grey btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-default btn-grey btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-default btn-grey btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  break;
                case 3:
                  echo "<button type='button' class='btn btn-warning btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-warning btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-warning btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-default btn-grey btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-default btn-grey btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  break;
                case 4:
                  echo "<button type='button' class='btn btn-warning btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-warning btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-warning btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-warning btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-default btn-grey btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  break; 
                case 5:
                  echo "<button type='button' class='btn btn-warning btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-warning btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-warning btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-warning btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  echo "<button type='button' class='btn btn-warning btn-xs' aria-label='Left Align'>";
                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                  echo "</button>";
                  break;                                                                         
                default:
                  # code...
                  break;
              }

            ?>
        </div>

          <div class="review-block-description"><?=$value->reviewer_comment;?></div>
        </div>
      </div>
      <hr/>
    </div>
    <?php 
      $counter++;
    } 


    ?>

      </div>
    </div>

    <div class="review-box">

    <h6><?php echo get_option('add_review_text'); ?></h6>

    <div class="review-text">
      <form action="<?=plugins_url()?>/wp-ratefy/public/form-processor.php" method="POST" id="form-review">
        <p><input type="text" name="_reviewer-name" id="reviewer-name" placeholder="Your Name" class="text_review"></p>
        <p><input type="text" name="_reviewer-email" id="reviewer-email" placeholder="Your Email" class="text_review"></p>
        <p><textarea rows="4" cols="50" id="reviewer-comment" name="_reviewer-comment" placeholder="Any comments about our service?" class="text_review"></textarea></p>

        </div>

        <div class="stars-box">
          <p><?php echo get_option('rate_service_text'); ?></p>
          <span class="starRating">
            <input id="rating5" type="radio" name="_reviewer-rating" value="5">
            <label for="rating5">5</label>
            <input id="rating4" type="radio" name="_reviewer-rating" value="4">
            <label for="rating4">4</label>
            <input id="rating3" type="radio" name="_reviewer-rating" value="3">
            <label for="rating3">3</label>
            <input id="rating2" type="radio" name="_reviewer-rating" value="2">
            <label for="rating2">2</label>
            <input id="rating1" type="radio" name="_reviewer-rating" value="1">
            <label for="rating1">1</label>
          </span>
        </div>      

        <input type="hidden" value="<?php echo get_the_ID(); ?>" name="_reviewer-postid">
        <?php 
          wp_nonce_field( 'review-item' );
        ?>

        <div class="button-wrapper">
          <button class="btn btn-secondary" id="button-trigger" href=""><?php echo get_option('save_button_text'); ?></button>
        </div>
      </form>
    </div>

  </body>

<script src="//code.jquery.com/jquery-1.12.1.min.js"></script>


<script type="text/javascript">

var $j = jQuery.noConflict();

$j(document).ready(function() {

  var rate;
  var message;

  $j("input[name=_reviewer-rating]").change(function () {   
    rate = $j(this).val();
  });

  $j( "#button-trigger" ).click(function() {

    if( !$j("#reviewer-name").val()  ) {
      $j("#reviewer-name").after('<p class="warning">You need to tell us, your name!</p>');
      return false;
    }

    if( !$j("#reviewer-email").val()  ) {
      $j("#reviewer-email").after('<p class="warning">You need to tell us, your email!</p>');
      return false;
    }

    if( !$j("#reviewer-comment").val()  ) {
      $j("#reviewer-comment").after('<p class="warning">You need to tell us, any comment about our service!</p>');
      return false;
    }

    if( !rate ) {
      $j(".stars-box").after('<p class="warning">You need to give us a rate about our service!</p>');
      return false;      
    }

    $("#form-review").submit();

  });

});

</script>

<?php } ?>
