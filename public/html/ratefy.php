    <link rel="stylesheet" href="/wp-content/plugins/wp-ratefy/public/html/stylesheet.css">

    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-12">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-xs-12 col-md-6 text-center">
                        <h1 class="rating-num">
                            4.0</h1>
                        <div class="rating">
                            <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
                            </span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
                            </span><span class="glyphicon glyphicon-star-empty"></span>
                        </div>
                        <div>
                            <span class="glyphicon glyphicon-user"></span>1,050,008 total
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
                                        aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80%</span>
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
                                        aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60%</span>
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
                                        aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40%</span>
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
                                        aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20%</span>
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
                                        aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                                        <span class="sr-only">15%</span>
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
        <div class="review-block">
          <div class="row">
            <div class="col-sm-3">
              <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
              <div class="review-block-name"><a href="#">nktailor@asda.com</a></div>
              <div class="review-block-date">January 29, 2016</div>
            </div>
            <div class="col-sm-9">
              <div class="review-block-rate">
                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button>
              </div>
              <div class="review-block-title">this was nice in buy</div>
              <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
            </div>
          </div>
          <hr/>
        </div>
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